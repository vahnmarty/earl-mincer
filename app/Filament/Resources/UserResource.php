<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\CompaniesRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('business_name')->required(),
                Forms\Components\TextInput::make('AKA')->label('AKA (Alias)')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\DatePicker::make('start_at')->required(),
                Forms\Components\DatePicker::make('end_at')->required(),
                Forms\Components\Select::make('companies')
                ->multiple()
                ->preload()
                ->relationship('companies', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('business_name'),
                Tables\Columns\TextColumn::make('AKA')->label('AKA'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('start_at')->dateTime('Y-m-d'),
                Tables\Columns\TextColumn::make('end_at')->dateTime('Y-m-d'),
                Tables\Columns\IconColumn::make('super_user')
                    ->options([
                        'heroicon-o-x-circle' => 0,
                        'heroicon-o-check-circle' => 1,
                    ])
                    ->colors([
                        'secondary',
                        'danger' => 0,
                        'success' => 1,
                    ])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            CompaniesRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
