<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class PaymentComponent extends Component
{
    public array $settings = [];

    public function render()
    {
        return view('livewire.settings.payment-component');
    }
}
