<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    function image()
    {
        //return $this->hasOne('App\Image', 'id', 'image_id');
        return $this->belongsTo('App\Image');
    }
}
