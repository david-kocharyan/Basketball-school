@extends("layouts.site")
@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="owl-carousel">
                <div class="slider-item d-flex align-items-center" style="background: url('{{ asset("assets/site/images/home/main-banner.jpg") }}')">
                    <div class="container m-auto">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="slider-title"> <span class="red">Challengers</span>  path <br> to the playoffs</p>
                                <p class="slider-text">Until building time sit amet, consectetur adipisicing elit. Alias aut deleniti dolore doloremque eos est eum excepturi harum illum magnam minima, obcaecati optio quibusdam quo repudiandae veritatis voluptate! Excepturi, repellendus! </p>
                                <button class="rounded-button">READ MORE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item" style="background: url('{{ asset("assets/site/images/home/main-banner.jpg") }}')"></div>
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
        <div class="container">
            <div class="row">
{{--                <div class="gallery-demo">--}}
{{--                    <ul id="imageGallery">--}}
{{--                        @for($i = 1; $i <= 10; $i ++)--}}
{{--                        <li data-thumb="http://sachinchoolur.github.io/lightslider/img/cS-{{ $i }}.jpg" data-src="http://sachinchoolur.github.io/lightslider/img/cS-{{ $i }}.jpg">--}}
{{--                            <img src="http://sachinchoolur.github.io/lightslider/img/cS-{{ $i }}.jpg" />--}}
{{--                        </li>--}}
{{--                        @endfor--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    <div class="table-section">
        <div class="container">
            <div class="row">
                <div class="title-cont col-md-12 mb-4">
                    <h2 class="section-title"><img style="height: 30px" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Standings Table</h2>
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
                                <td><img class="img-fluid" style="height: 20px" src="{{ asset("assets/site/images/logo.png") }}" alt="">Cilicia</td>
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
                                <td><img class="img-fluid" style="height: 20px" src="{{ asset("assets/site/images/logo.png") }}" alt="">Cilicia</td>
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
                                <td><img class="img-fluid" style="height: 20px" src="{{ asset("assets/site/images/logo.png") }}" alt="">Cilicia</td>
                                <td>9/4</td>
                                <td>22</td>
                            </tr>
                        @endfor
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="title-cont col-md-12 mb-4 mt-4">
                    <h2 class="section-title"><img style="height: 30px" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Playoffs</h2>
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
                    <h2 class="section-title text-white"><img style="height: 30px" class="img-fluid" src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Players Of The Month</h2>
                </div>

                <div class="col-md-3">
                    <div class="main-box" style="background: url('{{ asset("assets/site/images/home/player.jpg") }}') no-repeat">
                        <div class="name-box d-flex align-items-center">
                            <p class="pl-5 m-0">#144 Name Surname</p>
                        </div>
                        <div class="age-box d-flex align-items-center">
                            <p class="text-center m-0">Under 14</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="main-box" style="background: url('{{ asset("assets/site/images/home/player.jpg") }}') no-repeat">
                        <div class="name-box d-flex align-items-center">
                            <p class="pl-5 m-0">#144 Name Surname</p>
                        </div>
                        <div class="age-box d-flex align-items-center">
                            <p class="text-center m-0">Under 14</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="main-box" style="background: url('{{ asset("assets/site/images/home/player.jpg") }}') no-repeat">
                        <div class="name-box d-flex align-items-center">
                            <p class="pl-5 m-0">#144 Name Surname</p>
                        </div>
                        <div class="age-box d-flex align-items-center">
                            <p class="text-center m-0">Under 14</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="main-box" style="background: url('{{ asset("assets/site/images/home/player.jpg") }}') no-repeat">
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
                    <h2 class="section-title"><img style="height: 30px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Gallery</h2>
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
                    <h2 class="section-title"><img style="height: 30px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Club Shop</h2>
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
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick View</p>
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
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick View</p>
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
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick View</p>
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
                            <p class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick View</p>
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

    <div class="partners d-flex align-items-center position-relative">
        <div class="container">
            <div class="row">
                <ul id="partnerGallery">
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor3.png") }}" />
                    </li>
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor5.png") }}" />
                    </li>
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor3.png") }}" />
                    </li>
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor5.png") }}" />
                    </li>
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor3.png") }}" />
                    </li>
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor5.png") }}" />
                    </li>
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor3.png") }}" />
                    </li>
                    <li>
                        <img src="{{ asset("assets/site/images/home/sponsor5.png") }}" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="up position-absolute text-center d-flex align-items-center justify-content-center">
            <img style="height: 25px" src="{{ asset("assets/site/images/home/left-arrow.png") }}" alt="">
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="section-title little"><img style="height: 15px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">About Us</p>
                    <p class="text-white text-about">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor ducimus inventore laboriosam laudantium quae ratione repellat sunt! Ab architecto aut blanditiis eligendi incidunt laboriosam maiores, molestias obcaecati quaerat repudiandae, totam?</p>
                </div>
                <div class="col-md-3 d-none d-md-block d-lg-block d-lg-block">
                    <p class="section-title little"><img style="height: 15px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Useful Links</p>
                    <ul class="d-inline-block left-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>
                    <ul class="d-inline-block float-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>
                </div>
                <div class="col-md-5 pl-lg-5">
                    <p class="section-title little"><img style="height: 15px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Contact Us</p>
                    <div class="icon-section">
                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/phone-icon.svg") }}" alt="Phone Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">+374 96 123 456</p>
                        </div>

                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/email-icon.svg") }}" alt="Email Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">info@cilicia.com</p>
                        </div>

                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/map-icon.svg") }}" alt="Email Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">Vardanants 3, Yerevan, Armenia 001</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <hr style="border-bottom: 1px solid #9c1d24">
                </div>
            </div>
        </div>
    </div>

    @push('head')
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.carousel.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/site/carousel/dist/assets/owl.theme.default.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/site/lightslider/dist/css/lightslider.min.css") }}">
        <style>
            span.red {
                color: #9c1d24;
            }
            .owl-carousel {
                height: 90vh;
            }
            .slider-item {
                height: 90vh;
                width: 100%;
                background-repeat: no-repeat!important;
                background-size: cover!important;
            }
            .owl-dots button {
                width: 15px;
                height: 15px;
                border: 2px solid #141515!important;
                background: transparent!important;
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
            .slider-text{
                color: white;
                font-family: Roboto-Condensed-Regular, sans-serif, sans-serif;
                font-size: 15px;
                letter-spacing: 1px;
            }
            .owl-dots .owl-dot.active{
                background: white!important;
            }
            .owl-dots {
                position: relative;
                top: -50px;
                text-align: center;
            }
            .rounded-button {
                background: #9c1d24;
                border-radius: 5px;
                border: none;
                width: 100px;
                height: 35px;
                font-family: Roboto-Condensed-Bold, sans-serif;
                color: white;
                font-size: 13px;
                letter-spacing: 1px;
            }
            .shop-line{
                height: 70px;
                background: #151515;
            }
            .visit-btn:hover{
                text-decoration: none;
                color: white;
            }
            .visit-btn{
                border-radius: 8px;
                text-decoration: none;
                border: 2px solid #9c1d24 ;
                width: 140px;
                height: 40px;
                font-family: Roboto-Condensed-Bold, sans-serif;
                color: white;
                font-size: 15px;
                letter-spacing: 1px;
                padding: 7px;
            }
            .match-slider{
                height: 530px;
                background-repeat:no-repeat!important;
                background-size: cover!important;
            }
            .gallery-demo{
                width: 500px;
            }
            .table-section{
                padding: 50px 0;
                background: #ebebeb;
            }
            .sub-head {
                background: #6c6c6e!important;
            }
            .table-section th, .table-section td {
                border: none!important;
                text-align: center;
            }
            .sub-head td {
                color: white;
            }
            .table-striped tbody tr:nth-of-type(even) {
                background: white;
            }
            .group-section{
                padding: 50px 0;
                height: auto;
                background: url("{{ asset("assets/site/images/home/match_bg.jpeg") }}") no-repeat;
                -webkit-background-size: cover;
                background-size: cover;
            }
            .main-box {
                height: 310px;
                position: relative;
                overflow: hidden;
            }
            .name-box p{
                color: white;
                font-family: Roboto-Condensed-Bold, sans-serif;
                letter-spacing: 1px;
                font-weight: 700;
                text-transform: uppercase;
                position: absolute;
            }
            .name-box {
                width: 350px;
                transform: rotate(-90deg) translate(-130px,-155px);
                position: absolute;
                background: #9c1d24;
                height: 40px;
                z-index: 10;
            }
            .age-box p{
                color: white;
                font-family: Roboto-Condensed-Bold, sans-serif;
                letter-spacing: 1px;
                font-weight: 700;
                width: 100%;
            }
            .age-box{
                background: #25252573;
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 40px;
            }
            .img-box{
                flex: 0 0 50%;
            }
            .img-box a{
                display: inline-block;
                vertical-align: top;
                float: left;
                margin: 15px;
            }
            .img-box img{
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
            .gallery .main:hover  {
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
            .prod{
                height: 200px;
            }
            .category{
                color: #6c6c6e;
                font-size: 12px;
            }
            .price{
                color: #6c6c6e;
                font-size: 16px;
            }
            .partners{
                height: 120px;
                background: #151515;
            }
            .up{
                height: 50px;
                width: 50px;
                border: 2px solid white;
                bottom: 0;
                transform: translateY(50%) translateX(-50%) rotate(45deg);
                left: 50%;
                cursor: pointer;
                background: #141414;
                transition: .1s;
            }
            .up:hover{
                transform: translateY(50%) translateX(-50%) rotate(45deg) scale(1.1);
            }
            .up img{
                transform: rotate(45deg);
            }
            .footer{
                background: url("{{ asset("assets/site/images/home/footer_bg.jpg") }}");
                background-repeat: no-repeat;
                padding: 50px 0 0 25px;
            }
            .footer .section-title {
                font-size: 16px;
            }
            .text-about{
                font-size: 14px;
                font-family: Roboto-Condensed-Regular, sans-serif;
            }
            .footer li a{
                color: white;
                text-decoration: none!important;
                font-size: 14px;
                font-family: Roboto-Condensed-Regular, sans-serif;
            }
            .left-list{
                padding-left: 20px;
            }
            .section-title img {
                margin-right: 10px;
                margin-bottom: 3px;
            }
            .left-block{
                height: 30px;
                margin-bottom: 0;
                background: white;
                color: #9c1d24;
                padding: 10px;
            }
            .right-borders{
                border-radius: 8px 0 0 8px;
                width: 30px;
            }
            .left-borders{
                border-radius: 0 8px 8px 0;
            }
            @media all and (max-width: 460px) {
                .slider-title{
                    font-size: 30px;
                    margin-top: 80px;
                }
                .shop-text {
                    font-size: 12px;
                    margin-bottom: 10px!important;
                }
                .shop-text-cont{
                    justify-content: center;
                }
                .shop-btn-cont{
                    justify-content: center;
                }
                .shop-btn{
                    padding: 5px;
                    height: 30px;
                    width: 120px;
                    font-size: 12px;
                }
                .section-title{
                    font-size: 25px;
                }
                .main-box{
                    margin-bottom: 10px;
                    background-size: cover!important;
                }
                .left-borders{
                    font-size: 13px;
                }
            }

        </style>
    @endpush
    @push("footer")
        <script src="{{ asset("assets/site/carousel/dist/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("assets/site/lightslider/dist/js/lightslider.min.js") }}"></script>
        <script>
            $(document).ready(function(){
                $(".owl-carousel").owlCarousel({
                    items: 1,
                    margin: 1,
                    // autoHeight:true,
                    responsiveClass:true,
                });
                $('#partnerGallery').lightSlider({
                    item:4,
                    loop:false,
                    slideMove:1,
                    easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                    speed:600,
                    pager: false,
                    controls: false,
                    responsive : [
                        {
                            breakpoint:800,
                            settings: {
                                item:3,
                                slideMove:1,
                                slideMargin:6,
                            }
                        },
                        {
                            breakpoint:480,
                            settings: {
                                item:2,
                                slideMove:1
                            }
                        }
                    ]
                });
                $(".up").click(function(){
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                });
            });

        </script>
    @endpush
@endsection
