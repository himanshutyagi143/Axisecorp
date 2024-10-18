<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>YOGVILLAS</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
      <link  href="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/css/custom.css') }}" rel="stylesheet">
      <link href="{{ URL::asset('frontend/css/intlTelInput.min.css') }}" rel="stylesheet" media="screen">
   </head>
   <body>
      <div class="main_container">
         <div class="header">
            <img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/main_banner.jpg') }}">
            <div class="logo"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/logo.png') }}"></div>
            <div class="maharera">MAHARERA: <strong>P52900021552</strong></div>
            <div class="content">
               <p>Are you a</p>
               <h1>Real Estate Consultant ?</h1>
               <p><span>Associate</span> with us for best<br>
                  selling <span>Goan Lifestyle</span> project.
               </p>
               <div class="luxury">
                  Luxury villas starts at 1.35 Crore* Only
               </div>
            </div>
         </div>
         <div class="inq_sec">
            <div class="container">
               <div class="left">
                  <h2>SMART & SERVICED VILLAS <span>IN LAP OF<br>
                     RAINFOREST NATURE TO</span> MATCH YOUR LUXURY.
                  </h2>
               </div>
               <div class="right">
                  <a  data-toggle="modal" data-target="#yogvilla_landing_modal" ><img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/button.jpg') }}"></a>
                  <div class="modal fade in" id="yogvilla_landing_modal" role="dialog">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-body inq-form">
                                  <button type="button" class="close" data-dismiss="modal">×</button>
                                  <div>
                                   
                                   <h3 class="text-center">Show Your Interest</h3>
                                    <form class="contact_form" >
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                 <input type="hidden" name="page_reference" value="yogvillasPromo19May2021">
                                 <input type="hidden" name="srd_id" id="srd_id">
                                 <p><input type="text" class="form-control" name="txtName" value="" placeholder="Enter name " required></p>
                                 <p><input type="text" class="form-control" name="txtEmail" placeholder="Enter email" required></p>
                                 <p><input type="tel" class="form-control" id="telephone2" name="txtPhone" placeholder="Enter phone" required></p>
                                  <p><textarea class="form-control" name="textmsg" placeholder="Write comment" rows="5" cols="5"></textarea></p>
                                 <p style="text-align:center;"><button type="submit" class="submit_btn submit_contact">SUBMIT NOW</button></p>
                               </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
               </div>
            </div>
         </div>
         <div class="main_heading">
            LET YOUR CUSTOMERS GET THE<br>
            HANDSOME RENTAL OPPORTUNITY
         </div>
         <div class="feth_sec">
            <div class="container">
               <h2 class="heading">FEATURES</h2>
               <ul>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/feth-icon1.png') }}">
                     <p>Concept Selling<br>
                        Resort Residences
                     </p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/feth-icon2.png') }}">
                     <p>Modern Amenities<br>
                        Helipad, Go kart & Golf Course
                     </p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/feth-icon3.png') }}">
                     <p>Vastu<br>
                        Compliant
                     </p>
                  </li>
                  <li>
                     <img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/feth-icon4.png') }}">
                     <p>20 Minutes from<br>
                        Mopa International Airport
                     </p>
                  </li>
               </ul>
               <h2 class="heading"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/images/ring.png') }}"></h2>
            </div>
         </div>
         <div class="broker_sec">
            <div class="left"><a data-toggle="modal" data-target="#yogvilla_landing_modal">ATTRACTIVE BROKERAGE</a></div>
            <div class="right">
               <a data-toggle="modal" data-target="#yogvilla_landing_modal">
                  VARIOUS INCENTIVE SCHEMES
            </div>
         </div>
         <div class="footer_sec">
         <div class="container">
         <div class="left">
         <a href="https://axisecorp.com/disclaimer" target="blank">Disclaimer</a>
         <a href="https://axisecorp.com/privacy-policy" target="blank">Privacy Policy</a>
         <a href="https://axisecorp.com/terms-and-condition" target="blank">Terms & Conditions </a>
         </div>
         <div class="right">
         <p> © 2021 Axis Ecorp | All Rights Reserved.</p>
         </div>
         </div>
         </div>
      </div>
      <!-- <div class="modal fade in" id="verification_modal" role="dialog" style="z-index:  99999;">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-body inq-form">
                   <button type="button" class="close" data-dismiss="modal">×</button>
                   <div>
                    
                    <h3 class="text-center">Verify Your Email Otp</h3>
                      <form id="verification_form" class="text-center"> 
                        <div class="form-group">
                           <input type="text" class="form-control" name="verification_code"  required="" placeholder="Enter OTP">
                           <input type="hidden"  value="" id="sender_email">
                           <input type="hidden" name="srd_id" id="srd_id">
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
       </div> -->
     </div>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      <script src="{{ URL::asset('frontend/js/intlTelInput-jquery.min.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/intlTelInput.min.js') }}"></script> 
      <script type="text/javascript" src="{{ URL::asset('frontend/yogvillas/yogvillas_campaign_five/js/custom.js?v=1') }}"></script>
   </body>
</html>