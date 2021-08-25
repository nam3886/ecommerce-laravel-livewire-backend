<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class LogoComponent extends Component
{
    public $logo, $favicon;

    public function mount()
    {
        $this->logo = config('settings.site_logo');
        $this->favicon = config('settings.site_favicon');
    }

    public function render()
    {
        return view('livewire.settings.logo-component');
    }
}
