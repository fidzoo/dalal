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
                        <a href="#" title="Return to Home">تفاصيل الشحن</a>
                        
                    </div>
                
            </div>
            <!-- page heading-->
             <div class="center_column col-xs-12 col-sm-12 text-right" id="center_column">
                <!-- Content page -->
                <div class="content-text clearfix">
            <h2 class="page-heading2">
                <span class="page-heading-title2">اختر طريقة الدفع:</span>
            </h2>
            <select name="pay-method" id="pay-method" class="form-control">
            	<option selected disabled>اختر طريقة الدفع</option>
                <option>تحويل بنكي</option>
                <option>ويسترن يونيون</option>
                <option>باي بال</option>
            	<option>بطاقة ائتمان</option>
            </select>
            </div>
            </div>
        </div>
        <!-- ./row-->

        {!! Form::open(['url'=>'order-pay']) !!}
        {!! Form::hidden('store-id', $store_id) !!}
        {!!Form::submit('اتمام الدفع')!!}
        {!!Form::close()!!}

        <!-- <div id="paypal" style="display: none;">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="faridehab-facilitator@gmail.com">
            <input type="hidden" name="lc" value="QA">
            
            <input type="hidden" name="item_name" value="مجموعة منتجات">
            <input type="hidden" name="item_number" value="">
            <input type="hidden" name="amount" value="{!!$total_amount!!}">
            <input type="hidden" name="currency_code" value="USD">
            
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_SM.gif:NonHostedGuest">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </div> -->

    </div>
</div>

<script type="text/javascript">
    $('#pay-method').change(function(){
        $('#paypal').attr('style', 'display: block;');
    });

</script>

@stop