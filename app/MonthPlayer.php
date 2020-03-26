<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthPlayer extends Model
{
    public function players()
    {
        return $this->belongsTo("App\Player", 'player_id', 'id');
    }
}
