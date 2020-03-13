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
    <div class="container pt-5 pb-5">
        <div class="row pb-4">
            <div class="col-md-12">
                <ul class="nav nav-tabs" style="border-bottom: 0">
                    <li><a class="active" data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                </ul>
            </div>
        </div>
        <div class="tab-content">

            <div id="home" class="tab-pane fade in active show">
               <div class="row">

                   @for($i = 0; $i < 10; $i++)
                       <div class="col-xl-3 col-md-6" style="padding: 5px">
                           <div class="main-box" style="background-image: url('{{ asset("assets/site/images/home/player.jpg") }}');">
                               <div class="name-box d-flex align-items-center">
                                   <p class="pl-5 m-0">#144 Name Surname</p>
                               </div>
                               <div class="age-box d-flex align-items-center">
                                   <p class="text-center m-0">Under 14</p>
                               </div>
                           </div>
                       </div>
                   @endfor

               </div>
            </div>

            <div id="menu1" class="tab-pane fade in">
                <div class="row">
                    @for($i = 0; $i < 5; $i++)
                        <div class="col-xl-3 col-md-6" style="padding: 5px">
                            <div class="main-box" style="background-image: url('{{ asset("assets/site/images/home/player.jpg") }}');">
                                <div class="name-box d-flex align-items-center">
                                    <p class="pl-5 m-0">#144 Name Surname</p>
                                </div>
                                <div class="age-box d-flex align-items-center">
                                    <p class="text-center m-0">Under 14</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div id="menu2" class="tab-pane fade in">
                <div class="row">
                    @for($i = 0; $i < 20; $i++)
                        <div class="col-xl-3 col-md-6" style="padding: 5px">
                            <div class="main-box" style="background-image: url('{{ asset("assets/site/images/home/player.jpg") }}');">
                                <div class="name-box d-flex align-items-center">
                                    <p class="pl-5 m-0">#144 Name Surname</p>
                                </div>
                                <div class="age-box d-flex align-items-center">
                                    <p class="text-center m-0">Under 14</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>

    @push("head")
        <style>
            .header {
                padding-top: 0;
            }
 parent
            .nav-tabs{
                background: #151515;
                border-radius: 10px;
                overflow: hidden;
            }
            .nav-tabs li{
                height: 40px;
                display: flex;
                align-items: center;
            }
            .nav-tabs a{
                padding: 8px 25px;
                text-decoration: none;
                color: white;
            }
            .nav-tabs .active{
                background: #9c1d24;
            }
            .tab-content .row{
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>
    @endpush
@endsection
