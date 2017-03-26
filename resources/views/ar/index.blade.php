@extends('ar.layouts.ar-main-layout') @section('content')

<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs slider-right ">
            	<div class="header-banner banner-opacity">
                    <a href='{!! URL::to("$banner1->url") !!}'><img alt="" src='{!! asset("$banner1->ar_image_path") !!}' /></a>
                </div>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-12 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                          @foreach($slider_imgs as $image)
                          <li><a href='{!! URL::to("$image->url") !!}'> <img alt="دلال مول" src='{!! asset("$image->ar_image_path") !!}' /></a></li>
                          @endforeach
                        </ul>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="container">
    <div class="service ">
        <div class="category-banner">
                <div class="col-sm-6 banner1">
                     <a href='{!! URL::to("$banner3->url") !!}'><img alt="" src='{!! asset("$banner3->ar_image_path") !!}' /></a>
                </div>
                <div class="col-sm-6 banner2">
                     <a href='{!! URL::to("$banner2->url") !!}'><img alt="" src='{!! asset("$banner2->ar_image_path") !!}' /></a>
                </div>
           </div>    
     </div>
</div>
</div>
<!-- END Home slideder-->

<div class="page-top">
    <div class="container">
        <div class="category-featured">
        
           <div class="product-featured clearfix">
                <div class="row">
                    
                    <div class="col-sm-12 col-right-tab">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active row" id="tab-6">
                                    <div class="col-md-4 col-xs-12 box-left equal">
                                        <div class="banner-img">
                                            <a href='{!! URL::to("high-sales") !!}'>
                                            	 <p class="header-p">المنتجات الأكثر مبيعًا</p>
                                            	<img src='{!! asset("$sell_label->ar_image_path") !!}' alt="المنتجات الأكثر مبيعًا">
                                                <p class="fotter-p">الإطلاع على الكل</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xs-12 equal box-right">
                                        <ul class="product-list row">
                                        <?php $s=1; ?>
                                            @foreach($most_sold as $product)
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
           </div>
           
           <div class="product-featured clearfix">
                <div class="row">
                    
                    <div class="col-sm-12 col-right-tab">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active row" id="tab-6">                                    
                                	<div class="col-md-4 col-xs-12 box-right equal pull-right">
                                        <div class="banner-img">
                                            <a href='{!! URL::to("recent-products") !!}'>
                                                 <p class="header-p">المنتجات المضافة حديثًا</p>
                                                <img src='{!! asset("$recent_label->ar_image_path") !!}' alt="المنتجات المضافة حديثًا">
                                                <p class="fotter-p">الإطلاع على الكل</p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xs-12 equal box-left">
                                        <ul class="product-list row">
                                        <?php $s=1; ?>
                                            @foreach($recent_added as $product)
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
                                                            <div id="rateYoRecent{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                                        </div>

                                                        <!--Star rating script-->
                                                        <script type="text/javascript">
                                                            $(function () {
                                 
                                                              $("#rateYoRecent"+'<?php echo $s ?>').rateYo({
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
           </div>
           
        
           <div class="product-featured clearfix">
                <div class="row">
                    
                    <div class="col-sm-12 col-right-tab">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active row" id="tab-6">
                                    <div class="col-md-4 col-xs-12 equal box-left ">
                                        <div class="banner-img">
                                            <a href='{!! URL::to("high-rating") !!}'>
                                            	 <p class="header-p">المنتجات الأعلى تقييمًا</p>
                                            	<img src='{!! asset("$recent_label->ar_image_path") !!}' alt="المنتجات الأعلى تقييمًا">
                                                <p class="fotter-p">الإطلاع على الكل</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xs-12 equal box-right">
                                        <ul class="product-list row">
                                            <?php $s=1; ?>
                                            @foreach($most_rated as $product)
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
                                                            <div id="rateYoRated{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                                        </div>

                                                        <!--Star rating script-->
                                                        <script type="text/javascript">
                                                            $(function () {
                                 
                                                              $("#rateYoRated"+'<?php echo $s ?>').rateYo({
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
           </div>
           
           <div class="product-featured clearfix">
                <div class="row">
                    
                    <div class="col-sm-12 col-right-tab">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active row" id="tab-6">                                    
                                	<div class="col-md-4 col-xs-12 equal box-right pull-right">
                                        <div class="banner-img">
                                            <a href='{!! URL::to("today-deal") !!}'>
                                            	 <p class="header-p">صفقات اليوم</p>
                                            	<img src='{!! asset("$deal_label->ar_image_path") !!}' alt="صفقات اليوم">
                                                <p class="fotter-p">الإطلاع على الكل</p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xs-12 equal box-left">
                                        <ul class="product-list row">
                                        <?php $s=1; ?>
                                            @foreach($todays_deal as $product)
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
                                                            <div id="rateYoTodays{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                                        </div>

                                                        <!--Star rating script-->
                                                        <script type="text/javascript">
                                                            $(function () {
                                 
                                                              $("#rateYoTodays"+'<?php echo $s ?>').rateYo({
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
           </div>
           
           <div class="product-featured clearfix">
                <div class="row">
                    
                    <div class="col-sm-12 col-right-tab">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active row" id="tab-6">                                    
                                    <div class="col-md-4 col-xs-12 equal box-left equal">
                                        <div class="banner-img">
                                            <a href='{!! URL::to("today-deal") !!}'>
                                                 <p class="header-p">منتجات مختارة</p>
                                                <img src='{!! asset("$deal_label->ar_image_path") !!}' alt="منتجات مختارة">
                                                <p class="fotter-p">الإطلاع على الكل</p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xs-12 equal box-right">
                                        <ul class="product-list row">
                                            <?php $s=1; ?>
                                            @foreach($todays_deal as $product)
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
                                                            <div id="rateYoChosen{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                                        </div>

                                                        <!--Star rating script-->
                                                        <script type="text/javascript">
                                                            $(function () {
                                 
                                                              $("#rateYoChosen"+'<?php echo $s ?>').rateYo({
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
                                            <?php $s++ ?>
                                            @endforeach
  
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
           </div>

           <div class="product-featured clearfix">
                <div class="row">
                    
                    <div class="col-sm-12 col-right-tab">
                        <div class="product-featured-tab-content">
                            <div class="tab-container">
                                <div class="tab-panel active row" id="tab-6">                                    
                                    <div class="col-md-4 col-xs-12 equal box-right pull-right">
                                        <div class="banner-img">
                                            <a href='{!! URL::to("today-deal") !!}'>
                                                 <p class="header-p">عروض الموضة</p>
                                                <img src='{!! asset("$deal_label->ar_image_path") !!}' alt="عروض">
                                                <p class="fotter-p">الإطلاع على الكل</p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xs-12 equal box-left">
                                        <ul class="product-list row">
                                            <?php $s= 1; ?>
                                            @foreach($todays_deal as $product)
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
                                                            <div id="rateYoOffers{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                                        </div>

                                                        <!--Star rating script-->
                                                        <script type="text/javascript">
                                                            $(function () {
                                 
                                                              $("#rateYoOffers"+'<?php echo $s ?>').rateYo({
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
                                            <?php $s++ ?>
                                            @endforeach
  
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
           </div>



        </div>
    </div>
</div>

@stop