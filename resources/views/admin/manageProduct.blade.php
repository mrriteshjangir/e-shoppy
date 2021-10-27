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
            <div class="tile">
                <form method="POST" action="{{url('admin/product/post')}}" enctype="multipart/form-data">
                    <div class="tile-body">
                        <div class="row">
                            @csrf
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">Product Name</label>
                                    <input class="form-control"  type="text" name="product_name" value="@if($product_name){{$product_name}}@else {{old('product_name')}}@endif" placeholder="Enter product name">
                                </div>
                                @error('product_name')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-4">
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
                                    <select class="form-control" name="category_id">
                                    @foreach($categories as $clist)
                                        <option value="{{$clist->id}}">{{$clist->category_title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Product Model</label>
                                    <input class="form-control" type="text" name="product_model" value="@if($product_model){{$product_model}}@else {{old('product_model')}}@endif" placeholder="Enter product model" />
                                </div>
                                @error('product_model')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Product Brand</label>
                                    <select class="form-control" name="brand_id">
                                    @foreach($brands as $blist)
                                        <option value="{{$blist->id}}">{{$blist->brand_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
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
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection