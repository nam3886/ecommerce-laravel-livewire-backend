<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderComponent extends Component
{
    public array    $columns            =   [
        ['name' => 'order_number', 'sortable' => true],
        ['name' => 'shipping_fullname', 'sortable' => true],
        ['name' => 'shipping_phone', 'sortable' => true],
        ['name' => 'status', 'sortable' => true],
        ['name' => 'total_price', 'sortable' => true],
        ['name' => 'item_count', 'sortable' => true],
        ['name' => 'is_paid', 'sortable' => true],
        ['name' => 'order_success', 'sortable' => true],
        ['name' => 'created_at', 'sortable' => true],
        ['name' => 'active'],
        ['name' => 'action'],
    ];

    public function render()
    {
        return view('livewire.order-component');
    }
}
