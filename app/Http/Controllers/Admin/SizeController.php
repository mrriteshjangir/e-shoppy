<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Size;

class SizeController extends Controller
{
    public function showForm($id=''){
        if($id>0)
        {
            $arr=Size::where(['id'=>$id])->get();

            $result['size_title']=$arr['0']->size_title;
            $result['size_unit']=$arr['0']->size_unit;
            $result['size_details']=$arr['0']->size_details;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['size_title']='';
            $result['size_unit']='';
            $result['size_details']='';
            $result['id']=0;
        }

        return view('admin.manageSize',$result);
    }

    public function manageSize(Request $req){
        $req->validate([
            'size_title'=> 'required|unique:sizes,size_title,'.$req->post('id'),
            'size_unit'=>'required',
            'size_details'=>'required',
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
        $model->size_details=$req->post('size_details');

        $model->save();

        $req->session()->flash('message',$msg);

        return redirect('admin/size/list');

        return back()->withInput($request->only('size_title','size_unit','size_details'));
    }

    public function listSize()
    {
        $result['data']=Size::all();

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
