<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        return view('static.index');
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        return redirect()->route('auth.login');
    }
}
