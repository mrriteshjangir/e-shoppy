<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Admin\LoginController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\CouponController;
    use App\Http\Controllers\Admin\SizeController;
    use App\Http\Controllers\Admin\ColorController;
    use App\Http\Controllers\Admin\ProductController;

    Route::group(['prefix'=>'admin'],function()
    {
        // Admin Login
        Route::get('login',[LoginController::Class,'showLoginForm']);
        Route::post('login/post',[LoginController::Class,'login']);

        Route::group(['middleware'=>'admin_auth'],function()
        {
            Route::get('logout',[LoginController::Class,'logout']);

            // Category Routes Started
            Route::get('category/add',[CategoryController::Class,'showForm']);
            Route::get('category/list',[CategoryController::Class,'listCategory']);
            Route::get('category/delete/{id}',[CategoryController::Class,'deleteCategory']);
            Route::get('category/show/{id}',[CategoryController::Class,'showCategory']);
            Route::get('category/hide/{id}',[CategoryController::Class,'hideCategory']);
            Route::get('category/edit/{id}',[CategoryController::Class,'showForm']);

            Route::post('category/post ',[CategoryController::Class,'manageCategory']);
            // Category Routes ended

            // coupon Routes Started
            Route::get('coupon/add',[CouponController::Class,'showForm']);
            Route::get('coupon/list',[CouponController::Class,'listCoupon']);
            Route::get('coupon/delete/{id}',[CouponController::Class,'deleteCoupon']);
            Route::get('coupon/show/{id}',[CouponController::Class,'showCoupon']);
            Route::get('coupon/hide/{id}',[CouponController::Class,'hideCoupon']);
            Route::get('coupon/edit/{id}',[CouponController::Class,'showForm']);

            Route::post('coupon/post',[CouponController::Class,'manageCoupon']);
            // coupon Routes ended

            // size Routes Started
            Route::get('size/add',[SizeController::Class,'showForm']);
            Route::get('size/list',[SizeController::Class,'listSize']);
            Route::get('size/delete/{id}',[SizeController::Class,'deleteSize']);
            Route::get('size/show/{id}',[SizeController::Class,'showSize']);
            Route::get('size/hide/{id}',[SizeController::Class,'hideSize']);
            Route::get('size/edit/{id}',[SizeController::Class,'showForm']);

            Route::post('size/post',[SizeController::Class,'manageSize']);
            // size Routes ended

            // color Routes Started
            Route::get('color/add',[ColorController::Class,'showForm']);
            Route::get('color/list',[ColorController::Class,'listColor']);
            Route::get('color/delete/{id}',[ColorController::Class,'deleteColor']);
            Route::get('color/show/{id}',[ColorController::Class,'showColor']);
            Route::get('color/hide/{id}',[ColorController::Class,'hideColor']);
            Route::get('color/edit/{id}',[ColorController::Class,'showForm']);

            Route::post('color/post',[ColorController::Class,'manageColor']);
            // color Routes ended

            // product Routes Started
            Route::get('product/add',[ProductController::Class,'showForm']);
            Route::get('product/list',[ProductController::Class,'listProduct']);
            Route::get('product/delete/{id}',[ProductController::Class,'deleteProduct']);
            Route::get('product/show/{id}',[ProductController::Class,'showProduct']);
            Route::get('product/hide/{id}',[ProductController::Class,'hideProduct']);
            Route::get('product/edit/{id}',[ProductController::Class,'showForm']);

            Route::post('product/post',[ProductController::Class,'manageProduct']);
            // product Routes ended

            Route::get('/',function(){
                return view('admin.index');
            })->name('admin.index');
        });        
    });