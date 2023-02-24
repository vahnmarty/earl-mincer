<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use App\Models\ProjectStatusType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectStatusTypeResource\Pages;
use App\Filament\Resources\ProjectStatusTypeResource\RelationManagers;

class ProjectStatusTypeResource extends Resource
{
    protected static ?string $model = ProjectStatusType::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Projects';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('sort_by')->required()->label('Sort order'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('sort_by')->label('Sort order'),
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
            'index' => Pages\ListProjectStatusTypes::route('/'),
            'create' => Pages\CreateProjectStatusType::route('/create'),
            'edit' => Pages\EditProjectStatusType::route('/{record}/edit'),
        ];
    }    
}
