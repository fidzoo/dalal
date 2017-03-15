@extends('ar.layouts.ar-admin-dash')

@section('content')
	  
<h3>إدراج سؤال جديد</h3>

{!! Form::open(["url"=> "faq", "class"=>"form-group"]) !!}

{!! Form::label('السؤال باللغة العربية') !!}
{!! Form::text('ar_question', '', ['class'=>'form-control']) !!}<br>

{!! Form::label('الجواب باللغة العربية') !!}
{!! Form::textarea('ar_answer', '', ['class'=>'form-control']) !!}<br>

{!! Form::label('السؤال باللغة الإنجليزية') !!}
{!! Form::text('en_question', '', ['class'=>'form-control']) !!}<br>

{!! Form::label('الجواب باللغة الإنجليزية') !!}
{!! Form::textarea('en_answer', '', ['class'=>'form-control']) !!}<br><br>

{!! Form::submit('إنشاء', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
{!! Form::close() !!}

@stop