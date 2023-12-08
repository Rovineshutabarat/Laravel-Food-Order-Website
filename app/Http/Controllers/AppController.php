<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    public function index()
    {
        return view('static.index');
    }
    public function about()
    {
        return view('static.about');
    }
    public function postFeedback()
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login');
        }
        $createFeedback  = DB::table('feedback')
            ->insert(
                [
                    'user_id' => Auth::user()->id,
                    'message' => request()->message
                ]
            );

        if ($createFeedback) {
            return redirect()->route('homepage');
        }
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        return redirect()->route('auth.login');
    }
}
