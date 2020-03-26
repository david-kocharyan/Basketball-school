@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route."/".$monthPlayer->id}}">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="player_id">Player</label>
                                @error('player_id')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror

                                <select name="player_id" id="player_id" class="form-control select">
                                    @foreach($players as $key)
                                        <option value="{{$key->id}}"
                                                @if($monthPlayer->id == $key->id) selected @endif>{{$key->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="team">Team name</label>
                                @error('team')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" name="team" id="team" value="{{$monthPlayer->team}}">
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





