@extends('admin.layouts.master')
@section('content')

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('sidebar.add_new_permission')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.permissions.store')}}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{trans('sidebar.name')}}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required name="name" type="text" class="form-control"
                                                           placeholder="{{trans('sidebar.name')}}" value="{{old('name')}}">
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
                                                    <span>{{trans('sidebar.permissions')}}: </span>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-checkbox-con vs-checkbox-success">
                                                                    <input type="checkbox" id="select-all"/>
                                                                    <span class="vs-checkbox vs-checkbox-lg">
                                                                            <span class="vs-checkbox--check">
                                                                                <i class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                    <span class="">{{trans('sidebar.select_all')}}</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <br>
                                                        @foreach($permissions as $permission)
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-checkbox-con vs-checkbox-success">
                                                                        <input type="checkbox"
                                                                               name="permissions[]"
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
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">{{trans('sidebar.save')}}</button>
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
<script>
    $('#select-all').change(function() {
        if($(this).is(":checked")) {
            $('input').prop('checked', true);
        }else {
            $('input').prop('checked', false);
        }
    });
</script>
@endsection
