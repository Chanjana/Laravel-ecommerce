<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Filament\Resources\ProductCategoryResource\Pages;
use App\Filament\Resources\ProductCategoryResource\RelationManagers;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("name")
                    ->required()
                    ->label('Category Name')
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make("slug")
                    ->disabled() // Make the slug field read-only
                    ->required()
                    ->label('Slug'),
                FileUpload::make('category_image')
                    ->disk("public")
                    ->directory('categories')
                    ->visibility('public')
                    ->appendFiles()
                    ->image()
                    ->moveFiles()
                    ->maxSize(1024) //max image size 1GB
                    ->maxFiles(1)
                    ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make("category_image")->height(80),
                Tables\Columns\TextColumn::make("name"),
                Tables\Columns\TextColumn::make("slug"),
            ])
            ->filters([

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
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }

    //Only admin can view
    public static function canViewAny(): bool
    {
        return auth()->user()->role->value== Role::SuperAdministrator->value;
    }
}
