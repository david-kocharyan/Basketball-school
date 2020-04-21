@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">{{$title}}</h3>
                <a href="{{$route."/create"}}" class="btn btn-success m-b-30"><i class="fas fa-plus"></i> Add
                    Album</a>

                {{--table--}}
                <div class="table-responsive">
                    <table id="datatable" class="display table table-hover table-striped nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th># Ordering</th>
                            <th>Album Name</th>
                            <th>Type</th>
                            <th>Options</th>
                        </tr>
                        </thead>

                        <tbody id="tablecontents">
                        @foreach($gallery as $key=>$val)
                            <tr class="row1" data-id="{{ $val->id }}">
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td class="text_{{ $val->id }}">{{$val->name}}</td>
                                <td>@if($val->type == 0)
                                        Academy
                                    @else
                                        Games
                                    @endif
                                </td>
                                <td>
                                    <a href="{{$route."/".$val->id}}" data-toggle="tooltip"
                                       data-placement="top" title="Show"
                                       class="btn btn-warning btn-circle tooltip-warning">
                                        <i class="fas fas fa-eye"></i>
                                    </a>

                                    <a href="{{$route."/".$val->id."/edit"}}" data-toggle="tooltip"
                                       data-placement="top" title="Edit" class="btn btn-info btn-circle tooltip-info">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form style="display: inline-block" action="{{ $route."/".$val->id }}"
                                          method="post">
                                        @csrf
                                        @method("DELETE")
                                        <a href="javascript:void(0);" class="delForm" data-id ="{{$val->id}}">
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
            var text = $('.text_'+id).html();

            swal({
                title: "Are you sure you want to delete the album?",
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
    <script src="{{asset('assets/js/jquery/dist/jquery-ui.min.js')}}"></script>
    <script>
        $('#datatable').DataTable({
            columnDefs: [
                {"orderable": false, "targets": [2, 3]},
            ],
            initComplete: function () {
                this.api().columns(2).every(function () {
                    var column = this;
                    var eachHeader = $(column.header())[0];
                    var headingVal = eachHeader.getAttribute("value");
                    var select = $('<select class="m-l-10"><option value="">' + 'All' + '</option></select>')
                        .appendTo($(column.header()))
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
            },
        });

        $( "#tablecontents" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];

            $('tr.row1').each(function(index,element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index+1
                });
            });

            $.ajax({
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ url('/admin/gallery/sortable') }}",
                data: {
                    order: order
                },
                success: function(response) {
                    if (response.status == "success") {
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            });
        }
    </script>
@endpush





