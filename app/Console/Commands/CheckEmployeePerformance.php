<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Goal;
use App\Models\Sale;
use App\Mail\PromotionMail;
use App\Mail\WarningMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CheckEmployeePerformance extends Command
{
    protected $signature = 'employees:check-performance';
    protected $description = 'Check employee daily performance and send email alerts';

    public function handle()
    {
        $today = Carbon::today();
        $month = $today->month;
        $year = $today->year;
        $daysInMonth = $today->daysInMonth;

        $this->info("Checking employee performance for {$today->toFormattedDateString()}...");

        // Load all active goals for current month
        $goals = Goal::with('employee')
            ->where('year', $year)
            ->where('month', $month)
            ->get();

        foreach ($goals as $goal) {
            $employee = $goal->employee;

            if (!$employee || !$employee->email) {
                $this->warn("Skipping goal ID {$goal->id} - employee or email missing");
                continue;
            }

            // Expected daily goal
            $expectedPerDay = $goal->target_amount / $daysInMonth;

            $totalSales = Sale::where('employee_id', $employee->id)
                ->whereMonth('sale_date', $month)
                ->whereYear('sale_date', $year)
                ->sum('total_amount');

            // Today’s sales only
            $todaySales = Sale::where('employee_id', $employee->id)
                ->whereDate('sale_date', $today)
                ->sum('total_amount');

            // Expected cumulative progress by today
            $daysPassed = $today->day;
            $expectedSoFar = $expectedPerDay * $daysPassed;

            // Determine whether to send promotion or warning
            if ($totalSales >= $expectedSoFar) {
                Mail::to('endaweke1234@gmail.com')->send(
                    new PromotionMail($employee, $totalSales, $goal->target_amount, $todaySales)
                );
                // Mail::to($employee->email)->send(new PromotionMail(...))
                $this->info("🎉 Promotion mail sent to {$employee->name}");
            } else {
                Mail::to('endaweke1234@gmail.com')->send(
                    new WarningMail($employee, $totalSales, $goal->target_amount, $todaySales)
                );
                // Mail::to($employee->email)->send(new WarningMail(...))
                $this->warn("⚠️ Warning mail sent to {$employee->name}");
            }
        }

        $this->info("Performance check completed!");
        return Command::SUCCESS;
    }
}
