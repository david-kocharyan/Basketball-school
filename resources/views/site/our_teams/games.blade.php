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
        <div class="row">
            <div class="col-md-12">
                <p class="title text-center pb-3"><img style="height: 20px" class="img-fluid"
                                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">All
                    Games
                </p>
            </div>

            <div class="col-md-12 d-flex justify-content-start flex-wrap">
                @foreach($games as $key=>$val)
                    <div class="games col-md-3 d-inline-block p-2" data-attr="{{json_encode($val)}}" data-toggle="modal"
                         data-target="#myModal">
                        <div class="first-row d-flex flex-column align-items-center">
                            <div class="date-cont">
                                <span
                                    class="date text-uppercase">{{Carbon\Carbon::parse($val->date)->format(' F d, Y')}}</span>
                            </div>
                            <div class="score-cont d-flex justify-content-around pt-2">
                                <span class="score-team text-uppercase"><b>{{$val->club[0]->short_name}}</b></span>
                                <span class="red text-uppercase time-final">
                                    <b>
                                        @if($val->status == 1)
                                            {{$val->game_club[0]->score." - ".$val->game_club[1]->score}}
                                        @else
                                            {{Carbon\Carbon::parse($val->time)->format('H:i')}}
                                        @endif
                                    </b>
                                </span>
                                <span class="score-team text-uppercase"><b>{{$val->club[1]->short_name}}</b></span>
                            </div>
                        </div>
                        <div
                            class="second-row @if($val->status == 1) gray-bg @else red-bg @endif d-flex align-items-end justify-content-center">
                            <span class="finals text-uppercase"><b>{{$val->tournament ?? "Friendly"}}</b></span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-12 d-flex justify-content-center p-2">
                {{ $games->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" aria-labelledby="myModal" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body gallery-top">

                </div>
            </div>
        </div>
    </div>


    @push("head")
        <style>
            .header {
                padding-top: 0;
            }

            .content {
                background-color: #ebebeb;
            }

            .games {
                cursor: pointer;
            }

            .games .first-row {
                background-color: white;
                position: relative;
            }

            .games .score-cont {
                width: 100%;
                font-size: 12px;
            }

            .games .score-cont, .games .score-cont .score-team {
                color: black;
                font-size: 12px;

            }

            .games .first-row:after {
                content: "";
                width: 0;
                height: 0;
                border-left: 23px solid transparent;
                border-right: 23px solid transparent;
                border-top: 12px solid #fff;
                position: absolute;
                bottom: 1px;
                transform: translateY(100%);
            }

            .games .first-row, .games .second-row {
                padding: 5px;
                height: 65px;
            }

            .games .finals {
                font-family: Agency, sans-serif;
                color: white;
                font-size: 16px;
                letter-spacing: 2px;
            }

            .gray-bg {
                background-color: #6c6c6e;
            }

            .red-bg {
                background-color: #9c1d24;
            }

            .page-link {
                position: relative;
                display: block;
                padding: .5rem .75rem;
                margin-left: 5px;
                line-height: 1.25;
                color: #9c1d24;
                background-color: #dddddd;
                border: 1px solid #dddddd;
            }

            .page-item.disabled .page-link {
                position: relative;
                display: block;
                padding: .5rem .75rem;
                margin-left: 5px;
                line-height: 1.25;
                color: #9c1d24;
                background-color: #dddddd;
                border: 1px solid #dddddd;
            }

            .page-item.active .page-link {
                z-index: 1;
                color: #fff;
                background-color: #9c1d24;
                border-color: #9c1d24;
            }

            .page-link:hover {
                z-index: 2;
                color: #fff;
                text-decoration: none;
                background-color: #9c1d24;
                border-color: #9c1d24;
            }
        </style>
        <style>
            .modal-open .header {
                padding-right: 0 !important;
            }

            .modal-open .sticky {
                padding-right: 17px !important;
            }

            .modal {
                z-index: 9999;
            }

            .modal-content {
                -webkit-border-radius: 0px !important;
                -moz-border-radius: 0px !important;
                border-radius: 0px !important;
                border: none;
            }

            .modal-header {
                background-color: #9c1d24;
                border: none;
                border-radius: 0px;
            }

            .modal-header button {
                color: white;
            }

            .gallery-top {
                background-image: url("{{ asset("assets/site/images/home/match_img.jpg") }}");
                background-repeat: no-repeat;
                height: auto;
                width: 100%;
                background-size: cover;
                min-height: 480px;
            }

            .left-cont, .right-cont {
                width: 230px;
            }

            .mid {
                width: 300px;
            }

            .time-cont {
                width: unset !important;
            }

            .date-cont span {
                font-weight: bolder;
                font-size: 20px;
            }


            .gallery-top .team-cont span {
                font-family: Agency, sans-serif;
                color: white;
                font-size: 30px;
                letter-spacing: 1px;
            }

            .gallery-top .team-cont.date-cont span {
                font-family: Arial, sans-serif;
                font-size: 35px;
            }

            .gallery-top .time {
                padding: 10px 15px;
                background-color: #9c1d24;
                color: white;
                font-size: 20px;
            }

            .gallery-top .finish_date {
                padding: 10px 15px;
                color: white;
            }

            .gallery-top .first-row {
                width: 100%;
            }

            .gallery-top .finals, .gallery-top .stadium {
                font-size: 20px;
                letter-spacing: 1px;
            }

            .logo-cont img {
                height: 180px;
                object-fit: contain;
            }

            .logo-cont {
                padding: 0 30px;
            }

            .finish_date {
                color: white;
                font-size: 14px;
            }
        </style>
    @endpush
    @push("footer")
        <script !src="">
            $(document).ready(function () {
                $('.games').click(function () {
                    let data = $(this).data('attr');

                    let date = new Date(data.date);
                    let curr_date = date.getDate();
                    let curr_month = date.getMonth() + 1;
                    let month_word = date.toLocaleString('default', {month: 'long'});
                    let curr_year = date.getFullYear();

                    let day_month = month_word + " " + curr_date + ", " + curr_year;
                    let day = curr_date + "/" + curr_month + "/" + curr_year;

                    let time = data.time.split(":")
                        time = time[0]+":"+time[1];



                    let pts = data.pts != null ? data.pts : 0;
                    let rb = data.rb != null ? data.rb : 0;
                    let ast = data.ast != null ? data.ast : 0;
                    let stl = data.stl != null ? data.stl : 0;
                    let blk = data.blk != null ? data.blk : 0;

                    let elem = $(".modal-body");
                    let url = "{{ asset("uploads/clubs/")}}";
                    elem.empty();

                    if (data.status == 1) {
                        elem.append(`
                                    <div class="finished-games d-flex flex-column justify-content-center">
                                        <div class="first-row d-flex flex-wrap justify-content-around align-items-center pt-5">

                                             <div class="left-cont text-center">
                                                <div class="logo-cont">
                                                    <img src='${url}/${data.club[0].image}' class="img-fluid"
                                                         alt="">
                                                </div>
                                                <div class="team-cont left text-center">
                                                    <span class="team">${data.club[0].name}</span>
                                                </div>
                                             </div>


                                             <div class="mid text-center d-flex justify-content-around pt-3 pb-3">
                                                <div class="date-cont game-score left text-right">
                                                    <span class="team">${data.game_club[0].score}</span>
                                                </div>
                                                <div class="time-cont text-center pt-3">
                                                    <p style="color: #9c1d24; font-size: 20px">Final</p>
                                                    <span class="time">${data.type}</span>
                                                    <p class="finish_date mt-3">${day}</p>
                                                </div>
                                                <div class="date-cont game-score right text-left">
                                                    <span class="team">${data.game_club[1].score}</span>
                                                </div>
                                             </div>

                                             <div class="right-cont text-center">
                                                 <div class="logo-cont">
                                                     <img src='${url}/${data.club[1].image}' class="img-fluid">
                                                     </div>
                                                     <div class="team-cont right text-center">
                                                         <span>${data.club[1].name}</span>
                                                 </div>
                                             </div>

                                        </div>
                                        <div class="second-row d-flex flex-column align-items-center ">
                                            <hr style="border-bottom: 1px solid #9c1d24; width: 30%;">
                                            <span  class="finals mb-3 text-white text-uppercase">Top Performance: ${data.best_player}</span>
                                            <div>
                                                <span class="finals text-white text-uppercase">
                                                    <b>PTS - ${pts}</b>
                                                </span>
                                                    <span class="finals text-white text-uppercase pl-2" style="border-left: 1px solid #9c1d24;"">
                                                    <b>RB - ${rb}</b>
                                                </span>
                                                <span class="finals text-white text-uppercase pl-2" style="border-left: 1px solid #9c1d24;">
                                                    <b>AST - ${ast}</b>
                                                </span>
                                                <span class="finals text-white text-uppercase pl-2" style="border-left: 1px solid #9c1d24;">
                                                    <b>STL - ${stl}</b>
                                                </span>
                                                <span class="finals text-white text-uppercase pl-2" style="border-left: 1px solid #9c1d24;">
                                                    <b>BLK - ${blk}</b>
                                                </span>
                                            </div>
                                         </div>
                                    </div> `)
                    } else {
                        elem.append(`
                                    <div class="finished-games d-flex flex-column justify-content-center">
                                        <div class="first-row d-flex flex-wrap justify-content-around align-items-center pt-5">

                                             <div class="left-cont text-center">
                                                <div class="logo-cont">
                                                    <img src='${url}/${data.club[0].image}' class="img-fluid"
                                                         alt="">
                                                </div>
                                                <div class="team-cont left text-center">
                                                    <span class="team">${data.club[0].name}</span>
                                                </div>
                                             </div>


                                             <div class="mid text-center d-flex justify-content-around pt-3 pb-3">
                                                <div class="time-cont text-center pt-3">
                                                    <p style="color: #9c1d24; font-size: 20px">${data.tournament}</p>
                                                    <span class="time">${time}</span>
                                                </div>
                                             </div>

                                             <div class="right-cont text-center">
                                                 <div class="logo-cont">
                                                     <img src='${url}/${data.club[1].image}' class="img-fluid">
                                                     </div>
                                                     <div class="team-cont right text-center">
                                                         <span>${data.club[1].name}</span>
                                                 </div>
                                             </div>

                                        </div>
                                        <div class="second-row d-flex flex-column align-items-center ">
                                            <hr style="border-bottom: 1px solid #9c1d24; width: 30%;">
                                            <span class="finals mb-3 text-white text-uppercase">${data.type} ${day_month}</span>
                                            <span class="stadium text-white text-uppercase">${data.center.name}</span>
                                         </div>
                                    </div> `)
                    }
                })
            })
        </script>
    @endpush
@endsection
