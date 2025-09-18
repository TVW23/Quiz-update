<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\UserQuizPoints;

class UserQuizPointsController extends Controller
{
    public function getUserQuizPoints($userId)
    {
        $userQuizPoints = UserQuizPoints::with('quiz')
            ->where('user_id', $userId)
            ->get();

        return $userQuizPoints;
    }
}
