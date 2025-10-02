<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\DB;
use \App\Models\UserQuizPoints;

class UserQuizPointsController extends Controller
{
    public function getUserQuizPoints(int $userId)
    {
        $userQuizPoints = UserQuizPoints::where('user_id', $userId)->get();
        
        return $userQuizPoints;
    }

    public function setUserQuizPoints(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required|integer',
            'points'  => 'required|integer',
        ]);

        $userId = session('user_id'); 

        $userQuizPoints = UserQuizPoints::updateOrCreate(
            [
                'user_id' => $userId,
                'quiz_id' => $request->quiz_id,
            ],
            [
                'points' => $request->points,
            ]
        );

        return response()->json([
            'message' => 'Points saved!',
            'data'    => $userQuizPoints,
        ]);
    }
}
