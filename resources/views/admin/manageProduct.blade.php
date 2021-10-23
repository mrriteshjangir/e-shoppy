@extends('admin.layouts.layout')
@if($id>0)
    @section('title') Edit Product @endsection
@else
    @section('title') Add Product @endsection
@endif
@section('active_product') active @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-3"></i>
            @if($id>0)
                Edit Product
            @else
                Add Product
            @endif
        </h1>
    </div>
</div>
<a href="{{url('admin/product/list')}}" class="btn btn-info mb-3">List Product</a>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{url('admin/product/post')}}">
            <div class="tile">
                <div class="tile-body">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Product Name</label>
                                <input class="form-control"  type="text" name="product_name" value="@if($product_name){{$product_name}}@else {{old('product_name')}}@endif" placeholder="Enter product name">
                            </div>
                            @error('product_name')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Product Slug</label>
                                <input class="form-control" type="text"  name="product_slug" value="@if($product_slug){{$product_slug}}@else {{old('product_slug')}}@endif" placeholder="Enter product slug">
                            </div>
                            @error('product_slug')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Product Image</label>
                                <input class="form-control " type="file"  style="padding:2px!important"  name="product_image" />
                            </div>
                            @error('product_image')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Product Category</label>
                                <input class="form-control " type="file" style="padding:2px!important"  name="product_image" />
                            </div>
                            @error('product_image')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Product Details</label>
                                <textarea class="form-control" type="text"  name="product_details" rows="4" placeholder="Enter product details">@if($product_details){{$product_details}}@else {{old('product_details')}}@endif</textarea>
                            </div>
                            @error('product_details')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <!-- usefull for edit & add new code -->
                        <input type="hidden" value="{{$id}}" name="id"/>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary mr-3" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                    </button>
                    <button class="btn btn-secondary" type="reset">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i></i>Reset
                    </button>
                </div>
            </div>
        </form>
    </div>



    
    <div class="col-md-12">
        <span class="bg-info rounded p-2 d-inilne h6 text-white">Add a Item 1</span>
        <form method="POST" action="{{url('admin/product-item/post')}}">
            <div class="tile mt-3">
                <div class="tile-body">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Product Name</label>
                                <input class="form-control"  type="text" name="product_name" value="@if($product_name){{$product_name}}@else {{old('product_name')}}@endif" placeholder="Enter product name">
                            </div>
                            <button class="btn btn-success" type="button" id="addItem">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="itemAll">
                
    </div>

    <script>

        var count=2;

        $("#addItem").click(function(){

            if(count<11)
            {
                var code='';

                code+='<div class="col-md-12" id="itemBox">';
                code+='<span class="bg-info rounded p-2 d-inilne h6 text-white">Add a Item '+count+'</span>';
                code+='<form method="POST" action="{{url('admin/product-item/post')}}">';
                code+='<div class="tile mt-3">';
                code+='<div class="tile-body">';
                code+='<div class="row">';
                code+='@csrf';
                code+='<div class="col-md-12">';
                code+='<div class="form-group">';
                code+='<label class="control-label">Product Name</label>';
                code+='<input class="form-control"  type="text" name="product_name" value="@if($product_name){{$product_name}}@else {{old('product_name')}}@endif" placeholder="Enter product name">';
                code+='</div>';
                code+='<button class="btn btn-danger" type="button" id="removeItem">-</button>';
                code+='</div>';
                code+='</div>';
                code+='</div>';
                code+='</div>';
                code+='</div>';
                code+='</div>';
               

                console.log(code);

                $('#itemAll').append(code);

                count++;
            }
            else
            {
                alert('Limit over.Max input fields allowed are 10');
            }        
        });

        $(document).on('click','#removeItem',function(){
            $(this).closest('#itemBox').remove();
            count--;
        });
        
    </script>
</div>
@endsection