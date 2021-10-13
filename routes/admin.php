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
            Route::get('category/delete/{id}',[CategoryController::Class,'deleteCategory']);
            Route::get('category/restore/{id}',[CategoryController::Class,'restoreCategory']);
            Route::get('category/hide/{id}',[CategoryController::Class,'hideCategory']);
            // Category Routes ended
            Route::get('/',function(){
                return view('admin.index');
            })->name('admin.index');
        });        
    });