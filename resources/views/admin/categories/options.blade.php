@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category Options
                            <strong class="text-success">{{(isset($category))?"($category->name)":''}}</strong>
                        </h4>
                        {{--                        <a href="{{route('admin.categories.create',(isset($category))?"cat_id=$category->id":'')}}"--}}
                        {{--                           class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>--}}
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($options as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($d->name,3)}}</td>
                                            <td>
                                                @if(in_array($d->id,$cat_options))
                                                    @php $r =  $cat_options_relation->where('option_id',$d->id)->first();  @endphp
                                                    {{(isset($r) && $r->required)?'Required':'Not required'}}
                                                @endif
                                            </td>
                                            <td>
                                                @if(!in_array($d->id,$cat_options))
                                                    <a href="{{route('admin.categories.assignOption',[$category->id,$d->id])}}"
                                                       class="btn btn-success btn-sm"><i
                                                            class="feather icon-plus-circle"></i> Add</a>
                                                @endif
                                                @if(in_array($d->id,$cat_options))
                                                    @if(isset($r) && $r->required)
                                                        <a href="{{route('admin.categories.assignOption',[$category->id,$d->id,0])}}"
                                                           class="btn btn-success btn-sm"><i
                                                                class="feather icon-plus-circle"></i> Not required</a>
                                                    @else
                                                        <a href="{{route('admin.categories.assignOption',[$category->id,$d->id,1])}}"
                                                           class="btn btn-success btn-sm"><i
                                                                class="feather icon-plus-circle"></i> Required</a>
                                                    @endif
                                                    <a onclick="fireDeleteEvent({{$d->id}})" type="button"
                                                       class="btn btn-danger btn-sm"><i class="feather icon-trash"></i>
                                                        Remove</a>
                                                    <form
                                                        action="{{route('admin.categories.removeOption',[$category->id,$d->id])}}"
                                                        method="POST"
                                                        id="form-{{$d->id}}">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    </form>
                                            @endif
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
