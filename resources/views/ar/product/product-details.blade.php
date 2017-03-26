@extends('ar.layouts.ar-main-layout') @section('content')



<!-- Link Swiper's CSS -->
<link rel="stylesheet" href='{!! asset("ar-assets/front-end/css/swiper.min.css") !!}'>
<style>
    .swiper-container {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }
    
    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 300px;
    }
</style>


<div class="container" id="columns">
    <!-- breadcrumb -->
{{csrf_field()}}
    <!-- ./breadcrumb -->
    <!-- row -->
    <div class="row">
        <!-- Center colunm-->
        <div class="center_column col-xs-12 col-sm-12">

            <div class="breadcrumb clearfix">
                <a>أنت تتصفح : </a>
                <span class="navigation-pipe">&nbsp;</span>
                <a class="home" title="الرئيسية">دلال مول</a>
                <span class="navigation-pipe">&nbsp;</span>
                <?php $section_id= $product->subCategory->maincategories[0]->section->id;
$url=str_replace(" ", "-", $product->subCategory->maincategories[0]->section->ar_title); ?>
                    <a class="home" title="الرئيسية">{!!$product->subCategory->maincategories[0]->section->ar_title!!}</a>

                    <span class="navigation-pipe">&nbsp;</span>
                    <?php $mcat_id= $product->subCategory->maincategories[0]->id;
$url=str_replace(" ", "-", $product->subCategory->maincategories[0]->ar_title); ?>
                        <a title="Return to Home">{!!$product->subCategory->maincategories[0]->ar_title!!}</a>

                        <span class="navigation-pipe">&nbsp;</span>
                        <?php $url=str_replace(" ", "-", $product->subCategory->ar_title); ?>
                            <a title="Return to Home">{!!$product->subCategory->ar_title!!} </a>


            </div>
            <!-- Product -->
            <div id="product">
                <div class=" primary-box row">
                    <div class="pb-left-column col-xs-12 col-sm-6 pull-right">
                        <!-- product-imge-->
                        <div class="product-image">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($product->productImages as $productImage)
                                    <div class="swiper-slide" style="background-image:url({!! asset($productImage->image_path) !!})"></div>
                                    @endforeach
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <!-- product-imge-->
                    </div>
                    <div class="pb-right-column col-xs-12 col-sm-6 pull-right">
                        <h1 class="product-name">{!!$product->ar_title!!}</h1>

                        <div class="product-comments">
                            <div class="product-star">
                                <div id="rateYo" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;

                            </div>
                            <div class="comments-advices">
                                <a> التقييم : <span>{!! rating_precent($product->rating, count($product->rating)) !!} %</span></a>
                            </div>
                            <div class="comments-advices">
                                <a> عدد طلبات المنتج :<span>{!!$product->sell_count!!}</span></a>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(function () {
 
                              $("#rateYo").rateYo({
                                starWidth: "20px",
                                rating: '<?php echo rating($product->rating, count($product->rating)) ?>',
                                rtl: true,
                                readOnly: true,
                              });
                             
                            });
                        </script>

                        <div class="form-option">
                            <div class="product-price-group">
                                <p>السعر : 
                                @if($product->price_offer == 1)
                                    <span class="price old-price product-price" style="font-size: 14px; color: #000">{!!$product->price!!} <br/> </span>
                                    <span class="price"><span id="original_price" data-price="{!!$product->price!!}">{!!$product->offer_price!!}</span> {!!$product->currency->ar_name!!}</span><span class="pic"> / {!!$product->price_type!!}</span> </p>
                                @else
                                <span class="price"><span id="original_price" data-price="{!!$product->price!!}">{!!$product->price!!}</span> {!!$product->currency->ar_name!!}</span><span class="pic"> / {!!$product->price_type!!}</span> </p>
                                @endif
                                
                                @if($qty_offers != false) @foreach($qty_offers as $qty_offer)
                                <b style="color: #8b8b8b;font-size: 13px;">عند شرائك <span>" {{$qty_offer->qty}} "</span>حبات فأكثر يكون السعر للوحدة <span>"{{$qty_offer->new_price}} {{$product->currency->ar_name}}"</span></b>
                                <br> @endforeach @endif
                            </div>
                            @if($product->colors_type == 'colors')
                            <div class="color-selector detail-info-entry">
                                <div class="detail-info-entry-title pull-right">اللون :</div>
                                @foreach($product->colors as $color)
                                <div class="prod-color entry" data-color="{{$color->color}};" style="background-color: {{$color->color}};">&nbsp;</div>
                                @endforeach
                                <div class="spacer"></div>
                            </div>
                            @elseif($product->colors_type == 'images')
                            <div class="color-selector detail-info-entry">
                                <div class="detail-info-entry-title pull-right">اللون :</div>
                                @foreach($product->colorimages as $color)
                                <div class="prod-color entry2" data-color="{!! asset($color->image_path) !!}" style="background-image: url('{!! asset($color->image_path) !!}');">&nbsp;</div>
                                @endforeach
                                <div class="spacer"></div>
                            </div>
                            @endif

                            <div class="pureCSS ">
                                <div class="detail-info-entry-title pull-right">الحجم :</div>
                                <?php $no= 1?>
                                    @foreach($product->sizes as $size)
                                    <div class="pull-right">
                                        <input id="radioPureCSS{{$no}}" type="radio" name="size-radio" value="{{$size->ar_size}}">
                                        <label for="radioPureCSS{{$no}}"><span><span></span></span>
                                            <p>{{$size->ar_size}} </p>
                                        </label>
                                    </div>
                                    <?php $no++; ?>
                                        @endforeach
                            </div>


                            <div class="quantity-selector detail-info-entry">
                                <div class="detail-info-entry-title pull-right">الكمية :</div>
                                <div class="entry number-minus">&nbsp;</div>
                                <div class="entry number" id="qty-number" data-qtytotal="">0</div>
                                <div class="entry number-plus">&nbsp;</div>
                                <span>متوفر {{$product->stock}} قطعة</span>
                                <input type="text" id="max-allow" value="{{$product->stock}}" style="display: none" />
                            </div>

                            <div class="quantity-selector detail-info-entry">
                                <div class="detail-info-entry-title pull-right">الشحن :</div>
                                <div class="attribute-list">
                                    <a id="modal" data-toggle="modal" data-target="#myModal" class="fancybox button style-4" href="#">إختر شركة الشحن</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">الشحن
                <select name="countries" id="countries">
                    <option selected disabled>إختر البلد</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->ar_name}}</option>
                    @endforeach
                </select>
                <select name="cities" id="cities">
                    <option selected disabled>إختر المدينة</option>
                </select>
            </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="ui-window-shipping">

                                                        <div class="ui-window-bd">
                                                            <div class="ui-window-content" data-role="content">
                                                                <div id="j-shipping-company-list" class="shipping-layer-main">
                                                                    <div class="s-company-title">إختر طريقة الشحن</div>
                                                                    <div class="s-company-table-wrap">
                                                                        <table class="s-company-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="col-ope"></td>
                                                                                    <td class="col-cam">شركة الشحن</td>
                                                                                    <td>وقت الوصول</td>
                                                                                    <td>تكلفة الشحن</td>
                                                                                    <td>تتبع الشحن</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="shp-tbody">




                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="ui-window-btn" data-role="buttons">
                            <input type="button" class="ui-button ui-button-normal ui-button-medium" value="OK" data-role="yes" style="display: inline-block;">
                    </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلق</button>
                                                    <button type="button" id="sh-update" class="btn btn-primary" data-dismiss="modal">تحديث</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class=" detail-info-entry">
                                <div class="detail-info-entry-title pull-right">السعر الإجمالي :</div>
                                <div id="total_price"> يتحدد السعر بناء على الكمية والشحن </div>
                            </div>


                            <div class="detail-info-entry">
                                <a id="add-to-cart" class="button style-7">أضف لسلة التسوق</a>
                                <a id="add-to-favo" class="button style-4">أضف للمفضلة</a>
                                <a id="buy-now" class="button style-20">اشترى الأن</a>
                                <div class="clear"></div>
                                {!!Form::open(['url'=>'checkout-details', 'id'=>'checkout'])!!}
                                {!!Form::close()!!}
                            </div>
                        </div>
                        <div class="product-desc">
                            @if($product->store->return_policy == 1)
                            <a href='{!! URL::to("return-policy/$product->store_id") !!}'><img src='{!! asset("ar-assets/front-end/images/back.png") !!}' title="سياسة الإسترجاع" alt="" /></a>
                            @endif @if($product->store->seller_guaranty == 1)
                            <a href='{!! URL::to("seller-guaranty/$product->store_id") !!}' style="margin-right:30px;"><img src='{!! asset("ar-assets/front-end/images/gurantee.png") !!}' title="ضمانات البائع" alt="" /></a>
                            @endif
                        </div>


                    </div>


                </div>
                <!-- tab product -->
            </div>
            <!-- Product -->
        </div>
        <!-- ./ Center colunm -->
        <!-- Left colunm -->
        <div class="column col-xs-12 col-sm-12">
            <div class="row">

                <div class="center_column col-xs-12 col-sm-9">
                    <div class="product-tab">
                        <ul class="nav-tab">
                            <li class="active">
                                <a aria-expanded="false" data-toggle="tab" href="#product-detail">مواصفات المنتج</a>
                            </li>
                            <li>
                                <a aria-expanded="true" data-toggle="tab" href="#reviews">التقييمات <span>( {{ $product->rating->count() }} ) </span></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#extra-tabs">سياسة عمل المتجر</a>
                            </li>

                        </ul>
                        <div class="tab-container">
                            <div id="product-detail" class="tab-panel active">

                                <div class="row">
                                    <h3>مواصفات المنتج</h3>
                                    <div class="col-sm-12 col-xs-12 pull-right">
                                        <p> <span>{!!$product->ar_long_descrip!!} </span> </p>
                                    </div>
                                </div>

                                <div class="row top">
                                    <h3>تفاصيل المنتج</h3> @foreach($product->specs as $spec)
                                    <div class="col-sm-6 col-xs-12 pull-right">
                                        <p> {!!$spec->ar_title!!}:
                                            <span>{!!$spec->ar_detail!!}</span>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="row top">
                                    <h3>الصور الدعائية للمنتج</h3>
                                    <div class="col-sm-12 col-xs-12 top">
                                        {!!$product->video!!}
                                    </div>

                                    @foreach($product->commercialImages as $comm_image)
                                    <div class="col-sm-12 col-xs-12 pull-right top">
                                        <img src='{!! asset("$comm_image->image_path") !!}' class="img-responsive" />
                                    </div>
                                    @endforeach
                                </div>

                                <div class="row top">
                                    <h3>تفاصيل الحمولة</h3>
                                    <div class="col-sm-6 col-xs-12 pull-right">
                                        <p> نوع الوحدة:
                                            <span>{!!$product->ar_unit_type!!}</span>
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 pull-right">
                                        <p> وزن الحمولة :
                                            <span>{!!$product->ar_package_weight!!}</span>
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 pull-right">
                                        <p> مقاسات الحمولة:
                                            <span>{!!$product->ar_package_size!!}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div id="reviews" class="tab-panel">
                                <div class="product-comments-block-tab">
                                <?php $no= 1; ?>
                                @foreach($product->rating as $rating)
                                    <div class="comment row">
                                        <div class="col-sm-3 author">
                                            <div class="grade">
                                                <!-- <span>Grade</span>-->
                                                <span class="reviewRating">
                                                    
                                                    <div id="rateYo{{$no}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                                </span>
                                            </div>

                                            <script type="text/javascript">
                                                $(function () {
                     
                                                  $("#rateYo"+'<?php echo $no ?>').rateYo({
                                                    starWidth: "15px",
                                                    rating: '<?php echo $rating->rating ?>',
                                                    rtl: true,
                                                    readOnly: true,
                                                  });
                                                 
                                                });
                                            </script>

                                            <div class="info-author">
                                                <span><strong>{{$rating->user->name}}</strong></span><br>
                                                <em>{{date_format($rating->created_at, "Y/m/d")}}</em>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 commnet-dettail">
                                            {{$rating->comment}}
                                        </div>
                                    </div>
                                    <?php $no++ ?>
                                @endforeach
                                </div>

                            </div>
                            <div id="extra-tabs" class="tab-panel">
                                <span> {!!$product->store->store_policy!!} </span>
                            </div>

                        </div>
                    </div>
                    <!-- ./tab product -->
                    <!-- box product -->
                    <div class="page-product-box">
                        <h3 class="heading">منتجات شبيهة : </h3>
                        <ul class="product-list row">
                        <?php $s= 1; ?>
                            @foreach($similar_products as $similar) 
                            @if($similar->id != $product->id)
                            <li class="col-sm-4">
                                <div class="bordered">
                                    <div class="left-block">
                                        <?php $url=str_replace(" ", "-", $similar->ar_title); ?>

                                        <a href='{{ URL::to( "product/$similar->id/$url") }}'>
                                        @if(!$similar->productImages->isEmpty())
                                            <?php $img= $similar->productImages[0]->image_path; ?>
                                            <img class="img-responsive" alt="{{$similar->ar_title}}" src='{!! asset("$img") !!}'></a>
                                        @else
                                            <img class="img-responsive" alt="default-img" src='{!! asset("ar-assets/front-end/images/logo.png") !!}'></a>
                                        @endif
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name">
                                        	<a href='{{ URL::to( "product/$similar->id/$url") }}'>{!!$similar->ar_title!!}</a>
                                        </h5>
                                        <div class="product-star">
                                            <div id="rateYoSimilar{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                        </div>

                                        <!--Star rating script-->
                                        <script type="text/javascript">
                                            $(function () {
                 
                                              $("#rateYoSimilar"+'<?php echo $s ?>').rateYo({
                                                starWidth: "15px",
                                                rating: '<?php echo rating($similar->rating, count($similar->rating)) ?>',
                                                rtl: true,
                                                readOnly: true,
                                              });
                                             
                                            });
                                        </script>
                                        <!--end of Star rating script-->

                                        <div class="content_price">
                                            @if($similar->price_offer == 1)
                                            <span class="price old-price">{{$similar->price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            <span class="price product-price">{{$similar->offer_price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            @else
                                            <span class="price product-price">{{$similar->price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif  
                            <?php $s++ ?>
                            @endforeach
                        </ul>
                    </div>
                    <!-- ./box product -->

                </div>

                <div class="column col-xs-12 col-sm-3 product-tab" id="left_column">
                    <!-- block best sellers -->
                    <div class="block left-module">
                        <p class="title_block">المتجر البائع</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-category">
                                <div class="layered-content">
                                    <ul class="tree-menu">
                                        <li><a href='{!! URL::to("store/$product->store_id") !!}'><img src="/../{!!$product->store->ar_logo!!}" title="{!!$product->store->ar_name!!}" alt="{!!$product->store->ar_name!!}"/> </a></li>
                                        <li><a href='{!! URL::to("store/$product->store_id") !!}' class="active">{!!$product->store->ar_name!!}</a></li>
                                        <li><a>{!!$product->store->city->ar_name!!}/ {!!$product->store->country->ar_name!!}</a></li>
                                        <li>
                                            <a class="pull-right">التقييم :</a>
                                            <div class="product-comments">
                                                <div class="product-star pull-right">
                                                    <div id="rateYoStore" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;

                                                </div>
                                                <div class="comments-advices pull-right">
                                                    <a> <span>{!! rating_precent($product->store->rating, count($product->store->rating)) !!} %</span></a>
                                                </div>

                                            </div>
                                        </li>

                                        <!--Star rating script-->
                                            <script type="text/javascript">
                                                $(function () {
                     
                                                  $("#rateYoStore").rateYo({
                                                    starWidth: "15px",
                                                    rating: '<?php echo rating($product->store->rating, count($product->store->rating)) ?>',
                                                    rtl: true,
                                                    readOnly: true,
                                                  });
                                                 
                                                });
                                            </script>
                                        <!--end of Star rating script-->

                                        <li><a href="#">تواصل مع المتجر</a></li>
                                        <li style="margin-top:20px;">
                                            @if($product->store->return_policy == 1)
                                            <a href="#"><img src='{!! asset("ar-assets/front-end/images/back.png") !!}' title="سياسة الإسترجاع" alt=""></a>
                                            @endif @if ($product->store->trusted == 1)
                                            <a style="margin-right:30px;" href="#"><img src='{!! asset("ar-assets/front-end/data/ma3rof.png") !!}' alt="موثوق"></a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ./layered -->
                        </div>
                    </div>

                    <div class="block left-module">
                        <p class="title_block"> المنتجات الأكثر مبيعا بواسطة هذا المتجر</p>
                        <div class="block_content">
                            <ul class="products-block best-sell">
                            <?php $s= 1 ?>
                                @foreach($most_sale as $most_product)
                                @if($most_product->id != $product->id)
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
                                        <br>
                                            <h5 class="product-name">
                                                <a href='{{ URL::to( "product/$most_product->id/$url") }}'>{!!$most_product->ar_title!!}</a>
                                            </h5>
                                           <br>
                                            <div class="product-star" style=" float: none;">
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
                                @endif
                                <?php $s++ ?>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ./block best sellers  -->
                    <!-- block category -->

                    <!-- ./block category  -->
                </div>

            </div>

        </div>
        <!-- ./left colunm -->


    </div>
    <!-- ./row-->
</div>
<!--Counter MAX script-->
<!--Product ID for the Ajax shipping methods-->
<input type="hidden" id="product_id" value="{{$product->id}}">

<!-- Swiper JS -->
<script src='{!! asset("ar-assets/front-end/js/swiper.min.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/jquery.elevatezoom.js") !!}'></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchEventsTarget: 'container',
        coverflow: {
            rotate: 50,
            stretch: 10,
            depth: 500,
            modifier: 1,
            slideShadows: true
        }
    });
</script>

<script type="text/javascript">
    var qty_counter = 0;
    var ship_cos_qty;
    var total_price = 0;
    if('<?php echo $product->price_offer?>' == 1){
        var price = '<?php echo $product->offer_price ?>';
    }else{
        var price = '<?php echo $product->price ?>';  
    }
    
    var selected_color= null;
    var selected_size= null;

    $(document).ready(function () {

        

        //--------------------------------------------    
        //Quantity counter (plus action)    
        $('.number-plus').on('click', function () {
            var divUpd = $(this).parent().find('.number'),
                newVal = parseInt(divUpd.text(), 10) + 1;
            var max = $('#max-allow').val();
            if (newVal <= max) divUpd.text(newVal);

            //customized code part, not related to the original counter code  
            //$('#qty-number').attr('data-qtytotal', newVal);
            //Offers price calcualtion code
            <?php if ($product->qty_offer == 1): ?>
            <?php foreach ($qty_offers as $offer): ?>
            if (newVal >= '<?php echo $offer->qty ?>') {
                price = '<?php echo $offer->new_price ?>';
                $('#original_price').data('price');
                $('#original_price').html(price);
            }
            <?php endforeach ?>
            <?php endif ?>


             //change shipping prices values:
            for (var i = 0; i < ship_cos_qty; i++) {
                $('#sh-price' + i).html($('#sh-price' + i).data('shprice') * newVal + ' ' + $('#sh-price' + i).data('currncy'));
                $('#sh-price' + i).attr('data-finalprice', $('#sh-price' + i).data('shprice') * newVal);
                $('#sh-radio' + i).attr('data-finalprice', $('#sh-price' + i).data('shprice') * newVal);
                $('#sh-radio' + i).attr('value', $('#sh-price' + i).data('shprice') * newVal);
            }


            $('#total_price').empty();


            if ($('.ship-radio').is(':checked')) {
                ttt = price * newVal;
                total_price = parseInt($('input[name=shipping-company]:checked').val()) + ttt;
                $('#total_price').append('<p >' + total_price.toFixed(2) + ' <?php echo $product->currency->ar_name ?> </p>');
            } else {
                total_price = price * newVal;
                $('#total_price').append('<p >' + total_price.toFixed(2) + ' <?php echo $product->currency->ar_name ?> </p>');
            }


            qty_counter = newVal;

           

        });
        //--------------------------------------------
        //Quantity counter (minus action)  
        $('.number-minus').on('click', function () {
            var divUpd = $(this).parent().find('.number'),
                newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 0) divUpd.text(newVal);

            //customized code part, not related to the counter  
            //Offers price calcualtion code
            <?php if ($product->qty_offer == 1): ?>

            <?php foreach ($qty_offers as $offer): ?>

            if (newVal >= '<?php echo $min_offer ?>') {
                if (newVal >= '<?php echo $offer->qty ?>') {
                    price = '<?php echo $offer->new_price ?>';
                    $('#original_price').data('price');
                    $('#original_price').html(price);
                }
            } else {
                price = '<?php echo $product->price; ?>';
                $('#original_price').data('price');
                $('#original_price').html(price);
            }

            <?php endforeach ?>

            <?php endif ?>

            //change shipping prices values:
            for (var i = 0; i < ship_cos_qty; i++) {
                $('#sh-price' + i).html($('#sh-price' + i).data('shprice') * newVal + ' ' + $('#sh-price' + i).data('currncy'));
                $('#sh-price' + i).attr('data-finalprice', $('#sh-price' + i).data('shprice') * newVal);
                $('#sh-radio' + i).attr('data-finalprice', $('#sh-price' + i).data('shprice') * newVal);
                $('#sh-radio' + i).attr('value', $('#sh-price' + i).data('shprice') * newVal);
            }

            if (newVal != 0) {
                $('#total_price').empty();

                if ($('.ship-radio').is(':checked')) {
                ttt = price * newVal;
                total_price = parseInt($('input[name=shipping-company]:checked').val()) + ttt;
                $('#total_price').append('<p >' + total_price.toFixed(2) + ' <?php echo $product->currency->ar_name ?> </p>');
            } else {
                total_price = price * newVal;
                $('#total_price').append('<p >' + total_price.toFixed(2) + ' <?php echo $product->currency->ar_name ?> </p>');
            }

                qty_counter = newVal;
            }

            

        });
        //--------------------------------------------

    });


    //script for the ajax cities menu:
    $('#countries').on('change', function (e) {
        //console.log(e);
        var country_id = e.target.value;

        //ajax
        $.get('/ajax-storecity?country_id=' + country_id, function (data) {
            //success data
            $('#cities').empty();
            $('#cities').append('<option selected disabled>إختر المدينة</option>');
            $.each(data, function (index, subcatObj) {

                $('#cities').append('<option value="' + subcatObj.id + '">' + subcatObj.ar_name + '</option>');
            });
        });
    });


    //AJAX script to get shipping compaies list:
    $('#cities').on('change', function (e) {
        //console.log(e);
        var city_id = e.target.value;
        var product_id = '<?php echo $product->id; ?>'
            //var product_id= $('#product_id').attr('value');

        //ajax
        $.get('/ajax-shipping-methods?city_id=' + city_id + '&product_id=' + product_id, function (data) {
            //success data
            $('#shp-tbody').empty();

            $.each(data[0], function (index, shipObj) {

                <?php foreach ($currencies as $currency): ?>
                if (shipObj.pivot.currency_id == '<?php echo $currency->id; ?>') {
                    var curr_syb = '<?php echo $currency->symbol ?>';
                }

                if (shipObj.pivot.tracking == 1) {
                    var tracking = "متاحة";
                } else {
                    var tracking = "غير متاحة";
                }
                <?php endforeach ?>


                $('#shp-tbody').append('<tr> <td class="col-ope"><input type="radio" name="shipping-company" class="ship-radio" id="sh-radio' + index + '" value="' + shipObj.pivot.price * qty_counter + '" data-name="' + shipObj.ar_name + '" data-time="' + shipObj.pivot.duration + '" data-shprice="' + shipObj.pivot.price + '" data-currncy="' + curr_syb + '" data-finalprice="' + shipObj.pivot.price * qty_counter + '"></td> <td class="col-cam"><img src="/../' + shipObj.image + '" alt="' + shipObj.ar_name + '"></td> <td>' + shipObj.pivot.duration + '</td> <td><span id="sh-price' + index + '" class="s-price" data-shprice="' + shipObj.pivot.price + '" data-currncy="' + curr_syb + '" data-finalprice="' + shipObj.pivot.price * qty_counter + '">' + shipObj.pivot.price * qty_counter + ' ' + curr_syb + '</span></td> <td>' + tracking + '</td> </tr>');

            });
            ship_cos_qty = data[0].length;
        });
    });

    //-----------------------------------------
    //Get selected (checked) shipping company:
    $('#sh-update').click(function () {
        
            $('#total_price').empty();
            total_price = parseInt($('input[name=shipping-company]:checked').val()) + price*qty_counter;

            $('#total_price').append('<p >' + total_price.toFixed(2) + ' <?php echo $product->currency->ar_name ?> </p>');    
    });

    //-----------------------------------------
    //Get Selecetd Color:
    $('.prod-color').click(function(){
        selected_color= $(this).attr('data-color');     
    });

    //-----------------------------------------
    //Get Selecetd size:
    $('input[name=size-radio]').click(function(){
        selected_size= $('input[name=size-radio]:checked').val();  
    });

    //-----------------------------------------
    //Add to Cart Script:
    $('#add-to-cart').click(function(){
        $.ajax({
                    type: 'post',
                    url: '/addToCart',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': '<?php echo $product->id ?>',
                        'name': '<?php echo $product->ar_title ?>',
                        'qty': qty_counter,
                        'price': price,
                        'color': selected_color,
                        'size': selected_size,
                        'shipping_single_price': $('input[name=shipping-company]:checked').data('shprice'),
                        'shipping': $('input[name=shipping-company]:checked').val(),
                        'store_id': '<?php echo $product->store_id ?>',
                        'store_name': '<?php echo $product->store->ar_name ?>',
                        'total_price': total_price.toFixed(2),
                    },
                    success: function(data) {
                        alert('تم إضافة المنتج في سلة الشراء بنجاح!');
                        location.reload(); //page reload
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                           console.log(xhr.status);
                           console.log(xhr.responseText);
                           console.log(thrownError);
                       }
                });
    });

    //Add to Favorite Script:
    $('#add-to-favo').click(function(){
        $.ajax({
                    type: 'post',
                    url: '/addToFavorite',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'user_id': '<?php echo Session::get('user_id'); ?>',
                        'product_id': '<?php echo $product->id; ?>',
                    },
                    success: function(data) {
                        alert('تم إضافة المنتج في المفضلة بنجاح!');
                        location.reload();
                    },
                    error: function () {
                           alert('يجب عليك أولاً تسجيل الدخول للإضافة إلى المفضلة!')
                       }
                });
    });

    //"Buy Now" button script:
    $('#buy-now').click(function(){
        $.ajax({
                    type: 'post',
                    url: '/addToCart',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': '<?php echo $product->id ?>',
                        'name': '<?php echo $product->ar_title ?>',
                        'qty': qty_counter,
                        'price': price,
                        'color': selected_color,
                        'size': selected_size,
                        'shipping_single_price': $('input[name=shipping-company]:checked').data('shprice'),
                        'shipping': $('input[name=shipping-company]:checked').val(),
                        'store_id': '<?php echo $product->store_id ?>',
                        'store_name': '<?php echo $product->store->ar_name ?>',
                        'total_price': total_price.toFixed(2),
                    },
                    success: function(data) {
                        var value= total_price.toFixed(2);
                        var input = $("<input>")
                               .attr("type", "hidden")
                               .attr("name", "checkout-total")
                               .attr("value", value);

                        var store_id= '<?php echo $product->store_id ?>';
                        var input2 = $("<input>")
                               .attr("type", "hidden")
                               .attr("name", "store-id")
                               .attr("value", store_id);

                        $('#checkout').append([$(input), $(input2)]);
                        
                        $('#checkout').submit();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                           console.log(xhr.status);
                           console.log(xhr.responseText);
                           console.log(thrownError);
                       }
                });  
    });

</script>


@stop