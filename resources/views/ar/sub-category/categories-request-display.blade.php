@extends('ar.layouts.ar-admin-dash')

@section('content')

<section class="panel">
                    <header class="panel-heading">
                        طلبات الأقسام المتاحة
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان القسم بالعربية</th>
                                <th>عنوان القسم بالإنجليزية</th>
                                <th>نوع القسم</th>
                                <th>تاريخ الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php $no= 1;?>
@foreach ($cats_requests as $category)
                            <tr>
                                <td>{!!$no; $no++!!}</td>
                                <td>{!!$category->ar_category!!}</td>
                                <td>{!!$category->en_category!!}</td>
                                <td>{!!$category->type!!}</td>
                                <td>{!!$category->created_at!!}</td>
                                <td>{!! Form::open(["url"=>"categories-request/$category->id", "method"=>"delete"]) !!}
                							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                							{!! Form::close() !!}</td>
                            </tr>
@endforeach                            
                            </tbody>
                        </table>
                    </div>

                </section>



@stop