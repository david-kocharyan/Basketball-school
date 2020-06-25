@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Home
                            <span class="greater">&gt;</span> {{ strtoupper($title) }}
                            <span class="greater">&gt;</span> @if($gallery->type == 0) {{strtoupper('academy')}}  @else {{strtoupper('games')}} @endif
                            <span class="greater">&gt;</span> {{strtoupper($gallery->name)}}
                        </p>
                        <p class="subtitle">
                            We are Cilicia, a professional Basketball Club / Academy based in Armenia with the aim of providing the best platform for basketball to the youth and the young of all ages.
                            <br><br>
                            <i>“The strength of the team is each individual member. The strength of each member is the team.” – Phil Jackson</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5 pb-5">
        <div class="row pb-4">
            <div class="col-md-12">
{{--                <ul class="nav nav-tabs" style="border-bottom: 0">--}}
{{--                    <li><a class="active" data-toggle="tab" href="#gallery">{{$gallery->name}}</a></li>--}}
{{--                </ul>--}}
            </div>
        </div>
        <div class="tab-content">

            <div id="gallery">
                <div class="row">
                    @foreach($gallery->images as $key)
                        <div class="col-xl-4 col-md-6" style="padding: 5px">
                            <div class="main-box">
                                <a class="link2" href="{{ asset("uploads/gallery")."/".$key->name }}"
                                   data-lightbox="set1"><img class="example-image" src="{{ asset("uploads/gallery")."/".$key->name }}" alt=""/></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@push('head')
    <link rel="stylesheet" href="{{ asset("assets/site/lightbox/dist/css/lightbox.min.css") }}" type="text/css"
          media="screen"/>
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

        .main-box:hover .overlay-hover .triangle {
            right: -30px;
            bottom: -30px;
        }

        .main-box {
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

        .main-box:hover .overlay-hover {
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

        .rounded-button {
            width: auto;
            height: auto;
            border-radius: 8px;
        }

        .main-box:hover .overlay-hover p {
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            top: 50%;
            text-align: center;
        }

        .main-box:hover .overlay-hover button {
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

        .main-box img {
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
@endpush
@push("footer")
    <script src="{{ asset("assets/site/lightbox/dist/js/lightbox.min.js") }}"></script>
@endpush




