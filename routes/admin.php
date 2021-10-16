<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Admin\LoginController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\CouponController;

    Route::group(['prefix'=>'admin'],function(){

        // Admin Login
        Route::get('login',[LoginController::Class,'showLoginForm'])->name('admin.login');
        Route::post('login',[LoginController::Class,'login'])->name('admin.login.post');

        Route::group(['middleware'=>'admin_auth'],function(){
            Route::get('logout',[LoginController::Class,'logout'])->name('admin.logout');

            // Category Routes Started
            Route::get('category/add',[CategoryController::Class,'showForm']);
            Route::post('category/add',[CategoryController::Class,'manageCategory'])->name('admin.manageCategory.post');
            Route::get('category/list',[CategoryController::Class,'listCategory']);
            Route::get('category/delete/{id}',[CategoryController::Class,'deleteCategory']);
            Route::get('category/show/{id}',[CategoryController::Class,'showCategory']);
            Route::get('category/hide/{id}',[CategoryController::Class,'hideCategory']);
            Route::get('category/edit/{id}',[CategoryController::Class,'showForm']);
            // Category Routes ended

            // coupon Routes Started
            Route::get('coupon/add',[CouponController::Class,'showForm']);
            Route::post('coupon/add',[CouponController::Class,'manageCoupon'])->name('admin.manageCoupon.post');
            Route::get('coupon/list',[CouponController::Class,'listCoupon']);
            Route::get('coupon/delete/{id}',[CouponController::Class,'deleteCoupon']);
            Route::get('coupon/show/{id}',[CouponController::Class,'showCoupon']);
            Route::get('coupon/hide/{id}',[CouponController::Class,'hideCoupon']);
            Route::get('coupon/edit/{id}',[CouponController::Class,'showForm']);
            // coupon Routes ended

            Route::get('/',function(){
                return view('admin.index');
            })->name('admin.index');
        });        
    });