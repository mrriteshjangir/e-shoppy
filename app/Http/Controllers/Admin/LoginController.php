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
        

        $email=$request->post('email');
        $password=$request->post('password');

        $result=Admin::Where(['email'=>$email])->first();
        if($result)
        {
            if(Hash::check($password,$result->password))
            {
                $request->session()->flash('error','logged in');
                $request->session()->put('ADMIN_LOGGED',true);
                $request->session()->put('ADMIN_ID',$result->id);

                if($request->post('remember')==1){
                    Cookie::queue('ADMIN_ID', $result->id);
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