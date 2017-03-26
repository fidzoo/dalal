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
                                    <li class="active"><a href='{!! URL::to("store/$store->id") !!}'> صفحة المتجر</a></li>
                                	<li><a href="#"> أفضل العروض</a></li>
                                	<li><a href='{!! URL::to("store-tab/$store->id/high-sale") !!}'> الأكثر مبيعاً</a></li>
                                	<li><a href='{!! URL::to("store-tab/$store->id/recent-add") !!}'> أتى حديثاً</a></li>
                                	<li><a href='{!! URL::to("store/$store->id/ratings") !!}'> التقييم</a></li>
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
                    <p class="title_block"> <img src='{!! asset("ar-assets/front-end/images/5.png") !!}' title="" align=""> أقسام المتجر</p>
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
                                            <li><span></span><a href='{!! URL::to("store-categories/$store->id/$sub_cat->id") !!}'>{{$sub_cat->ar_title}}</a></li>
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
                                                        <div id="rateYoStore" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp; 
                                                       
                                                    </div>

                                                    <!--Star rating script-->
                                                        <script type="text/javascript">
                                                            $(function () {
                                 
                                                              $("#rateYoStore").rateYo({
                                                                starWidth: "15px",
                                                                rating: '<?php echo rating($store->rating, count($store->rating)) ?>',
                                                                rtl: true,
                                                                readOnly: true,
                                                              });
                                                             
                                                            });
                                                        </script>
                                                    <!--end of Star rating script-->

                                                    <div class="comments-advices pull-right">
                                                        <a> <span>{!! rating_precent($store->rating, count($store->rating)) !!} %</span></a>
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
                            <?php $s= 1 ?>
                                @foreach($most_sale as $most_product)
                                <li class="col-sm-12">
                                    <div class="bordered">
                                        <div class="left-block">
                                            <?php $url=str_replace(" ", "-", $most_product->ar_title); ?>

                                        <a href='{{ URL::to( "product/$most_product->id/$url") }}'>
                                        @if(!$most_product->productImages->isEmpty())
                                            <?php $img= $most_product->productImages[0]->image_path; ?>
                                            <img class="img-responsive" alt="{{$most_product->ar_title}}" src='{!! asset("$img") !!}'></a>
                                        @else
                                            <img class="img-responsive" alt="default-img" src='{!! asset("ar-assets/front-end/images/logo.png") !!}'></a>
                                        @endif
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name">
                                                <a href='{{ URL::to( "product/$most_product->id/$url") }}'>{!!$most_product->ar_title!!}</a>
                                            </h5>
                                            <div class="product-star">
                                                <div id="rateYoMost{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                            </div>

                                            <!--Star rating script-->
                                            <script type="text/javascript">
                                                $(function () {
                     
                                                  $("#rateYoMost"+'<?php echo $s ?>').rateYo({
                                                    starWidth: "15px",
                                                    rating: '<?php echo rating($most_product->rating, count($most_product->rating)) ?>',
                                                    rtl: true,
                                                    readOnly: true,
                                                  });
                                                 
                                                });
                                            </script>
                                            <!--end of Star rating script-->

                                            <div class="content_price">
                                            @if($most_product->price_offer == 1)
                                            <span class="price old-price">{{$most_product->price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            <span class="price product-price">{{$most_product->offer_price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            @else
                                            <span class="price product-price">{{$most_product->price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $s++ ?>
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
                    @if($products->count() < 1)
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading bg-white" style="text-align: center">
                        عذرًا لا توجد بضائع في هذا القسم حتى الأن
                    </h2>
                    </div>
                      @endif  
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        <?php $s=1; ?>
                        @foreach($products as $product)
                        <li class="col-sm-4">
                            <div class="bordered">
                                <div class="left-block">
                                <?php $url=str_replace(" ", "-", $product->ar_title); ?>
                                    <a href='{{ URL::to( "product/$product->id/$url") }}'>
                                    @if(!$product->productImages->isEmpty())
                                    <?php $img= $product->productImages[0]->image_path; ?>
                                    <img class="img-responsive" alt="{{$product->ar_title}}" src='{!! asset("$img") !!}'></a>
                                    @else
                                    <img class="img-responsive" alt="default-img" src='{!! asset("ar-assets/front-end/images/logo.png") !!}'></a>
                                    @endif
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name">
                                        <a href='{{ URL::to( "product/$product->id/$url") }}'>{!!$product->ar_title!!}</a>
                                    </h5>
                                    <div class="product-star">
                                        <div id="rateYoSold{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                    </div>

                                    <!--Star rating script-->
                                    <script type="text/javascript">
                                        $(function () {
             
                                          $("#rateYoSold"+'<?php echo $s ?>').rateYo({
                                            starWidth: "15px",
                                            rating: '<?php echo rating($product->rating, count($product->rating)) ?>',
                                            rtl: true,
                                            readOnly: true,
                                          });
                                         
                                        });
                                    </script>
                                    <!--end of Star rating script-->

                                    <div class="content_price">
                                        @if($product->price_offer == 1)
                                        <span class="price old-price">{{$product->price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                        <span class="price product-price">{{$product->offer_price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                        @else
                                        <span class="price product-price">{{$product->price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php $s++; ?>
                        @endforeach


                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                

                <div class="sortPagiBar">
                    {!!$products->links()!!}
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