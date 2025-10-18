<?php

use App\Filament\Pages\ViewEmployee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/employees/{record}', ViewEmployee::class)
