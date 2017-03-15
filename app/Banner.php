<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
    	'position', 'ar_image_path', 'en_image_path', 'url', 'banner_owner', 'store_id',
    ];
}
