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

//------Auth area-------------
Auth::routes();
Route::get('merch-reg', 'Auth\RegisterController@showRegistrationForm');
Route::get('buyer-reg', 'Auth\RegisterController@showRegistrationForm');
Route::get('admin-reg', 'Auth\RegisterController@showRegistrationForm');
//------Country Area----------
Route::resource('country', 'CountryController');
//------Stores Area------------
Route::resource('store', 'StoreController');




//-----------------------------
//ajax search menu 
Route::get('/ajax-city', function(){
	$country_id= Request::input('country_id');

	$cites= App\City::where('country_id', $country_id)->get();

	return $cites;
});

//------Registration Agreement---------
Route::get('member-agreement', function(){
	return "Membership Agreement Page!";
});


Route::post('test', function(){
	return Request::input('country-code');
});

//--------Sessions Test---------------
Route::get('session', function(){
	return Session::all();
});

Route::get('flush', function(){
	return Session::flush();
});