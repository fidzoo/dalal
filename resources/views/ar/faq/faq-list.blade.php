@extends('ar.layouts.ar-admin-dash')

@section('content')

<h3>قائمة بالأسئلة المتاحة:</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        الأسئلة المتاحة
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>السؤال (النسخة العربية)</th>
                        <th>السؤال (النسخة الإنجليزية)</th>
                    </tr>
                </thead>
                <tbody>
                <?php $count= 1; ?>
                @foreach($faqs as $faq)
                    <tr>
                        <td>{!! $count !!}</td>
                        <?php $count= ++$count ?>
                        <td>{!! $faq->ar_question !!}</td>
                        <td>{!! $faq->en_question !!}</td>
                        <td>{!! Form::open(["url"=>"faq/$faq->id/edit", "method"=>"get"]) !!}
							{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
							{!! Form::close() !!}</td>
						<td>{!! Form::open(["url"=>"faq/$faq->id", "method"=>"delete"]) !!} 
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop