<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use App\Models\ProductCategory;
use App\Models\User;
use BladeUI\Icons\Components\Icon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\IconColumn;


class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {

        $unique_str = Str::upper(Str::random(5));
        $categories = ProductCategory::orderBy('name', 'asc')->pluck("name",'id');

        return $form
            ->schema([
                Section::make()->columns(2)->schema([
                    Select::make('user_id')
                        ->label('User Associated')
                        ->options(User::orderBy('created_at', 'asc')->whereNot("role", Role::Buyer->value)->pluck('name', 'id'))
                        ->searchable()
                        ->default(Filament::auth()->user()->id)
                        ->visible(Role::SuperAdministrator->value == Filament::auth()->user()->role->value),
                    Select::make('category_id')
                        ->label("Category")
                        ->options($categories)
                        ->searchable()
                        ->required()
                        ->live(onBlur: true),
                    TextInput::make('title')
                        ->required()
                        ->unique(Item::class, 'title', fn($record) => $record)
                        ->live(onBlur: true)
                        ->maxLength(255)
                        ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) use ($unique_str) {
                            if (($get('slug') ?? '') !== Str::slug($old)) {
                                return;
                            }

                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')->readOnly(),
                    Select::make('condition')->options([
                        'new' => 'New',
                        'used' => 'Used'
                    ])->required(),
                    RichEditor::make('description')
                        ->required()
                        ->toolbarButtons([
                            'bold',
                            'bulletList',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])->columnSpan(2),
                    FileUpload::make('images')
                        ->multiple()
                        ->disk("public")
                        ->directory('item-images')
                        ->visibility('public')
                        ->reorderable()
                        ->appendFiles()
                        ->image()
                        ->moveFiles()
                        ->minSize(5)
                        ->maxSize(2048)
                        ->minFiles(1)
                        ->maxFiles(5)
                        ->required()->columnSpan(2),
                    TextInput::make('price')
                        ->numeric()
                        ->label("Price in LKR")
                        ->inputMode('decimal')
                        ->required()
                        ->live(onBlur: true),
                    DateTimePicker::make("created_at")->visibleOn("edit"),
                    Select::make('availability')->options([
                        '1' => 'Available',
                        '0' => 'Not Available'
                    ])->required()->visibleOn("edit")->boolean(),


                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make("images")->size(80)->limit(1),
                Tables\Columns\TextColumn::make("title")->label("Product Name"),
                Tables\Columns\TextColumn::make("seller.name")->label("Added by"),
                Tables\Columns\TextColumn::make("created_at")->label("Added at")->dateTime(),
                IconColumn::make('availability')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }

    //Makes sure that the Seller can only manage their items, while Admin can manage all items
    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->role->value == Role::SuperAdministrator->value) {
            // If the user is a Super Administrator, return the default Eloquent query
            return parent::getEloquentQuery();
        } else {
            // If the user is not a Super Administrator, filter the query by user ID
            return parent::getEloquentQuery()->where('user_id', auth()->id());
        }
    }
}
