@extends('ar.layouts.ar-merchant-dash')

@section('content')
<!--pickers css-->
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-datepicker/css/datepicker-custom.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-timepicker/css/timepicker.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-colorpicker/css/colorpicker.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-daterangepicker/daterangepicker-bs3.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-datetimepicker/css/datetimepicker-custom.css") !!}' />

<!--IOS switchery check-->
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/ios-switch/switchery.css") !!}' />
  
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/ios-switch/switchery.css") !!}' />

   <link rel="stylesheet" href='{!! URL::to("ar-assets/back-end/js/iCheck/skins/square/blue.css") !!}' />

<div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb panel">
                    <li><a href="#"><i class="fa fa-home"></i> لوحة التحكم</a></li>
                    <li><a href="#">المنتجات</a></li>
                    <li class="active">إضافة منتج جديد</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

<br>
{!! Form::open(["url"=>"product", "files"=> true,"class"=>"form-group", "id"=>"myList"]) !!}
{!! Form::hidden('store_id', $store_id) !!}



<div class="clearfix"></div>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
إسم المنتج
</h1>
</div> 
<div class="panel-body">
<div class="col-md-6">
{!! Form::label('عربي') !!}
@if ($similar == 1)
{!! Form::text('ar_title', $product->ar_title, ['class'=>'form-control', 'required']) !!}<br>
@else 
{!! Form::text('ar_title', "", ['class'=>'form-control', 'required']) !!}<br>
@endif
</div>

<div class="col-md-6">
{!! Form::label('إنجليزي') !!}
@if ($similar == 1)
{!! Form::text('en_title', $product->en_title, ['class'=>'form-control', 'required']) !!}<br>
@else 
{!! Form::text('en_title', "", ['class'=>'form-control', 'required']) !!}<br>
@endif
</div></div>
</div>

<div class="clearfix"></div>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
إختيار قسم المنتج
</h1>
</div> 
<div class="panel-body">                               
<div class="col-md-4">
{!! Form::label('التصنيف العام') !!}<br>
@if ($similar == 1)
{!! Form::select('section', $sections, $selected_sub->mainCategories[0]->section->id, ['id'=>'section', 'class'=>'form-control']) !!}
@else 
<select id="section" class="form-control">
	<option disabled selected>-- التصنيف العام --</option>
	@foreach ($sections as $id=>$section)
	<option value='{!!$id!!}'>{!!$section!!}</option>
	@endforeach
</select>
@endif

<br>
</div>

<div class="col-md-4">
{!! Form::label('التصنيف الرئيسي') !!}<br>
@if ($similar == 1)
{!! Form::select('mcategory', $main_categories, $selected_sub->mainCategories[0]->id, ['id'=>'mcategory', 'class'=>'form-control']) !!}<br>
@else
{!! Form::select('mcategory', [], null, ['id'=>'mcategory', 'class'=>'form-control']) !!}<br>
@endif 
</div>
<div class="col-md-4">
{!! Form::label('التصنيف الفرعي') !!}<br>
@if ($similar == 1)
{!! Form::select('subcategory', $sub_categories, $product->sub_category_id, ['id'=>'subcategory', 'class'=>'form-control', 'required']) !!}<br>
@else
{!! Form::select('subcategory', [], null, ['id'=>'subcategory', 'class'=>'form-control', 'required']) !!}<br>
@endif
</div>
</div>
</div>


<div class="clearfix"></div>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
الوصف القصير للمنتج
</h1>
</div> 
<div class="panel-body">                               
<div class="col-md-6">
{!! Form::label('عربي') !!}
@if ($similar == 1)
{!! Form::text('ar_short_descrip', $product->ar_short_descrip, ['class'=>'form-control', 'required']) !!}<br>
@else 
{!! Form::text('ar_short_descrip', "", ['class'=>'form-control', 'required']) !!}<br>
@endif
</div>

<div class="col-md-6">
{!! Form::label('إنجليزي') !!}
@if ($similar == 1)
{!! Form::text('en_short_descrip', $product->en_short_descrip, ['class'=>'form-control', 'required']) !!}<br>
@else
{!! Form::text('en_short_descrip', "", ['class'=>'form-control', 'required']) !!}<br>
@endif
</div>
</div>
</div>
<div class="clearfix"></div>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
الوصف الطويل للمنتج
</h1>
</div> 
<div class="panel-body"> 

<div class="col-md-6">
{!! Form::label('عربي') !!}
@if ($similar == 1)
{!! Form::textarea('ar_long_descrip', $product->ar_long_descrip, ['class'=>'form-control']) !!}<br>
@else
{!! Form::textarea('ar_long_descrip', "", ['class'=>'form-control']) !!}<br>
@endif
</div>

<div class="col-md-6">
{!! Form::label('إنجليزي') !!}
@if ($similar == 1)
{!! Form::textarea('en_long_descrip', $product->en_long_descrip, ['class'=>'form-control']) !!}<br>
@else
{!! Form::textarea('en_long_descrip', "", ['class'=>'form-control']) !!}<br>
@endif
</div></div>
</div>





<div class="clearfix"></div>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
{!! Form::label('الأحجام المتوفرة لهذا المنتج') !!}
</h1>
</div> 
<div class="panel-body">                               
<div class="square-blue">
<div id='sizes'></div>
</div>
<div id='sizes_count'></div>
</div>
</div>

<div class="clearfix"></div>


<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
مواصفات المنتج
</h1>
</div> 
<div class="panel-body">
<p>يمكنك عدم كتابة قيمة المواصفة ولن يتم عرضها ضمن مواصفات المنتج</p>                            
<div id='specs'></div>
<div id='specs_count'></div>
</div>
</div>

<div class="clearfix"></div>
<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
ألوان المنتج
</h1>
</div> 
<div class="panel-body">
<select id="color_option" class="form-control" name="color_option">
	<option disabled selected>-- اختيار نوع الألوان --</option>
	<option value="colors">ألوان فقط</option>
	<option value="images">صور ملونة</option>
</select>
<br>

<div id="color_count"></div>

<div id="color_botton_div"></div>
<div id="colors"></div>
</div>
</div>
<div class="clearfix"></div>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
سعر المنتج
</h1>
</div> 
<div class="panel-body">
<div class="col-md-6">
{!! Form::number('price', "", ['step'=>'0.001', 'min'=>0, "class"=>"form-control", 'placeholder'=>"سعر المنتج", 'required']) !!}
</div>
<div class="col-md-6">
{!! Form::text('price_type', "", ['placeholder'=>'مثال: للقطعة الواحدة أو للدستة', "class"=>"form-control", 'required']) !!}<br>
</div>
</div>
</div>

<div class="clearfix"></div>
<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
الكمية المتوفرة
</h1>
</div> 
<div class="panel-body">
{!! Form::number('stock', "", ['class'=>'form-control', 'required']) !!}<br>
<input style="display:inline-block" type="checkbox" id="offers" name="offers" class="js-switch"/>
<h4 style="display:inline-block">تشغيل عروض على الكمية؟</h4>
<div id="offers_div">
</div>
</div>
</div>



<!--
{!! Form::label('العملة') !!}<br>
<select name="currency" class="form-control">
	@foreach($currencies as $currency)
	<option value="{{$currency->id}}">{{$currency->ar_name}}</option>
	@endforeach
</select>
-->


<hr>
<div class="clearfix"></div>
<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
تفاصيل الحمولة:</h1>
</div> 
<div class="panel-body">
<div class="col-md-6">
{!! Form::label('نوع الوحدة بالعربية') !!} <br>
{!! Form::text('ar_unit_type', "", ['class'=>'form-control', 'maxlength'=>'20']) !!} <br>
</div>

<div class="col-md-6">
{!! Form::label('نوع الوحدة بالإنجليزية') !!}<br>
{!! Form::text('en_unit_type', "", ['class'=>'form-control', 'maxlength'=>'20']) !!} <br>
</div>
<div class="col-md-6">
{!! Form::label('وزن الحمولة بالعربية') !!}<br>
{!! Form::text('ar_package_weight', "", ['class'=>'form-control']) !!} <br>
</div>
<div class="col-md-6">
{!! Form::label('وزن الحمولة بلإنجليزية') !!}<br>
{!! Form::text('en_package_weight', "", ['class'=>'form-control']) !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('مقاسات الحمولة بالعربية') !!}<br>
{!! Form::text('ar_package_size', "", ['class'=>'form-control']) !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('مقاسات الحمولة بلإنجليزية') !!}<br>
{!! Form::text('en_package_size', "", ['class'=>'form-control']) !!}<br>
</div>
</div>
</div>


<hr>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
صور المنتج & الفيديز
</h1>
</div> 
<div class="panel-body">
<div class="col-md-3">
<h3>صور المنتج الأساسية</h3>
<input type="hidden" id="images_count" name="images_count" value="">
<div id="product_images"></div><br>
<a class="btn btn-default" id="upload_image">إضافة صورة</a>
</div>
<div class="col-md-3">
<h3>صور المنتج الدعائية</h3>
<input type="hidden" id="comm_images_count" name="comm_images_count" value="">
<div id="comm_images"></div><br>
<a class="btn btn-default" id="comm_upload_image">إضافة صورة</a>
<br><br>
</div>
<div class="col-md-6">
<h3>رابط فيديو للمنتج : برجاء استخدام الآي فريم</h3>
{!! Form::text('video', "", ['class'=>'form-control']) !!}<br>
</div>
</div>
</div>




<div class="clearfix"></div>
{!! Form::submit('إضافة المنتج', ['class'=>'btn btn-primary btn-lg btn-block']) !!}

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

	<!--Script to get the Sizes and Specs when using similar produts-->
	<script type="text/javascript">
		if (<?php echo $similar; ?> == 1) {
			var subcategory_id= $('#subcategory').val();

			//Sizes call ajax
			$.get('/ajax-sizes?subcategory_id=' + subcategory_id, function(data){
			//success data 
				$('#sizes').empty();
				$('#sizes_count').append('<input type="hidden" name="sizes_count" value="'+data.length+'">');
				var i= 1;
				$.each(data, function(index, subcatObj){
					$('#sizes').append('<input name="ar_size'+i+'" type="checkbox" value="'+subcatObj.ar_size+'">&nbsp; '+subcatObj.ar_size+'&nbsp; &nbsp;<input type="hidden" name="en_size'+i+'" value="'+subcatObj.en_size+'"><input type="hidden" name="size_id'+i+'" value="'+subcatObj.id+'">');
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
		}
	</script>
	<!--end of Script-->

	<!--Script for the ajax Sizes & Specs when use the sub-category dropdown menu-->
	<script type="text/javascript">
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
                $.getScript('{!! asset("ar-assets/back-end/js/icheck-init.js") !!}');
					$('#sizes').append('<input name="ar_size'+i+'" type="checkbox" value="'+subcatObj.ar_size+'"> &nbsp; '+subcatObj.ar_size+'&nbsp; &nbsp;<input type="hidden" name="en_size'+i+'" value="'+subcatObj.en_size+'"><input type="hidden" name="size_id'+i+'" value="'+subcatObj.id+'">');
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
					$('#specs').append('<div class="col-md-6"><input type="hidden" name="ar_title'+x+'" value="'+subcatObj.ar_title+'" > <label>'+subcatObj.ar_title+':</label> <input name="ar_detail'+x+'" class="form-control" type="text"> </div><div class="col-md-6"><input type="hidden" name="en_title'+x+'" value="'+subcatObj.en_title+'" > <label>'+subcatObj.en_title+':</label> <input name="en_detail'+x+'" class="form-control" type="text"><br></div> ');
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
					$('#colors').append('<div class="col-md-2"><div data-color-format="rgb" data-color="rgb(255, 146, 180)" class="input-append colorpicker-default color">  <input type="text" readonly="" value="" class="form-control" name="color'+i+'">  <span class=" input-group-btn add-on">  <button class="btn btn-default" type="button" style="padding: 8px">  <i style="background-color: rgb(124, 66, 84);"></i>  </button> </span> </div> </div> ');
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

	<!--Generate Commercial upload images script-->
	<script type="text/javascript">
			var com= 1;
		$('#comm_upload_image').click(function(){
			$('#comm_images').append('<input type="file" name="comm_image'+com+'">');
			$('#comm_images_count').attr("value", com);
			com++;
		});
	</script>

	<!--Generate Price Quantity Offer boxes-->
	<script type="text/javascript">
		$('#offers').change(function(){
		  var count= 1;	
			if(this.checked){
			$('#offers_div').append('<input type="hidden" name="offers_count" id="offers_count" value="'+count+'">');
			
			$('#offers_div').append('<a style="margin-bottom:20px" class="btn btn-primary btn-lg btn-block" href="#offer" id="new_offer">إضافة عرض أخر</a>');
			$('#offers_div').append('<div class="col-md-6">عند شرائك <input type="number" name="offer_qty'+count+'" min="0" class="form-control" required /></div><div class="col-md-6"> فأكثر يكون السعر للواحدة <input type="number" name="offer_price'+count+'" step="0.001" min="0" class="form-control" required />  &nbsp; &nbsp;</div> <div class="clearfix"></div>  ');	
                
			count++;

			$('#new_offer').click(function(){
				if(count < 4){
					$('#offers_div').append('<div class="col-md-6">عند شرائك <input type="number" name="offer_qty'+count+'" min="0" class="form-control" required /></div><div class="col-md-6"> فأكثر يكون السعر للواحدة <input type="number" name="offer_price'+count+'" step="0.001" min="0" class="form-control" required />  &nbsp; &nbsp;</div> <div class="clearfix"></div>');
					$('#offers_count').attr("value", count);
					count++;
				}else{$('#offers_div').append('<h4>لا يمكن إضافة عرض أخر</h4>')}	
			});
						

		}else{
			$('#offers_div').empty();
		}
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

	<!--ios7-->
	<script src='{!! asset("ar-assets/back-end/js/ios-switch/switchery.js") !!}' ></script>
	<script src='{!! asset("ar-assets/back-end/js/ios-switch/ios-init.js") !!}' ></script>

<!--icheck -->
<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/iCheck/jquery.icheck.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/back-end/js/icheck-init.js") !!}'></script>

	
@stop