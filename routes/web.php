<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

//------Auth area---------
Auth::routes();
Route::get('merch-reg', 'Auth\RegisterController@showRegistrationForm');
Route::get('buyer-reg', 'Auth\RegisterController@showRegistrationForm');
Route::get('admin-reg', 'Auth\RegisterController@showRegistrationForm');
//------------------------




Route::get('member-agreement', function(){
	return "Membership Agreement Page!";
});


Route::get('test', function(){
	$ar = ['1', '2', 'ahmed', 'mazen'];

	return view('test', compact('ar'));
});