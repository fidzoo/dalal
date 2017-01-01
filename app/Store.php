<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
    	'ar_name', 'en_name', 'ar_description', 'en_description', 'ar_logo', 'en_logo', 'ar_banner', 'en_banner', 'user_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
