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
        <div class="row">
            <div class="col-md-12">
                <p class="title text-center pb-3"><img style="height: 20px" class="img-fluid"
                                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">The
                    perfect plan for you
                </p>
                <p class="text-center"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores nobis quibusdam soluta. Accusantium, adipisci aperiam at consequuntur distinctio dolorem eius enim id, in ipsa nobis, quas tenetur unde veniam voluptate!</span>
                </p>
            </div>
            <div class="col-md-12 d-flex justify-content-between flex-wrap">
                @foreach($schedule as $key)
                    <div class="d-md-block col-md-3">
                        <table class="table">
                            <tr>
                                <th class="text-center text-white bg-red"
                                    colspan="2">{{$key->team->name}}
                                </th>
                            </tr>
                            @foreach($key->date as $val)
                                <tr class="pt-1">
                                    <td class="font-weight-bold">{{$val->day_from."-".$val->day_to}}</td>
                                    <td class="text-right">{{$val->time_from."-".$val->time_to}}</td>
                                </tr>
                            @endforeach
                            <tr class="price">
                                <td colspan="2" class="text-center font-weight-bold">{{$key->price}} AMD/Month</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background: #e2e2e2">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <p class="title text-center"><img style="height: 20px" class="img-fluid"
                                                  src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Coaches
                </p>
            </div>

            @foreach($coaches as $key)
            <div class="col-xl-4 d-flex align-items-center img-cont middle p-0">

                <div class="main-box"
                     style="background-image: url('{{ asset("uploads/coaches/$key->image") }}')">
                    <div class="red-overlay">
                        <div class="col-md-12 pt-4">
                            <h6 class="member-name text-white text-uppercase mt-2 mb-3">{{$key->full_name}}</h6>
                            <p class="member-text">{{$key->bio}}</p>
                        </div>
                    </div>
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

            .table {
                border: 1px solid #9c1d24;
                border-radius: 10px;
                border-spacing: 0;
                border-collapse: collapse;
                background: #ebebeb;
                overflow: hidden;
            }

            .price {
                color: #9d1e24;
            }

            .bg-red {
                font-size: 20px;
            }

            .bg-red:after {
                content: "";
                width: 0;
                height: 0;
                border-left: 23px solid transparent;
                border-right: 23px solid transparent;
                border-top: 12px solid #9c1d24;
                position: absolute;
                top: 55px;
                left: calc(50% - 20px);
            }
/*-----------------------------------------------------------*/

            .title{
                font-size: 40px;
            }

            .icon-cont img {
                height: 30px;
            }

            .main-box {
                background-repeat: no-repeat;
                width: 100%;
                height: 200px;
                background-size: contain;
                position: relative;
            }

            .red-overlay {
                position: absolute;
                width: 50%;
                right: 0;
                height: 100%;
                background-color: #9c1d24;
            }

            .red-overlay:before {
                content: "";
                width: 0;
                height: 0;
                border-top: 100px solid transparent;
                border-bottom: 100px solid transparent;
                position: absolute;
                bottom: 0;
                transform: translateX(-98%);
                border-right: 25px solid #9c1d24;
            }

            .member-name {
                font-family: Agency, sans-serif;
                font-size: 18px;
                letter-spacing: 2px;
                font-weight: 600;
            }

            .member-text {
                color: #c3c2c6;
                letter-spacing: 1px;
                font-size: 15px;
            }
        </style>
    @endpush
@endsection
