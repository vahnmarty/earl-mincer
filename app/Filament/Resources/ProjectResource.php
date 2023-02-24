<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Filament\Resources\ProjectResource\RelationManagers\ProjectStatusTypesRelationManager;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Projects';


    public static function form(Form $form): Form
    {
        return $form
        ->columns(3)
        ->schema([
            Forms\Components\Fieldset::make('Contact')
                ->label("Contact")
                ->columns(4)
                ->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('phone')->required(),
                    Forms\Components\TextInput::make('email')->required(),
                    Forms\Components\TextInput::make('address')->required(),
                    Forms\Components\TextInput::make('city')->required(),
                    Forms\Components\TextInput::make('state')->required(),
                    Forms\Components\TextInput::make('zip')->required()->label("ZIP"),
                ]),
            Forms\Components\Fieldset::make('Details')
                ->label("Details")
                ->columns(5)
                ->schema([    
                    Forms\Components\TextInput::make('system_size')->required()->label("System Size"),
                    Forms\Components\TextInput::make('EPC_project_id')->label("EPC Project ID"),
                    Forms\Components\TextInput::make('CRM_project_id')->label("CRM Project ID"),
                    Forms\Components\TextInput::make('NPPW')->required()->label("NPPW"),
                    Forms\Components\TextInput::make('loan_amount')->label("Loan Amount"),
                ]),
            Forms\Components\TextInput::make('Note'),
            Forms\Components\DatePicker::make('start_at')->required()->default(date('Y-m-d')),
            Forms\Components\DatePicker::make('end_at')->required()->default(date('Y-m-d')),
            Forms\Components\Select::make('status')
                ->preload()
                ->relationship('projectStatusTypes', 'name')
                ->label("Status"),
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
            ProjectStatusTypesRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }    
}
