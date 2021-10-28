@extends('admin.layouts.layout')
@section('title') List Item @endsection
@section('active_item') active @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list mr-1"></i> List Item</h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <p>{{session('message')}}</a>.</p>
    </div>
    @endif
    <a href="{{url('admin/item/add')}}" class="btn btn-info mb-3">Add Item</a>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Pricing</th>
                                <th>Quantity</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php ($sr=1)
                        @php ($i=0)
                        @foreach($data as $list)
                            <tr>
                                <td>{{$sr}}</td>
                                <td>{{$list->item_sku}}</td>
                                <td>
                                    <s class="text-danger">₹ {{$list->item_mrp}} /-</s> 
                                    <span class="text-success">₹ {{$list->item_price}} /-</span>
                                </td>
                                <td>{{$list->item_qty}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$list->id}}">
                                        More
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="title">Item Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p><b>Product Name :- </b> {{$list->product_name}}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><b>Category Name :- </b> {{$list->category_title}}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><b>SKU No. :- </b> {{$list->item_sku}}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><b>MRP :- </b> {{$list->item_mrp}}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><b>Price :- </b> {{$list->item_price}}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><b>Quantity :- </b> {{$list->item_qty}}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><b>Item Positon at :- </b> {{ucfirst($list->item_at)}}</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            @foreach(explode(',',$list->image_url) as $one)
                                                                <img src="{{asset('storage/item/'.$one)}}" style="height:100px"/>
                                                            @endforeach
                                                        </div>
                                                        @if($list->color_shade)
                                                        <div class="col-md-6">
                                                            <b>Color :</b>
                                                            <div style='height:30px;width:30px;border-radius:40px;background:{{$list->color_shade}}'></div>
                                                        </div>
                                                        @endif
                                                        @if($list->size_title)
                                                        <div class="col-md-6">
                                                            <p>
                                                                <b>Size Title :-</b>{{$list->size_title}}
                                                                <b class="ml-2">Size Value :-</b>{{$list->size_value}}
                                                                <b class="ml-2">Size Unit :-</b>{{$list->size_unit}}
                                                            </P>
                                                        </div>
                                                        @endif
                                                        @if($list->item_details)
                                                        <div class="col-md-12 mt-2">
                                                            <b>Details :- </b>
                                                            <p class="text-justify mt-2">{{$list->item_details}}</p>
                                                        </div>
                                                        @endif
                                                        @if($list->item_tech_speci)
                                                        <div class="col-md-12">
                                                            <b>Technical Specification :- </b> 
                                                            <p class="text-justify mt-2">{{$list->item_tech_speci}}</p>
                                                        </div>
                                                        @endif
                                                        @if($list->item_uses)
                                                        <div class="col-md-12">
                                                            <b>Uses :- </b>
                                                            <p class="text-justify mt-2">{{$list->item_uses}}</p>
                                                        </div>
                                                        @endif
                                                        @if($list->item_service)
                                                        <div class="col-md-12">
                                                            <p><b>Service Info :- </b> {{ucfirst($list->item_service)}}</p>
                                                        </div>
                                                        @endif
                                                        
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
                                    <form method="POST" action="{{url('admin/position/post')}}">
                                    @if($list->item_status==0)
                                    <a  href="{{url('admin/item/show')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Hide it.">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @else
                                    <a href="{{url('admin/item/hide')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Unhide it.">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    @endif
                                    <a href="{{url('admin/item/edit')}}/{{$list->id}}" class="text-decoration-none btn btn-info ml-2"
                                    data-toggle="tooltip" data-placement="top" title="Edit it.">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                    <a  href="{{url('admin/item/delete')}}/{{$list->id}}" class="text-decoration-none btn btn-danger ml-2"
                                    data-toggle="tooltip" data-placement="top" title="Delete it.">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    
                                    
                                        @csrf
                                        <input type="hidden" value="{{$list->id}}" name="id"/> 
                                        <select class='btn btn-dark ml-2' style="width:100px" name="item_at" id='item_at{{$list->id}}'>
                                            <option value="0">-: Change Position :-</option>
                                            <option value="normal" @if(($list->item_at)=='normal'){{'selected'}} @endif>Normal</option>
                                            <option value="slider" @if(($list->item_at)=='slider'){{'selected'}} @endif>Slider</option>
                                            <option value="top" @if(($list->item_at)=='top'){{'selected'}} @endif>Top</option>
                                        </select>
                                        <script>
                                            var select = document.getElementById('item_at{{$list->id}}');
                                            select.onchange = function(){
                                                this.form.submit();
                                            };
                                        </script>
                                    </form>
                                </td>
                            </tr>
                            @php ($sr++)
                            @php ($i++)
                        @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
@endsection