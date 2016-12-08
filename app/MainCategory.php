<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable= [
    	'ar_title', 'en_title', 'image', 'section_id'
    ];

    public function section(){
    	return $this->belongsTo('App\Section');
    }

	public function subCategories(){
    	return $this->belongsToMany('App\SubCategory');
    }    
}
