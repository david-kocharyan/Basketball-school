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
            "price" => "",
            "day" => "required|array|min:1",
            "time" => "required|array|min:1",
        ]);

        $schedule = new Schedule;
        $schedule->team_id = $request->team;
        if ($request->price != null) $schedule->price = $request->price;
        $schedule->save();

        if ($schedule->id) {
            $data = [];
            foreach ($request->day as $bin => $key) {
                if ($request->day[$bin] != null  AND $request->time[$bin] != null) {

                    $data[] = [
                        'schedule_id' => $schedule->id,
                        'day' => $request->day[$bin],
                        'time' => $request->time[$bin],
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
            "price" => "",
            "day" => "required|array|min:1",
            "time" => "required|array|min:1",
        ]);

        $schedule->team_id = $request->team;
        if ($request->price != null) $schedule->price = $request->price;
        $schedule->save();

        if ($schedule->id) {
            $data = [];
            foreach ($request->day as $bin => $key) {
                if ($request->day[$bin] != null  AND $request->time[$bin] != null) {

                    $data[] = [
                        'schedule_id' => $schedule->id,
                        'day' => $request->day[$bin],
                        'time' => $request->time[$bin],
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
