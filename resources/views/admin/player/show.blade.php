@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="">
                    <h2 class="m-b-0 m-t-0">{{$player->full_name}}</h2>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="white-box text-center">
                                <img src="{{asset("uploads/player/$player->image")}}" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6">
                            <h4 class="box-title m-t-40">Notes</h4>
                            <p>{{$player->notes}}</p>

                            <h3 class="box-title m-t-40">Emergency Contact</h3>
                            <ul class="list-icons">
                                <li><i class="fa fa-check text-success"></i> Name - {{$player->emergency_name}}</li>
                                <li><i class="fa fa-check text-success"></i> Phone number - {{$player->emergency_phone}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40">General Info</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td width="390">Email</td>
                                        <td>{{$player->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>{{$player->dob}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td>{{$player->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>
                                            @if($player->gender == 1)
                                                Male
                                            @else
                                                Female
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Height</td>
                                        <td>{{$player->height}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td>{{$player->nationality}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jersey Number</td>
                                        <td>{{$player->jersey_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jersey Size</td>
                                        <td>{{$player->jersey_size}}</td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>{{$player->position}}</td>
                                    </tr>
                                    <tr>
                                        <td>Team</td>
                                        <td>{{$player->teamPlayers[0]->name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40">Documents</h3>
                            <div id="gallery">
                                @foreach($player->playerDoc as $key)
                                    <img src="{{asset("uploads/documents/$key->image")}}"
                                         class="card img-responsive m-l-15" style="display: inline-block; width: 200px; height: 200px;">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("img").click(function () {
                var t = $(this).attr("src");
                $(".modal-body").html("<img src='" + t + "' class='modal-img img-responsive'>");
                $("#myModal").modal();
            });
        });
    </script>

@endsection








