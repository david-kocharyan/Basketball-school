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
                                <label for="name">Club Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Club name" name="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Club Logo</label>
                                @error('image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="image" name="image" class="dropify"/>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Club
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
