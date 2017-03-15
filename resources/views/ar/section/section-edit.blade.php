@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>تعديل الفئة الرئيسية:</h3>

{!! Form::open(["url"=> "section/$section->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]) !!}

{!! Form::label('تفعيل الفئة') !!}
{!! Form::select('active',  [0=>"القسم غير مفعّل", 1=>"القسم مفعّل"], $section->active, ['class'=>'form-control']) !!}<br>

{!! Form::label('عنوان الفئة الرئيسية بالعربية') !!}
{!! Form::text('ar_title', $section->ar_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان الفئة الرئيسية بالإنجليزية') !!}
{!! Form::text('en_title', $section->en_title, ['class'=>'form-control', 'required']) !!}<br>

{!! HTML::image($section->image, "", ["width"=>100]) !!}<br><br>
{!! Form::label('أيقونة الفئة الرئيسية (18 × 20 بيكسل على سبيل المثال)') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('تحديث', ["class"=>"btn btn-success btn-block"]) !!}
{!! Form::close() !!}

@stop