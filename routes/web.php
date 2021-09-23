<?php

use Illuminate\Support\Facades\Route;

//This is user route
Route::get('/', function () {
    return view('client.index');
});



//These are admin admin routes

Route::view('/adm', 'admin.index');
Route::view('/adm/login', 'admin.login');