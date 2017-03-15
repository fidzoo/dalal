<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;
use App\SubCategory;
use App\Size;
use App\ProductSpecs;
use App\Product;
use App\Banner;
use App\Http\Requests;
use Session, Redirect, File, DB;

class SubCategoryController extends Controller
{
    /**
    List of aditional customized methods:
    - subList()
    - deleteSize()
    - deleteSpec()
    - ajaxSubcategory()
    - ajaxSizes()
    - ajaxSpecs()
    - categoryRequestForm(): [Merchant] To display Category request Form.
    - categoryRequestSubmit(): [Merchant] submit suggested categories.   
    - categoryRequestDisplay(): [Admin] To display the Categories requests list
    - categoryRequestDelete():  [Admin] To delete the Category request   
    **/

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        } 
        
    /*
    * Admin Sub-Category list
    */
    public function subList()
    {
        $main_cats= MainCategory::with('subCategories')->get();
        
        if(Session::get('lang') == 'en'){
            return view ('en.sub-category.sub-category-list', compact('main_cats'));
        }
            return view ('ar.sub-category.sub-category-list', compact('main_cats'));
    }

    public function ajaxSubcategory(Request $request)
    {
        $mcategory_id= $request->input('mcategory_id');
        $mcategory= MainCategory::find($mcategory_id);
        $subcategories= $mcategory->approveSubCats;

        return $subcategories;
    }

    public function ajaxSizes(Request $request)
    {
        $subcat_id= $request->input('subcategory_id');
        $subcat= SubCategory::find($subcat_id);
        $sizes= $subcat->sizes()->get();

        return $sizes;
    }

    public function ajaxSpecs(Request $request)
    {
        $subcat_id= $request->input('subcategory_id');
        $specs= ProductSpecs::where('specsable_type', 'App\SubCategory')->where('specsable_id', $subcat_id)->get();

        return $specs;
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
        if(Session::get('group') == 'admin'){
            //get Sections for dropdown list
            $main_categories= MainCategory::pluck('ar_title', 'id');

            if(Session::get('lang') == 'en'){
                return view('en.sub-category.sub-category-create', compact('main_categories'));
            }
                return view('ar.sub-category.sub-category-create', compact('main_categories'));
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
        if(Session::get('group') == 'admin'){
            $sub_cat= new SubCategory;
            $sub_cat->ar_title= $request->input('ar_title');
            $sub_cat->en_title= $request->input('en_title');
            $sub_cat->active= 1;
            
            //icon image
            if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->image= "ar-assets\back-end\images/".$filename;
            }

            //Arabic banner image
            if ($request->file('ar_banner')){
            $file= $request->file('ar_banner');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->ar_banner= "ar-assets\back-end\images/".$filename;
            }

            //English banner image
            if ($request->file('en_banner')){
            $file= $request->file('en_banner');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->en_banner= "ar-assets\back-end\images/".$filename;
            }

            $sub_cat->save();

            //Save Main Categories
            $sub_cat->mainCategories()->sync($request->get('main_cats'));
            
            //get number of inputed sizes
            $num= 1;
            for ($i=1 ; $i < 8 ; $i++){
                if($request->input('ar_size'.$i)){
                    $num++;
                }
             }
            //Save Sizes Refrances (Get many sizes using for loop)
            for ($i=1; $i < $num; $i++) { 
                $sub_cat->sizes()->create(['ar_size'=>$request->input('ar_size'.$i), 'en_size'=>$request->input('en_size'.$i)]);
             }

            //get number of inputed Specs
            $num= 1;
            for ($x=1 ; $x < 6 ; $x++){
                if($request->input('ar_title'.$x)){
                    $num++;
                }
             }
            //Create Specs (Get specs using for loop)
            for ($x=1; $x < $num; $x++) { 
                $sub_cat->specs()->create(['ar_title'=>$request->input('ar_title'.$x), 'en_title'=>$request->input('en_title'.$x)]);
             } 
            
            if(Session::get('lang') == 'en'){
                return Redirect::to('sub-category-list')->with('message', 'Sub Category Created Successfully!');
            }
                return Redirect::to('sub-category-list')->with('message', 'تم إنشاء القسم الفرعي بنجاح!');
        }
        else return Redirect('/');
    }

    /*
    * To display Category request Form.
    */
    public function categoryRequestForm()
    {
        if(Session::get('group') == 'merchant'){
            if(Session::get('lang') == 'en'){
            return view('en.sub-category.category-request');
            }
            return view('ar.sub-category.category-request');    
        }
        
    }

    /*
    * submit suggested categories.
    */
    public function categoryRequestSubmit(Request $request){

        if(Session::get('group') == 'merchant'){
            DB::table('categories_requests')->insert(['ar_category'=>$request->input('ar_category'), 'en_category'=>$request->input('en_category'), 'type'=>$request->input('type'), 'user_id'=>Auth()->user()->id, 'created_at'=>date("Y-m-d H:i:s")]);

            //create notification
            DB::table('notifications')->insert(['belongs_to'=>'admin', 'ar_title'=>'طلب إضافة قسم جديد', 'en_title'=>'New category create request', 'link'=>'categories-request-display', 'group'=>'cat-request', 'read'=>'0']);

        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'New Category Request Sent Successfully');
            }
            return Redirect::back()->with('message', 'تم إرسال طلب إضافة القسم بنجاح');
        }
        
    }

    /*
    * [Admin] To display the Categories requests list 
    */
    public function categoryRequestDisplay()
    {
        if(Session::get('group') == 'admin'){
         $cats_requests= DB::table('categories_requests')->orderBy('id','desc')->get();
        
        if(Session::get('lang') == 'en'){
            return view('en.sub-category.categories-request-display', compact('cats_requests'));
            }
            return view('ar.sub-category.categories-request-display', compact('cats_requests'));   
        }
    }

    /*
    * [Admin] To delete the Category request 
    */
    public function categoryRequestDelete($id)
    {
        if(Session::get('group') == 'admin'){
            DB::table('categories_requests')->where('id', $id)->delete();

            if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Category Request Deleted Successfully!');
            }
            return Redirect::back()->with('message', 'تم حذف طلب الإضافة بنجاح!');
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
        $sub_category= SubCategory::where('id', $id)->with('sizes.products')->first();
        $products= Product::where('approve', 1)->where('sub_category_id', $id)->with('productImages', 'rating')->paginate(21);
        $banner= Banner::find(4);

        if(Session::get('lang') == 'en'){
            return view('en.sub-category.category-products-show', compact('sub_category', 'products', 'banner'));
            }
            return view('ar.sub-category.category-products-show', compact('sub_category', 'products', 'banner'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::get('group') == 'admin'){
            $sub_cat= SubCategory::find($id);
            //get Sections for dropdown list
            $main_cats= MainCategory::pluck('ar_title', 'id');
            //get selected Main Categories
            $selected= []; 
            foreach($sub_cat->mainCategories as $category){
                array_push($selected, $category->id);
                }

            //get available Arabic & English Sizes
            $sizes_id= [];  $ar_sizes= [];  $en_sizes= [];
            foreach($sub_cat->sizes as $size){
                array_push($sizes_id, $size->id);
                array_push($ar_sizes, $size->ar_size);
                array_push($en_sizes, $size->en_size);
                }


            //get available Arabic & English Specs
            $specs_id= [];  $ar_specs= [];  $en_specs= [];
            foreach($sub_cat->specs as $spec){
                array_push($specs_id, $spec->id);
                array_push($ar_specs, $spec->ar_title);
                array_push($en_specs, $spec->en_title);
                }
            
            if(Session::get('lang') == 'en'){
                return view('en.sub-category.sub-category-edit', compact('sub_cat', 'main_cats', 'selected', 'sizes_id', 'ar_sizes', 'en_sizes', 'specs_id', 'ar_specs', 'en_specs'));
            }
                return view('ar.sub-category.sub-category-edit', compact('sub_cat', 'main_cats', 'selected', 'sizes_id', 'ar_sizes', 'en_sizes', 'specs_id', 'ar_specs', 'en_specs'));
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
        if(Session::get('group') == 'admin'){
            $sub_cat= SubCategory::find($id);
            $sub_cat->ar_title= $request->input('ar_title');
            $sub_cat->en_title= $request->input('en_title');
            $sub_cat->active= $request->input('active');
            
            //Update icon image
            if ($request->file('image')){
            File::delete($sub_cat->image);
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->image= "ar-assets\back-end\images/".$filename;
            }

            //Arabic banner image
            if ($request->file('ar_banner')){
            File::delete($sub_cat->ar_banner);
            $file= $request->file('ar_banner');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->ar_banner= "ar-assets\back-end\images/".$filename;
            }

            //English banner image
            if ($request->file('en_banner')){
            File::delete($sub_cat->en_banner);
            $file= $request->file('en_banner');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->en_banner= "ar-assets\back-end\images/".$filename;
            }

            $sub_cat->save();

            //Save Main Categories
            $sub_cat->mainCategories()->sync($request->get('main_cats'));
            
            //get number of updated sizes
            $num= 1;
            for ($i=1 ; $i < 8 ; $i++){
                if($request->input('ar_size_edit'.$i)){
                    $num++;
                }
             }
            //Update & Save "OLD" Sizes (Get many sizes using for loop)
            for ($i=1; $i < $num; $i++) { 
                // $sub_cat->sizes()->where('id', $request->input('size_id'.$i))->update(['ar_size'=>$request->input('ar_size_edit'.$i), 'en_size'=>$request->input('en_size_edit'.$i)]);
                Size::where('id', $request->input('size_id'.$i))->update(['ar_size'=>$request->input('ar_size_edit'.$i), 'en_size'=>$request->input('en_size_edit'.$i)]);
             }
             
            //get number of new inputed sizes
            $num= 1;
            for ($i=1 ; $i < 8 ; $i++){
                if($request->input('ar_size'.$i)){
                    $num++;
                }
             } 
            //Create "NEW" Sizes (Get many sizes using for loop)
            for ($i=1; $i < $num; $i++) { 
                $sub_cat->sizes()->create(['ar_size'=>$request->input('ar_size'.$i), 'en_size'=>$request->input('en_size'.$i)]);
             }


            //get number of inputed Specs
            $num= 1;
            for ($x=1 ; $x < 6 ; $x++){
                if($request->input('ar_title_edit'.$x)){
                    $num++;
                }
             }

            //Update & Save Specs (Get Specs using for loop)
            for ($x=1; $x < $num; $x++) { 
                $sub_cat->specs()->where('id', $request->input('spec_id'.$x))->update(['ar_title'=>$request->input('ar_title_edit'.$x), 'en_title'=>$request->input('en_title_edit'.$x)]);
             } 
            
            //get number of inputed Specs
            $num= 1;
            for ($x=1 ; $x < 6 ; $x++){
                if($request->input('ar_title'.$x)){
                    $num++;
                }
             }

            //Create Specs (Get specs using for loop)
            for ($x=1; $x < $num; $x++) { 
                $sub_cat->specs()->create(['ar_title'=>$request->input('ar_title'.$x), 'en_title'=>$request->input('en_title'.$x)]);
             } 
            
            if(Session::get('lang') == 'en'){
                return Redirect::to('sub-category-list')->with('message', 'Sub Category Updated Successfully!');
            }
                return Redirect::to('sub-category-list')->with('message', 'تم تحديث القسم الفرعي بنجاح!');
        }
        else return Redirect('/');
    }

    //Ajax deleteSize function
    public function deleteSize(Request $req) {
        Size::find ( $req->id )->delete();
        return response ()->json ();
    }

    //Ajax deleteSpec function
    public function deleteSpec(Request $req) {
        ProductSpecs::find ( $req->id )->delete();
        return response ()->json ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::get('group') == 'admin'){
            $sub_cat= SubCategory::find($id);
            $sub_cat->mainCategories()->detach();
            File::delete($sub_cat->image);
            File::delete($sub_cat->ar_banner);
            File::delete($sub_cat->en_banner);
            $sub_cat->delete();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Sub Category Deleted Successfully!');
            }
                return Redirect::back()->with('message', 'تم حذف القسم الفرعي بنجاح!');
        }
        else return Redirect('/');
    }
}
