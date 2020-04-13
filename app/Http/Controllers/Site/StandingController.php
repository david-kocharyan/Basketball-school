<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Tournament;

class StandingController extends Controller
{
    const VIEW = "site.standings";
    const TITLE = "Standings";

    /**
     * About Us
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $standings = Tournament::with(["tournament_clubs", "clubs"])->paginate(3);
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title", "standings"));
    }

}
