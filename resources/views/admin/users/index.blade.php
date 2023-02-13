@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users
                        </h4>
                        <a href="{{route('admin.users.create')}}"
                           class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <form id="my-form" method="post" action="{{route('admin.users.bulk')}}">

                                <div class="table-responsive">
                                    @csrf
                                    <table class="table table-striped table-bordered zero-configuration1">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            {{--                                            <th>Image</th>--}}
                                            <th>join date</th>
                                            <th>Blocked</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $d)
                                            @if($d->roles->first()?->name != 'super_admin')
                                                <tr>
                                                    <td></td>
                                                    <td>{{$d->id}}</td>
                                                    <td>{{\Illuminate\Support\Str::words($d->name,3)}}</td>
                                                    <td>{{$d->email}}</td>
                                                    <td>{{$d->phone}}</td>
                                                    <td>{{str_replace('_',' ',$d->roles->first()?->name)??''}}</td>
                                                    {{--                                                <td><img src="{{asset($d->image)}}"--}}
                                                    {{--                                                         class="img-thumbnail img-fluid circle" style="height: 30px">--}}
                                                    {{--                                                </td>--}}
                                                    <td>{{$d->created_at->format('Y-m-d')}}</td>
                                                    <td>{{($d->blocked==0)?'No':'Yes'}}</td>
                                                    <td>
                                                        <a href="{{route('admin.users.show',$d->id)}}"
                                                           class="btn btn-success btn-sm"><i
                                                                class="feather icon-eye"></i></a>
                                                        <a href="{{route('admin.users.edit',$d->id)}}"
                                                           class="btn btn-primary btn-sm"><i
                                                                class="feather icon-edit"></i></a>
                                                        <a href="{{route('admin.users.block',$d->id)}}"
                                                           class="btn {{($d->blocked==0)?'btn-danger':'btn-success'}} btn-sm"><i
                                                                class="feather icon-slash"></i></a>
                                                        <a onclick="fireDeleteEvent({{$d->id}})" type="button"
                                                           class="btn btn-danger btn-sm"><i
                                                                class="feather icon-trash"></i></a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button type="button" onclick="bulkAction('delete')" id="delete-btn"
                                            class="btn btn-danger">Delete Selected
                                    </button>
                                    <button type="button" onclick="bulkAction('block')" id="delete-btn"
                                            class="btn btn-warning">Block Selected
                                    </button>
                                    <button type="button" onclick="bulkAction('unblock')" id="delete-btn"
                                            class="btn btn-primary">Unblock Selected
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($data as $d)
        <form action="{{route('admin.users.destroy',$d->id)}}" method="POST"
              id="form-{{$d->id}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
        </form>
    @endforeach
@endsection
@section('script')
    <script>
        // $(document).ready(function () {


        function bulkAction(action) {
            $('#my-form').append(
                $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'type')
                    .val(action)
            );
            submitForm();
        }


        function submitForm() {
            var form = $('#my-form');
            // var rows_selected = table.column(0).checkboxes.selected();
            var rows_selected = table.rows('.selected').data();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function (index, rowId) {
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'id[]')
                        .val(rowId[1])
                );
            });
            form.submit();
        }

        var table = $('.zero-configuration1').DataTable({
            'dom': 'Bfrtip',
            'columnDefs': [
                {
                    'targets': 0,
                    'className': 'select-checkbox',
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            // lengthMenu: [[25, 50, 100, 150], [25, 50, 100, 150]],

            'select': {
                'style': 'multi',
                'selector': 'td:first-child'
            },
            'buttons': [
                'csv', 'pdf', 'print',

            ],
            'order': [[1, 'asc']]
        });

        // });


    </script>
@endsection
