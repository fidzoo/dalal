@extends('ar.layouts.ar-admin-dash')

@section('content')

<section class="panel">
            <header class="panel-heading">
                الدول المتاحة
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                     </span>
            </header>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>                        
                    	<th>الدولة بالعربية</th>
                        <th>الدولة بالإنجليزية</th>
                    </tr>
                    </thead>
                    <tbody>
@foreach ($countries as $country)
            <tr>
            {!!Form::open(["url"=>"country/$country->id", "method"=>"patch"]) !!}
                <td>{!! Form::text('ar_name', $country->ar_name) !!}</td>
                <td>{!! Form::text('en_name', $country->en_name) !!}</td>
                <td>		{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
							{!! Form::close() !!}</td>
                <td>{!! Form::open(["url"=>"country/$country->id", "method"=>"delete"]) !!}
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
            </tr>
@endforeach                            
            </tbody>
        </table>
    </div>

</section>

@stop