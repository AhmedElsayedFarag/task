@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Permissions</h4>
{{--                        <a href="{{route('admin.permissions.create')}}" class="btn btn-primary pull-right"><i--}}
{{--                                class="feather icon-plus-square"></i> {{trans('sidebar.add')}}</a>--}}
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{str_replace('_',' ',$role->name)??''}}</td>
                                            <td>
                                                @if(!($role->id == 1))
                                                    <a href="{{route('admin.permissions.edit',[$role->id])}}"
                                                       class="btn btn-warning btn-sm"
                                                    ><i class="feather icon-edit"></i></a>
                                                @endif
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
