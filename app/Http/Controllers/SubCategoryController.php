<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;
use App\SubCategory;
use App\Http\Requests;
use Session, Redirect, File;

class SubCategoryController extends Controller
{
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
            $sub_cat->approve= 0;
            
            if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'ar-assets\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $sub_cat->image= "ar-assets\images/".$filename;
            }
            $sub_cat->save();

            //Save Main Categories
            $sub_cat->mainCategories()->sync($request->get('main_cats'));
            
            //get number of inputed sizes
            $num= 1;
            for ($i=1 ; $i < 3 ; $i++){
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
            for ($i=1 ; $i < 3 ; $i++){
                if($request->input('ar_size'.$i)){
                    $num++;
                }
             }
            //Save Sizes Refrances (Get many sizes using for loop)
            for ($i=1; $i < $num; $i++) { 
                $sub_cat->specs()->create(['ar_title'=>$request->input('ar_title'.$i), 'en_size'=>$request->input('en_title'.$i)]);
             } 
            

            return Redirect::back()->with('message', 'تم إنشاء السيكشن بنجاح!');
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
