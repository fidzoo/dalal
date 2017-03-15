@extends('ar.layouts.ar-admin-dash')

@section('content')


<section class="panel">
                    <header class="panel-heading">
                        تحديث صور تبويبات المنتجات في الصفحة الرئيسية
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>تبويب</th>
                                <th>الصورة</th>
                                <th>رفع صورة جديدة</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            <tr>
                                <td>تبويب المنتجات الأكثر مبيعًا</td>
                                <td>{!!Form::image($label1->ar_image_path, '', ['width'=>150, 'height'=>300])!!}</td>
                                <td>{!! Form::open(["url"=>"home-labels-images/1", 'files'=>true]) !!}
                                        {!! Form::file("image1") !!}
                                        </td>
                                <td>{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
                            <tr>
                                <td>تبويب المنتجات المضافة حديثًا</td>
                                <td>{!!Form::image($label2->ar_image_path, '', ['width'=>150, 'height'=>300])!!}</td>
                                <td>{!! Form::open(["url"=>"home-labels-images/2", 'files'=>true]) !!}
                                        {!! Form::file("image2") !!}</td>
                                <td>{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
                            
                            <tr>
                                <td>تبويب المنتجات الأعلى تقييمًا</td>
                                <td>{!!Form::image($label3->ar_image_path, '', ['width'=>150, 'height'=>300])!!}</td>
                                <td>{!! Form::open(["url"=>"home-labels-images/3", 'files'=>true]) !!}
                                        {!! Form::file("image3") !!}</td>
                                <td>{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
                            <tr>
                                <td>تبويب صفقات اليوم</td>
                                <td>{!!Form::image($label4->ar_image_path, '', ['width'=>150, 'height'=>300])!!}</td>
                                <td>{!! Form::open(["url"=>"home-labels-images/4", 'files'=>true]) !!}
                                        {!! Form::file("image4") !!}</td>
                                <td>{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
                            <tr>
                                <td>تبويب منتجات مختارة</td>
                                <td>{!!Form::image($label5->ar_image_path, '', ['width'=>150, 'height'=>300])!!}</td>
                                <td>{!! Form::open(["url"=>"home-labels-images/5", 'files'=>true]) !!}
                                        {!! Form::file("image5") !!}</td>
                                <td>{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
                            <tr>
                                <td>تبويب عروض الأزياء</td>
                                <td>{!!Form::image($label6->ar_image_path, '', ['width'=>150, 'height'=>300])!!}</td>
                                <td>{!! Form::open(["url"=>"home-labels-images/6", 'files'=>true]) !!}
                                        {!! Form::file("image6") !!}</td>
                                <td>{!! Form::submit('تحديث', ['class'=>'btn btn-success btn-lg btn-block']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
					                           
                            </tbody>
                        </table>
                    </div>

                </section>

@stop