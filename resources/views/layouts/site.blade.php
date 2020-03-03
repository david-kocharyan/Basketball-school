<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset("assets/site/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/site/style/style.css") }}">
    @stack('head')
</head>

<body>
    <div class="page-wrapper">
        <div class="header fixed-header">
            <div class="firstline">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <nav class="navbar navbar-expand-lg navbar-dark dark-bg">
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                                        <a class="nav-item nav-link" href="#">Features</a>
                                        <a class="nav-item nav-link" href="#">Pricing</a>
                                        <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-2">
                            <div class="logo-area">
                                <div class="logo-wrap">
                                    <a href="">
                                        <img class="img-fluid logo" src="{{ asset("assets/site/images/logo.png") }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <nav class="navbar navbar-expand-lg  navbar-dark dark-bg">
                                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                                        <a class="nav-item nav-link" href="#">Features</a>
                                        <a class="nav-item nav-link" href="#">Pricing</a>
                                        <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            @yield("content")
        </div>
    </div>
</body>
<script src="{{ asset("assets/site/jquery/jquery.min.js") }}"></script>
@stack('footer')

</html>
