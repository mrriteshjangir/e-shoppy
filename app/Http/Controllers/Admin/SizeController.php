<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Size;

use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    public function showForm(Request $req,$id=''){
        if($id>0)
        {
            $arr=Size::where(['id'=>$id])->get();

            $result['size_title']=$arr['0']->size_title;
            $result['size_unit']=$arr['0']->size_unit;
            $result['size_value']=$arr['0']->size_value;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['size_title']='';
            $result['size_unit']='';
            $result['size_value']='';
            $result['id']=0;
        }

        if($req->cookie('ADMIN_LOGGED'))
        {
            $result['admin']=DB::table('admins')->where(['id'=>$req->cookie('ADMIN_LOGGED')])->get();
        }
        else
        {
            $result['admin']=DB::table('admins')->where(['id'=>$req->session('ADMIN_LOGGED')])->get();
        } 
        
        return view('admin.manageSize',$result);
    }

    public function manageSize(Request $req){
        $req->validate([
            'size_title'=> 'required',
            'size_unit'=>'required',
            'size_value'=>'required',
        ]);

        if($req->post('id')>0)
        {
            $model=Size::find($req->post('id'));
            $msg='Size updated successfully';
        }
        else
        {
            $model = new Size();
            $msg='Size added successfully';
        }

        $model->size_title=$req->post('size_title');
        $model->size_unit=$req->post('size_unit');
        $model->size_value=$req->post('size_value');

        $model->save();

        $req->session()->flash('message',$msg);

        return redirect('admin/size/list');

        return back()->withInput($request->only('size_title','size_unit','size_value'));
    }

    public function listSize(Request $req)
    {
        $result['data']=Size::all();

        if($req->cookie('ADMIN_LOGGED'))
        {
            $result['admin']=DB::table('admins')->where(['id'=>$req->cookie('ADMIN_LOGGED')])->get();
        }
        else
        {
            $result['admin']=DB::table('admins')->where(['id'=>$req->session('ADMIN_LOGGED')])->get();
        }

        return view('admin.listSize',$result);
    }

    public function deleteSize(Request $req,$id){

        $model=Size::find($id);
        $model->delete();
        $req->session()->flash('message','Size deleted successfully');

        return redirect('admin/size/list');
    }

    public function showSize(Request $req,$id){

        $model=Size::find($id);
        $model->size_status=1;

        $model->save();

        $req->session()->flash('message','Size now visible');

        return redirect('admin/size/list');
    }

    public function hideSize(Request $req,$id){

        $model=Size::find($id);;
        $model->size_status=0;

        $model->save();

        $req->session()->flash('message','Size now hidden');

        return redirect('admin/size/list');
    }
}
