<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function showForm($id=''){
        if($id>0)
        {
            $arr=Category::where(['id'=>$id])->get();

            $result['category_title']=$arr['0']->category_title;
            $result['category_slug']=$arr['0']->category_slug;
            $result['category_details']=$arr['0']->category_details;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['category_title']='';
            $result['category_slug']='';
            $result['category_details']='';
            $result['id']=0;
        }

        return view('admin.manageCategory',$result);
    }

    public function manageCategory(Request $req){
        $req->validate([
            'category_title'=> 'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$req->post('id'),
            'category_details'=>'required',
        ]);

        if($req->post('id')>0)
        {
            $model=Category::find($req->post('id'));
            $msg='Category updated successfully';
        }
        else
        {
            $model = new Category();
            $msg='Category added successfully';
        }

        $model->category_title=$req->post('category_title');
        $model->category_slug=$req->post('category_slug');
        $model->category_details=$req->post('category_details');

        $model->save();

        $req->session()->flash('message',$msg);

        return redirect('admin/category/list');

        return back()->withInput($request->only('category_title','category_slug','category_details'));
    }

    public function listCategory()
    {
        $result['data']=Category::all();

        return view('admin.listCategory',$result);
    }

    public function deleteCategory(Request $req,$id){

        $model=Category::find($id);
        $model->delete();
        $req->session()->flash('message','Category deleted successfully');

        return redirect('admin/category/list');
    }

    public function showCategory(Request $req,$id){

        $model=Category::find($id);
        $model->category_status=1;

        $model->save();

        $req->session()->flash('message','Category now visible');

        return redirect('admin/category/list');
    }

    public function hideCategory(Request $req,$id){

        $model=Category::find($id);;
        $model->category_status=0;

        $model->save();

        $req->session()->flash('message','Category now hidden');

        return redirect('admin/category/list');
    }
}
