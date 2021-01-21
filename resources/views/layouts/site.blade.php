<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cilicia Basketball Club</title>
    <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset("assets/site/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/site/style/style.v6.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/site/lightslider/dist/css/lightslider.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/site/swiper/package/css/swiper.min.css") }}">
    <script data-ad-client="ca-pub-7570030724439240" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
                    <a class="nav-link" href="/gallery">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/about-us">About Us</a>
                </li>

                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="button"
                       aria-haspopup="true" aria-expanded="false">Academy</a>
                    <div class="dropdown-menu dropdown-menu-right" style="background: none;">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item p-3 text-right" href="/academy-members">Academy Members</a>
                        <a class="dropdown-item p-3 text-right" href="/schedules">Trainings & Coaches</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="button"
                       aria-haspopup="true" aria-expanded="false">Our Teams</a>
                    <div class="dropdown-menu dropdown-menu-right" style="background: none;">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item p-3 text-right" href="/rosters">Rosters</a>
                        <a class="dropdown-item p-3 text-right" href="/all-games">Games</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/standings">Standings</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);">Shop</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/contact-us">Contact Us</a>
                </li>

                @if(Auth::guard('player')->check())
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"
                           role="button"
                           aria-haspopup="true" aria-expanded="false">Account</a>
                        <div class="dropdown-menu dropdown-menu-right" style="background: none;">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item p-3 text-right" href="/player">Profile</a>
                            <a class="dropdown-item p-3 text-right" href="javascript:void(0);"
                               onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">Logout</a>
                            <form id="logout-form-mobile" action="/player/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/sign-in">Login</a>
                    </li>
                @endif
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

                                    <div class="nav-item dropdown">
                                        <a class="nav-item nav-link dropdown-toggle d-flex align-items-center"
                                           data-toggle="dropdown" href="#">
                                            <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                 src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Academy
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item d-flex align-items-center" href="/academy-members">
                                                <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                     src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Academy
                                                Members</a>
                                            <hr class="drop-hr">
                                            <a class="dropdown-item d-flex align-items-center" href="/schedules">
                                                <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                     src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Trainings
                                                & Coaches</a>
                                        </div>
                                    </div>

                                    <div class="nav-item dropdown">
                                        <a class="nav-item nav-link dropdown-toggle d-flex align-items-center"
                                           data-toggle="dropdown" href="#">
                                            <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                 src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Our teams
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item d-flex align-items-center" href="/rosters">
                                                <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                     src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Rosters</a>
                                            <hr class="drop-hr">
                                            <a class="dropdown-item d-flex align-items-center" href="/all-games">
                                                <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                     src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Games</a>
                                        </div>
                                    </div>

                                    <a class="nav-item nav-link d-flex align-items-center" href="/standings">
                                        <img style="height: 10px; display: none" class="img-fluid mr-1"
                                             src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Standings
                                    </a>
                                    @if(Auth::guard('player')->check())
                                        <div class="nav-item dropdown">
                                            <a class="nav-item nav-link dropdown-toggle d-flex align-items-center"
                                               data-toggle="dropdown" href="#">
                                                <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                     src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Account
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="/player">
                                                    <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                         src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Profile</a>
                                                <hr class="drop-hr">
                                                <a class="dropdown-item d-flex align-items-center"
                                                   href="javascript:void(0);"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <img style="height: 10px; display: none" class="img-fluid mr-1"
                                                         src="{{ asset("assets/site/images/ball-white.svg") }}" alt="">Logout</a>
                                                <form id="logout-form" action="/player/logout" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
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
                            <a href="javascript:void(0);" class="mb-0 text-decoration-none text-white d-flex align-items-center">
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
                    <div class="swiper-container col-md-12" id="partnerGallery">
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
                                                              alt="">About Us</p>
                    <p class="text-white text-about">Our mission is to raise an academy and be part of the growing basketball culture in Armenia as we develop, form and expose the young and the youth to the importance of hard work, discipline and instilling passion and the love for basketball within our community.</p>
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
                        <li><a href="/schedules">Trainings schedule</a></li>
                        <li><a href="/rosters">Rosters</a></li>
                        <li><a href="/standings">Standings</a></li>
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
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">+374 55 18 04 18</p>
                        </div>

                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/email-icon.svg") }}"
                                     alt="Email Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">
                                info@ciliciabasketballclub.com</p>
                        </div>

                        <div class="block d-flex mb-3">
                            <p class="mr-1 left-block d-flex align-items-center justify-content-center right-borders">
                                <img style="height: 15px" src="{{ asset("assets/site/images/home/map-icon.svg") }}"
                                     alt="Email Icon">
                            </p>
                            <p class="left-block d-flex align-items-center justify-content-center left-borders">
                                1/5 Alek Manukyan St, Yerevan 0025, Armenia</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <hr style="border-bottom: 1px solid #9c1d24">
                </div>
                <div class="col-md-12 mt-3 text-center">
                    <h3>
                        <a href="https://www.facebook.com/CiliciaBasketballClub/" style="padding: 5px; text-decoration: none;">
                            <div class="facebook"></div>
                        </a>
                        <a href="https://www.instagram.com/ciliciabasketballclub/?hl=en" style='padding: 5px; text-decoration: none;'>
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
            }
        });
        element.addClass("active");
        var drop_elem = $(".dropdown-menu").children(".active")
        var x = drop_elem.parents(".dropdown").children('.dropdown-toggle').addClass('active')


        var isLoop = true;
        if ($('#partnerGallery').length < 4) {
            isLoop = false;
        }
        var partners = new Swiper('#partnerGallery', {
            loop: isLoop,
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: false,
            breakpoints: {
                800: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
            }
        });

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


        $('.dropdown').hover(function () {
            $(this).addClass("show")
            $(this).find('.dropdown-menu').addClass("show")
        })
        $('.dropdown').mouseleave(function () {
            $(this).removeClass("show")
            $(this).find('.dropdown-menu').removeClass("show")
        })

    });
</script>
@stack('footer')

</html>
