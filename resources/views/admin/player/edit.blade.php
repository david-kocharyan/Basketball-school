@extends('layouts.app')

@push('datepicker')
    <!-- Date picker plugins css -->
    <link href="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
@endpush

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
                        <form method="post" action="{{ $route."/".$player->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                @error('full_name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="full_name"
                                       placeholder="Full name" name="full_name" value="{{$player->full_name}}">
                            </div>

                            <div class="form-group">
                                <label for="dob">Date Of Birth</label>
                                @error('dob')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="dob" placeholder="yyyy-mm-dd" name="dob"
                                       value="{{$player->dob}}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                @error('phone_number')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="phone_number"
                                       placeholder="Phone Number (099587447)" name="phone_number" value="{{$player->phone_number}}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                @error('gender')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0" {{$player->gender == 0 ? 'selected' : "" }}>Female</option>
                                    <option value="1" {{$player->gender == 1 ? 'selected' : "" }}>Male</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="height">Height (cm)</label>
                                @error('height')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="height"
                                       placeholder="Height" name="height" value="{{$player->height}}">
                            </div>

                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                @error('nationality')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="nationality"
                                       placeholder="Nationality (Armenian)" name="nationality"
                                       value="{{$player->nationality}}">
                            </div>

                            <div class="form-group">
                                <label for="jersey_number">Jersey Number</label>
                                @error('jersey_number')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="jersey_number"
                                       placeholder="Jersey number" name="jersey_number"
                                       value="{{$player->jersey_number}}">
                            </div>

                            <div class="form-group">
                                <label for="jersey_size">Jersey Size</label>
                                @error('jersey_size')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="jersey_size"
                                       placeholder="Jersey Size" name="jersey_size" value="{{$player->jersey_size}}">
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                @error('position')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="position" id="position" class="form-control">
                                    <option value="">--Choose Position--</option>
                                    <option value="PG" {{$player->position == "PG" ? 'selected' : "" }}>PG</option>
                                    <option value="SG" {{$player->position == "SG" ? 'selected' : "" }}>SG</option>
                                    <option value="G" {{$player->position == "G" ? 'selected' : "" }}>G</option>
                                    <option value="SF" {{$player->position == "SF" ? 'selected' : "" }}>SF</option>
                                    <option value="PF" {{$player->position == "PF" ? 'selected' : "" }}>PF</option>
                                    <option value="F" {{$player->position == "F" ? 'selected' : "" }}>F</option>
                                    <option value="C" {{$player->position == "C" ? 'selected' : "" }}>C</option>
                                    <option value="FC" {{$player->position == "FC" ? 'selected' : "" }}>FC</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="emergency_name">Emergency Contact Name</label>
                                @error('emergency_name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="emergency_name"
                                       placeholder="Emergency contact name" name="emergency_name" value="{{$player->emergency_name}}">
                            </div>

                            <div class="form-group">
                                <label for="emergency_phone">Emergency Contact Phone</label>
                                @error('emergency_phone')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="emergency_phone"
                                       placeholder="Emergency contact phone" name="emergency_phone" value="{{$player->emergency_phone}}">
                            </div>
                            {{--team--}}
                            <div class="form-group">
                                <label for="team">Team</label>
                                @error('team')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="team" id="team" class="form-control">
                                    <option value="">--Choose Team--</option>
                                    @foreach($teams as $key)
                                        <option value="{{$key->id}}" {{$player->teamPlayers[0]->id == $key->id ? 'selected' : "" }}>{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--username password--}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                @error('email')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="email" class="form-control" id="email"
                                       placeholder="Email (for login)" name="email" value="{{$player->email}}">
                            </div>


                            {{--notes and image --}}
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                @error('notes')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"
                                          style="resize: none;">{{$player->notes}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                @error('image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="image" name="image" class="dropify" data-default-file="{{asset("uploads/player/$player->image")}}"/>
                            </div>

                            <div class="form-group">
                                <label for="doc_image">Upload Documents Image</label>
                                @error('doc_image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="doc_image" name="doc_image[]" multiple />
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Player
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('datepicker-script')
    <script>
        $('#dob').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    </script>
@endpush

@push('dropify-script')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
