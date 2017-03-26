<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\MainCategory;
use App\Product;
use App\Country;
use App\City;
use App\Http\Requests;
use Session, Redirect, File;

class StoreController extends Controller
{
    /*Customized functions inside controller:
    * - merchStoreList($usage): To display list of Merchent's stores.
    * - myStores(): display stores list for merchant to Update/Delete
    * - returnPolicy(): Display Return Policy 
    * - sellerGuaranty() Display Seller Guaranty
    * - city(): Ajax get city
    * - tab(): For Store tab navigation
    * - categoryProducts(): display products belong to this Sub Category
    * - ratingShow(): Display store ratings 
    */


    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'secionProducts', 'index', 'show', 'returnPolicy', 'sellerGuaranty', 'city', 'tab', 'categoryProducts', 'ratingShow'
            ]]);
        }       
    
    /*
    * To display list of Merchent's stores
    */
    public function merchStoreList($usage){
        $stores= Store::where('user_id', Session::get('user_id'))->get();

        if(Session::get('lang') == 'en'){
            return view('en.store.merchant-store-list', compact('stores', 'usage'));
        }
            return view('ar.store.merchant-store-list', compact('stores', 'usage'));
    } 

    /*
    * display stores list for merchant to Update/Delete
    */
    public function myStores()
    {
        $stores= Store::where('user_id', Session::get('user_id'))->get();

        if(Session::get('lang') == 'en'){
            return view('en.store.my-stores', compact('stores'));
        }
            return view('ar.store.my-stores', compact('stores'));
    }


    /*
    * Display Return Policy 
    */
    public function returnPolicy($store_id)
    {   
        $store= Store::find($store_id);

        if(Session::get('lang') == 'en'){
            return view('en.store.return-policy', compact('store'));
        }
            return view('ar.store.return-policy', compact('store'));
    }

    /*
    * Display Seller Guaranty
    */
    public function sellerGuaranty($store_id)
    {
        $store= Store::find($store_id);

        if(Session::get('lang') == 'en'){
            return view('en.store.seller-guaranty', compact('store'));
        }
            return view('ar.store.seller-guaranty', compact('store'));
    }


    /*
    *   For Store tab navigation
    */
    public function tab($id, $link)
    {
        //Eager Loading used
        $store= Store::where('id', $id)->with('country', 'city')->first();

        if ($link == 'high-sale'){
          $products= $store->products()->where('approve', 1)->with('productImages', 'rating')->orderBy('sell_count','desc')->paginate(21);
        }
        elseif($link == 'recent-add'){
           $products= $store->products()->where('approve', 1)->with('productImages', 'rating')->orderBy('id','desc')->paginate(21);
        }

        $all_main_cats= MainCategory::with('subCategories')->get();
        $sub_cats= $store->subCategories()->with('mainCategories')->get();
        
        //Get Selected Sub Categories:
        $select_sub_cats= [];
        foreach ($sub_cats as $sub_cat) {
            if(!in_array($sub_cat->id, $select_sub_cats)){
                array_push($select_sub_cats, $sub_cat->id);
                }    
        }

        //Get Selected Main Categories:
        $select_main_cats= []; 
        foreach ($sub_cats as $sub_cat) {
            foreach($sub_cat->mainCategories as $main_cat){
            if(!in_array($main_cat->id, $select_main_cats)){
                array_push($select_main_cats, $main_cat->id);
                } 
            } 
        }

        //Get most saled products 
        $most_sale= $store->products()->where('approve', 1)->with('productImages', 'rating')->orderBy('sell_count', 'desc')->take(4)->get();
        

        if(Session::get('lang') == 'en'){
            return view('en.store.store-page', compact('store', 'products', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
        }
            return view('ar.store.store-page', compact('store', 'products', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
    }

    /*
    * display products belong to this Sub Category
    */
    public function categoryProducts($store_id, $subcat_id){
        //Eager Loading used
        $store= Store::where('id', $store_id)->with('country', 'city')->first();

        //Get store products in this sub category
        $products= $store->products()->where('approve', 1)->where('sub_category_id', $subcat_id)->with('productImages', 'rating')->paginate(21);

        $all_main_cats= MainCategory::with('subCategories')->get();
        $sub_cats= $store->subCategories()->with('mainCategories')->get();
        
        //Get Selected Sub Categories:
        $select_sub_cats= [];
        foreach ($sub_cats as $sub_cat) {
            if(!in_array($sub_cat->id, $select_sub_cats)){
                array_push($select_sub_cats, $sub_cat->id);
                }    
        }

        //Get Selected Main Categories:
        $select_main_cats= []; 
        foreach ($sub_cats as $sub_cat) {
            foreach($sub_cat->mainCategories as $main_cat){
            if(!in_array($main_cat->id, $select_main_cats)){
                array_push($select_main_cats, $main_cat->id);
                } 
            } 
        }

        //Get most saled products 
        $most_sale= $store->products()->where('approve', 1)->with('productImages', 'rating')->orderBy('sell_count', 'desc')->take(4)->get();
        

        if(Session::get('lang') == 'en'){
            return view('en.store.store-page', compact('store', 'products', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
        }
            return view('ar.store.store-page', compact('store', 'products', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
    }

    /*
    * Display Store Ratings
    */
    public function ratingShow($store_id)
    {
        //Eager Loading used
        $store= Store::where('id', $store_id)->with('country', 'city')->first();

        //Get store ratings
       $ratings= $store->rating()->paginate(21);

        $all_main_cats= MainCategory::with('subCategories')->get();
        $sub_cats= $store->subCategories()->with('mainCategories')->get();
        
        //Get Selected Sub Categories:
        $select_sub_cats= [];
        foreach ($sub_cats as $sub_cat) {
            if(!in_array($sub_cat->id, $select_sub_cats)){
                array_push($select_sub_cats, $sub_cat->id);
                }    
        }

        //Get Selected Main Categories:
        $select_main_cats= []; 
        foreach ($sub_cats as $sub_cat) {
            foreach($sub_cat->mainCategories as $main_cat){
            if(!in_array($main_cat->id, $select_main_cats)){
                array_push($select_main_cats, $main_cat->id);
                } 
            } 
        }

        //Get most saled products 
        $most_sale= $store->products()->where('approve', 1)->with('productImages', 'rating')->orderBy('sell_count', 'desc')->take(4)->get();

        if(Session::get('lang') == 'en'){
            return view('en.store.store-rating-page', compact('store', 'ratings', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
        }
            return view('ar.store.store-rating-page', compact('store', 'ratings', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get('group') == 'merchant'){
        
        $main_cats= MainCategory::where('active', 1)->with(['subCategories'=> function($query){
            $query->where('active', 1);
        }])->get();
        
        $countries= Country::pluck('ar_name', 'id');
        
        if(Session::get('lang') == 'en'){
            return view('en.store.store-create', compact('main_cats', 'countries'));
            }
            return view('ar.store.store-create', compact('main_cats', 'countries'));
        }
        else return Redirect('/');
    }

    //ajax City menu 
    public function city(Request $request)
    {
        $country_id= $request->input('country_id');

        $cites= City::where('country_id', $country_id)->get();

        return $cites;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Session::get('group') == 'merchant'){
        $store= new Store;
        $store->ar_name= $request->input('ar_name');
        $store->en_name= $request->input('en_name');
        $store->ar_description= $request->input('ar_description');
        $store->en_description= $request->input('en_description');
        $store->active= 0;
        $store->country_id= $request->input('country');
        $store->city_id= $request->input('city');
        $store->user_id= Session::get('user_id');
        $store->trusted= 0;
        $store->store_policy= $request->input('store_policy');

        //Upload Logos, Banners images
        if ($request->file('ar_logo')){
            $file= $request->file('ar_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_logo= 'images/'.$filename;
        }
        else {$store->ar_logo= 'ar-assets/back-end/images/def-logo.png';}
        //
        if ($request->file('en_logo')){
            $file= $request->file('en_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_logo= 'images/'.$filename;
        }
        else {$store->en_logo= 'ar-assets/back-end/images/def-logo.png';}
        //
        if ($request->file('ar_banner')){
            $file= $request->file('ar_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_banner= 'images/'.$filename;
        }
        else {$store->ar_banner= 'ar-assets/back-end/images/def-logo.png';}
        //
        if ($request->file('en_banner')){
            $file= $request->file('en_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_banner= 'images/'.$filename;
        }
        else {$store->en_banner= 'ar-assets/back-end/images/def-logo.png';}
        
        //Get Return Policy:
        if($request->input('return_policy')){
            $store->return_policy= 1;
            $store->return_text= $request->input('return_policy_text');
        }
        else { $store->return_policy= 0; }

        //Get Seller Guaranty:
        if($request->input('seller_guaranty')){
            $store->seller_guaranty= 1;
            $store->guaranty_text= $request->input('seller_guaranty_text');
        }
        else { $store->seller_guaranty= 0; }

        $store->save();

        $store->subCategories()->sync($request->get('my_multi_select1'));


        if(Session::get('lang') == 'en'){
            return Redirect::to('my-stores')->with('message', 'Store Created Successfully, you can Re-edit your store infromation later.');
            }
            return Redirect::to('my-stores')->with('message', 'تم إنشاء المتجر بنجاح، يمكنك تعديل بيانات متجرك لاحقاً.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Eager Loading used
        $store= Store::where('id', $id)->with('country', 'city')->first();

        $products= $store->products()->where('approve', 1)->with('productImages', 'rating')->paginate(21);
        
        $all_main_cats= MainCategory::with('subCategories')->get();
        $sub_cats= $store->subCategories()->with('mainCategories')->get();
        
        //Get Selected Sub Categories:
        $select_sub_cats= [];
        foreach ($sub_cats as $sub_cat) {
            if(!in_array($sub_cat->id, $select_sub_cats)){
                array_push($select_sub_cats, $sub_cat->id);
                }    
        }

        //Get Selected Main Categories:
        $select_main_cats= []; 
        foreach ($sub_cats as $sub_cat) {
            foreach($sub_cat->mainCategories as $main_cat){
            if(!in_array($main_cat->id, $select_main_cats)){
                array_push($select_main_cats, $main_cat->id);
                } 
            } 
        }

        //Get most saled products 
        $most_sale= $store->products()->where('approve', 1)->with('productImages', 'rating')->orderBy('sell_count', 'desc')->take(4)->get();
        

        if(Session::get('lang') == 'en'){
            return view('en.store.store-page', compact('store', 'products', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
        }
            return view('ar.store.store-page', compact('store', 'products', 'sub_cats', 'select_main_cats', 'all_main_cats', 'select_sub_cats', 'most_sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $store= Store::find($id);
        
        //use for Validation:
        $user_store= $store->user_id; 
        $user_id= Session::get('user_id');
        
        if(Session::get('group') == 'merchant' && $user_store == $user_id){
            
            $main_cats= MainCategory::with('subCategories')->get();

            //Get Categories for the list:
            $main_cats= MainCategory::with('subCategories')->get();
            //Get selected categories:
            $selected= []; 
            foreach($store->subCategories as $sub_category){
                array_push($selected, $sub_category->id);
                }
                
            if(Session::get('lang') == 'en'){
                $countries= Country::pluck('en_name', 'id');
                $cities= City::where('country_id', $store->country_id)->pluck('en_name', 'id');
                return view('en.store.store-merch-edit', compact('store', 'main_cats', 'selected', 'main_cats', 'main_cats', 'countries', 'cities'));
            }
                $countries= Country::pluck('ar_name', 'id');
                $cities= City::where('country_id', $store->country_id)->pluck('ar_name', 'id');
                return view('ar.store.store-merch-edit', compact('store', 'main_cats', 'selected', 'main_cats', 'countries', 'cities'));

        }
        return Redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Session::get('group') == 'merchant'){
        $store= Store::find($id);
        $store->ar_name= $request->input('ar_name');
        $store->en_name= $request->input('en_name');
        $store->ar_description= $request->input('ar_description');
        $store->en_description= $request->input('en_description');
        $store->country_id= $request->input('country');
        $store->city_id= $request->input('city');
        $store->store_policy= $request->input('store_policy');
        
        //Upload Logos, Banners images
        if ($request->file('ar_logo')){
            //delete old image
            if ($store->ar_logo != "ar-assets/images/def-logo.png"){
            File::delete($store->ar_logo);
                }
            $file= $request->file('ar_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_logo= 'images/'.$filename;
        }
        
        //
        if ($request->file('en_logo')){
            //delete old image
            if ($store->en_logo != "ar-assets/images/def-logo.png"){
            File::delete($store->en_logo);
                }
            $file= $request->file('en_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_logo= 'images/'.$filename;
        }
        
        //
        if ($request->file('ar_banner')){
            //delete old image
            if ($store->ar_banner != "ar-assets/images/def-logo.png"){
            File::delete($store->ar_banner);
                }
            $file= $request->file('ar_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_banner= 'images/'.$filename;
        }
        
        //
        if ($request->file('en_banner')){
            //delete old image
            if ($store->en_banner != "ar-assets/images/def-logo.png"){
            File::delete($store->en_banner);
                }
            $file= $request->file('en_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_banner= 'images/'.$filename;
        }

        //Get Return Policy:
        if($request->input('return_policy')){
            $store->return_policy= 1;
            $store->return_text= $request->input('return_policy_text');
        }
        else { $store->return_policy= 0; }

        //Get Seller Guaranty:
        if($request->input('seller_guaranty')){
            $store->seller_guaranty= 1;
            $store->guaranty_text= $request->input('seller_guaranty_text');
        }
        else { $store->seller_guaranty= 0; }
        
        $store->save();

        $store->subCategories()->sync($request->get('my_multi_select1'));


        if(Session::get('lang') == 'en'){
            return Redirect::to('my-stores')->with('message', 'Store Updated Successfully!');
            }
            return Redirect::to('my-stores')->with('message', 'تم تعديل بيانات المتجر بنجاح!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::get('group') == 'merchant'){
            $store= Store::find($id);
            $store->subCategories()->detach();
            $store->delete();

            if(Session::get('lang') == 'en'){
            return Redirect::to('my-stores')->with('message', 'Store Deleted Successfully!');
            }
            return Redirect::to('my-stores')->with('message', 'تم حذف المتجر بنجاح!');
        }
    }
}
