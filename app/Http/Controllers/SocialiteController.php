<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class SocialiteController extends Controller
{
    public function handleGoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $userFromGoogle = Socialite::driver('google')->user();
        } catch (InvalidStateException) {
            return redirect()->back();
        }

        $userFromDatabase = User::firstOrCreate([
            'email' => $userFromGoogle->getEmail(),
        ], [
            'username' => $userFromGoogle->getName(),
            'password' => Str::random(40),
            'provider' => 'google',
            'provider_id' => $userFromGoogle->getId(),
        ]);

        if ($userFromDatabase) {
            Auth::login($userFromDatabase);
            request()->session()->regenerate();
            return redirect()->route('homepage');
        }
        return redirect()->back()->withErrors('Login Gagal');
    }
}
