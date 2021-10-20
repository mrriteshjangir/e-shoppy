<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Brand;

use Storage;

class BrandController extends Controller
{
    public function showForm($id=''){
        if($id>0)
        {
            $arr=Brand::where(['id'=>$id])->get();

            $result['brand_name']=$arr['0']->brand_name;
            $result['brand_logo']=$arr['0']->brand_logo;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['brand_name']='';
            $result['brand_logo']='';
            $result['id']=0;
        }

        return view('admin.manageBrand',$result);
    }

    public function manageBrand(Request $req){
        $req->validate([
            'brand_name'=> 'required|unique:brands,brand_name,'.$req->post('id'),
            'brand_logo'=> 'mimes:jpg,png,jpeg',
        ]);

        if($req->post('id')>0)
        {
            $model=Brand::find($req->post('id'));
            $msg='Brand updated successfully';
        }
        else
        {
            $model = new Brand();
            $msg='Brand added successfully';
        }

        $model->brand_name=$req->post('brand_name');
        
        if($req->hasfile('brand_logo')){
            if($req->post('id')>0)
            {
                $imgList=DB::table('brands')->where(['id'=>$req->post('id')])->get();

                if(Storage::exists('/public/media/brand/'.$imgList[0]->brand_logo))
                {
                    Storage::delete('/public/media/brand/'.$imgList[0]->brand_logo);
                }
            }
            $brand_logo_old=$req->file('brand_logo');

            $ext=$brand_logo_old->extension();

            $brand_logo_new=time().'.'.$ext;

            $brand_logo_old->storeAs('/public/media/brand/',$brand_logo_new);

            $model->brand_logo=$brand_logo_new;

        }

                

        $model->save();

        $req->session()->flash('message',$msg);

        return redirect('admin/brand/list');

        return back()->withInput($request->only('brand_name','brand_logo'));
    }

    public function listBrand()
    {
        $result['data']=Brand::all();

        return view('admin.listBrand',$result);
    }

    public function deleteBrand(Request $req,$id){

        $imgList=DB::table('brands')->where(['id'=>$id])->get();

        if(Storage::exists('/public/media/brand/'.$imgList[0]->brand_logo))
        {
            Storage::delete('/public/media/brand/'.$imgList[0]->brand_logo);
        }
        
        $model=Brand::find($id);
        $model->delete();
        $req->session()->flash('message','Brand deleted successfully');

        return redirect('admin/brand/list');
    }

    public function showBrand(Request $req,$id){

        $model=Brand::find($id);
        $model->brand_status=1;

        $model->save();

        $req->session()->flash('message','Brand now visible');

        return redirect('admin/brand/list');
    }

    public function hideBrand(Request $req,$id){

        $model=Brand::find($id);;
        $model->brand_status=0;

        $model->save();

        $req->session()->flash('message','Brand now hidden');

        return redirect('admin/brand/list');
    }
}
