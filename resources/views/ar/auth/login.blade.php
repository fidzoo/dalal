<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Yisweb">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>
    <link href='{!! asset("ar-assets/back-end/css/style.css") !!}' rel="stylesheet">
    <link href='{!! asset("ar-assets/back-end/css/style-responsive.css") !!}' rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>    
<body class="login-body">
   <div class="container">
      <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">تسجيل الدخول</h1>
            <img src='{!! asset("ar-assets/back-end/images/logo-black.png") !!}' alt=""/>
        </div>
<div class="login-wrap">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
         <input id="email" placeholder="إسم المستخدم" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" placeholder="كلمة المرور" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>


             <div class="form-group">
            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

                               
              <label class="checkbox">
                <input type="checkbox" value="remember-me"> تذكر البيانات
                <span class="pull-right">
                    <a data-toggle="modal" href="{{ url('/password/reset') }}">هل نسيت كلمة المرور ؟</a>
                </span>
            </label>
                    </form>
                </div>
        </div>
</div>    



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src='{!! asset("ar-assets/back-end/js/jquery-1.10.2.min.js") !!}'</script>
<script src='{!! asset("ar-assets/back-end/js/bootstrap.min.js") !!}'</script>
<script src='{!! asset("ar-assets/back-end/js/modernizr.min.js") !!}'</script>

</body>
</html>
