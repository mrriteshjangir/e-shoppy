@extends('admin.layouts.layout')
@section('title') Add Category @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-3"></i> Add Category</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('admin.addCategory.post')}}">
            <div class="tile">
                <div class="tile-body">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Category Title</label>
                            <input class="form-control" type="text" name="category_title" placeholder="Enter category title">
                        </div>
                        @error('category_title')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Category Slug</label>
                            <input class="form-control" type="text"  name="category_slug" placeholder="Enter category slug">
                        </div>
                        @error('category_slug')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Details</label>
                            <textarea class="form-control" type="text"  name="category_details" rows="4" placeholder="Enter category details"></textarea>
                        </div>
                        @error('category_details')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
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