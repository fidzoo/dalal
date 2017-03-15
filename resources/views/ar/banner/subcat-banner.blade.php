@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>تحديث بنر صفحة الأقسام:</h3><br>

<!--Route: banners, function:Update-->
{!! Form::open(['url'=>'banners/sub-category', 'method'=>'patch', 'files'=>true, 'class'=>'form-group']) !!}

<div class="col-md-6">
{!! Form::label('النسخة العربية:') !!}<br>
{!! Form::image($banner1->ar_image_path, '', ['width'=>300, 'height'=>300])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image1') !!}<br>
<!-- {!! Form::hidden('flag1', '1') !!} -->
{!! Form::hidden('lang1', 'ar') !!}
</div>

<div class="col-md-6">
{!! Form::label('النسخة الإنجليزية:') !!}<br>
{!!Form::image($banner1->en_image_path, '', ['width'=>300, 'height'=>300])!!}<br>
{!! Form::label('رفع صورة جديدة:') !!}<br>
{!! Form::file('image2') !!}<br>
<!-- {!! Form::hidden('flag2', '1') !!} -->
{!! Form::hidden('lang2', 'en') !!}
</div>
<br>
<h4>موقع الإعلان: {{$banner1->position}}</h4>
{!! Form::label('رابط الإعلان:') !!}<br>
{!! Form::text('url1', $banner1->url, ['class'=>'form-control']) !!}<br>



{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}


@stop