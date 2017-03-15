@extends('ar.layouts.ar-merchant-dash')

@section('content')
<section class="panel">
                        <header class="panel-heading">
                            حالة منتجاتي
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                        </header>
                        <div class="panel-body">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المنتج</th>
                                    <th>القسم التابع</th>
                                    <th>موافقة الأدمن</th>
                                    <th>المخزون</th>
                                    <th>كمية المبيعات</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php $no= 1;?>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{!!$no; $no++!!}</td>
                                    <td>{!!$product->ar_title!!}</td>
                                    <td>{!!$product->subCategory->ar_title!!}</td>
                                    @if ($product->approve == 0)
                                    <td><span class="label label-warning label-mini">قيد المراجعة</span></td>
                                    @elseif ($product->approve == 1)
                                    <td><span class="label label-success label-mini">تمت الموافقة</span></td>
                                    @elseif ($product->approve == 2)
                                    <td><span class="label label-danger label-mini">تم الرفض</span></td>
                                    @endif
                                    <td>{!!$product->stock!!}</td>
                                    <td>{!!$product->sell!!}</td>
                                    <td>{!!Form::open(["url"=>"product/$product->id/edit", "method"=>"get"]) !!}
                                    {!! Form::hidden('store_id', $product->store_id) !!}
                                            {!! Form::submit('استعراض', ['class'=>'btn btn-success']) !!}
                                            {!! Form::close() !!}</td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

@stop