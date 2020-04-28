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
                        <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                @error('full_name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="full_name"
                                       placeholder="Full name" name="full_name" value="{{old('full_name')}}">
                            </div>

                            {{--notes and image --}}
                            <div class="form-group">
                                <label for="bio">Biography</label>
                                @error('bio')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"
                                          style="resize: none;">{{old('bio')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Image <b class="text-danger"> ( recommended size 500x300px ) </b></label>
                                @error('image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="image" name="image" class="dropify"/>
                            </div>

                            <div class="form-group">
                                <label for="doc_image">Upload Certificate Image</label>
                                @error('doc_image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="doc_image" name="doc_image[]" multiple />
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

@push('dropify-script')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
