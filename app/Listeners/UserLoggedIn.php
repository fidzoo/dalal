<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class UserLoggedIn
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user_group= auth()->user()->user_type;
        $user_id= auth()->user()->id;
         

        if($user_group == 'merchant'){
            Session::put(['group'=> 'merchant', 'user_id'=> $user_id]);
        }
        elseif($user_group == 'buyer'){
            Session::put(['group'=> 'buyer', 'user_id'=> $user_id]);
        }
        elseif($user_group == 'admin'){
            //$admin_role= auth()->user()->roles[0]->role;
            Session::put(['group'=> 'admin', 'user_id'=> $user_id]);
        }
    }
}
