<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function images()
    {
        return $this->hasMany('App\GalleryImage', 'gallery_id', 'id');
    }
}
