<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    private array $driver = ['facebook', 'google', 'github'];

    public function redirect($provider)
    {
        abort_if(!in_array($provider, $this->driver), 404);

        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function Callback($provider)
    {
        abort_if(!in_array($provider, $this->driver), 404);

        try {
            $userSocial = Socialite::driver($provider)->stateless()->user();
        } catch (\Throwable $th) {
            return redirect()->route('home')->withError(json_encode($th->getMessage()));
        }

        $user = User::firstOrCreate(
            ['email'            =>  $userSocial->getEmail()],
            [
                'name'          =>  $userSocial->getName() ?? $userSocial->getNickname(),
                'email'         =>  $userSocial->getEmail(),
                'provider_id'   =>  $userSocial->getId(),
                'provider'      =>  $provider,
                'password'      =>  uniqid(rand(), true),
                'avatar'        =>  [
                    'link'      =>  $userSocial->getAvatar(),
                    'path'      =>  $userSocial->getAvatar()
                ],
            ]
        );

        $user->markEmailAsVerified();

        Auth::login($user);

        return redirect()->intended(route('home'));
    }
}
