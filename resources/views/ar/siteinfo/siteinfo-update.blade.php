@extends('ar.layouts.ar-admin-dash')
@section('content')
<h3>معلومات معلومات نهايه صفحه</h3><br>
{!! Form::open(['url'=>'siteinfo-update', 'method'=>'patch', 'files'=>true, 'class'=>'form-group']) !!}
<div class="col-md-6">

	{!! Form::label('معلومات من نحن النسخة العربية:') !!}<br>
	{!! Form::image($about->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى من نحن بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $about->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('معلومات من نحن النسخة الإنجليزية:') !!}<br>
	{!!Form::image($about->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى من نحن بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $about->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">

	{!! Form::label('اتفاقيه الاستخدام للتاجر النسخة العربية:') !!}<br>
	{!! Form::image($merchant_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى من نحن بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $merchant_agreement->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('اتفاقيه الاستخدام للتاجر النسخة الإنجليزية:') !!}<br>
	{!!Form::image($merchant_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى من نحن بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $merchant_agreement->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>

<div class="col-md-6">
	{!! Form::label(' اتفاقيه الاستخدام للمشترى النسخة العربية:') !!}<br>
	{!! Form::image($buyer_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى من نحن بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $buyer_agreement->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>
<div class="col-md-6">
	{!! Form::label('اتفاقيه الاستخدام للمشترى  النسخة الإنجليزية:') !!}<br>
	{!!Form::image($buyer_agreement->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى من نحن بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $buyer_agreement->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>




<div class="col-md-6">
	{!! Form::label(' كيفيه الشراء النسخة العربية:') !!}<br>
	{!! Form::image($sell->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى كيفيه الشراء بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $sell->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label('كيفيه الشراء  النسخة الإنجليزية:') !!}<br>
	{!!Form::image($sell->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى كيفيه الشراء بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $sell->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>




<div class="col-md-6">
	{!! Form::label(' كيفيه البيع النسخة العربية:') !!}<br>
	{!! Form::image($buy->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى كيفيه البيع بالعربى</h4>
{!! Form::label('محتوى البيع:') !!}<br>
{!! Form::textarea('ar_content', $buy->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label('كيفيه البيع  النسخة الإنجليزية:') !!}<br>
	{!!Form::image($buy->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى كيفيه البيع بالانجليزى</h4>
{!! Form::label('محتوى البيع:') !!}<br>
{!! Form::textarea('en_content', $buy->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label(' طرق الدفع البيع النسخة العربية:') !!}<br>
	{!! Form::image($payment_methods->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع صورة جديدة:') !!}<br>
	{!! Form::file('image1') !!}<br>
	{!! Form::hidden('flag1', '1') !!}
	{!! Form::hidden('lang1', 'ar') !!}

	<br>
<h4>تعديل محتوى طرق الدفع الشراء بالعربى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('ar_content', $payment_methods->ar_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>



<div class="col-md-6">
	{!! Form::label('كيفيه طرق الدفع  النسخة الإنجليزية:') !!}<br>
	{!!Form::image($payment_methods->image, '', ['width'=>380, 'height'=>120])!!}<br>
	{!! Form::label('رفع طرق الدفع:') !!}<br>
	{!! Form::file('image2') !!}<br>
	{!! Form::hidden('flag2', '1') !!}
	{!! Form::hidden('lang2', 'en') !!}

<br>
<h4>تعديل محتوى طرق الدفع بالانجليزى</h4>
{!! Form::label('محتوى من نحن:') !!}<br>
{!! Form::textarea('en_content', $payment_methods->en_content, ['class'=>'form-control']) !!}<br>
<hr>
<br>
</div>


{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}
@stop