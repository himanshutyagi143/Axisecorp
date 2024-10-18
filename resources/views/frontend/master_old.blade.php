<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	   @if(Request::segment(1)=='aboutus')
		<title>About | Axis ecorp</title>
		<meta name="keywords" content=""/>
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
		   <title>Terms and Conditionkk | Axis ecorp </title>
		  <meta name="keywords" content=""/>
		  <meta name="description" content="Axis ecorp's terms & conditions for property sales of villas & bunglows in Goa."/>
	   @elseif(Request::segment(1)=='corporate')
		   <title>Devloped to Deliver Incomparable Corporate Services | Axis ecorp</title>
		  <meta name="keywords" content=""/>
		  <meta name="description" content="Axis ecorp is the commercial developers who understand our corporate responsibility with governance & ethics, customer relation, CSR and social responsibility, marketplace."/>
	   @elseif(Request::segment(1)=='axisblues')
		  <title>Axis Blues | Smart Suites and Luxury Villas in Goa</title>
		  <meta name="keywords" content=""/>
		  <meta name="description" content="Axis Blues provides luxury villas and smart suites in Goa with neo-modern architecture that will bring the world class facilities under a single roof."/>
	   
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

	   @else
		  <title>Axis ecorp | Real Estate Developers in Goa</title>
		  <meta name="keywords" content="luxury villas in goa bungalows in goa Smart suites in goa"/>
		  <meta name="description" content="Axis ecorp is the best real estate developers in Goa. We build luxury villas, bungalows and smart suites with world class ameneties and harmonios ecosystem. "/>
	   @endif
		
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
		<link href="/fronted/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/fronted/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/fronted/css/animate.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/fronted/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/fronted/css/media.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/fronted/css/jquery.fancybox8cbb.css" rel="stylesheet" type="text/css" media="all" />
		<script src="/fronted/js/jquery3.1.1.min.js"></script>
		<script src="/fronted/js/jquery-1.10.2.min.js"></script>
		<script src="/fronted/js/bootstrap.js"></script>
		<script src="/fronted/js/scrolloverflow.js"></script>
		<script src="/fronted/js/fullpage.js"></script>
		<script src="/fronted/js/examples.js"></script>
		<script src="/fronted/js/main.js"></script>
		<script type="text/javascript" src="/fronted/js/jquery.fancybox8cbb.js"></script>
		<script type="text/javascript" src="/fronted/js/jquery.easings.min.js"></script>
		<script type="text/javascript" src="/fronted/js/jquery.multiscroll.js"></script>
	</head>
<body>

@include('frontend.header')
@yield('content')
@if(!in_array(Request::segment(1),array('aboutus','dev','')))
@if(Request::segment(1) != "veryifyotp_for_booking" && Request::segment(1) != "veryifyUnit_for_booking")
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
<div class="enquiry_form">
	<div class="row">
		<div class="enquiry_btn">Enquire Now</div>
		<div class="col-md-12">
			<div class="col-md-12 ">
				<h3>Enquiry Form</h3>
			</div>
		<div class="col-md-12 mt-15">
			<label>Full Name</label>
			<input class="form-control" placeholder="Please Enter Your Full Name" />
		</div>
		<div class="col-md-12 mt-15">
			<label>Email</label>
			<input class="form-control" placeholder="Please Enter Email" />
		</div>
		<div class="col-md-12 mt-15">
			<label> Contact No</label>
			<input class="form-control" placeholder="Please Enter Your Contact Number" />
		</div>
		<div class="col-md-12 mt-15">
			<label>Remark*</label>
			<textarea class="form-control"placeholder="Please Write  Your Query " style="height: 80px;" ></textarea>
		</div>
		<div class="col-md-12 ">
			<button class="Submit_btn">Submit</button>
		</div>
		</div>
	</div>
</div>
@endif
@if(Request::segment(1) != "outer_user_payment" && Request::segment(1) != "veryifyotp_for_booking" && Request::segment(1) != "veryifyUnit_for_booking")
				<!--Start of Tawk.to Script-->
			<script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/5c8b8081101df77a8be2baf0/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
			})();
			</script>
		<!--End of Tawk.to Script-->
      @endif
    </body>


</html>
