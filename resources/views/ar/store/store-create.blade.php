@extends('ar.layouts.ar-merchant-dash')

@section('content')
<!--multi-select-->
<link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/back-end/js/jquery-multi-select/css/multi-select.css") !!}' />
<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
إضافة متجر جديد
</h1>
</div> 
<div class="panel-body">

{!! Form::open(["url"=>"store", "files"=> true,"class"=>"form-group"]) !!}
<div class="col-md-6">
{!! Form::label('اسم المتجر بالعربية') !!}
{!! Form::text('ar_name', "", ['class'=>'form-control', 'required']) !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('اسم المتجر بالإنجليزية') !!}
{!! Form::text('en_name', "", ['class'=>'form-control', 'required']) !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('وصف قصير بالعربية') !!}
{!! Form::text('ar_description', "", ['class'=>'form-control']) !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('وصف قصير بالإنجليزية') !!}
{!! Form::text('en_description', "", ['class'=>'form-control']) !!}<br>
</div>
<div class="col-md-12">
{!! Form::label('أقسام المتجر، برجاء الضغط على أسماء الأقسام من اليسار') !!}<br>
	    <select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]" required>
	    @foreach ($main_cats as $main_cat)
			<option disabled="" class="text-center" style="font-size: 20px;padding: 5px;color: #000"> {{$main_cat->ar_title}} </option>
		    	
		    	@foreach($main_cat->subCategories as $sub_cat)    
		        	<option value="{{$sub_cat->id}}">{{$sub_cat->ar_title}}</option>
		        @endforeach

	    @endforeach
	    </select>
</div>
<style>
    .ms-container {width: 100%!important;}    
</style>
<div class="clearfix"></div>
<br>
<div class="col-md-6">
<select id="country" class="form-control" name="country" required>
	<option value="-1" selected disabled>الدولة</option>
	@foreach($countries as $id=>$country)
	<option value='{!!$id!!}'>{!!$country!!}</option>
	@endforeach
</select> <br>
</div>

<div class="col-md-6">
<select id="city" class="form-control" name="city" required>
	<option value="-1" selected disabled>المدينة</option>
</select> <br>
</div>
<div class="col-md-4">
{!! Form::label('شعار المتجر') !!}
{!! Form::file('ar_logo') !!}
</div>
<div class="col-md-4">
{!! Form::label('بانر المتجر العربي') !!}
{!! Form::file('ar_banner') !!}
</div>
<div class="col-md-4">
{!! Form::label('بانر المتجر الإنجليزي') !!}
{!! Form::file('en_banner') !!}
</div>
</div>
 </div>
 
 
<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
سياسات المتجر
</h1>
</div> 
<div class="panel-body">
<textarea name="store_policy" rows="7" placeholder="برجاء ذكر سياسة عمل المتجر" class="form-control" required></textarea><br>

<div class="col-md-6">
<input type="checkbox" name="return_policy" id="return_policy"> 
المتجر يمتلك سياسة استرجاع؟ 
<textarea name="return_policy_text" id="return_policy_text" class="form-control" style="display: none;" rows="5" placeholder="بنود سياسات الاسترجاع:"></textarea>
</div>
<div class="col-md-6">
<input type="checkbox" name="seller_guaranty" id="seller_guaranty">
يمتلك المتجر سياسة ضمانات البائع 
<textarea name="seller_guaranty_text" id="seller_guaranty_text" class="form-control" style="display: none;" rows="5" placeholder="ضمانات البائع:"></textarea>
</div>
</div>
</div>

<div class="clearfix"></div>
<br>
{!! Form::submit('إنشاء', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
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