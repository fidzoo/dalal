<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
    		'ar_size', 'en_size'
    ];

    public function subCategories(){
    	return $this->belongsToMany('App\SubCategory');
    }

    public function products(){
    	return $this->belongsToMany('App\Product');
    }
}
