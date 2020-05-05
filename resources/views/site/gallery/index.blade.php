@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Home <span class="greater">&gt;</span> {{ strtoupper($title) }}</p>
                        <p class="subtitle">We are competitive professional basketball club - with our players
                            competiting at all levels from local team galas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5 pb-5">
        <div class="row pb-5">
            <div class="col-md-12">
                <ul class="nav nav-tabs d-none d-md-flex form-tabs" style="border-bottom: 0">
                    <li><a class="text-uppercase active" data-toggle="tab" href="#all">Filter All</a></li>
                    <li style="border-right: 1px solid #9c1d24; border-left: 1px solid #9c1d24;"><a class="text-uppercase" data-toggle="tab" href="#academy">Academy</a></li>
                    <li><a class="text-uppercase" data-toggle="tab" href="#games">Games</a></li>
                </ul>
                <select class="d-block d-md-none" id="tab_selector">
                    <option value="0" class="text-uppercase">Filter All</option>
                    <option value="1" class="text-uppercase">Academy</option>
                    <option value="2" class="text-uppercase">Games</option>
                </select>
            </div>
        </div>
        <div class="tab-content">
            <div id="all" class="tab-pane fade in active show">
                <div class="row">
                    @foreach($all as $bin => $key)
                        <div class="col-xl-4 col-md-6 mt-4" style="padding: 5px">
                            <div class="main-box gallery-open-link" data-id="{{ $key->id }}">
                                <img class="example-image img-responsive"
                                     src="{{ asset("uploads/gallery")."/".$key->images[0]->name }}" alt=""/>
                                <div class="overlay-hover">
                                    <div class="detail">
                                        <p class="text-capitalize text-white m-0">{{$key->name}}</p>
                                        <button class="rounded-button">{{count($key->images)}} photos</button>
                                    </div>
                                    <div class="triangle">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="academy" class="tab-pane fade in">
                <div class="row">
                    @foreach($academy as $bin => $key)
                        <div class="col-xl-4 col-md-6 mt-4" style="padding: 5px">
                            <div class="main-box gallery-open-link" data-id="{{ $key->id }}">
                                <img class="example-image"
                                     src="{{ asset("uploads/gallery")."/".$key->images[0]->name }}" alt=""/>
                                <div class="overlay-hover">
                                    <div class="detail">
                                        <p class="text-capitalize text-white m-0">{{$key->name}}</p>
                                        <button class="rounded-button">{{count($key->images)}} photos</button>
                                    </div>
                                    <div class="triangle">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="games" class="tab-pane fade in ">
                <div class="row">
                    @foreach($games as $bin => $key)
                        <div class="col-xl-4 col-md-6 mt-4" style="padding: 5px">
                            <div class="main-box gallery-open-link" data-id="{{ $key->id }}">
                                <img class="example-image"
                                     src="{{ asset("uploads/gallery")."/".$key->images[0]->name }}" alt=""/>
                                <div class="overlay-hover">
                                    <div class="detail">
                                        <p class="text-capitalize text-white m-0">{{$key->name}}</p>
                                        <button class="rounded-button">{{count($key->images)}} photos</button>
                                    </div>
                                    <div class="triangle">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @push('head')
        <link rel="stylesheet" href="{{ asset("assets/plugins/dbLightbox/dist/simpleLightbox.min.css") }}">
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
                padding: 10px 0;
                width: 100%;
                background-color: #0000009e;
                bottom: 0;
                z-index: 10;
                transition: .5s;
            }

            .main-box:hover .overlay-hover {
                height: 100%;
                cursor: pointer;
            }

            .overlay-hover p {
                position: absolute;
                left: 20px;
                transition: auto;
            }

            .overlay-hover button {
                position: absolute;
                margin-top: 50px;
                left: 20px;
                top: 20px;
                transition: .5s;
            }

            .rounded-button {
                border-radius: 8px;
                padding: 0 20px;
            }

            .main-box:hover .overlay-hover p {
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                top: 50%;
                text-align: center;
                padding-bottom: 50px;
                width: 100%;
            }

            .main-box:hover .overlay-hover button {
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                top: 50%;
                text-align: center;
            }

            .overlay-hover:hover {
                cursor: pointer;
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
                padding: 15px;
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

            .gallery-open-link{
                height: 250px;
            }
            .gallery-open-link img{
                object-fit: cover;
            }

            .slbArrow:focus, .slbCloseBtn:focus{
                outline: none;
            }

            #tab_selector{
                background: #151515;
                color: #ffffff;
                border: none;
                width: 100%;
                padding: 15px;
                border-radius: 10px;
                outline: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='28' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
                background-repeat: no-repeat;
                background-position-x: 97%;
                background-position-y: 15px;
            }
            #tab_selector option {
                background: #151515;
                padding: 15px;
            }
            #tab_selector option:checked{
                background: #9c1d24;
            }
        </style>
    @endpush
    @push("footer")
        <script src="{{ asset("assets/plugins/dbLightbox/dist/simpleLightbox.js") }}"></script>

        <script !src="">
            $(document).ready(function () {

                $('.gallery-open-link').click(function () {
                    let id = $(this).data('id');
                    $.ajax({
                        url: '/gallery-ajax',
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
                })

                $('#tab_selector').on('change', function (e) {
                    $('.form-tabs li a').eq($(this).val()).tab('show');
                });
            })
        </script>


    @endpush
@endsection
