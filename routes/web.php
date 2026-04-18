<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('/home2', 'pages::home2')->name('home2');
Route::livewire('/about', 'pages::about')->name('about');
Route::livewire('/projects', 'pages::project')->name('projects');
Route::livewire('/contact', 'pages::contact')->name('contact');