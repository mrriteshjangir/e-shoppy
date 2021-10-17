@extends('admin.layouts.layout')
@if($id>0)
    @section('title') Edit Coupon @endsection
@else
    @section('title') Add Coupon @endsection
@endif
@section('active_coupon') active @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-3"></i>
            @if($id>0)
                Edit Coupon
            @else
                Add Coupon
            @endif
        </h1>
    </div>
</div>
<a href="{{url('admin/coupon/list')}}" class="btn btn-info mb-3">List Coupon</a>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{url('admin/coupon/post')}}">
            <div class="tile">
                <div class="tile-body">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Coupon Title</label>
                            <input class="form-control"  type="text" name="coupon_title" value="@if($coupon_title){{$coupon_title}}@else {{old('coupon_title')}}@endif" placeholder="Enter coupon title">
                        </div>
                        @error('coupon_title')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Coupon Code</label>
                            <input class="form-control" type="text"  name="coupon_code" value="@if($coupon_code){{$coupon_code}}@else {{old('coupon_code')}}@endif" placeholder="Enter coupon slug">
                        </div>
                        @error('coupon_code')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Coupon Details</label>
                            <textarea class="form-control" type="text"  name="coupon_details" rows="4" placeholder="Enter coupon details">@if($coupon_details){{$coupon_details}}@else {{old('coupon_details')}}@endif</textarea>
                        </div>
                        @error('coupon_details')
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