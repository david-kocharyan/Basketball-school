<?php

namespace App\Http\Controllers\Admin;

use App\MonthPlayer;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MonthPlayerController extends Controller
{

//    Path To the View Folder
    const FOLDER = "admin.month_players";
//    Resource Title
    const TITLE = "Players of the month";
//    Resource Route
    const ROUTE = "/admin/month-players";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month_players = MonthPlayer::with('players')->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'month_players'));
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
        $title = "Create ".self::TITLE;
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
            "player_id" => "required",
            "team" => "required",
        ]);

        $player = new MonthPlayer;
        $player->player_id = $request->player_id;
        $player->team = $request->team;
        $player->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonthPlayer  $monthPlayer
     * @return \Illuminate\Http\Response
     */
    public function show(MonthPlayer $monthPlayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonthPlayer  $monthPlayer
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthPlayer $monthPlayer)
    {
        $players = Player::all();
        $route = self::ROUTE;
        $title = "Edit ".self::TITLE;
        return view(self::FOLDER . ".edit", compact('route', 'title', 'players', 'monthPlayer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonthPlayer  $monthPlayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthPlayer $monthPlayer)
    {
        $request->validate([
            "player_id" => "required",
            "team" => "required",
        ]);

        $monthPlayer->player_id = $request->player_id;
        $monthPlayer->team = $request->team;
        $monthPlayer->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonthPlayer  $monthPlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthPlayer $monthPlayer)
    {
        MonthPlayer::destroy($monthPlayer->id);
        return redirect(self::ROUTE);
    }
}
