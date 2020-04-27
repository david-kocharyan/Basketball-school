@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="">
                    <h2 class="m-b-0 m-t-0">{{$coach->full_name}}</h2>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="white-box text-center">
                                <img src="{{asset("uploads/coaches/$coach->image")}}" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6">
                            <h4 class="box-title m-t-40">Biography</h4>
                            <p class="col-md-11" style="word-wrap: break-word">{{$coach->bio}}</p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40">Certificate</h3>
                            <div id="gallery">
                                @foreach($coach->coachDoc as $key)
                                    <img src="{{asset("uploads/certificate/$key->image")}}"
                                         class="card img-responsive m-l-15"
                                         style="display: inline-block; width: 200px; height: 200px;">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        $(document).ready(function () {
            $("img").click(function () {
                var t = $(this).attr("src");
                $(".modal-body").html("<img src='" + t + "' class='modal-img img-responsive'>");
                $("#myModal").modal();
            });
        });
    </script>
@endpush






