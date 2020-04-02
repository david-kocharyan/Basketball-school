<?php

namespace App\Http\Controllers\Site;

use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function settings(Request $request)
    {
        $request->validate([
            "email" => 'required',
            "new_pass" => 'required|min:6',
            "password" => 'required',
        ]);

        $player = Player::where('email', $request->email)->first();

        if ($player != NULL){
            if(Hash::check($request->password, $player->password)){
                $player->password = Hash::make($request->new_pass);
                $player->save();
            }
        }

        return redirect("/player");
    }
}
