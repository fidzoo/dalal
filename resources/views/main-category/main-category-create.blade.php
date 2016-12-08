@extends('layouts.app')

@section('content')

<h3>إضافة قسم رئيسي جديد</h3>

{!! Form::open(["url"=> "main-category", "files"=>true, "class"=>"form-group"]) !!}

{!! Form::label('عنوان القسم بالعربية') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان القسم بالإنجليزية') !!}
{!! Form::text('en_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('السيكشن التابع له') !!}
{!! Form::select('section', $sections, null, ['class'=>'form-control']) !!}<br>

{!! Form::label('أيقونة القسم') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('إضافة') !!}
{!! Form::close() !!}

@stop