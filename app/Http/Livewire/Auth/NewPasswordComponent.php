<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Http\Livewire\Options\WithNotifyMsgUi;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class NewPasswordComponent extends Component
{
    use WithNotifyMsgUi;

    public      $user   =   [];

    public      $token;

    protected   $rules  =   [
        'token'         =>  'required',
        'user.email'    =>  'required|email',
        'user.password' =>  'required|string|confirmed|min:8|max:255',
    ];

    public function render()
    {
        return view('livewire.auth.reset-password-component');
    }

    public function mount(Request $request)
    {
        $this->token = $request->route('token');
        $this->user['email'] = $request->email;
    }

    public function resetPassword(Request $request)
    {
        $this->validate();

        $credentials = array_merge($this->user, ['token' => $this->token]);

        // Here we will attempt to reset the {{name}}'s password. If it is successful we
        // will update the password on an actual {{name}} model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::broker('admins')->reset(
            $credentials,
            function ($admin) use ($credentials) {
                $admin->forceFill([
                    'password'          =>  $credentials['password'],
                    'remember_token'    =>  Str::random(60),
                ])->save();

                event(new PasswordReset($admin));
            }
        );

        // If the password was successfully reset, we will redirect the {{name}} back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status == Password::PASSWORD_RESET) {
            return $this->flashMessage(__($status));
        }

        $this->addError('user.email', __($status));

        $this->flashMessage(__($status), 'error');
    }
}
