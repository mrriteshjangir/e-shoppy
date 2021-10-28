@extends('admin.layouts.layout')
@section('title') List Coupon @endsection
@section('active_coupon') active @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> List Coupon</h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <p>{{session('message')}}</a>.</p>
    </div>
    @endif
    <a href="{{url('admin/coupon/add')}}" class="btn btn-info mb-3">Add Coupon</a>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Code</th>
                                <th>Expiry</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php ($sr=1)
                        @foreach($data as $list)
                            <tr>
                                <td>{{$sr}}</td>
                                <td>{{$list->coupon_title}}</td>
                                <td>{{$list->coupon_code}}</td>
                                <td>{{$list->coupon_expiry}}</td>
                                <td>{{$list->coupon_details}}</td>
                                <td>
                                    @if($list->coupon_status==0)
                                    <a  href="{{url('admin/coupon/show')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Hide it.">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @else
                                    <a href="{{url('admin/coupon/hide')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Unhide it.">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    @endif
                                    <a href="{{url('admin/coupon/edit')}}/{{$list->id}}" class="text-decoration-none btn btn-info ml-2"
                                    data-toggle="tooltip" data-placement="top" title="Edit it.">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                    <a  href="{{url('admin/coupon/delete')}}/{{$list->id}}" class="text-decoration-none btn btn-danger ml-2"
                                    data-toggle="tooltip" data-placement="top" title="Delete it.">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @php ($sr++)
                        @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
@endsection
