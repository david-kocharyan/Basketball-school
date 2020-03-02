<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

//    Path To the View Folder
    const FOLDER = "admin.team";
//    Resource Title
    const TITLE = "Teams";
//    Resource Route
    const ROUTE = "/admin/teams";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER.".index", compact("title", "route", "teams"));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create ".self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER.'.create', compact('title', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'age'=>'required'
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->gender = $request->gender;
        $team->age = $request->age;
        $team->save();

        return redirect(self::ROUTE);
    }

    /**
     * @param Team $team
     */
    public function show(Team $team)
    {
        $title = "Edit ".self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER.".show", compact('route', 'title', 'team'));
    }

    /**
     * @param Team $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Team $team)
    {
        $title = "Edit ".self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER.".edit", compact('route', 'title', 'team'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'age'=>'required'
        ]);

        $team = Team::find($id);
        $team->name = $request->name;
        $team->gender = $request->gender;
        $team->age = $request->age;
        $team->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        Team::destroy($team->id);
        return redirect(self::ROUTE);
    }
}
