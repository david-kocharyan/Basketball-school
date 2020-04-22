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
                                <label for="club_1">Club 1</label>
                                @error('club')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="club_1" id="club_1" class="form-control select2">
                                    @foreach($club as $key)
                                        <option value="{{$key->id}}"
                                                @if($key->id == old('club_1')) selected @endif>{{$key->name}}</option>
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
                                                @if($key->id == old('club_2')) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Round</label>
                                @error('round')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="round" id="type" class="form-control select2">
                                    <option value="Regular season">Regular season</option>
                                    <option value="Friendly">Friendly</option>
                                    <option value="Final 4">Final 4</option>
                                    <option value="Final 6">Final 6</option>
                                    <option value="Quarter-finals">Quarter-finals</option>
                                    <option value="Semi-finals">Semi-finals</option>
                                    <option value="Finals">Finals</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Competition">Competition</label>
                                @error('competition')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" name="competition" id="competition" value="{{old("competition")}}" class="form-control" placeholder="Competition">
                            </div>

                            <div class="form-group">
                                <label for="venue">Venue</label>
                                @error('venue')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="venue" id="venue" class="form-control select2">
                                    @foreach($center as $key)
                                        <option value="{{$key->id}}"
                                                @if($key->id == old('venue')) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                @error('date')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" name="date" id="date" value="{{old("date")}}" class="form-control" placeholder="YYYY-MM-DD">
                            </div>

                            <div class="form-group">
                                <label for="time">Time</label>
                                @error('time')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" name="time" id="time" value="{{old("time")}}" class="form-control" placeholder="HH:MM">
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
