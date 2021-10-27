@extends('admin.layouts.layout')
@if($id>0)
    @section('title') Edit Size @endsection
@else
    @section('title') Add Size @endsection
@endif
@section('active_size') active @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-3"></i>
            @if($id>0)
                Edit Size
            @else
                Add Size
            @endif
        </h1>
    </div>
</div>
<a href="{{url('admin/size/list')}}" class="btn btn-info mb-3">List Size</a>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{url('admin/size/post')}}">
            <div class="tile">
                <div class="tile-body">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Size Title</label>
                            <input class="form-control"  type="text" name="size_title" value="@if($size_title){{$size_title}}@else {{old('size_title')}}@endif" placeholder="Enter size title">
                        </div>
                        @error('size_title')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label class="control-label">Size Value</label>
                            <input class="form-control"  type="text" name="size_value" value="@if($size_value){{$size_value}}@else {{old('size_value')}}@endif" placeholder="Enter size value">
                        </div>
                        @error('size_value')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label class="control-label">Size Unit</label>
                            <input class="form-control"  type="text" name="size_unit" value="@if($size_unit){{$size_unit}}@else {{old('size_unit')}}@endif" placeholder="Enter size unit">
                        </div>
                
                        @error('size_unit')
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