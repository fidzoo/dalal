<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'ar_question', 'en_question', 'ar_answer', 'en_answer'
    ];
}
