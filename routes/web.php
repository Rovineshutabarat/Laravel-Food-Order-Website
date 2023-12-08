<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\AppController::class, 'index'])->name('homepage');
Route::get('/about', [\App\Http\Controllers\AppController::class, 'about'])->name('about');

Route::post('/post/feedback', [\App\Http\Controllers\AppController::class, 'postFeedback'])->name('post.feedback');

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
    Route::get('/product', App\Livewire\Store\Product::class)->name('product')->lazy();
    Route::get('/product/detail/{id}', App\Livewire\Store\ProductDetail::class)->name('product.detail');
    Route::get('/profile/{id}', App\Livewire\Store\Profile::class)->name('profile');
    Route::get('/order', App\Livewire\Store\Order::class)->name('order');
});


Route::prefix('adminpage')->name('adminpage.')->middleware('auth', 'admin')->group(function () {
    Route::get('/dashboard', App\Livewire\Adminpage\Dashboard::class)->name('dashboard');
    Route::get('/product', App\Livewire\Adminpage\Product::class)->name('product');
    Route::get('/product/add', App\Livewire\Adminpage\AddProduct::class)->name('add.product');
    Route::get('/product/edit/{id}', App\Livewire\Adminpage\EditProduct::class)->name('edit.product');
    Route::get('/user', App\Livewire\Adminpage\User::class)->name('user');
    Route::get('/product/category', App\Livewire\Adminpage\Category::class)->name('product.category');
    Route::get('/product/category/add', App\Livewire\Adminpage\AddCategory::class)->name('product.category.add');
    Route::get('/product/category/edit/{id}', App\Livewire\Adminpage\EditCategory::class)->name('product.category.edit');
    Route::get('/profile/{id}', App\Livewire\Adminpage\Profile::class)->name('profile');
    Route::get('/transcation', App\Livewire\Adminpage\Transcation::class)->name('transcation');
});
