@extends('new_frontend.layouts.app')
@section('content')
@include('new_frontend.includes.header')
<div class="project_menu mobile_side">
   <div class="project_logo"><a href="#home"><img
      src="{{ URL::asset('frontend/img/projects/lakecity/logo/lakecity-logo.png')}}" alt="lakecity"></a>
   </div>
   <ul>
      <li><a href="#overview" class="js-scroll">Overview</a></li>
      <li><a href="#amenities" class="js-scroll">Amenities</a></li>
      <li><a href="#unitplan" class="js-scroll">Unit Details</a></li>
      <li><a href="#plan" class="js-scroll">Plans</a></li>
      <li><a href="#price" class="js-scroll">Price</a></li>
      <li><a href="#gallery" class="js-scroll">Gallery</a></li>
      <li><a href="#certificates" class="js-scroll">Certificates</a></li>
      <li><a href="#location_map" class="js-scroll">Location Map</a></li>
      <li><a href="#" id="download_application_form" data-toggle="modal" data-target="#application_form_download">Application Form</a></li>
      <li><a href="#" id="download_payment_plan" data-toggle="modal" data-target="#payment_plan_download">Payment Plan</a></li>
      <li><a href="#" id="download_brochuer" data-toggle="modal" data-target="#lakecitydownload">Download Brochure</a></li>
   </ul>
</div>
<div class="menu_mobile">
   <img src="{{ URL::asset('frontend/img/others/bars.png')}}" alt="lakecity">
</div>
{{-- Brochure Download modal start --}}
<div class="modal fade in" id="lakecitydownload" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body inq-form">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div>
               <h3 class="text-center"><i class="fa fa-download"></i> Download Lake City Brochure</h3>
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
                           <input type="tel" class="form-control" id="lakecityphone" name="txtPhone" required placeholder="e.g. +1 702 123 4567">
                           <input type="hidden" name="page_reference" value="lakecity">
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
               <h3 class="text-center"><i class="fa fa-download"></i> Download Lake City Application Form</h3>
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
                           <input type="tel" class="form-control" id="lakecityphone" name="txtPhone" required placeholder="Phone">
                           <input type="hidden" name="page_reference" value="lakecity_application_form">
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
{{-- Payment Plan modal start --}}
<div class="modal fade in" id="payment_plan_download" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body inq-form">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div>
               <h3 class="text-center"><i class="fa fa-download"></i> Download Lake City Payment Plan</h3>
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
                           <input type="tel" class="form-control" id="lakecityphone" name="txtPhone" required placeholder="Phone">
                           <input type="hidden" name="page_reference" value="lakecity_payment_plan">
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
{{-- Payment Plan modal end --}}
<div class="layout">
@include('new_frontend.includes.sidebar')
<div class="content">
<section id="about" class="about section">
   <div class="container" id="overview">
      <div class="">
         <h1 class="entry-title abt_title2">Axis Lake City</h1>

<h2 class="entry-title abt_title3">North of Goa, Dodamarg, Sindhudurg</h2>

<h3><i>The best property investment in Goa</i></h3>



		 
		<br>
		 <p><strong>A golden opportunity to build your dream home the way you like it </strong></p>
         <p class="entry-text">While there is a lot of demand for plots for sale in North of Goa, the supply is limited. Owning holiday homes in Goa is an investment that will keep on giving. With Axis Lake City property investment in North of Goa, Dodamarg, Sindhudurg not only you get a golden opportunity to own commercial plots, but you also get the freedom to build your dream villa, estate, townhouse, or holiday homes. 
         </p>
		 
		 
		 <p>There is a burgeoning demand for commercial plots in North Goa, but they are not many commercial plots for sale in north goa. Axis Lake City from Axis Ecorp offers the best land for sale in Goa. These plots are set in a picturesque location and are ideal for those looking to build an independent house for sale in goa. It is a safe investment that allows every homebuyer to customize their dream home in their manner and offer the best return on investment.  
         </p>
		 <p>Axis Lake City offers Property for sale in Goa. These plots are commercially-approved and building-sanctioned plots, and can homebuyers can make townhouses, villas, and 2-floor buildings or buying holiday homes here. </p>
		<p>Since these are commercial plots, all the commercial clearances are already in place. You can start your business activities from this place as soon as you want and start earning. If you are looking to invest Rs 50 lakhs in a real estate project, then Axis Lake City is a good investment choice. </p>
		<p>With Axis Lake City, you break away from all the molds and pre-conceived and pre-build homes. You get to make something that is unique and you. You can take inspiration from Portuguese architecture or add your own touches to this holiday home. </p>
		<p>Most property investment in Goa requires investment above Rs 50 lakh, but the important question that most people have in mind is regarding the returns. Investing in Axis Lake City, North of Goa, Dodamarg, and Sindhudurg allows you to get the benefits of simplified land ownership, fully-approved commercial plots in Goa, and comprehensive services for housekeeping & security for holiday homes in Goa. All this, along with the full value of your property investment in Goa.</p>
		<p>Axis Lake City features a state-of-the-art clubhouse with indulgent features and top-of-the-line amenities such as a luxury spa, meditation center, pool, gym, dining options, and more. Axis Lake City's build-to-suit commercial plots can be easily rented out and enable owners to earn commercial income from it when not in use. </p>
		<p>The project is also minutes away from the new Goa International Airport (MOPA airport) and offers excellent potential in regard to tourism. There is also a large scale of development envisaged around this project. All these factors will only add to the project's charm and allow owners to enjoy the handsome appreciation for their investment. </p>


		<section class="keyfeatures_sec lcity-padding">
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="img_holder">
                  <img src="{{ URL::asset('frontend/img/projects/lakecity/features/lakecity-feathure1.jpg')}}"
                     alt="lakecity-feathure1.jpg">
               </div>
               <p>Usage-Commercial/Mixed Land Use Plots</p>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="img_holder">
                  <img src="{{ URL::asset('frontend/img/projects/lakecity/features/lakecity-feathure2.jpg')}}"
                     alt="lakecity-feathure2.jpg">
               </div>
               <p>Tourism</p>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="img_holder">
                  <img src="{{ URL::asset('frontend/img/projects/lakecity/features/lakecity-feathure3.jpg')}}"
                     alt="lakecity-feathure3.jpg">
               </div>
               <p>Health Seekers</p>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="img_holder">
                  <img src="{{ URL::asset('frontend/img/projects/lakecity/features/lakecity-feathure4.jpg')}}"
                     alt="lakecity-feathure4.jpg">
               </div>
               <p>Nature Lovers</p>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="img_holder">
                  <img src="{{ URL::asset('frontend/img/projects/lakecity/features/lakecity-feathure5.jpg')}}"
                     alt="lakecity-feathure5.jpg">
               </div>
               <p>Corporates</p>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="img_holder">
                  <img src="{{ URL::asset('frontend/img/projects/lakecity/features/lakecity-feathure6.jpg')}}"
                     alt="lakecity-feathure6.jpg">
               </div>
               <p>Destination Wedding</p>
            </div>
         </section>
      </div>
   </div>
</section>
<section class="amenities_section section" id="amenities">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Amenities </h2>
      </header>
      <ul>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/amenities-13.png')}}" alt="amenities-13.png">
            </div>
            <p>Swimming Pool</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/spa-icon.png')}}" alt="spa-icon.png">
            </div>
            <p>Spa</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/amenities-5.png')}}" alt="amenities-5.png">
            </div>
            <p>Community Play</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/chess-room-icon.png')}}" alt="chess-room-icon.png">
            </div>
            <p>Chess Room</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/yogvillas-amenities-10.png')}}" alt="yogvillas-amenities-10.png">
            </div>
            <p>Gym</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/pool-snooker-icon.png')}}" alt="pool-snooker-icon.png">
            </div>
            <p>Pool & Snooker</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/outlet.png')}}" alt="outlet.png">
            </div>
            <p>Convenience Outlet</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/yogvillas-amenities-11.png')}}" alt="yogvillas-amenities-11.png">
            </div>
            <p>CCTV</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/library-icon.png')}}" alt="library-icon.png">
            </div>
            <p>Library</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/dining-icon.png')}}" alt="dining-icon.png">
            </div>
            <p>Dining</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/medical.png')}}" alt="medical.png">
            </div>
            <p>On Call Medical</p>
         </li>
         <li>
            <div class="icon_holder"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/amenities/meditation-icon.png')}}" alt="meditation-icon.png">
            </div>
            <p>Meditation Center</p>
         </li>
      </ul>
   </div>
</section>
<section class="unitdetail_section" id="unitplan">
   <div class="container">
      <header class="section-header">
         <h2 class="section-title">Unit Details </h2>
      </header>
      <div class="unit_detail_center">
         <div class="img_holder">
            <a data-lity data-lity-desc="Photo of a flower"
               href="{{ URL::asset('frontend/img/projects/lakecity/plans/projectplan/floor-plan.jpg')}}"><img
               src="{{ URL::asset('frontend/img/projects/lakecity/plans/projectplan/floor-plan.jpg')}}"
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
            <li class="active"> <a href="#1" data-toggle="tab">Overall Master Pan </a> </li>
            <!-- <li><a href="#2" data-toggle="tab">Project Plan</a></li>-->
         </ul>
         <div class="tab-content ">
            <div class="tab-pane active" id="1">
               <a data-lity data-lity-desc="price"
                  href="{{ URL::asset('frontend/img/projects/lakecity/plans/siteplans/lakecity-siteplan.jpg')}}
                  "><img src="{{ URL::asset('frontend/img/projects/lakecity/plans/siteplans/lakecity-siteplan.jpg')}}"
                  alt="price"></a>
            </div>
            <!--<div class="tab-pane" id="2">
               <div class="col-sm-6 col-md-6 col-lg-6">
                   <div class="img_holder">
                       <a data-lity data-lity-desc="Photo of a flower"
                          href="{{ URL::asset('frontend/img/projects/lakecity/plans/projectplan/lakecity-plan-gf-villa.jpg')}}"><img
                                   src="{{ URL::asset('frontend/img/projects/lakecity/plans/projectplan/lakecity-plan-gf-villa.jpg')}}"
                                   alt="plan"></a>
                   </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-6">
                   <div class="img_holder">
                       <a data-lity data-lity-desc="Photo of a flower"
                          href="{{ URL::asset('frontend/img/projects/lakecity/plans/projectplan/lakecity-plan-ff-villa.jpg')}}"><img
                                   src="{{ URL::asset('frontend/img/projects/lakecity/plans/projectplan/lakecity-plan-ff-villa.jpg')}}"
                                   alt="plan"></a>
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
      <a data-lity data-lity-desc="price"
         href="{{ URL::asset('frontend/img/projects/lakecity/plans/pricelist/lakecity-price.jpg')}}"><img
         src="{{ URL::asset('frontend/img/projects/lakecity/plans/pricelist/lakecity-price.jpg')}}"
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
                        <a data-lity data-lity-desc="lakecity-gallery1.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery1.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery1.jpg')}}" alt="lakecity-gallery1.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="lakecity-gallery2.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery2.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery2.jpg')}}" alt="lakecity-gallery2.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="lakecity-gallery3.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery3.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery3.jpg')}}" alt="lakecity-gallery3.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="lakecity-gallery4.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery4.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery4.jpg')}}" alt="lakecity-gallery4.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="lakecity-gallery5.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery5.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery5.jpg')}}" alt="lakecity-gallery5.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="lakecity-gallery6.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery6.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery6.jpg')}}" alt="lakecity-gallery6.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="lakecity-gallery4.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery7.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery7.jpg')}}" alt="lakecity-gallery7.jpg"></a>
                     </div>
                  </li>
                  <li>
                     <div class="img_holder">
                        <a data-lity data-lity-desc="lakecity-gallery8.jpg"
                           href="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery8.jpg')}}"><img
                           src="{{ URL::asset('frontend/img/projects/lakecity/gallery/lakecity-gallery8.jpg')}}" alt="lakecity-gallery8.jpg"></a>
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
            <a data-lity="" data-lity-desc="RERA1.jpg" href="{{ URL::asset('frontend/img/projects/lakecity/certificates/RERA1.jpg')}}"><img src="{{ URL::asset('frontend/img/projects/lakecity/certificates/RERA1.jpg')}}" alt="RERA1.jpg"></a>
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
            <a data-lity data-lity-desc="Map"
               href="{{ URL::asset('frontend/img/projects/lakecity/map/lakecity-map.png') }}">
            <img src="{{ URL::asset('frontend/img/projects/lakecity/map/lakecity-map.png') }}"
               alt="Map">
            </a>
         </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="img_holder">
            <a data-lity data-lity-desc="Map"
               href="{{ URL::asset('frontend/img/projects/lakecity/map/lakecity-map-two.jpg') }}">
            <img src="{{ URL::asset('frontend/img/projects/lakecity/map/lakecity-map-two.jpg') }}"
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
   <h4>Connectivity</h4>
   <p>Centrally connected to 4 major airport. 18km away from Mopa Goa International Airport.
      operational by 2022. On site private helipad facility, you can reach your dream location in just
      1hr from Mumbai. 
   </p>
   <p>The location is ideally connected via rail lines and national highways. You can enjoy cruise line
      from Mumbai to Goa as seaport is hardly 40km away from the site.
   </p>
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
         <p>Thivim 21 Kms</p>
         <p>Madagaon 69 Kms</p>
         <p>Kudal 32 Kms</p>
         <p>Perem 25 Kms</p>
      </div>
      <br><br>
      <div class="note">
         <h4>* Note: Operational by 2022</h4>
      </div>
   </div>
</section>
@include('new_frontend.includes.footer')
@endsection