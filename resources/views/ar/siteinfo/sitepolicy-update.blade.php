@extends('ar.layouts.ar-admin-dash')
@section('content')
<h3>صفحات قائمة سياسة الموقع</h3><br>
{!! Form::open(['url'=>'sitepolicy-update', 'method'=>'post', 'files'=>true, 'class'=>'form-group']) !!}
<div class="col-md-6">

	{!! Form::label('معلومات سياسه الخصوصية النسخة العربية:') !!}<br>
	{!! Form::image($privacy_policy->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '7') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
{!! Form::label('محتوى سياسة الخصوصية:') !!}<br>
{!! Form::textarea('ar_content1', $privacy_policy->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('معلومات سياسه الخصوصية النسخة الإنجليزية:') !!}<br>
	{!!Form::image($privacy_policy->en_image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '7') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
{!! Form::label('محتوى سياسه االخصوصية:') !!}<br>
{!! Form::textarea('en_content2', $privacy_policy->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">

	{!! Form::label('معلومات الاستبدال والاسترجاع النسخة العربية:') !!}<br>
	{!! Form::image($replacement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image3') !!}<br>
	{!! Form::hidden('flag3', '8') !!}
	{!! Form::hidden('lang3', 'ar') !!}

	<br>
{!! Form::label('محتوى الاستبدال والاسترجاع بالعربي:') !!}<br>
{!! Form::textarea('ar_content3', $replacement->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('معلومات الاستبدال والاسترجاع النسخة الإنجليزية:') !!}<br>
	{!!Form::image($replacement->en_image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image4') !!}<br>
	{!! Form::hidden('flag4', '8') !!}
	{!! Form::hidden('lang4', 'en') !!}

<br>
{!! Form::label('محتوى الاستبدال والاسترجاع بالإنجليزي:') !!}<br>
{!! Form::textarea('en_content4', $replacement->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">

	{!! Form::label('الشحن والتوصيل النسخة العربية:') !!}<br>
	{!! Form::image($shipping->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image5') !!}<br>
	{!! Form::hidden('flag5', '9') !!}
	{!! Form::hidden('lang5', 'ar') !!}

	<br>
{!! Form::label('محتوى الشحن والتوصيل بالعربي:') !!}<br>
{!! Form::textarea('ar_content5', $shipping->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('الشحن والتوصيل النسخة الإنجليزية:') !!}<br>
	{!!Form::image($shipping->en_image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image6') !!}<br>
	{!! Form::hidden('flag6', '9') !!}
	{!! Form::hidden('lang6', 'en') !!}

<br>
{!! Form::label('محتوى الشحن والتوصيل بالإنجليزي:') !!}<br>
{!! Form::textarea('en_content6', $shipping->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">
	{!! Form::label(' التوظيف  النسخة العربية:') !!}<br>
	{!! Form::image($recruitment->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image7') !!}<br>
	{!! Form::hidden('flag7', '10') !!}
	{!! Form::hidden('lang7', 'ar') !!}

	<br>
{!! Form::label('محتوى التوظيف العربية:') !!}<br>
{!! Form::textarea('ar_content7', $recruitment->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('التوظيف النسخة الإنجليزية:') !!}<br>
	{!!Form::image($recruitment->en_image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image8') !!}<br>
	{!! Form::hidden('flag8', '10') !!}
	{!! Form::hidden('lang8', 'en') !!}

<br>
{!! Form::label('محتوى التوظيف الإنجليزية:') !!}<br>
{!! Form::textarea('en_content8', $recruitment->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">
	{!! Form::label(' المركز الإعلامي النسخة العربية:') !!}<br>
	{!! Form::image($media->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image9') !!}<br>
	{!! Form::hidden('flag9', '11') !!}
	{!! Form::hidden('lang9', 'ar') !!}

	<br>
{!! Form::label('محتوى المركز الإعلامي العربية:') !!}<br>
{!! Form::textarea('ar_content9', $media->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('المركز الإعلامي النسخة الإنجليزية:') !!}<br>
	{!!Form::image($media->en_image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image10') !!}<br>
	{!! Form::hidden('flag10', '11') !!}
	{!! Form::hidden('lang10', 'en') !!}

<br>
{!! Form::label('محتوى المركز الإعلامي الإنجليزية:') !!}<br>
{!! Form::textarea('en_content10', $media->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}
@stop