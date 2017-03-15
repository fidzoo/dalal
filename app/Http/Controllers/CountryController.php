<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Requests;
use Session, File, Redirect;

class CountryController extends Controller
{
    
    /*
    * Cutomuzid functions in this controller 
    * - contriesList() : [Super-admins] Display list of countries   
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        }

    /*
    * Display list of countries  
    */
    public function countriesList()
    {
         if(Session::get('group') == 'admin'){
            
            $countries= Country::all();

            if(Session::get('lang') == 'en'){
                return view('en.country.countries-list', compact('countries')); 
            }
                return view('ar.country.countries-list', compact('countries'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Redirect('/');
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
                return view('en.country.country-create'); 
            }
                return view('ar.country.country-create');
        }
        
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
            $country= new Country;
            $country->ar_name= $request->input('ar_name');
            $country->en_name= $request->input('en_name');

            if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'ar-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $country->image_path= "ar-assets\back-end\images/".$filename;
                }

            $country->save();  
            
            if(Session::get('lang') == 'en'){
                return Redirect::to('countries-list')->with('message', 'Country Added Successfully!');
            }
                return Redirect::to('countries-list')->with('message', 'تم إضافة الدولة بنجاح!');  
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
        if(Session::get('group') == 'admin'){
            $country= Country::find($id);
            $country->ar_name= $request->input('ar_name');
            $country->en_name= $request->input('en_name');

            $country->save();  
            
            if(Session::get('lang') == 'en'){
                return Redirect::to('countries-list')->with('message', 'Country Updated Successfully!');
            }
                return Redirect::to('countries-list')->with('message', 'تم تحديث الدولة بنجاح!');  
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
        if(Session::get('group') == 'admin'){
            $country= Country::find($id);
            File::delete($country->image_path);
            $country->delete();  
            
            if(Session::get('lang') == 'en'){
                return Redirect::to('countries-list')->with('message', 'Country deleted Successfully!');
            }
                return Redirect::to('countries-list')->with('message', 'تم حذف الدولة بنجاح!');  
        }
    }
}
