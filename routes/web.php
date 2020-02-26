<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Backend Routes

Route::get('admin/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Backend\Auth\LoginController@login');


Route::group(['namespace' => 'Backend' , 'middleware'=>'auth:admin'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/students', 'UserController@index');
});
