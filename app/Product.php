<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'ar_title', 'en_title', 'ar_short_descrip', 'en_short_descrip', 'ar_long_descrip', 'en_long_descrip', 'stock',
    ];

    public function store(){
    	return $this->belongsTo('App\Store');
    }

    public function specs(){
    	return $this->morphMany('App\ProductSpecs', 'specsable');
    }
}
