<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route naar leaderboard

Route::get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

// Route naar Mockup
Route::get('/overzicht', function () {
    return view('overzicht');
})->middleware(['auth', 'verified'])->name('overzicht');

Route::get('/quiz', function () {
    return view('quiz');
})->name('quiz');

Route::get('/tussenscherm', function () {
    return view('tussenscherm');
})->name('tussenscherm');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
