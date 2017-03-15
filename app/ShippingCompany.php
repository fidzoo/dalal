<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    protected $fillable= [
    	'ar_name', 'en_name', 'image'
    ];

    public function cities(){
    	return $this->belongsToMany('App\City')->withPivot('city_id', 'shipping_company_id', 'price', 'currency_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('product_id', 'shipping_company_id', 'city_id', 'price', 'currency_id', 'duration', 'tracking');
    }

    public function cit()
    {
        return $this->belongsToMany('App\City');
    }
}
