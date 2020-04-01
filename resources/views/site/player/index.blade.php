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
                        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab"
                           aria-controls="personal" aria-selected="true">Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="player-tab" data-toggle="tab" href="#player" role="tab"
                           aria-controls="player" aria-selected="false">Player's Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab"
                           aria-controls="account" aria-selected="false">Account Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab"
                           aria-controls="payment" aria-selected="false">Payment Details</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <p><strong>Personal Information</strong></p>
                        <p>Your <strong>Email and password</strong> can be updated via your <strong class="text-danger">Account Settings</strong></p>
                        <div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="player" role="tabpanel" aria-labelledby="player-tab">
                        20
                    </div>
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        30
                    </div>
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
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
