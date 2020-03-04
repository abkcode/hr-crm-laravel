<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/jobs', function(){
    return view('jobs');
});

Route::get('/employees', function(){
    return view('employees');
});

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/user', 'UserController@index');
