<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Goal;
use App\Models\Sale;
use Carbon\Carbon;

class EmployeeProgress extends Component
{
    public $employeeId;
    public $selectedDate;
    public $targetAmount = 0;
    public $achievedAmount = 0;
    public $progress = 0;

    public function mount($employeeId)
    {
        $this->employeeId = $employeeId;
        $this->selectedDate = Carbon::today()->toDateString();
        $this->calculateProgress();
    }

    public function updatedSelectedDate()
    {
        $this->calculateProgress();
    }

    protected function calculateProgress()
    {
        $date = Carbon::parse($this->selectedDate);

        $goal = Goal::where('employee_id', $this->employeeId)
            ->where('year', $date->year)
            ->where('month', $date->month)
            ->first();

        if ($goal) {
            $this->targetAmount = $goal->target_amount;
            $this->achievedAmount = Sale::where('employee_id', $this->employeeId)
                ->whereDate('sale_date', '<=', $this->selectedDate)
                ->sum('total_amount');

            $this->progress = $goal->target_amount > 0
                ? round(($this->achievedAmount / $goal->target_amount) * 100, 2)
                : 0;
        } else {
            $this->targetAmount = 0;
            $this->achievedAmount = 0;
            $this->progress = 0;
        }
    }

    public function render()
    {
        return view('livewire.employee-progress');
    }
}
