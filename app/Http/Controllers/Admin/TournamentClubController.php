<?php

namespace App\Http\Controllers\Admin;

use App\Club;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\TournamentClub;
use Illuminate\Http\Request;

class TournamentClubController extends Controller
{

    const FOLDER = "admin.standings.tournament_clubs";
    const TITLE = "Tournament Clubs";
    const ROUTE = "/admin/tournament-clubs";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = TournamentClub::with(['tournament','club'])->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'clubs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournament = Tournament::all();
        $clubs = Club::all();
        $route = self::ROUTE;
        $title = 'Create ' . self::TITLE;
        return view(self::FOLDER . ".create", compact('route', 'title', "tournament", "clubs"));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "tournament" => "required",
            "club" => "required",
            "rank" => "required",
            "win" => "required",
            "lose" => "required",
            "points" => "required",
        ]);

        $tournament = new TournamentClub;
        $tournament->tournament_id = $request->tournament;
        $tournament->club_id = $request->club;
        $tournament->rank = $request->rank;
        $tournament->win = $request->win;
        $tournament->lose = $request->lose;
        $tournament->points = $request->points;
        $tournament->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\TournamentClub $tournamentClub
     * @return \Illuminate\Http\Response
     */
    public function show(TournamentClub $tournamentClub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\TournamentClub $tournamentClub
     * @return \Illuminate\Http\Response
     */
    public function edit(TournamentClub $tournamentClub)
    {
        $tournament = Tournament::all();
        $clubs = Club::all();
        $route = self::ROUTE;
        $title = 'Create ' . self::TITLE;
        return view(self::FOLDER . ".edit", compact('route', 'title', "tournament", "clubs", "tournamentClub"));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\TournamentClub      $tournamentClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TournamentClub $tournamentClub)
    {
        $request->validate([
            "tournament" => "required",
            "club" => "required",
            "rank" => "required",
            "win" => "required",
            "lose" => "required",
            "points" => "required",
        ]);

        $tournamentClub->tournament_id = $request->tournament;
        $tournamentClub->club_id = $request->club;
        $tournamentClub->rank = $request->rank;
        $tournamentClub->win = $request->win;
        $tournamentClub->lose = $request->lose;
        $tournamentClub->points = $request->points;
        $tournamentClub->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\TournamentClub $tournamentClub
     * @return \Illuminate\Http\Response
     */
    public function destroy(TournamentClub $tournamentClub)
    {
        TournamentClub::destroy($tournamentClub->id);
        return  redirect(self::ROUTE);
    }
}
