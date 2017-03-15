<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Http\Requests;
use Session, Redirect, File;

class SectionController extends Controller
{
    
    /*
    * Customized functions:
    * - sectionsManage(): To Manage Sections/Main-Cateogries/Sub-Categories
    * - sectionsList(): To display admin Sections List
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        } 

    /*
    *
    */
    public function sectionsManage()
    {
        if(Session::get('group') == 'admin'){

            if(Session::get('lang') == 'en'){
                return view('en.section.sections-manage');
            }
                return view('ar.section.sections-manage');
        }
    }

    /*
    * To display admin Sections List
    */
    public function sectionsList()
    {
        if(Session::get('group') == 'admin'){

            $sections= Section::all();

            if(Session::get('lang') == 'en'){
                return view('en.section.sections-list', compact('sections'));
            }
                return view('ar.section.sections-list', compact('sections'));
            
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //The page is using sections() helpers functions:
        if(Session::get('lang') == 'en'){
            return view('en.section.sections-index');
        }
            return view('ar.section.sections-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get('group') == 'admin'){
            if(Session::get('lang') == 'en'){
                return view('en.section.section-create');
            }
                return view('ar.section.section-create');
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

            if(Session::get('lang') == 'en'){
                return Redirect::to('sections-list')->with('message', 'Section Created Successfully!');
            }
                return Redirect::to('sections-list')->with('message', 'تم إنشاء فئة رئيسية بنجاح!');
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

            if(Session::get('lang') == 'en'){
                return view('en.section.section-edit', compact('section'));
            }
                return view('ar.section.section-edit', compact('section'));
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

            if(Session::get('lang') == 'en'){
                return Redirect::to('sections-list')->with('message', 'Section Updated Successfully!');
            }
                return Redirect::to('sections-list')->with('message', 'تم تحديث الفئة الرئيسية بنجاح!');
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

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Section Deleted Successfully!');
            }
                return Redirect::back()->with('message', 'تم حذف الفئة الرئيسية بنجاح!');
        }
        else return Redirect('/');
    }
}
