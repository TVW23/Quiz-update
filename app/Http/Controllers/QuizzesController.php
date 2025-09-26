<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;


class QuizzesController extends Controller
{
    public function getQuizzes()
    {
        $quizzes = Quiz::all();
        return view('overzicht', compact('quizzes'));
    }   

    public function getQuizzesData()
    {
        $quizzes = Quiz::with('question.answer')->get();
        return $quizzes;
    }

    public function getQuiz($id)
    {
        $quiz = Quiz::with('question.answer')->find($id);
        return view('quiz', compact('quiz'));
    }
}
