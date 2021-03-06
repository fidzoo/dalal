<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="dalal">
  <meta name="description" content="dalal-Dashboard">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>دلال مول - مدير الموقع</title>

  <!--icheck-->
  <link href='{!! asset("ar-assets/back-end/js/iCheck/skins/minimal/minimal.css") !!}' rel="stylesheet">
  <link href='{!! asset("ar-assets/back-end/js/iCheck/skins/square/square.css") !!}' rel="stylesheet">
  <link href='{!! asset("ar-assets/back-end/js/iCheck/skins/square/red.css") !!}' rel="stylesheet">
  <link href='{!! asset("ar-assets/back-end/js/iCheck/skins/square/blue.css") !!}' rel="stylesheet">

  <!--dashboard calendar-->
  <link href='{!! asset("ar-assets/back-end/css/clndr.css") !!}' rel="stylesheet">


  <!--common-->
  <link href='{!! asset("ar-assets/back-end/css/style.css") !!}' rel="stylesheet">
  <link href='{!! asset("ar-assets/back-end/css/style-responsive.css") !!}' rel="stylesheet">

<script src='{!! asset("ar-assets/back-end/js/jquery-1.10.2.min.js") !!}'></script>
<script src='{!! asset("ar-assets/back-end/js/jquery-ui-1.9.2.custom.min.js") !!}'></script>


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src='{!! asset("ar-assets/back-end/js/html5shiv.js") !!}'></script>
  <script src='{!! asset("ar-assets/back-end/js/respond.min.js") !!}'></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href='{!! URL::to("dash") !!}'><img src='{!! asset("ar-assets/back-end/images/logo.png") !!}' alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href='{!! URL::to("dash") !!}'><img src='{!! asset("ar-assets/back-end/images/logo_icon.png") !!}' alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src='{!! asset("ar-assets/back-end/images/photos/user-avatar.png") !!}' class="media-object">
                    <div class="media-body">
                        <h4><a href="#">أبو عبدالله</a></h4>
                        <span>"السلام عليكم"</span>
                    </div>
                </div>

                <h5 class="left-nav-title">معلومات المدير</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a href="#"><i class="fa fa-user"></i> <span>الملف الشخصي</span></a></li>
                  <li><a href="#"><i class="fa fa-sign-out"></i> <span>تسجيل الخروج</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <!-- <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>إعدادات الموقع</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> قائمة فرعية</a></li>
                        <li><a href="#"> قائمة فرعية</a></li>

                    </ul>
                </li> -->
                <li class="menu-list"><a href="index.html"><i class="fa fa-tasks"></i> <span>تهيئة أقسام الموقع</span></a>
                    <ul class="sub-menu-list">
                        <li><a href='{!! URL::to("sections-manage") !!}'> إدارة الأقسام</a></li>
                        <li><a href='{!! URL::to("categories-request-display") !!}'> طلبات إضافة الأقسام</a></li>
                        <li><a href='{!! URL::to("todays-deals-select") !!}'> اختيار صفقات اليوم</a></li>
                    </ul>
                </li>


                <!-- <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>إدارة المتاجر</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> قائمة فرعية</a></li>
                        

                    </ul>
                </li> -->
                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>إدارة المنتجات</span></a>
                    <ul class="sub-menu-list">
                        <li><a href='{!! URL::to("all-pending-products") !!}'> منتجات في انتظار الموافقة</a></li>
                        
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>إدارة الإعلانات</span></a>
                    <ul class="sub-menu-list">
                        <li><a href='{!! URL::to("home-banners") !!}'> إعلانات الصفحة الرئيسية</a></li>
                        <li><a href='{!! URL::to("subcat-banner") !!}'> إعلان صفحة القسم الداخلي</a></li>
                        <li><a href="#"> قائمة فرعية</a></li>

                    </ul>
                </li>

                <!-- <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>التقارير</span></a> -->

                

                <!-- <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>متابعة الشكاوي</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> قائمة فرعية</a></li>
                        
                    </ul>
                </li> -->
                <!-- <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>النشرات البريدية / الهاتفية</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> قائمة فرعية</a></li>
                        
                    </ul>
                </li> -->
                <!-- <li class="menu-list"><a href="#"><i class="fa fa-tasks"></i> <span>العمولات</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> قائمة فرعية</a></li>
                        
                    </ul>
                </li> -->
                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>محتويات الموقع</span></a>
                    <ul class="sub-menu-list">
              
                      <li><a href='{!! URL::to("home-banners") !!}'> إعلانات الصفحة الرئيسية</a></li>
                      <li><a href='{!! URL::to("subcat-banner") !!}'> إعلان صفحة القسم الداخلي</a></li>
                      <li><a href='{!! URL::to("siteinfo-update") !!}'> صفحات المعلومات</a></li>
                      <li><a href='{!! URL::to("sitepolicy-update") !!}'> صفحات سياسة الموقع</a></li>
                      <li><a href='{!! URL::to("customer-service-update") !!}'> صفحات خدمات العملاء</a></li>

                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>تحديث الأسئلة الشائعة</span></a>
                    <ul class="sub-menu-list">
                        <li><a href='{!! URL::to("faq/create") !!}'> إدراج أسئلة جديدة</a></li>
                        <li><a href='{!! URL::to("faq-list") !!}'> تعديل/حذف أسئلة</a></li>
                    </ul>
                </li>
                
                <li><a href='{!! URL::to("logout") !!}'><i class="fa fa-sign-in"></i> <span>تسجيل الخروج</span></a></li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    
                    
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge">{!!notifications()['count']!!}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">الإشعارات</h5>
                            <ul class="dropdown-list normal-list">
                                @foreach (notifications()['notifications'] as $notify)
                                <li class="new">
                                    <a href='{!! URL::to("$notify->link") !!}'>
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">{!!$notify->ar_title!!} </span>
                                    </a>&nbsp;&nbsp;&nbsp;
                                    <a href="#" id="notify-read" data-id="{{$notify->id}}"  style="color: gray;">&#10004;</a>
                                </li>
                                @endforeach
                                <li class="new"><a href='{!! URL::to("all-notifications") !!}'>عرض كل الإشعارات</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src='{!! asset("ar-assets/back-end/images/photos/user-avatar.png") !!}' alt="" />
                            أبو عبدالله
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>  الملف الشخصي</a></li>
                            <li><a href='{!! URL::to("logout") !!}'><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!--Sucess/Update/Fail Messages--> 
        @if (Session::has('message'))
            <div id="message" class='alert alert-success'>
                <p><h1> {!! Session::get('message') !!} </h1></p> 
            </div>
        @endif
        <!--End of messages-->

        <!--body wrapper start-->
        <div class="wrapper">
            @yield('content')
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2017 &copy; By Yisweb
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!--script for notification mark as read-->
<script type="text/javascript">
    $(document).on('click', '#notify-read', function() {
        var notify_id = $(this).data('id');
        //ajax
            $.get('/ajax-notify?notify_id=' + notify_id, function(data){
                //success data
                //$('#notify-delete').css('color', 'red');
            });
    });   
</script>
<!--end of Mark as Read script--> 

<!-- Placed js at the end of the document so the pages load faster -->

<script src='{!! asset("ar-assets/back-end/js/jquery-migrate-1.2.1.min.js") !!}'></script>
<script src='{!! asset("ar-assets/back-end/js/bootstrap.min.js") !!}'></script>
<script src='{!! asset("ar-assets/back-end/js/modernizr.min.js") !!}'></script>
<script src='{!! asset("ar-assets/back-end/js/jquery.nicescroll.js") !!}'></script>

<!--common scripts for all pages-->
<script src='{!! asset("ar-assets/back-end/js/scripts.js") !!}'></script>

</body>
</html>
