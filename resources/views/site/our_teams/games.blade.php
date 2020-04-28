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
                                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">All
                    Games
                </p>
            </div>

            <div class="col-md-12">
                @foreach($games as $key=>$val)
                    <div class="games col-md-3 d-inline-block">
                        <div class="first-row d-flex flex-column align-items-center">
                            <div class="date-cont">
                                <span
                                    class="date text-uppercase">{{Carbon\Carbon::parse($val->date)->format(' F d, Y')}}</span>
                            </div>
                            <div class="score-cont d-flex justify-content-around pt-1">
                                <span class="score-team text-uppercase"><b>{{$val->club[0]->name[0]}}</b></span>
                                <span class="red text-uppercase time-final"><b>VS</b></span>
                                <span class="score-team text-uppercase"><b>{{$val->club[1]->name[0]}}</b></span>
                            </div>
                        </div>
                        <div class="second-row @if($val->best_player == null) gray-bg @else red-bg @endif d-flex align-items-end justify-content-center">
                            <span class="finals text-uppercase"><b>{{$val->tournament->name ?? "Friendly"}}</b></span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-12 d-flex justify-content-center p-2">
                {{ $games->links() }}
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
                font-size: 15px;
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
                color: #ffffff;
                font-size: 18px;
            }

            .gray-bg{
                background-color: #6c6c6e;
            }
            .red-bg{
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
    @endpush
@endsection
