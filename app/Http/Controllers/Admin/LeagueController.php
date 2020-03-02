<?php

namespace App\Http\Controllers\Admin;

use App\League;
use App\LeaguePlayer;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeagueController extends Controller
{
//    Path To the View Folder
    const FOLDER = "admin.league";
//    Resource Title
    const TITLE = "League's Teams";
//    Resource Route
    const ROUTE = "/admin/league";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $league = League::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'league'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".create", compact('route', 'title', 'players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "group" => "required",
            "gender" => "required",
            "to" => "required",
        ]);

        $league = new League();
        $league->group = $request->group;
        $league->gender = $request->gender;
        $league->save();

        foreach ($request->to as $key) {
            $league_players = new LeaguePlayer;
            $league_players->player_id = $key;
            $league_players->league_id = $league->id;
            $league_players->save();
        }

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function show(League $league)
    {
        $title = 'Show ' . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.show', compact('title', 'route', 'league'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function edit(League $league)
    {
        $players = Player::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".edit", compact('route', 'title', 'players', 'league'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, League $league)
    {
        $request->validate([
            "group" => "required",
            "gender" => "required",
            "to" => "required",
        ]);

        $league->group = $request->group;
        $league->gender = $request->gender;
        $league->save();

        $league->leaguePlayers()->sync($request->to);

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league)
    {
        $league->leaguePlayers()->detach();
        $league->delete();

        return redirect(self::ROUTE);
    }
}
