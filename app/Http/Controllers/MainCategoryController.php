<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\MainCategory;
use App\Http\Requests;
use Session, Redirect, File;

class MainCategoryController extends Controller
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
            $sections= Section::pluck('ar_title', 'id');

            return view('main-category.main-category-create', compact('sections'));
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
            $main_cat= new MainCategory;
            $main_cat->ar_title= $request->input('ar_title');
            $main_cat->en_title= $request->input('en_title');
            $main_cat->section_id= $request->input('section');
            $main_cat->active= 1;
            
            if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $main_cat->image= "ar-assets\back-end\images/".$filename;
            }
            $main_cat->save();

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
        if(Session::get('group') == 'admin'){
            $main_category= MainCategory::find($id);
            $sections= Section::pluck('ar_title', 'id');

            return view('main-category.main-category-edit', compact('main_category', 'sections'));
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
            $main_cat= MainCategory::find($id);
            $main_cat->ar_title= $request->input('ar_title');
            $main_cat->en_title= $request->input('en_title');
            $main_cat->section_id= $request->input('section');
            $main_cat->active= $request->input('active');

            if ($request->file('image')){
                File::delete($main_cat->image);
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $main_cat->image= "ar-assets\back-end\images/".$filename;
            }
            $main_cat->save();

            return Redirect::back()->with('message', 'تم تحديث القسم الرئيسي بنجاح!');
            }
        else return Redirect('/');
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
            $main_cat= MainCategory::find($id);
            File::delete($main_cat->image);
            $main_cat->delete();

            return Redirect::back()->with('message', 'تم حذف السيكشن بنجاح!');
        }
        else return Redirect('/');
    }
}
