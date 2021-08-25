<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserComponent extends Component
{
    public array    $searchFields       =   ['position', 'link', 'title'];

    public array    $columns            =   [
        ['name' => 'id', 'sortable' => true],
        ['name' => 'name', 'sortable' => true],
        ['name' => 'email', 'sortable' => true],
        ['name' => 'created_at', 'sortable' => true],
        ['name' => 'active'],
    ];

    public function render()
    {
        return view('livewire.user-component');
    }
}
