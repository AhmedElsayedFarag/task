@extends('admin.layouts.master')
@section('content')
    <section id="statistics-card">
        <div class="row">
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1" style="cursor: unset">
                                <div class="avatar-content">
                                    <i class="feather icon-trending-up text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\App\Models\Ad::where('status',1)->count()}}</h2>
                            <p class="mb-0 line-ellipsis">Active Ads</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-success p-50 m-0 mb-1" style="cursor: unset">
                                <div class="avatar-content">
                                    <i class="feather icon-tag text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\App\Models\Ad::where('sold',1)->count()}}</h2>
                            <p class="mb-0 line-ellipsis">Sold Ads</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-warning p-50 m-0 mb-1" style="cursor: unset">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\App\Models\User::count()}}</h2>
                            <p class="mb-0 line-ellipsis">Users</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1" style="cursor: unset">
                                <div class="avatar-content">
                                    <i class="feather icon-shopping-bag text-danger font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\App\Models\Category::count()}}</h2>
                            <p class="mb-0 line-ellipsis">Categories</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-primary p-50 m-0 mb-1" style="cursor: unset">
                                <div class="avatar-content">
                                    <i class="feather icon-eye text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\App\Models\AdView::count()}}</h2>
                            <p class="mb-0 line-ellipsis">Views</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-success p-50 m-0 mb-1" style="cursor: unset">
                                <div class="avatar-content">
                                    <i class="feather icon-award text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\App\Models\UserRating::count()}}</h2>
                            <p class="mb-0 line-ellipsis">Reviews</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
