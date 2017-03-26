<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/lib/bootstrap/css/bootstrap.min.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/lib/font-awesome/css/font-awesome.min.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/lib/select2/css/select2.min.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/lib/jquery.bxslider/jquery.bxslider.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/lib/owl.carousel/owl.carousel.css") !!}' /> 
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/lib/fancyBox/jquery.fancybox.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/lib/jquery-ui/jquery-ui.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/css/animate.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/css/reset.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/css/style.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/css/style-new.css") !!}' />
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/css/responsive.css") !!}' />
    <script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/jquery/jquery-1.11.2.min.js") !!}'></script>

    <!--Yo Rating css & script-->
    <link rel="stylesheet" type="text/css" href='{!! asset("ar-assets/front-end/js/rate-yo/css/jquery.rateyo.css") !!}'>
    <script src='{!! asset("ar-assets/front-end/js/rate-yo/js/jquery.rateyo.js") !!}'></script>

    <title>دلال مول</title>
</head>
<body class="option6">
<!-- TOP BANNER -->
<!--<div id="top-banner" class="top-banner">
    <div class="bg-overlay"></div>
    <div class="container">
        <h1>Special Offer!</h1>
        <h2>Additional 40% OFF For Men & Women Clothings</h2>
        <span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>
        <span class="btn-close"></span>
    </div>
</div>-->
<!-- HEADER -->
<div id="content-block">
    <div class="content-center fixed-header-margin">

                        <div class="header-top top-header">
                            <div class="container">
                                <div class="header-top-entry">
                                    <div class="title"><i class="fa fa-globe"></i>English</div>
                                    
                                </div>
                                <div class="header-top-entry">
                                    <div class="title"><img src='{!! asset("ar-assets/front-end/images/icons/sar.png") !!}' alt="" title="" /> SAR<i class="fa fa-caret-down"></i></div>
                                    <div class="list">
                                        <a href="#" class="list-entry">$ CAD</a>
                                        <a href="#" class="list-entry">€ EUR</a>
                                    </div>
                                </div>
                                
                                <div class="support-link">
                                    <a href="#"><img src='{!! asset("ar-assets/front-end/images/icons/info.png") !!}' alt="" title="" /> من نحن </a>
                                    <a href="#"><img src='{!! asset("ar-assets/front-end/images/icons/contact.png") !!}' alt="" title="" /> تواصل مع إدارة الموقع</a>
                                    <a href='{!! URL::to("FAQ") !!}'><img src='{!! asset("ar-assets/front-end/images/icons/qa.png") !!}' alt="" title="" />  الأسئلة الشائعة </a>
                                </div>
                                
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="header-middle">
                            <div class="container">
                                <div class="header-com hidden-lg hidden-md">
                                    <img src='{!! asset("ar-assets/front-end/data/banner-botom1 - Copy.jpg") !!}' title="" alt="" />
                                </div>
                                <div class="logo-wrapper hidden-sm hidden-xs row">
                                
                                    <div class="col-md-2 timer">
                                        <p>باقي على عرض اليوم</p>
                                        <span class="show-count-down">
<span class="countdown-lastest" data-y="2017" data-m="2" data-d="" data-h="13" data-i="22" data-s="60"></span>
                                        </span>
                                    </div>
                                    
                                    <div class="col-md-10">
                                        <div class="row">                                            
                                            <div class="col-md-6">
                                                <a href="#" class="offer">عرض مذهل يوميًا لا تفوته .. إضغط للإطلاع على العرض</a>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="qa">هل إطلعت على صفقة اليوم !؟</p>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="header-wrapper style-3">
                            <header class="type-1 container">
                                <div class="header-top center-block">
                                    <div class="menu-button responsive-menu-toggle-class row">

                                        <div class="col-xs-2 col-sm-5 col-md-5">
                                            <i class="fa fa-reorder pull-left"></i>
                                        </div>
                                        <div class="col-xs-10 col-sm-7 col-md-7">
                                            <div class=" pull-right">
                                                <a id="logo" href="3"><img src='{!! asset("ar-assets/front-end/images/logo.png") !!}' class="img-responsive" alt=""></a>
                                            </div>
                                        </div>
                    
                                    </div>
                                    
            
                                    <div class="navigation">
                                        <div class="navigation-header responsive-menu-toggle-class">
                                            <div class="title">القائمه الرئيسية</div>
                                            <div class="close-menu"></div>
                                        </div>
                                        <div class="nav-overflow">
                                            
                                            <nav class="disable-animation">
                                                <ul  class="full-width">
                                                    <li>
                                                        <a href='{!! URL::to("/") !!}'>
                                                            <img src='{!! asset("ar-assets/front-end/images/icons/home.png") !!}' alt="" title="" />
                                                            <span>الصفحة الرئيسية</span>
                                                        </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href='{!! URL::to("recent-products") !!}'>
                                                            <img src='{!! asset("ar-assets/front-end/images/icons/last.png") !!}' alt="" title="" />
                                                            <span> المنتجات المٌضافة مؤخرًا </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='{!! URL::to("high-sales") !!}'>
                                                            <img src='{!! asset("ar-assets/front-end/images/icons/best.png") !!}' alt="" title="" />
                                                            <span>المنتجات الأكثر بيعًا</span>
                                                        </a>
                                                    </li>
                                                    <li class="hidden-sm hidden-xs">
                                                        <a href="#"  class="logo">
                                                            <img src='{!! asset("ar-assets/front-end/images/logo.png") !!}' title="" alt=""/>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src='{!! asset("ar-assets/front-end/images/icons/offer.png") !!}' alt="" title="" />
                                                            <span>عروض وصفقات مميزة</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src='{!! asset("ar-assets/front-end/images/icons/24.png") !!}' alt="" title="" />
                                                            <span>صفقة اليوم</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='{!! URL::to("all-sections") !!}'>
                                                            <img src='{!! asset("ar-assets/front-end/images/icons/all.png") !!}' alt="" title="" />
                                                            <span>تصفح جميع الأقسام</span>
                                                        </a>
                                                    </li>
                                                     
                                                </ul>
                
                                                <div class="clear"></div>
                                            </nav>
                                            <div class="navigation-footer responsive-menu-toggle-class">
                                                <div class="socials-box">
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="navigation-copyright">Created by <a href="#">YisWeb</a>. All rights reserved</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>     
                                    <div class="close-header-layer" style="display: none;"></div>               
                            </header>
                            
                            
                            
                            <div class="clear"></div>
                        </div>
    
<div id="header" class="header">
    
    <div id="nav-top-menu" class="">
        <div class="container">
            <div class="row  main-header">

                
                <div id="main-menu"  class="col-md-3 col-sm-12 col-xs-12 main-menu">
                        <nav class="navbar navbar-default">
                            <div class="">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar2" aria-expanded="true" aria-controls="navbar">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <a class="navbar-brand" href="#">حسابى</a>
                                </div>
                                <div id="navbar2" class="navbar-collapse collapse" aria-expanded="true">
                                    <ul class="nav new navbar-nav">
                                    @if (Auth::guest())
                                    <li>
                                        <a href='{!! URL::to("login") !!}'>
                                            <img src='{!! asset("ar-assets/front-end/images/icons/sign-in.png") !!}' alt="" title="" />
                                            تسجيل الدخول
                                        </a>
                                    </li>

                                    <li>
                                        <div class="header-top-entry2">
                                            <div class="title"><img src='{!! asset("ar-assets/front-end/images/icons/new.png") !!}' alt="" title="" />  عضو جديد<i class="fa fa-caret-down"></i></div>
                                            <div class="list">
                                                <a href='{!! URL::to("buyer-reg") !!}' class="list-entry">تسجيل مشتري</a>
                                                <a href='{!! URL::to("merch-reg") !!}' class="list-entry">تسجيل تاجر</a>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    <li>
                                        <div class="header-top-entry2 log-in-acc">
                                            <div class="title"><img src='{!! asset("ar-assets/front-end/images/icons/sign-in.png") !!}' alt="" title="" />  حسابى<i class="fa fa-caret-down"></i></div>
                                            <div class="list">
                                                <a href="#" class="list-entry">تعديل حسابي</a>
                                                @if(Session::get('group') == 'buyer')
                                                <a href='{!! URL::to("current-orders") !!}' class="list-entry">تتبع طلباتي</a>
                                                <a href='{!! URL::to("orders-history") !!}' class="list-entry">سجل طلباتي</a>
                                                <a href='{!! URL::to("my-favorites") !!}' class="list-entry">المفضلة</a>
                                                @endif
                                                <a href='{!! URL::to("logout") !!}' class="list-entry">تسجيل الخروج</a>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        @if(Session::get('group') == 'buyer')
                                        <div id="cart-block" class="shopping-cart-box">
                                            <a class="cart-link" href="#">طلباتي<i class="fa fa-caret-down"></i>
                                            <span class="notify notify-left">{{Cart::count()}}</span>
                                            </a>
                                            <div class="cart-block">
                                                <div class="cart-block-content">
                                                @if(Cart::count() < 1 )
                                                <h3 class="text-center" style="direction: rtl;">
                                                لا توجد منتجات بداخل عربة التسوق.. هيا، ابدأ التسوق الآن!
                                                </h3>                        
                                                @else
                                                    <h5 class="cart-title">عدد الطلبات</h5>
                                                    <div class="cart-block-list">
                                                        <ul>
                                                            @foreach(Cart::content() as $pick)
                                                            
                                                            <li class="product-info">
                                                                <div class="p-left">
                                                                    <?php $url=str_replace(" ", "-", $pick->model->ar_title); ?>
                                                                    <button href="#" class="cartRemove remove_link" data-row_id="{{$pick->rowId}}" form="remove-form"></button>
                                                                    <a href='{!! URL::to("product/$pick->id/$url") !!}'>
                                                                    @if(!$pick->model->productImages->isEmpty())
                                                                    <?php $img= $pick->model->productImages[0]->image_path ?>
                                                                    <img class="img-responsive" alt="product_image" src='{!! asset("$img") !!}'></a>
                                                                    @else
                                                                    <img class="img-responsive" alt="default-img" src='{!! asset("ar-assets/front-end/images/logo.png") !!}'></a>
                                                                    @endif
                                                                    </a>
                                                                </div>
                                                                <div class="p-right">
                                                                    <p class="p-name">{{$pick->model->ar_title}}</p>
                                                                    <p class="p-rice">{{$pick->subtotal}} {{Session::has('currency') ? Session::get('currency') : 'ريال سعودي'}}</p>
                                                                    <p>الكمية: {{$pick->qty}}</p>
                                                                </div>
                                                            </li>
                                                            {!!Form::open(['url'=>'item-cart-remove', 'id'=>'remove-form'])!!}
                                                            {!!Form::hidden('remove-data', '', ['id'=>'remove-data'])!!}
                                                            {!!Form::close()!!}
                                                            
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="toal-cart">
                                                        <span>الإجمالي:</span>
                                                        <span class="toal-price pull-left">{{Cart::total()}} {{Session::has('currency') ? Session::get('currency') : 'ريال سعودي'}}</span>
                                                    </div>
                                                    <div class="cart-buttons">
                                                        <a href='{!! URL::to("favorite") !!}' class="btn-check-out">المفضلة</a>
                                                        <a href='{!! URL::to("my-cart") !!}' class="btn-check-out2">سلة الشراء</a>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                     <div id="cart-block" class="shopping-cart-box">  
                                            <a class="cart-link noicon" href='{!! URL::to("dash") !!}'>
                                            لوحة التحكم
                                            </a>
                                     </div>
                                        @endif
                                    </li>
                                    @endif
                                    </ul>
                                </div><!--/.nav-collapse -->
                            </div>
                        </nav>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 header-search-box">
                    <form class="form-inline">
                          <button type="submit" class="pull-left btn-search">إبحث في الموقع<i class="fa fa-search" aria-hidden="true"></i></button>
                          <div class="form-group input-serach  pull-right">
                            <input type="text"  placeholder="... أكتب ما تبحث عنه هنا">
                          </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12 hidden-sm hidden-xs" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            
                            <span class="btn-open-mobile pull-right home-page">
                                <i class="fa fa-th-large"></i>
                                <span class="title-menu">أقسام المنتجات <i class="fa fa-caret-down"></i></span>
                            </span>
                        </h4>
                        <div class="vertical-menu-content is-home">
                            <ul class="vertical-menu-list">
                                @foreach (sections() as $section)
                                <li>
                                    <a class="parent" href="#">{!!$section->ar_title!!}</a>
                                    <div class="vertical-dropdown-menu">
                                        <div class="vertical-groups col-sm-12">
                                             <h4 class="mega-group-header header-title"><span>{!!$section->ar_title!!}</span></h4>
                                            
                                            @foreach ($section->mainCategories as $main_cat) 
                                                @if($main_cat->active == 1)
                                            <div class="mega-group col-sm-4 pull-right">
                                                <div class="box-container">
                                                    <h4 class="mega-group-header"><span>{!!$main_cat->ar_title!!}</span></h4>
                                                    <ul class="group-link-default">
                                                        
                                                        @foreach ($main_cat->subCategories as $sub_cat)
                                                            @if($sub_cat->active == 1)
                                                        <li>
                                                        <?php $url=str_replace(" ", "-", $sub_cat->ar_title); ?>
                                                        <a href='{!! URL::to("sub-category/$sub_cat->id/$url") !!}'>{!!$sub_cat->ar_title!!}</a></li>
                                                            @endif
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                            <div class="all-category"><a href='{!! URL::to("all-sections") !!}'><span class="open-cate">تصفح جميع الأقسام </span></a></div>
                        </div>
                    </div>
                </div>   
                
                           
            </div>
        </div>
    </div>
</div>
<!-- end header -->
<!-- Putcurrenc -->
<!--  -->
<!-- Here Is Our Content -->

@yield('content')

<!-- End Of Our Content -->
<!-- Footer -->
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div class="row">
            
                <div id="introduce-box"  class="col-md-3 col-sm-6 col-xs-12  pull-right">
                    <div class="introduce-title">معلومات</div>
                    <ul id = "introduce-support"  class="introduce-list">
            <li><a href='{!! URL::to("about") !!}'>عن دلال مول</a></li>
            <li><a href='{!! URL::to("merchant-agreement") !!}'>اتفاقية الاستخدام للتاجر</a></li>
            <li><a href='{!! URL::to("buyer-agreement") !!}'>اتفاقية الاستخدام للمشتري</a></li>
            <li><a href='{!! URL::to("selling-instruct") !!}'>كيفية البيع</a></li>
            <li><a href='{!! URL::to("buy-instruct") !!}'>كيفية الشراء</a></li>
            <li><a href='{!! URL::to("payment-methods") !!}'>طرق الدفع</a></li>
                    </ul>
                </div>
                <div  id="introduce-box" class="col-md-2 col-sm-6 col-xs-12  pull-right">
                    <div class="introduce-title">سياسة الموقع</div>
                    <ul id = "introduce-Account" class="introduce-list">
            <li><a href='{!! URL::to("privacy-policy") !!}'>سياسة الخصوصية</a></li>
            <li><a href='{!! URL::to("replacement") !!}'> الاستبدال والاسترجاع</a></li>
            <li><a href='{!! URL::to("delivery-shipping") !!}'> الشحن والتوصيل</a></li>
            <li><a href='{!! URL::to("FAQ") !!}'>الأسئلة الشائعة </a></li>
            <li><a href='{!! URL::to("recruitment") !!}'> التوظيف</a></li>
            <li><a href='{!! URL::to("media") !!}'> المركز الإعلامي</a></li>
                    </ul>
                </div>

                <div id="introduce-box"  class="col-md-2 col-sm-6 col-xs-12 pull-right">
                    <div class="introduce-title">خدمات العملاء</div>
                    <ul id="introduce-company"  class="introduce-list">
                        <li><a href='{!! URL::to("/") !!}'>امتلك متجرك </a></li>
                        <li><a href='{!! URL::to("suggestions") !!}'>الملاحظات والمقترحات  </a></li>
                        <li><a href='{!! URL::to("/") !!}'> تواصل معنا</a></li>
                        <li><a href='{!! URL::to("/") !!}'> خريطة الموقع</a></li>
                    </ul>
                </div>
                <div id="introduce-box"  class="col-md-3 col-sm-6 col-xs-12 pull-right">
                    <div id="contact-box">
                        <div class="introduce-title">إضافات </div>
                        <ul id="introduce-company"  class="introduce-list">
                            <li><a href='{!! URL::to("/") !!}'>حسابي</a></li>
                        </ul>
                        <div>سجل في النشرة البريدية لموقع دلال مول، إدخل البريد الإلكتروني الخاص بك  </div>
                        <div class="input-group" id="mail-box">
                          <input type="text" placeholder="إدخل بريدك الإلكتروني"/>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">إرسل البريد</button>
                          </span>
                        </div><!-- /input-group -->
                    </div>
                    
                </div>
                <div id="introduce-box"  class="col-md-2 col-sm-6 col-xs-12 pull-right">
                    <div id="address-box">
                        <div class="introduce-title">التواصل الإجتماعي</div>
                        <div class="social-link">
                            
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                        <a href="#"><img src='{!! asset("ar-assets/front-end/data/ma3rof.png") !!}' alt="" /></a>
                    </div> 
                </div>
                

                
                

                
            </div><!-- /#introduce-box -->



            <div id="footer-menu-box">
                <div class="col-md-8 col-xs-12">
                    <ul id="trademark-list">
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-ups.jpg") !!}'  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-qiwi.jpg") !!}'  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-wu.jpg") !!}'  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-cn.jpg") !!}'  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-visa.jpg") !!}'  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-mc.jpg") !!}'  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-ems.jpg") !!}'  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src='{!! asset("ar-assets/front-end/data/trademark-dhl.jpg") !!}'  alt="ups"/></a>
                        </li>

                    </ul> 
                </div>
                <div class="col-md-4 col-xs-12">
                    <p class="text-right">جميع الحقوق محفوظة © 2016 .. لموقع دلال مول</p>
                </div>
            </div><!-- /#footer-menu-box -->
        </div> 
</footer>

    </div>
    <div class="clear"></div>
</div>
<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>

<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/bootstrap/js/bootstrap.min.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/select2/js/select2.min.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/jquery.bxslider/jquery.bxslider.min.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/owl.carousel/owl.carousel.min.js") !!}'></script>
<!--<script type="text/javascript" src="assets/lib/jquery.countdown/jquery.countdown.min.js"></script>-->
<!-- COUNTDOWN -->
<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/countdown/jquery.plugin.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/countdown/jquery.countdown.js") !!}'></script>
<!-- ./COUNTDOWN -->
<script type="text/javascript" src='{!! asset("ar-assets/front-end/lib/fancyBox/jquery.fancybox.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/js/jquery.actual.min.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/js/theme-script.js") !!}'></script>
<script type="text/javascript" src='{!! asset("ar-assets/front-end/js/global.js") !!}'></script>
<script type="text/javascript" src='{!! URL::to("https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js") !!}'></script>
<script>
$(function(){
    $('.equal').matchHeight();
    });

//------------------------------------------------
    //Cart item remove:
    $('.cartRemove').click(function(){
        $('#remove-data').attr('value', $(this).data('row_id'));
    });
</script>


</body>

<!-- Mirrored from kute-themes.com/html/kuteshop/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 13:25:01 GMT -->
</html>