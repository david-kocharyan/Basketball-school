<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{

//    Path To the View Folder
    const FOLDER = "admin.about_us";
//    Resource Title
    const TITLE = "About us";
//    Resource Route
    const ROUTE = "/admin/about-us-story";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'about'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = self::ROUTE;
        $title = "Create " . self::TITLE . " Info";
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
            "story" => "required",
            "why" => "required",
            "mission" => "required",
            "mission_list_text" => "required|array|min:4",
        ]);

        $mission_list = array();
        for($i = 0; $i < 4; $i++){
            $mission_list[$i]['mission_list_text'] = $request->mission_list_text[$i];
        }

        $about = new About;
        $about->story = $request->story;
        $about->why = $request->why;
        $about->mission = $request->mission;
        $about->mission_list = json_encode($mission_list);
        $about->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        $route = self::ROUTE;
        $title = "Create " . self::TITLE . " Info";
        return view(self::FOLDER . ".edit", compact('route', 'title', "about"));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\About               $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "story" => "required",
            "why" => "required",
            "mission" => "required",
            "mission_list_text" => "required|array|min:4",
        ]);

        $mission_list = array();
        for($i = 0; $i < 4; $i++){
            $mission_list[$i]['mission_list_text'] = $request->mission_list_text[$i];
        }

        $about = About::find($id);

        $about->story = $request->story;
        $about->why = $request->why;
        $about->mission = $request->mission;
        $about->mission_list = json_encode($mission_list);
        $about->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        About::destroy($about->id);
        return redirect(self::ROUTE);
    }
}
