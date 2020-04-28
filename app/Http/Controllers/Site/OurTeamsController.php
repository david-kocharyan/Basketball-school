<?php

namespace App\Http\Controllers\Site;

use App\Game;
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

    public function games()
    {
        $games = Game::with(['game_club', 'club', 'center'])->paginate(20);

        $title = "All Games";
        return view(self::VIEW . ".games", compact('title', 'games'));
    }
}
