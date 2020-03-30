<?php

namespace App\Http\Controllers\Admin;

use App\OurTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{

//    Path To the View Folder
    const FOLDER = "admin.about_us.our_team";
//    Resource Title
    const TITLE = "Our Team";
//    Resource Route
    const ROUTE = "/admin/about-us-team";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_team = OurTeam::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'our_team'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = self::ROUTE;
        $title = "Create " . self::TITLE . " Member";
        return view(self::FOLDER . ".create", compact('route', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "status" => "required",
            "info" => "required",
            "image" => "required|image|max:5000",
        ]);

        if ($request->image){
            $image_name =  Storage::disk('public')->put('our_team/', $request->image);
        }

        $ourTeam = new OurTeam;
        $ourTeam->name = $request->name;
        $ourTeam->status = $request->status;
        $ourTeam->info = $request->info;
        $ourTeam->image = basename($image_name);
        $ourTeam->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\OurTeam $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function show(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\OurTeam $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ourTeam = OurTeam::find($id);

        $route = self::ROUTE;
        $title = "Edit " . self::TITLE . " Member";
        return view(self::FOLDER . ".edit", compact('route', 'title', "ourTeam"));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\OurTeam             $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "status" => "required",
            "info" => "required",
            "image" => "mimes:jpeg,jpg,png|max:5000",
        ]);

        $ourTeam = OurTeam::find($id);

        if ($request->image){
            Storage::disk('public')->delete("our_team/$ourTeam->image");
            $image_name =  Storage::disk('public')->put('our_team/', $request->image);
            $ourTeam->image = basename($image_name);
        }

        $ourTeam->name = $request->name;
        $ourTeam->status = $request->status;
        $ourTeam->info = $request->info;
        $ourTeam->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\OurTeam $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ourTeam = OurTeam::find($id);
        Storage::disk('public')->delete("our_team/$ourTeam->image");
        OurTeam::destroy($ourTeam->id);

        return redirect(self::ROUTE);
    }
}
