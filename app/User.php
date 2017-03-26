<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active', 'name', 'email', 'password', 'country_code', 'phone', 'info', 'address', 'user_type', 'country_id', 'city_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userDate(){
        return $this->hasOne('App\UserData');
    }
    
    public function country(){
        return $this->belongsTo('App\Country');
    }
    
    public function city(){
        return $this->belongsTo('App\City');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function stores(){
        return $this->hasMany('App\Store');
    }

    //cutome "favorites" table
    public function favorites(){
        return $this->belongsToMany('App\Product', 'favorites');
    }

    public function orders(){
        return $this->hasMany('App\Product');
    }
}
