@extends('new_frontend.layouts.app')
@section('content')
@include('new_frontend.includes.header')
<div class="project_menu mobile_side">
   <div class="project_logo"><a href="#home"><img
      src="{{ URL::asset('frontend/img/projects/yogvillas/logo/yogvillas-logo.jpg')}}"
      alt="yog villas"></a></div>
   <ul>
      <li><a href="#overview" class="js-scroll">Overview</a></li>
      <li><a href="#amenities" class="js-scroll">Amenities</a></li>
      <li><a href="#specifications" class="js-scroll">Specifications</a></li>
      <li><a href="#unitplan" class="js-scroll">Unit Details</a></li>
      <li><a href="#plan" class="js-scroll">Plans</a></li>
      <li><a href="#price" class="js-scroll">Price</a></li>
      <li><a href="#gallery" class="js-scroll">Gallery</a></li>
      <li><a href="#certificates" class="js-scroll">Certificates</a></li>
      <li><a href="#location_map" class="js-scroll">Location Map</a></li>
      <li><a href="yogvilla-payment">Payment Online</a></li>
      <li><a href="https://www.youtube.com/embed/OAEUF4h2MWg" data-lity="">Walk Through</a></li>
      <li><a href="#" id="download_application_form" data-toggle="modal" data-target="#application_form_download">Application Form</a></li>
      <li><a href="#" id="download_brochuer" data-toggle="modal" data-target="#yogvillasdownload">Download Brochure</a></li>
   </ul>
</div>
<div class="menu_mobile">
   <img src="{{ URL::asset('frontend/img/others/bars.png')}}" alt="yogvillas">
</div>
{{-- Brochure Download modal start --}}
<div class="modal fade in" id="yogvillasdownload" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body inq-form">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div>
               <h3 class="text-center"><i class="fa fa-download"></i> Download Yog Villas Brochure</h3>
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
                           <input type="tel" class="form-control" id="yogvillasphone" name="txtPhone" required placeholder="e.g. +1 702 123 4567">
                           <input type="hidden" name="page_reference" value="yogvillas">
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
               <h3 class="text-center"><i class="fa fa-download"></i> Download Yog Villas Application Form</h3>
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
                           <input type="tel" class="form-control" id="yogvillasphone" name="txtPhone" required placeholder="Phone">
                           <input type="hidden" name="page_reference" value="yogvillas_application_form">
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
         <h1 class="entry-title abt_title2">Axis Yog Villas<span class="text-primary"></span></h1>
		 
		  <h2 class="entry-title abt_title3">North of Goa, Dodamarg, Sindhudurg</h2>
		  
		  <h3><i>The Best Luxury Villas in North of Goa</i></h3>
		  

		 <br>
		 <p><strong>Get everything you wished for and more from Axis villa in Goa </strong></p>
		 
         <p class="entry-text">Axis Yog Villas is inspired by European clustered-town designs and offers smart holiday homes in north Goa that offer the best possible experience. These Luxury vacation homes in Goa are accentuated by nature and replete with all modern comforts and convenience. Every home at Axis Yog Villas presents a distinct flavor from contemporary chic to effervescent glamour take your pick of the best luxury villas in Goa.
         </p>
        
         <p>Axis Yog Villas are designed with your convenience in mind from every service offered within these luxury villas in Goa to the project’s close proximity to the new MOPA airport. By owning Axis Yog Villas, luxury villas in Goa, you have the best of all worlds. 
         </p>
         <p>
            Axis Yog Villas is a RERA-certified project designed with the best-in-class standards of premium smart services with centralized concierge desks, intuitive 24/7 housekeeping, and end-to-end property management for your convenience.
         </p>
		 
		 <p>These villas that are on sale in North Goa allow you to stay in the lap of luxury and elegance in these luxury villas in Goa.  These fully serviced villa are the epitome of sophistication and luxury the perfect investment to meet your needs when you're here and when you rent out to travelers.
		 </p>
		 
		 
		 <p>Right from the magical beaches to the warm people, Goa invites you to a lifestyle where the party never ends. Taking inspiration from this amazing culture, we have created a resort-like paradise in one of Goa’s pristine locations. The project size of Axis Yog Villas is a stunning 120 crores which are directed towards creating fully-managed luxury homes for the discerning investor.  
		 </p>
		 
		 
		 <p>Here’s a golden chance to invest in one of the best luxury villas in Goa, which is nothing short of a Dream Villa. If you are looking for a villa for sale in Goa or a 2 BHK villa for sale in north Goa, then Axis Yog Villas is a perfect fit for you. Each villa has two tastefully done rooms, a garden, and a private pool. The full suite of services enables you to maintain this villa with no effort. 
		 </p>
		 
      </div>
   </div>
</section>
<section class="amenities_section section" id="amenities">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Resort Living Amenities </h2>
      </header>
      <p class="text-center">Our lavish amenities are central to the Axis Yog Villas promise of an
         enjoyable lifestyle to its residents.
      </p>
      <ul class="yogvillas_bg">
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-1.png')}}" alt="yogvillas-amenities-1.png">
            </div>
            <p>Health Club & Spa</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-2.png')}}" alt="yogvillas-amenities-2.png">
            </div>
            <p>24/7 Housekeeping</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-3.png')}}" alt="yogvillas-amenities-3.png">
            </div>
            <p>Sports and Clubbing</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-4.png')}}" alt="yogvillas-amenities-4.png">
            </div>
            <p>Landscape</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-5.png')}}" alt="yogvillas-amenities-5.png">
            </div>
            <p>Private Pool</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-6.png')}}" alt="yogvillas-amenities-6.png">
            </div>
            <p>Food Drinks & More</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-7.png')}}" alt="yogvillas-amenities-7.png">
            </div>
            <p>Smart Living</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-8.png')}}" alt="yogvillas-amenities-8.png">
            </div>
            <p>Vastu Compliance</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-9.png')}}" alt="yogvillas-amenities-9.png">
            </div>
            <p>Private Pool Villa</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-10.png')}}" alt="yogvillas-amenities-10.png">
            </div>
            <p>Sport & Healthcare Club</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-11.png')}}" alt="yogvillas-amenities-11.png">
            </div>
            <p>Security & Transport</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/amenities/yogvillas-amenities-12.png')}}" alt="yogvillas-amenities-12.png">
            </div>
            <p>Helipad</p>
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
                  src="{{ URL::asset('frontend/img/projects/yogvillas/specification/blues-specification-icon2.png')}}" alt="blues-specification-icon2.png">
               </div>
               <div class="spec_title">Bedrooms</div>
               <p>Laminated Wooden Flooring</p>
               <p>Plastic Emulsion Paint for Walls</p>
               <p>Bed with Mattress</p>
               <p>Side Tables</p>
               <p>Carpet</p>
               <p>Lamppost as Furniture</p>
               <p>40inch LED TV with Setup Box (in Master Bedroom)</p>
               <p>1.5 Ton Split AC on each bed room</p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/yogvillas/specification/liveing-icon.png')}}" alt="liveing-icon.png">
               </div>
               <div class="spec_title">Living</div>
               <p>Glassed Vitrified tiles for flooring</p>
               <p>Plastic Emulsion Paint on walls</p>
               <p>40inch LED TV with Setup Box</p>
               <p>5 Seater Sofa with Side Lamp</p>
               <p>1.5 Ton Split AC</p>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 wow fadeInUp axisfadeup">
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/yogvillas/specification/kitchin-icon.png')}}" alt="kitchin-icon.png">
               </div>
               <div class="spec_title">Kitchen & Dining</div>
               <p>Ceramic Tiles till 600mm</p>
               <p>Above the counter slab</p>
               <p>Rest painted with Plastic Emulsion Paint</p>
               <p>Modular Kitchen Storage with BAR counter</p>
               <p>SS Sink with Drain Board and Garbage bins</p>
               <p>180ltr Refrigerator, Microwave, Chimney &amp; Hub</p>
               <p>Electric Kettle &amp; RO</p>
               <p>Dining Table with 4 chair</p>
            </div>
            <div class="spec">
               <div class="specification_icon"><img
                  src="{{ URL::asset('frontend/img/projects/yogvillas/specification/toilet-icon.png')}}" alt="toilet-icon.png">
               </div>
               <div class="spec_title">Toilet & Dresser</div>
               <p>Geyser</p>
               <p>Exhaust Fan</p>
               <p>Toilet Mirror &amp; Vanity &amp; Hair dryer</p>
               <p>Matching washbasin with WC</p>
               <p>Branded CP Fittings with rain shower</p>
               <p>Anti-skid Ceramic Tiles</p>
               <p>Modular Wooden Cupboard for Dresser with Mirror</p>
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
      <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="img_holder">
            <a data-lity data-lity-desc="unit detail"
               href="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan1.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan1.jpg')}}"
               alt="plan"></a>
         </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="img_holder">
            <a data-lity data-lity-desc="unit detail"
               href="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan2.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan2.jpg')}}"
               alt="plan"></a>
         </div>
      </div>
   </div>
</section>
<section class="unitdetail_section" id="plan">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Plans</h2>
      </header>
      <div id="exTab2" class="container">
         <ul class="nav nav-tabs">
            <li class="active"><a href="#1" data-toggle="tab">Overall Master Plan</a></li>
            <!--<li><a href="#2" data-toggle="tab">Project Plan</a></li>-->
         </ul>
         <div class="tab-content ">
            <div class="tab-pane active" id="1">
               <a data-lity data-lity-desc="site-layout.jpg"
                  href="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/site-layout.jpg')}}"><img
                  src="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/site-layout.jpg')}}"
                  alt="plan"></a>
            </div>
            <!-- <div class="tab-pane" id="2">
               <div class="col-sm-6 col-md-6 col-lg-6">
                   <div class="img_holder">
                       <a data-lity data-lity-desc="Photo of a flower"
                          href="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan1.png')}}"><img
                                   src="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan1.png')}}"
                                   alt="plan"></a>
                       <p>GROUND FLOOR</p>
                   </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-6">
                   <div class="img_holder">
                       <a data-lity data-lity-desc="Photo of a flower"
                          href="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan1.png')}}"><img
                                   src="{{ URL::asset('frontend/img/projects/yogvillas/plans/ourplan/yogvillas-plan2.png')}}"
                                   alt="plan"></a>
                       <p>FIRST FLOOR</p>
                   </div>
               </div>
               <div class="clear"></div>
               </div>
               -->
         </div>
      </div>
   </div>
</section>
<section class="price_section" id="price">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Price </h2>
      </header>
      <a data-lity data-lity-desc="yogvilla-price-list.jpg"
         href="{{ URL::asset('frontend/img/projects/yogvillas/plans/pricelist/yogvilla-price-list.jpg')}}"><img
         src="{{ URL::asset('frontend/img/projects/yogvillas/plans/pricelist/yogvilla-price-list.jpg')}}"
         alt="price"></a>
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
                        <a data-lity data-lity-desc="yog-gallery1.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery1.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery1.jpg')}}" alt="yog-gallery1.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="yog-gallery2.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery2.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery2.jpg')}}" alt="yog-gallery2.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="yog-gallery3.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery3.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery3.jpg')}}" alt="yog-gallery3.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="yog-gallery4.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery4.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery4.jpg')}}" alt="yog-gallery4.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="yog-gallery5.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery5.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery5.jpg')}}" alt="yog-gallery5.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="yog-gallery6.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery6.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery6.jpg')}}" alt="yog-gallery6.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="yog-gallery7.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery7.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery7.jpg')}}" alt="yog-gallery7.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="yog-gallery8.jpg"
                           href="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery8.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/yogvillas/gallery/yog-gallery8.jpg')}}" alt="yog-gallery8.jpg"></a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="unitdetail_section" id="certificates">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">MAHARERA Certificates  </h2>
      </header>
      <div class="col-sm-4 col-md-4 col-lg-4">
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="img_holder">
            <a data-lity="" data-lity-desc="RERA1.jpg" href="{{ URL::asset('frontend/img/projects/yogvillas/certificates/RERA1.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/yogvillas/certificates/RERA1.jpg')}}" alt="RERA1.jpg"></a>
         </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
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
            <a data-lity data-lity-desc="yogvills-map.jpg"
               href="{{ URL::asset('frontend/img/projects/yogvillas/map/yogvills-map.jpg') }}">
            <img src="{{ URL::asset('frontend/img/projects/yogvillas/map/yogvills-map.jpg') }}"
               alt="Map">
            </a>
         </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="img_holder">
            <a data-lity data-lity-desc="yogvillas-map-two.jpg"
               href="{{ URL::asset('frontend/img/projects/yogvillas/map/yogvillas-map-two.jpg') }}">
            <img src="{{ URL::asset('frontend/img/projects/yogvillas/map/yogvillas-map-two.jpg') }}"
               alt="Map">
            </a>
         </div>
         <!--
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61453.83815205503!2d73.962433!3d15.705321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis%20Blues!5e0!3m2!1sen!2sin!4v1609390834725!5m2!1sen!2sin"
                    width="100%" height="310" frameborder="0" style="border:0;" allowfullscreen=""
                    aria-hidden="false" tabindex="0"></iframe>
            
            -->
      </div>
      <div class="clear"></div>
      <!--
         <div class="form-submit text-center" style="margin:30px 0px;">
             <button type="submit" class="btn btn-shadow-2 wow swing" style="visibility: visible;"><a
                         style="color:#fff; text-decoration:none;"
                         href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61453.83815205503!2d73.962433!3d15.705321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis%20Blues!5e0!3m2!1sen!2sin!4v1609390834725!5m2!1sen!2sin"
                         data-lity>Open Google Map</a></button>
         </div>
         -->
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