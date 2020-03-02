<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $guarded = [];


    public function coachDoc()
    {
        return $this->hasMany('App\Certificate', 'coaches_id', 'id');
    }
}
