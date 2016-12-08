@extends('layouts.app')

@section('content')

<h3>إضافة سيكشن جديد</h3>

{!! Form::open(["url"=> "section", "files"=>true, "class"=>"form-group"]) !!}

{!! Form::label('عنوان السيكشن بالعربية') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان السيكشن بالإنجليزية') !!}
{!! Form::text('en_title', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('أيقونة السيكشن') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('إضافة') !!}
{!! Form::close() !!}

@stop