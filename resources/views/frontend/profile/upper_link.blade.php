<div class="header yv_menu header_black header-style-2 topbar-style-1 ">
  <div id="page" class="clearfix">
        <!-- Header Wrap -->
        <div id="site-header-wrap">
            <!-- Top Bar -->        
            <div id="top-bar">
                <div id="top-bar-inner" class="container">
                    <div class="top-bar-inner-wrap">
                        <div class="top-bar-content">
                            <div class="inner">
                                <span class="address content">305, Gera Imperium Grand, Patto Area, Panaji, Goa 403001 (INDIA)</span>
                                <span class="phone content">+91 807-000-4400</span>
                                <span class="time content">Mon-Sat: 9:00am - 6:00pm</span>
                            </div>                            
                        </div><!-- /.top-bar-content -->

                        <div class="top-bar-socials">
                            <div class="inner">
                                <span class="text">Follow us:</span>
                                <span class="icons">
                                    <a href="https://www.facebook.com/AxisECorp/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/AxisEcorp" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/company/axis-ecorp/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/axisecorp/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/channel/UCJcC_eB2MO61CpXwxgKkA-w" target="_blank"><i class="fa fa-youtube"></i></a>
                                </span>
                            </div>
                        </div><!-- /.top-bar-socials -->
                    </div>                    
                </div>
            </div><!-- /#top-bar -->

            <!-- Header -->
            <header id="site-header">
                <div id="site-header-inner" class="container">                    
                    <div class="wrap-inner clearfix">
                        <div id="site-logo" class="clearfix">
                            <div id="site-log-inner">
                                <a href="/" rel="home" class="main-logo">
                                    <img src="assets/img/logo.png" alt="AXIS ECORP" width="169" height="39" data-retina="assets/img/logo.png" data-width="169" data-height="39">
                                </a>
                            </div>
                        </div><!-- /#site-logo -->

                        <div class="mobile-button">
                            <span></span>
                        </div><!-- /.mobile-button -->

                        <nav id="main-nav" class="main-nav">
                            <ul id="menu-primary-menu" class="menu">
                                <li class="menu-item menu-item-has-children @yield('home-current-menu')">
                                    <a href="/">HOME</a>  
                                    </li>
                                     <!--<li class="menu-item menu-item-has-children">
                                    <a href="about.html">ABOUT US </a>   </li>-->

                                <li class="menu-item menu-item-has-children @yield('about-current-menu')" >
                                    <a href="/about">ABOUT</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="/about">ABOUT AXIS ECORP	</a></li>
                                        <li class="menu-item"><a href="/team">OUR TEAM</a></li>
                                        <li class="menu-item"><a href="/vision">VISION/MISSION</a></li>
                                        <li class="menu-item"><a href="/corporate">CORPORATE PHILOSOPHY</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children @yield('project-current-menu')">
                                    <a href="/axisblues">PROJECTS</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="/axisblues">AXIS BLUES</a></li>
                                        <li class="menu-item"><a href="/yogvillas">AXIS YOG VILLAS</a></li>
                                        <li class="menu-item"><a href="/lakecity">AXIS LAKECITY</a></li>
                                        <li class="menu-item"><a href="/kncj">AXIS KNCJ - DARJEELING</a></li>
                                        {{--<li class="menu-item"><a href="/turboin">AXIS TURBOIN</a></li>--}}
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children @yield('blog-current-menu')">
                                    <a href="/blogs">BLOGS</a>
                                </li>
                                <li class="menu-item menu-item-has-children @yield('news-current-menu')">
                                    <a href="/news">NEWS</a>
                                </li>
                                <li class="menu-item menu-item-has-children @yield('contact-current-menu')">
                                    <a href="/contact">CONTACT</a>
                                </li>
                                
                                {{--<li class="menu-item menu-item-has-children @yield('onlinepayment-current-menu')">
                                    <a href="/outer-user-payment">PAYMENT ONLINE</a>
                                </li>--}}
                                
                                
                            </ul>
                        </nav><!-- /#main-nav -->

                       
                    </div><!-- /.wrap-inner -->                    
                </div><!-- /#site-header-inner -->
            </header><!-- /#site-header -->
        </div><!-- #site-header-wrap -->
    </div><!-- #site-header-wrap -->
   <!-- 
   <div class="container">
      <div class="row">
         <div class="col-lg-2 col-sm-2 col-xs-2">
            <div class="header_btn">
               @if($_SERVER['REQUEST_URI']=='/caseorchid')
               <h1 class="logo"><img src="https://casaweb.org/wp-content/uploads/2015/12/logo@2x.png" style="width:127px;"  /></h1>
               @else
               <h1 class="logo"><img id="logoimg" src="" style="display:none;" /></h1>
               @endif
            </div>
         </div>
         <div class="col-lg-10 col-sm-10 col-xs-10 nav_panel">
            <nav class="overlay-menu ">
               
               <ul>
               @if(Request::segment(1) != "veryifyotp_for_booking" && Request::segment(1) != "veryifyUnit_for_booking")
                  <li @if(Request::segment(1)=='') class="active" @endif><a href="/">Home</a></li>
                  <li @if(Request::segment(1)=='aboutus') class="active" @endif><a href="/aboutus">About </a></li>
                  <li @if(Request::segment(1)=='axisblues' || Request::segment(1)=='yogvillas') class="dropdown active" @else class="dropdown" @endif>
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Project<span class="fa fa-angle-down arrow-down"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="/axisblues">Axis Blues</a></li>
                        <li><a href="/yogvillas" >Axis Yog Villas</a></li>
                     </ul>
                  </li>

                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Corporate<span class="fa fa-angle-down arrow-down"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/corporate" >Corporate philosophy</a></li>
                        <li><a href="/vision" >Vision / Mission</a></li>
                        <li><a href="/team">Our team</a></li>
                     </ul>
                  </li>
                  <li @if(Request::segment(1)=='contact') class="active" @endif ><a  href="/contact">Contact</a></li>  
				  <li><a  href="/outer_user_payment">Online Payment</a></li>
                  @endif
               </ul>

            </nav>
            <div class="button_container" id="toggle" style="z-index:1111; display:none;" >
               <img src="/fronted/img/menu.png">
            </div>
         </div>
      </div>
   </div>
   -->
   
   
   
<div class="clearfix"></div>
</div>





<script src="/fronted/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$('#logoimg').show();
$('#logoimg').attr('src','/fronted/img/logo-white.png');
</script>

<script src="{{ URL::asset('assets/js/main.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins.js') }}"></script>




