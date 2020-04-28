<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    public function team()
    {
        return $this->belongsTo('App\Team', "team_id", "id");
    }

    public function date()
    {
        return $this->hasMany('App\ScheduleDate', "schedule_id", "id");
    }

}
