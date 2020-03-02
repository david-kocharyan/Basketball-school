<?php

namespace App\Http\Controllers\Admin;

use App\Certificate;
use App\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class CoachController extends Controller
{
//    Path To the View Folder
    const FOLDER = "admin.coaches";
//    Resource Title
    const TITLE = "Coaches";
//    Resource Route
    const ROUTE = "/admin/coaches";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches = Coach::all();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.index', compact('title', 'route', 'coaches'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create ' . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.create', compact('title', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "full_name" => "required",
            "bio" => "required",
            "image" => "image|max:2048",
            "doc_image" => "",
        ]);

        $coach = new Coach;

        if ($request->image) {
            $img_name = 'coaches_' . time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('coaches/', $request->image, $img_name);
            $coach->image = $img_name;
        }

        $coach->full_name = $request->full_name;
        $coach->bio = $request->bio;
        $coach->save();

        $last_coach_id = $coach->id;
        if ($last_coach_id) {
            if ($request->doc_image) {
                foreach ($request->doc_image as $key) {
                    $doc_name = 'certificate_' . $last_coach_id . "_" . random_int(1, 9999999) . '.' . $key->getClientOriginalExtension();

                    $doc = new Certificate;
                    $doc->coaches_id = $last_coach_id;
                    $doc->image = $doc_name;
                    $doc->save();

                    // Or any custom name as the third argument
                    Storage::disk('public')->putFileAs('certificate/', $key, $doc_name);
                }
            }
        }

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Coach $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        $title = 'Show ' . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.show', compact('title', 'route', 'coach'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Coach $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
        $title = 'Edit ' . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.edit', compact('title', 'route', 'coach'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Coach               $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        $request->validate([
            "full_name" => "required",
            "bio" => "required",
            "image" => "image|max:2048",
            "doc_image" => "",
        ]);

        $new_coach = Coach::find($coach->id);
        if ($request->image) {
//          unlink old image
            Storage::disk('public')->delete("coaches/$coach->image");
//          add new image
            $img_name = 'coaches_' . time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('coaches/', $request->image, $img_name);
//          save to database
            $new_coach->image = $img_name;
        }

        $new_coach->full_name = $request->full_name;
        $new_coach->bio = $request->bio;
        $new_coach->save();

        if ($request->doc_image) {
            foreach ($request->doc_image as $key) {
                $doc_name = 'certificate_' . $coach->id . "_" . random_int(1, 9999999) . '.' . $key->getClientOriginalExtension();

                $doc = new Certificate;
                $doc->coaches_id = $coach->id;
                $doc->image = $doc_name;
                $doc->save();

                // Or any custom name as the third argument
                Storage::disk('public')->putFileAs('certificate/', $key, $doc_name);
            }
        }
        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Coach $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        Storage::disk('public')->delete("coaches/$coach->image");
        if (!empty($coach->coachDoc)) {
            foreach ($coach->coachDoc as $key) {
                Storage::disk('public')->delete("certificate/$key->image");
            }
        }
        Coach::destroy($coach->id);

        return redirect(self::ROUTE);
    }
}
