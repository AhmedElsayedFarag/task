@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Categories
                        <strong class="text-success">{{(isset($category))?"($category->name)":''}}</strong>
                        </h4>
                        <a href="{{route('admin.categories.create',(isset($category))?"cat_id=$category->id":'')}}"
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
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($d->name,3)}}</td>
                                            <td>
                                                @if(isset($category))
                                                <a href="{{route('admin.categories.options',$d->id)}}"
                                                   class="btn btn-info btn-sm"><i class="feather icon-eye"></i></a>
                                                @else
                                                    <a href="{{route('admin.categories.index',['cat_id'=>$d->id])}}"
                                                       class="btn btn-info btn-sm"><i class="feather icon-eye"></i></a>
                                                @endif
                                                <a href="{{route('admin.categories.edit',$d->id)}}"
                                                   class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></a>
                                                <a onclick="fireDeleteEvent({{$d->id}})" type="button"
                                                   class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                <form action="{{route('admin.categories.destroy',$d->id)}}" method="POST"
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
