<?php

namespace App\Filament\Resources\Records\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;


class RecordForm
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

                Select::make('record_type_id')
                    ->label('Record Type')
                    ->relationship('recordType', 'name')
                    ->searchable()
                    ->required(),

                DatePicker::make('date')
                    ->required()
                    ->default(now()),

                TextInput::make('sales_amount')
                    ->label('Sales Amount')
                    ->numeric()
                    ->required()
                    ->default(0.0),

                TextInput::make('leads')
                    ->numeric()
                    ->required()
                    ->default(0),

                TextInput::make('visits')
                    ->numeric()
                    ->required()
                    ->default(0),

                Textarea::make('notes')
                    ->label('Notes')
                    ->columnSpanFull(),
            ]);
    }
}
