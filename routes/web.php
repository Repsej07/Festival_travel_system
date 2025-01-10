<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Festival;

// Route::get('/', function () {
//     return view('Dashboard');
// });
Route::get('/', function () {
    return view('dashboard');
})->Middleware(['auth', 'verified'])->name('dashboard');
Route::get('/register', function () {
    return view('register');
});
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
// Route::get("/register", [RegisterController::class, 'create'])->name('register');
// Route::post("/register", [RegisterController::class, 'store'])->name('register.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::resource('admin', AdminController::class)
//     ->only(['index', 'store'])
//     ->middleware(['auth', 'verified']);

// Route::middleware(['admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index']);
//     Route::get('/admin/create/festival', [AdminController::class, 'create/festival']);
// });
// Route::get('/admin', function () {

// })->middleware(AdminMiddleware::class);

Route::resource('admin', AdminController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'admin']);

require __DIR__ . '/auth.php';
