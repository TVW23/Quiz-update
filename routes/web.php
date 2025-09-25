<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuizzesController::class ,'getQuizzes'])
    ->middleware(['auth', 'verified'])->name('overzicht');

Route::get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

Route::get('/quiz/{id}',[QuizzesController::class ,'getQuiz'])->name('quiz');

Route::get('/tussenscherm', function () {
    return view('tussenscherm');
})->name('tussenscherm');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
