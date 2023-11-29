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

Route::prefix('store')->name('store.')->group(function () {
    Route::get('/product', App\Livewire\Store\Product::class)->name('product');
    Route::get('/product/detail/{id}', App\Livewire\Store\ProductDetail::class)->name('product.detail');
});


Route::prefix('adminpage')->name('adminpage.')->middleware('guest')->group(function () {
    Route::get('/dashboard', App\Livewire\Adminpage\Dashboard::class)->name('dashboard');
    Route::get('/product', App\Livewire\Adminpage\Product::class)->name('product');
    Route::get('/product/add', App\Livewire\Adminpage\AddProduct::class)->name('add.product');
});
