@extends('admin.layouts.layout')
@section('title') List Brand @endsection
@section('active_brand') active @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> List Brand</h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <p>{{session('message')}}</a>.</p>
    </div>
    @endif
    <a href="{{url('admin/brand/add')}}" class="btn btn-info mb-3">Add Brand</a>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php ($sr=1)
                        @foreach($data as $list)
                            <tr>
                                <td>{{$sr}}</td>
                                <td>{{$list->brand_name}}</td>
                                <!-- brand box size and look -->
                                <style>
                                    #brand-box{
                                        height:50px;
                                        border:1px solid grey;
                                        border-radius:5px;
                                    }
                                </style>
                                
                                <td><img src="{{asset('storage/brand/'.$list->brand_logo)}}" id="brand-box" alt="{{$list->brand_name}}"/></td>
                                <td>
                                    @if($list->brand_status==0)
                                    <a  href="{{url('admin/brand/show')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Hide it.">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @else
                                    <a href="{{url('admin/brand/hide')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Unhide it.">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    @endif
                                    <a href="{{url('admin/brand/edit')}}/{{$list->id}}" class="text-decoration-none btn btn-info ml-2"
                                    data-toggle="tooltip" data-placement="top" title="Edit it.">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                    <a  href="{{url('admin/brand/delete')}}/{{$list->id}}" class="text-decoration-none btn btn-danger ml-2"
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
