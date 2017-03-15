<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Product;
use App\Banner;
use App\Http\Requests;
use Session;

class SearchController extends Controller
{
    public function filterSearch(Request $req){
    	
    	//Get Sub Category value
    	$sub_cat= $req->input('sub_cat');

    	//Get checked sizes 
        //convert the recived string into array to loop it
    	$sizes_input= $req->input('selected-sizes'); //to use again in the filter 
        $selected_sizes= explode(',', $req->input('selected-sizes'));
        // $sizes_count= $req->input('sizes_count');
    	// $selected_sizes= [];
    	// for ($i=1; $i < $sizes_count; $i++) { 
    	// 	if($req->input('size'.$i)){
    	// 	array_push($selected_sizes, $req->input('size'.$i));
    	// 	}
    	// }


    	//Get Mix & Max Price:
    	$min_price= $req->input('min-price');
    	$max_price= $req->input('max-price');

    	
    	//Get Sorting Order Choice:
        $sort= $req->input('order');


        //Get Selected Stars Rating:
        //convert the recived string into array to loop it
        $rating_input= $req->input('selected-rating');
        $selected_rating= explode(',', $req->input('selected-rating')); 
    	// $selected_rating= [];
    	// for ($r=1; $r < 6; $r++) { 
    	// 	if($req->input('stars'.$r)){
    	// 	array_push($selected_rating, $req->input('stars'.$r));
    	// 	}
    	// }
    	 
    	


        /*
        *   Search Process:
        */
    	$query= Product::where('approve', 1)->where('sub_category_id', $sub_cat)
    		->where(function($que) use($selected_sizes){
    		if($selected_sizes != [""]){
            foreach($selected_sizes as $size){
    			$que->orWhereHas('sizes', function($q) use($size){
    			
    				$q->where('sizes.id', $size);	
    			
    			});
    		}
            }
    	})->where(function($que) use($min_price, $max_price){
    		if($max_price !=null){
    			
    			$que->where('price', '>=', $min_price)->where('price', '<=', $max_price)
    				->orWhere('offer_price', '>=', $min_price)->where('offer_price', '<=', $max_price);
    			}
    		
    	})->where(function($que) use($selected_rating){
    		foreach($selected_rating as $rating){
    			$que->orWhere(function($q) use($rating){
    			switch ($rating) {
    				case "1":
    					$q->where('rating_percent', '<', 40);
    					break;
    				case "2":
    					$q->where('rating_percent', '<', 60)->where('rating_percent', '>', 40);
    					break;
    				case "3":
    					$q->where('rating_percent', '<', 80)->where('rating_percent', '>', 60);
    					break;
    				case "4":
    					$q->where('rating_percent', '<', 100)->where('rating_percent', '>', 80);
    					break;
    				case "5":
    					$q->where('rating_percent', 100);
    					break;	
                        
    				}
                    
                    
    			});
    		}
    	})
    		
            ->with('productImages','rating');

        
        //Sorting options:
        if($sort == 'most-sale'){    
            $products= $query->orderBy('sell_count','desc')->paginate(21);  
        }
        elseif($sort == 'recent-add'){
            $products= $query->orderBy('id','desc')->paginate(21);
        }
        else{
            $products= $query->paginate(21);
        }



        $sub_category= SubCategory::where('id', $sub_cat)->with('sizes.products')->first();
        $banner= Banner::find(4);


    if(Session::get('lang') == 'en'){
        return view('en.search.advance-filter', compact('products', 'sub_cat', 'sub_category', 'selected_sizes', 'sort', 'selected_rating', 'min_price', 'max_price', 'banner', 'sizes_input', 'rating_input'));
    }
        return view('ar.search.advance-filter', compact('products', 'sub_cat', 'sub_category', 'selected_sizes', 'sort', 'selected_rating', 'min_price', 'max_price', 'banner', 'sizes_input', 'rating_input'));

    	

    }
}
