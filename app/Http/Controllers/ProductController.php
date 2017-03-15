<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Section;
use App\MainCategory;
use App\SubCategory;
use App\ProductSpecs;
use App\Color;
use App\ColorImage;
use App\ProductImage;
use App\CommercialImage;
use App\Store;
use App\Currency;
use App\ShippingCompany;
use App\Country;
use App\Http\Requests;
use Session, Redirect, File, Auth, DB;

class ProductController extends Controller
{
    /*
    * Customized functions inside controller
    * - productCreate() => I deleted create() function to pass store_id
    * - addProdSearch(): search for similar products before create product 
    * - productsEditList(): to list products for edit or delete in merchant admin
    * - deleteProdColor(): ajax function to delete the product colors
    * - deleteColorImage(): ajax function to delete the color images
    * - deleteProductImage(): ajax function to delete Product Images
    * - deleteCommercialImage(): ajax function to delete Product Commercial Images
    * - deleteQtyOffer(): ajax function to delete Quantity Offer
    * - allPendingProducts(): [Super Admin] to display all pening products
    * - adminApproveProduct(): [Any Admin] Display Product to approve
    * - merchPorductsStatus(): [Merchant] Display Products Status
    * - stockStatus(): [Merchant] Display stock status for products 
    * - stockUpdate(): [Merchant] To update stock value
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        } 

    /*
    * To list products for edit or delete in merchant admin
    */
    public function productsEditList($store_id)
    {
        $products= Product::where('store_id', $store_id)->orderBy('id','desc')->paginate(30);

        if(Session::get('lang') == 'en'){
            return view('en.product.products-edit-list', compact('products'));
        }
            return view('ar.product.products-edit-list', compact('products'));
    }

    /*
    * [Super Admin] to display all pening products
    */
    public function allPendingProducts()
    {
        $products= Product::where('approve', 0)->paginate(30);

        if(Session::get('lang') == 'en'){
            return view('en.product.all-pending-products', compact('products'));
        }
            return view('ar.product.all-pending-products', compact('products'));    
    }

    /*
    * [Any Admin] Display Product to approve
    */
    public function adminApproveProduct($id)
    {
        if(Session::get('group') == 'admin'){
        $product= Product::find($id);

        //get dropdowns Values
            $sections= Section::pluck('ar_title', 'id');
        
            //get selected Subcategory: 
            $selected_sub= SubCategory::find($product->sub_category_id);
            
            //get all related Main Categories and Subcategories for the dropdown
            $main_categories= MainCategory::where('section_id', $selected_sub->mainCategories[0]->section->id)->pluck('ar_title', 'id');
            $sub_categories= $selected_sub->mainCategories[0]->subCategories->pluck('ar_title', 'id');

            //get all sub category sizes:
            $all_sizes= $selected_sub->sizes()->get();
            //get the selected saved sizes:
            $selected_sizes= [];
            foreach ($product->sizes as $size) {
                array_push($selected_sizes, $size->ar_size);
            }

            //get all sub category specifications:
            $all_specs= $selected_sub->specs()->get();
            //get inputed specs
            $used_specs= $product->specs()->select('ar_title', 'ar_detail', 'en_title', 'en_detail', 'id')->get();

            //get selected colors or colors images: 
            if ($product->colors_type == 'colors'){
                $selected_colors= $product->colors()->select('color', 'id')->get();
            }
            else{
                $selected_colors= $product->colorimages()->select('image_path', 'id')->get();
            }
            
            //get product images:
            $product_images= $product->productImages()->select('image_path', 'id')->get();

        if(Session::get('lang') == 'en'){
            return view('en.product.admin-review-product', compact('product', 'sections', 'selected_sub', 'main_categories', 'sub_categories', 'all_sizes', 'all_specs', 'used_specs', 'selected_sizes', 'selected_colors', 'product_images'));
        }
            return view('ar.product.admin-review-product', compact('product', 'sections', 'selected_sub', 'main_categories', 'sub_categories', 'all_sizes', 'all_specs', 'used_specs', 'selected_sizes', 'selected_colors', 'product_images')); 
        }
        return Redirect('/');
    }

    /*
    *  [Merchant] Display Products Status
    */
    public function merchPorductsStatus($store_id)
    {
        $store= Store::find($store_id);
        //use for Validation:
        $user_store= Store::find($store_id)->user_id; 
        $user_id= Session::get('user_id');

        if(Session::get('group') == 'merchant' && $user_store == $user_id){
            $products= $store->products;

            if(Session::get('lang') == 'en'){
                return view('en.product.product-status-list[mer]', compact('products'));
                }
                return view('ar.product.product-status-list[mer]', compact('products')); 
        }
        return Redirect('/');
    }

    
    /*
    * [Merchant] Display stock status for products
    */
    public function stockStatus($store_id)
    {
        $store= Store::find($store_id);
        //use for Validation:
        $user_store= $store->user_id; 
        $user_id= Session::get('user_id');

        if(Session::get('group') == 'merchant' && $user_store == $user_id){
            $products= $store->products()->orderBy('stock')->paginate(30);

            if(Session::get('lang') == 'en'){
                return view('en.product.stock-list[mer]', compact('products'));
                }
                return view('ar.product.stock-list[mer]', compact('products')); 
        }
        return Redirect('/');
    }

    /*
    *  [Merchant] To update stock value
    */
    public function stockUpdate(Request $request, $id)
    {
      if(Session::get('group') == 'merchant'){
        $product= Product::find($id);
        $product->stock= $request->input('stock');
        $product->save();

        if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Stock updated successfully!');
                }
                return Redirect::back()->with('message', 'تم تحديث المخزون بنجاح!');       
      }  
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

    //search for similar products before create product
    public function addProdSearch(Request $request)
    {
        $search= $request->input('search');
        if ($request->input('lang') == 'en'){
            $products= Product::where('en_title', 'like', '%'.$search.'%')->get();
        }
        else{
            $products= Product::where('ar_title', 'like', '%'.$search.'%')->get();
            }
        return $products;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if(Session::get('group') == 'merchant'){
        
        //get dropdowns Values
        $sections= Section::where('active', 1)->pluck('ar_title', 'id');
        //get store id:
        $store_id= $request->input('store_id');
        //get specs heads:
        $specs= ProductSpecs::all();

        //get Currencies:
        $currencies= Currency::all();
        
        //get similar product details, (in case of user didn't use skip button):
        if(!$request->input('skip')){
            $product_id= $request->input('similar');
            $product= Product::find($product_id);
            //$similar is used to determine if similar product used or not
            $similar= 1;

            //get selected Subcategory: 
            $selected_sub= SubCategory::find($product->sub_category_id);
            //get all related Main Categories and Subcategories for the dropdown
            $main_categories= MainCategory::where('section_id', $selected_sub->mainCategories[0]->section->id)->pluck('ar_title', 'id');
            $sub_categories= $selected_sub->mainCategories[0]->subCategories->pluck('ar_title', 'id');
            }
        //else, give variable values with empty
        else{
            $similar= 0;
            }
        
        if(Session::get('lang') == 'en'){
            return view('en.product.product-create', compact('sections', 'store_id', 'specs', 'product', 'similar', 'selected_sub', 'main_categories', 'sub_categories', 'currencies'));
            }
        return view('ar.product.product-create', compact('sections', 'store_id', 'specs', 'product', 'similar', 'selected_sub', 'main_categories', 'sub_categories', 'currencies'));
        }
        else return Redirect('/');
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
            
            $product= new Product;
            $product->approve= 0;
            $product->store_id= $request->input('store_id');
            $product->sub_category_id= $request->input('subcategory');
            $product->ar_title= $request->input('ar_title');
            $product->en_title= $request->input('en_title');
            $product->ar_short_descrip= $request->input('ar_short_descrip');
            $product->en_short_descrip= $request->input('en_short_descrip');
            $product->ar_long_descrip= $request->input('ar_long_descrip');
            $product->en_long_descrip= $request->input('en_long_descrip');
            $product->ar_unit_type= $request->input('ar_unit_type');
            $product->en_unit_type= $request->input('en_unit_type');
            $product->ar_package_weight= $request->input('ar_package_weight');
            $product->en_package_weight= $request->input('en_package_weight');
            $product->ar_package_size= $request->input('ar_package_size'); 
            $product->en_package_size= $request->input('en_package_size');
            $product->price_offer= 0;

            $product->price= $request->input('price');
            $product->price_type= $request->input('price_type');
            $product->video= $request->input('video'); 
            //Save Quantity Offer Avalibality
            if($request->input('offers')){
                $product->qty_offer= 1;
            }else{
                $product->qty_offer= 0;
            }

            //$product->currency_id= $request->input('currency');
            $product->currency_id= 1;
            $product->stock= $request->input('stock');
            //save what type of colors saved
            $product->colors_type= $request->input('color_option');
            $product->save();

            //get number of selected sizes
            $sizes_count= $request->input('sizes_count');
            //Save Sizes
            for ($i=1; $i < $sizes_count+1; $i++) { 
                if ($request->input('ar_size'.$i)){
                // $product->sizes()->create(['ar_size'=>$request->input('ar_size'.$i), 'en_size'=>$request->input('en_size'.$i)]);
                $product->sizes()->attach([$request->input('size_id'.$i)]);
                }
             }

            $specs_count= $request->input('specs_count');
            //Save Specs
            for ($x=1; $x < $specs_count+1; $x++) { 
                if ($request->input('ar_detail'.$x) || $request->input('en_detail'.$x)){
                $product->specs()->create(['ar_title'=>$request->input('ar_title'.$x), 'ar_detail'=>$request->input('ar_detail'.$x), 'en_title'=>$request->input('en_title'.$x), 'en_detail'=>$request->input('en_detail'.$x)]);
                    }
             }
            //solid colors create
            $colors_count= $request->input('colors_count');
            //Get selected colors
            for ($c=1; $c < $colors_count+1; $c++) {
                if ($request->input('color'.$c)){
                $product->colors()->create(['color'=>$request->input('color'.$c)]);
                }
            }

            //photo colors upload:
            //get number of upload boxes
            $colors_count= $request->input('colors_count');
            //Get selected colors
            for ($cm=1; $cm < $colors_count+1; $cm++) {
                if ($request->file('color_image'.$cm)){
                $file= $request->file('color_image'.$cm);
                $destinationPath= 'images';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $product->colorimages()->create(['image_path'=>'images/'.$filename]);
                }
            }

            if($request->input('offers')){
                //Get Quantity offers number 
            $offers_count= $request->input('offers_count');
            //Create Quantity Offers in qty_offers table:
            for($qf=1; $qf < $offers_count+1; $qf++){
                DB::table('qty_offers')->insert(['product_id'=>$product->id, 'qty'=>$request->input('offer_qty'.$qf), 'new_price'=>$request->input('offer_price'.$qf)]);
                }
            }
            


            //upload products images:
            //get number of upload boxes
            $images_count= $request->input('images_count');
            //upload process
            for ($m=1; $m < $images_count+1; $m++) {
                if ($request->file('pro_image'.$m)){
                $file= $request->file('pro_image'.$m);
                $destinationPath= 'images';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);

                $product->productImages()->create(['image_path'=>'images/'.$filename]);
                }
            }


            //upload Commercial images:
            //get number of upload boxes
            $com_images_count= $request->input('comm_images_count');
            //upload process
            for ($com=1; $com < $com_images_count+1; $com++) {
                if ($request->file('comm_image'.$com)){
                $file= $request->file('comm_image'.$com);
                $destinationPath= 'images';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);

                $product->commercialImages()->create(['image_path'=>'images/'.$filename]);
                }
            }

        
        //----> Data for Shipping Page: 
        $product_id= $product->id;
        $store_id= $request->input('store_id');
        $shipping_cos= ShippingCompany::all();
        $countries= Country::with('cities')->get();
        $currencies= Currency::all();


        // if (Session::get('lang') == "en"){
        //         return Redirect::to('products-edit-list/'.$store_id)->with('message', "Product deleted successfully!");
        //     }
        //         return Redirect::to('products-edit-list/'.$store_id)->with('message', "تم حذف المنتج بنجاح");
        // }

        if (Session::get('lang') == "en"){
                return view('en.shipping.[merch]product-shipping-create', compact('product_id', 'store_id', 'shipping_cos', 'countries', 'currencies'))->with(Session::flash('message', 'Product deleted successfully please choose shipping companies!'));
            }
                return view('ar.shipping.[merch]product-shipping-create', compact('product_id', 'store_id', 'shipping_cos', 'countries', 'currencies'))->with(Session::flash('message', 'تم إنشاء المنتج بنجاح يرجى اختيار شركات الشحن!'));
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
        $product= Product::where('id', $id)->where('approve', 1)->with('subcategory.maincategories', 'productImages', 'commercialImages', 'currency', 'colors', 'colorimages', 'sizes', 'specs', 'store', 'rating')->firstOrFail();
        
        if($product->qty_offer == 1){
            $qty_offers= DB::table('qty_offers')->where('product_id', $product->id)->get();

            $qty_array= [];
            foreach ($qty_offers as $offer) {
                array_push($qty_array, $offer->qty);
            }
            $min_offer= min($qty_array);
        }
        else { $qty_offers= false; }

        $most_sale= Product::where('store_id', $product->store->id)->where('approve', 1)->orderBy('sell_count', 'desc')->take(4)->get();

        $countries= Country::select('id', 'ar_name', 'en_name')->get(); 

        $similar_products= Product::where('sub_category_id', $product->sub_category_id)->where('approve', 1)->with('productImages', 'currency')->take(7)->inRandomOrder()->get();
        
       
        $currencies= Currency::all();

       if (Session::get('lang') == "en"){
            return view('en.product.product-details', compact('product', 'qty_offers', 'min_offer', 'most_sale', 'similar_products', 'countries', 'currencies'));
       }
            return view('ar.product.product-details', compact('product', 'qty_offers', 'min_offer', 'most_sale', 'similar_products', 'countries', 'currencies')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $store_id= $request->input('store_id');

        $product= Product::where('id', $id)->with('currency')->first();

        //get Currencies:
        $currencies= Currency::all();

        //check if the product belongs to this merchant and store or not: 
        if(Session::get('group') == 'merchant' &&  $product->store_id == $store_id){

            //get dropdowns Values
            $sections= Section::pluck('ar_title', 'id');
        
            //get selected Subcategory: 
            $selected_sub= SubCategory::find($product->sub_category_id);
            
            //get all related Main Categories and Subcategories for the dropdown
            $main_categories= MainCategory::where('section_id', $selected_sub->mainCategories[0]->section->id)->pluck('ar_title', 'id');
            $sub_categories= $selected_sub->mainCategories[0]->subCategories->pluck('ar_title', 'id');

            //get all sub category sizes:
            $all_sizes= $selected_sub->sizes()->get();
            //get the selected saved sizes:
            $selected_sizes= [];
            foreach ($product->sizes as $size) {
                array_push($selected_sizes, $size->ar_size);
            }

            //get all sub category specifications:
            $all_specs= $selected_sub->specs()->get();
            //get inputed specs
            $used_specs= $product->specs()->select('ar_title', 'ar_detail', 'en_title', 'en_detail', 'id')->get();

            //get selected colors or colors images: 
            if ($product->colors_type == 'colors'){
                $selected_colors= $product->colors()->select('color', 'id')->get();
            }
            else{
                $selected_colors= $product->colorimages()->select('image_path', 'id')->get();
            }
            
            //get quantity offers:
            //check if there qty offers first
            if ($product->qty_offer == 1) {
                $qty_offers= DB::table('qty_offers')->where('product_id', $product->id)->get();
            }

            //get product images:
            $product_images= $product->productImages()->select('image_path', 'id')->get();

            //get Commercial images:
            $comm_images= $product->commercialImages()->select('image_path', 'id')->get();

            if (Session::get('lang') == "en"){
                return view('en.product.product-edit', compact('store_id', 'product', 'sections', 'selected_sub', 'main_categories', 'sub_categories', 'all_sizes', 'selected_sizes', 'all_specs', 'used_specs', 'selected_colors', 'qty_offers', 'product_images', 'comm_images', 'currencies'));
            }
                return view('ar.product.product-edit', compact('store_id', 'product', 'sections', 'selected_sub', 'main_categories', 'sub_categories', 'all_sizes', 'all_specs', 'used_specs', 'selected_sizes', 'selected_colors', 'qty_offers', 'product_images', 'comm_images', 'currencies'));
        }
        else return Redirect('/');
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
        $store_id= $request->input('store_id');

        $product= Product::find($id);

        //check if the product belongs to this merchant and store or not: 
        if(Session::get('group') == 'merchant' &&  $product->store_id == $store_id || Session::get('group') == 'admin'){

            $product->sub_category_id= $request->input('subcategory');
            $product->ar_title= $request->input('ar_title');
            $product->en_title= $request->input('en_title');
            $product->ar_short_descrip= $request->input('ar_short_descrip');
            $product->en_short_descrip= $request->input('en_short_descrip');
            $product->ar_long_descrip= $request->input('ar_long_descrip');
            $product->en_long_descrip= $request->input('en_long_descrip');
            $product->colors_type= $request->input('color_option');
            $product->price= $request->input('price');
            $product->price_type= $request->input('price_type');
            $product->price_offer= 0;
            
            //Save Quantity Offer Avalibality
            if($request->input('offers')){
                $product->qty_offer= 1;
            }else{
                $product->qty_offer= 0;
            }

            $product->currency_id= $request->input('currency');
            $product->stock= $request->input('stock');
            $product->ar_unit_type= $request->input('ar_unit_type');
            $product->en_unit_type= $request->input('en_unit_type');
            $product->ar_package_weight= $request->input('ar_package_weight');
            $product->en_package_weight= $request->input('en_package_weight');
            $product->ar_package_size= $request->input('ar_package_size'); 
            $product->en_package_size= $request->input('en_package_size');
            $product->video= $request->input('video');

            //delete old sizes:
            $product->sizes()->detach();
            //get number of selected sizes
            $sizes_count= $request->input('sizes_count');
            //Save Sizes
            for ($i=1; $i < $sizes_count+1; $i++) { 
                if ($request->input('ar_size'.$i)){
                $product->sizes()->attach([$request->input('size_id'.$i)]);
                }
             }

            //delete old specs:
            $product->specs()->delete();
            $specs_count= $request->input('specs_count');
            //Save Specs
            for ($x=1; $x < $specs_count+1; $x++) { 
                if ($request->input('ar_detail'.$x) || $request->input('en_detail'.$x)){
                $product->specs()->create(['ar_title'=>$request->input('ar_title'.$x), 'ar_detail'=>$request->input('ar_detail'.$x), 'en_title'=>$request->input('en_title'.$x), 'en_detail'=>$request->input('en_detail'.$x)]);
                    }
             }

            //delete old colors first:
            $product->colors()->delete();
            //solid colors create
            $colors_count= $request->input('colors_count');
            //Get selected colors
            for ($c=1; $c < $colors_count+1; $c++) {
                if ($request->input('color'.$c)){
                $product->colors()->create(['color'=>$request->input('color'.$c)]);
                }
            }
            //Get Colored uploaded Images
            for ($cm=1; $cm < $colors_count+1; $cm++) {
                if ($request->file('color_image'.$cm)){
                $file= $request->file('color_image'.$cm);
                $destinationPath= 'images';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $product->colorimages()->create(['image_path'=>'images/'.$filename]);
                }
            }

            if ($request->input('offers')) {
            //Get Quantity offers number 
            $offers_count= $request->input('offers_count');
            //Delete old qty_offers
            DB::table('qty_offers')->where('product_id', $product->id)->delete();
            //Create Quantity Offers in qty_offers table:
            for($qf=1; $qf < $offers_count+1; $qf++){
                DB::table('qty_offers')->insert(['product_id'=>$product->id, 'qty'=>$request->input('offer_qty'.$qf), 'new_price'=>$request->input('offer_price'.$qf)]);
                }
            }

            //upload products images:
            //get number of upload boxes
            $images_count= $request->input('images_count');
            //upload process
            for ($m=1; $m < $images_count+1; $m++) {
                if ($request->file('pro_image'.$m)){
                $file= $request->file('pro_image'.$m);
                $destinationPath= 'images';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);

                $product->productImages()->create(['image_path'=>'images/'.$filename]);
                }
            }

            //upload products images:
            //get number of upload boxes
            $comm_images_count= $request->input('comm_images_count');
            //upload process
            for ($com=1; $com < $comm_images_count+1; $com++) {
                if ($request->file('comm_image'.$com)){
                $file= $request->file('comm_image'.$com);
                $destinationPath= 'images';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);

                $product->commercialImages()->create(['image_path'=>'images/'.$filename]);
                }
            }

            //--------------------------------
            //This part belongs website "Admins":
            if ($request->input('request_type') == 'admin_approve') {

                if($request->input('review') == 'accept'){
                    $product->approve= 1;   
                }
                else $product->approve= 2;

                $product->save();

                if (Session::get('lang') == "en"){
                return Redirect::to('all-pending-products')->with('message', 'Product Status Updated successfully!');
                }
                return Redirect::to('all-pending-products')->with('message', 'تم تحديث حالة المنتج بنجاح!'); 
            }
            //---- end of Admin area ---------

            $product->save();

            if (Session::get('lang') == "en"){
                return Redirect::to('products-edit-list/'.$store_id)->with('message', 'Product Updated successfully!');
            }
                return Redirect::to('products-edit-list/'.$store_id)->with('message', 'تم تحديث المنتج بنجاح!'); 
        }
        else return Redirect('/'); 
    }

    /*
    * Ajax function to delete the product colors
    */
    public function deleteProdColor(Request $req)
    {
        $color= Color::find ( $req->id );
        $color->delete();
        return response ()->json ();
    }
    
    /*
    * Ajax function to delete color image in product edit
    */
    public function deleteColorImage(Request $req)
    {
        $img= ColorImage::find ( $req->id );
        File::delete($img->image_path);
        $img->delete();
        return response ()->json ();
    }

    /*
    * Ajax function to delete Product Images
    */
    public function deleteProductImage(Request $req)
    {
        $img= ProductImage::find ( $req->id );
        File::delete($img->image_path);
        $img->delete();
        return response ()->json ();
    }

    /*
    * Ajax function to delete Product Commercial Images
    */
    public function deleteCommercialImage(Request $req)
    {
        $img= CommercialImage::find ( $req->id );
        File::delete($img->image_path);
        $img->delete();
        return response ()->json ();
    }

    /*
    * ajax function to delete Quantity Offer
    */
    public function deleteQtyOffer(Request $req)
    {
        DB::table('qty_offers')->where('id', $req->id )->delete();
        return response ()->json ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product= Product::find($id);
        $store_id= $request->input('store_id');

        //check if the product belongs to this merchant and store or not: 
        if(Session::get('group') == 'merchant' &&  $product->store_id == $store_id){
            $product->colors()->delete();
            $product->specs()->delete();

            //delete related colors images
            foreach ($product->colorimages as $color_image) {
                File::delete($color_image->image_path);
            }  
            
            //delete Quantity offers (query builder)
            DB::table('qty_offers')->where('product_id', $product->id)->delete();

            //delete the product images
            foreach ($product->productImages as $image) {
                File::delete($image->image_path);
            }  
            
            $product->delete();

            if (Session::get('lang') == "en"){
                return Redirect::to('products-edit-list/'.$store_id)->with('message', "Product deleted successfully!");
            }
                return Redirect::to('products-edit-list/'.$store_id)->with('message', "تم حذف المنتج بنجاح");
        }
        return Redirect('/');
    }
}
