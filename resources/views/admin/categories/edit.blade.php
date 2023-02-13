@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit category <strong class="text-danger">({{$data->name}})</strong></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.categories.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                {{method_field('put')}}
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        @foreach(config('globals.locales') as $locale)
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name {{$locale}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="name[{{$locale}}]" value="{{$data->translate($locale)->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Image</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <img src="{{asset($data->image)}}" class="img-thumbnail img-fluid" style="max-height: 200px">
                                                    <input type="file" class="form-control" name="image">
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

