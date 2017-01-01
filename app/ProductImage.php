<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
    	'image_path'
    ];

    public function product(){
    	$this->belongsTo('App\Product');
    }
}
