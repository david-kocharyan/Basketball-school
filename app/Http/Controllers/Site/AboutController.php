<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Http\Controllers\Controller;
use App\OurTeam;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    const VIEW = "site.about";
    const TITLE = "About Us";
    /**
     * About Us
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $members = OurTeam::all();
        $about = About::first();
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title", "members", 'about'));
    }
}
