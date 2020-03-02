@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="">
                    <h2 class="m-b-0 m-t-0">{{$center->name}}</h2>
                    <h5 class="m-b-0 m-t-0">{{$center->address}}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="map" class="col-md-12" style="height: 500px;"></div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="box-title m-t-20">Notes</h4>
                            <p class="col-md-12" style="word-wrap: break-word">{{$center->notes}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script src="https://maps.google.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDsz2KPO5FSf6PDx2YwCTtB1HBt2DkXFrY"
            type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            geocoder = new google.maps.Geocoder();

            var lat = {{json_decode($center->lat)}}
            var lng = {{json_decode($center->lng)}}

            var infowindow = new google.maps.InfoWindow({
                    content: $("#address").html(),
                });

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: new google.maps.LatLng(lat, lng),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var marker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(lat, lng),
            });

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
        })
    </script>
@endpush






