<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable= [
    	'ar_name', 'en_name',
    ];

    public function country(){
    	return $this->belongsTo('App\Country');
    }
    
    public function users(){
    	return $this->hasMany('App\User');
    }

    public function shippingCos(){
    	return $this->belongsToMany('App\ShippingCompany')->withPivot('city_id', 'shipping_company_id', 'price', 'currency_id');
    }

    public function shipCheck()
    {
        return $this->belongsToMany('App\ShippingCompany')->withPivot('product_id', 'shipping_company_id', 'city_id', 'price', 'currency_id', 'duration', 'tracking');
    }
    
    
}
