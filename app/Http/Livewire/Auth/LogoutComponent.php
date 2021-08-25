<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutComponent extends Component
{
    public function render()
    {
        return view('livewire.auth.logout-component');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect(route('admin.login'));
    }
}
