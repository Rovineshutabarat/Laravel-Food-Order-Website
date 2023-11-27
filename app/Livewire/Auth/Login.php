<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function handleLogin()
    {
        $this->validate(
            [
                'email' => 'required|exists:user|string',
                'password' => 'required|min:3|string',
            ]
        );
        if (!Auth::attempt(
            [
                'email' => $this->email,
                'password' => $this->password,
            ]
        )) {
            return redirect()->back()->withErrors("Login Gagal");
        }

        request()->session()->regenerate();
        return redirect()->route('homepage');
    }
}
