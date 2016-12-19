@extends('layouts.app')

@section('content')

<h3>تعديل سيكشن</h3>

{!! Form::open(["url"=> "section/$section->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]) !!}

{!! Form::label('تفعيل القسم') !!}
{!! Form::select('active',  [0=>"القسم غير مفعّل", 1=>"القسم مفعّل"], $section->active, ['class'=>'form-control']) !!}<br>

{!! Form::label('عنوان السيكشن بالعربية') !!}
{!! Form::text('ar_title', $section->ar_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان السيكشن بالإنجليزية') !!}
{!! Form::text('en_title', $section->en_title, ['class'=>'form-control', 'required']) !!}<br>

{!! HTML::image($section->image, "", ["width"=>100]) !!}<br><br>
{!! Form::label('أيقونة السيكشن') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('تحديث') !!}
{!! Form::close() !!}

@stop