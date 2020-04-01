<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PlayerController extends Controller
{
    const VIEW = "site.player";
    const TITLE = "Player Account";

    public function index()
    {
        $title = self::TITLE;
        $player = Auth::user();
        return view(self::VIEW . ".index", compact("title", "player"));
    }

}
