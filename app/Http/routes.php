<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    return "Posts returned";
});

Route::resource('curd', 'LaravelController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/employee', 'LaravelController@show_records');
Route::match(['post'], '/employee/edit', 'LaravelController@edit_employee');
Route::match(['post'], '/employee/view', 'LaravelController@view_employee');
Route::match(['post'], '/employee/delete', 'LaravelController@delete_employee');
Route::match(['post'], '/employee/add', 'LaravelController@add_employee');

Route::match(['get','post'], '/profile', 'LaravelController@profile');