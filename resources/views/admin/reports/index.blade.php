@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reports
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
                                        <th>Reporter</th>
                                        <th>Date</th>
                                        <th>Reason</th>
                                        <th>Text</th>
                                        <th>Item</th>
                                        <th>ReportedSeller</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($d->user?->name,3)}}</td>
                                            <td>{{$d->created_at->format('Y-m-d')}}</td>
                                            <td>{{$d->reason?->name}}</td>
                                            <td>{{$d->notes}}</td>
                                            <td><a target="_blank" href="{{'https://staging.aiishaii.com'.'/product/'.$d->ad_id}}">{{\Illuminate\Support\Str::words($d->ad?->title,3)}}</a></td>
                                            <td>{{\Illuminate\Support\Str::words($d->ad?->user?->name,3)}}</td>
                                            <td>{{str_replace('_',' ',$d->status)}}</td>
                                            <td>
                                                <a href="{{route('admin.reports.edit',$d->id)}}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                                <a onclick="fireDeleteEvent({{$d->id}})" type="button"
                                                   class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                <form action="{{route('admin.reports.destroy',$d->id)}}" method="POST"
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

@endsection
