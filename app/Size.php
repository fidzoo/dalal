<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
    		'ar_size', 'en_size', 'sizeable_type', 'sizeable_id'
    ];

    public function sizeable(){
    	return $this->morphTo();
    }
}
