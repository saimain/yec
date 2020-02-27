<?php

use App\Model\Course;
use App\Model\User\User;

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
    Route::get('/students/add', 'UserController@addform');
    Route::get('/students/add/course', 'UserController@addcourseform');
    Route::post('/students/add', 'UserController@add');
    Route::post('/students/add/course', 'UserController@addcourse');
    Route::get('/student/detail/{id}', 'UserController@detail');
    Route::post('/students/update/{id}', 'UserController@update');
    
    Route::get('/courses', 'CourseController@index');
    Route::get('/courses/add', 'CourseController@addform');
    Route::post('/courses/add', 'CourseController@add');
    Route::get('/courses/detail/{id}', 'CourseController@detail');
    Route::post('/courses/update/{id}', 'CourseController@update');
});
