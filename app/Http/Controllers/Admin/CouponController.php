<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;

class CouponController extends Controller
{
    public function showForm($id=''){
        if($id>0)
        {
            $arr=Coupon::where(['id'=>$id])->get();

            $result['coupon_title']=$arr['0']->coupon_title;
            $result['coupon_code']=$arr['0']->coupon_code;
            $result['coupon_expiry']=$arr['0']->coupon_expiry;
            $result['coupon_details']=$arr['0']->coupon_details;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['coupon_title']='';
            $result['coupon_code']='';
            $result['coupon_expiry']='';
            $result['coupon_details']='';
            $result['id']=0;
        }

        return view('admin.manageCoupon',$result);
    }

    public function manageCoupon(Request $req){
        $req->validate([
            'coupon_title'=> 'required',
            'coupon_code'=>'required|unique:coupons,coupon_code,'.$req->post('id'),
            'coupon_expiry'=>'required',
            'coupon_details'=>'required',
        ]);

        if($req->post('id')>0)
        {
            $model=Coupon::find($req->post('id'));
            $msg='Coupon updated successfully';
        }
        else
        {
            $model = new Coupon();
            $msg='Coupon added successfully';
        }

        $model->coupon_title=$req->post('coupon_title');
        $model->coupon_code=$req->post('coupon_code');
        $model->coupon_expiry=$req->post('coupon_expiry');
        $model->coupon_details=$req->post('coupon_details');

        $model->save();

        $req->session()->flash('message',$msg);

        return redirect('admin/coupon/list');

        return back()->withInput($request->only('coupon_title','coupon_code','coupon_details'));
    }

    public function listCoupon()
    {
        $result['data']=Coupon::all();

        return view('admin.listCoupon',$result);
    }

    public function deleteCoupon(Request $req,$id){

        $model=Coupon::find($id);
        $model->delete();
        $req->session()->flash('message','Coupon deleted successfully');

        return redirect('admin/coupon/list');
    }

    public function showCoupon(Request $req,$id){

        $model=Coupon::find($id);
        $model->coupon_status=1;

        $model->save();

        $req->session()->flash('message','Coupon now visible');

        return redirect('admin/coupon/list');
    }

    public function hideCoupon(Request $req,$id){

        $model=Coupon::find($id);;
        $model->coupon_status=0;

        $model->save();

        $req->session()->flash('message','Coupon now hidden');

        return redirect('admin/coupon/list');
    }
}
