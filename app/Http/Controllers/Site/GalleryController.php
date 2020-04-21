<?php

namespace App\Http\Controllers\Site;

use App\Gallery;
use App\GalleryImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    const VIEW = "site.gallery";
    const TITLE = "Gallery";

    /**
     * About Us
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $academy = Gallery::where('type', '0')->with('images')->orderBy('order','ASC')->get();
        $games = Gallery::where('type', '1')->with('images')->orderBy('order','ASC')->get();
        $all = Gallery::with('images')->orderBy('order','ASC')->get();
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title", 'academy', 'games', "all"));
    }

    public function home_ajax(Request $request)
    {
        $image = GalleryImage::where('gallery_id', $request->id)->get();
        foreach ($image as $key) {
            $data[] = asset("uploads/gallery")."/".$key->name;
        }
        return \Response::json($data);
    }

}
