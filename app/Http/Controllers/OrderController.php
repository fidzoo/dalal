<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Http\Requests;
use Session, Redirect;

class OrderController extends Controller
{
    /*
    * Customized functions:
    * - ordersList(): [Merchant] Display received orders
    * - deliveredOrders(): [Merchant] Display complete delivered orders
    * - statusUpdate(): [Merchant] Ajax update product delivery status and adjust the new stock count
    * - ordersHistory(): [Buyer] Display user orders history
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                '',
            ]]);
        }

    /*
    * [Merchant] Display received orders
    */
    public function ordersList()
    {
    	if(Session::get('group') == 'merchant'){
    		//Get orders [the new and not complete delivered orders only]
            $orders= Order::where('store_owner', Session::get('user_id'))->where('order_status', '!=', 4)->with('items', 'user.userDate.country', 'user.userDate.city', 'store')->get();


    		if(Session::get('lang') == 'en'){
                return view('en.order.orders-list', compact('orders'));
            }
            	return view('ar.order.orders-list', compact('orders')); 

    	}
    	return Redirect('/');
    }

    /*
    *  [Merchant] Display complete delivered orders
    */
    public function deliveredOrders()
    {
        if(Session::get('group') == 'merchant'){
            //Get orders [complete delivered orders only]
            $orders= Order::where('store_owner', Session::get('user_id'))->where('order_status', 4)->with('items', 'user.userDate.country', 'user.userDate.city', 'store')->orderBy('id','desc')->get();


            if(Session::get('lang') == 'en'){
                return view('en.order.delivered-orders', compact('orders'));
            }
                return view('ar.order.delivered-orders', compact('orders')); 

        }
        return Redirect('/');
    }

    /*  [Merchant] Ajax update product delivery status and adjust the new stock count
    *
    */
    public function statusUpdate(Request $req)
    {
        if(Session::get('group') == 'merchant'){
            
            //change delivery status 
            $item= OrderItem::where('id', $req->input('item_id'))->with('product')->first();
            $item->delivery_status= $req->input('status_value');
            $item->save();

            //Get the orders
            $order= $item->order;
            //adjust product stock count if "Shipped" status selected
            if($req->input('status_value') == 1){
                $product= $item->product;
                $product->stock= $product->stock - $req->input('qty'); 
                $product->save();

                //loop every order item to check if it shipped or not
                $shipped=[];
                foreach($order->items as $it){
                    if($it->delivery_status == 1){
                        array_push($shipped, 'yes');
                    }
                    else{
                        array_push($shipped, 'no');
                    }
                }

                //check if there still items not shipped yet
                if (in_array('no', $shipped)) {
                    //put status to Partially Delivered
                    $order->order_status = 1;
                    $order->save();
                }
                else{
                    //put status to Completely shipped
                    $order->order_status = 2;
                    $order->save();
                }  
            }
            //Change the Overall Order status
            elseif($req->input('status_value') == 2){
                
                //loop every order item to check if it delivered or not
                $delivery=[];
                foreach($order->items as $it){
                    if($it->delivery_status == 2){
                        array_push($delivery, 'yes');
                    }
                    else{
                        array_push($delivery, 'no');
                    }
                }

                //check if there still items not delivered yet
                if (in_array('no', $delivery)) {
                    //put status to Partially Delivered
                    $order->order_status = 3;
                    $order->save();
                }
                else{
                    //put status to Completely Delivered
                    $order->order_status = 4;
                    $order->save();
                }
            }
            //Change the Overall Order status
            elseif($req->input('status_value') == 3){
                $order->order_status = 5;
                $order->save();
            }
            
            return response ()->json ();
        }
        
    }

    /*
    *  [Buyer] Display user orders history
    */
    public function ordersHistory()
    {
       if(Session::get('group') == 'merchant'){
        $delivered= Order::where('user_id', Session::get('user_id'))->where('')
       } 
    }
}
