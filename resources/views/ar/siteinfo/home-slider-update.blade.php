@extends('ar.layouts.ar-admin-dash')

@section('content')


<h3>رفع صور جديدة:</h3>
{!! Form::open(['url'=>'home-slider-edit', 'files'=>true]) !!}
<div class="col-md-6">
{!! Form::label('الصورة العربية:') !!}<br>
{!! Form::file('ar_image1') !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('الصورة الإنجليزية:') !!}<br>
{!! Form::file('en_image1') !!}<br>
</div>
{!! Form::label('الرابط عند الضغط:') !!}<br>
{!! Form::text('url1', '', ['class'=>'form-control']) !!}
<hr>
<div class="col-md-6">
{!! Form::label('الصورة العربية:') !!}<br>
{!! Form::file('ar_image2') !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('الصورة الإنجليزية:') !!}<br>
{!! Form::file('en_image2') !!}<br>
</div>
{!! Form::label('الرابط عند الضغط:') !!}<br>
{!! Form::text('url2', '', ['class'=>'form-control']) !!}
<hr>
<div class="col-md-6">
{!! Form::label('الصورة العربية:') !!}<br>
{!! Form::file('ar_image3') !!}<br>
</div>
<div class="col-md-6">
{!! Form::label('الصورة الإنجليزية:') !!}<br>
{!! Form::file('en_image3') !!}<br>
</div>
{!! Form::label('الرابط عند الضغط:') !!}<br>
{!! Form::text('url3', '', ['class'=>'form-control']) !!}<br>

{!! Form::submit('رفع', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
{!! Form::close() !!}
<br>

<section class="panel">
                    <header class="panel-heading">
                        صور السلايدر
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>الصورة العربية</th>
                                <th>الصورة الإنجليزية</th>
                            </tr>
                            </thead>
                            <tbody>
							
					@foreach ($slider_imgs as $image)
                            <tr>
                                <td>{!!Form::image($image->ar_image_path, '', ['width'=>300, 'height'=>100])!!}</td>
                                <td>{!!Form::image($image->en_image_path, '', ['width'=>300, 'height'=>100])!!}</td>
                                <td>{!! Form::open(["url"=>"home-slider-remove/$image->id", "method"=>"delete"]) !!}
                							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                							{!! Form::close() !!}</td>
                            </tr>
					@endforeach                            
                            </tbody>
                        </table>
                    </div>

                </section>

@stop