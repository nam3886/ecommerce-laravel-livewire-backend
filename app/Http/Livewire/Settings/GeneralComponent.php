<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class GeneralComponent extends Component
{
    public array $settings = [];

    public function mount()
    {
        $this->settings['site_name'] = config('settings.site_name');
        $this->settings['site_title'] = config('settings.site_title');
        $this->settings['default_email_address'] = config('settings.default_email_address');
        $this->settings['currency_code'] = config('settings.currency_code');
        $this->settings['currency_symbol'] = config('settings.currency_symbol');
    }

    public function render()
    {
        return view('livewire.settings.general-component');
    }
}
