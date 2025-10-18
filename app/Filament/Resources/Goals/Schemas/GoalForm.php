<?php

namespace App\Filament\Resources\Goals\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GoalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('employee_id')
                    ->label('Employee')
                    ->relationship('employee', 'name')
                    ->searchable()
                    ->required(),
                Select::make('year')
                    ->label('Year')
                    ->options(collect(range(date('Y'), date('Y') + 5))
                        ->mapWithKeys(fn($year) => [$year => $year]))
                    ->default(date('Y'))
                    ->required(),

                Select::make('month')
                    ->label('Month')
                    ->options([
                        '1'  => 'January',
                        '2'  => 'February',
                        '3'  => 'March',
                        '4'  => 'April',
                        '5'  => 'May',
                        '6'  => 'June',
                        '7'  => 'July',
                        '8'  => 'August',
                        '9'  => 'September',
                        '10' => 'October',
                        '11' => 'November',
                        '12' => 'December',
                    ])
                    ->default(date('n'))
                    ->required(),
                TextInput::make('target_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
            ]);
    }
}
