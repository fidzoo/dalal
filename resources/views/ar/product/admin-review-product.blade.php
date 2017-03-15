@extends('ar.layouts.ar-admin-dash')

@section('content')
<!--pickers css-->
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-datepicker/css/datepicker-custom.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-timepicker/css/timepicker.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-colorpicker/css/colorpicker.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-daterangepicker/daterangepicker-bs3.css") !!}' />
  <link rel="stylesheet" type="text/css" href='{!! URL::to("ar-assets/back-end/js/bootstrap-datetimepicker/css/datetimepicker-custom.css") !!}' />


<h3> معلومات عن صاحب المنتج: </h3>
<?php $store_id= $product->store->id; ?>
<strong>المتجر:</strong> <a href='{!! URL::to("store/$store_id") !!}'>{!! $product->store->ar_name !!} </a><br>
<strong>صاحب المتجر:</strong> {!! $product->store->user->name !!} 

<h3> تفاصيل المنتج </h3>
<br>

{!! Form::open(["url"=>"product/$product->id", "method"=>"patch", "files"=> true, "class"=>"form-group", "id"=>"myList"]) !!}

{!! Form::hidden('request_type', 'admin_approve') !!}

{!! Form::label('اسم المنتج بالعربية') !!}

{!! Form::text('ar_title', $product->ar_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('اسم المنتج بالإنجليزية') !!}

{!! Form::text('en_title', $product->en_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('السيكشن') !!}<br>
{!! Form::select('section', $sections, $selected_sub->mainCategories[0]->section->id, ['id'=>'section', 'class'=>'form-control']) !!}

<br>

{!! Form::label('التصنيف الرئيسي') !!}<br>

{!! Form::select('mcategory', $main_categories, $selected_sub->mainCategories[0]->id, ['id'=>'mcategory', 'class'=>'form-control']) !!}<br>


{!! Form::label('التصنيف الفرعي') !!}<br>

{!! Form::select('subcategory', $sub_categories, $product->sub_category_id, ['id'=>'subcategory', 'class'=>'form-control']) !!}<br>


{!! Form::label('وصف قصير للمنتج بالعربية') !!}

{!! Form::text('ar_short_descrip', $product->ar_short_descrip, ['class'=>'form-control']) !!}<br>


{!! Form::label('وصف قصير للمنتج بالإنجليزية') !!}
{!! Form::text('en_short_descrip', $product->en_short_descrip, ['class'=>'form-control']) !!}<br>


{!! Form::label('وصف طويل للمنتج بالعربية') !!}

{!! Form::textarea('ar_long_descrip', $product->ar_long_descrip, ['class'=>'form-control']) !!}<br>

{!! Form::label('وصف طويل للمنتج بالإنجليزية') !!}

{!! Form::textarea('en_long_descrip', $product->en_long_descrip, ['class'=>'form-control']) !!}<br>


{!! Form::label('الأحجام المتوفرة لهذا المنتج') !!}<br>
<div id='sizes'>
	<?php $i= 1; ?>
	@foreach($all_sizes as $all_size)
	<!--Check the selected saved sizes-->
		@if(in_array($all_size->ar_size, $selected_sizes))
		<input name="ar_size{{$i}}" type="checkbox" value="{{$all_size->ar_size}}" checked=""> &nbsp; {{$all_size->ar_size}} &nbsp; &nbsp; <input type="hidden" name="en_size{{$i}}" value="{{$all_size->en_size}}">
		@else
		<input name="ar_size{{$i}}" type="checkbox" value="{{$all_size->ar_size}}"> &nbsp; {{$all_size->ar_size}} &nbsp; &nbsp; <input type="hidden" name="en_size{{$i}}" value="{{$all_size->en_size}}">
		@endif
	<?php $i++; ?>
	@endforeach
	<input type="hidden" name="sizes_count" value="{{$i-1}}">
</div>
<div id='sizes_count'></div>
<br>


<h3>مواصفات المنتج</h3>
{!! Form::label('يمكنك عدم كتابة قيمة المواصفة ولن يتم عرضها ضمن مواصفات المنتج') !!}
<div id='specs'>
	<?php $s= 1; ?>
	@foreach($all_specs as $all_spec)
		<?php $print= 0; ?>
			@foreach($used_specs as $used)
				@if($used->ar_title == $all_spec->ar_title || $used->en_title == $all_spec->en_title)
					<input type="hidden" name="ar_title{{$s}}" value="{{ $all_spec->ar_title }}" >
					<label>{{ $all_spec->ar_title }}:</label>
					<input name="ar_detail{{$s}}" type="text" value="{{$used->ar_detail}}"> <br>

					<input type="hidden" name="en_title{{$s}}" value="{{ $all_spec->en_title }}" >
					<label>{{ $all_spec->en_title }}:</label> 
					<input name="en_detail{{$s}}" type="text" value="{{$used->en_detail}}"> <br>
					<?php $print= 1; ?> 
				@endif	
			@endforeach
		@if($print != 1)
			<input type="hidden" name="ar_title{{$s}}" value="{{ $all_spec->ar_title }}" >
			<label>{{ $all_spec->ar_title }}:</label>
			<input name="ar_detail{{$s}}" type="text"> <br>

			<input type="hidden" name="en_title{{$s}}" value="{{ $all_spec->en_title }}" >
			<label>{{ $all_spec->en_title }}:</label> 
			<input name="en_detail{{$s}}" type="text"> <br>
		@endif
	<?php $s++; ?>
	@endforeach
</div>
<div id='specs_count'>
	<input type="hidden" name="specs_count" value="{{$s-1}}">
</div>
<br>


{!! Form::label('ألوان المنتج') !!}<br>
<select id="color_option" class="form-control" name="color_option">
	<option disabled selected>-- اختيار نوع الألوان --</option>
	@if ($product->colors_type == 'colors')
	<option value="colors" selected="">ألوان فقط</option>
	<option value="images">صور ملونة</option>
	@elseif ($product->colors_type == 'images')
	<option value="colors">ألوان فقط</option>
	<option value="images"  selected="">صور ملونة</option>
	@endif
</select>
<br>

<div id="color_count"></div>

<div id="color_botton_div">
	
</div>
<div id="colors">
<!--If solid colors-->
	@if ($product->colors_type == 'colors')
	<a class="btn btn-default" id="add_more_color">إضافة لون جديد</a>
	<?php $c= 1; ?>
	@foreach($selected_colors as $color)
		<div id="exist_color{{$color->id}}" style="direction: ltr;" class="col-md-4 col-xs-11">  
			<div data-color-format="rgb" data-color="{{$color->color}}" class="input-append colorpicker-default color">  <input type="text" readonly="" value="{{$color->color}}" class="form-control" name="color{{$c}}">  <span class=" input-group-btn add-on">  
			<button class="btn btn-default" type="button" style="padding: 8px">  <i style="background-color: rgb(124, 66, 84);"></i>  </button> </span> 
			</div> 
		
		<!--IMPORTANT!! I use this href with jquery, DON'T DELETE OR CHANGE-->
		<a href="#color" id="co_delete{{$color->id}}" class="delete-modal" data-id="{{$color->id}}" data-name="color" style="color: black;">&#10006;</a><br>

		</div> <br>
	  <?php $c++; ?>
	@endforeach
		<input type="hidden" id="colors_count" name="colors_count" value="{{$c-1}}">
	@else
<!--If Color Images-->
	
		<a class="btn btn-default" id="more_color_imgs">رفع المزيد من الصور</a><br>
		@foreach($selected_colors as $color)
		{!! Form::image($color->image_path, 'c_image'.$color->id, ['id'=>'c_image'.$color->id, 'width'=>50, 'height'=>50]) !!} 
		
		<!--IMPORTANT!! I use this href with jquery, DON'T DELETE OR CHANGE-->
		<a href="#color-image" id="x_delete{{$color->id}}" class="delete-modal" data-id="{{$color->id}}" data-name="image-color" style="color: black;">&#10006;</a><br>
	
	
		@endforeach
		<input type="hidden" id="colors_count" name="colors_count" value="">
	@endif
</div>

<!-- Modal color images Delete Popup Box -->
<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<div class="deleteContent">
						هل متأكد أنك تريد الحذف ؟ 
						<span class="hidden did"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger delete" data-dismiss="modal">
							حذف
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							إغلاق
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--End of Modal-->
<br>


{!! Form::label('الكمية المتوفرة') !!}<br>
{!! Form::number('stock', $product->stock, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('السعر') !!}<br>
{!! Form::number('price', $product->price, ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('العملة') !!}<br>
{!! Form::select('currency', ['SAR'=>'ريال سعودي', 'USD'=>'دولار أمركي'], $product->currency, ['class'=>'form-control']) !!}<br>



<h3>صور المنتج الدعائية</h3>
<input type="hidden" id="images_count" name="images_count" value="">
<div id="product_images"></div><br>
<a class="btn btn-default" id="upload_image">إضافة صورة أخرى</a> <br><br>
	@foreach($product_images as $img)
		{!! Form::image($img->image_path, 'img'.$img->id, ['id'=>'img'.$img->id, 'width'=>100, 'height'=>100]) !!} 
		
		<a href="#prod-image" id="i_delete{{$img->id}}" class="delete-modal" data-id="{{$img->id}}" data-name="pro-image" style="color: black;">&#10006;</a><br>
	
	@endforeach


<br><br>

<button type="submit" name="review" value="accept" class="btn btn-success">موافقة على المنتج</button>
<button type="submit" name="review" value="reject" class="btn btn-danger">رفض المنتج</button>

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

	<!--add More colors to the existing colors-->
	<script type="text/javascript">
		var i= $('#colors_count').val();
		i++;
				$('#add_more_color').click(function(){
					$('#colors').append('<div style="direction: ltr;" class="col-md-4 col-xs-11">  <div data-color-format="rgb" data-color="rgb(255, 146, 180)" class="input-append colorpicker-default color">  <input type="text" readonly="" value="" class="form-control" name="color'+i+'">  <span class=" input-group-btn add-on">  <button class="btn btn-default" type="button" style="padding: 8px">  <i style="background-color: rgb(124, 66, 84);"></i>  </button> </span> </div> </div> <br> ');
					//run Color picker script     
					$.getScript('{!! asset("ar-assets/back-end/js/pickers-init.js") !!}');
					//chage the count value
					$('#colors_count').attr("value", i);
					i++;
				});
	</script>
	<!--end of script-->

	<!--upload more images to the existing color images-->
	<script type="text/javascript">
		var x= $('#colors_count').val();
		x++;
				$('#more_color_imgs').click(function(){
					$('#colors').append('<input type="file" name="color_image'+x+'">');
					//chage the count value
					$('#colors_count').attr("value", x);
					x++;
				});
	</script>
	<!--end of script-->

	<!--Colors dropdown script to generate color pickers-->
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
			//colors images upload
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

	<!--Modal popup delete box-->
	<!--Modal scrtipt edited by me--> 
	<script type="text/javascript">
		var link;
		$(document).on('click', '.delete-modal', function() {
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('#myModal').modal('show');
    	link= $(this).attr('href');
    		});

	
		//Delete ajax script
	    $('.modal-footer').on('click', '.delete', function() {
	    	//check wich X link is used to redirect to the suitable url
			if (link == '#color-image') {
		        $.ajax({
		            type: 'post',
		            url: '/deleteColorImage',
		            data: {
		                '_token': $('input[name=_token]').val(),
		                'id': $('.did').text()
		            },
		            success: function(data) {
		                $('#c_image' + $('.did').text()).remove();
		                $('#x_delete' + $('.did').text()).remove();
		            }
		        });
	   
			}
			else if(link == '#prod-image'){
				$.ajax({
		            type: 'post',
		            url: '/deleteProductImage',
		            data: {
		                '_token': $('input[name=_token]').val(),
		                'id': $('.did').text()
		            },
		            success: function(data) {
		                $('#img' + $('.did').text()).remove();
		                $('#i_delete' + $('.did').text()).remove();
		            }
		        });
	 		}
	 		else if(link == '#color'){
				$.ajax({
		            type: 'post',
		            url: '/deleteProdColor',
		            data: {
		                '_token': $('input[name=_token]').val(),
		                'id': $('.did').text()
		            },
		            success: function(data) {
		                $('#exist_color' + $('.did').text()).remove();
		                //$('#i_delete' + $('.did').text()).remove();
		            }
		        });
	 		}
	    });
	
	</script>
	<!--End of script-->	

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