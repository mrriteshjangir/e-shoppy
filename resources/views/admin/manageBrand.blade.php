@extends('admin.layouts.layout')
@if($id>0)
    @section('title') Edit Brand @endsection
@else
    @section('title') Add Brand @endsection
@endif
@section('active_brand') active @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-3"></i>
            @if($id>0)
                Edit Brand
            @else
                Add Brand
            @endif
        </h1>
    </div>
</div>
<a href="{{url('admin/brand/list')}}" class="btn btn-info mb-3">List Brand</a>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{url('admin/brand/post')}}" enctype="multipart/form-data">
            <div class="tile">
                <div class="tile-body">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Brand Name</label>
                            <input class="form-control"  type="text" name="brand_name" value="@if($brand_name){{$brand_name}}@else {{old('brand_name')}}@endif" placeholder="Enter brand name">
                        </div>
                        @error('brand_name')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Brand Logo</label>
                            <input class="form-control" onchange="pickbrand(this)"  type="file" name="brand_logo" >
                        </div>
                        @error('brand_logo')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <!-- brand box size and look -->
                        <style>
                            #brand-box{
                                height:50px;
                                border:1px solid grey;
                                border-radius:5px;
                            }
                        </style>
                        
                        <!-- brand shade dispaly box -->
                        @if($id>0)
                        
                        <img id='brand-box' src="@if($brand_logo){{asset('storage/media/brand/'.$brand_logo)}}@else{{asset('storage/media/brand/'.old('brand_logo'))}}@endif" />
                        @endif

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