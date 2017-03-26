@extends('ar.layouts.ar-main-layout') 
<title>دلال مول | اتفاقية الاستخدام للتاجر</title>
@section('content')
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
                        <a href='{!! URL::to("merchant-agreement") !!}' title="عن دلال">اتفاقية الاستخدام للتاجر</a>
            
                    </div>
                <!-- category-slider -->
              <div class="category-slider">
                <img src='{!! asset("$merchant_agreement->image") !!}' alt="اتفاقية الاستخدام للتاجر" class="img-responsive">
              </div>
                <!-- ./category-slider -->
            </div>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12 text-right" id="center_column">
                <!-- Content page -->
                <div class="content-text clearfix">
                    <!-- page heading-->
                    <h2 class="page-heading2">
                        <span class="page-heading-title2">اتفاقية الاستخدام للتاجر</span>
                    </h2>
                    <p>{{$merchant_agreement->ar_content}}</p>
                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->

        </div>
        <!-- ./row-->
    </div>
</div>
@stop