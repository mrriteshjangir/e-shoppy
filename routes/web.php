<?php

use Illuminate\Support\Facades\Route;

include 'admin.php';

//This is user route
Route::view('/','client.index');
Route::view('/createAccount','client.signup');

//These are admin admin routes

// Route::view('/admin', 'admin.index');
// Route::view('/admin/login', 'admin.login');