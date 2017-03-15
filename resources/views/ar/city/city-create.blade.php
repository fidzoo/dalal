@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>إضافة مدينة:</h3>

{!! Form::open(["url"=> "city", "class"=>"form-group"]) !!}

{!! Form::label('اختر الدولة') !!}
<select name="country" class="form-control">
	@foreach($countries as $country)
	<option value="{{$country->id}}">{{$country->ar_name}}</option>
	@endforeach
</select>

<br><br>
{!! Form::label('اسم المدينة بالعربية') !!}
{!! Form::text('ar_name', "", ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('اسم المدينة بالإنجليزية') !!}
{!! Form::text('en_name', "", ['class'=>'form-control', 'required']) !!}<br>


{!! Form::submit('إضافة', ["class"=>"btn btn-primary btn-block"]) !!}
{!! Form::close() !!}

@stop