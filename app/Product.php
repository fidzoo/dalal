<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'approve', 'store_id', 'sub_category_id', 'ar_title', 'en_title', 'ar_short_descrip', 'en_short_descrip', 'ar_long_descrip', 'en_long_descrip', 'price', 'price_type', 'currency_id', 'stock', 'sell_count', 'colors_type'
    ];

    public function subCategory(){
        return $this->belongsTo('App\SubCategory');
    }

    public function store(){
    	return $this->belongsTo('App\Store');
    }

    public function sizes(){
        return $this->belongsToMany('App\Size');
    }

    public function productImages(){
        return $this->hasMany('App\ProductImage');
    }

    public function commercialImages(){
        return $this->hasMany('App\CommercialImage');
    }

    public function specs(){
    	return $this->morphMany('App\ProductSpecs', 'specsable');
    }

    public function colors(){
        return $this->morphMany('App\Color', 'colorable');
    }

    public function colorimages(){
        return $this->morphMany('App\ColorImage', 'colorimageable');
    }

    public function currency(){
        return $this->belongsTo('App\Currency');
    }

    public function shippingCos()
    {
        return $this->belongsToMany('App\ShippingCompany')->withPivot('product_id', 'shipping_company_id', 'city_id', 'price', 'currency_id', 'duration', 'tracking');
    }

    public function qtyOffers()
    {
        return $this->hasMany('App\QtyOffer');
    }

    public function rating()
    {
        return $this->hasMany('App\ProductRating');
    }

}
