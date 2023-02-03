<?php

namespace App\Filament\Resources\CompanyAccountTypeResource\Pages;

use App\Filament\Resources\CompanyAccountTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCompanyAccountTypes extends ManageRecords
{
    protected static string $resource = CompanyAccountTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
