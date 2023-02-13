@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Ad</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.ads.update',$ad->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                {{method_field('PUT')}}
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Title</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="title" value="{{$ad->title}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Description</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea required rows="5" class="form-control" name="description">{{$ad->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Featured</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" {{($ad->featured)?'checked':''}} name="featured"  id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">Featured</label>
                                                        </div>
                                                    </fieldset>
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

