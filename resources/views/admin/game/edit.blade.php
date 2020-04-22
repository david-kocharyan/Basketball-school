@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route."/".$game->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="club_1">Club 1</label>
                                @error('club')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="club_1" id="club_1" class="form-control select2">
                                    @foreach($club as $key)
                                        <option value="{{$key->id}}"
                                                @if($key->id == $game->club[0]->id) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="club_2">Club 2</label>
                                @error('club_2')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="club_2" id="club_2" class="form-control select2">
                                    @foreach($club as $key)
                                        <option value="{{$key->id}}"
                                                @if($key->id == $game->club[1]->id) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Round</label>
                                @error('round')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="round" id="type" class="form-control select2">
                                    <option @if($game->type == "Regular season") @endif value="Regular season">Regular season</option>
                                    <option @if($game->type == "Friendly") @endif value="Friendly">Friendly</option>
                                    <option @if($game->type == "Final 4") @endif value="Final 4">Final 4</option>
                                    <option @if($game->type == "Final 6") @endif value="Final 6">Final 6</option>
                                    <option @if($game->type == "Quarter-finals") @endif value="Quarter-finals">Quarter-finals</option>
                                    <option @if($game->type == "Semi-finals") @endif value="Semi-finals">Semi-finals</option>
                                    <option @if($game->type == "Finals") @endif value="Finals">Finals</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Competition">Competition</label>
                                @error('competition')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" name="competition" id="competition" value="{{$game->tournament}}" class="form-control" placeholder="Competition">
                            </div>

                            <div class="form-group">
                                <label for="venue">Venue</label>
                                @error('venue')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="venue" id="venue" class="form-control select2">
                                    @foreach($center as $key)
                                        <option value="{{$key->id}}"
                                                @if($key->id == $game->center_id) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                @error('date')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" name="date" id="date" value="{{$game->date}}" class="form-control" placeholder="YYYY-MM-DD">
                            </div>

                            <div class="form-group">
                                <label for="time">Time</label>
                                @error('time')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" name="time" id="time" value="{{Carbon\Carbon::parse($game->time)->format('H:i')}}" class="form-control" placeholder="HH:MM">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Game
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
    <!-- Date picker plugins css  Date Picker Plugin JavaScript-->
    <link href="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Time picker plugins css  Time Picker Plugin JavaScript -->
    <link href="{{asset('assets/plugins/clockpicker/dist/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('assets/plugins/clockpicker/dist/bootstrap-clockpicker.min.js')}}"></script>
@endpush

@push('custom-script')
    <!--Select2 js-->
    <script src="{{asset('assets/plugins/select2/dist/js/select2.min.js')}}"></script>

    <script !src="">
        $('#club_1').select2();
        $('#club_2').select2();
        $('#type').select2();
        $('#venue').select2();

        $('#type').on('change', function () {
            if (this.value == "Friendly") {
                $('#competition').prop('disabled', true);
                $('#competition').val('Friendly');
            } else {
                $('#competition').prop('disabled', false);
            }
        });

        $('#date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });

        $('#time').clockpicker({
            autoclose: true,
            placement: 'top',
            align: 'left',
            default: 'now'
        });

    </script>
@endpush

