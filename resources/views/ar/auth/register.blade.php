@extends('ar.layouts.ar-main-layout') 

@section('content')
<div class="container">
    <div class="row">
                   
                                       <!-- page heading-->
                    <h2 class="page-heading2">
                        <span class="page-heading-title2">التسجيل في الموقع:</span>
                    </h2>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        @if (Session::get('reg_group') == 'merchant')
                        <input type="hidden" name="user_group" value="merchant">
                        @elseif (Session::get('reg_group') == 'buyer')
                        <input type="hidden" name="user_group" value="buyer">
                        @elseif (Session::get('reg_group') == 'admin')
                        <input type="hidden" name="user_group" value="admin">
                        @endif
                        <br>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" placeholder="الإسم الكريم" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input id="password-confirm" type="password" class="form-control" placeholder="أعد كتابة كلمة المرور" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                                <input id="password" type="password" placeholder="كلمة المرور يجب أن لا تقل عن 6 أحرف" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <br>
                        
                        <div class="row">
                        <div class="col-md-6">
                        <div class="{{ $errors->has('city') ? ' has-error' : '' }}">
                            
                                <select id="city" class="form-control" name="city" required>
                                <option value="-1" selected disabled>المدينة</option>
                                </select>
                                
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">             
                        <div class="{{ $errors->has('country') ? ' has-error' : '' }}">
                                <select id="country" class="form-control" name="country" required>
                                <option value="-1" selected disabled>الدولة</option>
                                @foreach($countries as $id=>$country)
                                <option value='{!!$id!!}'>{!!$country!!}</option>
                                @endforeach
                                </select>
                                
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                       
                        <div class="{{ $errors->has('mobile') ? ' has-error' : '' }}">
                               <div class="col-sm-8">
                                <input id="mobile" type="text" placeholder="رقم المحمول" class="form-control" name="mobile" value="{{ old('mobile') }}" maxlength="18" required>
                                 </div>
                        <div class="col-sm-4">
                     <input id="country_code" type="text" placeholder="رمز البلد" class="form-control" name="country_code" value="{{ old('country_code') }}" maxlength="5" required>
                               </div>
                               
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                             </div>
                       <br>
                           <div class="row"> 
                        <div class="col-md-12">
                                <textarea id="info" class="form-control" name="info" placeholder="معلومات أخرى" value="{{ old('info') }}"></textarea> 

                                @if ($errors->has('info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info') }}</strong>
                                    </span>
                                @endif
                        </div>
       </div>
                        <div class="{{ $errors->has('agree') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input type="checkbox" name="agree" value="yes" required="">
                                 أوافق بعد القراءة على جميع ما جاء في 
                                 <a style="vertical-align: middle;" href='{!! URL::to("member-agreement") !!}'>اتفاقية إستخدام موقع دلال مول </a>
                        </div>    
                        </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    التسجيل في الموقع
                                </button>
                        </div>
                    </form>
                    <br><br> <br><br>
    </div>
</div>

<!--script for the ajax cities menu-->
    <script type="text/javascript">
        $('#country').on('change', function(e){
            //console.log(e);
            var country_id= e.target.value;

            //ajax
            $.get('/ajax-city?country_id=' + country_id, function(data){
                //success data
                $('#city').empty();
                $.each(data, function(index, subcatObj){

                    $('#city').append('<option value="'+subcatObj.id+'">'+subcatObj.ar_name+'</option>');
                });
            });
        });
    </script>
@endsection