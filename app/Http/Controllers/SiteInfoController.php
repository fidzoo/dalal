<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SiteInfo;
use Session, File, Redirect, DB;

class SiteInfoController extends Controller
{
    /*
    * Functions inside this controller:
    * show(): To display site pages content .. by Muhnad
    * Update(): [Admin] To update site pages content... by Muhnad
    * homeSlider(): [Admin] To update the Index page slider images.
    * homeSliderDelete(): [Admin] To delete image from slider.
    * homeSliderUpload(): [Admin] To upload image to home slider.
    * homeLabels(): [Admin][view] To Update Home page Tabs images, ex. "الأكثر مبيعا", "المضافة مأخرا"
    * homeLabelsUpdate(): [Admin][update process] To Update Home page Tabs images, ex. "الأكثر مبيعا", "المضافة مأخرا"
    */
    

    public function show(Request $request){
    	if ($request->is('about')) {
    		
            $about = SiteInfo::find(1);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.about', compact('about'));
            }
            return view('ar.siteinfo.about', compact('about'));


    	}elseif ($request->is('merchant-agreement')) {
    		$merchant_agreement = SiteInfo::find(2);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.merchant-agreement', compact('merchant_agreement'));
            }
            return view('ar.siteinfo.merchant-agreement', compact('merchant_agreement'));
 
            
    	}elseif ($request->is('buyer-agreement')) {
    		$buyera_greement = SiteInfo::find(3);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.buyer-agreement', compact('buyera_greement'));
            }
            return view('ar.siteinfo.buyer-agreement', compact('buyera_greement'));
 
            
    	}elseif ($request->is('selling-instruct')) {
    	    $sell = SiteInfo::find(4);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.selling-instruct', compact('sell'));
            }
            return view('ar.siteinfo.selling-instruct', compact('sell'));

            
    	}elseif ($request->is('buy-instruct')) {
    		$buy = SiteInfo::find(5);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.buy-instruct', compact('buy'));
            }
            return view('ar.siteinfo.buy-instruct', compact('buy'));

    	}elseif ($request->is('payment-methods')) {
    		$payment_methods = SiteInfo::find(6);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.payment-methods', compact('payment_methods'));
            }
            return view('ar.siteinfo.payment-methods', compact('payment_methods'));
            
    	}elseif ($request->is('privacy-policy')) {
    		$privacy_policy = SiteInfo::find(7);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.privacy-policy', compact('privacy_policy'));
            }
            return view('ar.siteinfo.privacy-policy', compact('privacy_policy'));
        
    	}elseif ($request->is('replacement')) {
    		$replacement = SiteInfo::find(8);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.replacement', compact('replacement'));
            }
            return view('ar.siteinfo.replacement', compact('replacement'));
        
            
    	}elseif ($request->is('delivery-shipping')) {
    		$shipping = SiteInfo::find(9);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.delivery-shipping', compact('shipping'));
            }
            return view('ar.siteinfo.delivery-shipping', compact('shipping'));
        
            
    	}elseif ($request->is('recruitment')) {
    		$recruitment = SiteInfo::find(10);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.recruitment', compact('recruitment'));
            }
            return view('ar.siteinfo.recruitment', compact('recruitment'));
        
         
    	}elseif ($request->is('media')) {
    		$media = SiteInfo::find(11);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.media', compact('media'));
            }
            return view('ar.siteinfo.media', compact('media'));
        
    	}elseif ($request->is('suggestions')) {
    		$suggestions = SiteInfo::find(12);
            if(Session::get('lang') == 'en'){
            return view('en.siteinfo.suggestions', compact('suggestions'));
            }
            return view('ar.siteinfo.suggestions', compact('suggestions'));
        
            
    	}

    }
    
    public function update(Request $request, $id){
    	    
    	    $siteinfo = SiteInfo::find($id);
            $siteinfo->item = $request->input('item');
            $siteinfo->ar_content = $request->input('ar_content');
            $siteinfo->en_content = $request->input('en_content');
           
            //this for uploud image
            if ($request->file('image')){
            File::delete($siteinfo->image);
            $file= $request->file('image');
            $destinationPath= 'en-assets\back-end\images';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $siteinfo->image = "en-assets\back-end\images/".$filename;
            
            }

            $siteinfo->save();	
            if(Session::get('lang') == 'en'){
                return Redirect::to('')->with('message', 'Updated Successfully!');
            }
                return Redirect::to('')->with('message', 'تم تحديث بنجاح!');  
        } 
    



        public function informationPage(Request $request){
            
            if ($request->is('siteinfo-update')) {
                $about = SiteInfo::find(1); 
                $merchant_agreement = SiteInfo::find(2);
                $buyer_agreement = SiteInfo::find(3);
                $sell = SiteInfo::find(4);
                $buy = SiteInfo::find(5);
                $payment_methods = SiteInfo::find(6);
                if(Session::get('lang') == 'en'){
                return view('en.siteinfo.siteinfo-update', compact('about','merchant_agreement','buyer_agreement','sell','buy','payment_methods'));
                }
                return view('ar.siteinfo.siteinfo-update', compact('about','merchant_agreement','buyer_agreement','sell','buy','payment_methods'));

            }elseif($request->is('sitepolicy-update')){
                $privacy_policy = SiteInfo::find(7);
                $replacement = SiteInfo::find(8);
                $shipping = SiteInfo::find(9);
                if(Session::get('lang') == 'en'){
                return view('en.siteinfo.sitepolicy-update', 
                        compact('privacy_policy','replacement','shipping'));
                }
                return view('ar.siteinfo.sitepolicy-update', 
                        compact('privacy_policy','replacement','shipping'));
            }elseif($request->is('customer-service-update')){
                $recruitment = SiteInfo::find(10);
                $media = SiteInfo::find(11);
                $suggestions = SiteInfo::find(12);
                if(Session::get('lang') == 'en'){
                return view('en.siteinfo.customer-service-update', 
                    compact('recruitment','media','suggestions'));
                }
                return view('ar.siteinfo.customer-service-update', compact('recruitment','media','suggestions'));
            }
        }



    /*
    * [Admin] To update the Index page slider images.
    */
    public function homeSlider()
    {
        if(Session::get('group') == 'admin'){

            $slider_imgs= DB::table('home_slider')->get();

            if(Session::get('lang') == 'en'){
                return view('en.siteinfo.home-slider-update', compact('slider_imgs'));
            }
                return view('ar.siteinfo.home-slider-update', compact('slider_imgs'));
        }
    }

    /*
    * [Admin] To upload image to home slider.
    */
    public function homeSliderUpload(Request $request)
    {
        if(Session::get('group') == 'admin'){

            //upload slider images:
            //upload process
            for ($m=1; $m < 4; $m++) {
                //Image Arabic Ver.
                if ($request->file('ar_image'.$m)){
                $file= $request->file('ar_image'.$m);
                $destinationPath= 'ar-assets/front-end/images/';
                $filename= rand().$file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $ar_image= $destinationPath.$filename;
                }
                else{
                    $ar_image= null;
                }

                //Image English Ver.
                if ($request->file('en_image'.$m)){
                $file2= $request->file('en_image'.$m);
                $destinationPath2= 'ar-assets/front-end/images/';
                $filename2= rand().$file2->getClientOriginalName();
                $file2->move($destinationPath2, $filename2);
                $en_image= $destinationPath2.$filename2;
                }
                else{
                    $en_image= null;
                }

                if($request->file('ar_image'.$m) || $request->file('en_image'.$m)){

                DB::table('home_slider')->insert(['ar_image_path'=>$ar_image, 'en_image_path'=>$en_image, 'url'=>$request->input('url'.$m)]);
                }
            }

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Images uploaded Successfully!');
            }
                return Redirect::back()->with('message', 'تم رفع الصور بنجاح!');
        }

    }


    /*
    * Delete Slider photos
    */
    public function homeSliderDelete($id)
    {
        if(Session::get('group') == 'admin'){

            $image= DB::table('home_slider')->where('id', $id)->first();
            File::delete($image->ar_image_path);
            DB::table('home_slider')->where('id', $id)->delete();

            if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Image Deleted Successfully!');
            }
                return Redirect::back()->with('message', 'تم حذف الصورة بنجاح!');
        }
    }

    /*
    *  [Admin] To Update Home page Tabs images, ex. "الأكثر مبيعا", "المضافة مأخرا"
    */
    public function homeLabels()
    {
       if(Session::get('group') == 'admin'){
        $label1= DB::table('site_images')->where('id', 1)->first();
        $label2= DB::table('site_images')->where('id', 2)->first();
        $label3= DB::table('site_images')->where('id', 3)->first();
        $label4= DB::table('site_images')->where('id', 4)->first();
        $label5= DB::table('site_images')->where('id', 5)->first();
        $label6= DB::table('site_images')->where('id', 6)->first();

        if(Session::get('lang') == 'en'){
                return view('en.sitecontent.home-labels-update', compact('label1', 'label2', 'label3', 'label4', 'label5', 'label6'));
            }
                return view('ar.sitecontent.home-labels-update', compact('label1', 'label2', 'label3', 'label4', 'label5', 'label6'));
       }
       else{
        return Redirect('/');
       } 
    }

    /*
    * [Admin][update process] To Update Home page Tabs images, ex. "الأكثر مبيعا", "المضافة مأخرا"
    */
    public function homeLabelsUpdate(Request $request, $id)
    {
        if(Session::get('group') == 'admin'){
           $label= DB::table('site_images')->where('id', $id)->first();

           if ($request->file('image'.$id)){
            File::delete($label->ar_image_path);
            $file= $request->file('image'.$id);
            $destinationPath= 'ar-assets\front-end\images/';
            $filename= rand().$file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            
            DB::table('site_images')->where('id', $id)->update(['ar_image_path'=>$destinationPath.$filename]);
            }
        

        if(Session::get('lang') == 'en'){
                return Redirect::back()->with('message', 'Image Updated Successfully!');
            }
                return Redirect::back()->with('message', 'تم تحديث الصورة بنجاح!');
       
        }else{
        return Redirect('/');
       }
    }
}
