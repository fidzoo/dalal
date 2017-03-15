<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'user_data';

    protected $fillable= [
    	'user_id', 'full_name', 'default_data', 'email', 'address', 'country_id', 'city_id', 'zip',  'tel_code', 'tel_number'
    ];
}
