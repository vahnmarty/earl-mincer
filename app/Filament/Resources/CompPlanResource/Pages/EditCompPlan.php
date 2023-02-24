<?php

namespace App\Filament\Resources\CompPlanResource\Pages;

use App\Filament\Resources\CompPlanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompPlan extends EditRecord
{
    protected static string $resource = CompPlanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
