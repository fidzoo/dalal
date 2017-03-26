<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserData;
use App\Order;
use App\OrderItem;
use App\Store;
use App\Notification;
use App\Http\Requests;
use Session, Redirect, Cart, Auth;

class PaymentController extends Controller
{
    /*
    * Customized functions:
    * - paymentSelect(): To show the payment methods.
    * - pay(): Save the order in "orders" & "order_items" tables then redirect to do the payment process.
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
    	//Get User Shipping Data and save it
         if($request->input('save-data')){
            $user_detail= UserData::updateOrCreate(['user_id'=>Auth()->user()->id], ['default_data'=> 1, 'full_name'=>$request->input('person-name'), 'email'=>$request->input('email'), 'address'=>$request->input('address'), 'country_id'=>$request->input('countries'), 'city_id'=>$request->input('cities'), 'zip'=>$request->input('zip'), 'tel_code'=>$request->input('tel-code'), 'tel_number'=>$request->input('tel-number') ]);
           }
           else{
            $user_detail= UserData::updateOrCreate(['user_id'=>Auth()->user()->id], ['default_data'=> 0, 'full_name'=>$request->input('person-name'), 'email'=>$request->input('email'), 'address'=>$request->input('address'), 'country_id'=>$request->input('countries'), 'city_id'=>$request->input('cities'), 'zip'=>$request->input('zip'), 'tel_code'=>$request->input('tel-code'), 'tel_number'=>$request->input('tel-number') ]);
           }

           $total_amount= $request->input('cart_total');
           $store_id= $request->input('store-id');

           if(Session::get('lang') == 'en'){
                return view('en.payment.payment-choose', compact('total_amount', 'store_id'));
            }
                return view('ar.payment.payment-choose', compact('total_amount', 'store_id'));
    }

    /*
    * Save the order in "temp_cart" then redirect and do the payment process.
    */
    public function pay(Request $request)
    {
        //check if cart items "timed out" as it is empty
        if (! Cart::count() > 0) {
            if(Session::get('lang') == 'en'){
                $error= "Cart items is expired. Kindly re-add items into cart!";
                return view('errors.en-custom-error', compact('error'));
            }
                $error= "انتهت مدة عربة الشراء وأصبحت فارغة. برجاء إضافة البضائع مرة أخرى إلى عربة الشراء!";
                return view('errors.ar-custom-error', compact('error'));

        }
        else {

            //Get Store owner
            $store_id = $request->input('store-id');
            $store= Store::find($store_id);
            $owner= $store->user->id;

            //Create New Order
            $order= new Order; 
            $order->user_id= Auth::id();
            $order->store_id = $store_id;
            $order->store_owner= $owner;
            $order->order_status= 0;
            $order->payment_status= 0; 
            $order->save();

            //Get this store -> Cart products (using Cart::search())
            $products= Cart::search(function($cartItem, $rowId) use($store_id){
                return $cartItem->options->store_id == $store_id; 
                });
            
            //Create the order items
            foreach($products as $product){
                $item= new OrderItem;
                $item->order_id= $order->id;
                $item->product_id= $product->id;
                $item->color= $product->options->color;
                $item->size= $product->options->size;
                $item->qty= $product->qty;
                $item->delivery_status= 0;
                $item->save();  
                }

            

            //Send Merchant a notification that order is placed
            $notify= new Notification;
            $notify->belongs_to= 'merchant';
            $notify->receiver_id= $owner;
            $notify->group= 'purchase-order';
            $notify->ar_title= 'أمر شراء جديد من المستخدم '.Auth::user()->name;
            $notify->en_title= 'New purchase order by the user '.Auth::user()->name;
            $notify->link= 'purchase-orders';
            $notify->read= 0;
            $notify->save();

            /*
            *
            * Process The Payment method.. Not Done yet
            *
            */

            //Will change this to success or fail page (I use the error page now just as a temp)
            $error= 'تمت عملية الدفع بنجاح';
            return view('errors.ar-custom-error', compact('error'));
            


        }
    }

}
