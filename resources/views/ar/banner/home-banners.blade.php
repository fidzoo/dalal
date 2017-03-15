@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>تحديث بنرات الصفحة الرئيسية:</h3><br>

<!--Route: banners, function:Update-->
{!! Form::open(['url'=>'banners/home', 'method'=>'patch', 'files'=>true, 'class'=>'form-group']) !!}

<div class="col-md-6">
{!! Form::label('النسخة العربية:') !!}<br>
{!! Form::image($banner1->ar_image_path, '', ['width'=>150, 'height'=>350])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image1') !!}<br>
{!! Form::hidden('flag1', '1') !!}
{!! Form::hidden('lang1', 'ar') !!}
</div>

<div class="col-md-6">
{!! Form::label('النسخة الإنجليزية:') !!}<br>
{!!Form::image($banner1->en_image_path, '', ['width'=>150, 'height'=>350])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image2') !!}<br>
{!! Form::hidden('flag2', '1') !!}
{!! Form::hidden('lang2', 'en') !!}
</div>
<br>
<h4>موقع الإعلان: {{$banner1->position}}</h4>
{!! Form::label('رابط الإعلان:') !!}<br>
{!! Form::text('url1', $banner1->url, ['class'=>'form-control']) !!}<br>


<hr>
<br>

<div class="col-md-6">
{!! Form::label('النسخة العربية:') !!}<br>
{!!Form::image($banner2->ar_image_path, '', ['width'=>380, 'height'=>120])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image3') !!}<br>
{!! Form::hidden('flag3', '2') !!}
{!! Form::hidden('lang3', 'ar') !!}
</div>

<div class="col-md-6">
{!! Form::label('النسخة الإنجليزية:') !!}<br>
{!!Form::image($banner2->en_image_path, '', ['width'=>380, 'height'=>120])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image4') !!}<br>
{!! Form::hidden('flag4', '2') !!}
{!! Form::hidden('lang4', 'en') !!}
</div>
<br>
<h4>موقع الإعلان: {{$banner2->position}}</h4>
{!! Form::label('رابط الإعلان:') !!}<br>
{!! Form::text('url2', $banner2->url, ['class'=>'form-control']) !!}<br>

<hr>
<br>

<div class="col-md-6">
{!! Form::label('النسخة العربية:') !!}<br>
{!!Form::image($banner3->ar_image_path, '', ['width'=>380, 'height'=>120])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image5') !!}<br>
{!! Form::hidden('flag5', '3') !!}
{!! Form::hidden('lang5', 'ar') !!}
</div>

<div class="col-md-6">
{!! Form::label('النسخة الإنجليزية:') !!}<br>
{!!Form::image($banner3->en_image_path, '', ['width'=>380, 'height'=>120])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image6') !!}<br>
{!! Form::hidden('flag6', '3') !!}
{!! Form::hidden('lang6', 'en') !!}
</div>
<br>
<h4>موقع الإعلان: {{$banner3->position}}</h4>
{!! Form::label('رابط الإعلان:') !!}<br>
{!! Form::text('url3', $banner3->url, ['class'=>'form-control']) !!}<br>


{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}


@stop