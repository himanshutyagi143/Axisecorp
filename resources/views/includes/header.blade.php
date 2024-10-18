<?php
    $routesegment = \Request::segment(1)??"";
?>   

<!--
      <div class="loader">
         <div class="page-lines">
            <div class="container">
               <div class="col-line col-xs-4">
                  <div class="line"></div>
               </div>
               <div class="col-line col-xs-4">
                  <div class="line"></div>
               </div>
               <div class="col-line col-xs-4">
                  <div class="line"></div>
                  <div class="line"></div>
               </div>
            </div>
         </div>
		
         <div class="loader-brand">
            <div class="sk-folding-cube">
               <div class="sk-cube1 sk-cube"></div>
               <div class="sk-cube2 sk-cube"></div>
               <div class="sk-cube4 sk-cube"></div>
               <div class="sk-cube3 sk-cube"></div>
            </div>
         </div>
		
      </div>
	   -->
	  
      <header id="top" class= "@if(!empty($routesegment)) header-inner @else header-home @endif" >
         <div class="brand-panel @if(!empty($routesegment)) background-header @endif ">
            <a href="/" class="brand js-target-scroll">
            <img src="{{ URL::asset('frontend/img/others/logo.png') }}" alt="Axis ecorp">
            </a>
			
            <div class="brand-name">Axis ecorp</div>
            {{--
            <div class="slide-number">
               <span class="current-number text-primary">0<span class="count">1</span></span>
               <sup><span class="delimiter">/</span> 0<span class="total-count"></span></sup>
            </div> --}}
         </div>
         <div class="vertical-panel @if(!empty($routesegment)) background-header @endif " ></div>
         <nav class="navbar-desctop visible-md visible-lg">
            <div class="container">
			<p class="brand js-target-scroll">
               <a href="/" class="brand js-target-scroll">
               <img src="{{ URL::asset('frontend/img/others/logo.png') }}" alt="Axis ecorp">
               </a>
			   </p>
               <ul class="navbar-desctop-menu">
                  <li class="{{ $routesegment == ''?'active':''}}">
                     <a href="/">Home</a>
                  </li>
                  <li class="{{ $routesegment == 'about-us' || $routesegment == 'our-team' || $routesegment == 'our-vision' || $routesegment == 'corporate-philosophy' ?'active':''}}">
                     <a href="#">About us</a>
                     <ul>
                        <li><a href="/about-us">ABOUT AXIS ECORP</a></li>
                        <li><a href="/our-team">OUR TEAM</a></li>
						<?php /* ?>
						 <li><a href="/our-associate">OUR Associate</a></li> <?php */ ?>
                        <li><a href="/our-vision">Our Vision / Mission</a></li>
                        <li><a href="/corporate-philosophy">Corporate Philosophy </a></li>
                     </ul>
                  </li>
                  <li class="{{ $routesegment == 'axisblues' || $routesegment == 'yogvillas' || $routesegment == 'lakecity' || $routesegment == 'kncz' ?'active':''}}">
                     <a href="#">Projects</a>
                     <ul>
                        <li><a href="/axisblues">AXIS BLUES</a></li>
                        <li><a href="/villas-in-goa">AXIS YOG VILLAS</a></li>
                        <li><a href="/lakecity">AXIS LAKE CITY</a></li>
                        <li><a href="/kncz">AXIS KNCZ</a></li>
                        <li><a href="/lakecityplaza">AXIS LAKE CITY PLAZA</a></li>
                     </ul>
                  </li>
                   <li class="{{ $routesegment == 'blogs'?'active':''}}"><a href="/blogs">Blogs</a></li>
                  <li class="{{ $routesegment == 'news'?'active':''}}"><a href="/news">News</a></li>
                  <li class="{{ $routesegment == 'contact'?'active':''}}"><a href="/contact">Contact</a></li>
                  <li class="phone"><a href="tel:+91 807-000-4400"><i class="fas fa-phone"></i> +91 807-000-4400</a></li>
               </ul>
            </div>
         </nav>
         <nav class="navbar-mobile">
            <a href="#top" class="brand js-target-scroll">
            <img src="{{ URL::asset('frontend/img/others/logo.png') }}" alt="Axis ecorp">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-mobile">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-mobile">
               <ul class="navbar-nav-mobile">
                  <li class="active"><a href="/">Home </a></li>
                  <li>
                     <a href="#">About<i class="fa fa-angle-down"></i></a>
                     <ul>
                        <li><a href="/about-us">ABOUT AXIS ECORP</a></li>
                        <li><a href="/our-team">OUR TEAM</a></li>
                        <li><a href="/our-vision">Our Vision / Mission</a></li>
                        <li><a href="/corporate-philosophy">Corporate Philosophy </a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="#">Projects <i class="fa fa-angle-down"></i></a>
                     <ul>
                        <li><a href="/axisblues">AXIS BLUES</a></li>
                        <li><a href="/villas-in-goa">AXIS YOG VILLAS</a></li>
                        <li><a href="/lakecity">AXIS LAKE CITY</a></li>
                        <li><a href="/kncz">AXIS KNCZ</a></li>
                        <li><a href="/lakecityplaza">AXIS LAKE CITY PLAZA</a></li>
                     </ul>
                  </li>
                  <!--<li><a href="/blogs">Blog</a></li>-->
                  <li><a href="/">News</a></li>
                  <li><a href="/contact">Contact</a></li>
               </ul>
            </div>
         </nav>
      </header>
	  
	  
