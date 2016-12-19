@extends('layouts.app')

@section('content')
<style type="text/css">
#myList .div 
{
    display: none;
}
body
{
	direction: rtl;
}
</style>

إضافة منتج جديد
<br>
{!! Form::open(["url"=>"product", "files"=> true,"class"=>"form-group", "id"=>"myList"]) !!}

{!! Form::label('اسم المنتج بالعربية') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('اسم المنتج بالإنجليزية') !!}
{!! Form::text('en_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('السيكشن') !!}<br>
{!! Form::select('section', $sections, null, ['id'=>'section', 'class'=>'form-control']) !!}<br>

{!! Form::label('التصنيف الرئيسي') !!}<br>
{!! Form::select('mcategory', [], null, ['id'=>'mcategory', 'class'=>'form-control']) !!}<br>

{!! Form::label('التصنيف الفرعي') !!}<br>
{!! Form::select('subcategory', [], null, ['id'=>'subcategory', 'class'=>'form-control']) !!}<br>

{!! Form::label('وصف قصير للمنتج بالعربية') !!}
{!! Form::text('ar_short_descrip', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('وصف قصير للمنتج بالإنجليزية') !!}
{!! Form::text('en_short_descrip', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('وصف طويل للمنتج بالعربية') !!}
{!! Form::textarea('ar_long_descrip', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('وصف طويل للمنتج بالإنجليزية') !!}
{!! Form::textarea('en_long_descrip', "", ['class'=>'form-control']) !!}<br>

<h3>مواصفات المنتج</h3>
{!! Form::label('عنوان الوصف') !!}
<br><br>

{!! Form::label('هل المنتج بألوان؟') !!}<br>
{!! Form::checkbox('colors') !!}<br>

{!! Form::label('هل المنتج بأحجام؟') !!}<br>
{!! Form::checkbox('sizes') !!}<br>


{!! Form::label('الكمية المتوفرة') !!}<br>
{!! Form::number('stock', "", ['class'=>'form-control']) !!}<br>


<h3>صور المنتج الدعائية</h3>
{!! Form::label('صورة') !!}
{!! Form::file('image-1') !!}<br>
@for($i=2; $i < 6; $i++)
<div class="div"></div>
{!! Form::label('صورة') !!}
{!! Form::file('image-'.$i) !!}<br>
@endfor
<br>
<div class="col-xs-12 col-md-12 block-center  col-xs-12" id="loadMore">
    <a class="load-more2 btn btn-info center-block"> المزيد</a>
    <br/> <br/>
</div>


{!! Form::submit('إضافة', ['class'=>'btn btn-info']) !!}
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
             console.log(data);   //success data 
                $('#subcategory').empty();
                $.each(data, function(index, subcatObj){

                    $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.ar_title+'</option>');
                });
            });
        });
    </script>
        
    <script>
    //load more script
	$(document).ready(function(){

        size_div = $("#myList .div").size();
            x=1;
            $('#myList .div:lt('+x+')').show();
            $('#loadMore').click(function () {
                x= (x+1 <= size_div) ? x+1 : size_div;
                $('#myList .div:lt('+x+')').show();
            });
            
            if (size_div <= 2) {
                $('#loadMore').show();
            }
            
//      $('#showLess').click(function () {
//              x=(x-5<0) ? 3 : x-5;
//      $('#myList div').not(':lt('+x+')').hide();
//      });
   
	});
</script>
@stop