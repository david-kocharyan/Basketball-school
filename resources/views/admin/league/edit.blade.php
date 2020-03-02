@extends('layouts.app')

@push('jquery-multiselect')
    <script src="{{asset('assets/plugins/jquery_multiselect/dist/js/multiselect.min.js')}}"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route ."/".$league->id}}" enctype="multipart/form-data"
                              id="form_1">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="group">League Teams</label>
                                @error('group')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="group" id="group" class="form-control">
                                    <option value="U12" @if($league->group == "U12") selected @endif>U 12</option>
                                    <option value="U14" @if($league->group == "U14") selected @endif>U 14</option>
                                    <option value="U16" @if($league->group == "U16") selected @endif>U 16</option>
                                    <option value="A" @if($league->group == "A") selected @endif>A-League</option>
                                    <option value="B" @if($league->group == "B") selected @endif>B-League</option>
                                    <option value="C" @if($league->group == "C") selected @endif>Armenian cup</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                @error('gender')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0" @if($league->gender == 0) selected @endif>Female</option>
                                    <option value="1" @if($league->gender == 1) selected @endif>Male</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Roster (choose players)</label>
                                @error('to')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <p class="invalid-feedback text-danger select_to_err" style="display: none;"
                                   role="alert"></p>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <select id="search" class="form-control" size="8"
                                                multiple="multiple">
                                            @foreach($players as $key=>$val)
                                                <option value="{{$val->id}}" class="m-t-5">
                                                    {{$val->full_name}} -
                                                    @if($val->gender == 1)
                                                        Male,
                                                    @else
                                                        Female,
                                                    @endif
                                                    {{$val->dob}}//
                                                    {{$val->id}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xs-2">
                                        <button type="button" id="search_rightAll" class="btn btn-block"><i
                                                class="glyphicon glyphicon-forward"></i></button>
                                        <button type="button" id="search_rightSelected" class="btn btn-block"><i
                                                class="glyphicon glyphicon-chevron-right"></i></button>
                                        <button type="button" id="search_leftSelected" class="btn btn-block"><i
                                                class="glyphicon glyphicon-chevron-left"></i></button>
                                        <button type="button" id="search_leftAll" class="btn btn-block"><i
                                                class="glyphicon glyphicon-backward"></i></button>
                                    </div>

                                    <div class="col-xs-5">
                                        <select name="to[]" id="search_to" class="form-control" size="8"
                                                multiple="multiple">
                                            @foreach($league->leaguePlayers as $key=>$val)
                                                <option value="{{$val->id}}" class="m-t-5">
                                                    {{$val->full_name}} -
                                                    @if($val->gender == 1)
                                                        Male,
                                                    @else
                                                        Female,
                                                    @endif
                                                    {{$val->dob}}//
                                                    {{$val->id}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="submit">
                                Save Team
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        $(document).ready(function ($) {
            $('#search').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                },
                fireSearch: function (value) {
                    return value.length > 3;
                }
            });

            $("#form_1").submit(function (e) {
                const selected = document.querySelectorAll('#search_to option');
                const values = Array.from(selected).map(el => el.value);

                if (values.length === 0) {
                    e.preventDefault()
                    $(".select_to_err").empty();
                    $(".select_to_err").append("<strong>Please choose at list one player</strong>");
                    $(".select_to_err").css({"display": "block"});
                } else if (values.length >= 13) {
                    e.preventDefault()
                    $(".select_to_err").empty();
                    $(".select_to_err").append("<strong>The number of players should not be more than 12</strong>");
                    $(".select_to_err").css({"display": "block"});
                } else {
                    this.submit();
                }
            })
        });
    </script>
@endpush
