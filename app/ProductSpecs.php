<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecs extends Model
{
    protected $fillable = [
    	'ar_title', 'ar_detail', 'en_title', 'en_detail',
    ];

    public function specsable(){
    	return $this->morphTo();
    }
}
