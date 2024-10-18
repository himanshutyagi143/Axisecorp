@extends('layouts.app')
@section('content')
   @include('includes.header')
      <div class="layout">
      	@include('includes.sidebar')
         <div class="content">
            <section id="about" class="about section abouttop-content">
               <div class="container">
                  <div class="entry">
					  <p class="entry-text">"Inspired teams are self-driven and more committed to providing excellent, efficient and dedicated client service. Therefore, we've created a workplace where opinions are respected, where everyone is invited to contribute to the success of our business and where people are rewarded for excellence.”</p>
                  </div>
               </div>
            </section>
            <section class="project-details">
               <div class="container">
                  <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInLeft axisfadeleft" >
                           <h3 class="project-details-title">
                              EDUCATION 

                           </h3>
						   
						   
                           <p class="project-details-descr">After making a mark in the education as well as technology space, Axis has now diversified into Real Estate & Hospitality sector. We are passionate about quality and innovation. We have already set the benchmark in the education space by creating a world-class 63 acres educational campus, which is helping in shaping the minds of many young adults. </p>
                           <p class="project-details-descr">
                              At Axis group,we strongly believe there is no shortcut to success. We strive to build long-term relationships, which allow us to provide personalized & clear service in all the domains that we have ventured in.
                           </p>
                        </div>
                        <div class="project-details-img col-md-8 col-md-offset-4">
                           <img alt="1-780x668.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/1-780x668.jpg') }}">
                        </div>
                     </div>
                  </div>
                  <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInRight axisnone">
                           <h3 class="project-details-title">
                              TECHNOLOGY
                           </h3>
                           <p class="project-details-descr">Excellence is not an exception; it is a prevailing attitude. Axis has always strived for excellence in every field. Our technology arm is a one shop stop for IT solution and consulting services. </p>
						   
						   <p class="project-details-descr">In this exponentially growing landscape, we have managed to carve a niche for ourselves by delivering world-class service and maintaining a gold standard for every project that we undertake.  
						   </p>
						   
                        </div>
                        <div class="project-details-img col-md-8">
                           <img alt="2-780x668.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/2-780x668.jpg') }}">
                        </div>
                     </div>
                  </div>
				  
				  
				  
				  
				  
				  
<div class="project-details-item">
<div class="row">
<div class="project-details-info wow fadeInLeft axisfadeleft">

<h3 class="project-details-title">REAL ESTATE  </h3>
<p class="project-details-descr">Axis Ecorp is one of India’s fastest-growing real estate companies which is focused on premium developments in holiday homes, secondary housing, club & resorts, serviced villas, hotel apartments and premium suites.  </p>
<p class="project-details-descr">
Our endeavor is to offer state of the art solutions in the real estate market that are in sync with the changing trends. We focus not just on the quality of construction but also ensure the safety of the investment. Our reliability, stability, sound business ethics, honesty, integrity and transparency make us an absolute favorite and help forge relationships that last a lifetime. 
</p>
</div>
<div class="project-details-img col-md-8 col-md-offset-4">
<img alt="realestate-bg.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/realestate-bg.jpg') }}">
</div>
</div>
</div>		  

				  
				  
		


<div class="project-details-item">
<div class="row">
<div class="project-details-info wow fadeInRight axisnone">
<h3 class="project-details-title">
HEALTHCARE
</h3>
<p class="project-details-descr">In this post-pandemic world, humans have realized the value of health more than ever. We have been following a holistic approach to health and staying connected to our Ayurvedic roots. Our proprietary medicines, herbal supplements are clinically-proven natural remedies that helped millions to get their life on track. </p>

<p class="project-details-descr">With our one of its kind products, we aim to make the world a better place to live. Our success mantra is our passion for excellence and unsurpassed client satisfaction.  We take pride in being a service company, and our mission is to serve our customers in any way we can.  
</p>

</div>
<div class="project-details-img col-md-8">
<img alt="healthcare-bg.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/healthcare-bg.jpg') }}">
</div>
</div>
</div>




				  
				  
				  
				  
				  
				  
				  
				  
               </div>
            </section>
           @include('includes.footer')
@endsection