<?php

namespace App\Http\Controllers\Admin;


use App\Gallery;
use App\HomeGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeGalleryController extends Controller
{
//    Path To the View Folder
    const FOLDER = "admin.gallery.home";
//    Resource Title
    const TITLE = "Gallery (Home Screen) ";
//    Resource Route
    const ROUTE = "/admin/gallery-home";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_gallery = HomeGallery::with('album')->orderBy('order','ASC')->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'home_gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = Gallery::all();
        $route = self::ROUTE;
        $title = "Create ".self::TITLE;
        return view(self::FOLDER . ".create", compact('route', 'title', 'gallery'));
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
            "album_id" => "required",
            "image" => "required|max:2000",
        ]);


        if ($request->image){
            $image_name =  Storage::disk('public')->put('home_gallery/', $request->image);
        }

        $homeGallery = new HomeGallery;
        $homeGallery->album_id = $request->album_id;
        $homeGallery->image = basename($image_name);
        $homeGallery->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeGallery  $homeGallery
     * @return \Illuminate\Http\Response
     */
    public function show(HomeGallery $homeGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeGallery  $homeGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::all();
        $homeGallery = HomeGallery::find($id);
        $title = 'Edit ' . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.edit', compact('title', 'route', 'gallery', 'homeGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeGallery  $homeGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $homeGallery = HomeGallery::find($id);

        $request->validate([
            "album_id" => "required",
            "image" => "max:2000",
        ]);

        if ($request->image) {
            Storage::disk('public')->delete("home_gallery/$homeGallery->image");
            $image_name =  Storage::disk('public')->put('home_gallery/', $request->image);
            $homeGallery->image = basename($image_name);
        }

        $homeGallery->album_id = $request->album_id;
        $homeGallery->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeGallery  $homeGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeGallery = HomeGallery::find($id);

        Storage::disk('public')->delete("home_gallery/$homeGallery->image");
        HomeGallery::destroy($homeGallery->id);

        return redirect(self::ROUTE);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sortable(Request $request)
    {
        $gallery = HomeGallery::all();

        foreach ($gallery as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
