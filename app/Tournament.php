<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{

    public function tournament_clubs()
    {
        return $this->hasMany('App\TournamentClub', "tournament_id", "id")->orderBy('rank', 'ASC');
    }

    public function clubs()
    {
        return $this->hasManyThrough('App\Club','App\TournamentClub', "tournament_id", "id","id", "club_id")->orderBy('rank', 'ASC');
    }

}
