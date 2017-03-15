<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommercialImage extends Model
{
    protected $fillable = [
    	'image_path'
    ];

    public function product(){
    	$this->belongsTo('App\Product');
    }
}
