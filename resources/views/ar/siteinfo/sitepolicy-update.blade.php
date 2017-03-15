@extends('ar.layouts.ar-admin-dash')
@section('content')
<h3>معلومات معلومات نهايه صفحه</h3><br>
{!! Form::open(['url'=>'sitepolicy-update', 'method'=>'patch', 'files'=>true, 'class'=>'form-group']) !!}
<div class="col-md-6">

	{!! Form::label('معلومات سياسه الاستخدام النسخة العربية:') !!}<br>
	{!! Form::image($privacy_policy->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى سياسه الاستخدام بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $privacy_policy->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('معلومات سياسه الاستخدام النسخة الإنجليزية:') !!}<br>
	{!!Form::image($privacy_policy->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى سياسه الاستخدام بالانجليزى</h4>
{!! Form::label('محتوى سياسه الاستخدام:') !!}<br>
{!! Form::textarea('en_content', $privacy_policy->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">

	{!! Form::label('الاستبدال والاسترجاع للتاجر النسخة العربية:') !!}<br>
	{!! Form::image($replacement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى الاستبدال والاسترجاع بالعربى</h4>
{!! Form::label('محتوى الاستبدال والاسترجاع:') !!}<br>
{!! Form::textarea('ar_content', $replacement->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('الاستبدال والاسترجاع للتاجر النسخة الإنجليزية:') !!}<br>
	{!!Form::image($replacement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى الاستبدال والاسترجاع بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $replacement->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">
	{!! Form::label(' الشحن  النسخة العربية:') !!}<br>
	{!! Form::image($shipping->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى الشحن بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $shipping->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('الشحن  النسخة الإنجليزية:') !!}<br>
	{!!Form::image($shipping->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى الشحن بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $shipping->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}
@stop