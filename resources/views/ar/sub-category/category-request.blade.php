@extends('ar.layouts.ar-merchant-dash')

@section('content')

<h3>طلب إضافة قسم جديد:</h3>

{!! Form::open(["url"=> "category-request", "class"=>"form-group"]) !!}

{!! Form::label('اسم القسم بالعربية') !!}
{!! Form::text('ar_category', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('اسم القسم بالإنجليزية') !!}
{!! Form::text('en_category', "", ['class'=>'form-control']) !!}<br>

{!! Form::select('type', ["قسم رئيسي"=>"قسم رئيسي", "قسم فرعي"=>"قسم فرعي"], null, ['class'=>'form-control']) !!} <br>

{!! Form::submit('إرسال الطلب', ["class"=>"btn btn-primary btn-block"]) !!}
{!! Form::close() !!}

@stop