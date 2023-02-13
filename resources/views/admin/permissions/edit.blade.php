@extends('admin.layouts.master')
@section('content')

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal"
                                  action="{{route('admin.permissions.update', [$role->id])}}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Role</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required name="name" type="text" class="form-control"
                                                            value="{{$role->name}}">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 text-center">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Permissions</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-unstyled mb-0">
{{--                                                        <li class="d-inline-block mr-2">--}}
{{--                                                            <fieldset>--}}
{{--                                                                <div class="vs-checkbox-con vs-checkbox-success">--}}
{{--                                                                    <input type="checkbox" id="select-all" {{$check_all}}/>--}}
{{--                                                                    <span class="vs-checkbox vs-checkbox-lg">--}}
{{--                                                                            <span class="vs-checkbox--check">--}}
{{--                                                                                <i class="vs-icon feather icon-check"></i>--}}
{{--                                                                            </span>--}}
{{--                                                                        </span>--}}
{{--                                                                    <span class="">{{trans('sidebar.select_all')}}</span>--}}
{{--                                                                </div>--}}
{{--                                                            </fieldset>--}}
{{--                                                        </li>--}}
{{--                                                        <br>--}}
                                                        @foreach($permissions as $permission)
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-checkbox-con vs-checkbox-success">
                                                                        <input type="checkbox"
                                                                               name="permissions[]"
                                                                               {{in_array($permission->id,$role_permissions)? 'checked' : ''}}
                                                                               id="checkbox-{{$loop->iteration}}"
                                                                               value="{{$permission->id}}">
                                                                        <span class="vs-checkbox vs-checkbox-lg">
                                                                            <span class="vs-checkbox--check">
                                                                                <i class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                        <span class="">{{$permission->name}}</span>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <br>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CONTRACTS holder -->
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection
