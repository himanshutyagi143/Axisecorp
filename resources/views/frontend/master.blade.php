<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>    

    <link rel="shortcut icon" href="/fronted/img/favicon.png" type="image/x-icon">
    @if(Request::segment(1)=='aboutus')
        <title>About | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <!--<meta name="google-site-verification" content="BZgAU9BabMCGvOGkHHKBFhEt-dykuP7piqfSRdIJzJc" />-->
        <meta name="description" content="Axis ecorp is diversifies into real estate & hospitality venture after successful execution in education and technology."/>
    @elseif(Request::segment(1)=='vision')
        <title>Vision | Axis ecorp </title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp's vision is creating landmarks, setting benchmarks, building trust, meeting the expectations of our consumers to build long-lasting relationships."/>
    @elseif(Request::segment(1)=='industries')
        <title>Industries | Axis ecorp</title>
        <meta name="keywords" content="real estate industry residential project commercial project"/>
        <meta name="description" content="Axis ecorp is successful service provider in education & technology industries. Now we are focusing on real estate industries like smart hotel suites, residential & commercial projects."/>
    @elseif(Request::segment(1)=='about')
        <title>Our Business | Axis ecorp  </title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp is Goa’s real estate and corporate services providing company. check here about our world class educational campus and excellent corporate services."/>
    @elseif(Request::segment(1)=='terms-and-condition')
        <title>Terms and Conditions | Axis ecorp </title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp's terms & conditions for property sales of villas & bunglows in Goa."/>
    @elseif(Request::segment(1)=='corporate')
        <title>Devloped to Deliver Incomparable Corporate Services | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp is the commercial developers who understand our corporate responsibility with governance & ethics, customer relation, CSR and social responsibility, marketplace."/>
    @elseif(Request::segment(1)=='axisblues')
        <title>Best Luxury villas for sale in Goa | Axis Blue Goa Location</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis Blues is planned for prime hospitality & rainforest resort destination. Axis ecorp is provides Goa luxury villas in goa, best villas for sale near baga beach Goa"/>

    @elseif(Request::segment(1)=='service')
        <title>Real Estate Services | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp provides you the variety of best services in Real estate. We offer you the perfect mixture of Eco-luxury natural living and modern comfort."/>
    @elseif(Request::segment(1)=='contact')
        <title>Contact Us | Axis Ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Click here and Connect with us to know more about Axis ecorp - one of the leading Real Estate Builder and Developer in Goa."/>

    @elseif(Request::segment(1)=='team')
        <title>Professional Team | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Our team's professional and efficient approach helps you to find the solution of each query you face. We bring your Dream Home to Reality."/>

    @elseif(Request::segment(1)=='privacy-policy')
        <title>Privacy Policy | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Your privacy is our priority. Click here to know how the Privacy Policy governs the manner in which Axis ecorp collects and uses your information."/>

    @elseif(Request::segment(1)=='sitemap')
        <title>Sitemap | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp sitemap navigates us through corporate website. Offering residential projects like luxury villas and bungalows in Goa for sale."/>

    @elseif(Request::segment(1)=='news')
        <title>In the News | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Explore whats trending in the real estate market."/>

    @elseif(Request::segment(1)=='faq')
        <title> FAQ's | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Click here and check out the FAQs before purchasing property in Goa."/>

    @elseif(Request::segment(1)=='blogs')
        <title> 5 Reasons Why Axis Blues is a Smart Investment Decision</title>
        <meta name="keywords" content=""/>
        <meta name="description" content=" Here are 5 reasons why investing in Axis Blues is the smart decision"/>
    @elseif(Request::segment(1)=='outer-user-payment')
		  <title>User Payment | Axis E-Corp</title>
		  <meta name="keywords" content=""/>
		  <meta name="description" content="Fill up the contact details and check out Payment information"/>
    @elseif(Request::segment(1)=='turboin')
        <title>TurboIn</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis Blues is planned for prime hospitality & rainforest resort destination. Axis ecorp is provides Goa luxury villas in goa, best villas for sale near baga beach Goa"/>
    @elseif(Request::segment(1)=='kncj')
        <title>KNCJ-Darjeeling</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis Blues is planned for prime hospitality & rainforest resort destination. Axis ecorp is provides Goa luxury villas in goa, best villas for sale near baga beach Goa"/>
    @elseif(Request::segment(1)=='lakecity')
        <title>LAKECITY</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis Blues is planned for prime hospitality & rainforest resort destination. Axis ecorp is provides Goa luxury villas in goa, best villas for sale near baga beach Goa"/>
    @else
        <title>Axis Yog Villas Goa Panaji | Flats for Sale in North Goa| Axis Blue</title>
        <meta name="keywords" content="Yog villas goa, axis yog villas goa, builders in north goa"/>
        <meta name="description" content="Right from the magical beaches to the warm people.Axis Yog Villas suggestions smart vacation villas. Builders in north Goa, best yog villas price in Goa, Yog villas "/>
    @endif

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="/fronted/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/fronted/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/fronted/css/animate.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/fronted/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/fronted/css/media.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/fronted/css/jquery.fancybox8cbb.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/css/projects_header.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <script src="/fronted/js/jquery3.1.1.min.js" ></script> -->
    <script src="/fronted/js/jquery-1.10.2.min.js"></script>
    <!-- <script src="/fronted/js/main.js" ></script> -->
    <script src="/fronted/js/main.min.js" defer></script>
    <style>
		.enquiry_form label.error{margin-bottom: 0;font-size: 11px;text-transform: initial;color:#f00 !important}
		.enquiry_form .mt-15 {margin-bottom: 5px;}
    </style>
   
<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139163292-2" defer></script>
<script type="text/javascript" defer>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139163292-2');
</script>
-->

    
    
    <!-- <script src="/fronted/js/bootstrap.js" defer></script> -->
    <script src="/fronted/js/bootstrap.min.js" defer></script>

    <!-- <script src="/fronted/js/scrolloverflow.js" defer></script> -->
    <script src="/fronted/js/scrolloverflow.min.js" defer></script>

    <!-- <script src="/fronted/js/fullpage.js" defer></script> -->
    <script src="/fronted/js/fullpage.min.js" defer></script>

    <!-- <script src="/fronted/js/examples.js" defer></script> -->
    <script src="/fronted/js/examples.min.js" defer></script>

    

<!--<meta name="google-site-verification" content="iPG2usz9lO-1_0nYQibYM2tG2tykII9Lpfpm31VEBVg" />-->
               <script type="application/ld+json" defer>
                  {
                    "@context": "http://schema.org",
                    "@type": "HomeAndConstructionBusiness",
                    "additionalType":"Real Estate Developer",
                   "name": "Axis Blues",
                   "url": "http://axisecorp.com/", 
                   "email": "info@eejak.com",
                    "image": "/fronted/img/slider5.jpg",
                    "logo": "/fronted/img/logo1.png",
                   "description": "Axis Blues is the perfect combination of nature with neo-modern architecture that will bring the world class amenities under a single roof. We aim to build luxury villas and bungalows with modern comfort and also provide best eco-luxury properties in Goa.",
                    "openingHours": "Monday to Saturday - 09:00AM to 06:00PM",
                    "priceRange": "N/A",
                    
                  "address":
                  [
                   {
                      "@type": "PostalAddress",
                      "addressLocality": "maner dodamarg",
                      "addressRegion": "Maharashtra",
                      "postalCode": "416512",
                      "streetAddress": "Yog Resort, Yog City, maner dodamarg",
                      "addressCountry": "India",
                      "telephone": "08178585634"   
                    },
                    {
                      "@type": "PostalAddress",
                      "addressLocality": "Patto Plaza",
                      "addressRegion": "Panjim",
                      "streetAddress": "305, Gera Imperium Grand, Patto Plaza",
                      "addressCountry": "India",
                      "telephone": "09044334334"  
                    }
                  ],
                     "geo": 
                  [   {
                      "@type": "GeoCoordinates",
                      "latitude": "15.713967",
                      "longitude": "73.980942"
                    },
                   {
                      "@type": "GeoCoordinates",
                      "latitude": "15.495602",
                      "longitude": "73.833639"
                    }
                    ]
                    }
               </script>
</head>
<body>

@include('frontend.header')
@yield('content')
@if(!in_array(Request::segment(1),array('aboutus','dev','')))
    @if(Request::segment(1) != "veryifyotp_for_booking" && Request::segment(1) != "veryifyUnit_for_booking" && Request::segment(1) != "axisblues" && Request::segment(1) != "yogvillas" && Request::segment(1) != "aerovalley" && Request::segment(1) != "turboin" && Request::segment(1) != "kncj" && Request::segment(1) != "lakecity")
        @include('frontend.footer')

    @endif
@endif
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


<!-----------------------------------------------Sign up Popup ----------------------------------------------->


<div class="modal fade " id="myModal" role="dialog" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
            <div class="modal-body form-v8">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="page-content">
                    <div class="form-v8-content">
                        <div class="form-left">
                            <img src="/fronted/img/form-v8.jpg" alt="form">
                        </div>
                        <div class="form-right">
                            <div class="tab">
                                <div class="tab-inner">
                                    <button class="tablinks" onclick="openCity(event, 'sign-in')" id="defaultOpen">Customer </button>
                                </div>
                                <div class="tab-inner">
                                    <button class="tablinks" onclick="openCity(event, 'sign-up')">Partner </button>
                                </div>
                            </div>
                            <form class="form-detail" action="#" method="post">
                                <div class="alert alert-danger print-error-msg" id="requiredmsg" style="display:none">
                                    <ul></ul>
                                </div>
                                <div class="tabcontent" id="sign-in">
                                    <div class="form-row">
                                        <label class="form-row-inner">
                                            <input type="email" name="email" id="user_email" class="input-text" required>
                                            <span class="label">E-Mail</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-row">
                                        <label class="form-row-inner">
                                            <input type="password" name="password" id="user_password" class="input-text" required>
                                            <span class="label">Password</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-row-last">
                                        <input type="submit" id="customer_login" class="register" value="Login">
                                    </div>
                                </div>
                            </form>
                            <form class="form-detail" action="#" method="post">
                                <div class="alert alert-danger print-error-msg1" id="requiredmsg" style="display:none">
                                    <ul></ul>
                                </div>
                                <div class="tabcontent" id="sign-up" style="    display: none;">
                                    <div class="form-row">
                                        <label class="form-row-inner">
                                            <input type="text" name="partner_email" id="partner_email" class="input-text" required>
                                            <span class="label">E-Mail</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-row">
                                        <label class="form-row-inner">
                                            <input type="password" name="partner_password" id="partner_password" class="input-text" required>
                                            <span class="label">Password</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-row-last">
                                        <input type="submit" id="partner_login" class="register" value="Login">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-----------------------------------------------Enquiry Form ----------------------------------------------->
@if(Request::segment(1) != "outer_user_payment" && Request::segment(1) != "veryifyotp_for_booking" && Request::segment(1) != "veryifyUnit_for_booking")
    {{--<div class="enquiry_form">
        <div class="row">
            <div class="enquiry_btn">Enquire Now</div>
            <div class="col-md-12">
                <div class="col-md-12 ">
                    <h3>Enquiry Form</h3>
                </div>
                <div id="form_success" style="display:none; color: #000;">
                    <p>Thank you for your interest.<br/>We will contact you soon.</p>
                </div>
                <form accept-charset='UTF-8' id="enquiry_form" novalidate method="post">
                    <div class="col-md-12 mt-15">
                        <label>Full Name*</label>
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control required" placeholder="Please Enter Your Full Name" id="full_name" name="full_name" required=""/>
                    </div>
                    <div class="col-md-12 mt-15">
                        <label>Email*</label>
                        <input type="email" class="form-control required" placeholder="Please Enter Email" id="email" name="email" required=""/>
                    </div>
                    <div class="col-md-12 mt-15">
                        <label>Contact No*</label>
                        <input type="text" class="form-control required number" minlength="10" maxlength="12" placeholder="Please Enter Your Contact Number" id="phone" name="phone" required=""/>
                    </div>
                    <div class="col-md-12 mt-15">
                        <label>Remark*</label>
                        <textarea class="form-control required" placeholder="Please Write Your Query " style="height: 80px;" id="remark" name="remark" required></textarea>
                    </div>
                    <div class="col-md-12 ">
                        <button type="submit" class="Submit_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>--}}
@endif
@if(Request::segment(1) != "outer_user_payment" && Request::segment(1) != "veryifyotp_for_booking" && Request::segment(1) != "veryifyUnit_for_booking")
    <!--Start of Tawk.to Script-->
    {{--<script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5c8b8081101df77a8be2baf0/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>--}}
    <!--End of Tawk.to Script-->
@endif

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.10.0/jquery.validate.min.js" ></script>
<script type="text/javascript" defer>
$(document).ready(function(){
	//$("img#logoimg").wrap('<a href="http://www.axisecorp.com" />');
	
	/*$.validator.setDefaults({
      submitHandler: function() {
		jQuery('.Submit_btn').attr('disabled','disabled').html('Please Wait...');
		var name=$("#full_name").val();
		var email=$("#email").val();
		var mobile=$("#phone").val();
		var comment=$("#remark").val();
		var token=$("#token").val();
        $.ajax({
          type:"POST",
          url:'http://www.axisecorp.com/addsiteenquiry',
          data	:{'full_name':name,'contact_email':email,'contact_phone':mobile,'contact_remark':comment,'_token':token},
          success: function(resp, status, xhr){
            if(resp == "success"){
				jQuery('.Submit_btn').removeAttr('disabled').html('Submit');
				jQuery('#enquiry_form').hide();
				jQuery('#form_success').show();
            }
            else{
				jQuery('#enquiry_form').show();
				jQuery('#form_success').hide();
            }
          },
          error: function(resp, status, xhr){
          }
        });
      }
    });
    $("#enquiry_form").validate();*/
});
</script>
</body>
<script type="text/javascript" defer>
    document.addEventListener('contextmenu', event => event.preventDefault());
</script>

</html>
