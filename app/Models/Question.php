<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';
    protected $fillable = ['identifier', 'question'];

    public function answer(){
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function quiz()
    {
        return $this-> belongsTo(Quiz::class, 'quiz_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
