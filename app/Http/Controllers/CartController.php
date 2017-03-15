<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use Session, Cart, Redirect;
use App\Http\Requests;

class CartController extends Controller
{
	public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'add', 'remove',
            ]]);
        } 


    /*
    * Show Cart Contents 
    */    
	public function show()
	{
		$cart= Cart::content()->groupBy('options.store_name');


        if(Session::get('lang') == 'en'){
            return view('en.cart.my-cart', compact('cart'));
        }
            return view('ar.cart.my-cart', compact('cart'));
	
  }

    /*
    * Ajax Add To Shopping Cart funciton 
    */
    public function add(Request $req)
    {
    	
        Cart::add(['id'=>$req->input('id'), 'name'=>$req->input('name'), 'qty'=>$req->input('qty'), 'price'=>$req->input('price'), 'options'=>['color'=>$req->input('color'), 'size'=>$req->input('size'), 'shipping_single_price'=> $req->input('shipping_single_price'), 'shipping'=>$req->input('shipping'), 'store_id'=>$req->input('store_id'), 'store_name'=>$req->input('store_name'), 'total_price'=>$req->input('total_price')] ])->associate('App\Product');


    	return response ()->json ();
    }


    /*
    * Remove item from cart
    */
    public function remove(Request $request)
    {
        $cart_item= $request->input('remove-data');
        Cart::remove($cart_item);

        return Redirect::back();
    }

    /*
    * Display Buyer details form
    */
    public function checkoutDetails(Request $request)
    {
        //process the request from the toolbar mini cart:
        if ($request->is('minicart-checkout')){
            return Redirect('my-cart');
        }

        //process the request from the big cart:
        if ($request->is('checkout-details')){
            $cart_total= $request->input('checkout-total');

            //Get Countries for the dropdown
            $countries= Country::all();

            //Get user data if avalibale
            if (count(Auth()->user()->userDate()->first()) > 0){
               $user_data= Auth()->user()->userDate()->first();
               $cities= City::where('country_id', $user_data->country_id)->get();
               $data= 1; 
            }
            else {
                $data= 0;
            }
        }


        if(Session::get('lang') == 'en'){
            return view('en.cart.checkout-details', compact('cart_total', 'countries', 'user_data', 'data', 'cities'));
        }
            return view('ar.cart.checkout-details', compact('cart_total', 'countries', 'user_data', 'data', 'cities'));
    }
    
}
