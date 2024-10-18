@extends('new_frontend.layouts.app')
@section('content')
@include('new_frontend.includes.header')
<div class="project_menu mobile_side">
   <div class="project_logo"><a href="#home"><img
      src="{{ URL::asset('frontend/img/projects/axisblues/logo/axis-blues-logo.png') }}"
      alt="Axis Blues"></a></div>
   <ul>
      <li><a href="#overview" class="js-scroll">Overview</a></li>
      <li><a href="#amenities" class="js-scroll">Amenities</a></li>
      <li><a href="#specifications" class="js-scroll">Specifications</a></li>
      <li><a href="#unitplan" class="js-scroll"> Unit Details </a></li>
      <li><a href="#plan" class="js-scroll">Plans</a></li>
      <li><a href="#price" class="js-scroll">Price</a></li>
      <li><a href="#gallery" class="js-scroll">Gallery</a></li>
      <li><a href="#progress" class="js-scroll">Progress Status</a></li>
      <li><a href="#certificates" class="js-scroll">Certificates</a></li>
      <li><a href="#location_map" class="js-scroll">Location Map</a></li>
      <li><a href="#" id="download_application_form" data-toggle="modal" data-target="#application_form_download">Application Form</a></li>
      <li><a href="#" id="download_brochuer" data-toggle="modal" data-target="#axisbluesdownload">Download Brochure</a></li>
   </ul>
</div>
<div class="menu_mobile">
   <img src="{{ URL::asset('frontend/img/others/bars.png')}}" alt="bars.png">
</div>
{{-- Brochure Download modal start --}}
<div class="modal fade in" id="axisbluesdownload" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body inq-form">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div>
               <h3 class="text-center"><i class="fa fa-download"></i> Download Axis Blues Brochure</h3>
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
                           <input type="tel" class="form-control" id="aixsbluesphone" name="txtPhone" required placeholder="e.g. +1 702 123 4567">
                           <input type="hidden" name="page_reference" value="axisblues">
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
{{-- Brochure Download modal end --}}
{{-- Application Form Download modal start --}}
<div class="modal fade in" id="application_form_download" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body inq-form">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div>
               <h3 class="text-center"><i class="fa fa-download"></i> Download Axis Blues Application Form</h3>
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
                           <input type="tel" class="form-control" id="aixsbluesphone" name="txtPhone" required placeholder="Phone">
                           <input type="hidden" name="page_reference" value="axisblues_application_form">
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
{{-- Application Form Download modal end --}}
<div class="layout">
@include('new_frontend.includes.sidebar')
<div class="content">
<section id="about" class="about section">
   <div class="container" id="overview">
      <div class="">
         <h1 class="entry-title abt_title2">AXIS BLUES<span class="text-primary"></span></h1>
		 <h2 class="entry-title abt_title3">North of Goa, Dodamarg, Sindhudurg</h2>
         <p class="entry-text">Axis Blues is planned for prime hospitality. Homebuyers with an eye for rainforest resort destinations will 
		 fall in love with this concept. The main aim of Axis Blues is to provide an Eco-Luxury stay that preserves the excitement of nature
		 living coupled with modern comfort. 
         </p>
         <p>
            If you are looking for an apartment, Holiday homes, luxury serviced apartment, or Luxury flat for sale in North Goa, 
			Axis Ecorp has you covered. Finding any Property for sale in north goa is very easy. The only name you can trust 
			for quality construction and timely delivery is Axis Ecorp. 
         </p>
         <p>Axis Blues was the flagship property launched by Axis Ecorp. The project overlooks a 6-acre lake and offers luxury 
		 serviced apartments for sale in Goa. Set in an idyllic setting, these apartments provide an innovative service concept. 
		 The one-of-its-kind concierge service makes it super easy to manage day-to-day tasks so that you can focus on enjoying your
		 life and let experts handle the rest. It is not just a house but an experience where like-minded people can enjoy 
		 an elevated living experience. 
         </p>
         <p>
            Spend your evening lazing around in dew-laced grass. Enjoy the lush-green views that melt your heart. Wake up to the 
			sounds of birds and bees with the scenic hills in the backdrop. If you want a property that offers a quaint lifestyle, 
			then Axis Blues luxury resorts in goa is a perfect option. It welcomes you to revel in the vibrant and harmonious ecosystem.
			Axis Blues offers Multiple outdoor activities and high-standard service and comfort along with the perks of natural living. 
			It is an independent luxury flats with all the modern amenities and is enriched by designer furniture and materials. 
         </p>
      </div>
   </div>
</section>
<section class="amenities_section section" id="amenities">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Amenities </h2>
      </header>
      <ul class="axis_bg">
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-1.png') }}" alt="amenities-1.png">
            </div>
            <p>RESTAURANTS</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-2.png') }}" alt="amenities-2.png">
            </div>
            <p>GOLF LEARNING</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-3.png') }}" alt="amenities-3.png">
            </div>
            <p>SQUASH</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-4.png') }}" alt="amenities-4.png">
            </div>
            <p>CLUB THEATER</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-5.png') }}" alt="amenities-5.png">
            </div>
            <p>PARTY ZONES</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-6.png') }}" alt="amenities-6.png">
            </div>
            <p>KIDS CRECHE</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-7.png') }}" alt="amenities-7.png">
            </div>
            <p>KIDS PLAY ZONE</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-8.png') }}" alt="amenities-8.png">
            </div>
            <p>BADMINTON COURTS</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-9.png') }}" alt="amenities-9.png">
            </div>
            <p>LIBRARY</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-10.png') }}" alt="amenities-10.png">
            </div>
            <p>BASKETBALL COURT</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-11.png') }}" alt="amenities-11.png">
            </div>
            <p>SKATING RINK</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-12.png') }}" alt="amenities-12.png">
            </div>
            <p>LIFE SIZE CHESS</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-13.png') }}" alt="amenities-13.png">
            </div>
            <p>SWIMMING POOL</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-14.png') }}" alt="amenities-14.png">
            </div>
            <p>GYMNASIUM</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-15.png') }}" alt="amenities-15.png">
            </div>
            <p>JOGGING TRACKS</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-16.png') }}" alt="amenities-16.png">
            </div>
            <p>CRICKET PRACTICE</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-17.png') }}" alt="amenities-17.png">
            </div>
            <p>YOGA</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/amenities/amenities-18.png') }}" alt="amenities-18.png">
            </div>
            <p>AMPHITHEATER</p>
         </li>
      </ul>
   </div>
</section>
<section class="specification_section" id="specifications">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Specifications </h2>
      </header>
      <div class="specification_outer">
         <div class="col-sm-12 col-md-6 wow fadeInUp axisfadeup">
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon1.png')}}" alt="blues-specification-icon1.png">
               </div>
               <div class="spec_title">Living /Dining Room</div>
               <p>1. Flooring - Glazed Vitrified Tiles</p>
               <p>2. Wall Finish - Internal walls with POP punning with plastic emulsion paint or
                  texture finish.
               </p>
               <p>3. Equipment - LED Smart TV 42" , set top box and remote , intercom</p>
               <p>4. Furniture - 2 +3 Seater Sofa , center table, Dining Table with 4 chairs, pedestal
                  lamp 
               </p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon2.png')}}" alt="blues-specification-icon2.png">
               </div>
               <div class="spec_title">Bedroom</div>
               <p>1. Flooring - Laminated Wooden Flooring</p>
               <p>2. Wall Finish - Internal walls with POP punning with plastic emulsion paint or
                  texture finish
               </p>
               <p>3. Cupboard - Modular Wooden Cupboard , safe locker</p>
               <p>4. Furniture - Bed with Mattress, Side Tables , intercom </p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon3.png')}}" alt="blues-specification-icon3.png">
               </div>
               <div class="spec_title">Lift Lobby</div>
               <p>1. Flooring - Granite / Glazed Vetrified Tiles</p>
               <p>2. Wall Finish- Plastic Emulsion Paint along with Stone / Tiles </p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon4.png')}}" alt="blues-specification-icon4.png">
               </div>
               <div class="spec_title">Smart Living</div>
               <p>App enable control of lights, TV, AC, Fans, Geysers, Curtain mortars, Panic alert
                  with hooter and child tracking system. Hi speed internet, Wi-Fi, DTH 
               </p>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 wow fadeInUp axisfadeup">
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon5.png')}}" alt="blues-specification-icon5.png">
               </div>
               <div class="spec_title">Kitchen</div>
               <p>1. Equipment - Min Refrigerator, Microwave, Electric / Induction Cook-top, Electric
                  Kettle & RO.
               </p>
               <p>2. Fittings - Modular Kitchen Storage, With Mini BAR, SS Sink with Drain Board,
                  Garbage bins. 
               </p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon6.png')}}" alt="blues-specification-icon6.png">
               </div>
               <div class="spec_title">Door</div>
               <p>1. Main Entry Door- Designer 40mm thick, Moulded skin doors with Masonite skin both
                  side or eq. ,architrave and hardware
               </p>
               <p>2. Internal Door- Designer 40mm thick, Moulded skin doors with Masonite skin out side
                  and laminate finish in side or eq. , architrave and hardware
               </p>
               <p>3. Toilet Door- Designer 40mm thick, Moulded skin doors with Masonite skin out side
                  and laminate finish in side or eq. , architrave and hardware 
               </p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon7.png')}}" alt="blues-specification-icon7.png">
               </div>
               <div class="spec_title">Electrical</div>
               <p>All electrical wiring concealed conduits, provision for adequate light and power
                  points, telephone, TV in living room, Modular switches & MCB, intercom facility with
                  instrument, FAN, chandelier, LED lights curtain motor. 
               </p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/specifications/blues-specification-icon8.png')}}" alt="blues-specification-icon8.png">
               </div>
               <div class="spec_title">AC</div>
               <p>2.5 ton Air Conditionner (Sharing based VRV unit </p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="unitdetail_section" id="unitplan">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Unit Details </h2>
      </header>
      <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="img_holder">
            <a data-lity data-lity-desc="blues-unit1.png"
               href="{{ URL::asset('frontend/img/projects/axisblues/unitdetails/blues-unit1.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/unitdetails/blues-unit1.jpg')}}"
               alt="blues-unit1.jpg"></a>
         </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="img_holder">
            <a data-lity data-lity-desc="blues-unit2.png"
               href="{{ URL::asset('frontend/img/projects/axisblues/unitdetails/blues-unit2.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/unitdetails/blues-unit2.jpg')}}"
               alt="blues-unit2.jpg"></a>
         </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="img_holder">
            <a data-lity data-lity-desc="blues-unit3.png"
               href="{{ URL::asset('frontend/img/projects/axisblues/unitdetails/blues-unit3.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/unitdetails/blues-unit3.jpg')}}"
               alt="blues-unit3.jpg"></a>
         </div>
      </div>
   </div>
</section>
<section class="unitdetail_section" id="plan">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Plans </h2>
      </header>
      <div id="exTab2" class="container">
         <ul class="nav nav-tabs">
            <li class="active"><a href="#1" data-toggle="tab">Cluster Plan</a></li>
            <li><a href="#2" data-toggle="tab">Overall Master Plan</a></li>
         </ul>
         <div class="tab-content ">
            <div class="tab-pane active" id="1">
               <a data-lity data-lity-desc="plan"
                  href="{{ URL::asset('frontend/img/projects/axisblues/plans/custerplan/blues-floor-plan.jpg')}}"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/plans/custerplan/blues-floor-plan.jpg')}}"
                  alt="plan"></a>
            </div>
            <div class="tab-pane" id="2">
               <a data-lity data-lity-desc="blues-site-plan.jpg"
                  href="{{ URL::asset('frontend/img/projects/axisblues/plans/projectplan/blues-site-plan.jpg')}}"><img
                  src="{{ URL::asset('frontend/img/projects/axisblues/plans/projectplan/blues-site-plan.jpg')}}"
                  alt="plan"></a>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="price_section" id="price">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Price </h2>
      </header>
      <a data-lity data-lity-desc="axisblues_pricelist.jpg"
         href="{{ URL::asset('frontend/img/projects/axisblues/plans/pricelist/axisblues_pricelist.jpg')}}"><img
         src="{{ URL::asset('frontend/img/projects/axisblues/plans/pricelist/axisblues_pricelist.jpg')}}"
         alt="price"></a>
   </div>
</section>
<section class="unitdetail_section" id="gallery">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Gallery</h2>
      </header>
      <div id="exTab2" class="container">
         <ul class="nav nav-tabs">
            <!--<li class="active"><a href="#4" data-toggle="tab">Gallery</a></li>-->
         </ul>
         <div class="tab-content ">
            <div class="tab-pane active" id="4">
               <ul class="gallery">
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-1.jpg"
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-1.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-1.jpg')}}" alt="blues-gallery-1.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-2.jpg"
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-2.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-2.jpg')}}" alt="blues-gallery-2.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-3.jpg"
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-3.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-3.jpg')}}" alt="blues-gallery-3.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-4.jpg""
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-4.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-4.jpg')}}" alt="blues-gallery-4.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-5.jpg"
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-5.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-5.jpg')}}" alt="blues-gallery-5.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-6.jpg"
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-6.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-6.jpg')}}" alt="blues-gallery-6.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-7.jpg"
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-7.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-7.jpg')}}" alt="blues-gallery-7.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="blues-gallery-8.jpg"
                           href="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-8.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/axisblues/gallery/galleryimage/blues-gallery-8.jpg')}}" alt="blues-gallery-8.jpg"></a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="unitdetail_section" id="progress">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">progress status</h2>
      </header>
      <div class="tab-pane video_gallery status">
         <div class="projects-carousel js-projects-carousel ">
		 
		   <div class="project">
               <div class="img_holder">
                  <a href="https://www.youtube.com/watch?v=Ehpu9Wtdq8I&ab_channel=AxisE-corp" data-lity><img
                             src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg">
				   </a>
               </div>
               <p>Jun - Sept 2022</p>
            </div>
		 
		  <div class="project">
               <div class="img_holder">
                  <a href="https://youtu.be/v03bu9U_cXg" data-lity><img
                             src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg">
				   </a>
               </div>
               <p>Jan - April 2022</p>
            </div>
			
		  <div class="project">
               <div class="img_holder">
                  <a href="https://youtu.be/HaeEDCFjm9o" data-lity><img
                             src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg">
				   </a>
               </div>
               <p>Sept - Dec 2021</p>
            </div>
		 
		       <div class="project">
               <div class="img_holder">
                  <a href="https://www.youtube.com/watch?v=cDMVy9KuAFg" data-lity><img
                             src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>Jun - Sept 2021</p>
            </div>
		 
		 
		 
            <div class="project">
               <div class="img_holder">
                  <a href="https://www.youtube.com/watch?v=JRHyPOT9V0M&t=39s" data-lity><img
                             src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>April 2021</p>
            </div>
            <div class="project">
               <div class="img_holder">
                  <a href="https://www.youtube.com/watch?v=NRRrbHrjW2Q" data-lity><img
                             src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>February 2021</p>
            </div>
            <div class="project">
               <div class="img_holder">
                  <a href="https://www.youtube.com/watch?v=DN8PgjScm6I" data-lity><img
                     src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>December 2020</p>
            </div>
            <div class="project">
               <div class="img_holder">
                  <a href="https://www.youtube.com/watch?v=ehJKcTrsXH0" data-lity><img
                     src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>October 2020</p>
            </div>
            <div class="project">
               <div class="img_holder">
                  <a href='https://realestatesandbox.s3.ap-south-1.amazonaws.com/frontend/construction_videos/Construction_Book_July20.mp4'
                     data-lity><img
                     src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>July 2020</p>
            </div>
            <div class="project">
               <div class="img_holder">
                  <a href='https://realestatesandbox.s3.ap-south-1.amazonaws.com/frontend/construction_videos/Construction_Book_Feb20.mp4'
                     data-lity><img
                     src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>February 2020</p>
            </div>
            <div class="project">
               <div class="img_holder">
                  <a href='https://realestatesandbox.s3.ap-south-1.amazonaws.com/frontend/construction_videos/Construction_Book_Jan19.mp4'
                     data-lity><img
                     src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>January 2020</p>
            </div>
            <div class="project">
               <div class="img_holder">
                  <a href='https://realestatesandbox.s3.ap-south-1.amazonaws.com/frontend/construction_videos/Construction_Book_Dec19.mp4'
                     data-lity><img
                     src="{{ URL::asset('frontend/img/projects/axisblues/gallery/projectstatus/blues-gallery-video1.jpg')}}" alt="blues-gallery-video1.jpg"></a>
               </div>
               <p>December 2019</p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="unitdetail_section" id="certificates">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">MAHARERA Certificates </h2>
      </header>
      <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="img_holder">
            <a data-lity data-lity-desc="RERA1.jpg"
               href="{{ URL::asset('frontend/img/projects/axisblues/certificates/RERA1.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/certificates/RERA1.jpg')}}"
               alt="RERA1.jpg"></a>
         </div>
         <p class="titles_all">Towers A,D,G</p>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="img_holder">
            <a data-lity data-lity-desc="RERA2.jpg"
               href="{{ URL::asset('frontend/img/projects/axisblues/certificates/RERA2.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/certificates/RERA2.jpg')}}"
               alt="RERA2.jpg"></a>
         </div>
         <p class="titles_all">Towers B,E,H</p>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="img_holder">
            <a data-lity data-lity-desc="RERA3.jpg"
               href="{{ URL::asset('frontend/img/projects/axisblues/certificates/RERA3.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/axisblues/certificates/RERA3.jpg')}}"
               alt="RERA3.jpg"></a>
         </div>
         <p class="titles_all">Towers C,F,I,J</p>
      </div>
   </div>
</section>
<section class="locatio_section" id="location_map">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Location Map </h2>
      </header>
      <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="img_holder">
            <a data-lity data-lity-desc="Map"
               href="{{ URL::asset('frontend/img/projects/axisblues/map/axisblues-map.png') }}">
            <img src="{{ URL::asset('frontend/img/projects/axisblues/map/axisblues-map.png') }}"
               alt="Map">
            </a>
         </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61453.83815205503!2d73.962433!3d15.705321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis%20Blues!5e0!3m2!1sen!2sin!4v1609390834725!5m2!1sen!2sin"
            width="100%" height="310" frameborder="0" style="border:0;" allowfullscreen=""
            aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="clear"></div>
      <div class="form-submit text-center" style="margin:30px 0px;">
         <button type="submit" class="btn btn-shadow-2 wow swing" style="visibility: visible;"><a class="google-map-axis" 
            href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61453.83815205503!2d73.962433!3d15.705321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis%20Blues!5e0!3m2!1sen!2sin!4v1609390834725!5m2!1sen!2sin"
            data-lity>Open Google Map</a></button>
      </div>
   </div>
</section>
<section class="location_advantage ">
   <div class="container">
   <header class="section-header">
      <h2 class="section-title">Location Advantages </h2>
   </header>
   <div class="adv">
      <div class="col-sm-12 col-md-4 col-lg-4">
         <h4>Airport</h4>
         <p>Mopa Airport - 18 Km *</p>
         <p>Chipi-Parule Airport - 75 Km</p>
         <p>Dabolim Airport - 70 Km</p>
         <p>Belgaum Airport - 80 Km</p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4">
         <h4>Sea & Beaches</h4>
         <p>Mandrem Beach - 36 Km</p>
         <p>Vagator Beach - 31 Km</p>
         <p>Calangute Beach - 35 Km</p>
         <p>Colva Beach - 70 Km</p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4">
         <h4>Railway Station</h4>
         <p>Thivim - 15 Km</p>
         <p>Madgaon - 69 Km</p>
         <p>Kudal - 50 Km</p>
         <p>Pernem - 25 Km</p>
      </div>
      <br><br>
      <div class="note">
         <h4>* Note: Operational by 2022</h4>
      </div>
   </div>
</section>
@include('new_frontend.includes.footer')
@endsection