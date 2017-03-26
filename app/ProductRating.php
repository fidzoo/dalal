<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $fillable= [
    	'product_id', 'user_id', 'rating'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
