<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
    	'ar_name', 'en_name',
    ];

    public function subCategory(){
        return $this->belongsToMany('App\Product');
    }
}
