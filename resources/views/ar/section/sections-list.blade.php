@extends('ar.layouts.ar-admin-dash')

@section('content')

<section class="panel">
                    <header class="panel-heading">
                        الفئات الرئيسية المتاحة
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان الفئة</th>
                                <th>Section Title</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php $no= 1;?>
@foreach ($sections as $section)
                            <tr>
                                <td>{!!$no; $no++!!}</td>
                                <td>{!!$section->ar_title!!}</td>
                                <td>{!!$section->en_title!!}</td>
                                <td>{!!Form::open(["url"=>"section/$section->id/edit", "method"=>"get"]) !!}
                							{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
                							{!! Form::close() !!}</td>
                                <td>{!! Form::open(["url"=>"section/$section->id", "method"=>"delete"]) !!}
                							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                							{!! Form::close() !!}</td>
                            </tr>
@endforeach                            
                            </tbody>
                        </table>
                    </div>

                </section>

@stop