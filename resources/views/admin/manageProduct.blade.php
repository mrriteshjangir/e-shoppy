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
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Product Name</label>
                            <input class="form-control"  type="text" name="product_name" value="@if($product_name){{$product_name}}@else {{old('product_name')}}@endif" placeholder="Enter product name">
                        </div>
                        @error('product_name')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Product Slug</label>
                            <input class="form-control" type="text"  name="product_slug" value="@if($product_slug){{$product_slug}}@else {{old('product_slug')}}@endif" placeholder="Enter product slug">
                        </div>
                        @error('product_slug')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Product Details</label>
                            <textarea class="form-control" type="text"  name="product_details" rows="4" placeholder="Enter product details">@if($product_details){{$product_details}}@else {{old('product_details')}}@endif</textarea>
                        </div>
                        @error('product_details')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror

                        <!-- usefull for edit & add new code -->
                        <input type="hidden" value="{{$id}}" name="id"/>
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
</div>
@endsection