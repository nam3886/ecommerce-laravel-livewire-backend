<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginComponent extends Component
{
    public $user            =   [];

    protected $rules        =   [
        'user.email'        =>  'required|email|exists:App\Models\Admin,email',
        'user.password'     =>  'required|string|max:255',
        'user.remember_me'  =>  'nullable|boolean',
    ];

    public function render()
    {
        return view('livewire.auth.login-component');
    }

    protected function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        $credentials = collect($this->user)->only('email', 'password')->toArray();

        $remember = $this->user['remember_me'] ?? false;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        throw ValidationException::withMessages([
            'user.email' => __('auth.failed'),
        ]);
    }
}
