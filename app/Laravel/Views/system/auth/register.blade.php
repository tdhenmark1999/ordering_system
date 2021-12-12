@extends('system._layouts.auth')

@section('content')
<div class="be-wrapper be-login">
  <div class="be-content">
    <div class="main-content container-fluid">
      <div class="splash-container">
        @include('system._components.notifications')
        <div class="panel panel-default panel-border-color panel-border-color-primary">
          <div class="panel-heading"><img src="{{asset('uploads/images/Capture.PNG')}}" alt="logo" width="auto" height="90" class="logo-img">
          <span class="splash-description">This is intended for all <strong>users</strong>
           that doesn't have an account yet. <strong class="text-danger">
             </strong></span></div>
          <div class="panel-body">
            <form action="" method="POST">
              {!!csrf_field()!!}
              <div class="form-group {{$errors->first('name') ? 'has-error' : NULL}}">
                <input id="name" name="name" type="text" placeholder="Your Name" autocomplete="off" class="form-control" value="{{old('name')}}">
                @if($errors->first('name'))
                <span class="help-block">{{$errors->first('name')}}</span>
              @endif
              </div>
         
             

              <div class="form-group {{$errors->first('username') ? 'has-error' : NULL}}">
                <input id="username" name="username" type="text" placeholder="Username" autocomplete="off" class="form-control" value="{{old('username')}}">
                @if($errors->first('username'))
                <span class="help-block">{{$errors->first('username')}}</span>
              @endif
              </div> 
              <div class="form-group {{$errors->first('email') ? 'has-error' : NULL}}">
                <input id="email" name="email" type="text" placeholder="Email Address" autocomplete="off" class="form-control" value="{{old('email')}}">
                @if($errors->first('email'))
                <span class="help-block">{{$errors->first('email')}}</span>
              @endif
              </div>
              <div class="form-group {{$errors->first('password') ? 'has-error' : NULL}}">
                <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                @if($errors->first('password'))
                <span class="help-block">{{$errors->first('password')}}</span>
              @endif
              </div>
              <div class="form-group {{$errors->first('password_confirmation') ? 'has-error' : NULL}}">
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Verify Password" class="form-control">
                @if($errors->first('password_confirmation'))
                <span class="help-block">{{$errors->first('password_confirmation')}}</span>
              @endif
              </div>
              <!-- <div class="form-group row login-tools">
                <div class="col-xs-6 login-remember">
                  <div class="be-checkbox">
                    <input type="checkbox" id="remember" name="auto_login" value="1" {{old('auto_login',1) == "1" ? 'checked="checked"' : NULL}}>
                    <label for="remember">Auto Login</label>
                  </div>
                </div> -->
                <!-- <div class="col-xs-12 login-forgot-password">Don't have an account? <a href="#">Sign up</a></div>  -->
              </div>
              <div class="form-group login-submit">
                <button data-dismiss="modal" type="submit" class="btn bg-green btn-xl text-white">Register Account</button>
              </div>
              <div class="col-xs-12 text-center mb-5" style="font-size:14px;margin-bottom:20px">Do you have an account? <a href="{{route('system.login')}}">Sign in</a></div> 

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop