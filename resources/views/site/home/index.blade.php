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
                                <p class="slider-title"><span class="red">Love </span> Basketball <span class="red">?</span>
                                </p>
                                <button class="rounded-button"><a href="/academy-members">GROW WITH US</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item"
                     style="background: url('{{ asset("assets/site/images/home/main-banner.jpg") }}')"></div>
            </div>
        </div>
    </div>

    <div class="shop-line d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-lg-center shop-text-cont">
                    <p class="text-white m-0 shop-text">OUR NEW ONLINE SHOP IS NOW OPEN! CHECK IT OUT!</p>
                </div>
                <div class="col-md-6 d-flex align-items-lg-center justify-content-lg-end shop-btn-cont">
                    <a href="/shop" class="visit-btn text-center shop-btn">VISIT SHOP</a>
                </div>
            </div>
        </div>
    </div>

    <div class="match-slider" style="background: url('{{ asset("assets/site/images/home/match_bg.jpeg") }}')">
        <div class="container-fluid">
            <div class="row ">
                <div class="title-cont col-md-8 mb-4 mt-4" style="margin: 0 auto;">
                    <h2 class="section-title text-white"><img style="height: 30px" class="img-fluid"
                                                   src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">NEXT GAME
                    </h2>
                </div>
                <div class="col-lg-12">
                    <div class="red-header col-md-8 m-auto"></div>
                    <div class="swiper-container gallery-top col-md-8 m-b-20">
                        <div class="swiper-wrapper">

                            @for($i = 0; $i < 4; $i++)
                                <div class="swiper-slide d-flex flex-column justify-content-center">

                                    <div class="first-row  d-flex justify-content-around align-items-center">
                                        <div class="logo-cont">
                                            <img src="{{ asset("assets/site/images/clubs/club-logo.png") }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="team-cont">
                                            <span class="team">Team1</span>
                                        </div>
                                        <div class="time-cont">
                                            <span class="time">6:35 PM</span>
                                        </div>
                                        <div class="team-cont">
                                            <span>Team2</span>
                                        </div>
                                        <div class="logo-cont">
                                            <img src="{{ asset("assets/site/images/clubs/club-logo.png") }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="second-row d-flex flex-column align-items-center">
                                        <span class="finals mb-3 text-white text-uppercase">NBA finals april 28, 2021</span>
                                        <span class="stadium text-white text-uppercase">bentleigh</span>
                                    </div>

                                </div>
                            @endfor

                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs col-md-8">
                        <div class="swiper-wrapper">
                            @for($i = 0; $i < 4; $i++)
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <div class="first-row d-flex flex-column align-items-center">
                                            <div class="date-cont">
                                                <span class="date text-uppercase">March 10, 2019</span>
                                            </div>
                                            <div class="score-cont d-flex justify-content-around">
                                                <span class="score-team text-uppercase"><b>98</b></span>
                                                <span class="red text-uppercase time-final"><b>Final</b></span>
                                                <span class="score-team text-uppercase"><b>50</b></span>
                                            </div>
                                        </div>
                                        <div class="second-row red-bg d-flex align-items-end justify-content-center">
                                            <span class="finals text-uppercase"><b>NBA finals</b></span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="table-section">
        <div class="container">
            <div class="row">
                <div class="title-cont col-md-12 mb-4">
                    <h2 class="section-title"><img style="height: 30px"
                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Standings
                        Table</h2>
                </div>

                <div class="col-md-4">
                    <table class="table table-striped">
                        <tr>
                            <th class="bg-red text-center text-white table-head" colspan="4">ARMENIAN CUP</th>
                        </tr>
                        <tr class="sub-head">
                            <td>#</td>
                            <td>Team</td>
                            <td>W/L</td>
                            <td>Points</td>
                        </tr>
                        @for($i = 1; $i <=10; $i++)
                            <tr>
                                <td>1</td>
                                <td><img class="img-fluid" style="height: 20px"
                                         src="{{ asset("assets/site/images/logo.png") }}" alt="">Cilicia
                                </td>
                                <td>9/4</td>
                                <td>22</td>
                            </tr>
                        @endfor
                    </table>
                </div>

                <div class="col-md-4">
                    <table class="table table-striped">
                        <tr>
                            <th class="bg-red text-center text-white table-head" colspan="4">ARMENIAN CUP</th>
                        </tr>
                        <tr class="sub-head">
                            <td>#</td>
                            <td>Team</td>
                            <td>W/L</td>
                            <td>Points</td>
                        </tr>
                        @for($i = 1; $i <=10; $i++)
                            <tr>
                                <td>1</td>
                                <td><img class="img-fluid" style="height: 20px"
                                         src="{{ asset("assets/site/images/logo.png") }}" alt="">Cilicia
                                </td>
                                <td>9/4</td>
                                <td>22</td>
                            </tr>
                        @endfor
                    </table>
                </div>

                <div class="col-md-4">
                    <table class="table table-striped">
                        <tr>
                            <th class="bg-red text-center text-white table-head" colspan="4">ARMENIAN CUP</th>
                        </tr>
                        <tr class="sub-head">
                            <td>#</td>
                            <td>Team</td>
                            <td>W/L</td>
                            <td>Points</td>
                        </tr>
                        @for($i = 1; $i <=10; $i++)
                            <tr>
                                <td>1</td>
                                <td><img class="img-fluid" style="height: 20px"
                                         src="{{ asset("assets/site/images/logo.png") }}" alt="">Cilicia
                                </td>
                                <td>9/4</td>
                                <td>22</td>
                            </tr>
                        @endfor
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="title-cont col-md-12 mb-4 mt-4">
                    <h2 class="section-title"><img style="height: 30px"
                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Playoffs
                    </h2>
                </div>
                <div class="col-md-12">
                    <img class="img-fluid" src="{{ asset("assets/site/images/home/playoffs.png") }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="group-section">
        <div class="container">
            <div class="row">
                <div class="title-cont col-md-12 mb-4 mt-4">
                    <h2 class="section-title text-white"><img style="height: 30px" class="img-fluid"
                                                              src="{{ asset("assets/site/images/ball-white.svg") }}"
                                                              alt="">Players Of The Month</h2>
                </div>

                <div class="col-md-3">
                    <div class="main-box"
                         style="background-image: url('{{ asset("assets/site/images/home/player.jpg") }}');">
                        <div class="name-box d-flex align-items-center">
                            <p class="pl-5 m-0">#144 Name Surname</p>
                        </div>
                        <div class="age-box d-flex align-items-center">
                            <p class="text-center m-0">Under 14</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="main-box"
                         style="background-image: url('{{ asset("assets/site/images/home/player.jpg") }}');">
                        <div class="name-box d-flex align-items-center">
                            <p class="pl-5 m-0">#144 Name Surname</p>
                        </div>
                        <div class="age-box d-flex align-items-center">
                            <p class="text-center m-0">Under 14</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="main-box"
                         style="background-image: url('{{ asset("assets/site/images/home/player.jpg") }}');">
                        <div class="name-box d-flex align-items-center">
                            <p class="pl-5 m-0">#144 Name Surname</p>
                        </div>
                        <div class="age-box d-flex align-items-center">
                            <p class="text-center m-0">Under 14</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="main-box"
                         style="background-image: url('{{ asset("assets/site/images/home/player.jpg") }}');">
                        <div class="name-box d-flex align-items-center">
                            <p class="pl-5 m-0">#144 Name Surname</p>
                        </div>
                        <div class="age-box d-flex align-items-center">
                            <p class="text-center m-0">Under 14</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="title-cont col-md-12 mb-4 mt-4">
                    <h2 class="section-title"><img style="height: 30px" class="img-fluid"
                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Gallery
                    </h2>
                </div>

                <div class="col-md-6 img-box px-0">
                    <a href="#">
                        <img src="{{ asset("assets/site/images/home/grid1.jpg") }}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{ asset("assets/site/images/home/grid3.jpg") }}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{ asset("assets/site/images/home/grid2.jpg") }}" alt="">
                    </a>
                </div>

                <div class="col-md-6 img-box px-0">
                    <a href="#">
                        <img src="{{ asset("assets/site/images/home/grid2.jpg") }}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{ asset("assets/site/images/home/grid1.jpg") }}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{ asset("assets/site/images/home/grid3.jpg") }}" alt="">
                    </a>

                </div>
                <div class="col-md-12 text-center">
                    <button class="rounded-button"><a href="/gallery">OUR GALLERY</a></button>
                </div>
            </div>
            <div class="row">
                <div class="title-cont col-md-12 mb-4 mt-4">
                    <h2 class="section-title"><img style="height: 30px" class="img-fluid"
                                                   src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Club Shop
                    </h2>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="main overflow-hidden">
                        <div class="img-cont text-center">
                            <img class="img-fluid prod" src="{{ asset("assets/site/images/home/product.png") }}" alt="">
                        </div>
                        <div class="desc">
                            <p class="text-center category mb-2">Sport Shoes</p>
                            <h4 class="color-red text-center">Gray Sneakers</h4>
                            <p class="text-center price mb-1">$55</p>
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick
                                View</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="main overflow-hidden">
                        <div class="img-cont text-center">
                            <img class="img-fluid prod" src="{{ asset("assets/site/images/home/product.png") }}" alt="">
                        </div>
                        <div class="desc">
                            <p class="text-center category mb-2">Sport Shoes</p>
                            <h4 class="color-red text-center">Gray Sneakers</h4>
                            <p class="text-center price mb-1">$55</p>
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick
                                View</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="main overflow-hidden">
                        <div class="img-cont text-center">
                            <img class="img-fluid prod" src="{{ asset("assets/site/images/home/product.png") }}" alt="">
                        </div>
                        <div class="desc">
                            <p class="text-center category mb-2">Sport Shoes</p>
                            <h4 class="color-red text-center">Gray Sneakers</h4>
                            <p class="text-center price mb-1">$55</p>
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick
                                View</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="main overflow-hidden">
                        <div class="img-cont text-center">
                            <img class="img-fluid prod" src="{{ asset("assets/site/images/home/product.png") }}" alt="">
                        </div>
                        <div class="desc">
                            <p class="text-center category mb-2">Sport Shoes</p>
                            <h4 class="color-red text-center">Gray Sneakers</h4>
                            <p class="text-center price mb-1">$55</p>
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick
                                View</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 mt-3 text-center">
                    <button class="rounded-button"><a href="/shop">SHOP NOW</a></button>
                </div>
            </div>
        </div>
    </div>

    @push('head')
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.carousel.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.theme.default.min.css") }}">
        {{--swiper--}}
        <link rel="stylesheet" href="{{ asset("assets/site/swiper/package/css/swiper.min.css") }}">
        <style>
            .swiper-container {
                width: 100%;
                height: 300px;
                margin: 0 auto;
            }

            .gallery-top {
                height: 80%;
                width: 100%;
            }
            .gallery-thumbs {
                height: 120px;
                box-sizing: border-box;
                padding: 10px 0;
            }
            .gallery-thumbs .swiper-slide {
                width: 20%;
                height: 100%;
                opacity: 0.4;
            }
            .gallery-thumbs .swiper-slide-active {
                opacity: 1;
            }
            .gallery-top{
                background-image: url("{{ asset("assets/site/images/home/match_img.jpg") }}");
                background-repeat: no-repeat;
                height: 500px;
                background-size: cover;
                margin-bottom: 2%;
            }
            .gallery-top .logo-cont img{
                height: 150px;
            }
            .gallery-top .team-cont span{
                font-family: Agency, sans-serif;
                color: white;
                font-size: 35px;
                letter-spacing: 2px;
            }
            .gallery-top .time{
                padding: 10px 15px;
                background-color: #9c1d24;
                color: white;
                font-size: 20px;
            }
            .red-header{
                height: 30px;
                width: 100%;
                background-color: #9c1d24;
            }
            .gallery-top .swiper-slide{
                align-items: center;
                justify-content: space-around;
            }
            .gallery-top .first-row {
                width: 100%;
            }
            .gallery-top .finals, .gallery-top .stadium{
                font-size: 20px;
                letter-spacing: 1px;
            }
            .gallery-thumbs .first-row{
                background-color: white;
                position: relative;
            }
            .gallery-thumbs .score-cont{
                width: 100%;
            }
            .gallery-thumbs .score-cont .date, .gallery-thumbs .score-cont .score-team{
                color: black;
            }
            .gallery-thumbs .first-row:after{
                content: "";
                width: 0;
                height: 0;
                border-left: 23px solid transparent;
                border-right: 23px solid transparent;
                border-top: 12px solid #fff;
                position: absolute;
                bottom: 0;
                transform: translateY(100%);
            }
            .gallery-thumbs .finals {
                font-family: Agency, sans-serif;
                color: white;
                font-size: 18px;
                letter-spacing: 2px;
            }
            .gallery-thumbs .second-row{
                height: 55px;
            }
            .second-row.red-bg{
                background-color: #9c1d24;
            }
            .gallery-thumbs .first-row, .gallery-thumbs .second-row{
                padding: 5px;
            }
        </style>

        <style>
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
                height: 70px;
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
                height: 100vh;
                background-repeat: no-repeat !important;
                background-size: cover !important;
                padding-top: 20px;
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

            .img-box {
                flex: 0 0 50%;
            }

            .img-box a {
                display: inline-block;
                vertical-align: top;
                float: left;
                margin: 15px;
            }

            .img-box img {
                width: 100%;
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
                font-size: 30px;
                margin-top: 80px;
            }

            .shop-text {
                font-size: 12px;
                margin-bottom: 10px !important;
            }

            .shop-text-cont {
                justify-content: center;
            }

            .shop-btn-cont {
                justify-content: center;
            }

            .shop-btn {
                padding: 5px;
                height: 30px;
                width: 120px;
                font-size: 12px;
            }

            .section-title {
                font-size: 25px;
            }

            .main-box {
                margin-bottom: 10px;
                background-size: cover !important;
            }

            @media (max-width: 480px) {
                .gallery-top .swiper-slide{
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }
                .gallery-top .logo-cont img{
                    height: 50px;
                }
            }
        </style>
    @endpush
    @push("footer")
        <script src="{{ asset("assets/site/carousel/dist/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("assets/site/swiper/package/js/swiper.min.js") }}"></script>
        <script>
            $(document).ready(function () {
                $(".owl-carousel").owlCarousel({
                    items: 1,
                    margin: 1,
                    // autoHeight:true,
                    responsiveClass: true,
                });

                var galleryTop = new Swiper('.gallery-top', {
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    loop: true,
                    loopedSlides: 4
                });
                var galleryThumbs = new Swiper('.gallery-thumbs', {
                    spaceBetween: 10,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    touchRatio: 0.2,
                    slideToClickedSlide: true,
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    loopedSlides: 4,
                    breakpoints: {
                        // when window width is >= 320px
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 20
                        },
                        // when window width is >= 480px
                        480: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        },
                        // when window width is >= 640px
                        640: {
                            slidesPerView: 6,
                            spaceBetween: 40
                        }
                    }
                });
                galleryTop.controller.control = galleryTop;
                galleryThumbs.controller.control = galleryTop;

            });
        </script>
    @endpush
@endsection
