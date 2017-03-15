<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Http\Requests;
use Session;

class NotificationController extends Controller
{

    //Display all notifications:
    public function allNotfiy()
    {
    	$belongs= Session::get('group');
    	$notifications = Notification::where('belongs_to', $belongs)->orderBy('id','desc')->get();

    	if(Session::get('lang') == 'en'){
    		return view('en.notificaton.display-all-notify', compact('notifications'));
    	}
    		return view('ar.notificaton.display-all-notify', compact('notifications'));
    }

    //ajax make read function:
    public function makeRead(Request $request)
    {
    	$notify_id= $request->input('notify_id');
		$notification= Notification::find($notify_id);
		$notification->read= 1;
		$notification->save();
		return response ()->json ();
    }

    //Delete Notification:
    public function delete(Request $request)
    {
    	$notify_id= $request->input('notify_id');
		$notification= Notification::find($notify_id);
		$notification->delete();
		return $notify_id;
    } 
}
