<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_id', 'name', 'phone', 'email', 'position', 'manager_id', 'hired_at', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function records()
    {
        return $this->hasMany(Record::class);
    }
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }


    public function getDailyProgress($date = null)
    {
        $date = $date ?? now()->toDateString();
        return $this->sales()
            ->whereDate('sale_date', $date)
            ->sum('total_amount');
    }

    public function getMonthlyProgress($year = null, $month = null): array
    {
        $year = $year ?? now()->year;
        $month = $month ?? now()->month;

        $totalSales = $this->sales()
            ->whereYear('sale_date', $year)
            ->whereMonth('sale_date', $month)
            ->sum('total_amount');

        $goal = $this->goals()
            ->where('year', $year)
            ->where('month', $month)
            ->value('target_amount') ?? 0;

        $progress = $goal > 0 ? round(($totalSales / $goal) * 100, 2) : 0;

        return [
            'sales' => $totalSales ?? 0,
            'goal' => $goal,
            'progress' => $progress,
        ];
    }
}
