@extends('layouts.ar-admin-dash')

@section('content')
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

<h3>إضافة قسم فرعي جديد</h3>

{!! Form::open(["url"=> "sub-category", "files"=>true, "class"=>"form-group"]) !!}

{!! Form::label('عنوان القسم بالعربية') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان القسم بالإنجليزية') !!}
{!! Form::text('en_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('القسم الرئيسي التابع له') !!}
{!! Form::select('main_cats[]', $main_categories, null, ['multiple' => 'multiple', 'class'=>'form-control', 'required']) !!}<br>

<h4>الأحجام المنتجات الخاصة بهذا القسم</h4><br>
{!! Form::label('عنوان الحجم بالعربية') !!}
{!! Form::text('ar_size1', "", ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('عنوان الحجم بالإنجليزية') !!}
{!! Form::text('en_size1', "", ['class'=>'form-control', 'required']) !!}<br>
<div id="sizes"></div>
<a class="btn btn-default" id="size">إضافة المزيد</a>


<br><br>
<h4>المواصفات الخاصة بهذا القسم (تفاصيل المنتج)</h4><br>
{!! Form::label('عنوان الوصف بالعربية') !!}
{!! Form::text('ar_title1', "", ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('عنوان الوصف بالإنجليزية') !!}
{!! Form::text('en_title1', "", ['class'=>'form-control', 'required']) !!}<br>
<div id="specs"></div> 
<a class="btn btn-default" id="spec">إضافة المزيد</a>

<br><br><br>
{!! Form::label('أيقونة القسم') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('إضافة') !!}
{!! Form::close() !!}

<script>
	//Sizes Add more link
	var i= 2;
		$("#size").click(function(){
			if (i < 8) {
		$("#sizes").append('{!! Form::label("عنوان الحجم بالعربية") !!}<input type="text" name="ar_size'+i+'" class="form-control" required> <br> {!! Form::label("عنوان الوصف بالإنجليزية") !!}<input type="text" name="en_size'+i+'" class="form-control" required><br>');
			i++;
			}
			else{
				alert('لقد وصلت للعدد المسموح به');
				}
		});

	//Specs Add more link
	var x= 2;
		$("#spec").click(function(){
			if (x < 6) {
		$("#specs").append('{!! Form::label("عنوان الوصف بالعربية") !!}<input type="text" name="ar_title'+x+'" class="form-control" required> <br> {!! Form::label("عنوان الحجم بالإنجليزية") !!}<input type="text" name="en_title'+x+'" class="form-control" required><br>');
			x++;
			}
			else{
				alert('لقد وصلت للعدد المسموح به');
				}
		});
</script>
@stop