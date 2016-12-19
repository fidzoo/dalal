@extends('layouts.app')

@section('content')

<h3>الأقسام الرئيسية المتاحة:</h3><br>

@foreach($main_cats as $main_cat)

<h3><li>{!! $main_cat->ar_title !!}</li></h3>

<div class="panel panel-default">
    <div class="panel-heading">
        الأقسام الفرعية
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>القسم بالعربية</th>
                        <th>القسم بالإنجليزية</th>
                        <th>حالة القسم</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num= 1 ?>
                @foreach($main_cat->subCategories as $sub_cat)
                    <tr>
                        <td>{!! $num !!}</td>
                        <?php $num++ ?>
                        <td>{!! $sub_cat->ar_title !!}</td>
                        <td>{!! $sub_cat->en_title !!}</td>
                        <td>@if($sub_cat->active == 1)
                        <center>{!! HTML::image("ar-assets/back-end/images/checkmark.ico") !!}</center>
                        @elseif($sub_cat->active == 0) <center>{!! HTML::image("ar-assets/back-end/images/x-mark.ico") !!}</center>
                        @endif</td>
                        <td>{!! Form::open(["url"=>"sub-category/$sub_cat->id/edit", "method"=>"get"]) !!} 
                            {!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}</td>
                        <td>{!! Form::open(["url"=>"sub-category/$sub_cat->id", "method"=>"delete"]) !!} 
                            {!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach


@stop