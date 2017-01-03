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
Route::match(['get','post'], '/session', 'LaravelController@session_data');

Route::get('/send-mail', function(){
    $data = [
                'title'=>'First Mail',
                'content'=>'Thank you for joining your community'
    ];
    Mail::send('email.firstmail', $data, function($message){
        $message->to('rakesharma1247@gmail.com', 'Rakesh')->subject('This is the testing mail from Laravel Developer');
        dd("Email has been sent");
    });
});