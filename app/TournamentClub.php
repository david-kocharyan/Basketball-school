<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentClub extends Model
{

    public function tournament()
    {
        return $this->belongsTo("App\Tournament", 'tournament_id', 'id');
    }

    public function club()
    {
        return $this->belongsTo("App\Club", 'club_id', 'id');
    }
}
