<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    		'ar_title', 'en_title', 'ar_description', 'en_description', 'path_ar', 'path_en', 'imageable_type', 'imageable_id' 
    ];

    public function imageable(){
    	return $this->morphTo();
    }
}
