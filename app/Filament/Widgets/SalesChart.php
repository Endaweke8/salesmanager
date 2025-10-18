<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Sales by Employee';

    protected function getData(): array
    {
        $sales = Sale::select(
            DB::raw('SUM(total_amount) as total'),
            DB::raw('employees.name as employee')
        )
            ->join('employees', 'sales.employee_id', '=', 'employees.id')
            ->groupBy('employee')
            ->orderByDesc('total')
            ->get();

        return [
            'labels' => $sales->pluck('employee'),
            'datasets' => [
                [
                    'label' => 'Total Sales',
                    'data' => $sales->pluck('total'),
                    'backgroundColor' => [
                        '#f59e0b',
                        '#10b981',
                        '#3b82f6',
                        '#ef4444',
                        '#8b5cf6',
                        '#f97316',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
