<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable= [
    	'ar_name', 'en_name',
    ];

    public function country(){
    	return $this->belongsTo('App\Country');
    }
    
    public function users(){
    	return $this->hasMany('App\User');
    }
}
