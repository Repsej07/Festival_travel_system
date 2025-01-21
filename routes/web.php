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
    ->only(['index', 'store', 'searchusers'])
    ->middleware(['auth', 'verified', 'admin']);
Route::get('/admin/searchusers', [AdminController::class, 'searchUsers'])->name('admin.searchusers');
Route::get('/admin/searchfestivals', [AdminController::class, 'searchFestivals'])->name('admin.searchfestivals');
Route::get('/admin/searchbusreizen', [AdminController::class, 'searchBusreizen'])->name('admin.searchbusreizen');

// Admin-specific festival routes

Route::get('/admin/festivals/create', [AdminController::class, 'createFestival'])->name('admin.festivals.create');
Route::post('/admin/festivals/store', [AdminController::class, 'storeFestival'])->name('admin.festivals.store');
Route::get('/admin/festivals/{festival}/edit', [AdminController::class, 'editFestival'])->name('admin.festival.edit');
Route::patch('/admin/festivals/{festival}', [AdminController::class, 'updateFestival'])->name('admin.festival.update');
Route::delete('/admin/festivals/{festival}', [AdminController::class, 'destroyFestival'])->name('admin.festival.delete');

// Admin-specific busreizen routes

Route::get('/admin/busreizen/create', [AdminController::class, 'createBusreis'])->name('admin.busreizen.create');
Route::post('/admin/busreizen/store', [AdminController::class, 'storeBusreis'])->name('admin.busreizen.store');
Route::get('/admin/busreizen/{busreis}/edit', [AdminController::class, 'editBusreis'])->name('admin.busreis.edit');
Route::patch('/admin/busreizen/{busreis}', [AdminController::class, 'updateBusreis'])->name('admin.busreis.update');
Route::delete('/admin/busreizen/{busreis}', [AdminController::class, 'destroyBusreis'])->name('admin.busreis.delete');

// Admin-specific user routes

Route::get('/admin/user/create', [AdminController::class, 'createUser'])->name('admin.user.create');
Route::get('/admin/user/{user}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
Route::patch('/admin/user/{user}', [AdminController::class, 'updateUser'])->name('admin.user.update');
Route::post('/admin/user/store', [AdminController::class, 'storeUser'])->name('admin.user.store');
Route::delete('/admin/user/{user}', [AdminController::class, 'destroyUser'])->name('admin.user.delete');
require __DIR__ . '/auth.php';
