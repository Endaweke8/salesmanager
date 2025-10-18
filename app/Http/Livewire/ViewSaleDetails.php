<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;

class ViewSaleDetails extends Component
{
    public Sale $sale;

    public function mount(Sale $sale)
    {
        $this->sale = $sale->load('items.product');
    }

    public function render()
    {
        return view('livewire.view-sale-details', [
            'items' => $this->sale->items,
        ]);
    }
}
