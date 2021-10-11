<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function showAddCategoryForm(){
        return view('admin.addCategory');
    }

    public function addCategory(Request $req){
        $req->validate([
            'category_title'=> 'required',
            'category_slug'=>'required|unique:categories',
            'category_details'=>'required',
        ]);

        $model = new Category();

        $model->category_title=$req->post('category_title');
        $model->category_slug=$req->post('category_slug');
        $model->category_details=$req->post('category_details');

        $model->save();

        $req->session()->flash('message','Category added successfully');

        return redirect('admin/manageCategory');

    }

    public function manageCategory()
    {
        return view('admin.manageCategory');
    }
}
