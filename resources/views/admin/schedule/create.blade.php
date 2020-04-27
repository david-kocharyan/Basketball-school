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
                                <label for="team">Team</label>
                                @error('team')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="team" id="team" class="form-control">
                                    @foreach($teams as $key)
                                        <option
                                            value="{{$key->id}}" {{old('team') == $key->id ? 'selected' : "" }}>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Price per Month</label>
                                @error('price')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="price"
                                       placeholder="Price" name="price" value="{{old('price')}}">
                            </div>

                            <div id="education_fields"></div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <select class="form-control" id="day_from" name="day_from[]">
                                        <option value="">Date From</option>
                                        <option value="Mon">Monday</option>
                                        <option value="Tues">Tuesday</option>
                                        <option value="Wed">Wednesday</option>
                                        <option value="Thurs">Thursday</option>
                                        <option value="Fri">Friday</option>
                                        <option value="Sat">Saturday</option>
                                        <option value="Sun">Sunday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <select class="form-control" id="day_to" name="day_to[]">
                                        <option value="">Date To</option>
                                        <option value="Mon">Monday</option>
                                        <option value="Tues">Tuesday</option>
                                        <option value="Wed">Wednesday</option>
                                        <option value="Thurs">Thursday</option>
                                        <option value="Fri">Friday</option>
                                        <option value="Sat">Saturday</option>
                                        <option value="Sun">Sunday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="time_from" name="time_from[]" value=""
                                           placeholder="Time From">
                                </div>
                            </div>

                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="time_to" name="time_to[]" value=""
                                               placeholder="Time To">
                                        <div class="input-group-btn ml-1">
                                            <button class="btn btn-success" type="button" onclick="education_fields();">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>


                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Schedule
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script !src="">
        var room = 1;
        function education_fields() {

            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass"+room);
            var rdiv = 'removeclass'+room;
            divtest.innerHTML = `
                                <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <select class="form-control" id="day_from" name="day_from[]">
                                        <option value="">Date From</option>
                                        <option value="Mon">Monday</option>
                                        <option value="Tues">Tuesday</option>
                                        <option value="Wed">Wednesday</option>
                                        <option value="Thurs">Thursday</option>
                                        <option value="Fri">Friday</option>
                                        <option value="Sat">Saturday</option>
                                        <option value="Sun">Sunday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <select class="form-control" id="day_to" name="day_to[]">
                                        <option value="">Date To</option>
                                        <option value="Mon">Monday</option>
                                        <option value="Tues">Tuesday</option>
                                        <option value="Wed">Wednesday</option>
                                        <option value="Thurs">Thursday</option>
                                        <option value="Fri">Friday</option>
                                        <option value="Sat">Saturday</option>
                                        <option value="Sun">Sunday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="time_from" name="time_from[]" value=""
                                           placeholder="Time From">
                                </div>
                            </div>

                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="time_to" name="time_to[]" value=""
                                               placeholder="Time To">

                <div class="input-group-btn">
                <button class="btn btn-danger" type="button" onclick="remove_education_fields(${room});">
                 <span class="glyphicon glyphicon-minus" aria-hidden="true">
                </span> </button></div></div></div></div><div class="clear">
                </div>`;

            objTo.appendChild(divtest)
        }
        function remove_education_fields(rid) {
            $('.removeclass'+rid).remove();
        }
    </script>
@endpush
