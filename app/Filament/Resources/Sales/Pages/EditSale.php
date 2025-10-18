<?php

namespace App\Filament\Resources\Sales\Pages;

use App\Filament\Resources\Sales\SaleResource;
use Filament\Resources\Pages\EditRecord;

class EditSale extends EditRecord
{
    protected static string $resource = SaleResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['saleItems']) && is_array($data['saleItems'])) {
            $data['total_amount'] = collect($data['saleItems'])
                ->sum(fn($item) => ($item['qty'] ?? 0) * ($item['unit_price'] ?? 0));
        }

        return $data;
    }
}
