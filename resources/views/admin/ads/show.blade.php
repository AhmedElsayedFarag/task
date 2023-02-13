@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$ad->title}}
                        </h4>
                        {{--                        <a href="{{route('admin.categories.create',(isset($category))?"cat_id=$category->id":'')}}"--}}
                        {{--                           class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>--}}
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <td>Name</td>
                                        <td>Value</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
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
