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
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">
                            {{ strtoupper($title) }}
                        </p>
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
    <div class="table-section p-5">
        <div class="container">
            <div class="row">

                @foreach($standings as $key => $val)
                    <div class="d-md-block @if($key != 0) d-none @endif col-md-4">
                        <table class="table table-striped">
                            <tr>
                                <th class="bg-red text-center text-white table-head" colspan="4">{{$val->name}}</th>
                            </tr>
                            <tr class="sub-head">
                                <td>#</td>
                                <td class="text-left" style="width: 50%;">Team</td>
                                <td>W/L</td>
                                <td>Points</td>
                            </tr>
                            @foreach($val->tournament_clubs as $b=>$v)
                                @if($b > 10) @break @endif
                                <tr>
                                    <td>{{$b + 1}}</td>
                                    <td class="text-left"><img class="img-fluid"
                                                               style="height: 20px; margin-right: 10px"
                                                               src="{{ asset("uploads/clubs")."/".$val->clubs[$b]->image }}"
                                                               alt="">{{$val->clubs[$b]->name}}
                                    </td>
                                    <td>{{$v->win." / ".$v->lose}}</td>
                                    <td>{{$v->points}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endforeach
                    <div class="col-md-12 d-flex justify-content-center p-2">
                        {{ $standings->links() }}
                    </div>
            </div>
        </div>
    </div>


@endsection

@push('head')
    <style>
        .header {
            padding-top: 0;
        }

        .table-section {
            padding: 50px 0;
            background: #ebebeb;
        }

        .sub-head {
            background: #6c6c6e !important;
        }

        .table-section th, .table-section td {
            border: none !important;
            text-align: center;
        }

        .sub-head td {
            color: white;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background: white;
        }

        .page-link{
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: 5px;
            line-height: 1.25;
            color: #9c1d24;
            background-color: #dddddd;
            border: 1px solid #dddddd;
        }

        .page-item.disabled .page-link{
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: 5px;
            line-height: 1.25;
            color: #9c1d24;
            background-color: #dddddd;
            border: 1px solid #dddddd;
        }

        .page-item.active .page-link{
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
