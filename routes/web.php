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
//------Country Area-----------
Route::resource('country', 'CountryController');
//------Section Area-----------
Route::resource('section', 'SectionController');
//------Main Category Area-----------
Route::resource('main-category', 'MainCategoryController');
//------Sub Category Area-----------
Route::resource('sub-category', 'SubCategoryController');
Route::resource('sub-category-list', 'SubCategoryController@subList');
Route::post('/deleteSize', 'SubCategoryController@deleteSize');
Route::post('/deleteSpec', 'SubCategoryController@deleteSpec');
//------Stores Area------------
Route::resource('store', 'StoreController');
//------Products Area----------
Route::resource('product', 'ProductController');





//------Registration Agreement---------
Route::get('member-agreement', function(){
	return "Membership Agreement Page!";
});




//-----------------------------
//ajax City menu 
Route::get('/ajax-city', function(){
	$country_id= Request::input('country_id');

	$cites= App\City::where('country_id', $country_id)->get();

	return $cites;
});

//ajax Main Category menu 
Route::get('/ajax-mcategory', function(){
	$section_id= Request::input('section_id');

	$mcategories= App\MainCategory::where('section_id', $section_id)->get();

	return $mcategories;
});

//ajax Sub Category menu 
Route::get('/ajax-subcategory', function(){
	$mcategory_id= Request::input('mcategory_id');
	$mcategory= App\MainCategory::find($mcategory_id);
	$subcategories= $mcategory->subCategories;

	return $subcategories;
});




//-------------------------------------
Route::get('test', function(){
	return view('test2');
});

//ajax CRUD test	
Route::get('/show', 'TestController@showItems');
Route::post('/addItem', 'TestController@addItem');
Route::post('/editItem', 'TestController@editItem');
Route::post('/deleteItem', 'TestController@deleteItem');

//--------Sessions Test---------------
Route::get('session', function(){
	return Session::all();
});

Route::get('flush', function(){
	return Session::flush();
});