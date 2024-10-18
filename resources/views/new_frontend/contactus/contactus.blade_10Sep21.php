@extends('new_frontend.layouts.app')
@section('content')
   @include('new_frontend.includes.header')
      <div class="layout">
      	@include('new_frontend.includes.sidebar')
      		<section class="contact-details">
               <div class="col-map col-md-7">
                  <div  class="gmap col-md-7">
				  
				  
				  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15379.21053809261!2d73.8336845!3d15.4950448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9aa265f984b0afff!2sAxis%20ecorp!5e0!3m2!1sen!2sin!4v1613117727170!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				  
				  
				  
				 </div>
               </div>
               <div class="contact-info col-md-5 col-md-offset-7">
                  <div class="contact-info-content">
                     <div class="contact-info-title">Contacts</div>
                     <div class="contact_sec">
                        <h4>Goa Office</h4>
                        <div class="contact-content"><i class="fa fa-map-marker"></i> 305, Gera Imperium Grand, Patto Plaza, Panaji, Goa 403001 (INDIA)</div>
                        <div class="phone-row"><i class="fa fa-phone"></i> <a href="tel:+91 807-000-4400" class="contact-color">+91 807-000-4400</a></div>
                        <div class="contact-content"><i class="fa fa-envelope"></i> <a href="mailto:info@axisecorp.com" class="contact-color" >info@axisecorp.com</a></div>
                     </div>
                     <div class="contact_sec">
                        <h4>NCR Office</h4>
                        <div class="contact-content"><i class="fa fa-map-marker"></i> H/134, Sector 63, Noida - 201301 (INDIA)</div>
                        <div class="phone-row"><i class="fa fa-phone"></i> <a href="tel:+91 807-000-4400" class="contact-color">+91 807-000-4400</a></div>
                        <div class="contact-content"><i class="fa fa-envelope"></i> <a href="mailto:info@axisecorp.com" class="contact-color">info@axisecorp.com</a></div>
                     </div>
                     <div class="contact_sec">
                        <h4>Corporate Office</h4>
                        <div class="contact-content"><i class="fa fa-map-marker"></i> 117/N/88, Kakadeo Kanpur - 208025 (INDIA)</div>
                        <div class="phone-row"><i class="fa fa-phone"></i> <a href="tel:+91 807-000-4400" class="contact-color">+91 807-000-4400</a></div>
                        <div class="contact-content"><i class="fa fa-envelope"></i> <a href="mailto:info@axisecorp.com" class="contact-color">info@axisecorp.com</a></div>
                     </div>
                  </div>
               </div>
            </section>
      	@include('new_frontend.includes.footer')
@endsection