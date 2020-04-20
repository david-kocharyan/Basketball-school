<?php

namespace App\Http\Controllers\Admin;


use App\Gallery;
use App\GalleryImage;
use App\HomeGallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

//Path To the View Folder
    const FOLDER = "admin.gallery";
//    Resource Title
    const TITLE = "Album";
//    Resource Route
    const ROUTE = "/admin/gallery";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = self::ROUTE;
        $title = 'Create ' . self::TITLE;
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
            "type" => "required",
            "image" => "max:5000|required",
        ]);

        $gallery = new Gallery;
        $gallery->name = $request->name;
        $gallery->type = $request->type;
        $gallery->save();

        if ($gallery->id) {
            foreach ($request->image as $key) {
                $product_image_name = Storage::disk('public')->put('gallery', $key);
                $image = new GalleryImage;
                $image->gallery_id = $gallery->id;
                $image->name = basename($product_image_name);
                $image->save();
            }
        }

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        $title = 'Show ' . self::TITLE;
        return view(self::FOLDER . ".show", compact('title', 'gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $route = self::ROUTE;
        $title = 'Edit ' . self::TITLE;
        return view(self::FOLDER . ".edit", compact('route', 'title', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Gallery             $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            "name" => "required",
            "type" => "required",
            "image" => "max:5000",
        ]);

        $gallery->name = $request->name;
        $gallery->type = $request->type;
        $gallery->save();

        if ($request->image) {
            foreach ($request->image as $key) {
                $product_image_name = Storage::disk('public')->put('gallery', $key);
                $image = new GalleryImage;
                $image->gallery_id = $gallery->id;
                $image->name = basename($product_image_name);
                $image->save();
            }
        }

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if (!empty($gallery->images)) {
            foreach ($gallery->images as $key) {
                Storage::disk('public')->delete("gallery/$key->name");
            }
        }

        $home = HomeGallery::where('album_id', $gallery->id)->get();
        foreach ($home as $key) {
            Storage::disk('public')->delete("home_gallery/$key->image");
            HomeGallery::destroy($key->id);
        }

        Gallery::destroy($gallery->id);

        return redirect(self::ROUTE);
    }

    /**
     * @param $gallery
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_image($gallery, $id)
    {
        $image = GalleryImage::find($id);
        Storage::disk('public')->delete("gallery/$image->name");
        GalleryImage::destroy($image->id);
        return redirect(self::ROUTE . '/' . $gallery . '/edit');
    }
}
