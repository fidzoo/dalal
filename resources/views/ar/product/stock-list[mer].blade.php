@extends('ar.layouts.ar-merchant-dash')

@section('content')
<section class="panel">
                        <header class="panel-heading">
                            كمية مخزون المنتجات
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
                                    <th>المخزون</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php $no= 1;?>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{!!$no; $no++!!}</td>
                                    <td>{!!$product->ar_title!!}</td>
                                    <td>{!!$product->subCategory->ar_title!!}</td>
                                    <!--Form open Before the Textbox-->
                                    {!!Form::open(["url"=>"stock-status/$product->id"]) !!}
                                    @if ($product->stock < 5)
                                    <td><input type="text" name="stock" style="color: red;" value="{!!$product->stock!!}"></td>
                                    @else
                                    <td><input type="text" name="stock" style="color: blue;" value="{!!$product->stock!!}"></td>
                                    @endif
                                    <td>{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}</td>
                                            {!! Form::close() !!}
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $products->links() !!}
                    </section>

@stop