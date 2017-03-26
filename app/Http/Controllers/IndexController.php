<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Banner;
use App\Http\Requests;
use Session, DB;

class IndexController extends Controller
{
    public function show()
    {
    	//Get Main Slider Images
    	$slider_imgs= DB::table('home_slider')->get();

    	//Get Commercial Banners Images
    	$banner1= Banner::where('id', 1)->select('ar_image_path', 'ar_image_path', 'url')->first();
    	$banner2= Banner::where('id', 2)->select('ar_image_path', 'ar_image_path', 'url')->first();
    	$banner3= Banner::where('id', 3)->select('ar_image_path', 'ar_image_path', 'url')->first();

    	//Get Most Sold products
    	$most_sold= Product::where('approve', 1)->with('productImages', 'rating')->orderBy('sell_count','desc')->take(6)->get(); 
    	//Get this Section label Images
    	$sell_label= DB::table('site_images')->where('id', 1)->first();

        //Get Most Sold products
        $recent_added= Product::where('approve', 1)->with('productImages','rating')->orderBy('id','desc')->take(6)->get(); 
        //Get this Section label Images
        $recent_label= DB::table('site_images')->where('id', 2)->first();

        //Get the Most Rated products
        $most_rated= Product::where('approve', 1)->with('productImages','rating')->orderBy('rating_percent','desc')->take(6)->get();
        //Get this Section label Images
        $rated_label= DB::table('site_images')->where('id', 3)->first();

        //Get Today's Deal products
        $todays_deal= Product::where('approve', 1)->where('todays_deal', 1)->with('productImages','rating')->inRandomOrder()->take(6)->get();
        //Get this Section label Images
        $deal_label= DB::table('site_images')->where('id', 4)->first();



    	if(Session::get('lang') == 'en'){
            return view('en.index', compact('slider_imgs', 'banner1', 'banner2', 'banner3', 'most_sold', 'sell_label', 'recent_added', 'recent_label', 'most_rated', 'rated_label', 'todays_deal', 'deal_label'));
        }
            return view('ar.index', compact('slider_imgs', 'banner1', 'banner2', 'banner3', 'most_sold', 'sell_label', 'recent_added', 'recent_label', 'most_rated', 'rated_label', 'todays_deal', 'deal_label')); 
    }


    public function showMore(Request $request)
    {
        if ($request->is('recent-products')){
            $products= Product::where('approve', 1)->orderBy('id','desc')->with('productImages', 'rating')->paginate(21);
            
            $banner= Banner::find(4);

            if(Session::get('lang') == 'en'){
                return view('en.sitecontent.recent-products', compact('products', 'banner'));
                }
                return view('ar.sitecontent.recent-products', compact('products', 'banner'));


        }
        elseif($request->is('high-sales')){
            $products= Product::where('approve', 1)->orderBy('sell_count','desc')->with('productImages', 'rating')->paginate(21);
        
            $banner= Banner::find(4);


            if(Session::get('lang') == 'en'){
                return view('en.sitecontent.high-sales', compact('products', 'banner'));
                }
                return view('ar.sitecontent.high-sales', compact('products', 'banner'));
        }
        elseif($request->is('high-rating')){
            $products= Product::where('approve', 1)->orderBy('rating_percent','desc')->with('productImages', 'rating')->paginate(21);
        
            $banner= Banner::find(4);


            if(Session::get('lang') == 'en'){
                return view('en.sitecontent.high-rating', compact('products', 'banner'));
                }
                return view('ar.sitecontent.high-rating', compact('products', 'banner'));    
        }


            

            
        
    }
}
