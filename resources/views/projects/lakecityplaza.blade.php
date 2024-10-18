@extends('layouts.app')
@section('content')
    @include('includes.header')
    <div class="project_menu mobile_side">
        <div class="project_logo"><a href="#home"><img
                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/logo/lakecity-plaza-logo.png')}}"
                        alt="lakecityplaza"></a>
        </div>
        <ul>
            <li><a href="#overview" class="js-scroll">Overview</a></li>
            <li><a href="#amenities" class="js-scroll">Amenities</a></li>
            <li><a href="#unitplan" class="js-scroll">Unit Plan</a></li>

            <li><a href="#gallery" class="js-scroll">Gallery</a></li>

            <li><a href="#location_map" class="js-scroll">Location Map</a></li>
           <!--  <li><a href="#" id="download_application_form" data-toggle="modal" data-target="#application_form_download">Application Form</a></li>
            <li><a href="#" id="download_payment_plan" data-toggle="modal" data-target="#payment_plan_download">Payment Plan</a></li>
            <li><a href="#" id="download_brochure" data-toggle="modal" data-target="#lakecityplazadownload">Download Brochure</a></li>-->
        </ul>
    </div>
    <div class="menu_mobile">
        <img src="{{ URL::asset('frontend/img/others/bars.png')}}" alt="lakecityplaza">
    </div>
    {{-- Brochure Download modal start --}}
    <div class="modal fade in" id="lakecityplazadownload" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body inq-form">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div>
                        <h3 class="text-center"><i class="fa fa-download"></i> Download Lake City Plaza Brochure</h3>
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
                                        <input type="tel" class="form-control" id="lakecityplazaphone" name="txtPhone" required placeholder="e.g. +1 702 123 4567">
                                        <input type="hidden" name="page_reference" value="lakecityplaza">
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
                   <h3 class="text-center"><i class="fa fa-download"></i> Download Lake City Plaza Application Form</h3>
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
                               <input type="hidden" name="page_reference" value="lakecityplaza_application_form">
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
                   <h3 class="text-center"><i class="fa fa-download"></i> Download Lake City Plaza Payment Plan</h3>
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
                               <input type="hidden" name="page_reference" value="lakecity_plaza_payment_plan">
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
        @include('includes.sidebar')
        <div class="content">


            <section id="about" class="about section">
                <div class="container" id="overview">
                    <div class="">
						<h1 class="entry-title abt_title2">Axis Lake City Plaza <br><span class="text-primary abt_title3"> Commercial property sale in nearby North of Goa  </span></h1>
						<h2 class="abt_title3" style="color:#000; font-size: 1.3em;">Profitable Rental Investments: Commercial Shops for Sale Near You in Goa, Including Food Court Spaces.</h2>                        

                        <br>

                        <p class="entry-text">Welcome to Axis Lake City Plaza, the epitome of commercial real estate investment in the 
						enchanting North of Goa, Dodamarg, and Sindhudurg. This prime location sets the stage for a future-forward 
						destination, making it an ideal choice for commercial property buyers.
                        
                        </p>

                        <p>Invest in your future with retail shops in Goa, offering excellent rental investment opportunities. 
						Whether you're looking for shops for rent in North Goa or seeking to buy a commercial shop near you,
						Axis Lake City Plaza has the perfect space to suit your needs.
                        </p>
						<p>Our thoughtfully designed ground plus one floor structure caters to the aspirations of today's 
						generation, ensuring a vibrant and thriving environment. Embrace the potential of this commercial 
						space in Goa, which also includes a food court, catering to the diverse tastes of visitors.</p>
                        <p>Join the league of smart investors and make the most of this opportunity to be part of the Axis Lake 
						City Plaza, your gateway to success in commercial properties for sale in Goa. Don't miss out on this 
						golden chance to secure your future and establish a thriving business in this bustling hub.
                        </p>
						<h3><i>Why invest in commercial real estate?  </i></h3>
						<p>
							Investing in commercial real estate is considered to be the best rental investment as it offers 
							steady returns. Axis Lake City is centrally located and surrounded by other projects by Axis Ecorp. 
							Commercial property buyers and those taking it on lease will get good visibility and footfalls. The 
							complex also offers all the amenities that the business of today requires.
						</p>
						<h5><strong>There is spacious parking to offer convenient parking to all the shoppers.</strong></h5>
						<p>Goa is known for its shopping markets. There are plenty of street shopping destinations in North Goa. 
						Axis Lake City Plaza offers a unique world-class shopping experience. By offering commercial space for 
						shops in Goa, it is enabling all to fulfill their retail dreams</p>
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
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-1.png')}}"
                                        alt="Vitrified
Tiles Flooring">
                            </div>
                            <p>Vitrified<br>
                                Tiles Flooring</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-2.png')}}"
                                        alt="Glass Finish.png">
                            </div>
                            <p>Glass Finish<br>
                                Railings</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-3.png')}}"
                                        alt="amenities-3.png">
                            </div>
                            <p>Compatible<br>
                                Power Connections</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-4.png')}}"
                                        alt="amenities-4.png">
                            </div>
                            <p>Air Condition<br>
                                Units</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-5.png')}}"
                                        alt="amenities-5.png">
                            </div>
                            <p>Adjoining to<br>
                                Axis Blues</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-6.png')}}"
                                        alt="amenities-6.png">
                            </div>
                            <p>Main Entrance From<br>
                                15 Metre Wide Road</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-7.png')}}"
                                        alt="amenities-7.png">
                            </div>
                            <p>Common Area<br>
                                Maintenance Service</p>
                        </li>


                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-8.png')}}"
                                        alt="amenities-8.png">
                            </div>
                            <p>Power<br>
                                Back-up</p>
                        </li>


                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-9.png')}}"
                                        alt="amenities-9.png">
                            </div>
                            <p>CCTV<br>
                                Security</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-10.png')}}"
                                        alt="amenities-10.png">
                            </div>
                            <p>RCC<br>
                                Structure</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-11.png')}}"
                                        alt="amenities-11.png">
                            </div>
                            <p>Ultra-modern<br>
                                Building Facade</p>
                        </li>
                        <li>
                            <div class="icon_holder"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/amenities/amenities-12.png')}}"
                                        alt="amenities-12.png">
                            </div>
                            <p>Parking<br>
                                Facility</p>
                        </li>


                        <!--

                        <li>
                        <div class="icon_holder"><img src="http://localhost:8000/frontend/img/projects/lakecityplaza/amenities/amenities-13.png" alt="meditation-icon.png">
                        </div>
                        <p>Solid Waste<br>
                        Management</p>
                        </li>

                        <li>
                        <div class="icon_holder"><img src="http://localhost:8000/frontend/img/projects/lakecityplaza/amenities/amenities-14.png" alt="amenities-14.png">
                        </div>
                        <p>Eco-friendly
                        Design</p>
                        </li>


                        -->

                    </ul>
                </div>
            </section>


            <section class="unitdetail_section" id="unitplan">
                <div class="container">
                    <header class="section-header">
                        <h2 class="section-title">Unit Plan </h2>
                    </header>
                    <div class="unit_detail_center lpalaza-width">
                        <div class="img_holder">
                            <a data-lity="" data-lity-desc="Photo of a flower"
                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/plans/projectplan/unit-plan.jpg')}}"><img
                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/plans/projectplan/unit-plan.jpg')}}"
                                        alt="plan"></a>
                        </div>
                    </div>


                    <div id="exTab2" class="container">
                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <a data-lity="" data-lity-desc="price"
                                   href="{{ URL::asset('frontend/img/projects/lakecityplaza/plans/gf-plan.jpg')}}"><img
                                            src="{{ URL::asset('frontend/img/projects/lakecityplaza/plans/gf-plan.jpg')}}"
                                            alt="price"></a>
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
                                            <a data-lity="" data-lity-desc="lakecity-gallery1.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery1.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery1.jpg')}}"
                                                        alt="lakecity-gallery1.jpg"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_holder">
                                            <a data-lity="" data-lity-desc="lakecity-gallery2.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery2.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery1.jpg')}}"
                                                        alt="lakecity-gallery2.jpg"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_holder">
                                            <a data-lity="" data-lity-desc="lakecity-gallery3.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery3.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery3.jpg')}}"
                                                        alt="lakecity-gallery3.jpg"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_holder">
                                            <a data-lity="" data-lity-desc="lakecity-gallery4.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery4.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery4.jpg')}}"
                                                        alt="lakecity-gallery4.jpg"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_holder">
                                            <a data-lity="" data-lity-desc="lakecity-gallery5.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery5.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery5.jpg')}}"
                                                        alt="lakecity-gallery5.jpg"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_holder">
                                            <a data-lity="" data-lity-desc="lakecity-gallery6.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery6.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery6.jpg')}}"
                                                        alt="lakecity-gallery6.jpg"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_holder">
                                            <a data-lity="" data-lity-desc="lakecity-gallery4.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery7.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery7.jpg')}}"
                                                        alt="lakecity-gallery7.jpg"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img_holder">
                                            <a data-lity="" data-lity-desc="lakecity-gallery8.jpg"
                                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery8.jpg')}}"><img
                                                        src="{{ URL::asset('frontend/img/projects/lakecityplaza/gallery/lakecity-gallery8.jpg')}}"
                                                        alt="lakecity-gallery8.jpg"></a>
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
                        <h2 class="section-title">Location Map </h2>
                    </header>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="img_holder">
                            <a data-lity="" data-lity-desc="Map"
                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/map/lakecity-map.png')}}">
                                <img src="{{ URL::asset('frontend/img/projects/lakecityplaza/map/lakecity-map.png')}}"
                                     alt="Map">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="img_holder">
                            <a data-lity="" data-lity-desc="Map"
                               href="{{ URL::asset('frontend/img/projects/lakecityplaza/map/lakecity-map-two.jpg')}}">
                                <img src="{{ URL::asset('frontend/img/projects/lakecityplaza/map/lakecity-map-two.jpg')}}"
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
                    <p>Axis Lake City Plaza is centrally connected to four major
                        airports. The nearest one is the MOPA Goa
                        International Airport (which is likely to be operational
                        by 2022) and is just 18kms away. Not just by air, this
                        location is well connected via rail lines and national
                        highways.
                    </p>
                    <p>You can also board a cruise from Mumbai to Goa as the
                        seaport is less than 40KMs from the site. The project
                        also features an on-site private helipad facility so you
                        can fly to your dream home whenever you please.
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
                            <h4>Sea &amp; Beaches</h4>
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
                </div>
            </section>








    @include('includes.footer')
@endsection
 