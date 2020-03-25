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
                                <p class="slider-title"><span class="red">Challengers</span> path <br> to the playoffs
                                </p>
                                <p class="slider-text">Until building time sit amet, consectetur adipisicing elit. Alias
                                    aut deleniti dolore doloremque eos est eum excepturi harum illum magnam minima,
                                    obcaecati optio quibusdam quo repudiandae veritatis voluptate! Excepturi,
                                    repellendus! </p>
                                <button class="rounded-button">READ MORE</button>
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
                    <a href="#" class="visit-btn text-center shop-btn">VISIT SHOP</a>
                </div>
            </div>
        </div>
    </div>

    <div class="match-slider" style="background: url('{{ asset("assets/site/images/home/match_bg.jpeg") }}')">
        <div class="container-fluid">
            <div class="row min-vh-100 align-items-center">
                <div class="col-lg-8 offset-lg-2" id="slider">
                    <div id="myCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="active carousel-item" data-slide-number="0">
                                <div class="item-data">
                                    <div class="col-md-4">10</div>
                                    <div class="col-md-4">10</div>
                                    <div class="col-md-4">10</div>
                                </div>
                            </div>
                            <div class="carousel-item" data-slide-number="1">
                                <div class="item-data">
                                    <div class="col-md-4">10</div>
                                    <div class="col-md-4">10</div>
                                    <div class="col-md-4">10</div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
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
                    <button class="rounded-button">Club Shop</button>
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
                    <button class="rounded-button">SHOP NOW</button>
                </div>
            </div>
        </div>
    </div>

    @push('head')
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.carousel.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.theme.default.min.css") }}">

        <style>
            #myCarousel .list-inline {
                white-space: nowrap;
                overflow-x: auto;
            }

            #myCarousel .carousel-item {
                width: 100%;
                height: 590px;
                background: url('{{asset("assets/site/images/match-bg.png")}}');
                background-repeat: no-repeat !important;
                background-size: cover !important;
            }

            #myCarousel > .carousel-control-next {
                right: -15%;
            }

            #myCarousel > .carousel-control-prev {
                left: -15%;
            }

            #myCarousel  .carousel-control-next-icon,  #myCarousel .carousel-control-prev-icon {
                width: 50px;
                height: 50px;
            }
            #myCarousel .item-data{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                border: 1px solid red;
                height: auto;
                margin-top: 50px;
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
                /*height: 800px;*/
                background-repeat: no-repeat !important;
                background-size: cover !important;
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

        </style>
    @endpush
    @push("footer")
        <script src="{{ asset("assets/site/carousel/dist/owl.carousel.min.js") }}"></script>
        <script>
            $(document).ready(function () {
                $(".owl-carousel").owlCarousel({
                    items: 1,
                    margin: 1,
                    // autoHeight:true,
                    responsiveClass: true,
                });
            });
        </script>
    @endpush
@endsection
