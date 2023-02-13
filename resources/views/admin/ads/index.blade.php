@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ads
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
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Seller</th>
                                        <th>Status</th>
{{--                                        <th>Sold</th>--}}
{{--                                        <th>Buyer</th>--}}
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Post date</th>
                                        <th>Cover image</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($d->title,3)}}</td>
                                            <td>{{$d->price}}</td>
                                            <td>{{($d->user)?$d->user->first_name:''}}</td>
                                            <td>{{config('globals.ad_status')[$d->status]}}</td>
                                            <td>{{$d->category?->parent?->name}}</td>
                                            <td>{{$d->category?->name}}</td>
{{--                                            <td>{{($d->sold)?'Yes':'No'}}</td>--}}
{{--                                            <td>{{($d->buyer)?$d->buyer->first_name:''}}</td>--}}
                                            <td>{{$d->created_at->format('Y-m-d')}}</td>
                                            <td>
                                                <img src="{{asset($d->image)}}" class="img-thumbnail img-fluid circle" style="height: 50px">
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{'https://staging.aiishaii.com'.'/product/'.$d->id}}" class="btn btn-success btn-sm"><i class="feather icon-eye"></i></a>
{{--                                                <a href="{{env('FRONT_URL').'/product/'.$d->id}}" class="btn btn-success btn-sm"><i class="feather icon-eye"></i></a>--}}
                                                <a href="{{route('admin.ads.edit',$d->id)}}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                                <a onclick="fireDeleteEvent({{$d->id}})" type="button"
                                                   class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                <form action="{{route('admin.ads.destroy',$d->id)}}" method="POST"
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
