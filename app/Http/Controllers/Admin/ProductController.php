<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function showForm($id=''){
        if($id>0)
        {
            $arr=Product::where(['id'=>$id])->get();

            $result['product_name']=$arr['0']->product_name;
            $result['product_slug']=$arr['0']->product_slug;
            $result['product_details']=$arr['0']->product_details;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['product_name']='';
            $result['product_slug']='';
            $result['product_details']='';
            $result['id']=0;
        }

        return view('admin.manageProduct',$result);
    }

    public function manageProduct(Request $req){
        $req->validate([
            'product_name'=> 'required',
            'product_slug'=>'required|unique:products,product_slug,'.$req->post('id'),
            'product_details'=>'required',
        ]);

        if($req->post('id')>0)
        {
            $model=Product::find($req->post('id'));
            $msg='Product updated successfully';
        }
        else
        {
            $model = new Product();
            $msg='Product added successfully';
        }

        $model->product_name=$req->post('product_name');
        $model->product_slug=$req->post('product_slug');
        $model->product_details=$req->post('product_details');

        $model->save();

        $req->session()->flash('message',$msg);

        return redirect('admin/product/list');

        return back()->withInput($request->only('product_name','product_slug','product_details'));
    }

    public function listProduct()
    {
        $result['data']=Product::all();

        return view('admin.listProduct',$result);
    }

    public function deleteProduct(Request $req,$id){

        $model=product::find($id);
        $model->delete();
        $req->session()->flash('message','Product deleted successfully');

        return redirect('admin/product/list');
    }

    public function showProduct(Request $req,$id){

        $model=Product::find($id);
        $model->product_status=1;

        $model->save();

        $req->session()->flash('message','Product now visible');

        return redirect('admin/product/list');
    }

    public function hideProduct(Request $req,$id){

        $model=Product::find($id);;
        $model->product_status=0;

        $model->save();

        $req->session()->flash('message','Product now hidden');

        return redirect('admin/product/list');
    }
}
