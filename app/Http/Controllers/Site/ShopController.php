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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $title = self::TITLE;
        $categories = Category::all();
        $products = Product::with("getImages")->paginate(25);
        return view(self::VIEW . ".index", compact("title", "categories", "products"));
    }

    public function category($slug)
    {
        $title = self::TITLE;
        $categories = Category::all();
        $products = Product::whereHas('getCategory', function ($query) use ($slug) {
            $query->where('title', $slug);
        })->with('getImages')->paginate(25);
        return view(self::VIEW . ".index", compact("title", "categories", "products", 'slug'));
    }
}
