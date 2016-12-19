@extends('layouts.app')

@section('content')

<h3>إضافة قسم رئيسي جديد</h3>

{!! Form::open(["url"=> "main-category/$main_category->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]) !!}

{!! Form::label('تفعيل القسم') !!}
{!! Form::select('active',  [0=>"القسم غير مفعّل", 1=>"القسم مفعّل"], $main_category->active, ['class'=>'form-control']) !!}<br>

{!! Form::label('عنوان القسم بالعربية') !!}
{!! Form::text('ar_title', $main_category->ar_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان القسم بالإنجليزية') !!}
{!! Form::text('en_title', $main_category->en_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('السيكشن التابع له') !!}
{!! Form::select('section', $sections, $main_category->section_id, ['class'=>'form-control']) !!}<br>

{!! HTML::image($main_category->image, "", ["width"=>100]) !!}<br><br>
{!! Form::label('أيقونة القسم') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('إضافة') !!}
{!! Form::close() !!}

@stop