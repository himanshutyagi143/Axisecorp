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
                                    <a href="https://twitter.com/ecorpaxis" target="_blank"><i class="fa fa-twitter"></i></a>
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
            <header id="site-header" >
                <div id="site-header-inner" class="container">                    
                    <div class="wrap-inner clearfix">
                        <div id="site-logo" class="clearfix">
                            <div id="site-log-inner">
                                <a href="/" rel="home" class="main-logo">
                                    <img src="{{asset('/assets/img/logo.png')}}" alt="AXIS ECORP" width="169" height="39" data-retina="{{asset('/assets/img/logo.png')}}" data-width="169" data-height="39">
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
                                <li class="menu-item menu-item-has-children @yield('about-current-menu')">
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