@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route."/".$homeGallery->id}}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="album_id">Select Album</label>
                                @error('album_id')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror

                                <select name="album_id" id="album_id" class="form-control select">
                                    @foreach($gallery as $key)
                                        <option value="{{$key->id}}"
                                                @if($homeGallery->album_id == $key->id) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Thumbnail Image <b class="text-danger"> ( recommended size 255x255 or 540x255 ) </b></label>
                                @error('image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="image" name="image" class="dropify" data-default-file="{{asset("uploads/home_gallery/")."/".$homeGallery->image}}" />
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('custom-style')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
@endpush


@push('custom-script')
    <script src="{{asset('assets/plugins/select2/dist/js/select2.min.js')}}"></script>
    <script !src="">
        $('select').select2();
    </script>
@endpush

@push('dropify')
    <!-- Dropify plugins css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/dist/css/dropify.min.css')}}">
    <!-- jQuery file upload -->
    <script src="{{asset('assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>
@endpush

@push('dropify-script')
    <script>
        $('.dropify').dropify();
    </script>
@endpush





