<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function getCategory()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function getImages()
    {
        return $this->hasMany('App\ProductImage', 'product_id', 'id');
    }

}
