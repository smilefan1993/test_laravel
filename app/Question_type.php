<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_type extends Model
{
    public function questionType()
    {
        return $this->hasMany('App\Question');
    }

}
