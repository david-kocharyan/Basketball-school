<?php

namespace App\Http\Controllers\Site;

use App\Coach;
use App\Http\Controllers\Controller;
use App\Player;
use App\Schedule;
use App\Team;
use Illuminate\Http\Request;

class AcademyMembersController extends Controller
{
    const VIEW = "site.members";
    const TITLE = "Academy Members";
    /**
     * About Us
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $teams = Team::with('players')->get();
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title", 'teams'));
    }

    public function schedule()
    {
        $schedule = Schedule::with(['team', 'date'])->get();
        $coaches = Coach::limit(3)->get();
        $title = "Training & Coaches";
        return view(self::VIEW . ".schedule", compact('title', 'schedule', 'coaches'));
    }
}
