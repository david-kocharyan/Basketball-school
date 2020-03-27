<?php

namespace App\Http\Controllers\Site;

use App\Product;
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
        return view(self::VIEW . ".index", compact("products"));
    }
}
