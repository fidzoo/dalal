@extends('ar.layouts.ar-admin-dash')

@section('content')

<section class="panel">
                    <header class="panel-heading">
                        الأقسام الرئيسية المتاحة
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان القسم الرئيسي</th>
                                <th>Main Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php $no= 1;?>
@foreach ($main_cats as $category)
                            <tr>
                                <td>{!!$no; $no++!!}</td>
                                <td>{!!$category->ar_title!!}</td>
                                <td>{!!$category->en_title!!}</td>
                                <td>{!!Form::open(["url"=>"main-category/$category->id/edit", "method"=>"get"]) !!}
                							{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
                							{!! Form::close() !!}</td>
                                <td>{!! Form::open(["url"=>"main-category/$category->id", "method"=>"delete"]) !!}
                							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                							{!! Form::close() !!}</td>
                            </tr>
@endforeach                            
                            </tbody>
                        </table>
                    </div>

                </section>

@stop