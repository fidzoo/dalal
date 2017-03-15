@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>إضافة بلد جديدة:</h3>

{!! Form::open(["url"=> "country", "files"=>true, "class"=>"form-group"]) !!}

{!! Form::label('اسم البلد بالعربية') !!}
{!! Form::text('ar_name', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('اسم البلد بالإنجليزية') !!}
{!! Form::text('en_name', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('علم البلد') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('إضافة', ["class"=>"btn btn-primary btn-block"]) !!}
{!! Form::close() !!}

@stop