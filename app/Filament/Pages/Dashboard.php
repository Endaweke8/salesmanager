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
            \App\Filament\Widgets\EmployeeProgressWidget::class,
            \App\Filament\Widgets\SalesChart::class,
            \App\Filament\Widgets\RecentOrders::class,

        ];
    }


    public function getColumns(): int | array
    {
        return [
            'default' => 12, // use 12 columns total
            'sm' => 12,
            'md' => 12,
            'lg' => 12,
            'xl' => 12,
        ];
    }

    public function getTitle(): string | Htmlable
    {
        return 'Admin Overview';
    }
}
