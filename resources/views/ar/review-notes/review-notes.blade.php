@extends('ar.layouts.ar-merchant-dash')

@section('content')

<h3>مراجعات الإدارة:</h3>


<div class="panel-group " id="accordion">
	<?php $no= 1; ?>
	@foreach($review_notes as $review)
		<div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$no}}">
                        اسم المتجر: <strong>{{$review->ar_name}}</strong> <br><br>
                        عنوان المنتج: <strong>{{$review->ar_title}}</strong>
                    </a>
                </h4>
            </div>
            <div id="collapse{{$no}}" class="panel-collapse collapse">
                <div class="panel-body">
                
                   <p>{{$review->notes}}</p>
                
                </div>
            </div>
        </div>
      <?php $no++ ?>	
	@endforeach
</div>


@stop