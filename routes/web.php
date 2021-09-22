<?php

use Illuminate\Support\Facades\Route;

//This is user route
Route::get('/', function () {
    return view('index');
});



//These are admin admin routes

Route::view('/admin', 'admin.index');