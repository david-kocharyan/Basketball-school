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
                                <label for="tournament">Tournament</label>
                                @error('tournament')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="tournament" id="tournament" class="form-control select2">
                                    @foreach($tournament as $key)
                                        <option value="{{$key->id}}" @if($key->id == old('tournament')) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="club">Club</label>
                                @error('club')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="club" id="club" class="form-control select2">
                                    @foreach($clubs as $key)
                                        <option value="{{$key->id}}" @if($key->id == old('club')) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="rank">Rank</label>
                                @error('rank')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="rank"
                                       placeholder="Rank" name="rank" value="{{old('rank')}}">
                            </div>

                            <div class="form-group">
                                <label for="win">Win</label>
                                @error('win')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="win"
                                       placeholder="Win" name="win" value="{{old('win')}}">
                            </div>

                            <div class="form-group">
                                <label for="lose">Lose</label>
                                @error('lose')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="lose"
                                       placeholder="Lose" name="lose" value="{{old('lose')}}">
                            </div>

                            <div class="form-group">
                                <label for="points">Points</label>
                                @error('points')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="points"
                                       placeholder="Points" name="points" value="{{old('points')}}">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save
                                Tournament Club
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-style')
    <!--This is a Select 2 style -->
    <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@push('custom-script')
    <!--Select2 js-->
    <script src="{{asset('assets/plugins/select2/dist/js/select2.min.js')}}"></script>

    <script !src="">
        $('#tournament').select2();
        $('#club').select2();
    </script>
@endpush
