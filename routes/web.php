<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('/about', 'pages::about')->name('about');
Route::livewire('/services', 'pages::service')->name('services');
Route::livewire('/projects', 'pages::project')->name('projects');
Route::livewire('/contact', 'pages::contact')->name('contact');
Route::livewire('/careers', 'pages::career')->name('careers');
Route::livewire('/login', 'auth.login')->middleware('guest')->name('login');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::livewire('/', 'admin::dashboard')->name('admin.dashboard');
    Route::livewire('/settings', 'admin::setting')->name('admin.settings');
    Route::livewire('/categories', 'admin::category.category-list')->name('admin.categories');
    Route::livewire('/projects', 'admin::project-list')->name('admin.projects');
    Route::livewire('/sliders', 'admin::slider-list')->name('admin.sliders');
    Route::livewire('/testimonials', 'admin::testimonial-list')->name('admin.testimonials');
    Route::livewire('/contacts', 'admin::contactlist')->name('admin.contacts');
    Route::livewire('/careers', 'admin::careerlist')->name('admin.careers');
    Route::livewire('/careers/create', 'admin::careerlist.careerlisform')->name('admin.careers.create');
    Route::livewire('/careers/edit/{id}', 'admin::careerlist.careerlisform')->name('admin.careers.edit');
    Route::livewire('/careers/applied', 'admin::applied-job')->name('admin.careers.applied');
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->middleware('auth')->name('logout');