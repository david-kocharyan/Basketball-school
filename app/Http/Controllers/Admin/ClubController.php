<?php

namespace App\Http\Controllers\Admin;

use App\Club;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    const FOLDER = "admin.club";
    const TITLE = "Clubs";
    const ROUTE = "/admin/clubs";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER.".index", compact('route','title','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = self::ROUTE;
        $title = 'Create '.self::TITLE;
        return view(self::FOLDER.".create", compact('route','title'));
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
            "name" => "required",
            "short_name" => "required",
            "image" => "required|image|max:2048",
        ]);

        $club = new Club;
        if ($request->image) {
            $img_name = Storage::disk('public')->put('clubs/', $request->image);
            $club->image = basename($img_name);
        }
        $club->name = $request->name;
        $club->short_name = $request->short_name;
        $club->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        $title = 'Edit ' . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.edit', compact('title', 'route', 'club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
            "name" => "required",
            "short_name" => "required",
            "image" => "image|max:2048",
        ]);

        if ($request->image) {
            Storage::disk('public')->delete("clubs/$club->image");
            $img_name = Storage::disk('public')->put('clubs/', $request->image);
            $club->image = basename($img_name);
        }
        $club->name = $request->name;
        $club->short_name = $request->short_name;
        $club->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        Storage::disk('public')->delete("clubs/$club->image");
        Club::destroy($club->id);
        return redirect(self::ROUTE);
    }
}
