<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['order'];

    public function images()
    {
        return $this->hasMany('App\GalleryImage', 'gallery_id', 'id');
    }
}
