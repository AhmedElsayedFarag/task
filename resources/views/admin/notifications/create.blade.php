@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Notification</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.notifications.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Title</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="title" placeholder="Title">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Body</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="5" name="body" placeholder="Body"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>users</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-control select2" name="users[]"  required multiple="multiple">
                                                        <option value="" disabled>Choose User</option>
                                                        <option value="all">All</option>
                                                        <option value="all_app_users">All App Users</option>
                                                        <option value="all_admins">All Admins</option>
                                                        @foreach(\App\Models\User::all() as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
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
