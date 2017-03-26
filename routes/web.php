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
Route::get('ww', function () {
    return view('ar.layouts.ar-main-layout');
});
Route::get('/', 'IndexController@show');

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
Route::get('countries-list', 'CountryController@countriesList');
//------City Area--------------
Route::resource('city', 'CityController');
Route::get('cities-list', 'CityController@citiesList');
//------Section Area-----------
Route::resource('section', 'SectionController');
Route::get('section/{id}/{title}', 'SectionController@show');
Route::resource('all-sections', 'SectionController');
Route::resource('sections-manage', 'SectionController@sectionsManage');
Route::resource('sections-list', 'SectionController@sectionsList');
//------Main Category Area-----------
Route::resource('main-category', 'MainCategoryController');
Route::get('main-category/{id}/{title}', 'MainCategoryController@show');
Route::resource('main-category-list', 'MainCategoryController@mainList');
//------Sub Category Area-----------
Route::resource('sub-category', 'SubCategoryController');
Route::get('sub-category/{id}/{title}', 'SubCategoryController@show');
Route::resource('sub-category-list', 'SubCategoryController@subList');
Route::post('/deleteSize', 'SubCategoryController@deleteSize');
Route::post('/deleteSpec', 'SubCategoryController@deleteSpec');
//------Category Request------------
Route::get('category-request', 'SubCategoryController@categoryRequestForm');
Route::post('category-request', 'SubCategoryController@categoryRequestSubmit');
Route::get('categories-request-display', 'SubCategoryController@categoryRequestDisplay');
Route::delete('categories-request/{id}', 'SubCategoryController@categoryRequestDelete');
//------Advanced Search---------------
Route::get('filter-search', 'SearchController@filterSearch');
//------Stores Area-------------------
Route::resource('store', 'StoreController');
Route::resource('my-stores', 'StoreController@myStores'); //store list for edit/delete
Route::get('stores-list/{usage}', 'StoreController@merchStoreList'); //select store
//Route::get('section-products/{subcat_id}', 'StoreController@secionProducts'); //Get products for the side menu
Route::get('return-policy/{store_id}', 'StoreController@returnPolicy');
Route::get('seller-guaranty/{store_id}', 'StoreController@sellerGuaranty');
//ajax display countrie's cities
Route::get('/ajax-storecity', 'StoreController@city');
Route::get('store-tab/{id}/{link}', 'StoreController@tab');
Route::get('store-categories/{store_id}/{subcat_id}', 'StoreController@categoryProducts');
Route::get('store/{store_id}/ratings', 'StoreController@ratingShow');
//------Products Area----------
Route::resource('product', 'ProductController');
Route::get('product/{id}/{title}', 'ProductController@show');
Route::get('add-similar/{storeid}', function($storeid){  
	//get store id
    $store_id= $storeid;
	return view('ar.product.add-simillar', compact('store_id'));  //search for similar products to use it's information
});

//Route::post('product/create', 'ProductController@create');
Route::get('/ajax-search-products', 'ProductController@addProdSearch'); //use search product by ajax

Route::get('products-edit-list/{store_id}', 'ProductController@productsEditList');
Route::get('stock-status/{store_id}', 'ProductController@stockStatus');
Route::post('stock-status/{store_id}', 'ProductController@stockUpdate');
Route::post('/deleteProdColor', 'ProductController@deleteProdColor');
Route::post('/deleteColorImage', 'ProductController@deleteColorImage');
Route::post('/deleteProductImage', 'ProductController@deleteProductImage'); 
Route::post('/deleteCommercialImage', 'ProductController@deleteCommercialImage');
Route::post('/deleteQtyOffer', 'ProductController@deleteQtyOffer');
//-------Pending and Approve poducts----------
Route::get('all-pending-products', 'ProductController@allPendingProducts');
Route::get('admin-approve-product/{id}', 'ProductController@adminApproveProduct');
Route::get('my-products-status/{store_id}', 'ProductController@merchPorductsStatus');
Route::get('review-notes', 'ProductController@reviewNotes');
//-------Notifications Area----------
Route::get('all-notifications', 'NotificationController@allNotfiy');
Route::get('/ajax-notify', 'NotificationController@makeRead');
Route::get('/ajax-notify-delete', 'NotificationController@delete');
//-------Shipping Area---------------
Route::resource('shipping-company', 'ShippingCoController');
Route::resource('shipping-companies/list', 'ShippingCoController@shipingCosList');
Route::post('product-shipping', 'ShippingCoController@productShippingSave');
Route::get('product-shipping/{product_id}/edit', 'ShippingCoController@productShippingEdit');
Route::get('/ajax-shipping-methods', 'ShippingCoController@productShippMethods');
//-----------Cart & Checkout Area-----------------
//Note: Shopping Cart is a readymade package 
Route::get('my-cart', 'CartController@show');
Route::post('/addToCart', 'CartController@add');
Route::post('item-cart-remove', 'CartController@remove');
Route::get('minicart-checkout', 'CartController@checkoutDetails');

Route::post('checkout-details', 'CartController@checkoutDetails');
//-----------Payment Area-----------------
Route::post('payment', 'PaymentController@paymentSelect');
Route::post('order-pay', 'PaymentController@pay');
//-----------Orders Area-----------------
Route::get('purchase-orders', 'OrderController@ordersList');
Route::get('delivered-orders', 'OrderController@deliveredOrders');
Route::get('/ajax-product-status', 'OrderController@statusUpdate');
Route::get('orders-history', 'OrderController@ordersHistory');
//-----------Today's Deal-----------------
Route::get('todays-deals-select', 'TodaysDealController@select');
//-----------Favorite Area-----------------
Route::post('/addToFavorite', 'FavoritesController@add');
Route::get('my-favorites', 'FavoritesController@show');
Route::post('item-favorite-remove', 'FavoritesController@delete');



//----------Site Content-------------------
Route::get('recent-products', 'IndexController@showMore');
Route::get('high-sales', 'IndexController@showMore');
Route::get('high-rating', 'IndexController@showMore');
Route::get('home-slider-edit', 'SiteInfoController@homeSlider');
Route::post('home-slider-edit', 'SiteInfoController@homeSliderUpload');
Route::delete('home-slider-remove/{id}', 'SiteInfoController@homeSliderDelete');
Route::get('home-labels-images', 'SiteInfoController@homeLabels');
Route::post('home-labels-images/{id}', 'SiteInfoController@homeLabelsUpdate');
//----------Banners Managment--------------
Route::get('home-banners', 'BannerController@homeBanners');
Route::get('subcat-banner', 'BannerController@subCatBanner');
Route::resource('banners', 'BannerController');
//---------FAQ Area--------------------
Route::resource('faq', 'QuestionController');
Route::get('FAQ', 'QuestionController@index');
Route::resource('faq-list', 'QuestionController@faqList');
//------Registration Agreement---------
Route::get('member-agreement', function(){
	return "Membership Agreement Page!";
});
//--------- MUHNAD ROUTES -----------------
Route::get('about', 'SiteInfoController@show');
Route::get('merchant-agreement', 'SiteInfoController@show');
Route::get('buyer-agreement', 'SiteInfoController@show');
Route::get('selling-instruct', 'SiteInfoController@show');
Route::get('buy-instruct', 'SiteInfoController@show');
Route::get('payment-methods', 'SiteInfoController@show');
Route::get('privacy-policy', 'SiteInfoController@show');
Route::get('replacement', 'SiteInfoController@show');
Route::get('delivery-shipping', 'SiteInfoController@show');
Route::get('recruitment', 'SiteInfoController@show');
Route::get('media', 'SiteInfoController@show');
Route::get('suggestions', 'SiteInfoController@show');
//------------------------------------------
Route::get('siteinfo-update', 'SiteInfoController@informationPage');
Route::get('sitepolicy-update', 'SiteInfoController@informationPage');
Route::get('customer-service-update', 'SiteInfoController@informationPage');
//------------------------------------------
Route::post('siteinfo-update', 'SiteInfoController@infoUpdate');
Route::post('sitepolicy-update', 'SiteInfoController@policyUpdate');
Route::post('customer-service-update', 'SiteInfoController@suctomerServiceUpdate');
//------------------------------------------




//---------------ajax menus------------------
Route::get('/ajax-city', 'Auth\RegisterController@city');
Route::get('/ajax-mcategory', 'MainCategoryController@ajaxMcategory');
Route::get('/ajax-subcategory', 'SubCategoryController@ajaxSubcategory');
Route::get('/ajax-sizes', 'SubCategoryController@ajaxSizes');
Route::get('/ajax-specs', 'SubCategoryController@ajaxSpecs');




Route::get('dash', function(){
	if (Session::get('group') == 'admin'){
		return view('ar.layouts.ar-admin-dash');
	}
	elseif (Session::get('group') == 'merchant'){
		return view('ar.layouts.ar-merchant-dash');
	}
	elseif (Session::get('group') == 'buyer'){
		return view('ar.layouts.ar-buyer-dash');
	}
	else return Redirect('/');
});
//-------------------------------------
Route::post('test', 'testcontroller@test');
Route::get('test2', function(){
	return view('test');
});
Route::get('test3', function(){
	return '';
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

Route::get('cart', function(){
	return $cart= Cart::content();
});

Route::get('cart-remove', function(){
	return Cart::destroy();
});

 