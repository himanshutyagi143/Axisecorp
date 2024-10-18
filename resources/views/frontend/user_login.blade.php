@extends('frontend.master')

@section('content')

        <div class="main" id="innerpage">
            <!-- banner -->
            <div class="banner">
			  <header id="header">
  <div class="col-md-3 Mainlogo">
  <a href="/"><img src="http://bellatoral.com/wp-content/themes/newbellator/images/website-logo.png" style="border:0px;"></a></div>
	<a href="/login"><div class="sign_button">sign in</div></a>
  <div class="button_container" id="toggle">
                    <div class="arrow-down"></div>
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
  
    <div class="overlay" id="overlay">
                    <nav class="overlay-menu">
                        <ul>
                            <li ><a href="/">Home</a></li>
                            <li><a href="/aboutus">About Us</a></li>
                            <li><a href="/axisblues">Axis Blues</a></li>
							<li><a href="/caseorchid">Casa Orchid</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/login">Sign Up</a></li>
                        </ul>
                    </nav>
                </div>
				
				</header>
                <!--Slider-->
               

             
				
			

                <div id="demo-2" data-zs-src='["/fronted/images/2.jpg"]' data-zs-overlay="dots">
                    <div class="demo-inner-content">
                        <div class="baner-info">
                            <h3> Sign Up</span></h3>
                        </div>	
                    </div>
                </div>
                <!--//Slider-->

            </div>
            <!-- //banner -->
        </div>
		
		
		 


        <div class="contact" id="contact">
            <div class="container">
			
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
			
			
                <h3 class="w3l_head">Login</h3>
                <!--                <p class="w3ls_head_para">Create Account</p>-->
				
				
				
                <div class="col-sm-6  col-sm-offset-3">
                    <div class="agileits_w3layouts_contact">
                        <div class="modal__dialog">
                            <div class="modal__content">
                                <div class="panel panel-default loginPanel">
                                    <div class="panel-heading text-center form_header">EXISTING  Users Login</div>
									
                                    <div class="panel-body">
                                        <form class="loginForm" action="/login" method="post">
										 <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group">
                                                <label for="userName">Email Address *</label>
                                                <input type="email" class="form-control" name="email">
                                                <p class="help-block">Enter your email .</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="userPassword">Password *</label>
                                                <input type="password" class="form-control" name="password">
                                                <p class="help-block">Enter the password that accompanies your username.</p>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success pull-left">Log In</button>
                                               
								   <a data-toggle="modal" data-target="#myModal"class="pull-right link">Fogot Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div> 
		
		
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="/password/email" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Forget Password?</h4>
                                </div>
                                <div class="modal-body">


                                        @if(Session::has('success-msg'))
                                            <p class="alert alert-danger">{{ Session::get('success-msg') }}</p>
                                        @endif
                                            <div class="input-group input-group-md">
                                                <span class="input-group-addon" id="sizing-addon1">@</span>
                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
                                            </div>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                                    </form>

                            </div>
                        </div>
                    </div>
              
	

@stop