<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    public function article()
    {
        return $this->belongsToMany('App\Article');
    }
}
