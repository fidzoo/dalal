<?php 
/*
* Helpers Functions File
*/

//Get Sections for the layout:
function sections()
{
	$sections= App\Section::where('active', 1)->get();

	return $sections;
}

//Get notificaitons for dashboard:
function notifications()
{
	//get notication group
	$belongs= Session::get('group');
    
    if($belongs == 'admin'){
        $notifications= App\Notification::where('belongs_to', $belongs)->where('read', 0)->orderBy('id','desc')->get();
    }
    elseif($belongs == 'merchant' || $belongs == 'buyer'){
        $notifications= App\Notification::where('belongs_to', $belongs)->where('receiver_id', Session::get('user_id'))->where('read', 0)->orderBy('id','desc')->get();   
    }
	
	$count= count($notifications);
	
	return ['notifications'=>$notifications, 'count'=>$count];
}

//Rating calculation:
function rating($ratings, $count)
{
	$ratings_sum= 0;
        
    foreach($ratings as $ra){
        $ratings_sum= $ratings_sum + $ra->rating;
    }

    if($count !=0){
    $rating= round($ratings_sum / $count, 1);
    }
    else $rating= 0;

    return $rating;
}

//Rating percentage calculation:
function rating_precent($ratings, $count)
{
	$ratings_sum= 0;
        
    foreach($ratings as $ra){
        $ratings_sum= $ratings_sum + $ra->rating;
    }

    if($count !=0){
    $rating= round($ratings_sum / $count, 1);
    $percentage= ($rating / 5) * 100;
    }
    else{ 
    	$rating= 0;
    	$percentage= 0;
    	}

    return $percentage;
}


//Function to count the single star products
function starProducts($stars)
{

    switch ($stars) {
        case 1:
            $count= App\Product::where('approve', 1)->where('rating_percent', '<', 40)->count();
            break;
        case 2:
            $count= App\Product::where('approve', 1)->where('rating_percent', '<', 60)->where('rating_percent', '>', 40)->count();
            break;
        case 3:
            $count= App\Product::where('approve', 1)->where('rating_percent', '<', 80)->where('rating_percent', '>', 60)->count();
            break;
        case 4:
            $count= App\Product::where('approve', 1)->where('rating_percent', '<', 100)->where('rating_percent', '>', 80)->count();
            break;
        case 5:
            $count= App\Product::where('approve', 1)->where('rating_percent', 100)->count();
            break;   
        }
    
    return $count;
}

?>