@extends('new_frontend.layouts.app')
@section('content')
@include('new_frontend.includes.header')
<div class="project_menu kncj_menu mobile_side">
   <div class="project_logo"><a href="#home"><img src="{{ URL::asset('frontend/img/projects/kncj/logo/kncj-logo.jpg')}}" alt="kncj "></a></div>
   <ul>
      <li><a href="#overview" class="js-scroll">Overview</a></li>
      <li><a href="#keyfeatures" class="js-scroll">key Features</a></li>
      <li><a href="#amenities" class="js-scroll">Amenities</a></li>
      {{--<li><a href="#" class="js-scroll">Plans</a></li>--}}
	  <?php /* ?>
      <li><a href="#price" class="js-scroll">Price</a></li> <?php */ ?>
      <li><a href="#compliance" class="js-scroll">Compliance</a></li>
      <li><a href="#gallery" class="js-scroll">Gallery</a></li>
      <li><a href="#location_map" class="js-scroll">Location Map</a></li>
      <li><a href="#" id="download_brochuer" data-toggle="modal" data-target="#kncjdownload">Download Brochure</a></li>
   </ul>
</div>
<div class="menu_mobile">
   <img src="{{ URL::asset('frontend/img/others/bars.png')}}" alt="kncj">
</div>
<div class="modal fade in" id="kncjdownload" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body inq-form">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div>
               <h3 class="text-center"><i class="fa fa-download"></i> Download KNCZ Brochure</h3>
               <form class="js-ajax-form contact_form broucer_download">
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
                           <input type="tel" class="form-control" id="kncjphone" name="txtPhone" required placeholder="phone *">
                           <input type="hidden" name="page_reference" value="kncj">
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
                  <div class="form-submit text-right"><button type="submit" class="btn btn-shadow-2 submit_contact">Send <i class="icon-next"></i></button></div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="layout">
@include('new_frontend.includes.sidebar')
<div class="content">
<section id="about" class="about section">
   <div class="container"  id="overview">
      <div class="">
         <h1 class="entry-title abt_title2">AXIS KNCZ<span class="text-primary"></span></h1>
		 
		 <h3><i>Welcome to India’s first sky bridge resort</i></h3>
		 <br>
		 <p><strong>The Axis KNCZ is destined to be a jewel in Darjeeling’s crown.</strong></p>
	
         <p class="entry-text"> The legendary beauty of the majestic hills and Kanchenjunga’s snow-clad peaks attract travelers from around the globe to Darjeeling. The third-highest mountain peak in the world presents a striking facade as it towers over the small hill town. </p>

		<p>From the lush green tea gardens covering the slopes of Darjeeling’s hills to the famous toy train, there is a lot that this town has to offer. The laidback culture and the quaint lifestyle draw many to visit this place more than once. Axis KNCZ offers once in a lifetime opportunity for people to make Darjeeling their forever home. Offering the best holiday homes in Darjeeling, Axis KNCZ offers premium vacation homes overlooking the mountain range with the best sun-view indoor pool. Along with this, Axis KNCZ allows users to enjoy the best premium resort living experience with Multiple outdoor activities in Darjeeling in India with international designs, tasteful interiors, and smart hotel suites to meet everyone’s needs. </p>
		<p>This northeastern town is known for its laidback attitude, but for the night owls, there is a party zone in Darjeeling. There are also multiple outdoor activities in Darjeeling that visitors can engage in, including treks around the mountains and tea estates. </p>

		 <p>This RERA-listed project is designed to be a North-East Indian icon. </p>
         
        
      </div>
   </div>
</section>
<section class="keyfeatures_sec" id="keyfeatures">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Key Features </h2>
      </header>
	  
	     <div class="col-sm-6 col-md-4 col-lg-4">
         <div class="img_holder">
            <img src="{{ URL::asset('frontend/img/projects/kncj/features/kcj-feathure9.jpg')}}" alt="kcj-feathure1.jpg">
         </div>
         <p>Neighbourhood Attractions</p>
      </div>
	  
      <div class="col-sm-6 col-md-4 col-lg-4">
         <div class="img_holder">
            <img src="{{ URL::asset('frontend/img/projects/kncj/features/kcj-feathure1.jpg')}}" alt="kcj-feathure1.jpg">
         </div>
         <p>Best In Class Sun View Indoor Pool</p>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
         <div class="img_holder">
            <img src="{{ URL::asset('frontend/img/projects/kncj/features/kcj-feathure2.jpg')}}" alt="kcj-feathure2.jpg">
         </div>
         <p>Spa, Meditation and Health Club</p>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
         <div class="img_holder">
            <img src="{{ URL::asset('frontend/img/projects/kncj/features/kcj-feathure4.jpg')}}" alt="kcj-feathure4.jpg">
         </div>
         <p>Multiple Outdoor Activity</p>
      </div>
      {{--<div class="col-sm-6 col-md-4 col-lg-4">
         <div class="img_holder">
            <img src="{{ URL::asset('frontend/img/projects/kncj/features/kcj-feathure5.jpg')}}" alt="kcj-feathure5.jpg">
         </div>
         <p>India's 1<sup>st</sup> SKY Bridge Resort</p>
      </div>--}}
      <div class="col-sm-6 col-md-4 col-lg-4">
         <div class="img_holder">
            <img src="{{ URL::asset('frontend/img/projects/kncj/features/kcj-feathure6.jpg')}}" alt="kcj-feathure6.jpg">
         </div>
         <p>Party Zone</p>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
         <div class="img_holder">
            <img src="{{ URL::asset('frontend/img/projects/kncj/features/kcj-feathure7.jpg')}}" alt="kcj-feathure7.jpg">
         </div>
         <p>Smart Living Resort</p>
      </div>
   </div>
</section>
<section class="amenities_section section" id="amenities">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Amenities </h2>
      </header>
      <ul class="kncj_bg">
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon1.png')}}" alt="synopsis-icon1.png"></div>
            <p>International Standard<br>
               Design & Landscape 
            </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon2.png')}}" alt="synopsis-icon2.png"></div>
            <p>Best in Class of<br>
               Elevation 
            </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon3.png')}}" alt="synopsis-icon3.png"></div>
            <p>Low Rise<br>
               G+3 Structure 
            </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon4.png')}}" alt="synopsis-icon4.png"></div>
            <p>Sate of Art<br>
               Sky Bridge 
            </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon5.png')}}" alt="synopsis-icon5.png"></div>
            <p>Smart Hotel<br>
               Suites 
            </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon6.png')}}" alt="synopsis-icon6.png"></div>
            <p>Fully Furnished Unit,<br> Sales With Lease Back </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon7.png')}}" alt="synopsis-icon7.png"></div>
            <p>HOT & COOL<br>
               AC System 
            </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon8.png')}}" alt="synopsis-icon8.png"></div>
            <p>All Weather,<br> Indoor Swimming Pool </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon9.png')}}" alt="synopsis-icon9.png"></div>
            <p>Three-layyer<br>
               Security System 
            </p>
         </li>
         <li>
            <div class="icon_holder"><img src="{{ URL::asset('frontend/img/projects/kncj/synopsis/synopsis-icon10.png')}}" alt="synopsis-icon10.png"></div>
            <p>Kids Play Area &<br>
               Party Hubs 
            </p>
         </li>
      </ul>
   </div>
</section>
{{--
<section class="unitdetail_section kncj_plan" id="plan">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Plans </h2>
      </header>
      <div id="exTab2" class="container">
         <ul class="nav nav-tabs">
            <li class="active">
               <a href="#1" data-toggle="tab">Unit Plan</a>
            </li>
            <li><a href="#2" data-toggle="tab">Building Section Plan</a></li>
         </ul>
         <div class="tab-content ">
            <div class="tab-pane active" id="1">
               <a data-lity data-lity-desc="unit-plan.jpg" href="{{ URL::asset('frontend/img/projects/kncj/plan/unit-plan.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/plan/unit-plan.jpg')}}" alt="plan"></a>
            </div>
            <div class="tab-pane" id="2">
               <a data-lity data-lity-desc="building-section-plan.jpg" href="{{ URL::asset('frontend/img/projects/kncj/plan/building-section-plan.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/plan/building-section-plan.jpg')}}" alt="plan"></a>
            </div>
         </div>
      </div>
   </div>
</section>
--}}
<?php /* ?>
<section class="price_section" id="price">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Price </h2>
      </header>
      <a data-lity data-lity-desc="kncj_pricelist.jpg"
         href="{{ URL::asset('frontend/img/projects/kncj/pricelist/kncj_pricelist.jpg')}}"><img
                 src="{{ URL::asset('frontend/img/projects/kncj/pricelist/kncj_pricelist.jpg')}}"
                 alt="price"></a>
   </div>
</section>

<?php */ ?>
<section class="project-details" id="compliance">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Compliance</h2>
      </header>
      <div class="clear"></div>
      <div class="project-details-item">
         <div class="row">
            <div class="project-details-info wow fadeInLeft axisfadeleft">
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> GOING TO BE NORTH-EAST "ICON"</p>
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> RERA LISTED PROJECT </p>
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> VASTU COMPLIANT </p>
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> ALL APPROVALS AS PER GOVTNORMS</p>
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> EARTHQUAKE RESISTANCE</p>
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> M25 GRADE RCC STRUCTURE</p>
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> HOTEL &amp; RESORT DEVELOPMENT</p>
               <p><i class="fa fa-long-arrow-right" aria-hidden="true"></i> ALL APPROVAL SUTABLE FORCONSTRUCTION LOAN </p>
            </div>
            <div class="project-details-img col-md-8 col-md-offset-4">
               <img alt="kcj_compliance.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/projects/kncj/compliance/kcj_compliance.jpg')}}">
            </div>
         </div>
      </div>
   </div>
</section>
<section class="unitdetail_section" id="gallery">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Gallery</h2>
      </header>
      <div id="exTab2" class="container">
         <div class="tab-content ">
            <div class="tab-pane active" id="4">
               <ul class="gallery">
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery1.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery1.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery1.jpg')}}" alt="kncj-gallery1.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery2.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery2.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery2.jpg')}}" alt="kncj-gallery2.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery3.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery3.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery3.jpg')}}" alt="kncj-gallery3.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery4.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery4.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery4.jpg')}}" alt="kncj-gallery4.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery5.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery5.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery5.jpg')}}" alt="kncj-gallery5.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery6.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery6.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery6.jpg')}}" alt="kncj-gallery6.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery7.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery7.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery7.jpg')}}" alt="kncj-gallery7.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="kncj-gallery8.jpg" href="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery8.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/kncj/gallery/kncj-gallery8.jpg')}}" alt="kncj-gallery8.jpg"></a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="locatio_section" id="location_map">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Location Map  </h2>
      </header>
      <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="img_holder">
            <a data-lity data-lity-desc="Map" href="{{ URL::asset('frontend/img/projects/kncj/map/kncj-map.jpg') }}">
            <img src="{{ URL::asset('frontend/img/projects/kncj/map/kncj-map.jpg') }}" alt="Map">
            </a>
         </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d96793.81992926673!2d88.52228!3d27.09119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e41ede9bd9907f%3A0xa30e20c377ee1c69!2sDalapchan%20Ridge%20Reserve%20Forest%2C%20West%20Bengal%20734316!5e1!3m2!1sen!2sin!4v1610012471301!5m2!1sen!2sin" width="100%" height="310" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="clear"></div>
      <div class="form-submit text-center" style="margin:30px 0px;"><button type="submit" class="btn btn-shadow-2 wow swing" style="visibility: visible;"><a class="google-map-axis" href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d96793.81992926673!2d88.52228!3d27.09119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e41ede9bd9907f%3A0xa30e20c377ee1c69!2sDalapchan%20Ridge%20Reserve%20Forest%2C%20West%20Bengal%20734316!5e1!3m2!1sen!2sin!4v1610012471301!5m2!1sen!2sin" data-lity>Open Google Map</a></button></div>
   </div>
</section>
@include('new_frontend.includes.footer')
@endsection