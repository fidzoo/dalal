<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = ['id','item','ar_content','en_content','image'];
}
