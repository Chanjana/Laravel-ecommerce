<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\UserResource\Pages\ViewUser;
use App\Models\Order;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Filament\Infolists\Infolist;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("order_id")->searchable(),
                Tables\Columns\TextColumn::make("item.title")->searchable()
                    ->label("Item"),
                Tables\Columns\TextColumn::make("shipping_details")->searchable()
                    ->label("Shipping details")
                    ->listWithLineBreaks()
                    ->limitList(3)
                    ->expandableLimitedList(),
                Tables\Columns\SelectColumn::make("payment_method")
                    ->label("Payment Method")
                    ->options([
                        "cod" => "COD",
                        "card" => "Card"
                    ])->disabled(),
                Tables\Columns\SelectColumn::make("status")
                    ->label("Status")
                    ->options([
                        "processing" => "Processing",
                        "shipped" => "Shipped",
                        "delivered" => "Delivered",
                        "cancelled" => "Cancelled"
                    ])->afterStateUpdated(function ($record, $state) {
                        // Runs after the state is saved to the database.

                        if ($state == "shipped") {

                            $record->item->update([
                                "availability" => 0
                            ]);

                            // update other orders
                             Order::whereNot("id", $record->id)->where("order_details", $record->order_details)->update([
                                "status" => "cancelled"
                            ]);


                        }
                    }),
                Tables\Columns\TextColumn::make("item.price")->label("Sale")->money("LKR"),
                Tables\Columns\TextColumn::make("created_at")->label("Placed on")->dateTime(),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make("status")
                    ->options([
                        "processing" => "Processing",
                        "shipped" => "Shipped",
                        "delivered" => "Delivered",
                        "cancelled" => "Cancelled"
                    ])->default('processing')
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            "view" => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),

        ];
    }

    //Makes sure that the Seller can only access their orders, while Admin can access all orders.
    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->role->value == Role::SuperAdministrator->value) {

            return parent::getEloquentQuery();
        } else {

            return parent::getEloquentQuery()->where('seller_id', auth()->id());
        }
    }

    //Disable Create Order
    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('order_id'),
                Infolists\Components\TextEntry::make('shipping_details')->copyable(),
                Infolists\Components\TextEntry::make('billing_details')->copyable(),
                Infolists\Components\TextEntry::make('item.title'),
                Infolists\Components\TextEntry::make('item.price')->label("Order Total")->money('LKR'),
                Infolists\Components\TextEntry::make('item.price')
                    ->label("Your Sale: " . config("app.sales_commission") . "%" )
                    ->money('LKR')
                    ->state(function (Order $record): string {
                        $sale = $record->item->price - ($record->item->price * config("app.sales_commission")/100);
                        return  $sale;
                })->color("success")->weight("bold"),
                Infolists\Components\TextEntry::make('payment_method')->copyable(),
                Infolists\Components\TextEntry::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        "processing" => "gray",
                        "shipped" => "warning",
                        "delivered" => "success",
                        "cancelled" => "danger"
                    }),
                Infolists\Components\TextEntry::make('created_at')->label("Order placed on")->dateTime(),
            ]);
    }
}
