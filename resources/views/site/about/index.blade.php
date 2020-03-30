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

    <div class="story-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="title pb-3"><img style="height: 30px" class="img-fluid"
                                               src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Our Story
                    </p>
                    <p class="subtitle"> {{$about->story}} </p>
                </div>
                <div class="col-md-6">
                    <p class="title pb-3"><img style="height: 30px" class="img-fluid"
                                               src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Why
                        Cilicia</p>
                    <p class="subtitle"> {{$about->why}} </p>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="main-section">
                    <div class="col-md-12 col-xl-6 overlay-part">
                        <div class="col-xl-8 col-sm-12">
                            <p class="title pb-3"><img style="height: 30px" class="img-fluid"
                                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Our
                                Mission</p>
                            <p class="subtitle"> {{$about->mission}} </p>
                        </div>
                        @foreach(json_decode($about->mission_list) as $bin)
                            <div class="col-xl-8 col-sm-12 d-flex justify-content-center pt-3 list-section">
                                <div class="icon-cont d-flex align-items-center justify-content-center">
                                    <img class="img-fluid" src="{{ asset("assets/site/images/about/script.svg") }}" alt="">
                                </div>
                                <div class="value-part ml-4">
                                    <p class="value-title">{{$bin->mission_list_title}}</p>
                                    <p class="value-text">{{$bin->mission_list_text}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5 our-team">
            <p class="title pb-3"><img style="height: 30px" class="img-fluid"
                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Our Team</p>
            <div class="row">
                @foreach($members as $key)
                    <div class="col-md-6">
                        <div class="main-box"
                             style="background-image: url('{{ asset("uploads/our_team/$key->image") }}')">
                            <div class="red-overlay d-flex align-items-center">
                                <div class="col-md-12">
                                    <span class="badge badge-light">{{$key->status}}</span>
                                    <h6 class="member-name text-white text-uppercase mt-2 mb-3">{{$key->name}}</h6>
                                    <p class="member-text">{{$key->info}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('head')
        <style>
            .header {
                padding-top: 0;
            }

            p {
                font-family: Roboto-Condensed-Regular, sans-serif;
            }

            .sticky + .content {
                padding-top: 70px;
            }

            .story-section {
                background-color: #ebebeb;
            }

            .story-section .subtitle {
                color: #191919;
            }

            .main-section {
                background-image: url("{{ asset("assets/site/images/about/main.jpg") }}");
                /*height: 763px;*/
                height: 700px;
                width: 100%;
                background-size: contain;
                background-repeat: no-repeat;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }

            .overlay-part {
                background-color: #ebebeb;
                padding: 30px;
                box-shadow: 3px 0 10px -1px grey;
            }

            .icon-cont {
                border: 2px solid #9c1d24;
                height: 60px;
                width: 60px;
                flex: none;
            }

            .icon-cont img {
                height: 30px;
            }

            .value-title {
                margin-bottom: 2px;
                margin-top: -5px;
                font-weight: 700;
            }

            .value-text {
                font-size: 14px;
                margin-bottom: 0;
            }

            /*.icon-cont:after{*/
            /*    content: "";*/
            /*    height: 30px;*/
            /*    width: 1px;*/
            /*    position: absolute;*/
            /*    bottom: -27px;*/
            /*    background: #9c1d24;*/
            /*}*/
            .list-section {
                margin-bottom: 5px;
            }

            .main-box {
                background-repeat: no-repeat;
                width: 100%;
                height: 295px;
                background-size: contain;
                position: relative;
            }

            .red-overlay {
                position: absolute;
                width: 48%;
                right: 0;
                height: 100%;
                background-color: #9c1d24;
            }

            .red-overlay:before {
                content: "";
                width: 0;
                height: 0;
                border-top: 147px solid transparent;
                border-bottom: 148px solid transparent;
                position: absolute;
                bottom: 0;
                transform: translateX(-100%);
                border-right: 25px solid #9c1d24;
            }

            .badge {
                color: #9c1d24;
                border-radius: 6px;
                padding: 3px 12px;
            }

            .member-name {
                font-family: Agency, sans-serif;
                font-size: 21px;
                letter-spacing: 2px;
                font-weight: 600;
            }

            .member-text {
                color: #eeadb1;
                letter-spacing: 1px;
            }

            .our-team .col-md-6 {
                padding: 10px;
            }

            @media all and (max-width: 768px) {
                .main-section {
                    background: none;
                    display: block;
                    height: auto;
                }

                .overlay-part {
                    box-shadow: none;
                    padding: 0;
                }
            }
        </style>
    @endpush
@endsection
