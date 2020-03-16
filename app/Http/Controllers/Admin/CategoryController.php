<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

//Path To the View Folder
    const FOLDER = "admin.category";
//    Resource Title
    const TITLE = "Categories";
//    Resource Route
    const ROUTE = "/admin/categories";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER . ".index", compact('route', 'title', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = self::ROUTE;
        $title = 'Create ' . self::TITLE;
        return view(self::FOLDER . ".create", compact('route', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "title" => "required",
            "icon" => "required|image|max:2000",
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->title = $request->title;

        $img_name = Storage::disk('public')->put('category', $request->icon);
        $category->icon = basename($img_name);
        $category->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $route = self::ROUTE;
        $title = 'Edit '.self::TITLE;
        return view(self::FOLDER.".edit", compact('route','title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Category            $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => "required",
            "title" => "required",
            "icon" => "image|max:2000",
        ]);

        if ($request->icon) {
            Storage::disk('public')->delete("category/$category->icon");
            $img_name = Storage::disk('public')->put('category', $request->icon);
        }

        $category->name = $request->name;
        $category->title = $request->title;
        $category->icon = basename($img_name);
        $category->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::disk('public')->delete("category/$category->icon");
        Category::destroy($category->id);

        return redirect(self::ROUTE);
    }
}
