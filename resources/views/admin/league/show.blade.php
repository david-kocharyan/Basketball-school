@extends('layouts.app')

@push('magnific')
    <!-- Popup CSS -->
    <link href="{{asset("assets/plugins/magnific/dist/magnific-popup.css")}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h2>{{$league->group}}</h2>
                <h5> @if($league->gender == 1) Male @else Female @endif</h5>
            </div>
        </div>
    </div>

    <div class="row el-element-overlay m-b-40">

        @foreach($league->leaguePlayers as $key)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1">
                            <img src="{{asset("uploads/player/$key->image")}}"/>
                            <div class="el-overlay">
                                <ul class="el-info">
                                    <li><a class="btn default btn-outline image-popup-vertical-fit"
                                           href="{{asset("uploads/player/$key->image")}}"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="el-card-content">
                            <h3 class="box-title">{{$key->full_name}}</h3> <small>{{$key->position}} {{$key->jersey_number}}</small>
                            <br/></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('magnific-script')
    <!-- Magnific popup JavaScript -->
    <script src="{{asset("assets/plugins/magnific/dist/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("assets/plugins/magnific/dist/jquery.magnific-popup-init.js")}}"></script>
@endpush





