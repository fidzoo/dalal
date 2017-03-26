@extends('ar.layouts.ar-main-layout') 

<title>دلال مول | المنتجات المضافة مؤخرا</title> 

@section('content')

<div class="page-top">
    <div class="container" id="columns">

        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-12">
                <!-- category-slider -->
                <div class="category-slider">
                	<img src='' alt="" class="img-responsive">
                </div>
                <!-- ./category-slider -->
            </div>
            <!-- Center colunm-->
            <div class="center_column col-xs-12" id="center_column">
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">

                    <!-- Filter Mobile Modal -->
                    
                    

                    <!--End of filter modal-->

                        <h2 class="page-heading bg-white">
                            المنتجات الأكثر مبيعاً ( <span class="page-heading-title">{{count($products)}}</span> ) منتج
                            <ul class="display-product-option hidden-sm hidden-xs">
                        
                            <li class="pro">
                                <span>إعرض المنتجات على هيئة</span>
                            </li>
                        
                            <li class="view-as-grid selected">
                                <p>شبكة  </p>
                                <span>grid</span>
                            </li>
                            <li class="view-as-list">
                                <p>قائمة</p>
                                <span>list</span>
                            </li>
                        </ul>
                        </h2>
                        
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @if(count($products) < 1)
                        <br><br>
                        <h3 class="text-center" style="direction: rtl;">
                        عذراً، لا توجد منتجات متاحة بهذه المواصفات..
                        </h3>
                        @endif

                    
                        <?php $s=1; ?>
                        @foreach($products as $product)
                        <li class="col-sm-3">
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
                                        <div id="rateYo{{$s}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                    </div>

                                    <!--Star rating script-->
                                    <script type="text/javascript">
                                        $(function () {
             
                                          $("#rateYo"+'<?php echo $s ?>').rateYo({
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
                	{{$products->links()}}
                </div>
            </div>
            <!-- ./ Center colunm -->
        
            <!-- Left colunm -->
            
            <!-- ./left colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>

<script type="text/javascript">
//Grab Filter Selected Sizes:
var selected_sizes = [];
    $('.size-script').change(function(){
        if(this.checked){
           //Push the selection to the array
           selected_sizes.push($(this).val());
           $('input[id=selected-sizes]').val(selected_sizes);
           
        }
        else{$(this).val()
            //Remove Unchecked value from the array
            removeItem= $(this).val();
            selected_sizes= jQuery.grep(selected_sizes, function(value){
                return value != removeItem;
            });
            $('input[id=selected-sizes]').val(selected_sizes);
        }
    });

//Grab Filter Selected Stars:
var selected_rating = [];
    $('.rating-script').change(function(){
        if(this.checked){
           //Push the selection to the array
           selected_rating.push($(this).val());
           $('input[id=selected-rating]').val(selected_rating);
        }
        else{$(this).val()
            //Remove Unchecked value from the array
            removeItem= $(this).val();
            selected_rating= jQuery.grep(selected_rating, function(value){
                return value != removeItem;
            });
            $('input[id=selected-rating]').val(selected_rating);
        }
    });

</script>


@stop