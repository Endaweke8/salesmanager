<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['employee_id', 'year', 'month', 'target_amount'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
