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
                        <form method="post" action="{{ $route."/".$about->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="story">Story</label>
                                @error('story')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="story" id="story" cols="30" rows="10" class="form-control"
                                          style="resize: none">{{$about->story}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="why">Why Cilicia</label>
                                @error('why')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="why" id="why" cols="30" rows="10" class="form-control"
                                          style="resize: none">{{$about->why}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="mission">Our Mission</label>
                                @error('mission')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="mission" id="mission" cols="30" rows="10" class="form-control"
                                          style="resize: none">{{$about->mission}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Mission List</label>
                                @error('mission_list_text')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>

                            @foreach(json_decode($about->mission_list) as $key=>$bin)
                                <div class="form-group">
                                    <label for="mission_list_text">Mission Text {{$key+1}}</label>
                                    <input type="text" class="form-control" id="mission_list_text"
                                           name="mission_list_text[]" value="{{ $bin->mission_list_text  }}">
                                    <hr>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save About Us Info
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
