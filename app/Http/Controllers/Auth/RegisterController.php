<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Country;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        //for specific registration fileds view
        if ($request->is('merch-reg')){
            Session::flash('reg_group', 'merchant');
            }
        else if ($request->is('buyer-reg')){
            Session::flash('reg_group', 'buyer');
            }
        else if ($request->is('admin-reg')){
            Session::flash('reg_group', 'admin');
            }

        if(Session::get('lang') == 'en'){
            return view('en.auth.register');
            }
        
        $countries= Country::pluck('ar_name', 'id');

        return view('auth.register', compact('countries'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'info'  => 'max:65530'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['user_group'] == 'merchant'){
            return User::create([
                'active' => false,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'user_type' => 'merchant',
                'country_code' => $data['country_code'],
                'phone' => $data['mobile'],
                'info'  => $data['info'],
                'country_id' => $data['country'],
                'city_id' => $data['city'],
            ]);
        }
        elseif($data['user_group'] == 'buyer'){
            return User::create([
                'active' => true,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'user_type' => 'buyer',
                'country_code' =>  $data['country_code'],
                'phone' => $data['mobile'],
                'info'  => $data['info'],
                'country_id' => $data['country'],
                'city_id' => $data['city'],
            ]);
        }
        elseif($data['user_group'] == 'admin'){
            return User::create([
                'active' => false,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'user_type' => 'admin',
                'country_code' =>  $data['country_code'],
                'phone' => $data['mobile'],
                'info'  => $data['info'],
                'country_id' => $data['country'],
                'city_id' => $data['city'],
            ]);
        }
    }

}
