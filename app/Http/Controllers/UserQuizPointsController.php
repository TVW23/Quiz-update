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
    
    public function setUserQuizPoints(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required|integer',
            'points'  => 'required|integer',
        ]);

        $userId = Auth::id();

        // Find existing record
        $userQuizPoints = UserQuizPoints::where('user_id', $userId)
            ->where('quiz_id', $request->quiz_id)
            ->first();

        if ($userQuizPoints) 
        {
            // Only update if new points are higher
            if ($request->points > $userQuizPoints->points) 
            {
                $userQuizPoints->update(
                [
                    'points' => $request->points,
                ]);
            }
        } else 
        {
            // Create new record if none exists
            $userQuizPoints = UserQuizPoints::create([
                'user_id' => $userId,
                'quiz_id' => $request->quiz_id,
                'points'  => $request->points,
            ]);
        }

        return response()->json([
            'message' => 'Points saved!',
            'data'    => $userQuizPoints,
        ]);
    }

}
