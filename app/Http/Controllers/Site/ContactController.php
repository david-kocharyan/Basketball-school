<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    const VIEW = "site.contact";
    const TITLE = "Contact Us";
    /**
     * About Us
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $schedule = Schedule::with(['team', 'date'])->limit(3)->get();
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title", "schedule"));
    }
}
