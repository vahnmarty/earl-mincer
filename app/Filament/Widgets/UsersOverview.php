<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Company;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UsersOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('User', User::count()),
            Card::make('Company', Company::count()),
        ];
    }
}
