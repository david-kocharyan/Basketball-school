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
                        <form method="post" action="{{ $route."/".$tournament->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="name">Tournament Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Club name" name="name" value="{{$tournament->name}}">
                            </div>

                            <div class="form-group" style="display: flex; align-items: center">
                                <label for="category">Show In Home Page</label>
                                <input style="width: 50px; margin-left: 30px;" type="checkbox" @if($tournament->show_in_home == 1) checked @endif name="show" value="1" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Tournament
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
