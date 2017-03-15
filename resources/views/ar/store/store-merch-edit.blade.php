@extends('ar.layouts.ar-merchant-dash')

@section('content')
<!--multi-select-->
<link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/back-end/js/jquery-multi-select/css/multi-select.css") !!}' />

<h3>تعديل وتحديث بيانات المتجر</h3> 
<br>
{!! Form::open(["url"=>"store/$store->id", "method"=>"patch", "files"=> true,"class"=>"form-group"]) !!}
{!! Form::label('اسم المتجر بالعربية') !!}
{!! Form::text('ar_name', $store->ar_name, ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('اسم المتجر بالإنجليزية') !!}
{!! Form::text('en_name', $store->en_name, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('وصف قصير بالعربية') !!}
{!! Form::text('ar_description', $store->ar_description, ['class'=>'form-control']) !!}<br>
{!! Form::label('وصف قصير بالإنجليزية') !!}
{!! Form::text('en_description', $store->en_description, ['class'=>'form-control']) !!}<br>

{!! Form::label('أقسام المتجر') !!}<br>

<div class="form-group">
	    <select multiple="multiple" class="multi-select" id="my_multi_select1"
	            name="my_multi_select1[]">
	    @foreach ($main_cats as $main_cat)
			<option disabled="" class="text-center" style="font-size: 20px;padding: 5px;color: #000"> {{$main_cat->ar_title}} </option>
		    	
		    	@foreach ($main_cat->subCategories as $sub_cat)    
		        	@if (in_array($sub_cat->id, $selected))
		        	<option value="{{$sub_cat->id}}" selected>{{$sub_cat->ar_title}}</option>
		        	@else
		        	<option value="{{$sub_cat->id}}">{{$sub_cat->ar_title}}</option>
		        	@endif
		        @endforeach

	    @endforeach
	    </select>
</div>
<br>

{!! Form::label('الدولة:') !!}
{!! Form::select('country', $countries, $store->country_id, ['class'=>'form-control', 'id'=>'country']) !!}<br>

{!! Form::label('المدينة:') !!}
{!! Form::select('city', $cities, $store->city_id, ['class'=>'form-control', 'id'=>'city']) !!}<br>



{!! Form::label('شعار المتجر:') !!}<br>
{!!Form::image($store->ar_logo, "", ["width"=>"100"])!!}<br>
{!! Form::file('ar_logo') !!}<br>

{!! Form::label('بانر المتجر العربي:') !!}<br>
{!!Form::image($store->ar_banner, "", ["width"=>"200"])!!}<br>
{!! Form::file('ar_banner') !!}<br>

{!! Form::label('بانر المتجر الإنجليزي:') !!}<br>
{!!Form::image($store->en_banner, "", ["width"=>"200"])!!}<br>
{!! Form::file('en_banner') !!}<br>

<h4>سياسة عمل المتجر</h4>
<textarea name="store_policy" rows="7" placeholder="برجاء ذكر سياسة عمل المتجر" class="form-control" required></textarea>{!!$store->store_policy!!}<br>

@if($store->return_policy == 1)
<input type="checkbox" name="return_policy" id="return_policy" checked> المتجر يمتلك سياسة استرجاع؟ <br><br>
<textarea name="return_policy_text" id="return_policy_text" class="form-control" rows="5">{{$store->return_text}}</textarea> <br><br>
@else
<input type="checkbox" name="return_policy" id="return_policy"> المتجر يمتلك سياسة استرجاع؟ <br><br>
<textarea name="return_policy_text" id="return_policy_text" class="form-control" style="display: none;" rows="5" placeholder="بنود سياسات الاسترجاع:"></textarea> <br><br>
@endif

@if($store->seller_guaranty == 1)
<input type="checkbox" name="seller_guaranty" id="seller_guaranty" checked> يمتلك المتجر سياسة ضمانات البائع <br><br>
<textarea name="seller_guaranty_text" id="seller_guaranty_text" class="form-control" rows="5">{{$store->guaranty_text}}</textarea> <br><br>
@else
<input type="checkbox" name="seller_guaranty" id="seller_guaranty"> يمتلك المتجر سياسة ضمانات البائع <br><br>
<textarea name="seller_guaranty_text" id="seller_guaranty_text" class="form-control" style="display: none;" rows="5" placeholder="ضمانات البائع:"></textarea> <br><br>
@endif


{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}

<!--script for the ajax cities menu-->
    <script type="text/javascript">
        $('#country').on('change', function(e){
            //console.log(e);
            var country_id= e.target.value;

            //ajax
            $.get('/ajax-storecity?country_id=' + country_id, function(data){
                //success data
                $('#city').empty();
                $.each(data, function(index, subcatObj){

                    $('#city').append('<option value="'+subcatObj.id+'">'+subcatObj.ar_name+'</option>');
                });
            });
        });
    </script>

    <!--Return policy textarea show script-->
    <script type="text/javascript">
    	$('#return_policy').change(function(){
    		if(this.checked){
    			$('#return_policy_text').css("display", "block");
    		}
    		else{
    			$('#return_policy_text').css("display", "none");
    		}
    	});

    	$('#seller_guaranty').change(function(){
    		if(this.checked){
    			$('#seller_guaranty_text').css("display", "block");
    		}
    		else{
    			$('#seller_guaranty_text').css("display", "none");
    		}
    	});
    </script>

<!--multi-select-->
<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/jquery-multi-select/js/jquery.multi-select.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/jquery-multi-select/js/jquery.quicksearch.js") !!}'></script>
<script src='{!! asset("ar-assets/back-end/js/multi-select-init.js") !!}'></script>
@stop