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
                        <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="full_name">Full Name <strong style="color: red;"> &#42; </strong></label>
                                @error('full_name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="full_name"
                                       placeholder="Full name" name="full_name" value="{{old('full_name')}}">
                            </div>

                            <div class="form-group">
                                <label for="dob">Date Of Birth <strong style="color: red;"> &#42; </strong></label>
                                @error('dob')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="dob" placeholder="yyyy-mm-dd" name="dob"
                                       value="{{old('dob')}}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number <strong style="color: red;"> &#42; </strong></label>
                                @error('phone_number')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="phone_number"
                                       placeholder="Phone Number (099587447)" name="phone_number" value="{{old('phone_number')}}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender <strong style="color: red;"> &#42; </strong></label>
                                @error('gender')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0" {{old('gender') == 0 ? 'selected' : "" }}>Female</option>
                                    <option value="1" {{old('gender') == 1 ? 'selected' : "" }}>Male</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="height">Height (cm)</label>
                                @error('height')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="height"
                                       placeholder="Height" name="height" value="{{old('height')}}">
                            </div>

                            <div class="form-group">
                                <label for="nationality">Nationality <strong style="color: red;"> &#42; </strong></label>
                                @error('nationality')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="nationality"
                                       placeholder="Nationality (Armenian)" name="nationality"
                                       value="{{old('nationality')}}">
                            </div>

                            <div class="form-group">
                                <label for="jersey_number">Jersey Number</label>
                                @error('jersey_number')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="jersey_number"
                                       placeholder="Jersey number" name="jersey_number"
                                       value="{{old('jersey_number')}}">
                            </div>

                            <div class="form-group">
                                <label for="jersey_size">Jersey Size</label>
                                @error('jersey_size')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="jersey_size"
                                       placeholder="Jersey Size" name="jersey_size" value="{{old('jersey_size')}}">
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                @error('position')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <select name="position" id="position" class="form-control">
                                    <option value="">--Choose Position--</option>
                                    <option value="PG" {{old('position') == "PG" ? 'selected' : "" }}>PG</option>
                                    <option value="SG" {{old('position') == "SG" ? 'selected' : "" }}>SG</option>
                                    <option value="G" {{old('position') == "G" ? 'selected' : "" }}>G</option>
                                    <option value="SF" {{old('position') == "SF" ? 'selected' : "" }}>SF</option>
                                    <option value="PF" {{old('position') == "PF" ? 'selected' : "" }}>PF</option>
                                    <option value="F" {{old('position') == "F" ? 'selected' : "" }}>F</option>
                                    <option value="C" {{old('position') == "C" ? 'selected' : "" }}>C</option>
                                    <option value="FC" {{old('position') == "FC" ? 'selected' : "" }}>FC</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="emergency_name">Emergency Contact Name</label>
                                @error('emergency_name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="emergency_name"
                                       placeholder="Emergency contact name" name="emergency_name" value="{{old('emergency_name')}}">
                            </div>

                            <div class="form-group">
                                <label for="emergency_phone">Emergency Contact Phone</label>
                                @error('emergency_phone')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="emergency_phone"
                                       placeholder="Emergency contact phone" name="emergency_phone" value="{{old('emergency_phone')}}">
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
                                        <option value="{{$key->id}}">{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--username password--}}
                            <div class="form-group">
                                <label for="email">Email <strong style="color: red;"> &#42; </strong></label>
                                @error('email')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="email" class="form-control" id="email"
                                       placeholder="Email (for login)" name="email" value="{{old('email')}}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password <strong style="color: red;"> &#42; </strong></label>
                                @error('password')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="password"
                                       placeholder="Password (for login)" name="password" value="{{old('password')}}">
                                <button type="button" class="pass btn btn-primary m-t-5">Generate Password</button>
                            </div>

                            {{--notes and image --}}
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                @error('notes')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"
                                          style="resize: none;">{{old('notes')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Image <b class="text-danger"> ( recommended size 639x814 ) </b></label>
                                @error('image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="image" name="image" class="dropify"/>
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

    <script>
        $(document).ready(function () {
            $('.pass').click(function () {
                var pass = generatePassword();
                $('#password').val(pass);
            });

            function generatePassword() {
                var length = 8,
                    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                    retVal = "";
                for (var i = 0, n = charset.length; i < length; ++i) {
                    retVal += charset.charAt(Math.floor(Math.random() * n));
                }
                return retVal;
            }
        })
    </script>
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
