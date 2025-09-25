<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;


class QuizzesController extends Controller
{
    public function GetQuizzes()
    {
        $quizzes = Quiz::all();
        return $quizzes;
    }

    public function getQuizzesData()
    {
        $quizzes = Quiz::with('question.answer')->get();
        return $quizzes;
    }

    public function getQuiz($id)
    {
        $quiz = Quiz::with('question.answer')->find($id);
        return $quiz;
    }
}
