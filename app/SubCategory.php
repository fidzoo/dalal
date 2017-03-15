<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable= [
    	'ar_title', 'en_title'
    ];

    public function mainCategories(){
    	return $this->belongsToMany('App\MainCategory');
    }

    public function sizes(){
    	return $this->belongsToMany('App\Size');
    }

    public function specs(){
    	return $this->morphMany('App\ProductSpecs', 'specsable');
    }

    public function stores(){
        return $this->belongsToMany('App\Store');
    }
}
