@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Activity Timeline</h4>
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
                                    <th>Action</th>
                                    <th>Date</th>
                                    <th>Item</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notifications as $notification)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{\App\Models\User::find($notification->causer_id)->name??''}}</td>
                                        <td>{{$notification->description}}</td>
                                        <td>{{$notification->created_at}}</td>
                                        <td>{{$notification->subject?->title??$notification->subject?->name}}</td>
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


    <!-- Ecommerce Pagination Starts -->
    <section id="ecommerce-pagination">
        <div class="row">
            <div class="col-sm-12 text-center">
                    {{ $notifications->links() }}
            </div>
        </div>
    </section>
    <!-- Ecommerce Pagination Ends -->

@endsection
