<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use App\ScheduleDate;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    const FOLDER = "admin.schedule";
    const TITLE = "Schedule";
    const ROUTE = "/admin/schedules";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Schedule::with('team')->get();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.index', compact('title', 'route', 'schedule'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $title = "Create " . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.create', compact('title', 'route', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "team" => "required",
            "price" => "required",

            "day_from" => "required|array|min:1",
//            "day_from.*" => "required",
            "day_to" => "required|array|min:1",
//            "day_to.*" => "required",
            "time_from" => "required|array|min:1",
//            "time_from.*" => "required",
            "time_to" => "required|array|min:1",
//            "time_to.*" => "required",
        ]);

        $schedule = new Schedule;
        $schedule->team_id = $request->team;
        $schedule->price = $request->price;
        $schedule->save();

        if ($schedule->id) {
            $data = [];
            foreach ($request->day_from as $bin => $key) {
                if ($request->day_from[$bin] != null AND $request->day_to[$bin] != null AND $request->time_from[$bin] != null AND $request->time_to[$bin] != null) {

                    $data[] = [
                        'schedule_id' => $schedule->id,
                        'day_from' => $request->day_from[$bin],
                        'day_to' => $request->day_to[$bin],
                        'time_from' => $request->time_from[$bin],
                        'time_to' => $request->time_to[$bin],
                    ];
                }
            }
            ScheduleDate::insert($data);
        }
        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $teams = Team::all();
        $date = ScheduleDate::where('schedule_id', $schedule->id)->get();
        $title = "Edit " . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.edit', compact('title', 'route', 'schedule', 'teams','date'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Schedule            $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            "team" => "required",
            "price" => "required",

            "day_from" => "required|array|min:1",
//            "day_from.*" => "required",
            "day_to" => "required|array|min:1",
//            "day_to.*" => "required",
            "time_from" => "required|array|min:1",
//            "time_from.*" => "required",
            "time_to" => "required|array|min:1",
//            "time_to.*" => "required",
        ]);

        $schedule->team_id = $request->team;
        $schedule->price = $request->price;
        $schedule->save();

        if ($schedule->id) {
            $data = [];
            foreach ($request->day_from as $bin => $key) {
                if ($request->day_from[$bin] != null AND $request->day_to[$bin] != null AND $request->time_from[$bin] != null AND $request->time_to[$bin] != null) {

                    $data[] = [
                        'schedule_id' => $schedule->id,
                        'day_from' => $request->day_from[$bin],
                        'day_to' => $request->day_to[$bin],
                        'time_from' => $request->time_from[$bin],
                        'time_to' => $request->time_to[$bin],
                    ];
                }
            }
            ScheduleDate::insert($data);
        }
        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        ScheduleDate::where('schedule_id', '=', $schedule->id)->delete();
        Schedule::destroy($schedule->id);

        return redirect(self::ROUTE);
    }

    public function destroy_date($scheduleId, $id){
        $date = ScheduleDate::find($id);
        ScheduleDate::destroy($date->id);

        return redirect(self::ROUTE . '/' . $scheduleId . '/edit');
    }
}
