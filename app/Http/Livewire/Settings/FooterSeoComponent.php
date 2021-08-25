<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class FooterSeoComponent extends Component
{
    public array $settings = [];

    public function mount()
    {
        $this->settings['footer_copyright_text'] = config('settings.footer_copyright_text');
        $this->settings['seo_meta_title'] = config('settings.seo_meta_title');
        $this->settings['seo_meta_description'] = config('settings.seo_meta_description');
    }

    public function render()
    {
        return view('livewire.settings.footer-seo-component');
    }
}
