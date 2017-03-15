@extends('ar.layouts.ar-admin-dash')
@section('content')
<h3>معلومات معلومات نهايه صفحه</h3><br>
{!! Form::open(['url'=>'customer-service-update', 'method'=>'patch', 'files'=>true, 'class'=>'form-group']) !!}
<div class="col-md-6">

	{!! Form::label('معلومات التوظيف النسخة العربية:') !!}<br>
	{!! Form::image($recruitment->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل التوظيف الاستخدام بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $recruitment->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('معلومات التوظيف النسخة الإنجليزية:') !!}<br>
	{!!Form::image($recruitment->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى التوظيف الاستخدام بالانجليزى</h4>
{!! Form::label('محتوى سياسه الاستخدام:') !!}<br>
{!! Form::textarea('en_content', $recruitment->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">

	{!! Form::label('وسائل الإعلام للتاجر النسخة العربية:') !!}<br>
	{!! Form::image($media->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى وسائل الإعلام بالعربى</h4>
{!! Form::label('محتوى وسائل الإعلام:') !!}<br>
{!! Form::textarea('ar_content', $media->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('وسائل الإعلام للتاجر النسخة الإنجليزية:') !!}<br>
	{!!Form::image($media->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى وسائل الإعلام بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $media->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label(' اقتراحات  النسخة العربية:') !!}<br>
	{!! Form::image($suggestions->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى اقتراحات بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $suggestions->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('اقتراحات  النسخة الإنجليزية:') !!}<br>
	{!!Form::image($suggestions->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى اقتراحات بالانجليزى</h4>
{!! Form::label('محتوى اقتراحات:') !!}<br>
{!! Form::textarea('en_content', $suggestions->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}
@stop