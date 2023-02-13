@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$user->name}}
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Full name</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>{{str_replace('_',' ',$user->roles->first()?->name)??''}}</td>
                                    </tr>
                                    <tr>
                                        <td>Creation date</td>
                                        <td>{{$user->created_at->format('Y-m-d')}}</td>
                                    </tr>
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

