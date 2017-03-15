<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Session, Redirect;

class QuestionController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        }

    /*
    ** For Admin Edit/Delete Questions List
    */ 
    public function faqList()
    {
        if(Session::get('group') == 'admin'){
            $faqs= Question::all();

            if(Session::get('lang') == 'en'){
                return view('en.faq.faq-list', compact('faqs'));
            }
                return view('ar.faq.faq-list', compact('faqs'));   
        }
        return Redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs= Question::all();

        if(Session::get('lang') == 'en'){
           return view('en.faq.faq-index', compact('faqs')); 
        }
            return view('ar.faq.faq-index', compact('faqs'));
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
                return view('en.faq.faq-create');
            }
                return view('ar.faq.faq-create');
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

            Question::create($request->all());

            if(Session::get('lang') == 'en'){
                return Redirect::to('faq-list')->with('message', 'Question created successfully');
            }
                return Redirect::to('faq-list')->with('message', 'تم إنشاء السؤال بنجاح');
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
        return Redirect('/');
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
            $faq= Question::find($id);

            if(Session::get('lang') == 'en'){
                return view('en.faq.faq-edit', compact('faq'));
            }
                return view('ar.faq.faq-edit', compact('faq'));
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

            $faq= Question::find($id);
            $faq->update($request->all());

            if(Session::get('lang') == 'en'){
                return Redirect::to('faq-list')->with('message', 'Question updated successfully');
            }
                return Redirect::to('faq-list')->with('message', 'تم تحديث السؤال بنجاح');
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

            $faq= Question::find($id);
            $faq->delete();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Question deleted successfully');
            }
                return Redirect::back()->with('message', 'تم حذف السؤال بنجاح');

         }
        else return Redirect('/'); 
    }
}
