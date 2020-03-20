@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">{{$gallery->name}}</h3>

                <div class="gallery">
                    @foreach($gallery->images as $key)
                        <a href="{{asset("uploads/gallery/$key->name")}}"><img
                                src="{{asset("uploads/gallery/$key->name")}}" alt="{{$gallery->name}}" class="img-thumbnail img-responsive" width="300"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-style')
    <link rel="stylesheet" href="{{asset("assets/plugins/simplelightbox/dist/simple-lightbox.css")}}">
@endpush

@push('custom-script')
    <script src="{{asset("assets/plugins/simplelightbox/dist/simple-lightbox.jquery.js")}}"></script>
    <script>
        var lightbox = $('.gallery a').simpleLightbox();
    </script>
@endpush





