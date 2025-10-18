<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\Widget;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class EmployeeProgressWidget extends Widget implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.widgets.employee-progress-widget';
    protected static ?string $maxWidth = null;
    protected int|string|array $columnSpan = 'full';

    public ?string $selectedDate = null;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\DatePicker::make('selectedDate')
                ->label('Select Date')
                ->default(now())
                ->reactive(),
        ];
    }

    public function mount(): void
    {
        $this->form->fill(['selectedDate' => now()->toDateString()]);
    }

    public function getData(): array
    {
        $date = $this->selectedDate ?? now()->toDateString();
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));

        return Employee::all()->map(function ($employee) use ($date, $year, $month) {
            // Get daily total
            $dailySales = $employee->sales()
                ->whereDate('sale_date', $date)
                ->sum('total_amount');

            // Get total sales for the month
            $monthlySales = $employee->sales()
                ->whereYear('sale_date', $year)
                ->whereMonth('sale_date', $month)
                ->sum('total_amount');

            // Get goal for that month
            $monthlyGoal = $employee->goals()
                ->where('year', $year)
                ->where('month', $month)
                ->value('target_amount') ?? 0;

            // Calculate daily & monthly progress
            $dailyProgress = $monthlyGoal > 0
                ? round(($dailySales / $monthlyGoal) * 100, 2)
                : 0;

            $monthlyProgress = $monthlyGoal > 0
                ? round(($monthlySales / $monthlyGoal) * 100, 2)
                : 0;

            return [
                'name' => $employee->name,
                'sales' => number_format($dailySales, 2),
                'goal' => number_format($monthlyGoal, 2),
                'daily_progress' => $dailyProgress,
                'monthly_progress' => $monthlyProgress,
            ];
        })->toArray();
    }
}
