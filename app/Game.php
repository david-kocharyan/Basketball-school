<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function game_club()
    {
        return $this->hasMany('App\GameClub' , "game_id", "id");
    }

    public function club()
    {
        return $this->hasManyThrough('App\Club','App\GameClub', "game_id", "id","id", "club_id");
    }

    public function center()
    {
        return $this->belongsTo('App\Center' , "center_id", "id");
    }

}
