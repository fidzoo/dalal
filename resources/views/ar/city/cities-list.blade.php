@extends('ar.layouts.ar-admin-dash')

@section('content')

<section class="panel">
            <header class="panel-heading">
                امدن المتاحة
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                     </span>
            </header>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>                        
                    	<th>المدينة بالعربية</th>
                        <th>المدينة بالإنجليزية</th>
                        <th>الدولة</th>
                    </tr>
                    </thead>
                    <tbody>
@foreach ($cities as $city)
            <tr>
            {!!Form::open(["url"=>"city/$city->id", "method"=>"patch"]) !!}
                <td>{!! Form::text('ar_name', $city->ar_name) !!}</td>
                <td>{!! Form::text('en_name', $city->en_name) !!}</td>
                <td>{!! Form::select('country', $countries, $city->country_id) !!}</td>
                <td>		{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
							{!! Form::close() !!}</td>
                <td>{!! Form::open(["url"=>"city/$city->id", "method"=>"delete"]) !!}
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
            </tr>
@endforeach                            
            </tbody>
        </table>
    </div>

</section>

@stop