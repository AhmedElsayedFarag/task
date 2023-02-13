@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new user</h4>
                    </div>
                    <div class="card-content">

                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.users.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>First name</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="first_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Last name</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="last_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Email</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="email" class="form-control" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Phone</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Roles</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select required class="form-control" name="role">
                                                        <option selected disabled value="">Choose role</option>
                                                        @foreach(\Spatie\Permission\Models\Role::where('name','!=','super_admin')->get() as $role)
                                                            <option value="{{$role->id}}">{{str_replace('_',' ',$role->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

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

