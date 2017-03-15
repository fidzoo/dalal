@extends('ar.layouts.ar-main-layout') @section('content')
<div class="page-top">
    <div class="container" id="columns">

        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-12">
            
            	<div class="breadcrumb clearfix">
                        <a>أنت تتصفح : </a>
                        <span class="navigation-pipe">&nbsp;</span>
                         <a class="home" href='{!! URL::to("/") !!}' title="الرئيسية">دلال مول</a>
                        <span class="navigation-pipe">&nbsp;</span>
                        <a href="#" title="Return to Home">تفاصيل الشحن</a>
                        
                    </div>
                
            </div>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12 text-right" id="center_column">
                <!-- Content page -->
                <div class="content-text clearfix">
                    <!-- page heading-->
                    <h2 class="page-heading2">
                        <span class="page-heading-title2">برجاء قم بإدخال بيانات الشحن الخاصة بك:</span>
                    </h2>
                    
                    {!! Form::open(['url'=>'payment']) !!}
                    <div class="row">
	                    <div class="col-sm-6">
							<input type="email" name="email" placeholder="البريد الإلكتروني" class="form-control" value="{{$data ? $user_data->email : '' }}" maxlength="50" required>
						</div>
	                    <div class="col-sm-6">
							<input type="text" name="person-name" placeholder="اسم المستلم" class="form-control" value="{{$data ? $user_data->full_name : '' }}" maxlength="100" required>
						</div>
						</div>
					<br>
					<div class="row">
					<div class="col-sm-10">
					<input type="text" name="tel-number" class="form-control" maxlength="25" value="{{$data ? $user_data->tel_number : '' }}" placeholder="رقم الهاتف">
					<br>
					</div>
					<div class="col-sm-2">
					<input type="text" name="tel-code" placeholder="مفتاح البلد" class="form-control" maxlength="10" value="{{$data ? $user_data->tel_code: '' }}" placeholder="المفتاح">
					</div>
					
					</div>
					<h4>العنوان الذي سيتم الشحن إليه</h4>
					<div class="row">
	                <div class="col-sm-6">					
						<input type="text" name="address" placeholder="العنوان كاملاً" class="form-control" value="{{$data ? $user_data->address : '' }}" maxlength="150" required>
					</div>
					<div class="col-sm-6">
					@if($data == 1)
					<select name="countries" id="countries" class="form-control" required>
                    <option selected disabled>إختر البلد</option>
                    @foreach($countries as $country)
                    	@if($user_data->country_id == $country->id)
                    	<option value="{{$country->id}}" selected>{{$country->ar_name}}</option>
                    	@else
                    	<option value="{{$country->id}}">{{$country->ar_name}}</option>
                    	@endif
                    @endforeach
                	</select>
                	@else
                	<select name="countries" id="countries" class="form-control" required>
                    <option selected disabled>إختر البلد</option>
                    @foreach($countries as $country)
                    	
                    	<option value="{{$country->id}}">{{$country->ar_name}}</option>
                    	
                    @endforeach
                	</select>
                	@endif
					</div>
                	</div>
                	<div class="row" style="margin-top: 15px">
                	<div class="col-sm-6">
					<input type="text" name="zip" placeholder="العنوان البريدي" class="form-control" maxlength="10" value="{{$data ? $user_data->zip : '' }}" required>
					</div>
					<div class="col-sm-6">
					@if($data == 1)
						<select name="cities" id="cities" class="form-control" required>
	                    @foreach($cities as $city)
		                    @if($user_data->city_id == $city->id)
		                    	<option value="{{$city->id}}" selected>{{$city->ar_name}}</option>
		                    @endif
		                @endforeach
		                </select>
	                	
                	@else
	                	<select name="cities" id="cities" class="form-control" required>
	                    <option selected disabled>إختر المدينة</option>
	                	</select>
                	@endif
                	</div>
					</div>
					<br>
					<div class="col-sm-12 save" style="margin-bottom: 15px;">
						<input type="checkbox" name="save-data" value="1">
						<div>
							حفظ البيانات للاستخدام فيما بعد 
						</div>
					</div>
					<div class="col-sm-12">
					<button class="button style-7" type="submit">متابعة</button>
					</div>
					{!! Form::close() !!}


                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->

        </div>
        <!-- ./row-->
    </div>
</div>


<script type="text/javascript">
	//script for the ajax cities menu:
    $('#countries').on('change', function (e) {
        //console.log(e);
        var country_id = e.target.value;

        //ajax
        $.get('/ajax-storecity?country_id=' + country_id, function (data) {
            //success data
            $('#cities').empty();
            $('#cities').append('<option selected disabled>إختر المدينة</option>');
            $.each(data, function (index, subcatObj) {

                $('#cities').append('<option value="' + subcatObj.id + '">' + subcatObj.ar_name + '</option>');
            });
        });
    });	
</script>


@stop