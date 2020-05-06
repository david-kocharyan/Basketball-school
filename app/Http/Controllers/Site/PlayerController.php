<?php

namespace App\Http\Controllers\Site;

use App\Payment;
use App\Player;
use Carbon\Carbon;
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
        $player = Auth::user();
        $payment = Payment::where('player_id', $player->id)->orderBy("player_id", "DESC")->first();


        $day = Carbon::createFromFormat('Y-m-d', $payment->date)->day;
        $date = Carbon::create($payment->date);
        $now = Carbon::now();
        $date->addMonthsNoOverflow(1);

        $pay_day = $date->day(min($day, $date->daysInMonth));
        $passed = $date->isPast();
        $diff = $now->diffInDays($date);

        $title = self::TITLE;
        return view(self::VIEW . ".index", compact("title", "player", "payment", 'passed', 'diff', "pay_day"));
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
