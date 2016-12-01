@extends('layouts.app')

@section('content')
إضافة متجر جديد
<br>
{!! Form::open(["url"=>"store", "files"=> true,"class"=>"form-group"]) !!}
{!! Form::label('اسم المتجر بالعربية') !!}
{!! Form::text('ar_name', "", ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('اسم المتجر بالإنجليزية') !!}
{!! Form::text('en_name', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('وصف قصير بالعربية') !!}
{!! Form::text('ar_description', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('وصف قصير بالإنجليزية') !!}
{!! Form::text('en_description', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('تصنيف المتجر') !!}<br>

{!! Form::label('شعار المتجر') !!}
{!! Form::file('ar_logo') !!}<br>

{!! Form::label('بانر المتجر العربي') !!}
{!! Form::file('ar_banner') !!}<br>

{!! Form::label('بانر المتجر الإنجليزي') !!}
{!! Form::file('en_banner') !!}<br>

{!! Form::submit('إضافة', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop