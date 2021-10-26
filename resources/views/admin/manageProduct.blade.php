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
<form method="POST" action="{{url('admin/product/post')}}" enctype="multipart/form-data">
<a href="{{url('admin/product/list')}}" class="btn btn-info mb-3">List Product</a>
<div class="row">
    <div class="col-md-12">
            <div class="tile">
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
            </div>
        
    </div>



    @php 
        $item_count=1;
    @endphp

    @foreach($items as $key=>$val)
        @php 
            $ItemsArr=(array)$val;
        @endphp
    
    <input type="hidden" name="itemId[]" value="{{$ItemsArr['id']}}">
    <div class="col-md-12">
        <span class="bg-info rounded p-2 d-inilne h6 text-white">Add a Item 1</span>
            <div class="tile mt-3">
                <div class="tile-body">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Item Images</label>
                                        <input id="attr_image" class="form-control" style="padding:2px!important"  type="file" name="attr_image[]"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Item SKU</label>
                                        <input class="form-control " type="text" name="sku[]" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Item Price</label>
                                        <input class="form-control " type="number" name="price[]" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Item Quantity</label>
                                        <input class="form-control " type="number" name="qty[]" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Item Color</label>
                                        <select class="form-control" type='number' name="color[]">
                                        <option value="null">none</option>
                                        @foreach($colors as $clist)
                                            <option value="{{$clist->id}}">{{$clist->color_title}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Item Size</label>
                                        <select class="form-control"  name="size[]">
                                        <option value="null">none</option>
                                        @foreach($sizes as $clist)
                                            <option value="{{$clist->id}}">{{$clist->size_title}} -- {{$clist->size_unit}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{$id}}" name="id"/>
                            
                            <div class="tile-footer">
                                
                                <button class="btn btn-success" type="button" id="addItem">
                                    <i class="fa fa-fw fa-lg fa-plus"></i></i>Add More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row" id="itemAll">
            
</div>

<div class="row">
    <div class="col-md-12">
       <div class=" tile mt-3">
       <div class="tile-footer">
                    <button class="btn btn-primary mr-3" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                    </button>
                    <button class="btn btn-secondary" type="reset">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i></i>Reset
                    </button>
                </div>
        </div>
</div>
</div>   
</form>
    <script>

        var count=2;

        $("#addItem").click(function(){

            if(count<11)
            {
                var code='';

                code+='<input type="hidden" name="itemId[]" ><div class="col-md-12" id="itemBox">';
                code+='<span class="bg-info rounded p-2 d-inilne h6 text-white">Add a Item '+count+'</span>';
                code+='<div class="tile mt-3">';
                code+='<div class="tile-body">';
                code+='<div class="row">';
                code+='@csrf';
                code+='<div class="col-md-12">';
                code+='<div class="row">';
                code+='<div class="col-md-4">';
                code+='<div class="form-group">';
                code+='<label class="control-label">Item Images</label>';
                code+='<input class="form-control " type="file" style="padding:2px!important"  name="attr_image[]" />';
                code+='</div>';
                code+='</div>';
                code+='<div class="col-md-4">';
                code+='<div class="form-group">';
                code+='<label class="control-label">Item SKU</label>';
                code+='<input class="form-control " type="text" name="sku[]" />';
                code+='</div>';
                code+='</div>';
                code+='<div class="col-md-4">';
                code+='<div class="form-group">';
                code+='<label class="control-label">Item Price</label>';
                code+='<input class="form-control " type="number" name="price[]" />';
                code+='</div>';
                code+='</div>';
                code+='<div class="col-md-4">';
                code+='<div class="form-group">';
                code+='<label class="control-label">Item Quantity</label>';
                code+='<input class="form-control " type="number" name="qty[]" />';
                code+='</div>';
                code+='</div>';
                code+='<div class="col-md-4">';
                code+='<div class="form-group">';
                code+='<label class="control-label">Item Color</label>';
                code+='<select class="form-control"  name="color[]">';
                code+='<option value="null">none</option>@foreach($colors as $clist)<option value="{{$clist->id}}">{{$clist->color_title}}</option>@endforeach';
                code+='</select>';
                code+='</div>';
                code+='</div>';
                code+='<div class="col-md-4">';
                code+='<div class="form-group">';
                code+='<label class="control-label">Item Size</label>';
                code+='<select class="form-control"  name="size[]">';
                code+='<option value="null">none</option>@foreach($sizes as $clist)<option value="{{$clist->id}}">{{$clist->size_title}} -- {{$clist->size_unit}}</option>@endforeach';
                code+='</select>';
                code+='</div>';
                code+='</div>';
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