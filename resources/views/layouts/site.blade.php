<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cilicia</title>
    <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset("assets/site/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/site/style/style.v6.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/site/lightslider/dist/css/lightslider.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/site/swiper/package/css/swiper.min.css") }}">

    @stack('head')
</head>

<body>
<div class="page-wrapper">

    <nav class="navbar navbar-expand-lg navbar-dark dark-bg mobile-menu fixed-top">
        <a class="navbar-brand" href="/">
            <img class="img-fluid logo-mobile" src="{{ asset("assets/site/images/logo.png") }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/about-us">About Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/academy-members">Members</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/contact-us">Contact Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/gallery">Gallery</a>
                </li>
                <li class="nav-item active">
                    @if(Auth::guard('player')->check())
                        <a class="nav-link" href="/player">Account</a>
                    @else
                        <a class="nav-link" href="/sign-in">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>

    <div class="header fixed-header" id="header">
        <div class="firstline">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <nav class="navbar navbar-expand-lg navbar-dark dark-bg">
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="nav navbar-nav">
                                    <a class="nav-item nav-link d-flex align-items-center" href="/">
                                        <img style="height: 10px; display: none" class="img-fluid mr-1"
                                             src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Home
                                    </a>
                                    <a class="nav-item nav-link d-flex align-items-center" href="/gallery">
                                        <img style="height: 10px; display: none" class="img-fluid mr-1"
                                             src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Gallery
                                    </a>
                                    <a class="nav-item nav-link d-flex align-items-center" href="/about-us">
                                        <img style="height: 10px; display: none" class="img-fluid mr-1"
                                             src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">About
                                        Us
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-2">
                        <div class="logo-area">
                            <div class="logo-wrap">
                                <a href="/">
                                    <img class="img-fluid logo" src="{{ asset("assets/site/images/logo.png") }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <nav class="navbar navbar-expand-lg  navbar-dark dark-bg">
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                                <div class="nav navbar-nav">
                                    <a class="nav-item nav-link d-flex align-items-center" href="/academy-members">
                                        <img style="height: 10px; display: none" class="img-fluid mr-1"
                                             src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Academy
                                    </a>
                                    <a class="nav-item nav-link d-flex align-items-center" href="#">
                                        <img style="height: 10px; display: none" class="img-fluid mr-1"
                                             src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Our teams
                                    </a>
                                    <a class="nav-item nav-link d-flex align-items-center" href="/standings">
                                        <img style="height: 10px; display: none" class="img-fluid mr-1"
                                             src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Standings
                                    </a>
                                    @if(Auth::guard('player')->check())
                                        <a class="nav-item nav-link d-flex align-items-center" href="/player">
                                            <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                 src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Account
                                        </a>
                                    @else
                                        <a class="nav-item nav-link d-flex align-items-center" href="/sign-in">
                                            <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                 src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Login
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottomline">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6 submenu submenu-left">
                        <div class="left-menu justify-content-end pr-5 nav">
                            <a href="/contact-us"
                               class="mb-0 text-decoration-none text-white d-flex align-items-center">
                                <img style="height: 10px; display: none" class="img-fluid mr-1"
                                     src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Contact Us
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-0 main-submenu-wrapmiddle"></div>
                    <div class="col-md-5 col-sm-6 submenu submenu-right">
                        <div class="right-menu pl-5 nav">
                            <a href="/shop" class="mb-0 text-decoration-none text-white d-flex align-items-center">
                                <img style="height: 10px; display: none" class="img-fluid mr-1"
                                     src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        @yield("content")
        <div class="partners d-flex align-items-center position-relative">
            <div class="container">
                <div class="row">
                    <div class="swiper-container" id="partnerGallery">
                        <div class="swiper-wrapper">
                            @foreach(\App\Partner::all() as $key)
                                <div class="swiper-slide">
                                    <a href="{{ $key->url }}" target="_blank">
                                        <img src="{{ asset("uploads/partner/$key->image") }}"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="up position-absolute text-center d-flex align-items-center justify-content-center">
                <img style="height: 25px" src="{{ asset("assets/site/images/home/left-arrow.png") }}" alt="">
            </div>
        </div>
    </div>
    <div class="footer"
         style="background: url('{{ asset("assets/site/images/home/footer_bg.jpg") }}'); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="section-title little mb-4"><img style="height: 15px" class="img-fluid"
                                                              src="{{ asset("assets/site/images/ball-red.svg") }}"
                                                              alt="">About
                        Us</p>
                    <p class="text-white text-about">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor
                        ducimus inventore laboriosam laudantium quae ratione repellat sunt! Ab architecto aut blanditiis
                        eligendi incidunt laboriosam maiores, molestias obcaecati quaerat repudiandae, totam?</p>
                </div>
                <div class="col-md-3 d-none d-md-block d-lg-block d-lg-block mb-4">
                    <p class="section-title little"><img style="height: 15px" class="img-fluid"
                                                         src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Useful
                        Links</p>
                    <ul class="d-inline-block left-list footer-list list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about-us">About Us</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/contact-us">Contact Us</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>
                    <ul class="d-inline-block float-right footer-list list-unstyled">
                        <li><a href="#">Training schedule</a></li>
                        <li><a href="#">Our Teams</a></li>
                        <li><a href="#">Standings</a></li>
                        <li><a href="/academy-members">Academy members</a></li>
                        <li><a href="/shop">Shop</a></li>
                    </ul>
                </div>
                <div class="col-md-5 pl-lg-5 mb-4">
                    <p class="section-title little"><img style="height: 15px" class="img-fluid"
                                                         src="{{ asset("assets/site/images/ball-red.svg") }}" alt="">Contact
                        Us</p>
                    <div class="icon-section">
                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/phone-icon.svg") }}"
                                     alt="Phone Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">+374 96
                                123 456</p>
                        </div>

                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/email-icon.svg") }}"
                                     alt="Email Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">
                                info@cilicia.com</p>
                        </div>

                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/map-icon.svg") }}"
                                     alt="Email Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">
                                Vardanants 3, Yerevan, Armenia 001</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <hr style="border-bottom: 1px solid #9c1d24">
                </div>
                <div class="col-md-12 mt-3 text-center">
                    <h3>
                        <a href="http://aimtech.am" style="padding: 5px; text-decoration: none;">
                            <div class="facebook"></div>
                        </a>
                        <a href="http://aimtech.am" style='padding: 5px; text-decoration: none;'>
                            <div class="instagram"></div>
                        </a>
                    </h3>
                    <p style="color: white; font-size: 14px; margin-bottom: 2px;"> &copy; Copyright Cilicia team</p>
                    <p style="color: white; font-size: 14px;">All rights reserved. Designed and developed by
                        <a href="http://aimtech.am" target="_blank">
                            <img src="{{asset('assets/site/images/home/aimtech_logo.png')}}" alt="Aimtech Logo">
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{ asset("assets/site/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("assets/site/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/site/lightslider/dist/js/lightslider.min.js") }}"></script>
<script src="{{ asset("assets/site/swiper/package/js/swiper.min.js") }}"></script>
<script>
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("header");
    var sticky = header.offsetTop;
    let url = window.location.pathname;
    let number = url == "/" ? 50 : 0;

    let sum = sticky + number;

    function myFunction() {
        window.pageYOffset > sum ? header.classList.add("sticky") : header.classList.remove("sticky");
    }

    $(document).ready(function () {

        var url = window.location + "";
        var path = url.replace(window.location.protocol + "//" + window.location.host + "/", "");
        var element = $('.nav a').filter(function () {
            return this.href === url || this.href === path;// || url.href.indexOf(this.href) === 0;
        });
        element.parentsUntil(".nav").each(function (index) {
            if ($(this).is(".nav") && $(this).children("a").length !== 0) {
                $(this).children("a").addClass("active");
                $(this).parent(".nav").length === 0
                $(this).addClass("active")
            }
        });

        element.addClass("active");


        var isLoop = true;
        if ($('#partnerGallery').length < 4) {
            isLoop = false;
        }
        var partners = new Swiper('#partnerGallery', {
            loop: isLoop,
            slidesPerView: 4,
            spaceBetween: 10,
            pagination: false,
            breakpoints: {
                800: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 50,
                },
            }
        });

        // $('#partnerGallery').lightSlider({
        //     loop: true,
        //     speed: 600,
        //     pager: false,
        //     controls: false,
        //     responsive: [
        //         {
        //             breakpoint: 800,
        //             settings: {
        //                 slideMove: 1,
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 item: 2,
        //                 slideMove: 1
        //             }
        //         }
        //     ]
        // });

        $(".up").click(function () {
            $("html, body").animate({scrollTop: 0}, "slow");
        });
        $(document).on("click", ".gallery .main", function () {
            console.log("clicked")
            $(this).find(".quick-view").trigger("click")
        });
        $(document).on("click", ".quick-view", function (e) {
            e.stopPropagation();
        })
    });
</script>
@stack('footer')

</html>
