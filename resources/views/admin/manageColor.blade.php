@extends('admin.layouts.layout')
@if($id>0)
    @section('title') Edit Color @endsection
@else
    @section('title') Add Color @endsection
@endif
@section('active_color') active @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plus mr-3"></i>
            @if($id>0)
                Edit Color
            @else
                Add Color
            @endif
        </h1>
    </div>
</div>
<a href="{{url('admin/color/list')}}" class="btn btn-info mb-3">List Color</a>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{url('admin/color/post')}}">
            <div class="tile">
                <div class="tile-body">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Color Title</label>
                            <input class="form-control"  type="text" name="color_title" value="@if($color_title){{$color_title}}@else {{old('color_title')}}@endif" placeholder="Enter color title">
                        </div>
                        @error('color_title')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Color Shade</label>
                            <input class="form-control" onchange="pickColor(this)"  type="color" name="color_shade" value="@if($color_shade){{$color_shade}}@else{{old('color_shade')}}@endif" >
                        </div>
                        <!-- color box size and look -->
                        <style>
                            #color-box{
                                height:25px;
                                border:1px solid grey;
                                border-radius:5px;
                            }
                        </style>

                        <!-- color change script -->
                        <script>
                                function pickColor(n){
                                    // let color=document.getElementById()
                                    document.getElementById('color-box').style.backgroundColor=n.value;
                                }
                        </script>
                        
                        <!-- Color shade dispaly box -->
                        <div id='color-box' style="background-color:@if($color_shade){{$color_shade}}@else{{old('color_shade')}}@endif">
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
            </div>
        </form>
    </div>
</div>
@endsection