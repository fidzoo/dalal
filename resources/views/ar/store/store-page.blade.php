@extends('ar.layouts.ar-main-layout')

@section('content')
<div class="page-top">
    <div class="container" id="columns">

        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-12">
                <!-- category-slider -->
                <div class="category-slider">
                	<img src='{!! asset("$store->ar_banner") !!}' alt="{!!$store->ar_name!!}" class="img-responsive">
                </div>
                <!-- ./category-slider -->
                
                
                <div id="main-menu" class="main-menu">
                    <nav class="navbar navbar-default">
                        <div class="">
                            <div class="navbar-header">
                                <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>-->
                                <a class="navbar-brand pull-right" href="#">قائمة المتجر</a>
                            </div>
                            <div id="navbar" class="navbar-collapse ">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#"> صفحة المتجر</a></li>
                                	<li><a href="#"> أفضل العروض</a></li>
                                	<li><a href="#"> الأكثر مبيعاً</a></li>
                                	<li><a href="#"> أتى حديثاً</a></li>
                                	<li><a href="#"> التقييم</a></li>
                                    <li><a href="#"> تواصل مع المتجر</a></li>

                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
                
            </div>
            
            <!-- Left colunm -->
            <div class="column col-md-3 col-xs-12 col-sm-12 pull-right" id="left_column">
                <!-- block filter -->
                <div class="block left-module top30">
                    <p class="title_block"> <img src="assets/data/cloth.png" title="" align=""> أقسام المتجر</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php $no = 1; ?>
                                @foreach ($all_main_cats as $all_main_cat)
                                  @if (in_array($all_main_cat->id, $select_main_cats))
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$no}}">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$no}}" aria-expanded="true" aria-controls="collapse{{$no}}">
                                           {!! $all_main_cat->ar_title !!} 
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapse{{$no}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$no}}" aria-expanded="true">
                                      <div class="panel-body">
                                      <ul class="tree-menu">
                                      @foreach ($all_main_cat->subCategories as $sub_cat)
                                        
                                            @if (in_array($sub_cat->id, $select_sub_cats))
                                            <li><span></span><a href='{!! URL::to("section-products/$sub_cat->id") !!}'>{{$sub_cat->ar_title}}</a></li>
                                            @endif
                                        
                                      @endforeach
                                      </ul>
                                    </div>
                                    </div>
                                  </div>
                                  @endif
                                  <?php $no++; ?>
                                @endforeach 
   
                                </div>
    
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                
                <div class="block left-module">
                  	<p class="title_block">{!!$store->ar_name!!}</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                            <li><a href='{!! URL::to("store/$store->id") !!}'><img src='{!! asset("$store->ar_logo") !!}' title="{!!$store->ar_name!!}" alt="{!!$store->ar_name!!}"> </a></li>
                                            <li><a href="#" class="active">{!!$store->ar_name!!}</a></li>
                                            <li><a href="#"> {!!$store->city->ar_name!!}/ {!!$store->country->ar_name!!}</a></li>
                                            <li>
                                            	<a href="#" class="pull-right">التقييم :</a>
                                                <div class="product-comments">
                                                    <div class="product-star pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        &nbsp; 
                                                       
                                                    </div>
                                                    <div class="comments-advices pull-right">
                                                        <a> <span>5.4 %</span></a>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li><a href="#">تواصل مع المتجر</a></li>
                                            <li style="margin-top:20px;">
                                                @if($store->return_policy == 1)
                                                <a href="#"><img src='{!! asset("ar-assets/front-end/images/back.png") !!}' title="سياسة الإسترجاع" alt=""></a>
                                                @endif
                                                @if ($store->trusted == 1)
                                                <a style="margin-right:30px;" href="#"><img src='{!! asset("ar-assets/front-end/data/ma3rof.png") !!}' alt="موثوق"></a>
                                                @endif
                                            </li>
                                        </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                
                <div class="block left-module  hidden-sm hidden-xs">
                    <p class="title_block"> المنتجات الأكثر مبيعا </p>
                    <div class="block_content">
                        <ul class="products-block best-sell">
                            @foreach($most_sale as $most_product) 
                                <li class="col-sm-12">
                                        <div class="bordered">
                                            <div class="left-block">
                                                <a href="#">
                                                <img class="img-responsive" alt="product" src="assets/data/p55.jpg"></a>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name">
                                                    <a href="#">انفنيكس زيرو 3 X552 بشريحتي اتصال - 16 جيجا, الجيل الرابع ال تي اي, ذهبي</a>
                                                </h5>
                                                <div class="product-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <div class="content_price">
                                                    <span class="price 50.10 رس">91.45 رس</span>
                                                    <span class="price product-price">77.10 رس</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            @endforeach
                            </ul>
                    </div>
                </div>
                <!-- ./block filter  -->
            </div>
            <!-- ./left colunm -->

            <!-- Center colunm-->
            <div class="center_column col-md-9 col-xs-12 col-sm-12" id="center_column">
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading bg-white">
                    	كل البضائع
                    </h2>
                        
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @foreach ($products as $product)
                        <li class="col-sx-12 col-sm-4">
                            <div class="bordered">
                                <div class="left-block">
                                    <a href="#">
                                    <img class="img-responsive" alt="product" src="assets/data/p55.jpg"></a>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name">
                                        <a href="#">انفنيكس زيرو 3 X552 بشريحتي اتصال - 16 جيجا, الجيل الرابع ال تي اي, ذهبي</a>
                                    </h5>
                                    <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price old-price">91.45 رس</span>
                                        <span class="price product-price">77.10 رس</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                

                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                           {!!$products->links()!!}
                          </ul>
                        </nav>
                    </div>
                    
                    
                </div>
                <!--<div class="sortPagiBar">
                	<div class="button style-10" style="width: 100%;">إعرض المزيد<input type="submit" value=""></div>
                </div>-->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>

@stop