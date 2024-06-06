<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Enums\Role;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Filament\Infolists;
use Filament\Infolists\Infolist;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $roles = Role::class;


        return $form
            ->schema([Section::make()->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')
                    ->password()
                    ->visibleOn('create')
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create'),
                Select::make('role')->options($roles)->required()


                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        $roles = Role::class;

        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                Tables\Columns\SelectColumn::make("role")->options($roles)->disabled(),
                TextColumn::make('created_at')->dateTime()->label("Joined at"),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()->requiresConfirmation()->visible(auth()->user()->role == Role::SuperAdministrator->value),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->role->value== Role::SuperAdministrator->value;
    }


}
