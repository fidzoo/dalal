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

{!! Form::label('عنوان الحجم') !!}
{!! Form::text('ar_size2', "", ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('عنوان الحجم') !!}
{!! Form::text('en_size2', "", ['class'=>'form-control', 'required']) !!}<br>


<h4>المواصفات الخاصة بهذا القسم (تفاصيل المنتج)</h4><br>
{!! Form::label('عنوان الوصف بالعربية') !!}
{!! Form::text('ar_title1', "", ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('عنوان الوصف بالإنجليزية') !!}
{!! Form::text('en_title1', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان الوصف بالعربية') !!}
{!! Form::text('ar_title2', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('عنوان الوصف بالإنجليزية') !!}
{!! Form::text('en_title2', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('عنوان الوصف بالعربية') !!}
{!! Form::text('ar_title3', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('عنوان الوصف بالإنجليزية') !!}
{!! Form::text('en_title3', "", ['class'=>'form-control']) !!}<br>


{!! Form::label('أيقونة القسم') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('إضافة') !!}
{!! Form::close() !!}

@stop