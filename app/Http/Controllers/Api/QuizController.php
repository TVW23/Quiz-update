<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function checkQuizAnswer(Request $request)
    {
        $isCorrect = false;
        $answer = $request->input('answer');

        // Get the actual answer from the DB
        $actualAnswer = null;

        if ($actualAnswer === $answer) {
            $isCorrect = true;
        }

        return response()->json(['answer' => $isCorrect]);
    }

    public function quizEnd(Request $request)
    {
        $points = $request->input('points');

        // Store points in DB

        return response()->json(['success' => true]);
    }

    public function getQuizQuestion()
    {
        // Dummy data for now
        $question = "What is the capital of France?";
        
        $answers = [
            "Paris",
            "London",
            "Berlin",
            "Madrid"
        ];

        return response()->json([
            'question' => $question,
            'answers' => $answers
        ]);
    }
}