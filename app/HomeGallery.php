<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{
    public function album()
    {
        return $this->belongsTo("App\Gallery", 'album_id', 'id');
    }
}
