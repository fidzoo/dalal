<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Http\Requests;
use Session, File, Redirect;

class CityController extends Controller
{
    /*
    * Cutomuzid functions in this controller 
    * - list() : [Super-admins] Display list of cities   
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        }

    /*
    * Display list of cities  
    */
    public function citiesList()
    {
         if(Session::get('group') == 'admin'){
            
            $cities= City::all();            

            if(Session::get('lang') == 'en'){
                $countries= Country::pluck('en_name', 'id');
                return view('en.city.cities-list', compact('cities', 'countries')); 
            }
                $countries= Country::pluck('ar_name', 'id');
                return view('ar.city.cities-list', compact('cities', 'countries'));
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
            $countries= Country::all();

            if(Session::get('lang') == 'en'){
                return view('en.city.city-create', compact('countries')); 
            }
                return view('ar.city.city-create', compact('countries'));
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
            
            $city= new City;
            $city->country_id= $request->input('country');
            $city->ar_name= $request->input('ar_name');
            $city->en_name= $request->input('en_name');
            $city->save();

            if(Session::get('lang') == 'en'){
                return Redirect::to('cities-list')->with('message', 'City Added Successfully!');
            }
                return Redirect::to('cities-list')->with('message', 'تم إضافة المدينة بنجاح!');  
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
            
            $city= City::find($id);
            $city->country_id= $request->input('country');
            $city->ar_name= $request->input('ar_name');
            $city->en_name= $request->input('en_name');
            $city->save();

            if(Session::get('lang') == 'en'){
                return Redirect::to('cities-list')->with('message', 'City Updated Successfully!');
            }
                return Redirect::to('cities-list')->with('message', 'تم تحديث المدينة بنجاح!');  
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
            $city= City::find($id);
            $city->delete();  
            
            if(Session::get('lang') == 'en'){
                return Redirect::to('cities-list')->with('message', 'City deleted Successfully!');
            }
                return Redirect::to('cities-list')->with('message', 'تم حذف المدينة بنجاح!');  
        }
    }
}
