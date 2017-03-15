@extends('ar.layouts.ar-merchant-dash')

@section('content')

<h3>إختيار شركات الشحن والمدن</h3>

{!! Form::open(["url"=> "product-shipping", "class"=>"form-group"]) !!}

<?php $shp_no= -1; $coll= 1; $check_no= 1; ?>

@foreach($shipping_cos as $company)

@if(in_array($company->id, $selected_companies))
<input type="checkbox" name="shipping_check{{$shp_no}}" id="{{$shp_no}}" value="{{$company->id}}" checked> {{$company->ar_name}} <br><br>
@else
<input type="checkbox" name="shipping_check{{$shp_no}}" id="{{$shp_no}}" value="{{$company->id}}"> {{$company->ar_name}} <br><br>
@endif


@if(in_array($company->id, $selected_companies))
<div id="country_accordion{{$shp_no}}">
@else
<div id="country_accordion{{$shp_no}}" style="display: none;">
@endif
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
<?php $check= 0; ?>
<?php $pr= 0; ?>
					<div class="col-md-4 form-group"> 
           @foreach($company->cit as $cit)
           @if($company->id == $cit->pivot->shipping_company_id && $city->id == $cit->pivot->city_id && in_array($city->id, $selected_cities) && $pr != 1)
                   		
                      <input type="checkbox" name="city{{$check_no}}" id="{{$check_no}}" value="{{$city->id}}" checked> {{$city->ar_name}} 
              <?php $check= 1; ?>
              <?php $pr= 1; ?>        
                   		@elseif($pr != 1)
                      <input type="checkbox" name="city{{$check_no}}" id="{{$check_no}}" value="{{$city->id}}"> {{$city->ar_name}} 
              <?php $pr= 1; ?>                        
            @endif
            @endforeach
                      @if(in_array($city->id, $selected_cities) && in_array($company->id, $selected_companies))
                      <div id="price-div{{$check_no}}">
                      @else
                   		<div id="price-div{{$check_no}}" style="display: none;">
                      @endif
                      <!--saved price print-->
                        @foreach($product->shippingCos  as $co)
                   			@if($co->pivot->city_id == $city->id && $co->pivot->shipping_company_id == $company->id)
                        سعر الشحن: <input type="number" name="price{{$check_no}}" step="0.001" min="0" class="form-control" value="{{$co->pivot->price}}">
                        <?php $print= 1; ?>
                        @elseif($print != 1)
                        سعر الشحن: <input type="number" name="price{{$check_no}}" step="0.001" min="0" class="form-control">
                        @endif
                      
                      <!--saved currency-->  
                        @if($co->pivot->city_id == $city->id && $co->pivot->shipping_company_id == $company->id)
                       		 <select name="currency{{$check_no}}" class="form-control">
                       		 @foreach($currencies as $currency)
                             @if($co->pivot->currency_id == $currency->id)
                       		   <option value="{{$currency->id}}" selected>{{$currency->ar_name}}</option>
                             @else
                             <option value="{{$currency->id}}">{{$currency->ar_name}}</option>
                             @endif
                       		 @endforeach
                         <?php $print= 1; ?>
                        @elseif($print != 1)
                           <select name="currency{{$check_no}}" class="form-control">
                           @foreach($currencies as $currency)
                           <option value="{{$currency->id}}">{{$currency->ar_name}}</option>
                           @endforeach
                        @endif 
                        @endforeach 
                     		</select>	
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


{!! Form::submit('إنشاء', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
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