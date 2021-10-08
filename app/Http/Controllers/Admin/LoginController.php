<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }



    public function showLoginForm(){
        return view('admin.login');
    }



    public function login(Request $request)
    {
        // $this->validate($request,[
        //     'email'=> 'required|email',
        //     'password'=> 'required|min:5|max:15'
        // ]);

        // if(Auth::guard('admin')->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ],$request->get('remember'))){
        //     return redirect()->intended(route('/admin'));
        // }
        
        $email=$request->post('email');
        $password=$request->post('password');

        $result=Admin::Where(['email'=>$email])->first();
        if($result)
        {
            if(Hash::check($request->post('password'),$result->password))
            {
                $request->session()->flash('error','logged in');
                $request->session()->put('ADMIN_LOGGED',true);
                $request->session()->put('ADMIN_ID',$result->id);

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
        // Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        // return redirect()->route('admin.login');
    }



    public function handle($request,Closure $next)
    {
        
    }



    protected function unauthenticated($request ,AuthenticationException $exception)
    {
        // if($request->excepctsJson()){
        //     return response()->json(['Message'=>$exception->getMessage()],401);
        // }

        // $guard=Arr::get($exception->guards(),0);

        // switch($guard){
        //     case 'admin':
        //         $login='admin.login';
        //         break;
        //     default:
        //         $login='client.index';
        //         break;
        // }

        // return redirect()->guest(route($login));
    }
}