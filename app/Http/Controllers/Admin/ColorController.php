<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Color;

use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function showForm(Request $req,$id=''){
        if($id>0)
        {
            $arr=Color::where(['id'=>$id])->get();

            $result['color_title']=$arr['0']->color_title;
            $result['color_shade']=$arr['0']->color_shade;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['color_title']='';
            $result['color_shade']='';
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
        
        return view('admin.manageColor',$result);
    }

    public function manageColor(Request $req){
        $req->validate([
            'color_title'=> 'required|unique:colors,color_title,'.$req->post('id'),
            'color_shade'=> 'required',
        ]);

        if($req->post('id')>0)
        {
            $model=Color::find($req->post('id'));
            $msg='Color updated successfully';
        }
        else
        {
            $model = new Color();
            $msg='Color added successfully';
        }

        $model->color_title=$req->post('color_title');
        $model->color_shade=$req->post('color_shade');

        $model->save();

        $req->session()->flash('message',$msg);

        return redirect('admin/color/list');

        return back()->withInput($request->only('color_title','color_shade'));
    }

    public function listColor(Request $req)
    {
        $result['data']=Color::all();

        
        if($req->cookie('ADMIN_LOGGED'))
        {
            $result['admin']=DB::table('admins')->where(['id'=>$req->cookie('ADMIN_LOGGED')])->get();
        }
        else
        {
            $result['admin']=DB::table('admins')->where(['id'=>$req->session('ADMIN_LOGGED')])->get();
        }

        return view('admin.listColor',$result);
    }

    public function deleteColor(Request $req,$id){

        $model=Color::find($id);
        $model->delete();
        $req->session()->flash('message','Color deleted successfully');

        return redirect('admin/color/list');
    }

    public function showColor(Request $req,$id){

        $model=Color::find($id);
        $model->color_status=1;

        $model->save();

        $req->session()->flash('message','Color now visible');

        return redirect('admin/color/list');
    }

    public function hideColor(Request $req,$id){

        $model=Color::find($id);;
        $model->color_status=0;

        $model->save();

        $req->session()->flash('message','Color now hidden');

        return redirect('admin/color/list');
    }
}
