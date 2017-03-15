@extends('ar.layouts.ar-admin-dash')

@section('content')

<section class="panel">
            <header class="panel-heading">
                شركات الشحن المتاحة المتاحة
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                     </span>
            </header>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>                        
                    	<th>الصورة</th>
                        <th>الشركة بالعربية</th>
                    </tr>
                    </thead>
                    <tbody>
@foreach ($companies as $company)
            <tr>
            
                <td>{!! Form::image($company->image) !!}</td>
                <td>{!! $company->ar_name !!}</td>
                <td>
                {!!Form::open(["url"=>"shipping-company/$company->id/edit", "method"=>"get"]) !!}
                {!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
							{!! Form::close() !!}</td>
                <td>{!! Form::open(["url"=>"shipping-company/$company->id", "method"=>"delete"]) !!}
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
            </tr>
@endforeach                            
            </tbody>
        </table>
    </div>

</section>

@stop