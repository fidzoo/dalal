<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;
use App\SubCategory;
use App\Size;
use App\ProductSpecs;
use App\Http\Requests;
use Session, Redirect, File;

class SubCategoryController extends Controller
{
    /**
    List of aditional customized methods:
    - subList
    - deleteSize
    - deleteSpec
    - ajaxSubcategory
    - ajaxSizes
    - ajaxSpecs
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
        

        return view ('sub-category.sub-category-list', compact('main_cats'));
    }

    public function ajaxSubcategory(Request $request)
    {
        $mcategory_id= $request->input('mcategory_id');
        $mcategory= MainCategory::find($mcategory_id);
        $subcategories= $mcategory->subCategories;

        return $subcategories;
    }

    public function ajaxSizes(Request $request)
    {
        $subcat_id= $request->input('subcategory_id');
        $sizes= Size::where('sizeable_type', 'App\SubCategory')->where('sizeable_id', $subcat_id)->get();

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

            return view('sub-category.sub-category-create', compact('main_categories'));
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
            
            if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->image= "ar-assets\back-end\images/".$filename;
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
            

            return Redirect::back()->with('message', 'تم إنشاء القسم الفرعي بنجاح!');
        }
        else return Redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //for MainCategory drop down.
        $main_cats= MainCategory::pluck('ar_title', 'id');

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
            
            return view('sub-category.sub-category-edit', compact('sub_cat', 'main_cats', 'selected', 'sizes_id', 'ar_sizes', 'en_sizes', 'specs_id', 'ar_specs', 'en_specs'));
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
            
            if ($request->file('image')){
            File::delete($sub_cat->image);
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->image= "ar-assets\back-end\images/".$filename;
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
                $sub_cat->sizes()->where('id', $request->input('size_id'.$i))->update(['ar_size'=>$request->input('ar_size_edit'.$i), 'en_size'=>$request->input('en_size_edit'.$i)]);
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
            

            return Redirect::back()->with('message', 'تم تحديث القسم الفرعي بنجاح!');
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
            $sub_cat->delete();

            return Redirect::back()->with('message', 'تم حذف القسم الفرعي بنجاح!');
        }
        else return Redirect('/');
    }
}
