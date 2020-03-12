<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    const VIEW = "site.auth";
    const TITLE = "Login";
    /**
     * About Us
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function signIn()
    {
        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title"));
    }
}
