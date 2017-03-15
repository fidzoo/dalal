@extends('ar.layouts.ar-main-layout')

@section('content')

<div class="page-top">
    <div class="container">
    	<div class="row">
            <div class="col-xs-12" id="center_column">
                    <h2 class="page-heading text-center">
                        <span class="page-heading-title2">تصفح جميع أقسام الموقع</span>
                    </h2>
             </div>
             
             <div class="col-xs-12" id="center_column">
             	<div class="row">
             	<?php $parent = 1; ?>
                @foreach (sections() as $section)
                	<div class="col-md-3 col-sm-6 col-xs-12 pull-right" id="left_column">
                    	<div class="block left-module">
                            <p class="title_block"> <img src='{!! asset("$section->image") !!}' title="" align="" /> {!!$section->ar_title!!}</p>
                            <div class="block_content">
                                <!-- layered -->
                                <div class="layered layered-category">
                                    <div class="layered-content">
                                    	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php $no = 1; ?>
                                        @foreach ($section->mainCategories as $main_cat)
                                          @if($main_cat->active == 1)
                                          <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading{{$no}}">
                                              <h4 class="panel-title">
                                                <a class="collapsed"  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$parent}}{{$no}}" aria-expanded="false" aria-controls="collapse{{$no}}">
                                                   {!!$main_cat->ar_title!!}
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapse{{$parent}}{{$no}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$no}}">
                                              <div class="panel-body">
                                              <ul class="tree-menu">
                                                @foreach ($main_cat->subCategories as $sub_cat)
                                                  @if($sub_cat->active == 1)
                                                <?php $url=str_replace(" ", "-", $sub_cat->ar_title); ?>
                                                <li><span></span><a href='{!! URL::to("sub-category/$sub_cat->id/$url") !!}'>{!!$sub_cat->ar_title!!} </a></li>
                                                  @endif
                                                @endforeach
                                              </ul>
                                            </div>
                                            </div>
                                          </div>
                                          <?php $no++; ?>
                                          @endif
                                        @endforeach
            							</div>
            
                                    </div>
                                </div>
                                <!-- ./layered -->
                            </div>
                        </div>
                    </div>
                    <?php $parent++; ?>
                    @endforeach
                    
                    
                </div>
             </div>
             
        </div>
    </div>
</div>

@stop


