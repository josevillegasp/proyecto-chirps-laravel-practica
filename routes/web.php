<?php

use App\Http\Controllers\ChirpsController;
use App\Http\Controllers\ProfileController;
use App\Models\Chirp;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');

// Route::get('/chirps', function () {
//     return 'welcome to our chirps page';
// })->name('chirps.index');
//Chirp
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard','dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::get('/chirps', [ChirpsController::class, 'index'])->name('chirps.index');

    Route::post('/chirps', [ChirpsController::class, 'store'])->name('chirps.store');
    
    Route::get('/chirps/{chirp}/edit', [ChirpsController::class, 'edit'])->name('chirps.edit');
    Route::put('/chirps/{chirp}', [ChirpsController::class, 'update'])->name('chirps.update');
    Route::delete('/chirps/{chirp}', [ChirpsController::class, 'destroy'])->name('chirps.destroy');
});

require __DIR__.'/auth.php';
