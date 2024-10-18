@extends('layouts.app')

@section('content')
   @include('includes.header')
	<div class="layout">
		@include('includes.sidebar')
		<div class="content">
            <section id="about" class="about section abouttop-content">
               <div class="container">
                  <div class="entry">
				 <p class="entry-text">“We choose to go to the moon in this decade and do the other things, not because they are easy, but because they are hard.”  </p>
				 <p>― John F. Kennedy</p>
                  </div>
               </div>
            </section>
            <section class="project-details">
               <div class="container">
                  <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInLeft axisfadeleft">
                           <h3 class="project-details-title">
                               Our Vision
                           </h3>
                           <p class="project-details-descr">
						   
						   As a unified organization, Axis’s vision is ‘creating landmarks, setting benchmarks.’ Building trust, understanding and exceeding the expectations of our consumers, and fostering healthy competition in the existing market are some of the factors that define our corporate philosophy and business approach.
						   
						  </p>
                        </div>
                        <div class="project-details-img col-md-8 col-md-offset-4">
                           <img alt="vision-1.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/vision-1.jpg') }}">
                        </div>
                     </div>
                  </div>
				  
				  
				  
				  
                  <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInRight axisnone">
                           <h3 class="project-details-title">
                             Our Mission
                           </h3>
                           
                           <p class="project-details-descr">
                              Axis is committed to excellence and shall continuously strive to set new benchmarks. At Axis, we aim to provide meaningful services to our customers by using our market understanding and avant-garde innovation. Our team comprises of achievement-oriented professionals with holistic concerns for ethics and society.
                           </p>
                        </div>
                        <div class="project-details-img col-md-8">
                           <img alt="vision-2.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/vision-2.jpg') }}">
                        </div>
                     </div>
                  </div>
				  
				  
				  
				  
				  
				  
				  
				      <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInLeft axisfadeleft">
                           <h3 class="project-details-title">
                              OUR GOALS
                           </h3>
                           <p class="project-details-descr">We at Axis believe in creating long-lasting relationships and we understand our corporate responsibility well. Established to deliver incomparable services, our business goals are based on innovative and ethical principles.  </p>
                        </div>
                        <div class="project-details-img col-md-8 col-md-offset-4">
                           <img alt="vision-1.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/goals.jpg') }}">
                        </div>
                     </div>
                  </div>
				  
				  
				  
				  
				  
				  
               </div>
            </section>
		@include('includes.footer')
@endsection