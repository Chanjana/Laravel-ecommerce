<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Filament\Resources\ProductReviewResource\Pages;
use App\Filament\Resources\ProductReviewResource\RelationManagers;
use App\Models\ProductReview;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductReviewResource extends Resource
{
    protected static ?string $model = ProductReview::class;

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
                Tables\Columns\TextColumn::make("item.title")->label("Item"),
                Tables\Columns\TextColumn::make("user.name")->label("Customer"),
                Tables\Columns\TextColumn::make("rating")->label("Rating")->badge(),
                Tables\Columns\TextColumn::make("comment")->label("Comment")->limit(70),
                Tables\Columns\TextColumn::make("created_at")->label("Reviewed")->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->visible(auth()->user()->role->value== Role::SuperAdministrator->value), //Only admin can delete review
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
            'index' => Pages\ListProductReviews::route('/'),
            'create' => Pages\CreateProductReview::route('/create'),
            'edit' => Pages\EditProductReview::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->role->value == Role::SuperAdministrator->value) {

            return parent::getEloquentQuery();
        } else {

            return parent::getEloquentQuery()->whereHas('item.seller', function($query) {
                $query->where("id", auth()->id());
            });
        }
    }
}
