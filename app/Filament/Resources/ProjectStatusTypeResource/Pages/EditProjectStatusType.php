<?php

namespace App\Filament\Resources\ProjectStatusTypeResource\Pages;

use App\Filament\Resources\ProjectStatusTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectStatusType extends EditRecord
{
    protected static string $resource = ProjectStatusTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
