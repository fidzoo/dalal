<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable= [
    	'ar_role', 'en_role', 'description'
    ];

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
