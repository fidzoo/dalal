@extends('ar.layouts.ar-admin-dash')

@section('content')

<section class="panel">
                        <header class="panel-heading">
                            منتجات في انتظار الموافقة عليها
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
                                    <th>اسم المتجر</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php $no= 1;?>
							@foreach ($products as $product)
                                <tr>
                                    <td>{!!$no; $no++!!}</td>
                                    <td>{!!$product->ar_title!!}</td>
                                    <td>{!!$product->subCategory->ar_title!!}</td>
                                    <td>{!!$product->store->ar_name!!}</td>
                                    <td>{!!Form::open(["url"=>"admin-approve-product/$product->id", "method"=>"get"]) !!}
                							{!! Form::submit('استعراض', ['class'=>'btn btn-success']) !!}
                							{!! Form::close() !!}</td>
                                </tr>
                            @endforeach

                                </tbody>
                            </table>
                        </div>
                        {!! $products->links() !!}
                    </section>

@stop