<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Auth\Authenticatable as Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Arr;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    use Auth;

    // Redirect to dashboard whenevr needed

    protected $redirectTo ='/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }



    public function showLoginForm(){
        return view('admin.login');
    }



    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required|min:6|max:15'
        ]);

        if(Auth::guard('admin')->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$request->get('remember'))){
            return redirect()->intended(route('/admin'));
        }
        
        return back()->withInput($request->only('email','remember'));
    }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }



    public function handle($request,Closure $next,$guard=null)
    {
        switch($guard)
        {
            case 'admin':
                if(Auth::guard($guard)->check()){
                    return redirect('/admin');
                }
                break;
            default:
                if(Auth::guard($guard)->check()){
                    return redirect('/');
                }
                break;
        }
        return $next($request);
    }



    protected function unauthenticated($request ,AuthenticationException $exception)
    {
        if($request->excepctsJson()){
            return response()->json(['Message'=>$exception->getMessage()],401);
        }

        $guard=Arr::get($exception->guards(),0);

        switch($guard){
            case 'admin':
                $login='admin.login';
                break;
            default:
                $login='client.index';
                break;
        }

        return redirect()->guest(route($login));
    }
}