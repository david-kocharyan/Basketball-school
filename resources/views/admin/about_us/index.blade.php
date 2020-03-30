@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">{{$title}}</h3>
                @if(count($about) < 1 )
                    <a href="{{$route."/create"}}" class="btn btn-success m-b-30"><i class="fas fa-plus"></i> Add About
                        Us Info</a>
                @endif

                {{--table--}}
                <div class="table-responsive">
                    <table id="datatable" class="display table table-hover table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Story</th>
                            <th>Why Cilicia</th>
                            <th>Mission</th>
                            <th>Mission list</th>
                            <th>Option</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($about as $key => $val)
                            <tr>
                                <td>{{$val->story}}</td>
                                <td>{{$val->why}}</td>
                                <td>{{$val->mission}}</td>
                                <td>
                                    <ul>
                                        @foreach(json_decode($val->mission_list) as $bin)
                                            <li>
                                                <strong> {{$bin->mission_list_title}}</strong>
                                                <p>{{$bin->mission_list_text}}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{$route."/".$val->id."/edit"}}" data-toggle="tooltip"
                                       data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form
                                        onsubmit="if(confirm('Do You Really Want To Delete The Abou Us Info?') == false) return false;"
                                        style="display: inline-block" action="{{ $route."/".$val->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <a href="javascript:void(0)">
                                            <button data-toggle="tooltip"
                                                    data-placement="top" title="Delete"
                                                    class="btn btn-danger btn-circle tooltip-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-datatable')
    <script>
        $('#datatable').DataTable();
    </script>
@endpush




