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
}
