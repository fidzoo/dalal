<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreRating extends Model
{
    protected $fillable= [
    	'store_id', 'user_id', 'rating', 'comment'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
