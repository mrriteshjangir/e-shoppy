<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Product;

use Storage;

class ProductController extends Controller
{
    public function showForm($id=''){
        if($id>0)
        {
            $arr=Product::where(['id'=>$id])->get();

            $result['product_name']=$arr['0']->product_name;
            $result['product_slug']=$arr['0']->product_slug;
            $result['product_image']=$arr['0']->product_image;
            $result['category_id']=$arr['0']->category_id;
            $result['product_model']=$arr['0']->product_model;
            $result['brand_id']=$arr['0']->brand_id;
            $result['id']=$arr['0']->id;

        }
        else
        {
            $result['product_name']='';
            $result['product_slug']='';
            $result['product_image']='';
            $result['category_id']='';
            $result['product_model']='';
            $result['brand_id']='';
            $result['id']=0;
        }

        $result['categories']=DB::table('categories')->where(['category_status'=>1])->get();
        $result['brands']=DB::table('brands')->where(['brand_status'=>1])->get();

        return view('admin.manageProduct',$result);
    }

    public function manageProduct(Request $req){
        $req->validate([
            'product_name'=> 'required',
            'product_slug'=>'required|unique:products,product_slug,'.$req->post('id'),
            
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
        
        $model->category_id=$req->post('category_id');
        $model->product_model=$req->post('product_model');
        $model->brand_id=$req->post('brand_id');


        if($req->hasfile('product_image')){
            if($req->post('id')>0)
            {
                $imgList=DB::table('products')->where(['id'=>$req->post('id')])->get();

                if(Storage::exists('/public/product/'.$imgList[0]->product_image))
                {
                    Storage::delete('/public/product/'.$imgList[0]->product_image);
                }
            }

            $product_image_old=$req->file('product_image');

            $ext=$product_image_old->extension();

            $product_image_new=time().'.'.$ext;

            $product_image_old->storeAs('/public/product/',$product_image_new);

            $model->product_image=$product_image_new;

        }

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

        $imgList=DB::table('products')->where(['id'=>$id])->get();

        if(Storage::exists('/public/product/'.$imgList[0]->product_image))
        {
            Storage::delete('/public/product/'.$imgList[0]->product_image);
        }

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
