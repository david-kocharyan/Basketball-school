<?php

namespace App\Http\Controllers\Admin;

use App\Center;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
//    Path To the View Folder
    const FOLDER = "admin.center";
//    Resource Title
    const TITLE = "Centers";
//    Resource Route
    const ROUTE = "/admin/center";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $center = Center::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER.".index", compact('route','title','center'));
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
            "notes" => "required",
            "address" => "required",
            "lat" => "required",
            "lng" => "required",
        ]);

        $center = new Center;
        $center->name = $request->name;
        $center->notes = $request->notes;
        $center->address = $request->address;
        $center->lat = $request->lat;
        $center->lng = $request->lng;
        $center->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        $route = self::ROUTE;
        $title = 'Show '.self::TITLE;
        return view(self::FOLDER.".show", compact('route','title', 'center'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        $route = self::ROUTE;
        $title = 'Edit '.self::TITLE;
        return view(self::FOLDER.".edit", compact('route','title', 'center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Center $center)
    {
        $request->validate([
            "name" => "required",
            "notes" => "required",
            "address" => "required",
            "lat" => "required",
            "lng" => "required",
        ]);

        $center->name = $request->name;
        $center->notes = $request->notes;
        $center->address = $request->address;
        $center->lat = $request->lat;
        $center->lng = $request->lng;
        $center->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {
        Center::destroy($center->id);
        return redirect(self::ROUTE);
    }
}
