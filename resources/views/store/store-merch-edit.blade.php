@extends('layouts.app')

@section('content')
تعديل وتحديث بيانات المتر
<br>
{!! Form::open(["url"=>"store/$store->id", "method"=>"patch", "files"=> true,"class"=>"form-group"]) !!}
{!! Form::label('اسم المتجر بالعربية') !!}
{!! Form::text('ar_name', $store->ar_name, ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('اسم المتجر بالإنجليزية') !!}
{!! Form::text('en_name', $store->en_name, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('وصف قصير بالعربية') !!}
{!! Form::text('ar_description', $store->ar_description, ['class'=>'form-control']) !!}<br>
{!! Form::label('وصف قصير بالإنجليزية') !!}
{!! Form::text('en_description', $store->en_description, ['class'=>'form-control']) !!}<br>

{!! Form::label('تصنيف المتجر') !!}<br>

{!!Form::image($store->ar_logo, "", ["width"=>"100"])!!}
{!! Form::label('شعار المتجر') !!}
{!! Form::file('ar_logo') !!}<br>

{!!Form::image($store->ar_banner, "", ["width"=>"200"])!!}
{!! Form::label('بانر المتجر العربي') !!}
{!! Form::file('ar_banner') !!}<br>

{!!Form::image($store->en_banner, "", ["width"=>"200"])!!}
{!! Form::label('بانر المتجر الإنجليزي') !!}
{!! Form::file('en_banner') !!}<br>

{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop