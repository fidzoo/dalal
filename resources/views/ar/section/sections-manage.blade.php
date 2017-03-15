@extends('ar.layouts.ar-admin-dash')

@section('content')

<!--collapse start-->
                    <div class="panel-group " id="accordion">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <strong>الفئات الرئيسية</strong> 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                
                                   <a href='{!! URL::to("section/create") !!}' class="btn btn-primary">إنشاء</a>
                                   <a href='{!! URL::to("sections-list") !!}' class="btn btn-success">تعديل/حذف</a>
                                
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <strong>الأقسام الرئيسية</strong>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    
                                	<a href='{!! URL::to("main-category/create") !!}' class="btn btn-primary">إنشاء</a>
                                   	<a href='{!! URL::to("main-category-list") !!}' class="btn btn-success">تعديل/حذف</a>

                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <strong>الأقسام الفرعية</strong>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <a href='{!! URL::to("sub-category/create") !!}' class="btn btn-primary">إنشاء</a>
                                   	<a href='{!! URL::to("sub-category-list") !!}' class="btn btn-success">تعديل/حذف</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--collapse end-->

@stop