<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\AppController::class, 'index'])->name('homepage');

Route::prefix('auth')->name('auth.')->middleware('auth')->group(function () {
    Route::get('logout', [\App\Http\Controllers\AppController::class, 'logout'])->name('logout');
});

Route::prefix('auth')->name('auth.')->middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
    Route::get('/google/redirect', [\App\Http\Controllers\SocialiteController::class, 'handleGoogleRedirect'])->name('google.redirect');
    Route::get('/google/callback', [\App\Http\Controllers\SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');
});
