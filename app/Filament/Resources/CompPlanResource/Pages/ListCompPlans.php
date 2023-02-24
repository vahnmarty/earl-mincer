<?php

namespace App\Filament\Resources\CompPlanResource\Pages;

use App\Filament\Resources\CompPlanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompPlans extends ListRecords
{
    protected static string $resource = CompPlanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
