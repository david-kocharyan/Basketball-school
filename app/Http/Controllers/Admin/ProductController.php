<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

//Path To the View Folder
    const FOLDER = "admin.product";
//    Resource Title
    const TITLE = "Products";
//    Resource Route
    const ROUTE = "/admin/products";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with(['getCategory', 'getImages'])->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $route = self::ROUTE;
        $title = 'Create ' . self::TITLE;
        return view(self::FOLDER . ".create", compact('route', 'title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category" => "required",
            "name" => "required",
            "price" => "required|numeric",
            "description" => "required",
            "image" => "max:5000|required",
        ]);

        $product = new Product;
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($product->id) {
            foreach ($request->image as $key) {
                $product_image_name = 'product_' . $product->id . "_" . random_int(1, 9999999) . '.' . $key->getClientOriginalExtension();
                $image = new ProductImage;
                $image->product_id = $product->id;
                $image->name = $product_image_name;
                $image->save();

                Storage::disk('public')->putFileAs('product/', $key, $product_image_name);
            }
        }

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $route = self::ROUTE;
        $title = "Show " . self::TITLE;
        return view(self::FOLDER . ".show", compact('route', 'title', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        $route = self::ROUTE;
        $title = 'Edit ' . self::TITLE;
        return view(self::FOLDER . ".edit", compact('route', 'title', 'product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Product             $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "category" => "required",
            "name" => "required",
            "price" => "required|numeric",
            "description" => "required",
            "image" => "max:5000",
        ]);

        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image) {
            foreach ($request->image as $key) {
                $product_image_name = 'product_' . $product->id . "_" . random_int(1, 9999999) . '.' . $key->getClientOriginalExtension();
                $image = new ProductImage;
                $image->product_id = $product->id;
                $image->name = $product_image_name;
                $image->save();

                Storage::disk('public')->putFileAs('product/', $key, $product_image_name);
            }
        }

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (!empty($product->getImages)) {
            foreach ($product->getImages as $key) {
                Storage::disk('public')->delete("product/$key->name");
            }
        }
        Product::destroy($product->id);

        return redirect(self::ROUTE);
    }

    /**
     * @param $id
     */
    public function destroy_image($product, $id)
    {
        $image = ProductImage::find($id);
        Storage::disk('public')->delete("product/$image->name");
        ProductImage::destroy($image->id);
        return redirect(self::ROUTE.'/'.$product.'/edit');
    }
}
