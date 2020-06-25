@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Team Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"> <strong>{{ $message }}</strong> </p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Example` U12" name="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                @error('gender')
                                <p class="invalid-feedback text-danger" role="alert"> <strong>{{ $message }}</strong> </p>
                                @enderror
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0" @if(old('gender') == 0) selected  @endif>Female</option>
                                    <option value="1" @if(old('gender') == 1) selected  @endif>Male</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="age">Age Group</label>
                                @error('age')
                                <p class="invalid-feedback text-danger" role="alert"> <strong>{{ $message }}</strong> </p>
                                @enderror
                                <select name="age" id="age" class="form-control" size="10">
                                    @for($i = 3; $i < 19; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                        <option value="19">Senior (19+)</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection






