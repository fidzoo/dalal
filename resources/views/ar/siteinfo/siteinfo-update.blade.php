@extends('ar.layouts.ar-admin-dash')
@section('content')
<h3>قائمة المعلومات</h3><br>
{!! Form::open(['url'=>'siteinfo-update', 'method'=>'post', 'files'=>true, 'class'=>'form-group']) !!}
<div class="col-md-6">

	{!! Form::label('بانر عن دلال النسخة العربية:') !!}<br>
	{!! Form::image($about->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
{!! Form::label('محتوى عن دلال:') !!}<br>
{!! Form::textarea('ar_content1', $about->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('بانر عن دلال النسخة الإنجليزية:') !!}<br>
	{!!Form::image($about->en_image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
{!! Form::label('محتوى عن دلال:') !!}<br>
{!! Form::textarea('en_content2', $about->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">

	{!! Form::label('بانر اتفاقيه الاستخدام للتاجر النسخة العربية:') !!}<br>
	{!! Form::image($merchant_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image3') !!}<br>
	{!! Form::hidden('flag3', '2') !!}
	{!! Form::hidden('lang3', 'ar') !!}

	<br>
{!! Form::label('محتوى اتفاقيه الاستخدام للتاجر النسخة العربية:') !!}<br>
{!! Form::textarea('ar_content3', $merchant_agreement->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('بانر اتفاقيه الاستخدام للتاجر النسخة الإنجليزية:') !!}<br>
	{!!Form::image($merchant_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image4') !!}<br>
	{!! Form::hidden('flag4', '2') !!}
	{!! Form::hidden('lang4', 'en') !!}

<br>
{!! Form::label('محتوى اتفاقيه الاستخدام للتاجر النسخة الإنجليزية:') !!}<br>
{!! Form::textarea('en_content4', $merchant_agreement->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">
	{!! Form::label(' اتفاقيه الاستخدام للمشترى النسخة العربية:') !!}<br>
	{!! Form::image($buyer_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image5') !!}<br>
	{!! Form::hidden('flag5', '3') !!}
	{!! Form::hidden('lang5', 'ar') !!}

	<br>
{!! Form::label('محتوى اتفاقيه الاستخدام للمشترى النسخة العربية:') !!}<br>
{!! Form::textarea('ar_content5', $buyer_agreement->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('اتفاقيه الاستخدام للمشترى  النسخة الإنجليزية:') !!}<br>
	{!!Form::image($buyer_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image6') !!}<br>
	{!! Form::hidden('flag6', '3') !!}
	{!! Form::hidden('lang6', 'en') !!}

<br>
{!! Form::label('محتوى اتفاقيه الاستخدام للمشترى النسخة الإنجليزية:') !!}<br>
{!! Form::textarea('en_content6', $buyer_agreement->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>




<div class="col-md-6">
	{!! Form::label(' كيفيه البيع النسخة العربية:') !!}<br>
	{!! Form::image($sell->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image7') !!}<br>
	{!! Form::hidden('flag7', '4') !!}
	{!! Form::hidden('lang7', 'ar') !!}

	<br>
{!! Form::label('محتوى كيفيه البيع بالعربى:') !!}<br>
{!! Form::textarea('ar_content7', $sell->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label('كيفيه البيع النسخة الإنجليزية:') !!}<br>
	{!!Form::image($sell->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image8') !!}<br>
	{!! Form::hidden('flag8', '4') !!}
	{!! Form::hidden('lang8', 'en') !!}

<br>
{!! Form::label('محتوى كيفيه البيع بالإنجليزية:') !!}<br>
{!! Form::textarea('en_content8', $sell->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>




<div class="col-md-6">
	{!! Form::label(' كيفيه الشراء النسخة العربية:') !!}<br>
	{!! Form::image($buy->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image9') !!}<br>
	{!! Form::hidden('flag9', '5') !!}
	{!! Form::hidden('lang9', 'ar') !!}

	<br>
{!! Form::label('محتوى كيفيه الشراء بالعربى:') !!}<br>
{!! Form::textarea('ar_content9', $buy->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label('كيفيه الشراء النسخة الإنجليزية:') !!}<br>
	{!!Form::image($buy->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image10') !!}<br>
	{!! Form::hidden('flag10', '5') !!}
	{!! Form::hidden('lang10', 'en') !!}

<br>
{!! Form::label('محتوى كيفيه الشراء بالانجليزى:') !!}<br>
{!! Form::textarea('en_content10', $buy->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label(' طرق الدفع النسخة العربية:') !!}<br>
	{!! Form::image($payment_methods->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image11') !!}<br>
	{!! Form::hidden('flag11', '6') !!}
	{!! Form::hidden('lang11', 'ar') !!}

	<br>
{!! Form::label('محتوى طرق الدفع بالعربى:') !!}<br>
{!! Form::textarea('ar_content11', $payment_methods->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label('طرق الدفع النسخة الإنجليزية:') !!}<br>
	{!!Form::image($payment_methods->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع طرق الدفع:') !!}<br>
	{!! Form::file('image12') !!}<br>
	{!! Form::hidden('flag12', '6') !!}
	{!! Form::hidden('lang12', 'en') !!}

<br>
{!! Form::label('محتوى طرق الدفع بالإنجليزية:') !!}<br>
{!! Form::textarea('en_content12', $payment_methods->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>


{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}
@stop