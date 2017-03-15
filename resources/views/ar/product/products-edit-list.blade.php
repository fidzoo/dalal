@extends('ar.layouts.ar-merchant-dash')

@section('content')

<section class="panel">
                    <header class="panel-heading">
                        المنتجات المتاحة في المتجر
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المنتج</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php $no= 1;?>
@foreach ($products as $product)
                            <tr>
                                <td>{!!$no; $no++!!}</td>
                                <td>{!!$product->ar_title!!}</td>
                                <td>{!!Form::open(["url"=>"product/$product->id/edit", "method"=>"get"]) !!}
                                {!! Form::hidden('store_id', $product->store_id) !!}
                							{!! Form::submit('تعديل', ['class'=>'btn btn-success']) !!}
                							{!! Form::close() !!}</td>
                                <td>{!!Form::open(["url"=>"product-shipping/$product->id/edit", "method"=>"get"]) !!}
                                <!-- {!! Form::hidden('store_id', $product->store_id) !!} -->
                                            {!! Form::submit('تحديث الشحن', ['class'=>'btn btn-info']) !!}
                                            {!! Form::close() !!}</td>
                                <td>{!! Form::open(["url"=>"product/$product->id", "method"=>"delete"]) !!} 
                                {!! Form::hidden('store_id', $product->store_id) !!}
                							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                							{!! Form::close() !!}</td>
                            </tr>
@endforeach                            
                            </tbody>
                        </table>
                    </div>
{!! $products->links() !!}
                </section>




@stop