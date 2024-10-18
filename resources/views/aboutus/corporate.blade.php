@extends('layouts.app')

@section('content')
   @include('includes.header')
	<div class="layout">
		@include('includes.sidebar')
			<div class="content">
            <section id="about" class="about section abouttop-content">
               <div class="container">
                  <div class="entry">
                  
                     <p class="entry-text">
"We at Axis believe in creating long-lasting relationships. We understand our corporate responsibility well. We invest in building foundations and have provided a charter for the entire office to work. Established to deliver incomparable services, our business comprises an essence of strong, innovative and ethical principles. All our efforts as an employer are guided by the ninepillars that are as follows:"

                     </p>
                  </div>
               </div>
            </section>
            <section class="project-details">
               <div class="container">
                  <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInLeft axisfadeleft">
                           <h3 class="project-details-title">1. Governance & Ethics</h3>
                           <p class="project-details-descr">The basic foundation of our business is to act with integrity and being professional. At Axis we believe in being ethical in all dealings with all our stakeholders. We value the time and interest of our customers and strive to serve them the best we can.  </p>
                           <h3 class="project-details-title">2. Workplace</h3>
                           <p class="project-details-descr">Our workplace is a reflection of who we are, our culture, our brand, our people and our relationships.  We encourage everyone in our office to share ideas and information. Axis has an open door policy where everyone is welcome to present their point of view and we welcome all innovative ideas.   </p>
                
                        </div>
                        <div class="project-details-img col-md-8 col-md-offset-4">
                           <img alt="corporate-1.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/corporate-1.jpg') }}">
                        </div>
                     </div>
                  </div>
                  <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInRight axisnone">
						
						           <h3 class="project-details-title">3. Customer Relation</h3>
                           <p class="project-details-descr">We strive to build lasting relationships with our customers. It is a matter of great pride for us that we have managed to touch so many lives. Our relationship with our customers is not just transaction and we are happy to have served so many people in such a short span of time.   </p>
						
						
						
                           <h3 class="project-details-title">4. Corporate Social Responsibility</h3>
                           <p class="project-details-descr">As a part of its obligations towards the community, we have been supporting 'DivyaPremSewa Mission' which focuses on leprosy-related medical activity, along with empowering and emphasizing on the education of their children.  </p>
						   	 <p class="project-details-descr">We have also joined hands with socially-active organizations like 'Help Care Society' and 'Badri Foundation' which work for the welfare of underprivileged section of the society, especially girl children.</p>
                          
                        
						   
						   
                        </div>
                        <div class="project-details-img col-md-8">
                           <img alt="corporate-2.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/corporate-2.jpg') }}">
                        </div>
                     </div>
                  </div>
                  <div class="project-details-item">
                     <div class="row">
                        <div class="project-details-info wow fadeInLeft axisfadeleft">
						
					
						   <h3 class="project-details-title">5. Environment</h3>
                           <p class="project-details-descr">In the world that we live it is important to make note of the impact that our actions have on the environment. We at Axis Ecorp ensure that we work in line with the best practices in the industry. We strive to reduce the damage that is already done to the environment. At the same time, we also look at being safe and be responsible for all our actions. It is also our motto to make sure that there is minimum wastage and all natural resources are used to the optimum.  </p>
						   
						  
						<h3 class="project-details-title">6. Marketplace</h3>
<p class="project-details-descr">We always strive to contribute, influence and actively improve our business sector through being active members of professional bodies. We also conduct our business with utmost dignity and are transparent with all our business communications.</p>

                        </div>
                        <div class="project-details-img col-md-8 col-md-offset-4">
                           <img alt="corporate-3.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/corporate-3.jpg') }}">
                        </div>
                     </div>
                  </div>
				  
				  
				  
				  
				  


<div class="project-details-item">
<div class="row">
<div class="project-details-info wow fadeInRight axisnone">




<h3 class="project-details-title">7 Passion for Quality and Innovation</h3>
<p class="project-details-descr">Our world-class educational campus & IT solutions and consultancy company is testimonial to the benchmark we have already set in the field of knowledge and innovation. With a passion to constantly innovate and provide impeccable service, we have now diversified into Real Estate and Hospitality ventures. </p>


<h3 class="project-details-title">8. Inspiration to succeed!</h3>
<p class="project-details-descr">Inspired teams are self-driven and more committed to providing excellent, efficient and dedicated client service. Therefore, we've created a workplace where opinions are respected, where everyone is invited to contribute to the success of our business and where people are rewarded for excellence.” </p>


</div>
<div class="project-details-img col-md-8">
<img alt="corporate-2.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/corporate-4.jpg') }}">
</div>
</div>
</div>	  







<div class="project-details-item">
<div class="row">
<div class="project-details-info wow fadeInLeft axisfadeleft">

<h3 class="project-details-title">9. CULTURE OF WARMTH AND BELONGING</h3>
<p class="project-details-descr">For us at Axis Ecorp, our employees are a part of our extended family. We believe in creating a culture of warmth and belonging not only for our employees but also customers. We truly value every relationship. It is our endeavour to make every person feel at home. We encourage people to express themselves and reach to their best potential. There is also a lot of emphasis laid on work life balance of every person working with us.    </p>


<h3 class="project-details-title">10. VALUES THAT DEFINE US</h3>
<p class="project-details-descr">Self motivated individuals that are driven by passion to excel have helped us grow our company. In the future too we want to develop and nurture talent that are aligned to our business philosophy.   </p>
</div>
<div class="project-details-img col-md-8 col-md-offset-4">
<img alt="corporate-3.jpg" class="img-responsive" src="{{ URL::asset('frontend/img/others/corporate-5.jpg') }}">
</div>
</div>
</div>


				  
				  
				  
				  
				  
				  
               </div>
            </section>
		@include('includes.footer')
@endsection
