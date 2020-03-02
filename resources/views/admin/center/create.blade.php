@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Name" name="name" value="{{old('name')}}">
                            </div>

                            {{--notes and image --}}
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                @error('notes')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"
                                          style="resize: none;">{{old('notes')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="map">Map (please choose location)</label>
                                <div id="map" class="col-md-12 m-b-10" style="height: 500px;"></div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                @error('address')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="address"
                                       placeholder="Address" name="address" value="{{old('address')}}">
                            </div>

                            <div class="form-group">
                                <label for="lat">Latitude</label>
                                @error('lat')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="lat"
                                       placeholder="Latitude" name="lat" value="{{old('lat')}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="lng">Longitude</label>
                                @error('lng')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="lng"
                                       placeholder="Longitude" name="lng" value="{{old('lng')}}" readonly>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Coaches
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script
        src="https://maps.google.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDsz2KPO5FSf6PDx2YwCTtB1HBt2DkXFrY"
        type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            geocoder = new google.maps.Geocoder();
            infowindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: new google.maps.LatLng(40.181384, 44.512537),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(40.181384, 44.512537),
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#address').val(results[0].formatted_address);
                            $('#lat').val(marker.getPosition().lat());
                            $('#lng').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
        })
    </script>
@endpush
