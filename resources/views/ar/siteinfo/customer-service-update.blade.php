@extends('ar.layouts.ar-admin-dash')
@section('content')
<h3>صفحات قائمة خدمات العملاء</h3><br>
{!! Form::open(['url'=>'customer-service-update', 'method'=>'post', 'files'=>true, 'class'=>'form-group']) !!}

<div class="col-md-6">
	{!! Form::label(' الملاحظات والاقتراحات النسخة العربية:') !!}<br>
	{!! Form::image($suggestions->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '12') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
{!! Form::label('محتوى الاقتراحات:') !!}<br>
{!! Form::textarea('ar_content1', $suggestions->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('الملاحظات والاقتراحات النسخة الإنجليزية:') !!}<br>
	{!!Form::image($suggestions->en_image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '12') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
{!! Form::label('محتوى اقتراحات:') !!}<br>
{!! Form::textarea('en_content2', $suggestions->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}
@stop