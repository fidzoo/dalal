<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id', 'store_id', 'order_status', 'payment_status' 
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function items(){
    	return $this->hasMany('App\OrderItem');
    }

    public function store(){
    	return $this->belongsTo('App\Store');
    }
}
