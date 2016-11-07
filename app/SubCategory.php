<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable= [
    	'ar_title', 'en_title'
    ];

    public function mainSection(){
    	return $this->belongsToMany('App\MainSection');
    }

}
