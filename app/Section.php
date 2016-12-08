<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable= [
    	'ar_title', 'en_title', 'image'
    ];

    public function mainCategories(){
    	return $this->hasMany('App\MainCategory');
    }
}
