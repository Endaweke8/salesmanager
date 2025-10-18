<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    protected $fillable = ['employee_id', 'customer_id', 'sale_date', 'total_amount', 'status'];


    protected static function booted()
    {
        static::saving(function ($sale) {
            $sale->total_amount = $sale->items->sum('line_total');
        });
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}
