<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="dalal">
  <meta name="description" content="dalal-Dashboard">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>Dalal DashBoard</title>

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
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                  <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                  <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="menu-list"><a href="#"><i class="fa fa-home"></i> <span>متاجري</span></a>
                    <ul class="sub-menu-list">
                        <li><a href='{!! URL::to("store/create") !!}'> إنشاء متجر جديد</a></li>
                        <li><a href='{!! URL::to("my-stores") !!}'> تعديل/حذف متجر</a></li>
                        <li><a href='{!! URL::to("stores-list/stock") !!}'> المخزون</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href="#"><i class="fa fa-home"></i> <span>المنتجات</span></a>
                    <ul class="sub-menu-list">
                        <li><a href='{!! URL::to("stores-list/product-create") !!}'> إنشاء منتج جديد</a></li>
                        <li><a href='{!! URL::to("stores-list/product-edit") !!}'> تعديل/حذف منتج</a></li>
                        <li><a href='{!! URL::to("stores-list/products-status") !!}'> حالة منتجاتي</a></li>
                        <li><a href='{!! URL::to("category-request") !!}'> طلب إضافة قسم جديد</a></li>
                    </ul>
                </li>
                

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
                            <i class="fa fa-tasks"></i>
                            <span class="badge">8</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">You have 8 pending task</h5>
                            <ul class="dropdown-list user-list">
                                <li class="new">
                                    <a href="#">
                                        <div class="task-info">
                                            <div>Database update</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                                <span class="">40%</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="new">
                                    <a href="#">
                                        <div class="task-info">
                                            <div>Dashboard done</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success">
                                                <span class="">90%</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div>Web Development</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 66%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="66" role="progressbar" class="progress-bar progress-bar-info">
                                                <span class="">66% </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div>Mobile App</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" role="progressbar" class="progress-bar progress-bar-danger">
                                                <span class="">33% </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div>Issues fixed</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar">
                                                <span class="">80% </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="new"><a href="">See All Pending Task</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">You have 5 Mails </h5>
                            <ul class="dropdown-list normal-list">
                                <li class="new">
                                        <a href="">
                                        <span class="thumb"><img src='{!! asset("ar-assets/back-end/images/photos/user1.png") !!}' alt="" /></span>
                                        <span class="desc">
                                          <span class="name">John Doe <span class="badge badge-success">new</span></span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="thumb"><img src='{!! asset("ar-assets/back-end/images/photos/user2.png") !!}' alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jonathan Smith</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="thumb"><img src='{!! asset("ar-assets/back-end/images/photos/user3.png") !!}' alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jane Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="thumb"><img src='{!! asset("ar-assets/back-end/images/photos/user4.png") !!}' alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Mark Henry</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="thumb"><img src='{!! asset("ar-assets/back-end/images/photos/user5.png") !!}' alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jim Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="new"><a href="">Read All Mails</a></li>
                            </ul>
                        </div>
                    </li>
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
                                    <a href="#" id="notify-delete" data-id="{{$notify->id}}"  style="color: gray;">&#10004;</a>
                                </li>
                                @endforeach
                                <li class="new"><a href='{!! URL::to("all-notifications") !!}'>عرض كل الإشعارات</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src='{!! asset("ar-assets/back-end/images/photos/user-avatar.png") !!}' alt="" />
                            John Doe
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>  Settings</a></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i> Log Out</a></li>
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
    $(document).on('click', '#notify-delete', function() {
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
