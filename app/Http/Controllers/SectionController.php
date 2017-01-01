<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Http\Requests;
use Session, Redirect, File;

class SectionController extends Controller
{
    
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get('group') == 'admin'){
            return view('section.section-create');
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
            $section= new Section;
            $section->ar_title= $request->input('ar_title');
            $section->en_title= $request->input('en_title');
            $section->active= 1;

            if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $section->image= "ar-assets\back-end\images/".$filename;
            }
            $section->save();

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
            $section= Section::find($id);

            return view('section.section-edit', compact('section'));
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
            $section= Section::find($id);
            $section->ar_title= $request->input('ar_title');
            $section->en_title= $request->input('en_title');
            $section->active= $request->input('active');

            if ($request->file('image')){
                File::delete($section->image);
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $section->image= "ar-assets\back-end\images/".$filename;
            }
            $section->save();

            return Redirect::back()->with('message', 'تم تحديث السيكشن بنجاح!');
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
            $section= Section::find($id);
            File::delete($section->image);
            $section->delete();

            return Redirect::back()->with('message', 'تم حذف السيكشن بنجاح!');
        }
        else return Redirect('/');
    }
}
