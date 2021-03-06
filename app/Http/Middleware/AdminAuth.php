<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('ADMIN_LOGGED')&&!$request->cookie('ADMIN_LOGGED'))
        {
            $request->session()->flash('error','You are not logged in'); 

            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
