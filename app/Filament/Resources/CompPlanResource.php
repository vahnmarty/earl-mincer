<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\CompPlan;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CompPlanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompPlanResource\RelationManagers;
use App\Filament\Resources\CompanyResource\RelationManagers\CompPlansRelationManager;

class CompPlanResource extends Resource
{
    protected static ?string $model = CompPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Users';


    public static function form(Form $form): Form
    {
        return $form
        ->columns(4)
        ->schema([
 //           Forms\Components\Toggle::make('active'),

            Forms\Components\TextInput::make('name')->required(),
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
            Forms\Components\Select::make('company_id')
                ->default(1)
                ->required()
                ->preload()
                ->relationship('company', 'name')
                ->label("Company"),        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('company.name'),
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
            
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompPlans::route('/'),
            'create' => Pages\CreateCompPlan::route('/create'),
            'edit' => Pages\EditCompPlan::route('/{record}/edit'),
        ];
    }    
}
