@extends("layouts.site")
@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="owl-carousel">
                <div class="slider-item d-flex align-items-center"
                     style="background: url('{{ asset("assets/site/images/home/main-banner.jpg") }}')">
                    <div class="container m-auto">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="slider-title lg"><span class="red">Love </span> Basketball <span
                                        class="red">?</span>
                                </p>
                                <button class="rounded-button header-btn"><a href="/academy-members">GROW WITH US</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item d-flex align-items-center"
                     style="background: url('{{ asset("assets/site/images/home/main-banner.jpg") }}')">
                    <div class="container m-auto">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="slider-title lg"><span class="red">Summer </span> School
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop-line d-flex align-items-center" >
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-lg-center shop-text-cont">
                    <p class="text-white m-0 shop-text text-center">OUR NEW ONLINE SHOP IS NOW OPEN! CHECK IT OUT!</p>
                </div>
                <div class="col-md-6 d-flex align-items-lg-center justify-content-lg-end shop-btn-cont">
                    <a href="/shop" class="text-center shop-btn">VISIT SHOP</a>
                </div>
            </div>
        </div>
    </div>

    <div class="match-slider" style="background: url('{{ asset("assets/site/images/home/match_bg.jpeg") }}')">
        <div class="container">
            <div class="row ">
                <div class="title-cont col-md-8 mt-4">
                    <h2 class="section-title text-white"><img style="height: 25px" class="img-fluid"
                                                              src="{{ asset("assets/site/images/ball-white.svg") }}"
                                                              alt="">NEXT GAME
                    </h2>
                </div>
                <div class="col-lg-12">
                    <div class="red-header m-auto"></div>
                    <div class="gallery-top-buttons swiper-buttons">
                        <div class="prev-top"><img src="{{asset('assets/site/images/home/big-left.png')}}" alt="">
                        </div>
                        <div class="next-top"><img src="{{asset('assets/site/images/home/big-right.png')}}" alt="">
                        </div>
                    </div>
                    <div class="swiper-container gallery-top m-b-20 animate">
                        <div class="swiper-wrapper">
                            @foreach($game as $key=>$val)
                                <div class="swiper-slide finished-games d-flex flex-column justify-content-center">
                                    <div class="first-row  d-flex justify-content-around align-items-center">

                                        <div class="left-cont text-center">
                                            <div class="logo-cont">
                                                <img src='{{ asset("uploads/clubs")."/".$val->club[0]->image }}'
                                                     class="img-fluid" alt="">
                                            </div>
                                            <div class="team-cont left text-center">
                                                <span class="team">{{$val->club[0]->name}}</span>
                                            </div>
                                        </div>

                                        <div class="date-cont game-score left text-md-right" style="width: 100px;">
                                            <span class="team"
                                                  style="font-weight: bolder;">{{$val->game_club[0]->score}}</span>
                                        </div>
                                        <div class="time-cont text-center mt-md-5">
                                            <span class="time">{{$val->type}}</span>
                                            <p class="finish_date mt-3">{{\Carbon\Carbon::parse($val->date)->format('d/m/yy')}}</p>
                                        </div>
                                        <div class="date-cont game-score right text-md-left" style="width: 100px;">
                                            <span class="team"
                                                  style="font-weight: bolder;">{{$val->game_club[1]->score}}</span>
                                        </div>

                                        <div class="right-cont text-center">
                                            <div class="logo-cont">
                                                <img src='{{ asset("uploads/clubs")."/".$val->club[1]->image }}'
                                                     class="img-fluid" alt="">
                                            </div>
                                            <div class="team-cont right text-center">
                                                <span>{{$val->club[1]->name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="second-row d-flex flex-column align-items-center ml-md-4">
                                        <hr style="border-bottom: 1px solid #9c1d24; width: 90%;">
                                        <span
                                            class="finals mb-3 text-white text-uppercase">Best Player: {{$val->best_player}}</span>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($upcoming as $key=>$val)
                                <div class="swiper-slide d-flex flex-column justify-content-center">
                                    <div class="first-row  d-flex justify-content-around align-items-center">
                                        <div class="left-cont text-center">
                                            <div class="logo-cont">
                                                <img src='{{ asset("uploads/clubs")."/".$val->club[0]->image }}'
                                                     class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="team-cont left">
                                            <span class="team">{{$val->club[0]->name}}</span>
                                        </div>
                                        <div class="time-cont">
                                            <span
                                                class="time">{{Carbon\Carbon::parse($val->time)->format('H:i')}}</span>
                                        </div>
                                        <div class="team-cont right">
                                            <span>{{$val->club[1]->name}}</span>
                                        </div>
                                        <div class="right-cont text-center">
                                            <div class="logo-cont">
                                                <img src='{{ asset("uploads/clubs")."/".$val->club[1]->image }}'
                                                     class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="second-row d-flex flex-column align-items-center ml-md-4">
                                        <span
                                            class="finals mb-3 text-white text-uppercase">{{$val->type}} {{Carbon\Carbon::parse($val->date)->format(' F d, Y')}}</span>
                                        <span class="stadium text-white text-uppercase">{{$val->center->name}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($game as $key=>$val)
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="first-row d-flex flex-column align-items-center">
                                            <div class="date-cont">
                                                <span
                                                    class="date text-uppercase">{{Carbon\Carbon::parse($val->date)->format(' F d, Y')}}</span>
                                            </div>
                                            <div class="score-cont d-flex justify-content-around">
                                                <span
                                                    class="score-team text-uppercase"><b>{{$val->game_club[0]->score}}</b></span>
                                                <span class="red text-uppercase time-final"><b>{{$val->type}}</b></span>
                                                <span
                                                    class="score-team text-uppercase"><b>{{$val->game_club[1]->score}}</b></span>
                                            </div>
                                        </div>
                                        <div
                                            class="second-row gray-bg d-flex align-items-end justify-content-center">
                                            <span
                                                class="finals text-uppercase"><b>{{$val->tournament->name ?? "Friendly"}}</b></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($upcoming as $key=>$val)
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="first-row d-flex flex-column align-items-center">
                                            <div class="date-cont">
                                                <span
                                                    class="date text-uppercase">{{Carbon\Carbon::parse($val->date)->format(' F d, Y')}}</span>
                                            </div>
                                            <div class="score-cont d-flex justify-content-around">
                                                <span
                                                    class="score-team text-uppercase"><b>{{$val->club[0]->name[0]}}</b></span>
                                                <span
                                                    class="red text-uppercase time-final"><b>{{Carbon\Carbon::parse($val->time)->format('H:i')}}</b></span>
                                                <span
                                                    class="score-team text-uppercase"><b>{{$val->club[1]->name[0]}}</b></span>
                                            </div>
                                        </div>
                                        <div
                                            class="second-row red-bg d-flex align-items-end justify-content-center">
                                            <span class="finals text-uppercase"><b>{{$val->type}}</b></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-buttons">
                            <div class="prev"><img src="{{asset('assets/site/images/home/slider-left.png')}}" alt="">
                            </div>
                            <div class="next"><img src="{{asset('assets/site/images/home/slider-right.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-section">
        <div class="container">
            <div class="row">
                <div class="title-cont col-md-12">
                    <h2 class="section-title"><img style="height: 25px"
                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Standings
                        Table</h2>
                </div>

                @foreach($standings as $key => $val)
                    <div class="d-md-block @if($key != 0) d-none @endif col-md-4">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-red text-center text-white table-head" colspan="4">{{$val->name}}</th>
                            </tr>
                            <tr class="sub-head">
                                <td>#</td>
                                <td class="text-left" style="width: 50%;">Team</td>
                                <td>W/L</td>
                                <td>Points</td>
                            </tr>
                            @foreach($val->tournament_clubs as $b=>$v)
                                @if($b > 10) @break @endif
                                <tr>
                                    <td>{{$b + 1}}</td>
                                    <td class="text-left"><img class="img-fluid"
                                                               style="height: 20px; margin-right: 10px"
                                                               src="{{ asset("uploads/clubs")."/".$val->clubs[$b]->image }}"
                                                               alt="">{{$val->clubs[$b]->name}}
                                    </td>
                                    <td>{{$v->win." / ".$v->lose}}</td>
                                    <td>{{$v->points}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endforeach
            </div>
            {{--            <div class="row">--}}
            {{--                <div class="title-cont col-md-12 mt-4">--}}
            {{--                    <h2 class="section-title"><img style="height: 25px"--}}
            {{--                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Playoffs--}}
            {{--                    </h2>--}}
            {{--                </div>--}}
            {{--                <div class="col-md-12">--}}
            {{--                    <img class="img-fluid" src="{{ asset("assets/site/images/home/playoffs.png") }}" alt="">--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>

    <div class="group-section">
        <div class="container">
            <div class="row">
                <div class="title-cont col-md-12 mt-4">
                    <h2 class="section-title text-white"><img style="height: 25px" class="img-fluid"
                                                              src="{{ asset("assets/site/images/ball-white.svg") }}"
                                                              alt="">Players Of The Month</h2>
                </div>
                @foreach($best_players as $key)
                    <div class="col-md-3">
                        <div class="main-box"
                             style="background-image: url('{{ asset("uploads/player/")."/".$key->players->image }}'); transition: all 1s;">
                            <div class="name-box d-flex align-items-center">
                                <p class="pl-5 m-0">{{ "#".$key->players->jersey_number  }} <span
                                        class="mr-3">{{" ". $key->players->full_name}}</span></p>
                            </div>
                            <div class="age-box d-flex align-items-center">
                                <p class="text-center m-0">{{$key->team}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="gallery">
        <div class="container">
            <div class="row gal-row">
                <div class="title-cont col-md-12 mt-4">
                    <h2 class="section-title"><img style="height: 25px" class="img-fluid"
                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Gallery
                    </h2>
                </div>
                <div class="col-md-6 d-none d-xl-block img-box px-0">
                    @foreach($home_gallery as $bin=>$key)
                        @if($bin <= 2)
                            <div class="gallery-main-box">
                                <div class="rect-camera d-flex align-items-center">
                                    <img src="{{ asset("assets/site/images/rect-camera.png") }}" alt="">
                                </div>
                                <img class="example-image" src="{{ asset("uploads/home_gallery/$key->image") }}"
                                     alt=""/>
                                <div class="overlay-hover">
                                    <div class="detail">
                                        <p class="text-capitalize text-white m-0">{{$key->album->name}}</p>
                                        <a href="javascript:void(0);" class="gallery-open-link"
                                           data-id="{{ $key->album_id }}">
                                            <button class="gallery-rounded-button rounded-button">Watch Album</button>
                                        </a>
                                    </div>
                                    <div class="triangle">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            @continue
                        @endif
                    @endforeach
                </div>

                <div class="col-md-6 d-none d-xl-block img-box px-0">
                    @foreach($home_gallery as $bin=>$key)
                        @if($bin > 2)
                            <div class="gallery-main-box">
                                <div class="rect-camera d-flex align-items-center">
                                    <img src="{{ asset("assets/site/images/rect-camera.png") }}" alt="">
                                </div>
                                <img class="example-image" src="{{ asset("uploads/home_gallery/$key->image") }}"
                                     alt=""/>
                                <div class="overlay-hover">
                                    <div class="detail">
                                        <p class="text-capitalize text-white m-0">{{$key->album->name}}</p>
                                        <a href="javascript:void(0);" class="gallery-open-link"
                                           data-id="{{ $key->album_id }}">
                                            <button class="gallery-rounded-button rounded-button">Watch Album</button>
                                        </a>
                                    </div>
                                    <div class="triangle">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            @continue
                        @endif
                    @endforeach
                </div>

                @foreach($home_gallery as $bin=>$key)
                    <div class="col-lg-4 col-md-6 col-12 d-xl-none pb-3 mob-version">
                        <div class="gallery-main-box"
                             style="background-image: url('{{ asset("uploads/home_gallery/$key->image") }}'); height: 255px; background-repeat:no-repeat; background-size: cover; background-position: center; ">
                            <div class="rect-camera d-flex align-items-center">
                                <img src="{{ asset("assets/site/images/rect-camera.png") }}" alt="">
                            </div>
                            <img class="example-image" src=""
                                 alt=""/>
                            <div class="overlay-hover">
                                <div class="detail">
                                    <p class="text-capitalize text-white m-0">{{$key->album->name}}</p>
                                    <a href="javascript:void(0);" class="gallery-open-link"
                                       data-id="{{ $key->album_id }}">
                                        <button class="gallery-rounded-button rounded-button">Watch Album</button>
                                    </a>
                                </div>
                                <div class="triangle">
                                    <span>+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12 text-center">
                    <button class="rounded-button"><a href="/gallery">OUR GALLERY</a></button>
                </div>
            </div>
            <div class="row club">
                <div class="title-cont col-md-12 mt-4">
                    <h2 class="section-title"><img style="height: 25px" class="img-fluid"
                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Club Shop
                    </h2>
                </div>
                @foreach($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="main overflow-hidden">
                            <div class="img-cont text-center prod">
                                <img class="img-fluid" id="{{ $product->id }}"
                                     src="{{ asset("uploads/product/" . ($product->getImages[0]->name ?? '')) }}"
                                     alt="{{ $product->name }}" width="200">
                            </div>
                            <div class="desc">
                                <p class="text-center category mb-2">{{ $product->getCategory->name }}</p>
                                <h4 class="color-red text-center">{{ $product->name }}</h4>
                                <p class="text-center price mb-1">{{ $product->price }}</p>
                                <p data-info="{{ json_encode($product) }}"
                                   class="quick-view d-flex justify-content-center align-items-center text-uppercase">
                                    View</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12 mt-3 text-center">
                    <button class="rounded-button"><a href="/shop">SHOP NOW</a></button>
                </div>
            </div>
        </div>
        <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body row">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('head')
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.carousel.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.theme.default.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/plugins/dbLightbox/dist/simpleLightbox.min.css") }}">
        {{--swiper--}}
        <link rel="stylesheet" href="{{ asset("assets/site/swiper/package/css/swiper.min.css") }}">
        {{--slider style--}}
        <style>
            .swiper-container {
                width: 100%;
                margin: 0 auto;
            }

            .finish_date {
                color: white;
                font-size: 14px;
            }

            .gray-bg {
                background-color: #6c6c6e;
            }

            .gallery-top {
                background-image: url("{{ asset("assets/site/images/home/match_img.jpg") }}");
                background-repeat: no-repeat;
                height: 444px;
                width: 941px;
                background-size: cover;
            }

            .gallery-thumbs {
                box-sizing: border-box;
                padding: 60px 0 10px 0;
                width: 941px;
            }

            .gallery-thumbs .swiper-slide {
                width: 20%;
                height: 100%;
                opacity: 1;
            }

            .gallery-thumbs .swiper-slide-active {
                opacity: 1;
            }

            .logo-cont img {
                height: 180px;
                object-fit: contain;
            }

            .logo-cont {
                padding: 0 30px;
            }

            .gallery-top .team-cont span {
                font-family: Agency, sans-serif;
                color: white;
                font-size: 30px;
                letter-spacing: 1px;
            }

            .gallery-top .team-cont.date-cont span {
                font-family: Arial, sans-serif;
                font-size: 35px;
            }

            .gallery-top .time {
                padding: 10px 15px;
                background-color: #9c1d24;
                color: white;
                font-size: 20px;
            }

            .red-header {
                height: 30px;
                width: 941px;
                background-color: #9c1d24;
            }

            .gallery-top .swiper-slide {
                align-items: center;
                justify-content: space-around;
            }

            .gallery-top .first-row {
                width: 100%;
            }

            .gallery-top .finals, .gallery-top .stadium {
                font-size: 20px;
                letter-spacing: 1px;
            }

            .gallery-thumbs .first-row {
                background-color: white;
                position: relative;
            }

            .gallery-thumbs .score-cont {
                width: 100%;
                font-size: 12px;
            }

            .gallery-thumbs .score-cont .date, .gallery-thumbs .score-cont .score-team {
                color: black;
                font-size: 12px;
            }

            .gallery-thumbs .first-row:after {
                content: "";
                width: 0;
                height: 0;
                border-left: 23px solid transparent;
                border-right: 23px solid transparent;
                border-top: 12px solid #fff;
                position: absolute;
                bottom: 1px;
                transform: translateY(100%);
            }

            .gallery-thumbs .finals {
                font-family: Agency, sans-serif;
                color: white;
                font-size: 18px;
                letter-spacing: 2px;
            }

            .gallery-thumbs .second-row {
                height: 55px;
            }

            .second-row.red-bg {
                background-color: #9c1d24;
            }

            .gallery-thumbs .first-row, .gallery-thumbs .second-row {
                padding: 5px;
                height: 52px;
            }

            .gallery-top-buttons.swiper-buttons img {
                height: 50px;
            }

            .gallery-thumbs .swiper-buttons {
                position: absolute;
                width: 30px;
                top: 20px;
                right: 0;
                color: white;
                display: flex;
                align-items: unset;
                justify-content: space-around;
            }

            .gallery-thumbs .swiper-buttons .next, .gallery-thumbs .swiper-buttons .prev {
                cursor: pointer;
            }

            .gallery-top-buttons {
                position: absolute;
                left: 0;
                right: 0;
                margin: 0 auto;
                top: 175px;
                color: white;
                display: flex;
                align-items: unset;
                justify-content: space-between;
            }

            .gallery-top-buttons .prev-top:hover, .gallery-top-buttons .next-top:hover {
                cursor: pointer;
            }

            @media (max-width: 1199px) {
                .gallery-top {
                    width: auto;
                }

                .gallery-top-buttons.swiper-buttons img {
                    height: 40px;
                }

                .gallery-top-buttons .prev-top img {
                    transform: translateX(-30px);
                }

                .gallery-top-buttons .next-top img {
                    transform: translateX(30px);
                }
            }

            @media (max-width: 1024px) {
                .gallery-top-buttons {
                    display: none;
                }
            }
        </style>

        {{--gallery style--}}
        <style>
            p {
                font-family: Roboto-Condensed-Regular, sans-serif;
            }

            .triangle {
                position: absolute;
                height: 60px;
                width: 60px;
                display: flex;
                background-color: #9c1d24;
                transform: rotate(45deg);
                right: -100px;
                bottom: -100px;
                color: white;
                transition: .5s;
            }

            .triangle span {
                position: absolute;
                display: block;
                transform: rotate(-45deg);
                top: 15px;
                left: 9px;
            }

            .img-box {
                flex: 0 0 50%;
            }

            .img-box .gallery-main-box {
                display: inline-block;
                vertical-align: top;
                float: left;
                margin: 15px;
            }

            .img-box img {
                width: 100%;
            }

            .gallery-main-box:hover .overlay-hover .triangle {
                right: -30px;
                bottom: -30px;
            }

            .gallery-main-box {
                height: auto;
                box-shadow: 3px 0 10px -1px grey;
                position: relative;
                cursor: initial !important;
            }

            .overlay-hover {
                position: absolute;
                height: 25%;
                padding: 20px 0;
                width: 100%;
                background-color: #0000009e;
                bottom: 0;
                z-index: 10;
                transition: .5s;
            }

            .gallery-main-box:hover .overlay-hover {
                height: 100%;
            }

            .overlay-hover p {
                position: absolute;
                left: 20px;
                top: 20px;
                transition: .5s;
            }

            .overlay-hover button {
                position: absolute;
                margin-top: 50px;
                left: 20px;
                top: 20px;
                transition: .5s;
            }

            .gallery-rounded-button {
                width: auto;
                height: auto;
                border-radius: 8px;
            }

            .gallery-main-box:hover .overlay-hover p {
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                top: 50%;
                text-align: center;
            }

            .gallery-thumbs .swiper-slide-container {
                padding: 2px;
                border: 1px solid transparent;
            }

            .gallery-thumbs .swiper-slide-container:hover, .gallery-thumbs .swiper-slide-active .swiper-slide-container {
                border: 1px solid #9c1d24;
                cursor: pointer;
            }

            .gallery-main-box:hover .overlay-hover button {
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                top: 50%;
                text-align: center;
            }

            .nav-tabs {
                background: #151515;
                border-radius: 10px;
                overflow: hidden;
            }

            .gallery-main-box img {
                height: 100%;
                width: 100%;
            }

            .nav-tabs li {
                height: 40px;
                display: flex;
                align-items: center;
            }

            .nav-tabs a {
                padding: 8px 25px;
                text-decoration: none;
                color: white;
            }

            .nav-tabs .active {
                background: #9c1d24;
            }

            .tab-content .row {
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>

        {{--other--}}
        <style>
            .title-cont{
                margin-bottom: 40px !important;
            }
            .owl-carousel {
                height: 90vh;
            }

            .slider-item {
                height: 90vh;
                width: 100%;
                background-repeat: no-repeat !important;
                background-size: cover !important;
            }

            .owl-dots button {
                width: 15px;
                height: 15px;
                border: 2px solid #141515 !important;
                background: transparent !important;
                margin: 5px;
            }

            .slider-title {
                font-size: 60px;
                text-transform: uppercase;
                font-family: Agency, sans-serif;
                font-weight: 700;
                color: white;
                letter-spacing: 4px;
            }

            .slider-text {
                color: white;
                font-family: Roboto-Condensed-Regular, sans-serif, sans-serif;
                font-size: 15px;
                letter-spacing: 1px;
            }

            .owl-dots .owl-dot.active {
                background: white !important;
            }

            .owl-dots {
                position: relative;
                top: -50px;
                text-align: center;
            }

            .shop-line {
                padding: 30px 0;
                background: #151515;
            }

            .visit-btn:hover {
                text-decoration: none;
                color: white;
            }

            .visit-btn {
                border-radius: 8px;
                text-decoration: none;
                border: 2px solid #9c1d24;
                width: 140px;
                height: 40px;
                font-family: Roboto-Condensed-Bold, sans-serif;
                color: white;
                font-size: 15px;
                letter-spacing: 1px;
                padding: 7px;
            }

            .match-slider {
                background-repeat: no-repeat !important;
                background-size: cover !important;
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .table-section {
                padding: 50px 0;
                background: #ebebeb;
            }

            .sub-head {
                background: #6c6c6e !important;
            }

            .table-section th, .table-section td {
                border: none !important;
                text-align: center;
            }

            .sub-head td {
                color: white;
            }

            .table-striped tbody tr:nth-of-type(even) {
                background: white;
            }

            .group-section {
                padding: 50px 0;
                height: auto;
                background: url("{{ asset("assets/site/images/home/match_bg.jpeg") }}") no-repeat;
                -webkit-background-size: cover;
                background-size: cover;
            }

            .gallery {
                background: #ebebeb;
                padding: 50px 0;
            }

            .main {
                border: 1px solid #ccced2;
                border-radius: 8px;
                padding: 10px 20px;
                transition: .3s;
                position: relative;
            }

            .gallery .main:hover {
                border: 1px solid #9c1d24;
            }

            .gallery .main:hover .quick-view {
                bottom: 0;
            }

            .quick-view {
                background: #9c1d24;
                text-align: center;
                position: absolute;
                bottom: -39px;
                width: 100%;
                left: 0;
                height: 39px;
                margin-bottom: 0;
                color: white;
                transition: .3s;
                cursor: pointer;
            }

            .prod {
                height: 200px;
                line-height: 200px;
            }

            .category {
                color: #6c6c6e;
                font-size: 12px;
            }

            .price {
                color: #6c6c6e;
                font-size: 16px;
            }

            .slider-title {
                font-size: 35px;
                margin-top: 80px;
            }

            .shop-text {
                font-size: 16px;
            }

            .shop-btn-cont {
                justify-content: center;
            }

            .shop-btn {
                padding: 15px 30px;
                font-size: 16px;
                border-radius: 8px;
                text-decoration: none;
                border: 2px solid #9c1d24;
                font-family: Roboto-Condensed-Bold, sans-serif;
                color: white;
                letter-spacing: 1px;
            }

            .shop-btn:hover {
                background: #9c1d24;
                text-decoration: none;
                color: white;
            }

            .section-title {
                font-size: 35px;
            }

            .main-box {
                margin-bottom: 10px;
                background-size: cover !important;
            }

            .header-btn:hover, .rounded-button:hover {
                border: 1px solid white;
                background: #151515;
                background-position: 0 -100%;
            }

            .gallery-main-box {
                height: 255px;
                position: relative;
                overflow: hidden;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .rect-camera {
                position: absolute;
                width: 30px;
                top: 10px;
                left: 10px;
            }

            @media (max-width: 480px) {
                .gallery-top .swiper-slide {
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }

                .gallery-top .logo-cont img {
                    height: 90px;
                }

                .gallery-top .first-row {
                    height: 100%;
                    flex-direction: column;
                }

                /*.gallery-top, .swiper-slide{*/
                /*    height: 520px!important;*/
                /*}*/
                .gallery-top .team-cont {
                    width: 50%;
                }

                .gallery-top-buttons {
                    display: none;
                }
            }

            @media (max-width: 1024px) {
                .gallery-top, .gallery-thumbs, .red-header {
                    width: 697px;
                }

                .gallery-top .team-cont span {
                    font-size: 20px;
                }

            }

            @media (max-width: 768px) {
                .gallery-top .logo-cont img {
                    height: 100px;
                }

                .gallery-top, .gallery-thumbs, .red-header {
                    width: 100%;
                }

                .finished-games .time {
                    padding: 10px 8px;
                    font-size: 15px;
                }

                .finished-games .date-cont span {
                    font-size: 20px;
                }

                .gallery-top {
                    height: 500px;
                }

                .match-slider .swiper-slide .logo-cont:first-child, .match-slider .swiper-slide .left, .animate .logo-cont:first-child, .animate .left {
                    position: relative;
                    left: 0;
                    top: -250%;
                }

                .match-slider .swiper-slide .logo-cont:last-child, .match-slider .swiper-slide .right, .animate .logo-cont:last-child, .animate .right {
                    position: relative;
                    right: 0;
                    bottom: -250%;
                }

                .match-slider .swiper-slide.swiper-slide-active .logo-cont:first-child, .match-slider .swiper-slide.swiper-slide-duplicate-active .logo-cont:first-child, .match-slider .swiper-slide.swiper-slide-active .left, .match-slider .swiper-slide.swiper-slide-duplicate-active .left {
                    top: 0;
                }

                .match-slider .swiper-slide.swiper-slide-active .logo-cont:last-child, .match-slider .swiper-slide.swiper-slide-duplicate-active .logo-cont:last-child, .match-slider .swiper-slide.swiper-slide-active .right, .match-slider .swiper-slide.swiper-slide-duplicate-active .right {
                    bottom: 0;
                }

                .gallery-top-buttons {
                    display: none;
                }
            }

            /*ss*/
            .modal-content .lSSlideWrapper.usingCss {
                border: 1px solid #d0d2d4;
            }

            #lightSlider-modal {
                height: 300px;
            }

            .modal-content .lSPager li {
                border: 1px solid #d0d2d4;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .modal-content .lSPager li img {
                max-height: 80px;
            }

            #lightSlider-modal .price {
                color: #6c6c6e;
                font-size: 16px;
            }

            #lightSlider-modal .img-cont {
                text-align: center;
            }

            #lightSlider-modal .description {
                color: #5b5b5b;
            }

            @media (max-width: 768px) {
                .img-box {
                    display: block;
                }

                .game-score {
                    text-align: center;
                }
            }
        </style>
    @endpush
    @push("footer")
        <script src="{{ asset("assets/site/carousel/dist/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("assets/site/swiper/package/js/swiper.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/dbLightbox/dist/simpleLightbox.js") }}"></script>
        <script>
            $(document).ready(function () {
                $('.gallery-open-link').click(function () {
                    let id = $(this).data('id');
                    $.ajax({
                        url: '/home-gallery-ajax',
                        type: 'post',
                        data: {"_token": "{{ csrf_token() }}", "id": id},
                        dataType: 'json',
                        success: function (result) {
                            SimpleLightbox.open({
                                items: result,
                                closeOnOverlayClick: false,
                                loadingTimeout: 0,
                            });
                        }
                    })
                });

                $(".owl-carousel").owlCarousel({
                    items: 1,
                    margin: 1,
                    // autoHeight:true,
                    responsiveClass: true,
                });

                var galleryTop = new Swiper('.gallery-top', {
                    spaceBetween: 10,
                    loop: true,
                    loopedSlides: 4,
                    navigation: {
                        nextEl: '.next-top',
                        prevEl: '.prev-top',
                    },
                });
                var galleryThumbs = new Swiper('.gallery-thumbs', {
                    spaceBetween: 100,
                    centeredSlides: false,
                    slidesPerView: 5,
                    touchRatio: 0.2,
                    slideToClickedSlide: true,
                    loop: true,
                    navigation: {
                        nextEl: '.next',
                        prevEl: '.prev',
                    },
                    loopedSlides: 4,
                    breakpoints: {
                        // when window width is >= 320px
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 10
                        },
                        // when window width is >= 768
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        },
                        // when window width is >= 1025
                        1025: {
                            slidesPerView: 5,
                            spaceBetween: 10
                        }
                    }
                });
                galleryTop.controller.control = galleryTop;
                galleryThumbs.controller.control = galleryTop

                let asset_url = '{{ asset("uploads/product") . "/" }}';
                $(document).on("click", ".quick-view", function () {
                    let data = JSON.parse($(this).attr("data-info"));
                    let images = data.get_images;
                    let html = "<div class='col-xl-8'>"
                    html += "<ul id='lightSlider-modal'>";
                    images.forEach(e => {
                        html += `<li class='img-cont' style='display: flex; align-items: center; justify-content: center; height: 100%' data-thumb="${asset_url + e.name}">
                                <img class="img-fluid" style="max-height: 300px;" src="${asset_url + e.name}" />`
                    });
                    html += "</ul></div>";
                    html += "<div class='col-lg-4'>";
                    html += `<p class='name color-red'><b>${data.name}</b></p>`;
                    html += `<p class="price"><b>$${data.price}</b></p>`;
                    html += `<p class="description">${data.description}</p>`;
                    html += `<p><b>Category: </b> <span class="color-red">${data.get_category.name}</span></p>`;
                    html += "</div>";
                    $(".modal-body").html(html);
                    $(".modal").modal();
                    $('#lightSlider-modal').lightSlider({
                        gallery: true,
                        item: 1,
                        loop: true,
                        slideMargin: 0,
                        thumbItem: 4,
                        thumbMargin: 10,
                        controls: false
                    });
                });

                let match_offset = $(".gallery-top").offset().top;
                let match_text = $(".match-slider .title-cont").offset().top;
                let table_text = $(".table-section .title-cont").offset().top;
                let group_text = $(".group-section .title-cont").offset().top;
                let gallery_text = $(".gal-row .title-cont").offset().top;
                let club_text = $(".club .title-cont").offset().top;

                let texts = [match_text, table_text, group_text, gallery_text, club_text];

                let current_offset_top = $(window).scrollTop();   // in case the window is not scrolled top on page load
                removeMatchAnimation(match_offset, current_offset_top);
                animateTexts($(window).scrollTop(), ...texts);

                $(document).on("scroll", function () {
                    removeMatchAnimation(match_offset, $(window).scrollTop());
                    animateTexts($(window).scrollTop(), ...texts);
                });

            });
            let removeMatchAnimation = (match_offset, current_offset_top) => {
                if (current_offset_top >= match_offset - 550 && current_offset_top <= match_offset + 550) {
                    $(".gallery-top").removeClass("animate");
                } else {
                    if (!$(".gallery-top").hasClass("animate")) $(".gallery-top").addClass("animate");
                }
            }
            let animateTexts = (current_offset, a, b, c, d, e) => {

                if (current_offset >= a - 550) {
                    $(".match-slider .title-cont").addClass("animation-finished");
                }

                if (current_offset >= b - 550) {
                    $(".table-section .title-cont").addClass("animation-finished");
                }

                if (current_offset >= c - 550) {
                    $(".group-section .title-cont").addClass("animation-finished");
                }

                if (current_offset >= d - 550) {
                    $(".gal-row .title-cont").addClass("animation-finished");
                }

                if (current_offset >= e - 550) {
                    $(".club .title-cont").addClass("animation-finished");
                }

            }
        </script>
    @endpush
@endsection
