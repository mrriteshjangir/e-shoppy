@extends('admin.layouts.layout')
@if($id>0)
    @section('title') Edit Item @endsection
@else
    @section('title') Add Item @endsection
@endif
@section('active_product') active @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-1"></i>
            @if($id>0)
                Edit Item
            @else
                Add Item
            @endif
        </h1>
    </div>
</div>

<a href="{{url('admin/item/list')}}" class="btn btn-info mb-3">List Items</a>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form method="POST" action="{{url('admin/item/post')}}" enctype="multipart/form-data">
                <div class="tile-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Select Product :- </label>
                                <select class="form-control" type='number' name="product_id">
                                    @foreach($products as $plist)
                                        <option value="{{$plist->id}}">{{$plist->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Item SKU</label>
                                <input class="form-control" type="text" name="item_sku"/>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Item Images</label>
                                <input class="form-control" style="padding:2px!important"  type="file" name="image_url[]" multiple/>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Item MRP</label>
                                <input class="form-control" type="number" name="item_mrp" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Item Price</label>
                                <input class="form-control" type="number" name="item_price" />
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Item Quantity</label>
                                <input class="form-control" type="number" name="item_qty" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Item Color</label>
                                <select class="form-control" type='number' name="color_id">
                                    <option value="0">none</option>
                                    @foreach($colors as $clist)
                                        <option value="{{$clist->id}}" style="background:{{$clist->color_shade}}">{{$clist->color_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Item Size</label>
                                <select class="form-control"  name="size_id">
                                    <option value="0">none</option>
                                    @foreach($sizes as $clist)
                                        <option value="{{$clist->id}}">{{$clist->size_title}} -- {{$clist->size_value}} -- {{$clist->size_unit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Item Details</label>
                                <textarea class="form-control" type="text"  name="item_details" rows="4" placeholder="Enter item details">@if($item_details){{$item_details}}@else {{old('item_details')}}@endif</textarea>
                            </div>
                            @error('item_details')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Item Keywords</label>
                                <textarea class="form-control" type="text"  name="item_keywords" rows="4" placeholder="Enter item keywords">@if($item_keywords){{$item_keywords}}@else {{old('item_keywords')}}@endif</textarea>
                            </div>
                            @error('item_keywords')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Item Technical Specification</label>
                                <textarea class="form-control" type="text"  name="item_tech_speci" rows="4" placeholder="Enter item Technical Specification">@if($item_tech_speci){{$item_tech_speci}}@else {{old('item_tech_speci')}}@endif</textarea>
                            </div>
                            @error('item_tech_speci')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Item Uses</label>
                                <textarea class="form-control" type="text"  name="item_uses" rows="4" placeholder="Enter item uses">@if($item_uses){{$item_uses}}@else {{old('item_uses')}}@endif</textarea>
                            </div>
                            @error('item_uses')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Item Service Type</label>
                                <select class="form-control" name="item_service_type" onchange="hideMe(this)">
                                    <option value="none">None</option>
                                    <option value="warranty">Warranty is covered</option>
                                    <option value="gurranty">Gurranty is covered</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Service Duration</label>
                                <input class="form-control services" type="number" name="service_duration" disabled/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Service In</label>
                                <select class="form-control services" name="service_in" disabled>
                                    <option value="Days">Days</option>
                                    <option value="Months">Months</option>
                                    <option value="Years">Years</option>
                                </select>
                            </div>
                        </div>

                    </div>
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
            </form>
        </div>
    </div>
</div>

<script>
    function hideMe(n){
        var ab=document.getElementsByClassName('services');

        for(i=0;i<ab.length;i++)
        {
            if(n.value=='none')
            {
                ab[i].setAttribute('disabled','true');
            }
            else
            {
                ab[i].removeAttribute('disabled','false');
            }
        }
    }
</script>
@endsection