<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Question;


class QuizzesController extends Controller
{
    public function getQuizzes()
    {
        $quizzes = Quiz::with('question.answer')->get();
        return $quizzes;
    }
}
