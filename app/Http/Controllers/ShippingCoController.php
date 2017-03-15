<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\ShippingCompany;
use App\Currency;
use App\Product;
use App\Http\Requests;
use Session, File, Redirect, DB;

class ShippingCoController extends Controller
{
    
    /*
    * - shipingCosList(): [Super Admins] Display registerd shipping companies list.
    * - productShippingSave(): [Merch] Save the selected shipping methods.
    * - productShippingEdit(): [Merch] Edit the selected shipping methods.
    * - productShippingUpdate(): [Merch] Update process for th selected shipping methods.
    * - productShippMethods(): Ajax Get Product's Shipping Methods details
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show', 'productShippMethods'
            ]]);
        } 

    /*
    *  [Super Admins] Display registerd shipping companies list.
    */
    public function shipingCosList()
    {
        if(Session::get('group') == 'admin'){
            $companies= ShippingCompany::all();
            
            if(Session::get('lang') == 'en'){
                return view('en.shipping.companies-list', compact('companies'));
            }
                return view('ar.shipping.companies-list', compact('companies'));   
        }
    }

    /*
    * [Merch] Save selected shipping methods.
    */
    public function productShippingSave(Request $request)
    {
        if(Session::get('group') == 'merchant'){
            $product= Product::find($request->input('product_id')); 

            //get shipping companies count
            $companies_count= $request->input('companies_count');
            //get values from company, city, price, currinces:
            $start= 1;
            for($c= -1; $c > $companies_count; $c--){
            $check_count= $request->input('cities_count'.$c);
                if($request->input('shipping_check'.$c)){ 
                
                for($i= $start; $i < $check_count; $i++){
                    if($request->input('city'.$i)){

                        //get the tracking information value:
                        if($request->input('tracking'.$i)){
                            $tracking= 1;
                        }
                        else { $tracking= 0; }

                        //Save query:
                        DB::table('product_shipping_company')->insert(["product_id"=>$product->id, "shipping_company_id"=>$request->input('shipping_check'.$c), "city_id"=>$request->input('city'.$i),  "price"=>$request->input('price'.$i), "currency_id"=> $request->input('currency'.$i), "duration"=> $request->input('duration'.$i), "tracking"=> $tracking]);
                    }
                $start= $i+1;
                    }
                
                }
            }

            $store_id= $request->input('store_id');

            if(Session::get('lang') == 'en'){
                return Redirect::to('products-edit-list/'.$store_id)->with('message', 'Shipping Methods Added successfully!');
            }
                return Redirect::to('products-edit-list/'.$store_id)->with('message', 'تم إضافة طرق الشحن بنجاح وفي انتظار مراجعة المنتج!');

        }
        return Redirect('/');
    }

    /*
    * [Merch] Save selected shipping methods.
    */

    public function productShippingEdit($product_id)
    {
        if(Session::get('group') == 'merchant'){
            $product_id= $product_id;
            $product= Product::where('id', $product_id)->first();
            $countries= Country::with('cities')->get();
            $currencies= Currency::all();

            $shipping_cos= ShippingCompany::all();
           
            $selected_companies= []; 
            $selected_cities= [];
            foreach ($product->shippingCos as $comp) {
                array_push($selected_companies, $comp->id);
                array_push($selected_cities, $comp->pivot->city_id);
                }
            

            

            if(Session::get('lang') == 'en'){
                return view('en.shipping.[merch]product-shipping-edit', compact('product_id', 'product', 'shipping_cos', 'countries', 'currencies', 'selected_companies', 'selected_cities', 'product'));
            }
                return view('ar.shipping.[merch]product-shipping-edit', compact('product_id', 'product', 'shipping_cos', 'countries', 'currencies', 'selected_companies', 'selected_cities', 'product'));
        }
        return Redirect('/');
    }

    /*
    *  [Merch] Update process for th selected shipping methods.
    */
    public function productShippingUpdate(Request $request)
    {

    }

    /*
    *  Ajax Get Product's Shipping Methods details
    */
    public function productShippMethods(Request $request)
    {
        $city_id= $request->input('city_id');
        $product_id= $request->input('product_id');
        $product= Product::where('id', $product_id)->first();
        $currencies= Currency::all();

        $shipping_methods= $product->shippingCos()->where('city_id', $city_id)->get();

        return  [$shipping_methods, $currencies];
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get('group') == 'admin'){

            $countries= Country::with('cities')->get();

            $currencies= Currency::all();

            if(Session::get('lang') == 'en'){
                return view('en.shipping.shipping-company-create', compact('countries', 'currencies'));
            }
                return view('ar.shipping.shipping-company-create', compact('countries', 'currencies'));
        }
        else return Redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Session::get('group') == 'admin'){

            $company= new ShippingCompany;
            $company->ar_name= $request->input('ar_name');
            $company->en_name= $request->input('en_name');

            if ($request->file('image')){
            $file= $request->file('image');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $company->image= "images/".$filename;
                }

            $company->save();
               
            $check_count= $request->input('check_count');
            //loop check boxes:
            for ($i=1; $i < $check_count ; $i++) {
              if($request->input('city'.$i)){ 
                DB::table('city_shipping_company')->insert(["city_id"=>$request->input('city'.$i), "shipping_company_id"=>$company->id, "price"=>$request->input('price'.$i), "currency_id"=> $request->input('currency'.$i)]);
                }
            }
            

            if(Session::get('lang') == 'en'){
                return Redirect::to('shipping-companies/list')->with('message', 'New Shipping Company Added Successfully'); 
            }
                return Redirect::to('shipping-companies/list')->with('message', 'تم إضافة شركة الشحن بنجاح!');  
        }
        else return Redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::get('group') == 'admin'){
            $company= ShippingCompany::where('id', $id)->with('cities')->first();
            $countries= Country::with('cities')->get();
            $currencies= Currency::all();

            //get the selected saved cities:
            $selected_cities= [];
            foreach ($company->cities as $city) {
                array_push($selected_cities, $city->pivot->city_id);
                }

            if(Session::get('lang') == 'en'){
                return view('en.shipping.[admin]-shippingCo-edit', compact('company', 'countries', 'currencies', 'selected_cities'));
            }
                return view('ar.shipping.[admin]-shippingCo-edit', compact('company', 'countries', 'currencies', 'selected_cities'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Session::get('group') == 'admin'){

            $company= ShippingCompany::find($id);
            $company->ar_name= $request->input('ar_name');
            $company->en_name= $request->input('en_name');

            if ($request->file('image')){
                File::delete($company->image);
            $file= $request->file('image');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $company->image= "images/".$filename;
                }

            $company->save();
               
            $check_count= $request->input('check_count');
            DB::table('city_shipping_company')->where('shipping_company_id', $company->id)->delete();
            //loop check boxes:
            for ($i=1; $i < $check_count ; $i++) {
              if($request->input('city'.$i)){ 
                DB::table('city_shipping_company')->insert(["city_id"=>$request->input('city'.$i), "shipping_company_id"=>$company->id, "price"=>$request->input('price'.$i), "currency_id"=> $request->input('currency'.$i)]);
                }
            }
            
            if(Session::get('lang') == 'en'){
                return Redirect::to('shipping-companies/list')->with('message', 'Shipping Company Updated Successfully'); 
            }
                return Redirect::to('shipping-companies/list')->with('message', 'تم تحديث شركة الشحن بنجاح!');  
        }
        else return Redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
