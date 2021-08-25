<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Options\WithNotifyMsgUi;
use App\Http\Livewire\Options\WithStorageGoogle;
use App\Http\Livewire\Message;
use App\Models\Setting;
use App\Services\GoogleStorageService;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class SettingComponent extends Component
{
    use WithNotifyMsgUi, WithFileUploads, WithStorageGoogle;

    const           FOLDER = 'settings';
    public          $logo, $favicon;
    public string   $type = '';
    public array    $settings = [];
    public array    $types = [
        'general',
        'logo',
        'footer-seo',
        'social-link',
        'analytic',
        'payment',
    ];
    public array    $activeOptions = [
        ['value' => 1, 'label' => 'Active'],
        ['value' => 0, 'label' => 'Inactive'],
    ];

    public function mount(string $type)
    {
        abort_if(!in_array($type, $this->types), 404);

        switch ($type) {
            case 'general':
                $this->settings['site_name'] = config('settings.site_name');
                $this->settings['site_title'] = config('settings.site_title');
                $this->settings['default_email_address'] = config('settings.default_email_address');
                $this->settings['default_address'] = config('settings.default_address');
                $this->settings['default_phone'] = config('settings.default_phone');
                $this->settings['currency_code'] = config('settings.currency_code');
                $this->settings['currency_symbol'] = config('settings.currency_symbol');
                break;
            case 'logo':
                $this->logo = getSiteImageLink('site_logo');
                $this->favicon = getSiteImageLink('site_favicon');
                break;
            case 'footer-seo':
                $this->settings['footer_copyright_text'] = config('settings.footer_copyright_text');
                $this->settings['seo_meta_title'] = config('settings.seo_meta_title');
                $this->settings['seo_meta_description'] = config('settings.seo_meta_description');
                break;
            case 'social-link':
                $this->settings['social_facebook'] = config('settings.social_facebook');
                $this->settings['social_twitter'] = config('settings.social_twitter');
                $this->settings['social_instagram'] = config('settings.social_instagram');
                $this->settings['social_linkedin'] = config('settings.social_linkedin');
                break;
            case 'analytic':
                $this->settings['google_analytics'] = config('settings.google_analytics');
                $this->settings['facebook_pixels'] = config('settings.facebook_pixels');
                break;
            case 'payment':
                $this->settings['stripe_payment_method'] = intval(config('settings.stripe_payment_method'));
                $this->settings['stripe_key'] = config('settings.stripe_key');
                $this->settings['stripe_secret_key'] = config('settings.stripe_secret_key');
                $this->settings['paypal_payment_method'] = intval(config('settings.paypal_payment_method'));
                $this->settings['paypal_client_id'] = config('settings.paypal_client_id');
                $this->settings['paypal_secret_id'] = config('settings.paypal_secret_id');
                break;
        }
    }

    public function render()
    {
        return view("livewire.settings.{$this->type}");
    }

    public function update()
    {
        switch ($this->type) {
            case 'logo':
                $images = $this->handleImages();
                Setting::set('site_logo', json_encode($images['logo']));
                Setting::set('site_favicon', json_encode($images['favicon']));
                break;

            default:
                foreach ($this->settings as $key => $value) {
                    Setting::set($key, $value);
                }
                break;
        }

        $this->flashMessage('Setting' . Message::UPDATE_SUCCESS);
    }

    private function handleImages(): array
    {
        $file = new GoogleStorageService;
        $file->setDir(self::FOLDER);

        $logo = $this->logo instanceof TemporaryUploadedFile
            ? $file->setFile($this->logo)
            ->setWidth(204)->setHeight(52)
            ->resize('png')->store()
            : null;

        $favicon = $this->favicon instanceof TemporaryUploadedFile
            ? $file->setFile($this->favicon)->store() : null;

        return [
            'logo' => $logo,
            'favicon' => $favicon,
        ];
    }
}
