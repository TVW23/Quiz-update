<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\UserQuizPoints;
use Illuminate\Support\Facades\Auth;

class UserQuizPointsController extends Controller
{
    public function getUserQuizPoints(int $userId)
    {
        $userQuizPoints = UserQuizPoints::where('user_id', $userId)->get();
        
        return $userQuizPoints;
    }

    public function getUserQuizPointsByQuizId(int $quizId)
    {
        $userQuizPoints = UserQuizPoints::with('user')
            ->where('quiz_id', $quizId)
            ->orderBy('points', 'desc')
            ->limit(10)
            ->get();

        return view('leaderboard', compact('userQuizPoints'));
    }

    public function getTopThreeQuizPointsByQuizId(int $quizId)
    {
        
    }

    public function setUserQuizPoints(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required|integer',
            'points'  => 'required|integer',
        ]);

        $userId = Auth::id(); 

        $userQuizPoints = UserQuizPoints::updateOrCreate(
            [
                'user_id' => $userId,
                'quiz_id' => $request->quiz_id,
            ],
            [
                'points' => $request->points,
            ]
        );

//        $userQuizPoints->save();
        
        return response()->json([
            'message' => 'Points saved!',
            'data'    => $userQuizPoints,
        ]);
    }
}
