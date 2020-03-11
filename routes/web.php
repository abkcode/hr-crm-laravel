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

Route::get('/jobs', 'JobController@index');
Route::get('/jobs/create', 'JobController@create');
Route::post('/jobs/store', 'JobController@store');
Route::get('/jobs/edit/{id}', 'JobController@edit');
Route::post('/jobs/update/{id}', 'JobController@update');
Route::delete('/jobs/destroy/{id}', 'JobController@destroy');

Route::get('/employees', 'UserController@index');
Route::get('/employees/view/{id}', 'UserController@view');

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/user', 'UserController@index');
