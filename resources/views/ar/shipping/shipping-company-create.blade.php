@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>إنشاء شركة حن جديدة</h3>

{!! Form::open(["url"=> "shipping-company", "files"=>true, "class"=>"form-group"]) !!}

{!! Form::label('اسم الشركة بالعربية') !!}
{!! Form::text('ar_name', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('اسم الشركة بالإنجليزية') !!}
{!! Form::text('en_name', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('أيقونة الشركة') !!}
{!! Form::file('image') !!}<br>

<h4>المدن التي يمكن الشحن إليها</h4>
<!--collapse start-->
    <div class="panel-group " id="accordion">
      <?php $no=1; ?>
      <?php $check_no= 1; ?>
      @foreach($countries as $country)
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$no}}">
                        <strong>{!!$country->ar_name!!}</strong> 
                    </a>
                </h4>
            </div>
            <div id="collapse{{$no}}" class="panel-collapse collapse">
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
                   		</div>
                     	<br>
                     	<?php $check_no++; ?>
                     </div>
                   @endforeach
                
                </div>
            </div>
        </div>
        <?php $no++; ?>
      @endforeach
    </div>
    <input type="hidden" name="check_count" value="{{$check_no-1}}">
    <!--collapse end-->
<br><br>
{!! Form::submit('إنشاء', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
{!! Form::close() !!}


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