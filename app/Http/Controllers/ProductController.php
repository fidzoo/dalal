<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Section;
use App\MainCategory;
use App\SubCategory;
use App\ProductSpecs;
use App\Http\Requests;
use Session, Redirect, File;

class ProductController extends Controller
{
    /*
    * Customized functions inside controller
    * - productCreate() => I deleted create() function to pass store_id
    * - addProdSearch(): search for similar products before create product    
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
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
    public function productCreate(Request $request)
    {
        if(Session::get('group') == 'merchant'){
        
        //get dropdowns Values
        $sections= Section::pluck('ar_title', 'id');
        //get store id:
        $store_id= $request->input('store_id');
        //get specs heads:
        $specs= ProductSpecs::all();
        //get similar product details, (in case of user didn't use skip button):
        if(!$request->input('skip')){
            $product_id= $request->input('similar');
            $product= Product::find($product_id);
            //$similar is used to determine if similar product used or not
            $similar= 1;
            }
        //else, give variable values with empty
        else{
            $similar= 0;
            }
        
        if(Session::get('lang') == 'en'){
            return view('en.product.product-create', compact('sections', 'store_id', 'specs', 'product', 'similar'));
            }
        return view('product.product-create', compact('sections', 'store_id', 'specs', 'product', 'similar'));
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

            $product->price= $request->input('price');
            $product->currency= $request->input('currency');
            $product->stock= $request->input('stock');
            //save what type of colors saved
            $product->colors_type= $request->input('color_option');
            $product->save();

            //get number of selected sizes
            $sizes_count= $request->input('sizes_count');
            //Save Sizes
            for ($i=1; $i < $sizes_count+1; $i++) { 
                if ($request->input('ar_size'.$i)){
                $product->sizes()->create(['ar_size'=>$request->input('ar_size'.$i), 'en_size'=>$request->input('en_size'.$i)]);
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
                $product->colorimage()->create(['image_path'=>'images/'.$filename]);
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

        if (Session::get('lang') == "en"){
            return view('en.product.products-list')->with('message', 'Product created successfully!');
            }
            return "تم إنشاء المنتج بنجاح!";
            //return view('product.products-list')->with('message', 'تم إنشاء المنتج بنجاح!');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
