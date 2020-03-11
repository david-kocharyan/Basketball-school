<?php

namespace App\Http\Controllers\Site;

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
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title"));
    }
}
