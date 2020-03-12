<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    const VIEW = "site.shop";
    const TITLE = "Shop";
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
