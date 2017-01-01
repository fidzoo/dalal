<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorImage extends Model
{
    protected $fillable= [
    	'image_path'
    ];

    public function colorimageable(){
    	return $this->morphTo();
    }
}
