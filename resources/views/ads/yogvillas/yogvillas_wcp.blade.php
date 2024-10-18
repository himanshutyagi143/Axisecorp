<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>WELCOME TO THE GOAN RESORT LIVING</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
     
      <link href="{{ URL::asset('frontend/yogvillas/wcp/css/owl.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="{{ URL::asset('frontend/css/intlTelInput.min.css') }}" rel="stylesheet" media="screen">
	   <link href="{{ URL::asset('frontend/yogvillas/wcp/css/custom.css') }}" rel="stylesheet">

       <!-- Google Tag Manager -->
       <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
               new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
               j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
               'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
           })(window,document,'script','dataLayer','GTM-W6S3PFC');</script>
       <!-- End Google Tag Manager -->
   </head>
   <body>
   <!-- Google Tag Manager (noscript) -->
   <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6S3PFC"
                     height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   <!-- End Google Tag Manager (noscript) -->
      <div class="container-wcp">
         {{--
         <div class="heding2">
            <h1>WELCOME TO THE GOAN RESORT LIVING</h1>
            <p>ESSENCE OF THE NATURE & PREMIUM SMART VILLAS</p>
         </div>
         --}}
         <div class="banner_section">
		 
	 
            <div class="owl-carousel">
               <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/wcp/images/banner-1.jpg') }}" alt="">
                  <div class="container-wcp">
                     <h2>INVESTMENT STARTING FROM RS 1.35 CR*</h2>
                  </div>
               </div>
               <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/wcp/images/banner-2.jpg') }}" alt="">
                  <div class="container-wcp">
                     <h2>WELCOME TO THE GOAN RESORT LIVING</h2>
                  </div>
               </div>
               <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/wcp/images/banner-3.jpg') }}" alt="">
                  <div class="container-wcp">
                     <h2>INVESTMENT STARTING FROM RS 1.35 CR*</h2>
                  </div>
               </div>
               <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/wcp/images/banner-4.jpg') }}" alt="">
                  <div class="container-wcp">
                     <h2>WELCOME TO THE GOAN RESORT LIVING</h2>
                  </div>
               </div>
                <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/cp/images/banner-5.jpg') }}" alt="">
                  <div class="container-wcp">
                     <h2>INVESTMENT STARTING FROM RS 1.35 CR*</h2>
                  </div>
               </div>
            
            
               <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/cp/images/banner-6.jpg') }}" alt="">
                  <div class="container-wcp">
                      <h2>WELCOME TO THE GOAN RESORT LIVING</h2>
                  </div>
               </div>
            
            
            
                  <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/cp/images/banner-7.jpg') }}" alt="">
                  <div class="container-wcp">
                     <h2>INVESTMENT STARTING FROM RS 1.35 CR*</h2>
                  </div>
               </div>
                        
                  
                   <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/cp/images/banner-8.jpg') }}" alt="">
                  <div class="container-wcp">
                     <h2>WELCOME TO THE GOAN RESORT LIVING</h2>
                  </div>
               </div>
            </div>
            <div class="logo_outer">
               <div class="logo"><img src="{{ URL::asset('frontend/yogvillas/wcp/images/logo.png') }}" alt="YOGVILLAS"></div>
               <div class="rotate"><img src="{{ URL::asset('frontend/yogvillas/wcp/images/rotate.png') }}" id="round"></div>
               <!--<div class="price"><img src="frontend/yogvillas/wcp/images/price.png"></div>-->
            </div>
			
			
<div class="inq_form">

<h3 class="text-center"><i class="fa fa-envelope"></i> GET IN TOUCH WITH US</h3>
<form class="js-ajax-form contact_form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="row-field row">
<div class="col-field col-sm-12 col-md-12">
<div class="form-group">
<input type="text" class="form-control" name="txtName" required placeholder="Name *">
</div>
<div class="form-group">
<input type="email" class="form-control" name="txtEmail" required placeholder="Email *">
</div>
</div>
<div class="col-field col-sm-12 col-md-12">
<div class="form-group">
<input type="tel" class="form-control" id="telephone2" name="txtPhone" required placeholder="phone *">
<input type="hidden" name="page_reference" value="yogvillas_ad">
</div>
</div>
<div class="col-field col-sm-12 col-md-12">
<div class="form-group">
<textarea class="form-control" name="txtMsg" id="textmsg" placeholder="Message"></textarea>
</div>
</div>
<div class="col-message col-field col-sm-12">
<div class="form-group">
<div class="success-message"><i class="fa fa-check text-primary"></i> Thank you!. Your message is sent successfully.</div>
<div class="error-message">We're sorry, but something went wrong.</div>
</div>
</div>
</div>
<div class="form-submit text-right"><button type="submit" class="btn btn-shadow-2 wow swing submit_contact">Send <i class="icon-next"></i></button></div>
</form>
</div>
	
			
			
			
			
			
			
         </div>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      <div class="feathure_sec">
         <div class="inner_container">
            <div class="feathure_sec">
               <h2 class="title">FEATURES</h2>
               <ul>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/wcp/images/fethure-icon1.png') }}" alt="#">
                     <p>Smart and Serviced Villas - Fully Furnished With Private Garden and Pool</p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/wcp/images/fethure-icon2.png') }}" alt="#">
                     <p>Resort<br> Residences</p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/wcp/images/fethure-icon3.png') }}" alt="#">
                     <p>Modern Amenities like <br>Helipad, Go-Kart & Golf Course</p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/wcp/images/fethure-icon4.png') }}" alt="#">
                     <p>MAHARERA<br>Registered</p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/wcp/images/fethure-icon5.png') }}" alt="#">
                     <p>Vastu<br> Compliant</p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/wcp/images/fethure-icon6.png') }}" alt="#">
                     <p>20 Minutes from<br> Mopa International Airport* </p>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- <div class="call_section">
         <div class="inner_container">
            <div class="right">
               <div class="call"><a href="tel:+91 807-000-4400">CLICK HERE TO CALL</a></div>
            </div>
         </div>
      </div> -->
      <!-- <div class="mobile-section">
         <a href="" class="mobilebtn" title="Enquire Now" data-toggle="modal" data-target="#myModal2"> Enquire Now</a>
         <a href="tel:+91 807-000-4400" class="mobilebtn">  Tap To Call</a>
      </div>
 -->      <!-- Modal form -->
      <!-- <div class="modal fade in " id="yogvilla_landing_modal" role="dialog" style="z-index: 99999;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body inq-form">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div>
                     
                     <h3 class="text-center"><i class="fa fa-envelope"></i>  GET IN TOUCH WITH US</h3>
                     <form class="js-ajax-form contact_form">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row-field row">
                           <div class="col-field col-sm-12 col-md-12">
                              <div class="form-group">
                                 <input type="text" class="form-control" name="txtName" required placeholder="Name *">
                              </div>
                              <div class="form-group">
                                 <input type="email" class="form-control" name="txtEmail" required placeholder="Email *">
                              </div>
                           </div>
                           <div class="col-field col-sm-12 col-md-12">
                              <div class="form-group">
                                 <input type="tel" class="form-control" id="telephone2" name="txtPhone" required placeholder="e.g. +1 702 123 4567">
                                 <input type="hidden" name="page_reference" value="yogvillas_ad">
                              </div>
                           </div>
                           <div class="col-field col-sm-12 col-md-12">
                              <div class="form-group">
                                 <textarea class="form-control" name="txtMsg" id="textmsg" placeholder="Message"></textarea>
                              </div>
                           </div>
                           <div class="col-message col-field col-sm-12">
                              <div class="form-group">
                                 <div class="success-message"><i class="fa fa-check text-primary"></i> Thank you!. Your message is sent successfully.</div>
                                 <div class="error-message">We're sorry, but something went wrong.</div>
                              </div>
                           </div>
                        </div>
                        <div class="form-submit text-right"><button type="submit" class="btn btn-shadow-2 wow swing submit_contact">Send <i class="icon-next"></i></button></div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
      </div> -->
      <!-- End Modal form -->
      <!-- Verification modal -->
      <!--======== Verification otp modal ======== -->

     <div class="modal fade in" id="verification_modal" role="dialog" style="z-index:  99999;">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-body inq-form">
                   <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
                   <div>
                    
                    <h3 class="text-center">Verify Your Email Otp</h3>
                      <form id="verification_form" class="text-center"> 
                        <div class="form-group">
                           <input type="text" class="form-control" name="verification_code"  required="" placeholder="Enter OTP">
                           <input type="hidden"  value="" id="sender_email">
                           <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
                        </div>
                        <div class="field">
                           <input type="submit" value="VERIFY" class="btn Click-here2" id="submit3">
                           <button class="btn" id="loader_gif3" style="display: none;"> <image style="height:20px;width:20px;"   src="https://gifimage.net/wp-content/uploads/2017/08/loading-gif-transparent-25.gif"></image>
                              </button>
                      </div>
                      </form>
                   </div>
               </div>
           </div>
       </div>
     </div>
      <div class="new_footer">
         <div class="inner_container">
            <div class="mid">
               <a target="_blank" href="/disclaimer">Disclaimer</a>
               <a target="_blank" href="/privacy-policy">Privacy Policy</a>
               <a target="_blank" href="/terms-and-condition">Terms &amp; Conditions </a>
            </div>
            <div class="right">
               <p> © 2021 Axis Ecorp | All Rights Reserved.</p>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      <script src="{{ URL::asset('frontend/yogvillas/wcp/js/owl.js') }}"></script>
      <script src="{{ URL::asset('frontend/yogvillas/wcp/js/custom.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/interface.min.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/lightbox/lity.min.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/intlTelInput.min.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/intlTelInput-jquery.min.js') }}"></script>
   </body>
</html>