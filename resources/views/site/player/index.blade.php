@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid"
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Home <span
                                class="greater">&gt;</span> {{ strtoupper($title) }}</p>
                        <p class="subtitle">We are competitive professional basketball club - with our players
                            competiting at all levels from local team galas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-md-12 pb-3">
                <div class="player-info">
                    <img src="{{asset('uploads/player')."/".$player->image}}" alt="{{$player->full_name}}"
                         class="img-responsive" width="100">
                    <div class="info-top ml-3">
                        <p><strong class="text-danger">{{$player->full_name}}</strong></p>
                        <p><strong>Age: </strong>{{\Carbon\Carbon::parse($player->dob)->age}}</p>
                        <p><strong>Gender: </strong>
                            @if($player->gender == 0)
                                Female
                            @else
                                Male
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Contact1</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        10
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        20
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        30
                    </div>
                    <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                        40
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("head")
    <style>
        .header {
            padding-top: 0;
        }

        .player-info {
            display: flex;
            justify-content: flex-start;
            flex-wrap: nowrap;
            align-items: flex-start;
        }

        .info-top p {
            margin-bottom: 5px;
        }

        #myTab{
            border: 1px solid #dcdcdc;
        }

        .tab-content {
            border: 1px solid #dcdcdc;
            border-radius: 15px;
            margin-left: 30px;
        }

    </style>
@endpush
