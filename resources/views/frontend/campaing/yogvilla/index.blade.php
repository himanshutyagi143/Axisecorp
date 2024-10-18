<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>YOGVILLAS</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700|Roboto:300,400,500,700&display=swap"
         rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
      <link href="{{ URL::asset('assets/css/campaingcss/custom.css') }}" rel="stylesheet">
      <link href="{{ URL::asset('assets/css/campaingcss/owl.css') }}" rel="stylesheet">
      <link href="{{ URL::asset('assets/css/campaingcss/tabsy.css') }}" rel="stylesheet">
      <link href="{{ URL::asset('assets/css/campaingcss/lightbox.min.css') }}" rel="stylesheet">
   </head>
   <body class="hero-bkg-animated">
      <div class="header">
         <div class="container">
            <div class="logo"><a href="#"><img src="{{asset('/assets/img/campaingimages/new-logo.png')}}" alt="Axis Blues"></a></div>
            <div class="nav">
               <a href="#" class="mobile_nav"><i class="fa fa-bars" aria-hidden="true"></i></a>
               <ul>
                  <li><a href="#home">Home</a></li>
                  <li><a href="#about">Overview</a></li>
                  <li><a href="#amenities">Amenities</a></li>
                  <li><a href="#unitdetail">Floor Plan </a></li>
                  <li><a href="#price">Price</a></li>
                  <li><a href="#gallery">Gallery</a></li>
                  <li><a href="#contact">Contact Us</a></li>
                  <li class="phone"><a href="#inquire"><i class="fa fa-edit" aria-hidden="true"></i> Enquire Now</a></li>
               </ul>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div id="inquire">
         <div class="banner_sec" id="home">
            <img src="{{asset('/assets/img/campaingimages/banner.png')}}" alt="">
            <a href="https://ecai-dev.s3-eu-west-1.amazonaws.com/documents/document_files/Axis+blue+brouchure+price+list_New_6.pdf" download id="download_price_list" hidden></a>
            <div class="form">
               <form id="enquiryform1">
                {{csrf_field()}}
                <!-- <input type="hidden" id="first_csrf" name="_token" value="{{ csrf_token() }}" /> -->
                  <div class="heading">Enquiry Form</div>
                  <span class="alert alert-light" id="enquiry-msg"></span>
                  <div class="field">
                     <label>Your Name*</label>
                     <input type="text" class="inp" value="" name="user_name" required>
                  </div>
                  <div class="field">
                     <label>Your Email*</label>
                     <input type="text" class="inp" name="user_email">
                  </div>
                  <div class="field">
                     <label>Your Phone*</label>
                     <input type="text" class="inp" name="user_phone">
                  </div>
                  <div class="field">
                     <label>Your Query*</label>
                     <textarea class="area" name="user_query" id="user_query"></textarea>
                  </div>
                  <div class="field">
                     <input type="submit" value="SUBMIT NOW" name="sendmail" class="btn" id="submit1">
                     <button class="btn" id="loader_gif" style="display: none;"> <image style="height:20px;width:20px;"   src="https://gifimage.net/wp-content/uploads/2017/08/loading-gif-transparent-25.gif"></image>
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      </div>
      <div class="abt_sec" id="about">
         <div class="container">
            <div class="left">
               <div class="main_heading">Welcome to The <span>Goan Resort Living</span></div>
               <p>Right from the magical beaches to the warm people, Goa invites you to a lifestyle where the party never
                  ends. Taking inspiration from this amazing culture, we have created a resort-like paradise in one of
                  Goa’s pristine locations. Inspired by European clustered-town designs, Axis Yog Villas offers smart
                  vacation villas accentuated by nature and replete with all modern comforts & conveniences.
               </p>
               <div class="smrt_living">
                  <div class="arrow"><img src="{{asset('/assets/img/campaingimages/arrow.png')}}" alt=""></div>
                  <ul>
                     <li>
                        <img src="{{asset('/assets/img/campaingimages/smrt_icon1.png')}}" alt="">
                        <span>Smart Living</span>
                     </li>
                     <li>
                        <img src="{{asset('/assets/img/campaingimages/smrt_icon2.png')}}" alt="">
                        <span>Vastu Compliance</span>
                     </li>
                     <li>
                        <img src="{{asset('/assets/img/campaingimages/smrt_icon3.png')}}" alt="">
                        <span>Private Pool Villa</span>
                     </li>
                     <li>
                        <img src="{{asset('/assets/img/campaingimages/smrt_icon4.png')}}" alt="">
                        <span>Sport & Healthcare Club </span>
                     </li>
                     <li>
                        <img src="{{asset('/assets/img/campaingimages/smrt_icon5.png')}}" alt="">
                        <span>Security & Transport </span>
                     </li>
                     <li class="none_web">
                        <img src="{{asset('/assets/img/campaingimages/smrt_icon6.png')}}" alt="">
                        <span>Sports </span>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="right"><img src="{{asset('/assets/img/campaingimages/about.png')}}" alt=""></div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="amenities_sec" id="amenities">
         <div class="container">
            <div class="left">
               <div><img src="{{asset('/assets/img/campaingimages/round.png')}}" alt="" class="loading"></div>
               <div class="main_heading">Resort Living <span>Amenities</span></div>
               <p>Our lavish amenities are central to the Yog Villas promise of an enjoyable lifestyle to its
                  residents.
               </p>
            </div>
            <div class="right">
               <ul>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon1.png')}}" alt=""> <span>Health Club</span></li>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon2.png')}}" alt=""> <span>Clubbing</span></li>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon3.png')}}" alt=""> <span>24/7 Housekeeping</span></li>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon5.png')}}" alt=""> <span>Spa & Gym</span></li>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon6.png')}}" alt=""> <span>Landscape</span></li>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon7.png')}}" alt=""> <span>Sports</span></li>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon8.png')}}" alt=""> <span>Food, Drinks & More </span></li>
                  <li><img src="{{asset('/assets/img/campaingimages/ani-icon4.png')}}" alt=""> <span>Private Pool </span></li>
               </ul>
               <div class="clear"></div>
            </div>
         </div>
      </div>
      <div class="unitdetail_sec" id="unitdetail">
         <div class="container">
            <div class="main_heading">EXPLORE <span>FLOOR pLANS</span></div>
            <ul class="tabs">
               <li class="tab-link current" data-tab="tab-1">3D PLAN</li>
               <li class="tab-link" data-tab="tab-2">2D PLAN</li>
            </ul>
            <div id="tab-1" class="tab-content current">
               <div class="left">
                  <a class="example-image-link" href="{{asset('/assets/img/campaingimages/GROUND_FLOOR.png')}}" data-lightbox="example-set"
                     data-title="">
                  <img src="{{asset('/assets/img/campaingimages/GROUND_FLOOR.png')}}" alt=""></a>
                  <p>Ground Floor</p>
               </div>
               <div class="right">
                  <a class="example-image-link" href="{{asset('/assets/img/campaingimages/FIRST_FLOOR.png')}}" data-lightbox="example-set"
                     data-title=""><img src="{{asset('/assets/img/campaingimages/FIRST_FLOOR.png')}}" alt=""></a>
                  <p>First Floor</p>
               </div>
               <div class="clear"></div>
            </div>
            <div id="tab-2" class="tab-content">
               <div class="left">
                  <a class="example-image-link" href="{{asset('/assets/img/campaingimages/ground_floor_2d.jpg')}}"
                     data-lightbox="example-set" data-title="">
                  <img src="{{asset('/assets/img/campaingimages/ground_floor_2d.jpg')}}" alt=""></a>
                  <p>Ground Floor</p>
               </div>
               <div class="right">
                  <a class="example-image-link" href="{{asset('/assets/img/campaingimages/first_floor_2d.jpg')}}"
                     data-lightbox="example-set" data-title=""><img src="{{asset('/assets/img/campaingimages/first_floor_2d.jpg')}}" alt=""></a>
                  <p>First Floor</p>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="price" id="price">
         <div class="container">
            <div class="main_heading">Price <span>List</span></div>
            <div class="prce_download">
               <h3>
                  For downloading the price list please fill the enquiry form.
               </h3>
               <a href="#inquire" class="Click-here" id="download_price"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
            </div>
            <div class="custom-model-main" id="enquiry_modal_2">
               <div class="custom-model-inner">
                  <div class="close-btn">×</div>
                  <div class="custom-model-wrap">
                     <div class="pop-up-content-wrap">
                        <div class="form">
                           <div class="heading">Please enter the details below to get the detailed pricing information.</div>
                           <form id="enquiryform2">
                            {{csrf_field()}}
                               <div class="field">
                                  <label>Your Name*</label>
                                  <input type="text" class="inp" name="user_name2" required="">
                               </div>
                               <div class="field">
                                  <label>Your Email*</label>
                                  <input type="text" name="user_email2" class="inp">
                               </div>
                               <div class="field">
                                  <label>Your Phone*</label>
                                  <input type="text" name="user_phone2" class="inp">
                               </div>
                               <div class="field">
                                  <label>Message</label>
                                  <textarea class="area" id="user_query2"></textarea>
                               </div>
                               <div class="field">
                                  <input type="submit" value="SUBMIT NOW" class="btn Click-here2" id="submit2">
                                  <button class="btn" id="loader_gif2" style="display: none;"> <image style="height:20px;width:20px;"   src="https://gifimage.net/wp-content/uploads/2017/08/loading-gif-transparent-25.gif"></image>
                                 </button>
                               </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bg-overlay"></div>
            </div>
            <div class="custom-model-main2" id="verification_modal">
               <div class="custom-model-inner">
                  <div class="close-btn">×</div>
                  <div class="custom-model-wrap">
                     <div class="pop-up-content-wrap">
                        <div class="form">
                           <form id="verification_form"> 
                           <div class="heading">Verify your OTP </div>
                           <div class="field">
                              <input type="text" class="inp" name="verification_code"  required="" placeholder="Enter OTP">
                              <input type="hidden"  value="" id="sender_mobile">
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
               <div class="bg-overlay"></div>
            </div>
         </div>
      </div>
      <div class="gallery_sec" id="gallery">
         <div class="container">
            <div class="main_heading">CHECKOUT our <span>Gallery</span></div>
            <ul>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-1.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-1.jpg')}}" alt=""></a></li>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-2.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-2.jpg')}}" alt=""></a></li>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-3.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-3.jpg')}}" alt=""></a></li>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-4.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-4.jpg')}}" alt=""></a></li>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-5.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-5.jpg')}}" alt=""></a></li>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-6.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-6.jpg')}}" alt=""></a></li>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-7.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-7.jpg')}}" alt=""></a></li>
               <li><a class="example-image-link" href="{{asset('/assets/img/campaingimages/gallery-8.jpg')}}" data-lightbox="example-set" data-title=""><img
                  src="{{asset('/assets/img/campaingimages/gallery-8.jpg')}}" alt=""></a></li>
            </ul>
            <div class="clear"></div>
         </div>
      </div>
      <div class="contact_sec" id="contact">
         <div class="container">
            <div class="outer">
               <div class="main_heading">Our <span>Location</span></div>
               <div class="left">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15363.459538013758!2d73.962433!3d15.705321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis%20Blues!5e0!3m2!1sen!2sin!4v1607943233666!5m2!1sen!2sin"
                     width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                     aria-hidden="false" tabindex="0"></iframe>
               </div>
               <div class="right">
                  <div class="close_point">
                     <h3>Airport</h3>
                     <ul>
                        <li>Mopa Airport - 18 Km [Operational by 2022]</li>
                        <li>Chipi-Parule Airport - 75 Km</li>
                        <li>Dabolim Airport - 70 Km</li>
                        <li>Belgaum Airport - 80 Km</li>
                     </ul>
                  </div>
                  <div class="close_point">
                     <h3>Sea &amp; Beaches</h3>
                     <ul>
                        <li>Mandrem Beach - 36 Km</li>
                        <li>Vagator Beach - 31 Km</li>
                        <li>Calangute Beach - 35 Km</li>
                        <li>Colva Beach - 70 Km</li>
                     </ul>
                  </div>
                  <div class="close_point">
                     <h3>Railway Station</h3>
                     <ul>
                        <li>Thivim - 15 Km</li>
                        <li>Madgaon - 69 Km</li>
                        <li>Kudal - 50 Km</li>
                        <li>Pernem - 25 Km</li>
                     </ul>
                  </div>
               </div>
               <div class="clear"></div>
               <!--
                  <div class="owl-carousel">
                    <div class="item">
                      <div class="box">
                        <div class="images"><img src="images/gallery-4.jpg" alt=""></div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                        <div class="name">Name here/ CEO</div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="box">
                        <div class="images"><img src="images/gallery-4.jpg" alt=""></div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                        <div class="name">Name here/ CEO</div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="box">
                        <div class="images"><img src="images/gallery-4.jpg" alt=""></div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                        <div class="name">Name here/ CEO</div>
                      </div>
                    </div>
                  </div>
                  
                  -->
            </div>
         </div>
      </div>
      <!-- 
         <div class="perfect_home">
         Your Perfect Home is HERE! <a href="tel:+91 8070004400" class="blink_me"><i class="fa fa-phone" aria-hidden="true"></i> +91 8070004400</a>
         </div>
         -->
      <div class="footer_sec">
         <div class="container">
            <div class="left"><img src="{{asset('/assets/img/campaingimages/logo.png')}}" alt=""></div>
            <div class="mid">© 2020 Yogvillas | All Rights Reserved.</div>
            <div class="right"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#"><i
               class="fa fa-twitter" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin"
               aria-hidden="true"></i></a> <a
               href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href="#"><i
               class="fa fa-youtube-play" aria-hidden="true"></i></a></div>
         </div>
      </div>
      <div class="dies">
         <div class="container">
            <p><strong>Disclaimer</strong>
            <p>
            <p>
               Any visitor on this website automatically agrees to comply with and be bound by the following terms and
               conditions of use. Visitors are presumed to have read, understood and agreed to terms and conditions of this
               site. Axis ecorp can alter or revoke
               any terms or conditions of this website without notice.
            </p>
         </div>
      </div>
      <a id="back2Top" title="Back to top" href="#">&#10148;</a>
      <script src="{{ URL::asset('assets/js/campaingjs/lightbox-plus-jquery.min.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="{{ URL::asset('assets/js/campaingjs/owl.js') }}"></script>
      <script src="{{ URL::asset('assets/js/campaingjs/custom.js') }}"></script>
      <script>
         $(document).ready(function () {
             $(".mobile_nav").click(function () {
                 $(".header .nav ul").slideToggle("slow");
             });
         
             $("#download_price").click(function(){
               $('input[name="download_price"]').val(1);
             });
             $('#verification_modal').hide();
             $('#enquiryform1').submit(function(event){
                event.preventDefault();
                $('#submit1').hide();
                $('#loader_gif').show();
                 var name  = $('input[name="user_name"]').val();

                 var email = $('input[name="user_email"]').val();
                 var phone = $('input[name="user_phone"]').val();
                 
                 var text  = $('#user_query').val();
                 $.ajax({
                     headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                     type: 'post',
                     url: '/campaigns/submitenquiry',
                     data: {
                        // _token: "{{ csrf_token() }}",
                         user_name : name,
                         user_email: email,
                         user_phone: phone,
                         user_query: text,
                         sendmail  : 1, 
                     },
                     // async: true,
                     // cache: false,
                     // contentType: false,
                     // // enctype: 'multipart/form-data',
                     // processData: false,
                     success: function (response) {
                        //console.log(response);
                        if(response.status == 1)
                        {
                            $('#submit1').show();
                            $('#loader_gif').hide();
                            alert(response.msg);
                            $('input[name="user_name"]').val('');
                            $('input[name="user_email"]').val('');
                            $('input[name="user_phone"]').val('');
                            $('#user_query').val('');
                        }
                     },
                     error:function(response)
                     {
                         //console.log(response);
                     }
                 });
             });

             $('#enquiryform2').submit(function(event){
                 event.preventDefault();
                 $('#submit2').hide();
                 $('#loader_gif2').show();
                 var name  = $('input[name="user_name2"]').val();
                 var email = $('input[name="user_email2"]').val();
                 var phone = $('input[name="user_phone2"]').val();
                 var text  = $('#user_query2').val();
                 $.ajax({
                     headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                     type: 'post',
                     url: '/campaigns/downloadPriceList',
                     data: {
                        // _token: "{{ csrf_token() }}",
                         user_name : name,
                         user_email: email,
                         user_phone: phone,
                         user_query: text,
                         sendmail  : 1, 
                     },
                     success: function (response) {
                        if(response.status == 1)
                        {
                            $('#submit2').show();
                            $('#loader_gif2').hide();
                            alert(response.msg);
                            $('input[name="user_name2"]').val('');
                            $('input[name="user_email2"]').val('');
                            $('input[name="user_phone2"]').val('');
                            $('#user_query2').val('');
                            $('#enquiry_modal_2').hide();
                        }
                        $('#verification_modal').show();
                        $('#sender_mobile').val(response.mobile_no);
                     },
                     error:function(response)
                     {
                        // console.log(response);
                     }
                 });
             });
             
            $('#verification_form').submit(function(event){
                 event.preventDefault();
                 $('#submit3').hide();
                 $('#loader_gif3').show();
                 var code  = $('input[name="verification_code"]').val();
                 var phone = $('#sender_mobile').val();
                 $.ajax({
                     headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                     type: 'post',
                     url: '/campaigns/verifyOtp',
                     data: {
                         code : code,
                         phone: phone
                     },
                     success: function (response) {
                        console.log(response);
                        if(response.status == 1)
                        {
                            $('#submit3').show();
                            $('#loader_gif3').hide();
                            $('verification_modal').hide();
                            alert(response.msg);
                            
                            setTimeout(function(){ 
                            let a=document.createElement('a');
                            a.href='https://ecai-dev.s3-eu-west-1.amazonaws.com/documents/document_files/Yog_Villas_Price_List.pdf';
                            a.download = "Yog_Villas_Price_List" + new Date() + ".pdf";
                            a.click();
                         }, 2000);
                        } else
                        {
                            alert(response.msg);
                            window.location.reload();
                        }
                        
                     },
                     error:function(response)
                     {
                        // console.log(response);
                     }
                 });
             });
         });

         
      </script>
      <script>
         $(".header .nav ul li a").click(function (e) {
             e.preventDefault();
         
             var position = $($(this).attr("href")).offset().top;
         
             $("body, html").animate({
                 scrollTop: position
             } /* speed */);
         });
      </script>
      <script>
         /*Scroll to top when arrow up clicked BEGIN*/
         $(window).scroll(function () {
             var height = $(window).scrollTop();
             if (height > 100) {
                 $('#back2Top').fadeIn();
             } else {
                 $('#back2Top').fadeOut();
             }
         });
         $(document).ready(function () {
             $("#back2Top").click(function (event) {
                 event.preventDefault();
                 $("html, body").animate({scrollTop: 0}, "slow");
                 return false;
             });
         
         });
         /*Scroll to top when arrow up clicked END*/
      </script>
      <script>
         $(document).ready(function () {
         
             $('ul.tabs li').click(function () {
                 var tab_id = $(this).attr('data-tab');
         
                 $('ul.tabs li').removeClass('current');
                 $('.tab-content').removeClass('current');
         
                 $(this).addClass('current');
                 $("#" + tab_id).addClass('current');
             })
         
         })
         
      </script>
      <script>
         $(".Click-here").on('click', function() {
           $(".custom-model-main").addClass('model-open');
         }); 
         $(".close-btn, .bg-overlay").click(function(){
           $(".custom-model-main").removeClass('model-open');
         });
         
         
      </script>
      <script>
         $(".Click-here2").on('click', function() {
           $(".custom-model-main2").addClass('model-open2');
         }); 
         $(".close-btn, .bg-overlay").click(function(){
           $(".custom-model-main2").removeClass('model-open2');
         });
         
         
      </script>
   </body>
</html>