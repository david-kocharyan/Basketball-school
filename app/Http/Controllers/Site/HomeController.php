<?php

namespace App\Http\Controllers\Site;

use App\HomeGallery;
use App\MonthPlayer;
use App\Product;
use App\Tournament;
use App\TournamentClub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    const VIEW = "site.home";
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(["getImages", "getCategory"])->where("show_in_home", 1)->get();
        if(count($products) < 4) {
            $adding_random_products = Product::with(["getImages", "getCategory"])->where("show_in_home", 0)->limit(4 - count($products))->get();
            $products = $products->merge($adding_random_products);
        }

        $standings = Tournament::with(["tournament_clubs", "clubs"])->where("show_in_home", 1)->limit(3)->get();
        if(count($standings) < 3) {
            $adding_random_standings = Tournament::with(["tournament_clubs", "clubs"])->where("show_in_home", 0)->limit(3 - count($standings))->get();
            $standings = $standings->merge($adding_random_standings);
        }

        $best_players = MonthPlayer::with('players')->get();
        $home_gallery = HomeGallery::with('album')->get();
        return view(self::VIEW . ".index", compact("products", "standings", "best_players", "home_gallery"));
    }
}
