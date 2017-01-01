<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Http\Requests;
use Session, Redirect, File;

class StoreController extends Controller
{
    /*Customized functions inside controller:
    * - merchStoreList
    *
    */


    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        }       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get('group') == 'merchant'){
        
        if(Session::get('lang') == 'en'){
            return view('en.store.store-create');
            }
        return view('store.store-create');
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
        if(Session::get('group') == 'merchant'){
        $store= new Store;
        $store->ar_name= $request->input('ar_name');
        $store->en_name= $request->input('en_name');
        $store->ar_description= $request->input('ar_description');
        $store->en_description= $request->input('en_description');
        $store->active= 0;
        $store->user_id= Session::get('user_id');
        
        //Upload Logos, Banners images
        if ($request->file('ar_logo')){
            $file= $request->file('ar_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_logo= 'images/'.$filename;
        }
        else {$store->ar_logo= 'ar-assets/images/def-logo.png';}
        //
        if ($request->file('en_logo')){
            $file= $request->file('en_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_logo= 'images/'.$filename;
        }
        else {$store->en_logo= 'ar-assets/images/def-logo.png';}
        //
        if ($request->file('ar_banner')){
            $file= $request->file('ar_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_banner= 'images/'.$filename;
        }
        else {$store->ar_banner= 'ar-assets/images/def-logo.png';}
        //
        if ($request->file('en_banner')){
            $file= $request->file('en_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_banner= 'images/'.$filename;
        }
        else {$store->en_banner= 'ar-assets/images/def-logo.png';}
        
        $store->save();


        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Store Created Successfully, you can Re-edit your store infromation later.');
            }
        return Redirect::back()->with('message', 'تم إنشاء المتجر بنجاح، يمكنك تعديل بيانات متجرك لاحقاً.');
        }
    }

    /*
    * To display list of Merchent's stores
    */
    public function merchStoreList(){
        $stores= Store::where('user_id', Session::get('user_id'))->get();
        
        if(Session::get('lang') == 'en'){
            return view('en.store.merchant-store-list', compact('stores'));
        }
            return view('store.merchant-store-list', compact('stores'));
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::get('group') == 'merchant'){
            $store= Store::find($id);

            if(Session::get('lang') == 'en'){
                return view('en.store.store-merch-edit');
            }
            else return view('store.store-merch-edit', compact('store'));

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
        if(Session::get('group') == 'merchant'){
        $store= Store::find($id);
        $store->ar_name= $request->input('ar_name');
        $store->en_name= $request->input('en_name');
        $store->ar_description= $request->input('ar_description');
        $store->en_description= $request->input('en_description');
        
        //Upload Logos, Banners images
        if ($request->file('ar_logo')){
            //delete old image
            if ($store->ar_logo != "ar-assets/images/def-logo.png"){
            File::delete($store->ar_logo);
                }
            $file= $request->file('ar_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_logo= 'images/'.$filename;
        }
        else {$store->ar_logo= 'ar-assets/images/def-logo.png';}
        //
        if ($request->file('en_logo')){
            //delete old image
            if ($store->en_logo != "ar-assets/images/def-logo.png"){
            File::delete($store->en_logo);
                }
            $file= $request->file('en_logo');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_logo= 'images/'.$filename;
        }
        else {$store->en_logo= 'ar-assets/images/def-logo.png';}
        //
        if ($request->file('ar_banner')){
            //delete old image
            if ($store->ar_banner != "ar-assets/images/def-logo.png"){
            File::delete($store->ar_banner);
                }
            $file= $request->file('ar_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->ar_banner= 'images/'.$filename;
        }
        else {$store->ar_banner= 'ar-assets/images/def-logo.png';}
        //
        if ($request->file('en_banner')){
            //delete old image
            if ($store->en_banner != "ar-assets/images/def-logo.png"){
            File::delete($store->en_banner);
                }
            $file= $request->file('en_banner');
            $destinationPath= 'images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            $store->en_banner= 'images/'.$filename;
        }
        else {$store->en_banner= 'ar-assets/images/def-logo.png';}
        
        $store->save();


        if(Session::get('lang') == 'en'){
            return Redirect::back()->with('message', 'Store عحيشفثي Successfully, you can Re-edit your store infromation later.');
            }
        return Redirect::back()->with('message', 'تم إنشاء المتجر بنجاح، يمكنك تعديل بيانات متجرك لاحقاً.');
        }
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
