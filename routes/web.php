<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Dashboard');
// });
Route::get('/', function(){
    return view('dashboard');

})->Middleware(['auth', 'verified'])->name('dashboard');
Route::get('/register', function () {
    return view('register');
});
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

require __DIR__.'/auth.php';
