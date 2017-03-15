@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>إنشاء فئة رئيسية جديدة</h3>

{!! Form::open(["url"=> "section", "files"=>true, "class"=>"form-group"]) !!}

{!! Form::label('عنوان الفئة الرئيسية بالعربية') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان الفئة الرئيسية بالإنجليزية') !!}
{!! Form::text('en_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('أيقونة الفئة الرئيسية (18 × 20 بيكسل على سبيل المثال)') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('إنشاء', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
{!! Form::close() !!}

@stop