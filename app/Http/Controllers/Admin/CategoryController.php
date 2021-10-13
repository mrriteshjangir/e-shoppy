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
        $model->category_status=1;

        $model->save();

        $req->session()->flash('message','Category added successfully');

        return redirect('admin/category/active');

    }

    public function activeCategory()
    {
        $result['data']=Category::where(['category_status'=>1])->get();
        return view('admin.activeCategory',$result);
    }

    public function inactiveCategory()
    {
        $result['data']=Category::where(['category_status'=>0])->get();
        return view('admin.inactiveCategory',$result);
    }

    public function deleteCategory(Request $req,$id){

        $model=Category::find($id);
        $model->delete();
        $req->session()->flash('message','Category deleted successfully');

        return redirect('admin/category/inactive');
    }

    public function restoreCategory(Request $req,$id){

        $model=Category::find($id);;
        $model->category_status=1;

        $model->save();

        $req->session()->flash('message','Category restored successfully');

        return redirect('admin/category/active');
    }

    public function hideCategory(Request $req,$id){

        $model=Category::find($id);;
        $model->category_status=0;

        $model->save();

        $req->session()->flash('message','Category hided successfully');

        return redirect('admin/category/inactive');
    }
}
