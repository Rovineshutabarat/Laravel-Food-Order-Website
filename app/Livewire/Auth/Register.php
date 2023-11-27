<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.auth.register');
    }

    public function handleRegister()
    {
        $this->validate(
            [
                'username' => 'required|string|min:3',
                'email' => 'required|string|min:3|unique:user',
                'password' => 'required|string|min:3|confirmed',
                'password_confirmation' => 'required|string|min:3',
            ]
        );

        $createUser = DB::table('user')->insert(
            [
                'username' => $this->username,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]
        );

        if ($createUser && Auth::attempt($this->only('email', 'password'))) {
            request()->session()->regenerate();
            return redirect()->route('homepage');
        }


        return redirect()->back()->withErrors('Registrasi Akun Gagal');
    }
}
