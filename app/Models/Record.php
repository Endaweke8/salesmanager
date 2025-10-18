<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['employee_id', 'record_type_id', 'date', 'sales_amount', 'leads', 'visits', 'notes'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function recordType()
    {
        return $this->belongsTo(RecordType::class);
    }
}
