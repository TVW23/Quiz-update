<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\UserQuizPoints;

class UserQuizPointsController extends Controller
{
    public function getUserQuizPoints(int $userId)
    {
        $userQuizPoints = UserQuizPoints::where('user_id', $userId)->get();
        
        return $userQuizPoints;
    }
}
