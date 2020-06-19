<?php

namespace App\Http\Controllers\Admin;

use App\Center;
use App\Club;
use App\Game;
use App\GameClub;
use App\Http\Controllers\Controller;
use App\Tournament;
use Illuminate\Http\Request;

class GameController extends Controller
{

    const FOLDER = "admin.game";
    const TITLE = "Games";
    const ROUTE = "/admin/games";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::with(['game_club', 'club', 'center'])->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'games'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournament = Tournament::all();
        $club = Club::all();
        $center = Center::all();

        $route = self::ROUTE;
        $title = "Create " . self::TITLE;
        return view(self::FOLDER . ".create", compact('route', 'title', 'tournament', 'club', 'center'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "club_1" => "required|numeric",
            "club_2" => "required|numeric",
            "competition" => "required",
            "venue" => "required",
            "round" => "required",
            "date" => "required",
            "time" => "required",
        ]);

        $game = new Game;
        $game->tournament = $request->competition;
        $game->center_id = $request->venue;
        $game->type = $request->round;
        $game->date = $request->date;
        $game->time = $request->time;
        $game->save();

        if ($game->id) {
            $club_1 = new GameClub;
            $club_1->game_id = $game->id;
            $club_1->club_id = $request->club_1;
            $club_1->save();

            $club_2 = new GameClub;
            $club_2->game_id = $game->id;
            $club_2->club_id = $request->club_2;
            $club_2->save();
        }

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $club = Club::all();
        $center = Center::all();

        $route = self::ROUTE;
        $title = "Edit " . self::TITLE;
        return view(self::FOLDER . ".edit", compact('route', 'title', 'club', 'center', 'game'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Game                $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            "club_1" => "required|numeric",
            "club_2" => "required|numeric",
            "competition" => "required",
            "venue" => "required",
            "round" => "required",
            "date" => "required",
            "time" => "required",
        ]);

        $game->tournament = $request->competition;
        $game->center_id = $request->venue;
        $game->type = $request->round;
        $game->date = $request->date;
        $game->time = $request->time;
        $game->save();

        $game_club = GameClub::where('game_id', $game->id)->get();
        $club_1 = $game_club[0];
        $club_1->game_id = $game->id;
        $club_1->club_id = $request->club_1;
        $club_1->save();

        $club_2 = $game_club[1];
        $club_2->game_id = $game->id;
        $club_2->club_id = $request->club_2;
        $club_2->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        GameClub::where('game_id', $game->id)->delete();
        Game::destroy($game->id);

        return redirect(self::ROUTE);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish($id)
    {
        $game = Game::with(['game_club', 'club', 'center'])->where('id', $id)->first();
        $route = self::ROUTE;
        $title = "Finish " . self::TITLE;
        return view(self::FOLDER . ".finish", compact('route', 'title', 'game'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function finish_game(Request $request, $id)
    {
        $request->validate([
            'score_1' => "required",
            'score_2' => "required",
            'player' => "required",
        ]);

        $game = Game::where('id', $id)->first();
        $game->best_player = $request->player;
        $game->pts = $request->pts;
        $game->rb = $request->rb;
        $game->ast = $request->ast;
        $game->stl = $request->stl;
        $game->blk = $request->blk;
        $game->status = 1;
        $game->save();

        $game_club = GameClub::where('game_id', $id) ->get();

        $club_1 = $game_club[0];
        $club_1->score = $request->score_1;
        $club_1->save();

        $club_2 = $game_club[1];
        $club_2->score = $request->score_2;
        $club_2->save();

        return redirect(self::ROUTE);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish_edit($id)
    {
        $game = Game::with(['game_club', 'club', 'center'])->where('id', $id)->first();
        $route = self::ROUTE;
        $title = "Edit Finished " . self::TITLE;
        return view(self::FOLDER . ".finish_edit", compact('route', 'title', 'game'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function finish_game_edit(Request $request, $id)
    {
        $request->validate([
            'score_1' => "required",
            'score_2' => "required",
            'player' => "required",
        ]);

        $game = Game::where('id', $id)->first();
        $game->best_player = $request->player;
        $game->pts = $request->pts;
        $game->rb = $request->rb;
        $game->ast = $request->ast;
        $game->stl = $request->stl;
        $game->blk = $request->blk;
        $game->status = 1;
        $game->save();

        $game_club = GameClub::where('game_id', $id) ->get();

        $club_1 = $game_club[0];
        $club_1->score = $request->score_1;
        $club_1->save();

        $club_2 = $game_club[1];
        $club_2->score = $request->score_2;
        $club_2->save();

        return redirect(self::ROUTE);
    }

}
