<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Additional demo routes
Route::get('/about', function () {
    return view('layouts.app', [
        'title' => 'About Us'
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('layouts.app', [
        'title' => 'Contact Us'
    ]);
})->name('contact');
