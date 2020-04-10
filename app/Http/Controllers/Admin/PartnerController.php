<?php

namespace App\Http\Controllers\Admin;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
//    Path To the View Folder
    const FOLDER = "admin.partners";
//    Resource Title
    const TITLE = "Partners";
//    Resource Route
    const ROUTE = "/admin/partners";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER.".index", compact('route','title', 'partners'));
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
            "url" => "required",
            "image" => "required|mimes:jpeg,jpg,png|max:5000",
        ]);

        if ($request->image){
            $image_name =  Storage::disk('public')->put('partner/', $request->image);
        }

        $link = $request->url;
        if (strpos($link, 'http://') === false) {
            $link = "http://" . $link;
        }

        $partner = new Partner;
        $partner->url = $link;
        $partner->image = basename($image_name);
        $partner->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $route = self::ROUTE;
        $title = 'Edit '.self::TITLE;
        return view(self::FOLDER.".edit", compact('route','title', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            "url" => "required",
            "image" => "mimes:jpeg,jpg,png|max:5000",
        ]);

        if ($request->image){
            Storage::disk('public')->delete("partner/$partner->image");
            $image_name =  Storage::disk('public')->put('partner/', $request->image);
            $partner->image = basename($image_name);
        }
        $link = $request->url;
        if (strpos($link, 'http://') === false) {
            $link = "http://" . $link;
        }
        $partner->url = $link;
        $partner->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        Storage::disk('public')->delete("partner/$partner->image");
        Partner::destroy($partner->id);

        return redirect(self::ROUTE);
    }
}
