<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
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
        $categories = Category::paginate(100);
        $products = Product::with(["getImages", "getCategory"])->get();
        return view(self::VIEW . ".index", compact("title", "categories", "products"));
    }
}
