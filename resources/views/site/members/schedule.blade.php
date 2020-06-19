@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title" style="font-size: 30px !important;"><img style="height: 30px" class="img-fluid"
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Academy <span
                                class="greater">&gt;</span> {{ strtoupper($title) }}</p>
                        <p class="subtitle">
                            We are Cilicia, a professional Basketball Club / Academy based in Armenia with the aim of providing the best platform for basketball to the youth and the young of all ages.
                            <br>
                            <i>“The strength of the team is each individual member. The strength of each member is the team.” – Phil Jackson</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-md-12">
                <p class="title text-center pb-3"><img style="height: 20px" class="img-fluid"
                                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Training schedules</p>
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
                        <div class="col-md-6 p-2 coache" data-attr="{{$key}}" data-toggle="modal"
                             data-target="#myModal">
                            <div class="main-box"
                                 style="background-image: url('{{ asset("uploads/coaches/$key->image") }}')">
                                <div class="red-overlay">
                                    <div class="col-md-12 pt-3 pb-3">
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

    <div class="modal fade" id="myModal" aria-labelledby="myModal" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="close_btn">&times;</span>
                </button>
                <div class="modal-body gallery-top pb-4 pt-1"></div>
            </div>
        </div>
    </div>

    @push("head")
        <style>
            .header {
                padding-top: 0;
            }

            .modal-open .header {
                padding-right: 0 !important;
            }

            .modal-open .sticky {
                padding-right: 17px !important;
            }

            .modal {
                z-index: 9999;
                height: auto;
                max-height: 500px;
            }

            .modal-content {
                -webkit-border-radius: 0px !important;
                -moz-border-radius: 0px !important;
                border-radius: 0px !important;
                border: none;
            }

            .modal .coach-img {
                float: left;
                display: inline-block;
            }

            .modal .name {
                font-weight: 600;
                font-size: 30px;
                color: #9c1d24;
            }

            .modal .bio {
                font-size: 15px;
            }

            .modal .close_btn{
                float: right;
                width: 50px;
                font-size: 30px;
            }

            .modal .close_btn:hover{
                color: #9c1d24;
            }
            .modal .close_btn:focus, .close:focus{
                outline: none;
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

            .table th {
                max-height: 55px;
                height: 55px;
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
                height: 180px;
                overflow-y: hidden;
                text-overflow: ellipsis;
                -o-text-overflow: ellipsis;
                -webkit-line-clamp: 3;
            }

            .read-btn {
                border: none;
                background: none;
                color: #ffffff;
                font-size: 14px;
            }

            .read-btn:focus {
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

                $('.coache').click(function () {
                    let data = $(this).data('attr');

                    let elem = $(".modal-body");
                    let url = "{{ asset("uploads/coaches/")}}";
                    elem.empty();

                    elem.append(`
                                <img src='${url}/${data.image}' alt="${data.full_name}" class="coach-img pl-3 pt-3 pr-3">
                                <p class="name pt-2 pl-3 m-0">${data.full_name}</p>
                                <p class="bio pl-3 pr-3 m-0" style="white-space: pre-line">${data.bio}</p>
                    `)
                })
            })
        </script>
    @endpush
@endsection
