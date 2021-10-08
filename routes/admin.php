<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Admin\LoginController;

    Route::group(['prefix'=>'admin'],function(){
        Route::get('login',[LoginController::Class,'showLoginForm'])->name('admin.login');
        Route::post('login',[LoginController::Class,'login'])->name('admin.login.post');
        Route::get('logout',[LoginController::Class,'logout'])->name('admin.logout');

        //Route::group(['middleware'=>['auth:admin']],function(){
            Route::get('/',function(){
                return view('admin.index');
            })->name('admin.index');
        //});        
    });