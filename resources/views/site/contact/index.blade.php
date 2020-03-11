@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center" style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Home <span class="greater">&gt;</span> {{ strtoupper($title) }}</p>
                        <p class="subtitle">We are competitive professional basketball club - with our players competiting at all levels from local team galas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-section">
        <div class="container pt-lg-5 pb-lg-5 pt-3 pb-3">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-lg-0 mb-3">
                    <p class="info m-0"><img style="height: 30px; margin-right: 10px" src="{{ asset("assets/site/images/contact/phone.svg") }}" alt="Phone Icone"> +374(33) 93 93 99</p>
                </div>
                <div class="col-xl-4 col-md-4 mb-lg-0 mb-3">
                    <p class="info m-0"><img style="height: 30px; margin-right: 10px" src="{{ asset("assets/site/images/contact/email.svg") }}" alt="Email Svg">info@cilicia.am</p>
                </div>
                <div class="col-xl-4 col-md-4 mb-lg-0 mb-3">
                    <p class="info m-0"><img style="height: 30px; margin-right: 10px" src="{{ asset("assets/site/images/contact/address.svg") }}" alt="Address Icon">Vardanants 3, Yerevan</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="main-section">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3048.5633458799225!2d44.51934171572156!3d40.1742747782727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abcf3e587fac9%3A0xec36682cfc305344!2s3%20Vardanants%20St%2C%20Yerevan%200010%2C%20Armenia!5e0!3m2!1sen!2s!4v1583905385695!5m2!1sen!2s" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-md-12 col-xl-6 overlay-part">
                        <div class="col-xl-8 col-sm-12">
                            <p class="title pb-3"><img style="height: 30px" class="img-fluid" src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">Contact Us</p>
                            <p class="subtitle"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad consectetur inventore maxime, quaerat rerum voluptatem. </p>
                        </div>
                        <form action="">
                            <div class="row m-0">
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="p_name">Participant's Name</label>
                                        <input type="text" id="p_name" name="p_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-xl-8 col-lg-10 col-md-12">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-xl-8 pt-3">
                                    <button class="rounded-button">Send</button>
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

            <div class="col-xl-4 d-flex align-items-center img-cont" style="background-image: url('{{ asset("assets/site/images/contact/contact_shop-min.jpg") }}')">
                <div class="red-overlay"></div>
                <div class="col-md-12 pl-lg-5">
                    <p class="title text-white pb-3"><img style="height: 20px; position:relative;" class="img-fluid" src="{{ asset("assets/site/images/ball-white.svg") }}" alt="Ball">Training Schedule</p>
                    <div class="text-cont">
                        <ul>
                            <li><b>Under 14y</b></li>
                            <li><b>Under 16y</b></li>
                            <li><b>Seniors</b></li>
                        </ul>
                        <ul>
                            <li>Monday</li>
                            <li>Tuesday, Thursday</li>
                            <li>Wednesday, Friday</li>
                        </ul>
                    </div>
                    <div class="button-sec" style="padding-left: 40px;">
                        <a href="#">
                            <button class="rounded-button">View More</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 d-flex align-items-center img-cont" style="background-image: url('{{ asset("assets/site/images/contact/contact_training_scedule-min.jpg") }}')">
                <div class="red-overlay"></div>
                <div class="col-md-12 pl-lg-5">
                    <p class="title text-white pb-3"><img style="height: 20px; position:relative;" class="img-fluid" src="{{ asset("assets/site/images/ball-white.svg") }}" alt="Ball">Shop</p>
                    <div class="text-cont">
                        <div class="col-md-7">
                            <p style="padding-left: 25px" class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam blanditiis culpa cupiditate.</p>
                        </div>
                    </div>
                    <div class="button-sec" style="padding-left: 40px;">
                        <a href="#">
                            <button class="rounded-button">View More</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 d-flex align-items-center img-cont" style="background-image: url('{{ asset("assets/site/images/contact/contact_working_hours-min.jpg") }}')">
                <div class="red-overlay"></div>
                <div class="col-md-12 pl-lg-5">
                    <p class="title text-white pb-3"><img style="height: 20px; position:relative;" class="img-fluid" src="{{ asset("assets/site/images/ball-white.svg") }}" alt="Ball">Working Hours</p>
                    <div class="text-cont">
                        <ul>
                            <li><b>Under 14y</b></li>
                            <li><b>Under 16y</b></li>
                            <li><b>Seniors</b></li>
                        </ul>
                        <ul>
                            <li>Monday</li>
                            <li>Tuesday, Thursday</li>
                            <li>Wednesday, Friday</li>
                        </ul>
                    </div>
                    <div class="button-sec" style="padding-left: 40px;">
                        <a href="#">
                            <button class="rounded-button">View More</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @push('head')
        <style>
            .header {
                padding-top: 0;
            }
            p{
                font-family: Roboto-Condensed-Regular, sans-serif;
            }
            .red-overlay{
                position: absolute;
                height: 100%;
                width: 100%;
                background-color: red;
                opacity: .35;
            }
            .text-cont{
                display: flex;
            }
            .text-cont li{
                color: white;
                list-style-type: none;
            }
            .img-cont{
                height: 300px;
                padding: 0;
            }
            .sticky + .content{
                padding-top: 68px;
            }
            .contact-section{
                background-color: #ebebeb;
            }
            .map{
                height: 100%;
                width: 100%;
                position: absolute;
            }
            .map iframe{
                width: 80%;
                height: 100%;
            }
            .contact-section .subtitle{
                color: #191919;
            }
            .main-section{
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
            .overlay-part{
                background-color: #ebebeb;
                padding: 30px;
                box-shadow: 3px 0 10px -1px grey;
            }
            .info{
                color: #161616;
            }
            .img-cont{
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }

            @media all and (max-width: 768px) {
                .main-section{
                    background: none;
                    display: block;
                    height: auto;
                }
                .overlay-part{
                    box-shadow: none;
                    padding: 0;
                }
            }
        </style>
    @endpush
@endsection
