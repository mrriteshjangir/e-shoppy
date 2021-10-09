<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Admin\LoginController;
    use App\Http\Controllers\Admin\CategoryController;

    Route::group(['prefix'=>'admin'],function(){
        Route::get('login',[LoginController::Class,'showLoginForm'])->name('admin.login');
        Route::post('login',[LoginController::Class,'login'])->name('admin.login.post');

        Route::group(['middleware'=>'admin_auth'],function(){
            Route::get('logout',[LoginController::Class,'logout'])->name('admin.logout');

            Route::get('addCategory',[CategoryController::Class,'index'])->name('admin.addCategory');
            
            Route::get('/',function(){
                return view('admin.index');
            })->name('admin.index');
        });        
    });