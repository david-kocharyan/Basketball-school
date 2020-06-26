@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid"
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Our Teams <span
                                class="greater">&gt;</span> {{ strtoupper($title) }}</p>
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
                <ul class="nav nav-tabs d-none d-md-flex form-tabs" style="border-bottom: 0">
                    @foreach($league as $bin=>$key)
                        <li style="border-right: 1px solid #9c1d24;">
                            <a class="text-uppercase @if($bin == 0) active @endif" data-toggle="tab"
                               href="{{"#menu_".$key->id}}">{{$key->group}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <select class="d-block d-md-none" id="tab_selector">
                    @foreach($league as $bin=>$key)
                        <option value="{{$bin}}" class="text-uppercase">{{$key->group}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="tab-content">
            @foreach($league as $bin => $key)
                <div id="{{'menu_'.$key->id}}" class="tab-pane fade in @if($bin == 0) active show @endif">
                    <div class="row">
                        @foreach($key->leaguePlayers as $val)
                            <div class="col-xl-3 col-md-6" style="padding: 5px">
                                <div class="main-box"
                                     style="background-image: url('{{ asset("uploads/player/$val->image") }}');transition: all 1s;">
                                    <div class="name-box d-flex align-items-center">
                                        <p class="pl-5 m-0">{{ "#".$val->jersey_number  }} <span
                                                class="mr-3">{{" ". $val->full_name}}</span></p>
                                    </div>
{{--                                    <div class="age-box d-flex align-items-center">--}}
{{--                                        <p class="text-center m-0">{{$key->group}}</p>--}}
{{--                                    </div>--}}
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

            #tab_selector {
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

            #tab_selector option:checked {
                background: #9c1d24;
            }
        </style>
    @endpush
    @push("footer")
        <script !src="">
            $(document).ready(function () {
                $('#tab_selector').on('change', function (e) {
                    $('.form-tabs li a').eq($(this).val()).tab('show');
                });
            })
        </script>
    @endpush
@endsection
