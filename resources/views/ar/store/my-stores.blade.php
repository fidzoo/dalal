@extends('ar.layouts.ar-merchant-dash')

@section('content')

<section class="panel">
    <header class="panel-heading">
        قائمة متاجري
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
             </span>
    </header>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>اسم المتجر</th>
                <th>حالة المتجر</th>
            </tr>
            </thead>
            <tbody>
    @foreach ($stores as $store)
            <tr>
                <td>{!!$store->ar_name!!}</td>
                <td>{!!$store->active!!}</td>
            @if ($store->active == 0)
                <td><span class="label label-warning label-mini">قيد المراجعة</span></td>
            @elseif ($store->active == 1)
                <td><span class="label label-success label-mini">نشط</span></td>
            @elseif ($store->active == 2)
                <td><span class="label label-danger label-mini">موقوف</span></td>
            @endif
                <td>{!!Form::open(["url"=>"store/$store->id/edit", "method"=>"get"]) !!}
							{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
							{!! Form::close() !!}</td>
                <td>{!! Form::open(["url"=>"store/$store->id", "method"=>"delete"]) !!}
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
                <td><a href='{!! URL::to("store/$store->id") !!}' class="btn btn-info">عرض المتجر</a></td>
            </tr>
    @endforeach                            
            </tbody>
        </table>
    </div>

</section>

@stop