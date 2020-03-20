<?php

namespace App\Http\Controllers\Site;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    const VIEW = "site.gallery";
    const TITLE = "Gallery";
    /**
     * About Us
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $academy = Gallery::where('type', '0')->with('images')->get();
        $games = Gallery::where('type', '1')->with('images')->get();
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title", 'academy', 'games'));
    }


    public function gallery($id)
    {
        $gallery = Gallery::with('images')->find($id);
        $title = self::TITLE;
        return view(self::VIEW . ".show", compact("title", 'gallery'));
    }

}
