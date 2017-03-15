<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserData;
use App\Http\Requests;
use Session, Redirect;

class PaymentController extends Controller
{
    /*
    * Customized functions:
    * - paymentSelect(): To show the payment methods.
    * 
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                '',
            ]]);
        }

    /*
    *	To show the payment methods.
    */
    public function paymentSelect(Request $request)
    {
    	$user_detail= UserData::updateOrCreate(['user_id'=>Auth()->user()->id], ['default_data'=> 1, 'full_name'=>$request->input('person-name'), 'email'=>$request->input('email'), 'address'=>$request->input('address'), 'country_id'=>$request->input('countries'), 'city_id'=>$request->input('cities'), 'zip'=>$request->input('zip'), 'tel_code'=>$request->input('tel-code'), 'tel_number'=>$request->input('tel-number') ]);

        //Get User Shipping Data and save it
    	// if($request->input('save-data')){
    		
    	// }

    }

}
