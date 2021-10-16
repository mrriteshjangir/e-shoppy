@extends('admin.layouts.layout')
@if($id>0)
    @section('title') Edit Category @endsection
@else
    @section('title') Add Category @endsection
@endif

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-3"></i>
            @if($id>0)
                Edit Category
            @else
                Add Category
            @endif
        </h1>
    </div>
</div>
<a href="{{url('admin/category/list')}}" class="btn btn-info mb-3">List Category</a>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('admin.manageCategory.post')}}">
            <div class="tile">
                <div class="tile-body">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Category Title</label>
                            <input class="form-control"  type="text" name="category_title" value="@if($category_title){{$category_title}}@else {{old('category_title')}}@endif" placeholder="Enter category title">
                        </div>
                        @error('category_title')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Category Slug</label>
                            <input class="form-control" type="text"  name="category_slug" value="@if($category_slug){{$category_slug}}@else {{old('category_slug')}}@endif" placeholder="Enter category slug">
                        </div>
                        @error('category_slug')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Details</label>
                            <textarea class="form-control" type="text"  name="category_details" rows="4" placeholder="Enter category details">@if($category_details){{$category_details}}@else {{old('category_details')}}@endif</textarea>
                        </div>
                        @error('category_details')
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