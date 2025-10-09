<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserQuizPointsController;

Route::get('/', [QuizzesController::class ,'getQuizzes'])
    ->middleware(['auth', 'verified'])->name('overzicht');

// Route naar leaderboard
Route::get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

// Route to store points in lb
Route::post('/user-quiz-points', [UserQuizPointsController::class, 'setUserQuizPoints']);

Route::get('/quiz/{id}',[QuizzesController::class ,'getQuiz'])->name('quiz');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/overzicht', [QuizzesController::class ,'getQuizzes'])
    ->middleware(['auth', 'verified'])->name('overzicht.page');

Route::get('/quiz', function () {
    return view('quiz');
})->name('quiz.view');

Route::get('/tussenscherm', function () {
    return view('tussenscherm');
})->name('tussenscherm');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
