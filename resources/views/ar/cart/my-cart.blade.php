@extends('ar.layouts.ar-main-layout') @section('content')

<div class="page-top">
    <div class="container" id="columns">

        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-12">
            
            	<div class="breadcrumb clearfix">
                        <a>أنت تتصفح : </a>
                        <span class="navigation-pipe">&nbsp;</span>
                         <a class="home" href='{!! URL::to("/") !!}' title="الرئيسية">دلال مول</a>
                        <span class="navigation-pipe">&nbsp;</span>
                        <a href='{!! URL::to("my-cart") !!}' title="عربة التسوق">عربة التسوق</a>
            
                    </div>
                    
                <div class="page-content page-order ">
                    <h2 class="page-heading no-line new">
                        عربة التسوق
                        
                    </h2>
                    
                    @if(Cart::count() < 1 )
                    <h3 class="text-center" style="direction: rtl;">
                        لا توجد منتجات بداخل عربة التسوق.. هيا، ابدأ التسوق الآن!
                    </h3>                        
                    @endif

                    <?php $s_no= 1; ?>
                    @foreach($cart as $key=>$content)
                    
                    <?php $store_total=[]; $ship_values=[]; ?>
                    <div class="top">
                        <div class="heading-counter warning">المتجر البائع :
                            <span>{{$key}}</span>
                        </div>
                        
                        <div class="order-detail-content">
                        
                        	<!-- Table On Desktop -->
                            <table class="table table-bordered table-responsive cart_summary">
                                <thead>
                                    <tr>
                                        <th>إسم المنتج</th>
                                        <th>سعر الوحدة</th>
                                        <th>الكمية</th>
                                        <th>المبلغ</th>
                                    </tr>
                                </thead>
                                <?php $p_no= 1; ?>
                                @foreach($content as $product)

                                <tbody>
                                    <tr>
                                        
                                        <td class="cart_description">
                                            <div class="left-block pull-right">
                                            
                                            <?php $url=str_replace(" ", "-", $product->model->ar_title); ?>
                                                <a href='{!! URL::to("product/$product->id/$url") !!}'>
                                                
                                                @if(!$product->model->productImages->isEmpty())
                                                <?php $img= $product->model->productImages[0]->image_path ?>
                                                <img class="img-responsive" alt="product_image" src='{!! asset("$img") !!}'></a>
                                                @else
                                                <img class="img-responsive" alt="default-img" src='{!! asset("ar-assets/front-end/images/logo.png") !!}'></a>
                                                @endif

                                            </div>
                                            <div class="right-block pull-right">
                                                <span>{{$product->model->subCategory->ar_title}}</span>
                                                <h5 class="product-name">
                                                    <a href='{!! URL::to("product/$product->id/$url") !!}'>{{$product->model->ar_title}}</a>
                                                </h5>
                                                <a class="cartRemove" data-toggle="modal" data-target="#removeModal" data-row_id="{{$product->rowId}}"><p>حذف من العربة</p></a>

                                                <div class="product-star">
                                                    <div id="rateYo{{$s_no}}{{$p_no}}" style="direction: ltr;"></div> &nbsp; &nbsp; &nbsp;
                                                </div>
                                            </div>
                                        </td>

                                        <!--Star rating script-->
                                        <script type="text/javascript">
                                            $(function () {
                 
                                              $("#rateYo"+'<?php echo $s_no.$p_no ?>').rateYo({
                                                starWidth: "15px",
                                                rating: '<?php echo rating($product->model->rating, count($product->model->rating)) ?>',
                                                rtl: true,
                                                readOnly: true,
                                              });
                                             
                                            });
                                        </script>
                                        <!--end of Star rating script-->

                                        <td class="price">       
                                            
                                            @if($product->model->price_offer == 1)
                                            <span id="product-price{{$s_no}}{{$p_no}}" class="price product-price" style="display:inline;">{{$product->model->offer_price}}</span> <span>{{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            <span class="price old-price">{{$product->model->price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            <span class="price offerd-price">{{$product->model->price - $product->model->offer_price}} {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            @else
                                            <span id="product-price{{$s_no}}{{$p_no}}" class="price product-price" style="display:inline;">{{$product->price}}</span> <span> {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                            @endif
                                            
</td>
                                        <td class="qty">
                                            <?php $qty_offers=[]; $qty_prices=[]; ?>
                                            <!--Qty Offers values if exist-->
                                            @if($product->model->qty_offer == 1)
                                                
                                                @foreach($product->model->qtyOffers as $offer)
                                                  <?php array_push($qty_offers, $offer->qty); ?>
                                                  <?php array_push($qty_prices, $offer->new_price); ?>
                                                @endforeach
                                                    
                                                
                                            @endif
                                            <?php $qty_offer_arry= array_combine($qty_offers, $qty_prices) ?>
                                            <!---->
                                           <div class="quantity-selector detail-info-entry">
                                                <!--Counters hold the necessary data to use in calculations-->
                                                <div id="number-minus{{$s_no}}{{$p_no}}" class="entry number-minus" data-cart-row="{{$product->rowId}}" data-maxqty="{{$product->model->stock}}" data-price="{{$product->price}}" data-qty-offer="{{$product->model->qty_offer}}" data-qtyoffers-array="{{json_encode($qty_offer_arry)}}" data-previous-price="{{$product->price}}" data-shipping-single="{{$product->options->shipping_single_price}}" data-loop="{{$s_no}}{{$p_no}}" data-s-loop="{{$s_no}}">&nbsp;</div>
                                                <div class="entry number">{{$product->qty}}</div>
                                                <div id="number-plus{{$s_no}}{{$p_no}}" class="entry number-plus" data-cart-row="{{$product->rowId}}" data-maxqty="{{$product->model->stock}}" data-price="{{$product->price}}" data-qty-offer="{{$product->model->qty_offer}}" data-qtyoffers-array="{{json_encode($qty_offer_arry)}}" data-previous-price="{{$product->price}}" data-shipping-single="{{$product->options->shipping_single_price}}" data-loop="{{$s_no}}{{$p_no}}" data-s-loop="{{$s_no}}">&nbsp;</div>
                                                 
                                            </div>
                                        </td>
                                         

                    

                                        <td class="price">
                                            <span id="product-subtotal{{$s_no}}{{$p_no}}" style="display:inline;">{{$product->subtotal}}</span><span> {{Session::has('currency') ? Session::get('currency') : 'رس'}}</span>
                                        </td>
                                        
                                    </tr>
                                    
                                    <?php array_push($store_total, $product->subtotal);
                                          array_push($ship_values, $product->options->shipping);
                                          ?>
                                </tbody>

                                <?php $p_no++; ?>
                                @endforeach
                                    
                            </table>
                            
                            
                           
                            
                            <!--Store Total Area-->
                            <?php $store_subtotal= array_sum($store_total); ?>
                            <?php $shipp_total= array_sum($ship_values); ?>
                                <div  class="row text-right">
                                    
                                        <div class="col-md-4 col-sm-6  col-xs-12"> 
                                            <div class="text-center small-price">
                                                <span> إجمالى المبلغ : <b><span id="products-total{{$s_no}}" data-store-subtotal="{{$store_subtotal}}">{{$store_subtotal}}</span>{{Session::has('currency') ? Session::get('currency') : 'ريال سعودي'}}  </b></span>
                                            </div>

                                            <div class="text-center small-price">
                                                <span> إجمالى قيمة الشحن :  <b><span id="shipping-total{{$s_no}}" data-store-shipping="{{$shipp_total}}"> {{$shipp_total}} </span>{{Session::has('currency') ? Session::get('currency') : 'ريال سعودي'}}  </b></span>
                                            </div>
                                             
                                            <div class="text-center big-price">
                                                <span> <strong>إجمالى المبلغ :<span id="store-total{{$s_no}}" data-store-total="{{$store_cart_total= $store_subtotal + $shipp_total}}"> {{$store_cart_total= $store_subtotal + $shipp_total}}</span> {{Session::has('currency') ? Session::get('currency') : 'ريال سعودي'}}</strong> </span>
                                            </div>
                                        </div>
                                         
                                        <div class="col-md-4 hidden-sm col-xs-12  top30"><strong></strong></div>
                                        
                                        <div class="col-md-4 col-sm-6 col-xs-12 more-padding top">
                                            <strong>قسيمة الشراء</strong>
                                            <br>
                                            أدخل رقم قسيمة الشراء فى حالة تواجدها
                                            
                                            <div class="input-group " id="mail-box">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">إستخدم</button>
                                              </span>
                                               <input type="text" placeholder="كود القسيمة فى حالة توافرها">
                                            </div>
    
                                        </div>
                                    
                                </div>    
                            
                            <div class="cart_navigation row">
                            	<div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                                    <a class="pull-right"> 
                                         المبلغ الكلى : <strong> 10 جنية  </strong>
                                    </a>
                                    <a class="pull-right"> 
                                        
                                        <span> تم توفير : <b> 100 درهم </b>  &nbsp;&nbsp;</span>
                                    </a>
                                    
                                </div>
                            
                                <div class="col-md-4 col-sm-6 col-xs-12  pull-left">
                                {!!Form::open(['url'=>'checkout-details', 'id'=>'checkout'.$s_no])!!}
                                	<a class="prev-btn" href="#ch" data-loop="{{$s_no}}">متابعة الشراء</a>
                                {!!Form::close()!!}
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                    <?php $s_no++; ?>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!-- ./row-->
    </div>
</div>


<!-- Modal -->
<div id="removeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">حذف المنتج من العربة</h4>
      </div>
      <div class="modal-body">
        <p>هل متأكد أنك تريد حذف هذا المنتج من عربة التسوق؟</p>
      </div>
      {!!Form::open(['url'=>'item-cart-remove', 'id'=>'remove-form'])!!}
      {!!Form::hidden('remove-data', '', ['id'=>'remove-data'])!!}
      {!!Form::close()!!}
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" form="remove-form">تأكيد الحذف</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        

        //--------------------------------------------    
        //Quantity counter (plus action)    
        $('.number-plus').on('click', function () {
            var divUpd = $(this).parent().find('.number'),
                newVal = parseInt(divUpd.text(), 10) + 1;
            var max = $(this).data('maxqty');
            if (newVal <= max) { divUpd.text(newVal);
            
            //customized code part, not related to the counter:
            //Offers price calcualtion code
            var price= $(this).data('price');
            var previous_price= $(this).data('previous-price');
            //product loop tags refrance
            var loop_no= $(this).data('loop');

            
            if ($(this).data('qty-offer') == 1){
                $.each($(this).data('qtyoffers-array'), function(qty, new_price){
                    if (newVal >= qty) {
                        
                        price = new_price;

                    } 
                    
                });
                
                //
                ($('#number-minus'+$(this).data('loop'))).data('previous-price', price);
                $(this).data('previous-price', price);
               
                
                $('#product-price'+loop_no).html(price);
                $('#product-subtotal'+loop_no).html(price*newVal);  

                
                var store_subtotal= ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal');

                new_store_subtotal= store_subtotal - (previous_price * (newVal - 1)) + price * newVal;
                
                $('#products-total'+$(this).data('s-loop')).html(new_store_subtotal.toFixed(2));
                ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal', new_store_subtotal.toFixed(2));
                $(this).data('previous-price', price);   

                //shipping values:
                var store_shipping= ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping');
                var single_shipping_price= $(this).data('shipping-single'); 

                new_store_shipping= store_shipping - (single_shipping_price * (newVal - 1)) + single_shipping_price * newVal; 

                $('#shipping-total'+$(this).data('s-loop')).html(new_store_shipping.toFixed(2));
                ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping', new_store_shipping.toFixed(2)); 

                //store final total:
                new_store_total= new_store_subtotal + new_store_shipping;
                $('#store-total'+$(this).data('s-loop')).html(new_store_total.toFixed(2));
                ($('#store-total'+$(this).data('s-loop'))).data('store-total', new_store_total.toFixed(2));
                
  
            }
            //Non-offers calculations:
            else{
                
                $('#product-subtotal'+loop_no).html(price * newVal);

                var store_subtotal= ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal');

                new_store_subtotal= store_subtotal - (price * (newVal - 1)) + price * newVal;
                
                $('#products-total'+$(this).data('s-loop')).html(new_store_subtotal.toFixed(2));
                ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal', new_store_subtotal.toFixed(2)); 

                //shipping values:
                var store_shipping= ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping');
                var single_shipping_price= $(this).data('shipping-single'); 

                new_store_shipping= store_shipping - (single_shipping_price * (newVal - 1)) + single_shipping_price * newVal; 

                $('#shipping-total'+$(this).data('s-loop')).html(new_store_shipping.toFixed(2));
                ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping', new_store_shipping.toFixed(2));


                //store final total:
                new_store_total= new_store_subtotal + new_store_shipping;
                $('#store-total'+$(this).data('s-loop')).html(new_store_total.toFixed(2));
                ($('#store-total'+$(this).data('s-loop'))).data('store-total', new_store_total.toFixed(2));
                

               
            }
            
           }

        });
        //--------------------------------------------
        //Quantity counter (minus action)  
        $('.number-minus').on('click', function () {
            var divUpd = $(this).parent().find('.number'),
                newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 0) { divUpd.text(newVal);

            //customized code part, not related to the counter:
            //Offers price calcualtion code
            var price= $(this).data('price');
            var previous_price= $(this).data('previous-price');
            //product loop tags refrance
            var loop_no= $(this).data('loop');

            
            if ($(this).data('qty-offer') == 1){
                $.each($(this).data('qtyoffers-array'), function(qty, new_price){
                    if (newVal >= qty) {
                         
                        price = new_price;

                    } 
                    
                });
                
                ($('#number-plus'+$(this).data('loop'))).data('previous-price', price);
                $(this).data('previous-price', price);


                $('#product-price'+loop_no).html(price);
                $('#product-subtotal'+loop_no).html(price*newVal);  

                var store_subtotal= ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal');

                new_store_subtotal= store_subtotal - (previous_price * (newVal + 1)) + price * newVal;
                
                $('#products-total'+$(this).data('s-loop')).html(new_store_subtotal.toFixed(2));
                ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal', new_store_subtotal.toFixed(2));
                $(this).data('previous-price', price);   

                //shipping values:
                var store_shipping= ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping');
                var single_shipping_price= $(this).data('shipping-single'); 

                new_store_shipping= store_shipping - (single_shipping_price * (newVal + 1)) + single_shipping_price * newVal; 

                $('#shipping-total'+$(this).data('s-loop')).html(new_store_shipping.toFixed(2));
                ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping', new_store_shipping.toFixed(2)); 

                //store final total:
                new_store_total= new_store_subtotal + new_store_shipping;
                $('#store-total'+$(this).data('s-loop')).html(new_store_total.toFixed(2));
                ($('#store-total'+$(this).data('s-loop'))).data('store-total', new_store_total.toFixed(2));
                
  
            }
            //Non-offers calculations:
            else{
                
                $('#product-subtotal'+loop_no).html(price * newVal);

                var store_subtotal= ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal');

                new_store_subtotal= store_subtotal - (price * (newVal + 1)) + price * newVal;
                
                $('#products-total'+$(this).data('s-loop')).html(new_store_subtotal.toFixed(2));
                ($('#products-total'+$(this).data('s-loop'))).data('store-subtotal', new_store_subtotal.toFixed(2)); 

                //shipping values:
                var store_shipping= ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping');
                var single_shipping_price= $(this).data('shipping-single'); 

                new_store_shipping= store_shipping - (single_shipping_price * (newVal + 1)) + single_shipping_price * newVal; 

                $('#shipping-total'+$(this).data('s-loop')).html(new_store_shipping.toFixed(2));
                ($('#shipping-total'+$(this).data('s-loop'))).data('store-shipping', new_store_shipping.toFixed(2));


                //store final total:
                new_store_total= new_store_subtotal + new_store_shipping;
                $('#store-total'+$(this).data('s-loop')).html(new_store_total.toFixed(2));
                ($('#store-total'+$(this).data('s-loop'))).data('store-total', new_store_total.toFixed(2));
                

               
            }
            
          }  

        });
        //--------------------------------------------
    });

    

    //-----------------------------------------------
    //Cart submit total value:
    $('.prev-btn').click(function(){
        var value= $('#store-total'+$(this).data('loop')).data('store-total');
        var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "checkout-total")
               .attr("value", value);
        
        $('#checkout'+$(this).data('loop')).append($(input));
        
        $('#checkout'+$(this).data('loop')).submit();
    });

</script>


@stop
