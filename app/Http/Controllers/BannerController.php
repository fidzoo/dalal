<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Http\Requests;
use Session, Redirect, File;

class BannerController extends Controller
{
    /*
    * Customized functions:
    * homeBanners(): [Admin] display Home page banners to edit it.
    * subCatBanner(): [Admin] display Sub Category banner to edit it.
    */

    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        } 

    /*
    *   [Admin] display Home page banners to edit it.
    */
    public function homeBanners()
    {
        $banner1 = Banner::find(1);
        $banner2 = Banner::find(2);
        $banner3 = Banner::find(3);

        if(Session::get('group') == 'admin'){
            if(Session::get('lang') == 'en'){
                return view('en.banner.home-banners', compact('banner1', 'banner2', 'banner3'));
            }
                return view('ar.banner.home-banners', compact('banner1', 'banner2', 'banner3'));   
        }    
    }

    /*
    * [Admin] display Sub Category banner to edit it.
    */
    public function subCatBanner()
    {
       $banner1 = Banner::find(4); 

       if(Session::get('lang') == 'en'){
                return view('en.banner.subcat-banner', compact('banner1'));
            }
                return view('ar.banner.subcat-banner', compact('banner1'));
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

        // if ($request->is('merchant-banners/create')){
        //     if(Session::get('group') == 'merchant'){
               
        //     }
            
        // }

        return Redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return Redirect('/');
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
        
        //Update The Home Page Banners
        if ($request->is('banners/home')){
        
            $banner1= Banner::find(1);
            $banner2= Banner::find(2);
            $banner3= Banner::find(3);
            
            //update home banners:
            //i used a new hidden form values as a flag to detect which banner to update and dynamic php variables ${'banner'.$flag}
            for ($m=1; $m < 7; $m++) {
                if ($request->file('image'.$m)){

                $flag= $request->input('flag'.$m);
                $lang= $request->input('lang'.$m);
                
                if($lang == 'ar'){
                    File::delete(${'banner'.$flag}->ar_image_path);
                }else{
                    File::delete(${'banner'.$flag}->en_image_path);
                }
                
                $file= $request->file('image'.$m);
                $destinationPath= 'ar-assets/front-end/images/';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);

                if($lang == 'ar'){
                    ${'banner'.$flag}->update(['ar_image_path'=>$destinationPath.$filename]);
                }else{
                    ${'banner'.$flag}->update(['en_image_path'=>$destinationPath.$filename]);
                        }
                    }
                }

            //The Url update:
            $banner1->url= $request->input('url1');
            $banner2->url= $request->input('url2');
            $banner3->url= $request->input('url3');
            $banner1->save();
            $banner2->save();
            $banner3->save();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Banners Updated Successfully!');
                }
                return Redirect::back()->with('message', 'تم تحديث البنرات بنجاح!'); 
            
        }
        //Update The Cateogry page Banner
        elseif($request->is('banners/sub-category')){
            $banner4= Banner::find(4);
            
            //update home banners:
            //i used a new hidden form values as a flag to detect which banner to update and dynamic php variables ${'banner'.$flag}
            for ($m=1; $m < 3; $m++) {
                if ($request->file('image'.$m)){

                $flag= 4;
                $lang= $request->input('lang'.$m);
                
                if($lang == 'ar'){
                    File::delete(${'banner'.$flag}->ar_image_path);
                }else{
                    File::delete(${'banner'.$flag}->en_image_path);
                }
                
                $file= $request->file('image'.$m);
                $destinationPath= 'ar-assets/front-end/images/';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);

                if($lang == 'ar'){
                    ${'banner'.$flag}->update(['ar_image_path'=>$destinationPath.$filename]);
                }else{
                    ${'banner'.$flag}->update(['en_image_path'=>$destinationPath.$filename]);
                        }
                    }
                }

            //The Url update:
            $banner4->url= $request->input('url1');
            $banner4->save();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Banners Updated Successfully!');
                }
                return Redirect::back()->with('message', 'تم تحديث البنرات بنجاح!'); 
            

            }

        }
        else Redirect('/');
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
