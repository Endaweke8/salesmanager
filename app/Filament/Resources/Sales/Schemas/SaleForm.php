<?php

namespace App\Filament\Resources\Sales\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;

class SaleForm
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

                Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->required(),

                Section::make('Sale Items')
                    ->schema([
                        Repeater::make('saleItems')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->required(),

                                TextInput::make('qty')
                                    ->default(1)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $qty = (float) $state;
                                        $unitPrice = (float) ($get('unit_price') ?? 0);
                                        $lineTotal = round($qty * $unitPrice, 2);
                                        $set('line_total', $lineTotal);

                                        $items = $get('../../saleItems') ?? [];
                                        $total = collect($items)->sum(fn($item) => (float) ($item['line_total'] ?? 0));
                                        $set('../../total_amount', round($total, 2));
                                    })
                                    ->required(),

                                TextInput::make('unit_price')
                                    ->default(0.00)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $unitPrice = (float) $state;
                                        $qty = (float) ($get('qty') ?? 0);
                                        $lineTotal = round($qty * $unitPrice, 2);
                                        $set('line_total', $lineTotal);

                                        $items = $get('../../saleItems') ?? [];
                                        $total = collect($items)->sum(fn($item) => (float) ($item['line_total'] ?? 0));
                                        $set('../../total_amount', round($total, 2));
                                    })
                                    ->required(),

                                TextInput::make('line_total')
                                    ->numeric()
                                    ->default(0.00)
                                    ->disabled()
                                    ->dehydrated(true)
                                    ->required(),
                            ])
                            ->columns(4)
                            ->createItemButtonLabel('Add Product')
                            ->reactive()
                            ->afterStateUpdated(function (callable $get, callable $set) {
                                $items = $get('saleItems') ?? [];
                                $total = collect($items)->sum(fn($item) => (float) ($item['line_total'] ?? 0));
                                $set('total_amount', round($total, 2));
                            })

                    ])
                    ->collapsible()
                    ->columnSpanFull(),

                TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->disabled()
                    ->dehydrated(true)
                    ->reactive()
                    ->formatStateUsing(fn($state) => number_format((float)$state, 2))
                    ->numeric()
                    ->default(0.00),

                DatePicker::make('sale_date')
                    ->required()
                    ->default(now()),



                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('completed')
                    ->required(),
            ]);
    }

    // protected static function updateTotal(callable $get, callable $set): void
    // {
    //     $items = collect($get('saleItems') ?? []);
    //     $total = $items->sum(fn($item) => (float) ($item['line_total'] ?? 0));
    //     $set('total_amount', round($total, 2));
    // }
}
