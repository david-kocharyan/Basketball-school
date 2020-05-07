@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid"
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Home <span
                                class="greater">&gt;</span> {{ strtoupper($title) }}</p>
                        <p class="subtitle">We are competitive professional basketball club - with our players
                            competiting at all levels from local team galas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-part">
                    <div class="header-part pt-2 pb-2">
                        <p class="m-0 text-center text-uppercase text-white">My Account</p>
                    </div>

                    <form method="POST" action="{{ route('player_login') }}">
                        @csrf

                        <div class="input-part p-4">
                            <h6 class="text-danger">
                                @if($errors->any())
                                    {{$errors->first()}}
                                @endif
                            </h6>
                            <label for="email"> Email Address <span class="red">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend mr-2">
                                    <span class="input-group-text" id="basic-addon1"><img class="img-fluid"
                                                                                          style="height: 20px"
                                                                                          src="{{ asset("assets/site/images/auth/user_black.svg") }}"
                                                                                          alt="Lock"></span>
                                </div>
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}">
                            </div>

                            <label for="password">Password <span class="red">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend mr-2">
                                    <span class="input-group-text" id="basic-addon1"><img class="img-fluid"
                                                                                          style="height: 20px"
                                                                                          src="{{ asset("assets/site/images/auth/lock_black.svg") }}"
                                                                                          alt="Lock"></span>
                                </div>
                                <input type="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password">
                            </div>

                            <div class="input-group mb-3">
                                <div class="check d-flex align-items-center">
                                    <button class="rounded-button">LOG IN</button>
                                    <input type="checkbox" id="remember" class="d-inline-block ml-3" name="remember"
                                           value="1">
                                    <label class="label label-custom m-0 ml-2" for="remember">Remember Me</label>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


    @push('head')
        <style>
            .header {
                padding-top: 0;
            }

            p {
                font-family: Roboto-Condensed-Regular, sans-serif;
            }

            .sticky + .content {
                padding-top: 70px;
            }

            #remember {
                background-color: white !important;
                height: 20px;
                width: 20px;
            }

            .input-group-prepend span {
                background-color: white;
                border-radius: 8px;
            }

            .label-custom {
                font-size: 14px !important;
                color: grey;
            }

            .form-part label {
                font-size: 12px;
            }

            .input-part {
                border: 1px solid #9c1d24;
                border-radius: 0 0 10px 10px;
            }

            .form-part .header-part {
                background-color: #9c1d24;
            }

            .form-part .header-part p {
                font-family: Roboto-Condensed-Bold, sans-serif;
            }

            .header-part {
                border-radius: 10px 10px 0 0;
            }
        </style>
    @endpush
@endsection
