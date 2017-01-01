@extends('layouts.ar-admin-dash')

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
<h3>قائمة بالمتاجر المتاحة</h3> 
<div class="wrapper">
    <div class="row">
    		@foreach ($stores as $store)
            <div class="col-md-3">
                    <div class="panel widget-info-one">
                        <div class="avatar-img">
                            <a href='{!! URL::to("add-similar/$store->id") !!}'><img class="img-responsive" src='{!! asset("$store->ar_logo") !!}' alt=""></a>
                        </div>
                        <div class="inner2">
                            
                             <a href='{!! URL::to("add-similar/$store->id") !!}'><h5>{{$store->ar_name}}</h5></a>
                            
                        </div>
                    </div>
            </div>
            @endforeach
	</div>
</div>


@stop