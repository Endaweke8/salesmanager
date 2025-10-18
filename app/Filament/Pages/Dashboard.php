<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            \App\Filament\Widgets\SalesChart::class,
            \App\Filament\Widgets\RecentOrders::class,
        ];
    }


    public function getColumns(): int | array
    {
        return 2;
    }

    public function getTitle(): string | Htmlable
    {
        return 'Admin Overview';
    }
}
