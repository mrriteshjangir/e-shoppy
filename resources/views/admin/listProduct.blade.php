@extends('admin.layouts.layout')
@section('title') List Product @endsection
@section('active_product') active @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> List product</h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <p>{{session('message')}}</a>.</p>
    </div>
    @endif
    <a href="{{url('admin/product/add')}}" class="btn btn-info mb-3">Add Product</a>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php ($sr=1)
                        @foreach($data as $list)
                            <tr>
                                <td>{{$sr}}</td>
                                <td>{{$list->product_name}}</td>
                                <td>{{$list->product_slug}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$list->id}}">
                                        More
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="title">Product Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p><b>Name :- </b> {{$list->product_name}}</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p><b>Slug :- </b> {{$list->product_slug}}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><b>Brand Name :- </b> {{$list->brand_name}}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><b>Category :- </b> {{$list->category_title}}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><b>Model Name :- </b> {{ucfirst($list->product_model)}}</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <b>Product Image :- </b>
                                                            <img src="{{asset('storage/product/'.$list->product_image)}}" style="height:100px"/>
                                                        </div>                                                      
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($list->product_status==0)
                                    <a  href="{{url('admin/product/show')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Hide it.">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @else
                                    <a href="{{url('admin/product/hide')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Unhide it.">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    @endif
                                    <a href="{{url('admin/product/edit')}}/{{$list->id}}" class="text-decoration-none btn btn-info ml-2"
                                    data-toggle="tooltip" data-placement="top" title="Edit it.">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                    <a  href="{{url('admin/product/delete')}}/{{$list->id}}" class="text-decoration-none btn btn-danger ml-2"
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
