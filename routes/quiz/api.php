<?php
use App\Http\Controllers\Api\QuizController;
use Illuminate\Support\Facades\Route;

Route::post('/check-quiz-answer', [QuizController::class, 'checkQuizAnswer']);
Route::post('/quiz-end', [QuizController::class, 'quizEnd']);
Route::get('/get-quiz-question', [QuizController::class, 'getQuizQuestion']);