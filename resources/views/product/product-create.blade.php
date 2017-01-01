@extends('layouts.ar-admin-dash')

@section('content')
<!--pickers css-->
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-datepicker/css/datepicker-custom.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-timepicker/css/timepicker.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-colorpicker/css/colorpicker.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-daterangepicker/daterangepicker-bs3.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-datetimepicker/css/datetimepicker-custom.css") !!}' />

<style type="text/css">
#myList .div 
{
	display: none;
}
.wrapper
{
	direction: rtl;
}
</style>

<h3> إضافة منتج جديد </h3>
<br>
{!! Form::open(["url"=>"product", "files"=> true,"class"=>"form-group", "id"=>"myList"]) !!}
{!! Form::hidden('store_id', $store_id) !!}

{!! Form::label('اسم المنتج بالعربية') !!}
@if ($similar == 1)
{!! Form::text('ar_title', $product->ar_title, ['class'=>'form-control', 'required']) !!}<br>
@else 
{!! Form::text('ar_title', "", ['class'=>'form-control', 'required']) !!}<br>
@endif

{!! Form::label('اسم المنتج بالإنجليزية') !!}
@if ($similar == 1)
{!! Form::text('en_title', $product->en_title, ['class'=>'form-control', 'required']) !!}<br>
@else 
{!! Form::text('en_title', "", ['class'=>'form-control', 'required']) !!}<br>
@endif

{!! Form::label('السيكشن') !!}<br>
<select id="section" class="form-control">
	<option disabled selected>-- اختر السيكشن --</option>
	@foreach ($sections as $id=>$section)
	<option value='{!!$id!!}'>{!!$section!!}</option>
	@endforeach
</select>

<br>

{!! Form::label('التصنيف الرئيسي') !!}<br>
{!! Form::select('mcategory', [], null, ['id'=>'mcategory', 'class'=>'form-control']) !!}<br>

{!! Form::label('التصنيف الفرعي') !!}<br>
{!! Form::select('subcategory', [], null, ['id'=>'subcategory', 'class'=>'form-control']) !!}<br>

{!! Form::label('وصف قصير للمنتج بالعربية') !!}
@if ($similar == 1)
{!! Form::text('ar_short_descrip', $product->ar_short_descrip, ['class'=>'form-control']) !!}<br>
@else 
{!! Form::text('ar_short_descrip', "", ['class'=>'form-control']) !!}<br>
@endif

{!! Form::label('وصف قصير للمنتج بالإنجليزية') !!}
@if ($similar == 1)
{!! Form::text('en_short_descrip', $product->en_short_descrip, ['class'=>'form-control']) !!}<br>
@else
{!! Form::text('ar_short_descrip', "", ['class'=>'form-control']) !!}<br>
@endif

{!! Form::label('وصف طويل للمنتج بالعربية') !!}
@if ($similar == 1)
{!! Form::textarea('ar_long_descrip', $product->ar_long_descrip, ['class'=>'form-control']) !!}<br>
@else
{!! Form::textarea('ar_long_descrip', "", ['class'=>'form-control']) !!}<br>
@endif

{!! Form::label('وصف طويل للمنتج بالإنجليزية') !!}
@if ($similar == 1)
{!! Form::textarea('en_long_descrip', $product->en_long_descrip, ['class'=>'form-control']) !!}<br>
@else
{!! Form::textarea('en_long_descrip', "", ['class'=>'form-control']) !!}<br>
@endif

{!! Form::label('الأحجام المتوفرة لهذا المنتج') !!}<br>
<div id='sizes'></div>
<div id='sizes_count'></div>
<br>


<h3>مواصفات المنتج</h3>
{!! Form::label('يمكنك عدم كتابة قيمة المواصفة ولن يتم عرضها ضمن مواصفات المنتج') !!}
<div id='specs'></div>
<div id='specs_count'></div>
<br>


{!! Form::label('ألوان المنتج') !!}<br>
<select id="color_option" class="form-control" name="color_option">
	<option disabled selected>-- اختيار نوع الألوان --</option>
	<option value="colors">ألوان فقط</option>
	<option value="images">صور ملونة</option>
</select>
<br>

<div id="color_count"></div>

<div id="color_botton_div"></div>
<div id="colors"></div>

<br>


{!! Form::label('الكمية المتوفرة') !!}<br>
{!! Form::number('stock', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('السعر') !!}<br>
{!! Form::number('price', "", ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('العملة') !!}<br>
{!! Form::select('currency', ['SAR'=>'ريال سعودي', 'USD'=>'دولار أمركي'], null, ['class'=>'form-control']) !!}<br>



<h3>صور المنتج الدعائية</h3>
<input type="hidden" id="images_count" name="images_count" value="">
<div id="product_images"></div><br>
<a class="btn btn-default" id="upload_image">إضافة صورة</a>

<br><br>
{!! Form::submit('إضافة', ['class'=>'btn btn-primary btn-lg btn-block']) !!}

{!! Form::close() !!}



<!--script for the ajax Main & Sub Categories menu-->
	<script type="text/javascript">
		$('#section').on('change', function(e){
			//console.log(e);
			var section_id= e.target.value;

			//ajax
			$.get('/ajax-mcategory?section_id=' + section_id, function(data){
			//success data 
				$('#mcategory').empty();
				$('#mcategory').append('<option disabled selected>-- اختر القسم الرئيسي --</option>');
				$.each(data, function(index, subcatObj){

					$('#mcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.ar_title+'</option>');
				});
			});
		});

		$('#mcategory').on('change', function(e){
			//console.log(e);
			var mcategory_id= e.target.value;

			//ajax
			$.get('/ajax-subcategory?mcategory_id=' + mcategory_id, function(data){
			 //success data 
				$('#subcategory').empty();
				$('#subcategory').append('<option disabled selected>-- اختر القسم الفرعي --</option>');
				$.each(data, function(index, subcatObj){

					$('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.ar_title+'</option>');
				});
			});
		});
	</script>

	<!--script for the ajax Sizes & Specs-->
	<script type="text/javascript">
	//get sizes related to the selected Cubcategory
		$('#subcategory').on('change', function(e){
			//console.log(e);
			var subcategory_id= e.target.value;

			//Sizes call ajax
			$.get('/ajax-sizes?subcategory_id=' + subcategory_id, function(data){
			//success data 
				$('#sizes').empty();
				$('#sizes_count').append('<input type="hidden" name="sizes_count" value="'+data.length+'">');
				var i= 1;
				$.each(data, function(index, subcatObj){
					$('#sizes').append('<input name="ar_size'+i+'" type="checkbox" value="'+subcatObj.ar_size+'"> &nbsp; '+subcatObj.ar_size+'&nbsp; &nbsp; <input type="hidden" name="en_size'+i+'" value="'+subcatObj.en_size+'">');
					i++;
				});
			});
			//Specs call ajax
			$.get('/ajax-specs?subcategory_id=' + subcategory_id, function(specs_data){
			//success data
			$('#specs').empty();
			$('#specs_count').append('<input type="hidden" name="specs_count" value="'+specs_data.length+'">');
			var x=1;
			$.each(specs_data, function(index, subcatObj){
					$('#specs').append('<input type="hidden" name="ar_title'+x+'" value="'+subcatObj.ar_title+'" > <label>'+subcatObj.ar_title+':</label> <input name="ar_detail'+x+'" type="text"> <br> <input type="hidden" name="en_title'+x+'" value="'+subcatObj.en_title+'" > <label>'+subcatObj.en_title+':</label> <input name="en_detail'+x+'" type="text"> <br>');
					x++;
				});
			});
		});
	</script>

	<!--Colors dropdown script-->
	<script type="text/javascript">
		$('#color_option').on('change', function(e){
			if (e.target.value == 'colors') {
				$('#colors').empty();
				$('#color_botton_div').empty();
				//genrate "Add Color" Botton
				$('#color_botton_div').append('<a class="btn btn-default" id="add_color">إضافة لون</a>');
				//to count the selected colors numbers
				$('#color_count').empty();
				$('#color_count').append('<input type="hidden" id="colors_count" name="colors_count" value="">');
				//generate "Color Picker"
				var i=1;
				$('#add_color').click(function(){
					$('#colors').append('<div style="direction: ltr;" class="col-md-4 col-xs-11">  <div data-color-format="rgb" data-color="rgb(255, 146, 180)" class="input-append colorpicker-default color">  <input type="text" readonly="" value="" class="form-control" name="color'+i+'">  <span class=" input-group-btn add-on">  <button class="btn btn-default" type="button" style="padding: 8px">  <i style="background-color: rgb(124, 66, 84);"></i>  </button> </span> </div> </div> <br> ');
					//run Color picker script     
					$.getScript('{!! asset("ar-assets/back-end/js/pickers-init.js") !!}');
					//chage the count value
					$('#colors_count').attr("value", i);
					i++;
				}); 
			}
			else{
				$('#color_count').empty();
				$('#color_count').append('<input type="hidden" id="colors_count" name="colors_count" value="">');
				var x= 1;
				$('#colors').empty();
				$('#color_botton_div').empty();
				$('#color_botton_div').append('<a class="btn btn-default" id="add_color">رفع صورة</a>');
				$('#add_color').click(function(){
					$('#colors').append('<input type="file" name="color_image'+x+'">');
					$('#colors_count').attr("value", x);
						x++;
					});
			}
		});
	</script>
	<!--Generate upload product images script-->
	<script type="text/javascript">
			var m= 1;
		$('#upload_image').click(function(){
			$('#product_images').append('<input type="file" name="pro_image'+m+'">');
			$('#images_count').attr("value", m);
			m++;
		});
	</script>

	<!--pickers plugins-->
	<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/bootstrap-datepicker/js/bootstrap-datepicker.js") !!}'></script>
	<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js") !!}'></script>
	<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/bootstrap-daterangepicker/moment.min.js") !!}'></script>
	<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/bootstrap-daterangepicker/daterangepicker.js") !!}'></script>
	<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js") !!}'></script>
	<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/bootstrap-timepicker/js/bootstrap-timepicker.js") !!}'></script>

	<!--pickers initialization-->
	<script src='{!! asset("ar-assets/back-end/js/pickers-init.js") !!}'></script>


@stop