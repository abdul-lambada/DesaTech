<?php

use Illuminate\Support\Facades\Route;

// Include auth routes
require __DIR__.'/auth.php';

// Auth view routes for Vue SPA
Route::get('/login', function () {
    return view('app');
})->name('login');

Route::get('/register', function () {
    return view('app');
})->name('register');

// Dashboard route - return view for Vue SPA
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Serve Vue app for all other routes
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
