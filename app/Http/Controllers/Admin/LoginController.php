<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

use Cookie;

class LoginController extends Controller
{

    public function showLoginForm(Request $request){
        if($request->session()->has('ADMIN_LOGGED'))
        {
            return redirect('/admin');
        }
        else
        {
            return view('admin.login');
        } 
    }

    public function login(Request $request)
    {
        // $this->validate($request,[
        //     'email'=> 'required|email',
        //     'password'=> 'required|min:5|max:15'
        // ]);
        
        $email=$request->post('email');
        $password=$request->post('password');
        $remember=$request->post('remember');

        $result=Admin::Where(['email'=>$email])->first();
        if($result)
        {
            if(Hash::check($request->post('password'),$result->password))
            {
                $request->session()->flash('error','logged in');
                $request->session()->put('ADMIN_LOGGED',true);
                $request->session()->put('ADMIN_ID',$result->id);
                
                // Cookie will create when user check the remmeber me checkbox
                
                if($remember==1){
                    Cookie::queue('ADMIN_LOGGED',true,((60*24)*30));
                    Cookie::queue('ADMIN_ID',$result->id,((60*24)*30));
                }

                return redirect('/admin');
            }
            else
            {
                $request->session()->flash('error','Password is incorrect'); 
            }
        }
        else
        {
            $request->session()->flash('error','This email is not registred with us');
        }


        return back()->withInput($request->only('email','remember'));
    }



    public function logout(Request $request)
    {
        $request->session()->forget('ADMIN_LOGGED');
        $request->session()->forget('ADMIN_ID');

        return redirect('/admin/login');
    }

}