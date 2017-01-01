<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'ar_title', 'en_title', 'ar_short_descrip', 'en_short_descrip', 'ar_long_descrip', 'en_long_descrip', 'stock', 'colors_type'
    ];

    public function productImages(){
        return $this->hasMany('App\ProductImage');
    }

    public function store(){
    	return $this->belongsTo('App\Store');
    }

    public function sizes(){
    	return $this->morphMany('App\Size', 'sizeable');
    }

    public function specs(){
    	return $this->morphMany('App\ProductSpecs', 'specsable');
    }

    public function colors(){
        return $this->morphMany('App\Color', 'colorable');
    }

    public function colorimage(){
        return $this->morphMany('App\ColorImage', 'colorimageable');
    }

}
