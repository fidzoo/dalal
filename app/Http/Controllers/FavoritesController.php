<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Favorite;
use App\Http\Requests;
use DB, Session, Auth, Redirect;

class FavoritesController extends Controller
{
    /*
    * Functions inside this controller:
    * add(): To add product to favorite
    * show(): Show Favorites list
    * delete(): Delete from Favorite list 
    */

    public function add(Request $req)
    {

    	DB::table('favorites')->insert(['user_id'=>$req->input('user_id'), 'product_id'=>$req->input('product_id')]);

    	return response ()->json ();
    }

    /*
    * Show Favorites list 
    */
    public function show()
    {
    	if (! Auth::guest()){
	    	$user= User::where('id', Session::get('user_id'))->first();
	    	$favorites= $user->favorites()->with('productImages')->paginate(21);
	    	  		
	    	if(Session::get('lang') == 'en'){
	            return view('en.favorite.my-favorites', compact('favorites'));
	        }
	            return view('ar.favorite.my-favorites', compact('favorites'));

        }
        return redirect('/');
    }

    /*
    * Delete from Favorite list 
    */
    public function delete(Request $request)
    {
    	DB::table('favorites')->where('product_id', $request->input('remove-data'))->delete();

    	return Redirect::back();
    }

}
