<?php

use Carbon\Carbon;
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
    Route::post('/student/update/{id}', 'UserController@update');
    
    Route::get('/courses', 'CourseController@index');
    Route::get('/courses/add', 'CourseController@addform');
    Route::post('/courses/add', 'CourseController@add');
    Route::get('/course/detail/{id}', 'CourseController@detail');
    Route::post('/course/update/{id}', 'CourseController@update');

    Route::post('/qualification/add', 'QualificationController@add');

    Route::get('/lectures', 'LectureController@index');
    Route::get('/lectures/add', 'LectureController@addform');
    Route::post('/lectures/add', 'LectureController@add');
    Route::get('/lecture/detail/{id}', 'LectureController@detail');
    Route::post('/lecture/update/{id}', 'LectureController@update');

    Route::get('/events', 'EventController@index');
    Route::get('/events/add', 'EventController@addform');
    Route::post('/events/add', 'EventController@add');
    Route::get('/event/detail/{id}', 'EventController@detail');
    Route::post('/event/update/{id}', 'EventController@update');
});
