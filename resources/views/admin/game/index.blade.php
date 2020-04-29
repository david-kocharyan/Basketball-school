@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">{{$title}}</h3>
                <a href="{{$route."/create"}}" class="btn btn-success m-b-30"><i class="fas fa-plus"></i> Add New
                    Game</a>

                {{--table--}}
                <div class="table-responsive">
                    <table id="datatable" class="display table table-hover table-striped nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Club 1</th>
                            <th>Club 2</th>
                            <th>Competition</th>
                            <th>Type</th>
                            <th>Venues</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($games as $key=>$val)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$val->club[0]->name}}</td>
                                <td>{{$val->club[1]->name}}</td>
                                <td>{{$val->tournament}}</td>
                                <td>{{$val->type}}</td>
                                <td>{{$val->center->name}}</td>
                                <td>{{$val->date}}</td>
                                <td>{{Carbon\Carbon::parse($val->time)->format('H:i')}}</td>
                                <td style="font-weight: bold; @if($val->status == 1)
                                    color: green;
                                @else
                                    color: red;
                                @endif">
                                    @if($val->status == 1)
                                        Finished
                                    @else
                                        To Play
                                    @endif
                                </td>
                                <td>
                                    <a href="{{$route."/".$val->id."/edit"}}" data-toggle="tooltip"
                                       data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    @if($val->status == 1)
                                        <a href="{{"/admin/game-finish/edit/".$val->id}}" data-toggle="tooltip"
                                           data-placement="top" title="Edit Finished Game"
                                           class="btn btn-primary btn-circle tooltip-primary">
                                            <i class="fas fa-hourglass-end"></i>
                                        </a>
                                    @else
                                        <a href="{{"/admin/game-finish/".$val->id}}" data-toggle="tooltip"
                                           data-placement="top" title="Finish Game"
                                           class="btn btn-warning btn-circle tooltip-warning">
                                            <i class="fas fa-hourglass-end"></i>
                                        </a>
                                    @endif

                                    <form style="display: inline-block" action="{{ $route."/".$val->id }}"
                                          method="post" id="work-for-form">
                                        @csrf
                                        @method("DELETE")
                                        <a href="javascript:void(0);" class="delForm" data-id="{{$val->id}}">
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


@push('custom-style')
    <style>
        .swal-modal {
            width: 660px !important;
        }
    </style>
@endpush

@push('custom-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delForm').on('click', function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            var text = $('.text_' + id).html();

            swal({
                title: "Are you sure you want to delete the game?",
                text: text,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $(this).parent().submit();
                } else {
                    swal.close();
                }
            });
        })
    </script>
@endpush

@push('custom-datatable')
    <script>
        $('#datatable').DataTable({
            bSort: false,
            initComplete: function () {
                this.api().columns([6,8]).every(function (i) {
                    var column = this;
                    var select = $('<select class="select form-control"><option value="">All</option></select>')
                        .appendTo($(column.header()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    </script>
@endpush




