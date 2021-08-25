<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class SocialLinkComponent extends Component
{
    public array $settings = [];

    public function mount()
    {
        $this->settings['social_facebook'] = config('settings.social_facebook');
        $this->settings['social_twitter'] = config('settings.social_twitter');
        $this->settings['social_instagram'] = config('settings.social_instagram');
        $this->settings['social_linkedin'] = config('settings.social_linkedin');
    }

    public function render()
    {
        return view('livewire.settings.social-link-component');
    }
}
