<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'age',
    ];

    public function players()
    {
            return $this->belongsToMany('App\Player', 'team_players', 'team_id', 'player_id')->withTimestamps();
    }
}
