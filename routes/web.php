<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// Default route that redirects based on user roles
Route::get('/', function () {
    if (Auth::check()) { // Check if the user is authenticated
        if (Auth::user()->admin) {
            return redirect()->route('admin.index'); // Redirect to admin page
        }
        return redirect()->route('dashboard'); // Redirect to dashboard for non-admin users
    }
    return redirect()->route('login'); // Redirect to login page if not authenticated
})->name('home');

Route::get('/register', function () {
    return view('register');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Dashboard route for authenticated non-admin users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Homepage', function () {
    return view('Homepage');
})->name('Homepage');
// Group routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-specific resource routes
Route::resource('admin', AdminController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'admin']);

require __DIR__ . '/auth.php';
