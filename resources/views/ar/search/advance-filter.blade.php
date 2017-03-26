@extends('ar.layouts.ar-main-layout') 

<title>{{$sub_category->ar_title}}</title> 

@section('content')

<div class="page-top">
    <div class="container" id="columns">

        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-12">
                <!-- category-slider -->
                <div class="category-slider">
                	<img src='{!! asset("$sub_category->ar_banner") !!}' alt="{!! $sub_category->ar_title !!}" class="img-responsive">
                </div>
                <!-- ./category-slider -->
            </div>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                
                	<div class="sortPagiBar hidden-lg hidden-md">
                        <div class="button style-10" style="width: 100%;">الفلتر<input data-toggle="modal" data-target="#myModal" type="submit" value=""></div>
                    </div>
                    
                    <!-- Filter Mobile Modal -->
                    
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">الفلتر</h4>
                          </div>
                          <div class="modal-body">
                            <div class="column col-md-12" id="left_column">
                    
                                    <!-- block filter -->
                                    <div class="block left-module top30">
                                        <p class="title_block">المقاسات المتاحة</p>
                                        <div class="block_content">
                                            <!-- layered -->
                                            <div class="layered layered-filter-price">
                                                <!-- filter categgory -->
                                                <div class="layered-content">
                                                    <ul class="check-box-list">
                                                        <?php $sz= 1; ?>
                                                        @foreach($sub_category->sizes as $size)
                                                        <li>
                                                            @if(in_array($size->id, $selected_sizes))
                                                            <input type="checkbox" id="size{{$sz}}" name="size{{$sz}}" class="size-script" value="{{$size->id}}" checked />
                                                            <label for="c1">
                                                            @else
                                                            <input type="checkbox" id="size{{$sz}}" name="size{{$sz}}" class="size-script" value="{{$size->id}}" />
                                                            <label for="c1">
                                                            @endif
                                                              
                                                             {{$size->ar_size}} <span class="count">({{count($size->products)}})</span>
                                                            </label>
                                                        </li>
                                                        <?php $sz++; ?>
                                                        @endforeach
                                                        <input type="hidden" name="sizes_count" value="{{$sz}}">
                                                    </ul>
                                                </div> 
                                                <!-- ./filter categgory -->
                                            </div>
                                            <!-- ./layered -->
                    
                                        </div>
                                    </div>
                                    
                                    <div class="block left-module">
                                        <p class="title_block">نطاق السعر</p>
                                        <div class="block_content">
                                            <!-- layered -->
                                            <div class="layered layered-filter-price">
                                                <!-- filter categgory -->
                                                <div class="layered-content">
                                                    <input type="number" name="min-price" placeholder="أدنى سعر" value="{{$min_price}}" form="filter2"> <input type="number" name="max-price" placeholder="أقصى سعر" value="{{$max_price}}" form="filter2">
                                                </div> 
                                                <!-- ./filter categgory -->
                                            </div>
                                            <!-- ./layered -->

                                        </div>
                                    </div>
                                    
                                    <div class="block left-module">
                                        <p class="title_block">عرض بالأكثر مبيعاً</p>
                                        <div class="block_content">
                                            <!-- layered -->
                                            <div class="layered layered-filter-price">
                                                <!-- filter categgory -->
                                                <div class="layered-content">
                                                  <ul class="check-box-list">
                                                    <li>
                                                        @if($sort == 'most-sale')
                                                        <input type="radio" name="order" value="most-sale" form="filter2" checked />
                                                        @else
                                                        <input type="radio" name="order" value="most-sale" form="filter2" />
                                                        @endif
                                                        <label for="order">

                                                         الأكثر مبيعاً 
                                                        </label><br>

                                                        @if($sort == 'recent-add')
                                                        <input type="radio" name="order" value="recent-add" form="filter2" checked />
                                                        @else
                                                        <input type="radio" name="order" value="recent-add" form="filter2" />
                                                        @endif
                                                        <label for="order"> 

                                                         أدرج مؤخراً 
                                                        </label>
                                                    </li>
                                                  </ul>
                                                </div> 
                                                <!-- ./filter categgory -->
                                            </div>
                                            <!-- ./layered -->

                                        </div>
                                    </div>

                                    <div class="block left-module">
                                        <p class="title_block">معدل التقييم</p>
                                        <div class="block_content">
                                            <!-- layered -->
                                            <div class="layered layered-filter-price">
                                                <!-- filter categgory -->
                                                <div class="layered-content">
                                                    <ul class="check-box-list">
                                                        <li>
                                                            @if(in_array(5, $selected_rating))
                                                            <input type="checkbox" id="stars5" name="stars5" class="rating-script" value="5" checked />
                                                            @else
                                                            <input type="checkbox" id="stars5" name="stars5" class="rating-script" value="5" />
                                                            @endif
                                                            <label for="c5">
                                                              
                                                             خمس نجوم <span class="count">({{starProducts(5)}})</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            @if(in_array(4, $selected_rating))
                                                            <input type="checkbox" id="stars4" name="stars4" class="rating-script" value="4" checked />
                                                            @else
                                                            <input type="checkbox" id="stars4" name="stars4" class="rating-script" value="4" />
                                                            @endif
                                                            <label for="c4">
                                                            أربعة نجوم <span class="count">({{starProducts(4)}})</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            @if(in_array(3, $selected_rating))
                                                            <input type="checkbox" id="stars3" name="stars3" class="rating-script" value="3" checked />
                                                            @else
                                                            <input type="checkbox" id="stars3" name="stars3" class="rating-script" value="3" />
                                                            @endif
                                                            <label for="c3">
                                                            ثلاثة نجوم <span class="count">({{starProducts(3)}})</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            @if(in_array(2, $selected_rating))
                                                            <input type="checkbox" id="stars2" name="stars2" class="rating-script" value="2" checked />
                                                            @else
                                                            <input type="checkbox" id="stars2" name="stars2" class="rating-script" value="2" />
                                                            @endif
                                                            <label for="c2">
                                                            نجمتان <span class="count">({{starProducts(2)}})</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            @if(in_array(1, $selected_rating))
                                                            <input type="checkbox" id="stars1" name="stars1" class="rating-script" value="1" checked />
                                                            @else
                                                            <input type="checkbox" id="stars1" name="stars1" class="rating-script" value="1" />
                                                            @endif
                                                            <label for="c1">
                                                            نجمة واحدة <span class="count">({{starProducts(1)}})</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div> 
                                                <!-- ./filter categgory -->
                                            </div>
                                            <!-- ./layered -->

                                        </div>
                                    </div>
                                    <!-- ./block filter  -->
                                    
                                    <!-- left silide -->
                                    <div class="col-left-slide left-module">
                                            <a href='{!! URL::to("$banner->url") !!}'><img src='{!! asset("$banner->ar_image_path") !!}' ></a>
                                    </div>
                                    <!--./left silde-->
                                </div>
                          </div>
                          {!! Form::open(['url'=>'filter-search', 'method'=>'get', 'id'=>'filter2']) !!}
                          {!! Form::hidden('sub_cat', $sub_category->id) !!}
                           <input type="hidden" id="selected-sizes" name="selected-sizes" value="{{$sizes_input}}">
                            <input type="hidden" id="selected-rating" name="selected-rating" value="{{$rating_input}}">

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-primary">تطبيق الفلتر</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    {!! Form::close() !!}
                    <!--End of filter modal-->

                        <h2 class="page-heading bg-white">
                            نتائج البحث: ( <span class="page-heading-title">{{$products->total()}}</span> ) منتج
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
                	{{$products->appends(Request::only(['sub_cat', 'selected-sizes', 'selected-rating', 'order', 'min-price', 'max-price']))->links()}}
                </div>
            </div>
            <!-- ./ Center colunm -->
        
            <!-- Left colunm -->
            <div class="column col-md-3 hidden-sm hidden-xs" id="left_column">
                
                <!-- block filter -->
                <div class="block left-module top30">
                    <p class="title_block">المقاسات المتاحة</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter categgory -->
                            <div class="layered-content">
                                <ul class="check-box-list">
                                    <?php $sz= 1; ?>
                                    @foreach($sub_category->sizes as $size)
                                    <li>
                                        @if(in_array($size->id, $selected_sizes))
                                        <input type="checkbox" id="size{{$sz}}" name="size{{$sz}}" class="size-script" value="{{$size->id}}" checked />
                                        <label for="c1">
                                        @else
                                        <input type="checkbox" id="size{{$sz}}" class="size-script" name="size{{$sz}}" value="{{$size->id}}" />
                                        <label for="c1">
                                        @endif
                                          
                                         {{$size->ar_size}} <span class="count">({{count($size->products)}})</span>
                                        </label>
                                    </li>
                                    <?php $sz++; ?>
                                    @endforeach
                                    <input type="hidden" name="sizes_count" value="{{$sz}}">
                                </ul>
                            </div> 
                            <!-- ./filter categgory -->
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>
                
                <div class="block left-module">
                    <p class="title_block">نطاق السعر</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter categgory -->
                            <div class="layered-content">
                                <input type="number" name="min-price" placeholder="أدنى سعر" value="{{$min_price}}" form="filter1"> <input type="number" name="max-price" placeholder="أقصى سعر" value="{{$max_price}}" form="filter1">
                            </div> 
                            <!-- ./filter categgory -->
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>

                <div class="block left-module">
                    <p class="title_block">عرض بالأكثر مبيعاً</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter categgory -->
                            <div class="layered-content">
                              <ul class="check-box-list">
                                <li>
                                    @if($sort == 'most-sale')
                                    <input type="radio" name="order" value="most-sale" form="filter1" checked />
                                    @else
                                    <input type="radio" name="order" value="most-sale" form="filter1" />
                                    @endif
                                    <label for="order">

                                     الأكثر مبيعاً 
                                    </label><br>

                                    @if($sort == 'recent-add')
                                    <input type="radio" name="order" value="recent-add" form="filter1" checked />
                                    @else
                                    <input type="radio" name="order" value="recent-add" form="filter1" />
                                    @endif
                                    <label for="order"> 

                                     أدرج مؤخراً 
                                    </label>
                                </li>
                              </ul>
                            </div> 
                            <!-- ./filter categgory -->
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>

                <div class="block left-module">
                    <p class="title_block">معدل التقييم</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter categgory -->
                            <div class="layered-content">
                                <ul class="check-box-list">
                                    <li>
                                        @if(in_array(5, $selected_rating))
                                        <input type="checkbox" id="stars5" name="stars5" value="5" class="rating-script" checked />
                                        @else
                                        <input type="checkbox" id="stars5" name="stars5" class="rating-script" value="5" />
                                        @endif
                                        <label for="c5">
                                          
                                         خمس نجوم <span class="count">({{starProducts(5)}})</span>
                                        </label>
                                    </li>
                                    <li>
                                        @if(in_array(4, $selected_rating))
                                        <input type="checkbox" id="stars4" name="stars4" class="rating-script" value="4" checked />
                                        @else
                                        <input type="checkbox" id="stars4" name="stars4" class="rating-script" value="4" />
                                        @endif
                                        <label for="c4">
                                        أربعة نجوم <span class="count">({{starProducts(4)}})</span>
                                        </label>
                                    </li>
                                    <li>
                                        @if(in_array(3, $selected_rating))
                                        <input type="checkbox" id="stars3" name="stars3" class="rating-script" value="3" checked />
                                        @else
                                        <input type="checkbox" id="stars3" name="stars3" class="rating-script" value="3" />
                                        @endif
                                        <label for="c3">
                                        ثلاثة نجوم <span class="count">({{starProducts(3)}})</span>
                                        </label>
                                    </li>
                                    <li>
                                        @if(in_array(2, $selected_rating))
                                        <input type="checkbox" id="stars2" name="stars2" class="rating-script" value="2" checked />
                                        @else
                                        <input type="checkbox" id="stars2" name="stars2" class="rating-script" value="2" />
                                        @endif
                                        <label for="c2">
                                        نجمتان <span class="count">({{starProducts(2)}})</span>
                                        </label>
                                    </li>
                                    <li>
                                        @if(in_array(1, $selected_rating))
                                        <input type="checkbox" id="stars1" name="stars1" class="rating-script" value="1" checked />
                                        @else
                                        <input type="checkbox" id="stars1" name="stars1" class="rating-script" value="1" />
                                        @endif
                                        <label for="c1">
                                        نجمة واحدة <span class="count">({{starProducts(1)}})</span>
                                        </label>
                                    </li>
                                </ul>
                            </div> 
                            <!-- ./filter categgory -->
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>
                {!! Form::open(['url'=>'filter-search', 'method'=>'get', 'id'=>'filter1']) !!}
                {!! Form::hidden('sub_cat', $sub_category->id) !!}

                <input type="hidden" id="selected-sizes" name="selected-sizes" value="{{$sizes_input}}">
                <input type="hidden" id="selected-rating" name="selected-rating" value="{{$rating_input}}">
                
                <button class="button apply" type="submit">تطبيق الفلتر</button>
                
                <!-- ./block filter  -->
                {!! Form::close() !!}
                <!-- left silide --><br>
                <div class="col-left-slide left-module">
                        <a href='{!! URL::to("$banner->url") !!}'><img src='{!! asset("$banner->ar_image_path") !!}' ></a>
                </div>
                <!--./left silde-->
            </div>
            <!-- ./left colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>

<script type="text/javascript">
//Grab Filter Selected Sizes:
var selected_sizes = ($('input[id=selected-sizes]').val()).split(','); //convert string to array
    $('.size-script').change(function(){
        if(this.checked){
           //Push the selection to the array
           selected_sizes.push($(this).val());
           $('input[id=selected-sizes]').val(selected_sizes);
        }
        else{console.log(selected_sizes);
            //Remove Unchecked value from the array
            removeItem= $(this).val();
            selected_sizes= jQuery.grep(selected_sizes, function(value){
                return value != removeItem;
            });
            $('input[id=selected-sizes]').val(selected_sizes);
        }
    });

//Grab Filter Selected Stars:
var selected_rating = ($('input[id=selected-rating]').val()).split(','); //convert string to array
    $('.rating-script').change(function(){
        if(this.checked){
           //Push the selection to the array
           selected_rating.push($(this).val());
           $('input[id=selected-rating]').val(selected_rating);
        }
        else{
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