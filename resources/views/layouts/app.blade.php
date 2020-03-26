<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon"/>
    <title>{{$title}}</title>

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- This is a colors CSS -->
    <link href="{{asset('assets/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <!--This is a datatable style -->
    <link href="{{asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>

    @stack('datepicker')
    @stack('dropify')
    @stack('magnific')
    @stack('custom-style')

</head>

<body class="fix-sidebar">

<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <a class="logo" href="/admin">
{{--                    add image for logo --}}
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-left">
                <li>
                    <a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i
                            class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <b class="hidden-xs">{{Auth::guard('admin')->user()->name}}</b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                        <li>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>Logout
                            </a>
                        </li>
                        <form id="logout-form" action="/admin/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3>
                    <span class="fa-fw open-close">
                        <i class="fas fa-align-justify hidden-xs"></i>
                        <i class="fas fa-times visible-xs"></i>
                    </span>
                    <span class="hide-menu">Navigation</span>
                </h3>
            </div>

            <ul class="nav" id="side-menu">

                <li><a href="/admin" class="waves-effect"><i class="mdi mdi-home fa-fw"></i>
                        <span class="hide-menu">Home</span></a>
                </li>

                <li class="devider"></li>

                <li><a href="/admin/players" class="waves-effect"><i class="mdi mdi-account fa-fw"></i>
                        <span class="hide-menu">Players</span></a>
                </li>

                <li><a href="/admin/coaches" class="waves-effect"><i class="mdi mdi-android-studio fa-fw"></i>
                        <span class="hide-menu">Coaches</span></a>
                </li>

                <li><a href="/admin/center" class="waves-effect"><i class="mdi mdi-stadium fa-fw"></i>
                        <span class="hide-menu">Centers</span></a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-barley fa-fw"></i> <span
                            class="hide-menu">Teams<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/teams" class="waves-effect"><i class="mdi mdi-steam fa-fw"></i>
                                <span class="hide-menu">Teams (Academic)</span></a>
                        </li>

                        <li><a href="/admin/league" class="waves-effect"><i class="mdi mdi-windows fa-fw"></i>
                                <span class="hide-menu">Teams (League)</span></a>
                        </li>
                    </ul>
                </li>

{{--market--}}
                <li class="devider"></li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-shopping fa-fw"></i> <span
                            class="hide-menu">Shop<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/categories" class="waves-effect"><i class="mdi mdi-playlist-plus fa-fw"></i>
                                <span class="hide-menu">Categories</span></a>
                        </li>

                        <li><a href="/admin/products" class="waves-effect"><i class="mdi mdi-scale fa-fw"></i>
                                <span class="hide-menu">Products</span></a>
                        </li>
                    </ul>
                </li>

{{--gallery--}}
                <li class="devider"></li>
                <li><a href="/admin/gallery" class="waves-effect"><i class="mdi mdi-google-photos fa-fw"></i>
                        <span class="hide-menu">Gallery</span></a>
                </li>

                <li class="devider"></li>
                <li><a href="/admin/month-players" class="waves-effect"><i class="mdi mdi-diamond fa-fw"></i>
                        <span class="hide-menu">Players of the month</span></a>
                </li>

            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">{{$title}}</h4>
                </div>
            </div>

            <!-- .row -->
            <main class="py-4">
                @yield('content')
            </main>
            <!-- .row -->

        </div>
        <footer class="footer text-center"> 2020 &copy; Created By Aimtech LLC </footer>
    </div>
</div>

</body>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('assets/css/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="{{asset('assets/js/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('assets/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript min -->
<script src="{{asset('assets/js/custom.min.js')}}"></script>
<!--Datatable js-->
<script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
<!--Datatable script for all page-->
@stack('custom-datatable')

{{--jquery multiselect--}}
@stack('jquery-multiselect')
{{--datepiker--}}
@stack('datepicker-script')
{{--dropify--}}
@stack('dropify-script')
{{--magnific--}}
@stack('magnific-script')


{{--custom script--}}
@stack('custom-script')

</html>
