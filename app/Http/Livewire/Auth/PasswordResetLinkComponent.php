<?php

namespace App\Http\Livewire\Auth;

use App\Http\Livewire\Options\WithNotifyMsgUi;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class PasswordResetLinkComponent extends Component
{
    use WithNotifyMsgUi;

    public $email;

    protected $rules    =   [
        'email'         =>  'required|email|exists:App\Models\Admin,email'
    ];

    public function render()
    {
        return view('livewire.auth.forgot-password-component');
    }

    protected function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sendMailResetLink()
    {
        $this->validate();

        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            return url(route('admin.password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        });

        $status = Password::broker('admins')->sendResetLink(['email' => $this->email]);

        if ($status != Password::RESET_LINK_SENT) {
            return $this->flashMessage(__($status), 'error');
        }

        $this->flashMessage(__($status));

        $this->reset();
    }
}
