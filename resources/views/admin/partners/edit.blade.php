@extends('layouts.app')

@push('dropify')
    <!-- Dropify plugins css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/dist/css/dropify.min.css')}}">
    <!-- jQuery file upload -->
    <script src="{{asset('assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route."/".$partner->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="url">Url</label>
                                @error('url')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="url"
                                       placeholder="aimtech.am" name="url" value="{{ $partner->url }}">
                            </div>

                            <div class="form-group">
                                <label for="image">Image <b class="text-danger"> ( recommended size 180x45 ) </b></label>
                                @error('image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="image" name="image" class="dropify" data-default-file="{{asset("uploads/partner/$partner->image")}}"/>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Partner
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('dropify-script')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
