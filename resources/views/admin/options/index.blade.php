@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Options
                        </h4>
                        <a href="{{route('admin.options.create')}}"
                           class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>Type</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($d->name,3)}}</td>
                                            <td>{{str_replace('_',' ',$d->input_type)}}</td>
                                            <td>
                                                @if($d->input_type != 'text')
                                                    <a type="button" data-toggle="modal"
                                                       data-target="#inlineForm{{$d->id}}"
                                                       title="Add value"
                                                       class="btn btn-primary btn-sm"><i
                                                            class="feather icon-plus-square"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade text-left" id="inlineForm{{$d->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                         aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Add
                                                                        value
                                                                        for {{$d->name}}</h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form class="form form-horizontal"
                                                                      action="{{route('admin.options.addValue',$d->id)}}"
                                                                      method="POST" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <div class="modal-body">
                                                                        @foreach(config('globals.locales') as $locale)
                                                                            <div class="col-12">
                                                                                <div class="form-group row">
                                                                                    <div class="col-md-4">
                                                                                        <span>Name {{$locale}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <input required type="text"
                                                                                               class="form-control game_name"
                                                                                               name="name[{{$locale}}]">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <div class="col-md-4">
                                                                                    <span>Icon</span>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <input type="file"
                                                                                           class="form-control"
                                                                                           name="icon">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary"
                                                                        >Save
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a type="button" data-toggle="modal"
                                                       data-target="#values{{$d->id}}"
                                                       title="View values"
                                                       class="btn btn-primary btn-sm"><i
                                                            class="feather icon-eye"></i></a>
                                                    <div class="modal fade text-left" id="values{{$d->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                         aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">
                                                                        values
                                                                        for {{$d->name}}</h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered zero-configuration">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>name</th>
                                                                                <th>Options</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($d->values as $v)
                                                                                <tr>
                                                                                    <td>{{$loop->iteration}}</td>
                                                                                    <td>{{\Illuminate\Support\Str::words($v->name,3)}}</td>
                                                                                    <td>
{{--                                                                                        <a href="{{route('admin.categories.edit',$d->id)}}"--}}
{{--                                                                                           class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></a>--}}
                                                                                        <a onclick="fireDeleteEvent({{$v->id}})" type="button"
                                                                                           class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                                                        <form action="{{route('admin.options.deleteValue',$v->id)}}" method="POST"
                                                                                              id="form-{{$v->id}}">
                                                                                            {{csrf_field()}}
                                                                                            {{method_field('DELETE')}}
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
                                                    </div>

                                                @endif
                                                <a href="{{route('admin.options.edit',$d->id)}}" title="Edit"
                                                   data-toggle="tooltip"
                                                   class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></a>
                                                <a onclick="fireDeleteEvent({{$d->id}})" type="button" title="Delete"
                                                   data-toggle="tooltip"
                                                   class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                <form action="{{route('admin.options.destroy',$d->id)}}" method="POST"
                                                      id="form-{{$d->id}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
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
            </div>
        </div>
    </section>
@endsection
@section('script')
    {{--        <script>--}}
    {{--            $(document).ready(function () {--}}
    {{--                $('.zero-configuration1').DataTable({--}}
    {{--                    dom: 'Bfrtip',--}}
    {{--                    lengthMenu: [[25, 50, 100, 150], [25, 50, 100, 150]],--}}

    {{--                    select: {--}}
    {{--                        style: 'multi',--}}
    {{--                    },--}}
    {{--                    buttons: [--}}
    {{--                        'csv', 'pdf', 'print',--}}

    {{--                    ]--}}
    {{--                });--}}
    {{--            });--}}

    {{--        </script>--}}
@endsection
