<?php

namespace App\Filament\Resources\Employees\Pages;

use App\Filament\Resources\Employees\EmployeeResource;
use Filament\Resources\Pages\Page;
use App\Models\Employee;

class ViewEmployee extends Page
{
    protected static string $resource = EmployeeResource::class;

    // ✅ This points to your Blade file location
    // protected static string $view = 'filament.resources.employees.pages.view-employee';

    public ?Employee $record = null;

    public function mount(int|string $record): void
    {
        $this->record = Employee::findOrFail($record);
    }

    public static function getNavigationLabel(): string
    {
        return 'View Employee';
    }
}
