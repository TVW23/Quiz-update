<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['choice', 'is_correct'];

    public function question (){
        return $this->belongsTo(Question::class);
    }
}
