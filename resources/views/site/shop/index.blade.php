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




    @push('head')
        <style>
            .header {
                padding-top: 0;
            }
            p{
                font-family: Roboto-Condensed-Regular, sans-serif;
            }
            .sticky + .content{
                padding-top: 70px;
            }
        </style>
    @endpush
@endsection
