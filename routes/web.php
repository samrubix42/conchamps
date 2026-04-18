<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('/about', 'pages::about')->name('about');
Route::livewire('/projects', 'pages::project')->name('projects');
Route::livewire('/contact', 'pages::contact')->name('contact');
Route::livewire('/login', 'auth.login')->middleware('guest')->name('login');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::livewire('/', 'admin::dashboard')->name('admin.dashboard');
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->middleware('auth')->name('logout');