@extends('layout.auth.auth');

@section('title', 'Register')

@section('content')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <a href="javascript:void(0)" class="text-center db"><img src="../assets/images/logo-icon.png" alt="Home" /><br/><img src="../assets/images/logo-text.png" alt="Home" /></a>
                    <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small>
                    
                <form class="form-horizontal form-material form-control-line" id="loginform" action="{{route('signUpStore')}}" method="post">
                    @csrf
                    
                    @if(Session::has('response'))
					<div class="alert alert-{{Session::get('response')['class']}} alert-rounded">
					{{Session::get('response')['message']}}
					</div>
				    @endif
                    <div class="m-t-20 form-group @if($errors->has('name')) has-danger @endif">
                        <div class="col-xs-12">
                            <input class="form-control @if($errors->has('name')) form-control-danger @endif" type="text" name="name" value="{{old('name')}}" placeholder="Name">
                        </div>
                        @if ($errors->has('name'))
                        <span class="form-control-feedback">{{ $errors->first('name') }}</span>
                    @endif    
                    </div>
                    
                    
                    <div class="form-group m-t-20 @if($errors->has('username')) has-danger @endif">
                        <div class="col-xs-12">
                            <input class="form-control @if($errors->has('username')) form-control-danger @endif" type="text" name="username" value="{{old('username')}}" placeholder="User Name">
                        </div>
                        @if ($errors->has('username'))
                        <span class="form-control-feedback">{{ $errors->first('username') }}</span>
                    @endif      
                    </div>
                  
                    <div class="form-group m-t-20 @if($errors->has('contact')) has-danger @endif">
                        <div class="col-xs-12">
                            <input class="form-control @if($errors->has('contact')) form-control-danger @endif" type="text" name="contact" value="{{old('contact')}}" placeholder="Contact">
                        </div>
                        @if ($errors->has('contact'))
                        <span class="form-control-feedback">{{ $errors->first('contact') }}</span>
                    @endif    
                    </div>
                    
                    <div class="form-group @if($errors->has('email')) has-danger @endif">
                        <div class="col-xs-12">
                            <input class="form-control @if($errors->has('email')) form-control-danger @endif" type="text" name="email" value="{{old('email')}}" placeholder="Email">
                        </div>
                        @if ($errors->has('email'))
                        <span class="form-control-feedback">{{ $errors->first('email') }}</span>
                    @endif    
                    </div>
                    
                    <div class="form-group @if($errors->has('password')) has-danger @endif">
                        <div class="col-xs-12">
                            <input class="form-control @if($errors->has('password')) form-control-danger @endif" type="password" name="password" placeholder="Password">
                        </div>
                        @if ($errors->has('password'))
                        <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                    @endif   
                    </div>
                    <div class="form-group @if($errors->has('password')) has-danger @endif">
                        <div class="col-xs-12">
                            <input class="form-control @if($errors->has('password')) form-control-danger @endif" type='password_confirmation' name='password_confirmation' placeholder="Confirm Password">
                        </div>
                        @if ($errors->has('password'))
                        <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                    @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                            </div>
                        </div>
                       
                    </div>

                   
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="{{route('signin')}}" class="text-info m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
		</div>
   </section>

   @endsection