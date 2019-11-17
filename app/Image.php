<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function event()
    {
        //return $this->belongsTo('App\Events', 'id', 'image_id');
        return $this->hasOne('App\Event');
    }
}
