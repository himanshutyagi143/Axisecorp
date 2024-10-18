@extends('frontend.master')

@section('content')

       <div class="main" id="innerpage">
            <!-- banner -->
            <div class="banner">
                <!--Slider-->
                @include('frontend.profile.upper_link')

        
                <div id="demo-2" data-zs-src='["/fronted/images/2.jpg"]' data-zs-overlay="dots">
                    <div class="demo-inner-content">
                        <div class="baner-info">
                            <h3>SignIn / <span> Sign Up</span></h3>
                        </div>	
                    </div>
                </div>
                <!--//Slider-->

            </div>
            <!-- //banner -->
        </div>

        <!-- about -->
        <div class="contact" id="contact">
			   <div class="container">  
                <h3 class="w3l_head">Login</h3>
                <p class="w3ls_head_para">Sign in | Sign up</p>
                <div class="main-agile1">
                    <div class="w3layouts-main rgt_bdr">
                        <!---728x90--->
						
						
			 @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				 @if(Session::has('success-msg'))
                                <p class="alert alert-danger">{{ Session::get('success-msg') }}</p>
                     @endif
						
						
						
						
                        <h2>Sign In</h2>
                        <!--                        <span class="end">(or)</span>-->
                        <form class="loginForm" action="/login" method="post">
						 <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="email">
                                <input placeholder="E-Mail" name="email" type="email" required="">
                                <span class="icons i1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="email">
                                <input placeholder="Password" name="password" type="password" required="">
                                <span class="icons i2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                            </div>
                            <input type="submit" value="Login" name="login">
                        </form>

                        <div class="signin-break-wrapper">
                            <span class="aws-signin-color-mid-gray">Signin with</span>
                        </div>
                        <div class="social_icons agileinfo">
                            <ul class="top-linking">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>


                    </div>
                    <div class="main-agile">
                        <div class="alert-close"> </div>

                        <div class="content-wthree">
                            <h2>SIGN UP</h2>
                            <i class="fa fa-home" aria-hidden="true"></i>

                            <p><i class="fa fa-check" aria-hidden="true"></i> Save your dream homes and stay updated on your favourite searches, across any device.</p>
                            <p><i class="fa fa-check" aria-hidden="true"></i> Receive open for inspection planners and our comprehensive weekly auction results.</p>
                            <p><i class="fa fa-check" aria-hidden="true"></i> Get instant queries over Phone, Email and SMS</p>



                        </div>

                        <a href="/user_register" class="btn_style1">Create account</a>

                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div> 



@stop