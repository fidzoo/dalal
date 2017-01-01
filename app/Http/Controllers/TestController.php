<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;
use App\City;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator, Response;

class TestController extends Controller
{

    public function test(Request $request){
        return $request->input('select');
    }

    //Ajax Controllers
    public function addItem(Request $request) {
    $rules = array (
            'name' => 'required'
    );
    $validator = Validator::make ( Input::all(), $rules );
    if ($validator->fails ())
        return Response::json ( array (
                    
                'errors' => $validator->getMessageBag ()->toArray ()
        ) );
        else {
            $data = new test ();
            $data->name = $request->name;
            $data->save ();
            return response ()->json ( $data );
        }
	}

	public function showItems(Request $req) {
    $data = test::all ();
    return view ( 'test' )->withData ( $data );
	}

	public function editItem(Request $req) {
        $data = test::find ( $req->id );
        $data->name = $req->name;
        $data->save ();
        return response ()->json ( $data );
    }

    public function deleteItem(Request $req) {
        test::find ( $req->id )->delete ();
        return response ()->json ();
    }

}
