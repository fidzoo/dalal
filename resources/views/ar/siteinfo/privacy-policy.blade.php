@extends('ar.layouts.ar-main-layout') 

@section('content')
<div class="page-top">
    <div class="container" id="columns">

        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-12">
            
            	<div class="breadcrumb clearfix">
                        <a>أنت تتصفح : </a>
                        <span class="navigation-pipe">&nbsp;</span>
                         <a class="home" href="#" title="الرئيسية">دلال مول</a>
                        <span class="navigation-pipe">&nbsp;</span>
                        <a href="#" title="Return to Home">أحذية وملابس وإكسسوارتها</a>
                        <span class="navigation-pipe">&nbsp;</span>
                        <a href="#" title="Return to Home">ملابس رجالية </a>
                        <span class="navigation-pipe">&nbsp;</span>
                        <a href="#" title="Return to Home">جواكيت رجالي</a>
            
                    </div>
                <!-- category-slider -->
              <div class="category-slider">
                <img src='{!! asset("$privacy_policy->image") !!}' alt="category-slider" class="img-responsive">
              </div>
                <!-- ./category-slider -->
            </div>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12 text-right" id="center_column">
                <!-- Content page -->
                <div class="content-text clearfix">
                    <!-- page heading-->
                    <h2 class="page-heading2">
                        <span class="page-heading-title2">{{ $privacy_policy->item }}</span>
                    </h2>
                    <p>{{ $privacy_policy->ar_content }}</p>
                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->

        </div>
        <!-- ./row-->
    </div>
</div>
@stop