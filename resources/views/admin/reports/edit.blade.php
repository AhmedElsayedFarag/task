@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update status</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.reports.update',$data->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                {{method_field('PUT')}}
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>status</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select required class="form-control" name="status">
                                                        <option value="new" {{($data->status == 'new')?'selected':''}}>New</option>
                                                        <option value="pending_feedback" {{($data->status == 'pending_feedback')?'selected':''}}>Pending feedback</option>
                                                        <option value="resolved" {{($data->status == 'resolved')?'selected':''}}>Resolved</option>
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

