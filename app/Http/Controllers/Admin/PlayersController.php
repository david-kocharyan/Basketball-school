<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PlayersMail;
use App\Player;
use App\Team;
use App\Document;
use App\TeamPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PlayersController extends Controller
{

//    Path To the View Folder
    const FOLDER = "admin.player";
//    Resource Title
    const TITLE = "Players";
//    Resource Route
    const ROUTE = "/admin/players";


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = Player::with('teamPlayers')->get();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.index', compact('title', 'route', 'player'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $title = self::TITLE;
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
            "full_name" => "required",
            "dob" => "required",
            "phone_number" => "required|numeric",
            "gender" => "required|numeric",
            "height" => "",
            "nationality" => "required",
            "jersey_number" => "",
            "jersey_size" => "",
            "position" => "",
            "emergency_name" => "",
            "emergency_phone" => "",
            "email" => "required|unique:players,email",
            "password" => "required|min:6",
            "notes" => "",
            "image" => "image|max:2048",
            "doc_image" => "",
        ]);

        $player = new Player;

        $image = $request->image;
        if ($image) {
            $img_name = 'player_' . time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('player/', $image, $img_name);
            $player->image = $img_name;
        }

        $player->full_name = $request->full_name;
        $player->dob = $request->dob;
        $player->phone_number = $request->phone_number;
        $player->gender = $request->gender;
        $player->height = $request->height;
        $player->nationality = $request->nationality;
        $player->jersey_number = $request->jersey_number;
        $player->jersey_size = $request->jersey_size;
        $player->position = $request->position;
        $player->emergency_name = $request->emergency_name;
        $player->emergency_phone = $request->emergency_phone;
        $player->email = $request->email;
        $player->password = Hash::make($request->password);
        $player->notes = $request->notes;
        $player->save();
        $last_player_id = $player->id;

        if ($last_player_id) {
            if ($request->doc_image) {
                foreach ($request->doc_image as $key) {
                    $doc_name = 'doc_' . $last_player_id . "_" . random_int(1, 9999999) . '.' . $key->getClientOriginalExtension();

                    $doc = new Document;
                    $doc->player_id = $last_player_id;
                    $doc->image = $doc_name;
                    $doc->save();

                    // Or any custom name as the third argument
                    Storage::disk('public')->putFileAs('documents/', $key, $doc_name);
                }
            }

//            add player to team
            if ($request->team == null){
                $this->add_to_team($last_player_id, $request->gender, $request->dob);
            }
            else{
                $team_player = new TeamPlayer;
                $team_player->player_id = $last_player_id;
                $team_player->team_id = $request->team;
                $team_player->save();
            }

//          sending email
            $details = [
                'title' => 'Your password in Cilicia web page',
                'body' => "your password is` $request->password",
            ];
            \Mail::to($request->email)->send(new PlayersMail($details));
        }
        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.show', compact('title', 'route', 'player'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $teams = Team::all();
        $title = 'Edit ' . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . '.edit', compact('title', 'route', 'teams', 'player'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "full_name" => "required",
            "dob" => "required",
            "phone_number" => "required|numeric",
            "gender" => "required|numeric",
            "height" => "required|numeric",
            "nationality" => "required",
            "jersey_number" => "required|numeric",
            "jersey_size" => "required|numeric",
            "position" => "",
            "email" => "required|unique:players,email," . $id,
            "notes" => "required",
        ]);

        $player = Player::find($id);

        if ($request->image) {
//          unlink old image
            Storage::disk('public')->delete("player/$player->image");
//          add new image
            $img_name = 'player_' . time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('player/', $request->image, $img_name);
//          save to database
            $player->image = $img_name;
        }

//      update player data
        $player->full_name = $request->full_name;
        $player->dob = $request->dob;
        $player->phone_number = $request->phone_number;
        $player->gender = $request->gender;
        $player->height = $request->height;
        $player->nationality = $request->nationality;
        $player->jersey_number = $request->jersey_number;
        $player->jersey_size = $request->jersey_size;
        $player->position = $request->position;
        $player->emergency_name = $request->emergency_name;
        $player->emergency_phone = $request->emergency_phone;
        $player->email = $request->email;
        $player->notes = $request->notes;
        $player->save();

//        change team
        $team = TeamPlayer::where('player_id', $player->id)->first();
        $team->team_id = $request->team;
        $team->save();

//        upload player document
        if ($request->doc_image) {
            foreach ($request->doc_image as $key) {
                $doc_name = 'doc_' . $id . "_" . random_int(1, 9999999) . '.' . $key->getClientOriginalExtension();

                $doc = new Document;
                $doc->player_id = $id;
                $doc->image = $doc_name;
                $doc->save();

                // Or any custom name as the third argument
                Storage::disk('public')->putFileAs('documents/', $key, $doc_name);
            }
        }

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        Storage::disk('public')->delete("player/$player->image");
        if (!empty($player->playerDoc)) {
            foreach ($player->playerDoc as $key) {
                Storage::disk('public')->delete("documents/$key->image");
            }
        }
        Player::destroy($player->id);

        return redirect(self::ROUTE);
    }

    /**
     * @param $id
     * @param $gender
     * @param $dob
     */
    private function add_to_team($id, $gender, $dob)
    {
        $team = Team::where(array(['gender', '=', $gender], ['age', '=', Carbon::parse($dob)->age]))->orderBy('age', 'asc')->get();
        $senior = Team::where(array(['gender', '=', $gender], ['age', '=', 25]))->get();


//      for $senior
        if ($senior->isEmpty() AND Carbon::parse($dob)->age >= 25) {
            $new_senior = new Team;
            $new_senior->name = "Senior 25_" . $gender;
            $new_senior->gender = $gender;
            $new_senior->age = 25;
            $new_senior->save();

            $team_player = new TeamPlayer;
            $team_player->player_id = $id;
            $team_player->team_id = $new_senior->id;
            $team_player->save();
        }
        if ($senior->isEmpty() == false AND Carbon::parse($dob)->age >= 25) {
            $team_player = new TeamPlayer;
            $team_player->player_id = $id;
            $team_player->team_id = $senior->id;
            $team_player->save();
        }

//      for other team
        if ($team->isEmpty() AND Carbon::parse($dob)->age < 25) {
            $new_team = new Team;
            $new_team->name = "U" . Carbon::parse($dob)->age . "_" . $gender;
            $new_team->gender = $gender;
            $new_team->age = Carbon::parse($dob)->age;
            $new_team->save();

            $team_player = new TeamPlayer;
            $team_player->player_id = $id;
            $team_player->team_id = $new_team->id;
            $team_player->save();
        } else {
            foreach ($team as $key) {
                if (Carbon::parse($dob)->age <= $key->age) {
                    $team_player = new TeamPlayer;
                    $team_player->player_id = $id;
                    $team_player->team_id = $key->id;
                    $team_player->save();
                    break;
                } else {
                    $new_team = new Team;
                    $new_team->name = "U" . Carbon::parse($dob)->age . "_" . $gender;
                    $new_team->gender = $gender;
                    $new_team->age = Carbon::parse($dob)->age;
                    $new_team->save();

                    $team_player = new TeamPlayer;
                    $team_player->player_id = $id;
                    $team_player->team_id = $new_team->id;
                    $team_player->save();
                    break;
                }
            }
        }

    }

}
