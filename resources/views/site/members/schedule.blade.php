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
            <div class="col-md-12 d-flex justify-content-around flex-wrap">
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
                                    <td class="font-weight-bold">{{$val->day}}</td>
                                    <td class="text-right">{{$val->time}}</td>
                                </tr>
                            @endforeach
                            <tr class="price">
                                <td colspan="2" class="text-center font-weight-bold">
                                    @if($key->price != null)
                                        {{$key->price}} AMD/Month
                                    @endif
                                </td>
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

            <div class="container pb-5">
                <div class="row">
                    @foreach($coaches as $key)
                        <div class="col-md-6 p-2">
                            <div class="main-box"
                                 style="background-image: url('{{ asset("uploads/coaches/$key->image") }}')">
                                <div class="red-overlay">
                                    <div class="col-md-12 pt-4">
                                        <h6 class="member-name text-white text-uppercase mt-2 mb-3">{{$key->full_name}}</h6>
                                        <p class="member-text">{{$key->bio}}</p>
                                        <button class="read-btn">Read more &#8250;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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

            .table td, .table th {
                vertical-align: middle;
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
                top: 53px;
                left: calc(50% - 20px);
            }

            /*-----------------------------------------------------------*/

            .title {
                font-size: 40px;
            }

            .icon-cont img {
                height: 30px;
            }

            .main-box {
                background-repeat: no-repeat;
                width: 100%;
                height: 300px;
                background-size: contain;
                position: relative;
                cursor: context-menu;
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
                border-top: 155px solid transparent;
                border-bottom: 155px solid transparent;
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
                height:180px;
                overflow-y: hidden;
                text-overflow: ellipsis;
                -o-text-overflow: ellipsis;
                -webkit-line-clamp: 3;
            }

            .read-btn{
                border: none;
                background: none;
                color: #ffffff;
                font-size: 14px;
            }
            .read-btn:focus{
                outline: none;
            }
        </style>
    @endpush
    @push('footer')
        <script>
            $(document).ready(function () {
                var maxHeight = 0;
                $('.table', this).each(function () {
                    var thisH = $(this).height();
                    if (thisH > maxHeight) {
                        maxHeight = thisH;
                    }
                });
                $('.table').height(maxHeight);
            })
        </script>
    @endpush
@endsection
