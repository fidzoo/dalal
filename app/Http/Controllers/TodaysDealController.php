<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TodaysDealController extends Controller
{
    /*
    * Functions inside this controller:
    * select(): [Admin] To select products to today's deal
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'show',
            ]]);
        } 
    
    /*
    * [Admin] To select products to today's deal
    */
    public function select()
    {
    	if(Session::get('group') == 'admin'){

    		if(Session::get('lang') == 'en'){
                $sections= Section::where('active', 1)->pluck('en_title', 'id');
            }
    			$sections= Section::where('active', 1)->pluck('ar_title', 'id');
            
            if(Session::get('lang') == 'en'){
                return view('en.today-deal.products-select', compact('sections'));
            }
                return view('ar.today-deal.products-select', compact('sections'));
        }
    }


}
