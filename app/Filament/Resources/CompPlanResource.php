<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompPlanResource\Pages;
use App\Filament\Resources\CompPlanResource\RelationManagers;
use App\Models\CompPlan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompPlanResource extends Resource
{
    protected static ?string $model = CompPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Users';


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
                //
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
            //
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
