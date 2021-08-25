<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class AnalyticComponent extends Component
{
    public array $settings = [];

    public function mount()
    {
        $this->settings['google_analytics'] = config('settings.google_analytics');
        $this->settings['facebook_pixels'] = config('settings.facebook_pixels');
    }

    public function render()
    {
        return view('livewire.settings.analytic-component');
    }
}
