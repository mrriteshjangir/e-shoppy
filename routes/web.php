<?php

use Illuminate\Support\Facades\Route;

//This is user route
Route::view('/','client.index');
Route::view('/createAccount','client.signup');

//These are admin admin routes

Route::view('/adm', 'admin.index');
Route::view('/adm/login', 'admin.login');