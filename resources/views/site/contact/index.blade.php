@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-4 ">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid"
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">
                            {{ strtoupper($title) }}
                        </p>
                        <p class="subtitle">
                            We are Cilicia, a professional Basketball Club / Academy based in Armenia with the aim of providing the best platform for basketball to the youth and the young of all ages.
                            <br><br>
                            <i>“The strength of the team is each individual member. The strength of each member is the team.” – Phil Jackson</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-section">
        <div class="container pt-lg-5 pb-lg-5 pt-3 pb-3">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-lg-0 mb-3">
                    <p class="info m-0"><img style="height: 30px; margin-right: 10px"
                                             src="{{ asset("assets/site/images/contact/phone.svg") }}"
                                             alt="Phone Icone"> +374 55 18 04 18</p>
                </div>
                <div class="col-xl-4 col-md-4 mb-lg-0 mb-3">
                    <p class="info m-0"><img style="height: 30px; margin-right: 10px"
                                             src="{{ asset("assets/site/images/contact/email.svg") }}" alt="Email Svg">info@ciliciabasketballclub.com</p>
                </div>
                <div class="col-xl-4 col-md-4 mb-lg-0 mb-3">
                    <p class="info m-0"><img style="height: 30px; margin-right: 10px"
                                             src="{{ asset("assets/site/images/contact/address.svg") }}"
                                             alt="Address Icon">1/5 Alek Manukyan St, Yerevan 0025, Armenia</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="main-section">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3048.306628024236!2d44.52437961570116!3d40.17998907792682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abceee0788acb%3A0x94b460f7b777dad6!2s1%2F5%20Alek%20Manukyan%20St%2C%20Yerevan%200025%2C%20Armenia!5e0!3m2!1sen!2s!4v1593086197945!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-md-12 col-xl-6 overlay-part">
                        <div class="col-xl-8 col-sm-12">
                            <p class="title pb-3"><img style="height: 20px" class="img-fluid"
                                                       src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Contact
                                Us</p>
                            <p class="subtitle">Our mission is to raise an academy and be part of the growing basketball culture in Armenia as we develop, form and expose the young and the youth to the importance of hard work, discipline and instilling passion and the love for basketball within our community.</p>
                        </div>
                        <form class="contact-form">
                            <div class="row m-0">
                                <div class="form-field col-xl-4 col-md-6">
                                    <input id="name" name="name" class="input-text js-input" type="text" required>
                                    <label class="label" for="name">Name</label>
                                </div>
                                <div class="form-field col-xl-4 col-md-6">
                                    <input id="p_name" name="p_name" class="input-text js-input" type="email" required>
                                    <label class="label" for="p_name">Last Name</label>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="form-field col-xl-4 col-md-6">
                                    <input id="email" name="email" class="input-text js-input" type="email" required>
                                    <label class="label" for="email">E-mail</label>
                                </div>
                                <div class="form-field col-xl-4 col-md-6">
                                    <input id="phone" name="phone" class="input-text js-input" type="text" required>
                                    <label class="label" for="phone">Phone</label>
                                </div>
                            </div>
                            <div class="row m-0 mt-3">
                                <div class="col-xl-8 col-lg-10 col-md-12">
                                    <textarea name="message" id="message" rows="5"
                                              class="input-text-msg js-input"></textarea>
                                    <label class="label" for="message">Message</label>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="form-field col-xl-8 pt-3">
                                    <input class="rounded-button" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5" style="background-color: #ebebeb">
        <div class="row">

            <div class="col-xl-4 d-flex align-items-center img-cont"
                 style="background-image: url('{{ asset("assets/site/images/contact/contact_training_scedule-min.jpg") }}')">
                <div class="red-overlay"></div>
                <div class="col-md-12 pl-lg-5">
                    <p class="title text-white mb-0 pt-4">
                        <img style="height: 20px; position:relative;" class="img-fluid"
                             src="{{ asset("assets/site/images/ball-white.svg") }}"
                             alt="Ball">Training Schedule</p>
                    <div class="text-cont pt-4">
                        <ul style="padding-left: 30px">
                            @foreach($schedule as $key)
                                <li><b>{{$key->team->name}}</b></li>
                            @endforeach
                        </ul>
                        <ul>
                            @foreach($schedule as $key)
                                <li>
                                    @php
                                        {{$i = 0;$len = count($key->date);}}
                                    @endphp
                                    @foreach($key->date as $bin=>$dates)
                                        @if($i == $len-1)
                                            {{$dates->day}}
                                        @else
                                            {{$dates->day.", "}}
                                        @endif
                                        @php
                                            {{$i++;}}
                                        @endphp
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="button-sec pt-4" style="padding-left: 30px;">
                        <a href="/schedules">
                            <button class="rounded-button">View More</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 d-flex align-items-center img-cont middle"
                 style="background-image: url('{{ asset("assets/site/images/contact/contact_shop-min.jpg") }}')">
                <div class="red-overlay"></div>
                <div class="col-md-12 pl-lg-5">
                    <p class="title text-white mb-0 pt-4">
                        <img style="height: 20px; position:relative;" class="img-fluid"
                             src="{{ asset("assets/site/images/ball-white.svg") }}"
                             alt="Ball">Shop</p>
                    <div class="text-cont pt-4">
                        <div class="col-md-12">
                            <p style="padding-left: 15px" class="text-white">Coming Soon...</p>
                        </div>
                    </div>
                    <div class="button-sec pt-4" style="padding-left: 30px;">
                        <a href="javascript:void(0);">
                            <button class="rounded-button">Shop Now</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 d-flex align-items-center img-cont"
                 style="background-image: url('{{ asset("assets/site/images/contact_gallery.jpg") }}')">
                <div class="red-overlay"></div>
                <div class="col-md-12 pl-lg-5">
                    <p class="title text-white mb-0 pt-4">
                        <img style="height: 20px; position:relative;" class="img-fluid"
                             src="{{ asset("assets/site/images/ball-white.svg") }}"
                             alt="Ball">Gallery</p>
                    <div class="text-cont pt-4">
                        <div class="col-md-12">
                            <p style="padding-left: 15px" class="text-white"><span>“The strength of the team is each individual member. The strength of each member is the team.” – Phil Jackson</span></p>
                        </div>
                    </div>
                    <div class="button-sec pt-4" style="padding-left: 30px;">
                        <a href="/gallery">
                            <button class="rounded-button">Visit Our Gallery</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('head')
    <style>
        .header {
            padding-top: 0;
        }

        p, ul, li{
            font-family: Roboto-Condensed-Regular, sans-serif;
        }

        .sticky + .content {
            padding-top: 70px;
        }


        .red-overlay {
            position: absolute;
            height: 100%;
            width: 100%;
            background-color: #901a22;
            opacity: .65;
        }

        .middle {
            border-left: 1px solid #9c1d24;
            border-right: 1px solid #9c1d24;
        }

        .text-cont {
            display: flex;
            height: 100px;
        }

        .text-cont li {
            color: white;
            list-style-type: none;
        }

        .img-cont {
            height: 300px;
            padding: 0;
        }

        .sticky + .content {
            padding-top: 70px;
        }

        .contact-section {
            background-color: #ebebeb;
        }

        .map {
            height: 100%;
            width: 100%;
            position: absolute;
        }

        .map iframe {
            width: 80%;
            height: 100%;
        }

        .contact-section .subtitle {
            color: #191919;
        }

        .main-section {
            /*height: 763px;*/
            height: 700px;
            width: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .overlay-part {
            background-color: #ebebeb;
            padding: 30px;
            box-shadow: 3px 0 10px -1px grey;
        }

        .info {
            color: #161616;
        }

        .img-cont {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .contact-form .form-field {
            position: relative;
            margin: 32px 0;
        }

        .contact-form .input-text {
            display: block;
            width: 100%;
            height: 36px;
            border-width: 0 0 2px 0;
            border-color: #000;
            font-family: Lusitana, serif;
            font-size: 20px;
            line-height: 26px;
            font-weight: bold;
            background: none;
        }

        .contact-form .input-text-msg {
            resize: none;
            display: block;
            width: 100%;
            border-width: 0 0 2px 0;
            border-color: #000;
            font-family: Lusitana, serif;
            font-size: 20px;
            line-height: 26px;
            font-weight: bold;
            background: none;
        }

        .contact-form .input-text:focus {
            outline: none;
        }

        .contact-form .input-text-msg:focus {
            outline: none;
        }

        .contact-form .input-text:focus + .label, .contact-form .input-text.not-empty + .label {
            -webkit-transform: translateY(-24px);
            transform: translateY(-24px);
        }

        .contact-form .input-text-msg:focus + .label, .contact-form .input-text-msg.not-empty + .label {
            -webkit-transform: translateY(-125px);
            transform: translateY(-125px);
        }

        .contact-form .label {
            position: absolute;
            bottom: 5px;
            font-family: 'Roboto-Condensed', sans-serif;
            font-size: 16px;
            line-height: 26px;
            font-weight: 400;
            color: black;
            cursor: text;
            -webkit-transition: -webkit-transform .2s ease-in-out;
            transition: -webkit-transform .2s ease-in-out;
            transition: transform .2s ease-in-out;
            transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;
        }

        .contact-form .submit-btn {
            display: inline-block;
            background-color: #000;
            color: #fff;
            font-family: Raleway, sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 16px;
            line-height: 24px;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }

        .rounded-button{
            border: 1px solid #9c1d24;
        }
        .rounded-button:hover{
            border: 1px solid white;
            background: #151515;
            /*background-position: 0 -100%;*/
        }

        @media all and (max-width: 768px) {
            .main-section {
                background: none;
                display: block;
                height: auto;
            }

            .overlay-part {
                box-shadow: none;
                padding: 0;
            }
        }
        @media all and (max-width: 1024px) {
            .middle {
                border-top: 1px solid #9c1d24;
                border-bottom: 1px solid #9c1d24;
                border-left: none;
                border-right: none;
            }
        }
    </style>
@endpush

@push('footer')
    <script !src="">
        $('.js-input').keyup(function () {
            if ($(this).val()) {
                $(this).addClass('not-empty');
            } else {
                $(this).removeClass('not-empty');
            }
        });
    </script>
@endpush
