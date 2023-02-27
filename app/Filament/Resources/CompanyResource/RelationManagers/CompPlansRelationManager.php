<?php

namespace App\Filament\Resources\CompanyResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompPlansRelationManager extends RelationManager
{
    protected static string $relationship = 'compPlans';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpan('full')
                    ->maxLength(255),
                Forms\Components\TextInput::make('setter_percent')
                    ->numeric()
                    //->default(0)
                    ->label("Setter percent (%)")
                    ->minValue(0)
                    ->maxValue(100)
                    ->placeholder('Enter 0 - 100'),
                Forms\Components\TextInput::make('setter_per_watt')
                    //->default(0)
                    ->numeric()
                    ->label("Setter per watt"),
                Forms\Components\TextInput::make('M1_percent')
                    ->numeric()
                    //->default(0)
                    ->label("M1 percent (%)")
                    ->minValue(0)
                    ->maxValue(100)
                    ->placeholder('Enter 0 - 100'),
                Forms\Components\TextInput::make('M1_max_payment')
                    //->default(0)
                    ->numeric()
                    ->label("M1 max payment"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('setter_percent')
                    ->label('Setter %')
                    ->formatStateUsing(fn ($state): string => number_format($state, 1). "%"),
                Tables\Columns\TextColumn::make('setter_per_watt')
                    ->label('S/W')
                    ->formatStateUsing(fn ($state): string => number_format($state, 1)),
                Tables\Columns\TextColumn::make('M1_percent')
                    ->label('M1 %')
                    ->formatStateUsing(fn ($state): string => number_format($state, 1). "%"),
                Tables\Columns\TextColumn::make('M1_max_payment')
                    ->label('M1 Max')
                    ->formatStateUsing(fn ($state): string => number_format($state, 2)),
                // Tables\Columns\TextColumn::make('start_at')->dateTime('Y-m-d'),
                // Tables\Columns\TextColumn::make('end_at')->dateTime('Y-m-d'),
                Tables\Columns\ToggleColumn::make('active'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
