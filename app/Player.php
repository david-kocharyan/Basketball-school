<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Player extends Authenticatable
{
    use Notifiable;

    protected $guard = 'player';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function playerDoc()
    {
        return $this->hasMany("App\Document", 'player_id', "id");
    }

    public function teamPlayers()
    {
        return $this->belongsToMany('App\Team', 'team_players', 'player_id', 'team_id')->withTimestamps();
    }
}
