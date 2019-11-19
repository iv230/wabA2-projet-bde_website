<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    protected $fillable = ['name', 'description', 'price', 'category'];

    public function basket()
    {
        return $this->belongsToMany('App\Basket');
    }
}
