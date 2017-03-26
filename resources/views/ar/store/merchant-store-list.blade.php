@extends('ar.layouts.ar-merchant-dash')

@section('content')
<style type="text/css">
	.widget-info-one .inner2
	{
		min-height: 1px;
    	padding: 5px;
    	position: relative;
    	text-align: center;
	}
</style>

<div class="panel panel-primary">

<div class="panel-heading">
<h1 class="panel-title">
اختر المتجر المراد استخدامه
</h1>
</div> 
<div class="panel-body">
<div class="wrapper">
    <div class="row">
    		@foreach ($stores as $store)
            <div class="col-md-3">
                    <div class="panel widget-info-one">
                        <div class="avatar-img">
                        @if ($usage == 'product-create')
                            <a href='{!! URL::to("add-similar/$store->id") !!}'>
                        @elseif ($usage == 'product-edit')
                            <a href='{!! URL::to("products-edit-list/$store->id") !!}'>
                        @elseif ($usage == 'products-status')
                            <a href='{!! URL::to("my-products-status/$store->id") !!}'>
                        @elseif ($usage == 'stock')
                            <a href='{!! URL::to("stock-status/$store->id") !!}'>
                        @endif
                            <img class="img-responsive" src='{!! asset("$store->ar_logo") !!}' alt=""></a>
                        </div>
                        <div class="inner2">
                        @if ($usage == 'product-create')    
                             <a href='{!! URL::to("add-similar/$store->id") !!}'><h5>
                        @elseif ($usage == 'product-edit')
                             <a href='{!! URL::to("products-edit-list/$store->id") !!}'><h5>
                        @elseif ($usage == 'products-status')
                             <a href='{!! URL::to("my-products-status/$store->id") !!}'><h5>
                        @elseif ($usage == 'stock')
                            <a href='{!! URL::to("stock-status/$store->id") !!}'>
                        @endif
                        {{$store->ar_name}}</h5></a>
                            
                        </div>
                    </div>
            </div>
            @endforeach
	</div>
</div>
</div>
</div>

@stop