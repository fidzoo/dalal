@extends('ar.layouts.ar-main-layout') 
<title>دلال مول | كيفية الشراء</title>
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
                        <a href='{!! URL::to("buy-instruct") !!}' title="عن دلال">كيفية الشراء</a>
            
                    </div>
                <!-- category-slider -->
              <div class="category-slider">
                <img src='{!! asset("$buy->image") !!}' alt="كيفية الشراء" class="img-responsive">
              </div>
                <!-- ./category-slider -->
            </div>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12 text-right" id="center_column">
                <!-- Content page -->
                <div class="content-text clearfix">
                    <!-- page heading-->
                    <h2 class="page-heading2">
                        <span class="page-heading-title2">كيفية الشراء</span>
                    </h2>
                    <p>{{ $buy->ar_content }}</p>
                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->

        </div>
        <!-- ./row-->
    </div>
</div>
@stop