<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $guarded = [];

    public function leaguePlayers()
    {
        return $this->belongsToMany('App\Player', 'league_players', 'league_id', 'player_id')->withTimestamps();
    }
}
