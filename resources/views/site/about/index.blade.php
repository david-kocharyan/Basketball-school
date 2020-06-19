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
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">
                            {{ strtoupper($title) }}</p>
                        <p class="subtitle">
                            We are Cilicia, a professional Basketball Club / Academy based in Armenia with the aim of providing the best platform for basketball to the youth and the young of all ages.
                            <br>
                            <i>“The strength of the team is each individual member. The strength of each member is the team.” – Phil Jackson</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="story-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="title pb-3"><img style="height: 20px" class="img-fluid"
                                               src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Our Story
                    </p>
                    <p class="subtitle" style="white-space: pre-line"> {{$about->story ?? ""}} </p>
                </div>
                <div class="col-md-12 text-center pt-5">
                    <p class="title pb-3"><img style="height: 20px" class="img-fluid"
                                               src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Why
                        Cilicia</p>
                    <p class="subtitle"> {{$about->why ?? ""}} </p>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="main-section">
                    <div class="col-md-12 col-xl-6 overlay-part">
                        <div class="col-xl-12 col-sm-12">
                            <p class="title pb-3"><img style="height: 20px" class="img-fluid"
                                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Our
                                Mission</p>
                            <p class="subtitle"> {{$about->mission ?? ""}} </p>
                        </div>
                        @if(isset($about->mission_list) )
                            @foreach(json_decode($about->mission_list) as $k=>$bin)
                                <div class="col-xl-12 col-sm-12 d-flex pt-3 list-section">
                                    <div class="icon-cont @if($k < 3) icon-cont-line @endif  d-flex align-items-center justify-content-center">
                                        <img class="img-fluid" src="{{ asset("assets/site/images/checkmark.png") }}"
                                             alt="">
                                    </div>
                                    <div class="value-part ml-4 d-flex align-items-center">
                                        <p class="value-text">{{$bin->mission_list_text}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
                            <div class="red-overlay">
                                <div class="col-md-12 pt-3">
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
                height: 50px;
                width: 50px;
                flex: none;
            }
            .icon-cont-line:before {
                content: "";
                height: 25px;
                position: absolute;
                bottom: 0;
                transform: translateY(92%);
                border-right: 3px solid #9c1d24;
            }

            .icon-cont img {
                height: 20px;
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
                transform: translateX(-98%);
                border-right: 25px solid #9c1d24;
            }

            .badge {
                color: #9c1d24;
                border-radius: 6px;
                padding: 3px 12px;
            }

            .member-name {
                font-family: Agency, sans-serif;
                font-size: 18px;
                letter-spacing: 2px;
                font-weight: 600;
            }

            .member-text {
                color: #bdc2c6;
                letter-spacing: 1px;
                font-size: 15px;
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

                .main-box {
                    height: 195px;
                }

                .red-overlay:before {
                    content: "";
                    width: 0;
                    height: 0;
                    border-top: 102px solid transparent;
                    border-bottom: 102px solid transparent;
                    position: absolute;
                    bottom: 0;
                    transform: translateX(-98%);
                    border-right: 25px solid #9c1d24
                }
            }

            @media (min-width: 425px) and (max-width: 767px){
                .main-box {
                    height: 220px;
                }

                .red-overlay:before {
                    content: "";
                    width: 0;
                    height: 0;
                    border-top: 110px solid transparent;
                    border-bottom: 110px solid transparent;
                    position: absolute;
                    bottom: 0;
                    transform: translateX(-98%);
                    border-right: 25px solid #9c1d24
                }
            }
        </style>
    @endpush
@endsection
