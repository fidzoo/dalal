@extends('ar.layouts.ar-main-layout')
<title>دلال مول | الأسئلة الشائعة</title>
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
                        <a href='{!! URL::to("FAQ") !!}' title="Return to Home">الأسئلة الشائعة</a>
                        
            
                    </div>
                <!-- category-slider -->
                <!-- <div class="category-slider">
                	<img src='assets/images/about.png' alt="category-slider" class="img-responsive">
                </div> -->
                <!-- ./category-slider -->
            </div>
            <!-- Center colunm-->
            <div class="col-sm-12 information-entry">
                            <div class="accordeon size-1 tex-right">

                            	<div class="border">
                                @foreach($faqs as $faq)
                                <div class="accordeon-title">{{$faq->ar_question}}</div>
                                <div class="accordeon-entry">
                                    <div class="row">
                                        <div class="col-md-12 information-entry">
                                            <div class="article-container style-1">
                                                <p>
                                                {{$faq->ar_answer}}
                                                </p>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="clear"></div>
                                </div>
                                
                               
                                
                            </div>
                        </div>
            <!-- ./ Center colunm -->

        </div>
        <!-- ./row-->
    </div>
</div>

@stop