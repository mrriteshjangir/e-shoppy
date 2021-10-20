@extends('admin.layouts.layout')
@section('title') List Brand @endsection
@section('active_brand') active @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> List Brand</h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <p>{{session('message')}}</a>.</p>
    </div>
    @endif
    <a href="{{url('admin/brand/add')}}" class="btn btn-info mb-3">Add Brand</a>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="sampleTable_length"><label>Show <select
                                            name="sampleTable_length" aria-controls="sampleTable"
                                            class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="sampleTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                            class="form-control form-control-sm" placeholder=""
                                            aria-controls="sampleTable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                    role="grid" aria-describedby="sampleTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                >#</th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                >Brand Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                >Brand Logo</th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                               >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php ($sr=1)
                                    @foreach($data as $list)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$sr}}</td>
                                            <td>{{$list->brand_name}}</td>
                                            <!-- brand box size and look -->
                                            <style>
                                                #brand-box{
                                                    height:50px;
                                                    border:1px solid grey;
                                                    border-radius:5px;
                                                }
                                            </style>
                                            
                                            <td><img src="{{asset('storage/media/brand/'.$list->brand_logo)}}" id="brand-box" alt="{{$list->brand_name}}"/></td>
                                            <td>
                                                @if($list->brand_status==0)
                                                <a  href="{{url('admin/brand/show')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                                data-toggle="tooltip" data-placement="top" title="Hide it.">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @else
                                                <a href="{{url('admin/brand/hide')}}/{{$list->id}}" class="text-decoration-none btn btn-warning"
                                                data-toggle="tooltip" data-placement="top" title="Unhide it.">
                                                    <i class="fa fa-eye-slash"></i>
                                                </a>
                                                @endif
                                                <a href="{{url('admin/brand/edit')}}/{{$list->id}}" class="text-decoration-none btn btn-info ml-2"
                                                data-toggle="tooltip" data-placement="top" title="Edit it.">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                
                                                <a  href="{{url('admin/brand/delete')}}/{{$list->id}}" class="text-decoration-none btn btn-danger ml-2"
                                                data-toggle="tooltip" data-placement="top" title="Delete it.">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php ($sr++)
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">Showing
                                    1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="sampleTable_previous"><a
                                                href="#" aria-controls="sampleTable" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="sampleTable"
                                                data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable"
                                                data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable"
                                                data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable"
                                                data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable"
                                                data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable"
                                                data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="sampleTable_next"><a href="#"
                                                aria-controls="sampleTable" data-dt-idx="7" tabindex="0"
                                                class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
