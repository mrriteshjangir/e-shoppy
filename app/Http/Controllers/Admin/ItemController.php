<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Item;

use App\Models\Image;

use Storage;

class ItemController extends Controller
{
    public function showForm($id=''){
        if($id>0)
        {
            $arr=Item::where(['id'=>$id])->get();

            $result['product_id']=$arr['0']->product_id;
            $result['item_sku ']=$arr['0']->item_sku ;
            $result['item_mrp']=$arr['0']->item_mrp;
            $result['item_price']=$arr['0']->item_price;
            $result['item_qty']=$arr['0']->item_qty;
            $result['color_id']=$arr['0']->color_id;
            $result['size_id']=$arr['0']->size_id;
            $result['item_details']=$arr['0']->item_details;
            $result['item_keywords']=$arr['0']->item_keywords;
            $result['item_tech_speci']=$arr['0']->item_tech_speci;
            $result['item_uses']=$arr['0']->item_uses;
            $result['id']=$arr['0']->id;


            $services=explode(' ',$arr['0']->item_service);

            
            $result['item_service_type']=$services[0];
            $result['service_duration']=$services[1];
            $result['service_in']=$services[2];


        }
        else
        {
            $result['product_id']=0;
            $result['item_sku']='';
            $result['item_mrp']='';
            $result['item_price']='';
            $result['item_qty']='';
            $result['color_id']='';
            $result['size_id']='';

            $result['item_service_type']='';
            $result['service_duration']='';
            $result['service_in']='';

            $result['item_details']='';
            $result['item_keywords']='';
            $result['item_tech_speci']='';
            $result['item_uses']='';
            $result['id']=0;
        }

        $result['products']=DB::table('products')->where(['product_status'=>1])->get();
        $result['colors']=DB::table('colors')->where(['color_status'=>1])->get();
        $result['sizes']=DB::table('sizes')->where(['size_status'=>1])->get();

        return view('admin.manageItem',$result);
    }

    public function manageItem(Request $req){

        // $req->validate([
        //     'item_sku'=>'required|unique:items,item_sku,'.$req->post('id'),
        //     'item_mrp'=>'required',
        //     'item_price'=> 'required',
        //     'item_qty'=> 'required',
        //     'item_details'=> 'required',
        //     'item_name'=> 'required',
        //     'item_name'=> 'required',
        //     'item_name'=> 'required',
        //     'image_url' => 'required',
        //     'image_url.*' => 'mimes:jpeg,jpg,png'
        // ]);

        if($req->post('id')>0)
        {
            $model=Item::find($req->post('id'));
            $msg='Item updated successfully';
        }
        else
        {
            $model = new Item();
            $msg='Item added successfully';
        }

        
        $model->product_id=$req->post('product_id');
        $model->item_sku=$req->post('item_sku');
        $model->item_mrp=$req->post('item_mrp');
        $model->item_price=$req->post('item_price');
        $model->item_qty=$req->post('item_qty');
        $model->color_id=$req->post('color_id');
        $model->size_id=$req->post('size_id');
        $model->item_details=$req->post('item_details');
        $model->item_keywords=$req->post('item_keywords');
        $model->item_tech_speci=$req->post('item_uses');
        $model->item_uses=$req->post('item_uses');

        $servicesArr=array($req->post('item_service_type'),$req->post('service_duration'),$req->post('service_in'));

        $model->item_service=implode(" ",$servicesArr);

        $model->save();

        if($req->hasfile('image_url')){
            // if($req->post('id')>0)
            // {
            //     $imgList=DB::table('items')->where(['id'=>$req->post('id')])->get();

            //     if(Storage::exists('/public/media/item/'.$imgList[0]->item_image))
            //     {
            //         Storage::delete('/public/media/item/'.$imgList[0]->item_image);
            //     }
            // }
            
            $imgArr=array();

            foreach($req->file('image_url') as $file)
            {
                $rand=rand(1111111,9999999);

                $ext=$file->extension();

                $item_image=$rand.time().'.'.$ext;

                $file->storeAs('/public/item/',$item_image);

                $imgArr[]=$item_image;
            }

            $imgModal = new Image();

            $model->image_url=implode(',',$imgArr);;

            $imgModal->save();
        }
    

        $req->session()->flash('message',$msg);

        return redirect('admin/item/list');

        return back()->withInput($request->only('item_name','item_slug','item_details'));
    }

    

    public function listItem()
    {
        $result['data']=Item::all();

        return view('admin.listItem',$result);
    }

    public function deleteItem(Request $req,$id){

        $imgList=DB::table('items')->where(['id'=>$id])->get();

        if(Storage::exists('/public/media/item/'.$imgList[0]->item_image))
        {
            Storage::delete('/public/media/item/'.$imgList[0]->item_image);
        }

        $model=item::find($id);
        $model->delete();
        $req->session()->flash('message','item deleted successfully');

        return redirect('admin/item/list');
    }

    public function showItem(Request $req,$id){

        $model=Item::find($id);
        $model->item_status=1;

        $model->save();

        $req->session()->flash('message','Item now visible');

        return redirect('admin/item/list');
    }

    public function hideItem(Request $req,$id){

        $model=Item::find($id);;
        $model->item_status=0;

        $model->save();

        $req->session()->flash('message','Item now hidden');

        return redirect('admin/item/list');
    }
}
