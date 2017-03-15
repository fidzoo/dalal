@extends('ar.layouts.ar-merchant-dash')

@section('content')

<h3>إختيار شركات الشحن والمدن</h3>

{!! Form::open(["url"=> "product-shipping", "class"=>"form-group"]) !!}

<?php $shp_no= -1; $coll= 1; $check_no= 1; ?>

@foreach($shipping_cos as $company)
<input type="checkbox" name="shipping_check{{$shp_no}}" id="{{$shp_no}}" value="{{$company->id}}"> {{$company->ar_name}} <br><br>

<div id="country_accordion{{$shp_no}}" style="display: none;">
	<!--collapse start-->
    <div class="panel-group " id="accordion">
      
      
      @foreach($countries as $country)
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$coll}}">
                        <strong>{!!$country->ar_name!!}</strong> 
                    </a>
                </h4>
            </div>
            <div id="collapse{{$coll}}" class="panel-collapse collapse">
                <div class="panel-body">
                
                   @foreach($country->cities as $city)
					<div class="col-md-4 form-group"> 
                   		<input type="checkbox" name="city{{$check_no}}" id="{{$check_no}}" value="{{$city->id}}"> {{$city->ar_name}} 
                   		
                   		<div id="price-div{{$check_no}}" style="display: none;">
                   			سعر الشحن: <input type="number" name="price{{$check_no}}" step="0.001" min="0" class="form-control"> 
                     		
                        <select name="currency{{$check_no}}" class="form-control">
                     		@foreach($currencies as $currency)
                     		<option value="{{$currency->id}}">{{$currency->ar_name}}</option>
                     		@endforeach
                     		</select>	
                   		   
                        مدة الشحن: <input type="text" name="duration{{$check_no}}" class="form-control" placeholder="مثال: 10-15 يوماً" maxlength="25"><br>

                        <input type="checkbox" name="tracking{{$check_no}}"> معلومات التتبع متوافرة؟

                      </div>
                     	<br>
                     	
          </div>
                   <?php $check_no++ ?>   
                   @endforeach
                
                </div>
            </div>
        </div>
       
       <?php $coll++ ?> 
      @endforeach
    </div>
    <input type="hidden" name="cities_count{{$shp_no}}" value="{{$check_no}}">
    <!--collapse end-->
	<br>
</div>
<?php $shp_no-- ?>
@endforeach

<br><br>
<input type="hidden" name="companies_count" value="{{$shp_no}}">
<input type="hidden" name="countries_count" value="{{$shp_no}}">

<input type="hidden" name="check_count" value="{{$check_no}}">

<input type="hidden" name="product_id" value="{{$product_id}}">
<input type="hidden" name="store_id" value="{{$store_id}}">


{!! Form::submit('إدراج', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
{!! Form::close() !!}



<!--script for shipping companies select-->
<script type="text/javascript">
	$(":checkbox").change(function(){
		if(this.checked){
			$('#country_accordion'+$(this).attr('id')).css('display', 'block');		
		}
		else{
			$('#country_accordion'+$(this).attr('id')).css('display', 'none');
			}
	});
</script>


<!--script for shipping price-->
<script type="text/javascript">
	$(":checkbox").change(function(){
		if(this.checked){
			$('#price-div'+$(this).attr('id')).css('display', 'block');		
		}
		else{
			$('#price-div'+$(this).attr('id')).css('display', 'none');
			}
	});
</script>
@stop