<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable= [
    	'ar_name', 'en_name', 'image_path'
    ];

    public function users(){
    	return $this->hasMany('App\User');
    }

    public function cities(){
    	return $this->hasMany('App\City');
    }
}
