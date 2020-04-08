@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid"
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Home <span
                                class="greater">&gt;</span> {{ strtoupper($title) }}</p>
                        <p class="subtitle">We are competitive professional basketball club - with our players
                            competiting at all levels from local team galas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-5">
        <div class="row pb-4">
            <div class="col-md-12">
                <ul class="nav nav-tabs" style="border-bottom: 0">
                    @foreach($teams as $bin=>$key)
                        <li><a @if($bin == 0)class="active" @endif data-toggle="tab"
                               href="{{"#menu_".$key->id}}">{{$key->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tab-content">
            @foreach($teams as $bin => $key)
                <div id="{{'menu_'.$key->id}}" class="tab-pane fade in @if($bin == 0) active show @endif">
                    <div class="row">
                        @foreach($key->players as $val)
                            <div class="col-xl-3 col-md-6" style="padding: 5px">
                                <div class="main-box" style="background-image: url('{{ asset("uploads/player/$val->image") }}');">
                                    <div class="name-box d-flex align-items-center">
                                        <p class="pl-5 m-0">{{ "#".$val->jersey_number  }} <span class="mr-3">{{" ". $val->full_name}}</span></p>
                                    </div>
                                    <div class="age-box d-flex align-items-center">
                                        <p class="text-center m-0">{{$key->name}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push("head")
        <style>
            .header {
                padding-top: 0;
            }

            .nav-tabs {
                background: #151515;
                border-radius: 10px;
                overflow: hidden;
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
@endsection
