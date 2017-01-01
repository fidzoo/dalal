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
Route::get('/logout', function(){
	Auth::logout();
	return Redirect('/');
});
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
Route::get('my-stores', 'StoreController@merchStoreList');
//------Products Area----------
Route::resource('product', 'ProductController', ['except'=> 'create']);
Route::get('add-similar/{storeid}', function($storeid){
	//get store id
    $store_id= $storeid;
	return view('product.add-simillar', compact('store_id'));
});
Route::post('product/create', 'ProductController@productCreate');
Route::get('/ajax-search-products', 'ProductController@addProdSearch');
//-----------------------------




//------Registration Agreement---------
Route::get('member-agreement', function(){
	return "Membership Agreement Page!";
});




//---------------ajax menus------------------
Route::get('/ajax-city', 'Auth\RegisterController@city');
Route::get('/ajax-mcategory', 'MainCategoryController@ajaxMcategory');
Route::get('/ajax-subcategory', 'SubCategoryController@ajaxSubcategory');
Route::get('/ajax-sizes', 'SubCategoryController@ajaxSizes');
Route::get('/ajax-specs', 'SubCategoryController@ajaxSpecs');





//-------------------------------------
Route::post('test', 'testcontroller@test');
Route::get('test2', function(){
	return view('test2');
});
//--------------------------------------

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