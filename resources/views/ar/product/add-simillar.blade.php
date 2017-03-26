@extends('ar.layouts.ar-merchant-dash')

@section('content')

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
البحث عن منتج مماثل لاستخدام تفاصيله
</h1>
</div> 
<div class="panel-body">
<div class="col-md-6">
{!! Form::open(["url"=>"product/create", "method"=>"get", "class"=>"form-group", 'id'=>'product-create']) !!}
{!! Form::hidden('store_id', $store_id) !!}
{{Form::label('اسم المنتج باللغة العربية')}}
<input class="form-control" type="text" id="search_box" name="">
<br>
<a href="#" id="search" class="btn btn-success">إبحث باللغة العربية</a>
</div>
<div class="col-md-6">
{{Form::label('أو إبحث باللغة الإنجليزية')}}
<input class="form-control" type="text" id="en_search_box" name="">
<br>
<a href="#" id="en_search" class="btn btn-success">إبحث باللغة الإنجليزية</a>
</div>

<div class="clearfix"></div>
<br>
<div id="search-instruct" class="col-xs-12">
</div>

</div>
</div>
<style>
    .samiliar-pro {margin:20px auto; border:1px solid #eee; min-height:360px; max-height:auto; padding:20px;}
    .samiliar-pro h4 {text-align:center;}
    .samiliar-pro img {max-width:120px; display:block; text-align:center; margin:0 auto; padding:20px 0;}
    .samiliar-pro button { text-align:center; margin:0 auto; display:block; position:absolute; bottom:20px; right:30px;  }
</style>

<br>

<div class="panel panel-primary">
<div class="panel-heading">
<h1 class="panel-title">
المنتجات المماثلة لبحثك
</h1>
</div> 
<div class="panel-body">
<div id="results">
    
</div>
</div>
</div>

<div class="clearfix"></div>
<br>
<button name="skip" class="btn btn-warning" value="skip">تخطى، لا أريد البحث</button>

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
                    $("#search-instruct").empty();
                    $("#search-instruct").addClass('alert alert-info');
                    $("#search-instruct").append('مرر الفأرة على المنتج لرؤية المزيد من التفاصيل ثم اضغط على زر المنتج لاستخدام التفاصيل الخاصة به (يمكنك تعديل التفاصيل بحرية من الصفحة التالية)');
                $.each(data, function(index, subcatObj){
                    if(subcatObj.product_images.length == 0){
                        image = 'ar-assets/front-end/images/logo.png';
                     }
                    else{
                        image = subcatObj.product_images[0].image_path;
                        }
                    $('#results').append('<div class="col-lg-3 col-md-6 samiliar-pro"><img alt="'+subcatObj.ar_title+'" src="/../'+image+'"><div class="prod-name"><h4>'+subcatObj.ar_title+'</h4></div><button name="similar" class="btn btn-info popovers" data-trigger="hover" data-placement="bottom" data-content="'+subcatObj.ar_short_descrip+'" data-original-title="'+subcatObj.ar_title+'" value="'+subcatObj.id+'" form="product-create">استخدام تفاصيل هذا المنتج</button></div>');
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
                    $("#search-instruct").empty();
                    $("#search-instruct").addClass('alert alert-info');
                    $("#search-instruct").append('مرر الفأرة على المنتج لرؤية المزيد من التفاصيل ثم اضغط على زر المنتج لاستخدام التفاصيل الخاصة به (يمكنك تعديل التفاصيل بحرية من الصفحة التالية)');
                $.each(data, function(index, subcatObj){
                    if(subcatObj.product_images.length == 0){
                        image = 'ar-assets/front-end/images/logo.png';
                     }
                    else{
                        image = subcatObj.product_images[0].image_path;
                        }
                    $('#results').append('<div class="col-lg-3 col-md-6 samiliar-pro"><img alt="'+subcatObj.ar_title+'" src="/../'+image+'"><div class="prod-name"><h4>'+subcatObj.en_title+'</h4></div><button name="similar" class="btn btn-info popovers" data-trigger="hover" data-placement="bottom" data-content="'+subcatObj.en_short_descrip+'" data-original-title="'+subcatObj.en_title+'" value="'+subcatObj.id+'" form="product-create">استخدام تفاصيل هذا المنتج</button></div>');
                	});
                $.getScript('{!! asset("ar-assets/back-end/js/scripts.js") !!}');
            	} 
            	else{$('#results').append('<h2>عذراً لا توجد نتائج مشابهة</h2>');}
            });
	});

</script>


@stop