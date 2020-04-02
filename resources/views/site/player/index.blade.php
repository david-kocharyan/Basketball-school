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
                <ul class="nav nav-pills flex-column control-tabs" id="myTab" role="tablist">
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
                <div class="tab-content p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <p><strong>Personal Information</strong></p>
                        <p>Your <strong>Email and password</strong> can be updated via your <strong class="text-danger">Account
                                Settings</strong></p>
                        <div class="info-list">
                            <p><b>Full Name: </b> {{$player->full_name}}</p>
                            <p><b>Email: </b> {{$player->email}}</p>
                            <p><b>Phone Number: </b> {{$player->phone_number}}</p>
                        </div>
                        <div class="info-list">
                            <p><b>Date of Birthday: </b> {{$player->dob}}</p>
                            <p><b>Gender: </b> {{$player->gender}}</p>
                        </div>
                        <div class="info-list">
                            <p><b>Emergency Name: </b> {{$player->emergency_name}}</p>
                            <p><b>Emergency Phone: </b> {{$player->emergency_phone}}</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="player" role="tabpanel" aria-labelledby="player-tab">
                        <p><strong>Personal Information</strong></p>
                        <p>Your <strong>payment details history</strong> can be visible on the <strong
                                class="text-danger">Payment Details </strong><b>page.</b></p>
                        <div class="info-list">
                            <p><b>Team: </b> {{$player->full_name}}</p>
                            <p><b>Height: </b> {{$player->height}}</p>
                            <p><b>Position: </b> {{$player->position}}</p>
                        </div>
                        <div class="info-list">
                            <p><b>Jersey Number: </b> {{$player->jersey_number}}</p>
                            <p><b>Jersey Size: </b> {{$player->jersey_size}}</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <p><b>Account Settings</b></p>
                        <form method="POST" action="/player/settings" class="d-flex flex-wrap">
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="email"> Email Address <span class="red">*</span></label>
                                <div class="d-flex col-md-12">
                                <span class="input-group-text" id="basic-addon1"><img class="img-fluid"
                                                                                      style="height: 20px"
                                                                                      src="{{ asset("assets/site/images/auth/user_black.svg") }}"
                                                                                      alt="Lock"></span>
                                    <input type="text" id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="new_pass"> New Password <span class="red">*</span></label>
                                <div class="d-flex col-md-12">
                                <span class="input-group-text" id="basic-addon1"><img class="img-fluid"
                                                                                      style="height: 20px"
                                                                                      src="{{ asset("assets/site/images/auth/lock_black.svg") }}"
                                                                                      alt="Lock"></span>
                                    <input type="password" id="new_pass"
                                           class="form-control @error('new_pass') is-invalid @enderror"
                                           name="new_pass">
                                </div>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="password"> Enter Your Current Password To Confirm Changes <span class="red">*</span></label>
                                <div class="d-flex col-md-12">
                                <span class="input-group-text" id="basic-addon1"><img class="img-fluid"
                                                                                      style="height: 20px"
                                                                                      src="{{ asset("assets/site/images/auth/lock_black.svg") }}"
                                                                                      alt="Lock"></span>
                                    <input type="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password">
                                </div>
                            </div>

                                <button class="rounded-button mt-3 red-bg align-self-center text-uppercase">Save</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <p><strong>Payment Details</strong></p>
                        <div class="payment-list p-2">
                            <div class="swiper-slide">
                                <div class="swiper-slide-container">
                                    <div class="first-row d-flex flex-column align-items-center">
                                        <div class="date-cont">
                                            <span class="date text-uppercase">25/JAN/2020</span>
                                        </div>
                                        <div class="score-cont d-flex justify-content-around">
                                            <span class="score-team text-uppercase"><b>{{$player->full_name}}</b></span>
                                        </div>
                                    </div>
                                    <div class="second-row d-flex align-items-end justify-content-center"
                                         style="background-color: #6c6c6e;">
                                        <span class="finals text-uppercase"><b>10000 AMD</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-slide-container">
                                    <div class="first-row d-flex flex-column align-items-center">
                                        <div class="date-cont">
                                            <span class="date text-uppercase">25/JAN/2020</span>
                                        </div>
                                        <div class="score-cont d-flex justify-content-around">
                                            <span class="score-team text-uppercase"><b>{{$player->full_name}}</b></span>
                                        </div>
                                    </div>
                                    <div class="second-row d-flex align-items-end justify-content-center"
                                         style="background-color: #d0aa01;">
                                        <span class="finals text-uppercase"><b>Payment</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-slide-container">
                                    <div class="first-row d-flex flex-column align-items-center">
                                        <div class="date-cont">
                                            <span class="date text-uppercase">25/JAN/2020</span>
                                        </div>
                                        <div class="score-cont d-flex justify-content-around">
                                            <span class="score-team text-uppercase"><b>{{$player->full_name}}</b></span>
                                        </div>
                                    </div>
                                    <div class="second-row d-flex align-items-end justify-content-center"
                                         style="background-color: #9c1d24;">
                                        <span class="finals text-uppercase"><b>Due To</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("head")
    <style>
        .swiper-slide {
            background-color: #ebebeb;
            position: relative;
            width: 30%;
        }

        .swiper-slide .score-cont .date, .swiper-slide .score-cont .score-team {
            color: black;
        }

        .swiper-slide-container .first-row::after {
            content: "";
            width: 0;
            height: 0;
            border-left: 23px solid transparent;
            border-right: 23px solid transparent;
            border-top: 12px solid #ebebeb;
            position: absolute;
            top: 40%;
            transform: translateY(100%);
        }

        .swiper-slide .finals {
            font-family: Agency, sans-serif;
            color: white;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .swiper-slide .second-row {
            height: 55px;
        }

        .second-row.red-bg {
            background-color: #9c1d24;
        }

        .swiper-slide .first-row, .swiper-slide .second-row {
            padding: 5px;
        }

        .payment-list {
            display: flex;
            justify-content: flex-start;
        }

        .payment-list .swiper-slide {
            margin-left: 20px;
        }
    </style>
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

        #myTab {
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            overflow: hidden;
        }

        .control-tabs .nav-item:not(:last-child) {
            border-bottom: 1px solid #dcdcdc;
        }

        .tab-content {
            border: 1px solid #dcdcdc;
            border-radius: 15px;
            margin-left: 30px;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: #ebebeb;
        }

        .control-tabs .nav-link {
            background-color: #ebebeb;
            color: black;
        }

        .control-tabs .nav-item:hover .nav-link {
            color: #dc3545;
        }

        .control-tabs .nav-link.active {
            color: #dc3545 !important;
        }

        .control-tabs .nav-pills .nav-link {
            border-radius: 0;
        }

        .control-tabs .nav-item {
            position: relative;
        }

        .control-tabs .nav-link.active:before {
            content: '';
            width: 0;
            height: 0;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            position: absolute;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            border-left: 7px solid #dc3545;
        }

        #myTabContent p {
            margin-bottom: 5px;
        }

        .info-list {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
        }

        .info-list p {
            margin-bottom: 5px;
            width: 33%;
        }

        @media (max-width: 768px) {
            .tab-content{
                margin-left: 0;
            }

        }
    </style>
@endpush
