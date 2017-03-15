<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $fillable= [
    	'product_id', 'user_id', 'rating'
    ];
}
