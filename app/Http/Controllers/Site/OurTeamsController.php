<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\League;
use Illuminate\Http\Request;

class OurTeamsController extends Controller
{
    const VIEW = "site.our_teams";
    const TITLE = "Our Teams";

    public function index()
    {
        $league = League::with('leaguePlayers')->get();

        $title = "Rosters";
        return view(self::VIEW . ".index", compact('title', 'league'));
    }
}
