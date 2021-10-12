<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Admin\LoginController;
    use App\Http\Controllers\Admin\CategoryController;

    Route::group(['prefix'=>'admin'],function(){

        // Admin Login
        Route::get('login',[LoginController::Class,'showLoginForm'])->name('admin.login');
        Route::post('login',[LoginController::Class,'login'])->name('admin.login.post');

        Route::group(['middleware'=>'admin_auth'],function(){
            Route::get('logout',[LoginController::Class,'logout'])->name('admin.logout');
            // Category Routes Started
            Route::get('category/add',[CategoryController::Class,'showAddCategoryForm'])->name('admin.addCategory');
            Route::post('category/add',[CategoryController::Class,'addCategory'])->name('admin.addCategory.post');
            Route::get('category/active',[CategoryController::Class,'activeCategory'])->name('admin.activeCategory');
            Route::get('category/inactive',[CategoryController::Class,'inactiveCategory'])->name('admin.inactiveCategory');
            // Category Routes ended
            Route::get('/',function(){
                return view('admin.index');
            })->name('admin.index');
        });        
    });