<?php

namespace App\Http\Controllers\Admin;

use App\Ligue;
use App\LiguePlayers;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LigueController extends Controller
{
//    Path To the View Folder
    const FOLDER = "admin.ligue";
//    Resource Title
    const TITLE = "League's Teams";
//    Resource Route
    const ROUTE = "/admin/league";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligue = Ligue::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'ligue'));
    }

    /**
     * Show the form for creating a new resource.
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "group" => "required",
            "gender" => "required",
            "to" => "required",
        ]);

        $league = new Ligue;
        $league->group = $request->group;
        $league->gender = $request->gender;
        $league->save();

        foreach ($request->to as $key) {
            $league_players = new LiguePlayers;
            $league_players->player_id = $key;
            $league_players->ligue_id = $league->id;
            $league_players->save();
        }

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Ligue $ligue
     * @return \Illuminate\Http\Response
     */
    public function show(Ligue $ligue, $id)
    {
        $league =Ligue::find($id);
        dd($league);

    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Ligue $ligue
     * @return \Illuminate\Http\Response
     */
    public function edit(Ligue $ligue)
    {
        dd($ligue);
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Ligue               $ligue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ligue $ligue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Ligue $ligue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ligue $ligue)
    {
        //
    }
}
