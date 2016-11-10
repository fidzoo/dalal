@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        @if (Session::get('reg_group') == 'merchant')
                        <input type="hidden" name="user_group" value="merchant">
                        @elseif (Session::get('reg_group') == 'buyer')
                        <input type="hidden" name="user_group" value="buyer">
                        @elseif (Session::get('reg_group') == 'admin')
                        <input type="hidden" name="user_group" value="admin">
                        @endif
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="يجب أن لا تقل عن 6 أحرف" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
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

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
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

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="country_code" type="text" placeholder="رمز البلد" class="form-control" name="country_code" value="{{ old('country_code') }}" maxlength="5" required>
                                <input id="mobile" type="text" placeholder="رقم المحمول" class="form-control" name="mobile" value="{{ old('mobile') }}" maxlength="18" required>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('agree') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input type="checkbox" name="agree" value="yes" required=""> I agree to dalal.com website Membership Agreement. <a href='{!! URL::to("member-agreement") !!}'>View Agreement</a></label></div>    
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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