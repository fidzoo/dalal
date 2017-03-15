@extends('ar.layouts.ar-merchant-dash')

@section('content')

<h3>البحث عن منتج مماثل لاستخدام تفاصيله</h3>
{!! Form::open(["url"=>"product/create", "method"=>"get", "class"=>"form-group"]) !!}
{!! Form::hidden('store_id', $store_id) !!}

{{Form::label('اسم المنتج')}}
<input type="text" id="search_box" name=""> <a href="#" id="search" class="btn">بحث</a>
<br><br>
{{Form::label('بحث باللغة الإنجليزية')}}
<input type="text" id="en_search_box" name=""> <a href="#" id="en_search" class="btn">بحث</a>
<br>
<div id="results"></div>

<br>
<button name="skip" class="btn btn-success" value="skip">تخطى، لا أريد البحث</button>

{!! Form::close() !!}


<!--Ajax Search Script-->
<script type="text/javascript">
	$('#search').click(function(){
		var input= $('#search_box').val();
		var lang= "ar";
		$('#results').empty();
		//ajax
            $.get('/ajax-search-products?search=' + input +'&lang='+ lang, function(data){
                //success data
                if (data.length != 0){
                $.each(data, function(index, subcatObj){
                    $('#results').append('<strong>مرر الفأرة على المنتج لرؤية المزيد من التفاصيل ثم اضغط على زر المنتج لاستخدام التفاصيل الخاصة به (يمكنك تعديل التفاصيل بحرية من الصفحة التالية)</strong><br> <button name="similar" class="btn btn-info popovers" data-trigger="hover" data-placement="left" data-content="'+subcatObj.ar_short_descrip+'" data-original-title="'+subcatObj.ar_title+'" value="'+subcatObj.id+'">'+subcatObj.ar_title+'</button><br><br>');
                	});
                $.getScript('{!! asset("ar-assets/back-end/js/scripts.js") !!}');
                } 
            	else{$('#results').append('<h2>عذراً لا توجد نتائج مشابهة</h2>');}
            });
	});

	$('#en_search').click(function(){
		var input= $('#en_search_box').val();
		var lang= "en";
		$('#results').empty();
		//ajax
            $.get('/ajax-search-products?search=' + input +'&lang='+ lang, function(data){
                //success data
                if (data.length != 0){
                $.each(data, function(index, subcatObj){
                    $('#results').append('<strong>مرر الفأرة على المنتج لرؤية المزيد من التفاصيل ثم اضغط على زر المنتج لاستخدام التفاصيل الخاصة به (يمكنك تعديل التفاصيل بحرية من الصفحة التالية)</strong><br> <button name="similar" class="btn btn-info popovers" data-trigger="hover" data-placement="left" data-content="'+subcatObj.en_short_descrip+'" data-original-title="'+subcatObj.en_title+'" value="'+subcatObj.id+'">'+subcatObj.en_title+'</button><br><br>');
                	});
                $.getScript('{!! asset("ar-assets/back-end/js/scripts.js") !!}');
            	} 
            	else{$('#results').append('<h2>عذراً لا توجد نتائج مشابهة</h2>');}
            });
	});

</script>


@stop