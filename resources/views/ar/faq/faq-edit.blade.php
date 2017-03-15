@extends('ar.layouts.ar-admin-dash')

@section('content')
	  
<h3>تحديث السؤال</h3>

{!! Form::open(["url"=> "faq/$faq->id", "method"=>"patch", "class"=>"form-group"]) !!}

{!! Form::label('السؤال باللغة العربية') !!}
{!! Form::text('ar_question', $faq->ar_question, ['class'=>'form-control']) !!}<br>

{!! Form::label('الجواب باللغة العربية') !!}
{!! Form::textarea('ar_answer', $faq->ar_answer, ['class'=>'form-control']) !!}<br>

{!! Form::label('السؤال باللغة الإنجليزية') !!}
{!! Form::text('en_question', $faq->en_question, ['class'=>'form-control']) !!}<br>

{!! Form::label('الجواب باللغة الإنجليزية') !!}
{!! Form::textarea('en_answer', $faq->en_answer, ['class'=>'form-control']) !!}<br>

{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}

@stop