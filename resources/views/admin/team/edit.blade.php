@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route."/".$team->id }}">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="name">Team Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Team name" name="name" value="{{$team->name}}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                @error('gender')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0">Female</option>
                                    <option value="1" @if($team->gender == 1) selected @endif>Male</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="age">Age Group</label>
                                @error('age')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="age" id="age" class="form-control" >
                                    @for($i = 3; $i <= 25; $i++)
                                        <option value="{{$i}}" @if($team->age == $i) selected @endif>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection






