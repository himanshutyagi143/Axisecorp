@extends('frontend.master')

@section('project-current-menu', 'current-menu-item')
@section('home-current-menu','')

@section('content')

    <link href='https://fonts.googleapis.com/css?family=Satisfy%7CMontserrat:400,700%7COpen+Sans:300,400,700,800%7CSumana'
          rel='stylesheet'/>


    <!--**Google Fonts**-->
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,800,700,100,500,500italic,300,800italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,300italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="fronted/css/icons/nucleo.css"/>
    <!-- BEGIN PAGE STYLE -->
    <!-- <link rel="stylesheet" href="fronted/js/libs/flexslider/flexslider.css"/> -->
    <link rel="stylesheet" href="fronted/css/masonry.css"/>
    <link rel="stylesheet" href="fronted/css/hover-effects.css"/>
    <!-- END PAGE STYLE -->
    <link rel="stylesheet" href="fronted/css/colors.css"/>
    <link rel="stylesheet" href="fronted/css/axisbluesnew.css"/>
    <link rel="stylesheet" href="fronted/css/axisbluesnav.css"/>
    <link rel="stylesheet" href="fronted/css/ui.css"/>
    <link rel="stylesheet" type="text/css" href="fronted/css/colorbox.min.css">
    <link rel="stylesheet" href="fronted/css/jquery.beefup.css"/>
    <link rel="stylesheet" href="fronted/css/axisbluesbanner.css">
    <link rel="stylesheet" href="fronted/css/settings.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="fronted/css/lightbox.min.css">


    <link rel="stylesheet" type="text/css" href="assets/css/style1.css">

    <link href="fronted/css/owl.css" rel="stylesheet">



    <style type="text/css">
        .cplan {
            border-bottom: 2px solid #d8b462 !important;
        }

        .photography {
            height: auto !important;
        }

        .branding {
            height: auto !important;
        }
    </style>



    <body data-demo="true" class="left-nav header-dark creative-masonry">


    @include('frontend.profile.upper_link')


    <div id="wrapper">

        <!-- BEGIN LATERAL NAVIGATION -->
        <aside id="aside-nav" class="img-cover" data-bg-img="nature/tall-3.jpg">
            <div id="main-aside-navigation">
                <div class="main-nav-wrapper">
                    <div id="aside-logo">
                        <a href="#" data-logo-light="fronted/img/nature/turbo-logo.jpg"
                           data-logo-dark="fronted/img/logo/turbo-logo.jpg">
                            <img width="151" height="126" src="fronted/img/nature/turbo-logo.jpg" alt="logo">
                        </a>
                    </div>
                    <nav class="menu_test" id="main-aside-menu">
                        <ul>
                            <li><a href="#overview">Overview</a></li>
                            <li><a href="#amenities">Amenities</a></li>
                            <li><a href="#specifications">Specifications</a></li>
                            <li><a href="#unitplan"> Unit Details </a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#location_map">Location Map</a></li>
                            {{--<li><a target="_blank" href="/outer-user-payment">PAYMENT ONLINE</a></li>--}}
                        </ul>

                    </nav>
                    <footer>
                        <a href="https://www.facebook.com/AxisECorp/" target="_blank" class="facebook">
                            <span><i class="fa fa-facebook"></i></span>
                        </a>
                        <a href="https://www.instagram.com/axisecorp/" target="_blank" class="instagram">
                            <span><i class="fa fa-instagram"></i></span>
                        </a>
                        <a href="https://twitter.com/ecorpaxis" target="_blank" class="twitter">
                            <span><i class="fa fa-twitter"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
        </aside>
        <!-- END LATERAL NAVIGATION -->

        <div id="aside-nav-toggle">
            <button class="toggle-menu" data-toggle="aside-menu" data-effect="hover">
                <i class="nc-icon-outline ui-2_menu-35"></i>
            </button>
        </div>

        <!-- BEGIN MAIN CONTENT -->
        <div id="">


<!--top-content starts-->
<div class="top-content" id="home">
<!-- **Slider Section** -->
<div class="tp-banner-container turbo_banner">
<div class="bg-video-wrap">
<video src="fronted/img/nature/home-video.mp4" loop muted autoplay>
</video>
<div class="overlay">
</div>
</div>
</div>
</div>
<!--top-content ends-->



<div class="scroll_section">
<span id="overview"></span>
<section>
<div class="title title-center section_title">
<h2>Overview </h2>
</div>
<div class="turbo_overview">
<div class="left">
<div class="creative-element">
<div class="creative-element-wrapper">
<div style="padding-bottom:10px;">
<h1>About Turbo In</h1>
</div>
<p>Welcome to Turbo In, a project by Solitairian Group and PMC managed by Axis Ecorp. Crafted by industry 
experts with passion and outstanding sense of planningto position this project as an Iconic building. Right opposite to India’s ﬁrst 
InternationalRacing Circuit “Budha International Circuit” making it as a landmark destination project.</p>
</div>
</div>
</div>

<div class="right">
<figure class="he-center-2 grey darken-4">
<img src="fronted/img/nature/turbo.jpg" alt="nature">
<figcaption>
<h4 class="title"><span>About Turbo In</span></h4>
</figcaption>
</figure>
</div>
</div>
</section>
<!-- END WORKS -->
	
			
				
<span id="amenities"></span>
<section class="turbo_amenities_sec">
<div class="title title-center section_title">
<h2>Amenities </h2>
</div>
<ul>


<li>
<img src="fronted/img/nature/amenities-1.jpg">
<h3 class="title">Clup House</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-2.jpg">
<h3 class="title">Kids Play Area</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-3.jpg">
<h3 class="title">3 Side Open Project</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-4.jpg">
<h3 class="title">Cricket Practice Pitch</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-5.jpg">
<h3 class="title">Double Height Entrance Lobby</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-6.jpg">
<h3 class="title">Sky Gym</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-7.jpg">
<h3 class="title">Iconic Tower</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-8.jpg">
<h3 class="title">Badminton Court</h3>
</li>



<li>
<img src="fronted/img/nature/amenities-9.jpg">
<h3 class="title">Earthquake Resistance Structure</h3>
</li>


<li>
<img src="fronted/img/nature/amenities-10.jpg">
<h3 class="title">Landscaped Greens </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-11.jpg">
<h3 class="title">Party Lawn </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-12.jpg">
<h3 class="title">Half Court Basket Ball </h3>
</li>



<li>
<img src="fronted/img/nature/amenities-13.jpg">
<h3 class="title">Skywalk </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-14.jpg">
<h3 class="title">Terrace Garden </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-15.jpg">
<h3 class="title">Pent Houses </h3>
</li>



<li>
<img src="fronted/img/nature/amenities-16.jpg">
<h3 class="title">Jacuzzi  </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-17.jpg">
<h3 class="title">Sky Lounge </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-18.jpg">
<h3 class="title">Independent Car Parking </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-19.jpg">
<h3 class="title">Villas </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-20.jpg">
<h3 class="title">Jogging & Cycling Trail </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-21.jpg">
<h3 class="title">Swimming Pool </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-22.jpg">
<h3 class="title">CCTV Surveillance  </h3>
</li>


<li>
<img src="fronted/img/nature/amenities-23.jpg">
<h3 class="title">Independent Floors  </h3>
</li>



<li>
<img src="fronted/img/nature/amenities-24.jpg">
<h3 class="title">Power Backup  </h3>
</li>

</ul>
</section>






<span id="specifications"><br></span>
<section>
<div class="title title-center section_title">
<h2>Specifications </h2>
</div>


<div class="container turbo_specification_sec">
<div class="row">

<ul>


<li>
<div class="icon"><img src="fronted/img/nature/specification-icon1.png"></div>
<p>
<span>SUPER STRUCTURE</span> 
Earthquake-resistant RCC Frame Structure.
</p>
</li>





<li>
<div class="icon"><img src="fronted/img/nature/specification-icon3.png"></div>
<p>
<span>DOORS</span> 
 Sliding external doors made of UPVC.   
</p>
</li>






<li>
<div class="icon"><img src="fronted/img/nature/specification-icon5.png"></div>
<p>
<span>TOILET</span> 
 Anti-skid ceramic floor tiles. Ceramic tiles up to door levels on the wall. 
</p>
</li>


<li>
<div class="icon"><img src="fronted/img/nature/specification-icon6.png"></div>
<p>
<span>INSIDE WALL FINISH</span> 
Inside walls with POP punning and OBD. 
</p>
</li>


<li>
<div class="icon"><img src="fronted/img/nature/specification-icon4.png"></div>
<p>
<span>KITCHEN</span> 
Granite top working platform. Stainless steel sink. Ceramic grazed tiles 2' above working platform with individual R.O. Unit. 
</p>
</li>



<li>
<div class="icon"><img src="fronted/img/nature/specification-icon7.png"></div>
<p>
<span>EXTERNAL FACADE</span> 
Exterior in superior paint finish. 
</p>
</li>


<li>
<div class="icon"><img src="fronted/img/nature/specification-icon2.png"></div>
<p>
<span>FLOORING </span> 
Vitrified tiles in drawing room, dining room, bedrooms and kitchen. Anti-skid ceramic tiles in toilets and balconies. Laminated wooden flooring in master bedroom. 
</p>
</li>


<li>
<div class="icon"><img src="fronted/img/nature/specification-icon8.png"></div>
<p>
<span>ELECTRICAL </span> 
Copper wiring in concealed PVC conduits. Sufficient light and power points. Provision for T.V., telephone points in living room and all bedrooms 
</p>
</li>
</ul>

</div>
</div>
</section>
				
				
				
				
				
				
				
				

<span id="unitplan"><br></span>
<section id="" class="unit_plan unitdetail_sec"
style="background:url(fronted/img/nature/bg.jpg) repeat; background-attachment:fixed; background-size:cover;">

<div class="title title-center section_title">
<h2> Unit Details</h2>
</div>

<div class="container">
<div class="row">		
					
<ul>
<li>
<a class="example-image-link" href="fronted/img/nature/unit-5.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-5.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T2 (G+22)</h4>
<p>Typical Floor Plan</p>
</div>
</li>





<li>
<a class="example-image-link" href="fronted/img/nature/unit-4.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-4.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T3 (G+22)</h4>
<p>Typical Floor Plan</p>
</div>
</li>



<li>
<a class="example-image-link" href="fronted/img/nature/unit-6.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-6.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T2, T3 </h4>
<p>Ground Floor Plan</p>
</div>
</li>



<li>
<a class="example-image-link" href="fronted/img/nature/unit-7.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-7.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T2, T3 </h4>
<p>1st Floor Plan</p>
</div>
</li>




<li>
<a class="example-image-link" href="fronted/img/nature/unit-8.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-8.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T2, T3 </h4>
<p>2nd to 22 Floor Plan</p>
</div>
</li>


<li>
<a class="example-image-link" href="fronted/img/nature/unit-1.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-1.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T2,T3</h4>
<p>Unit B - Area 1000 SQFT</p>
<p>(Ground to 22nd Floor)</p>
</div>
</li>

<li>
<a class="example-image-link" href="fronted/img/nature/unit-2.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-2.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T2,T3</h4>
<p>Unit C - Area 1012 SQFT</p>
<p>(Ground to 22nd Floor)</p>
</div>
</li>


<li>
<a class="example-image-link" href="fronted/img/nature/unit-9.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-9.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T4 (G+22)</h4>
<p>2nd &amp; 22nd Floor Plan</p>
<p>1000 SQFT - 8 Units / 1012SQFT - 3 Units</p>
</div>
</li>



<li>
<a class="example-image-link" href="fronted/img/nature/unit-3.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-3.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T4 (G+22)</h4>
<p>Ground Floor Plan</p>
</div>
</li>



<li>
<a class="example-image-link" href="fronted/img/nature/unit-10.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-10.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T4 (G+22)</h4>
<p>2nd &amp; 22nd Floor Plan</p>
</div>
</li>



<li>
<a class="example-image-link" href="fronted/img/nature/unit-11.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/unit-11.jpg" alt="image-1"></a>
<div class="title">
<h4>TOWER-T4 (G+22)</h4>
<p>Ground to 22nd Floor Plan</p>
</div>
</li>


<div class="clear"></div>
</ul>			
<div class="clear"></div>					
					

			
</div>
</div>
</section>

     

                <span id="gallery"><br></span>
                <section id="">
                    <div class="title title-center section_title">
                        <h2>Gallery</h2>
                    </div>


                    <div class="container">
                 
				 
				        <div class="row">

                                        <div class="masonry grid grid-3 with-caption">
                                            <div class="item branding photography">
                                                <div class="item-wrapper">
                                                    <figure class="he-2 caption-visible caption-center indigo darken-3">
                                                        <img src="fronted/img/nature/turbo-gallery-1.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/turbo-gallery-1.jpg"
                                                                   data-lightbox="example-set"
                                                                   data-title="Click the right half of the image to move forward.">
                                                                    <i class="nc-icon-outline arrows-1_window-zoom-in"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <figcaption>

                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>


                                            <div class="item photography branding">
                                                <div class="item-wrapper">
                                                    <figure class="he-2 caption-visible caption-center pink darken-3">
                                                        <img src="fronted/img/nature/turbo-gallery-2.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/turbo-gallery-2.jpg"
                                                                   data-lightbox="example-set"
                                                                   data-title="Click the right half of the image to move forward.">
                                                                    <i class="nc-icon-outline arrows-1_window-zoom-in"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <figcaption>

                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>


                                            <div class="item photography">
                                                <div class="item-wrapper">
                                                    <figure class="he-2 caption-visible caption-center blue darken-3">
                                                        <img src="fronted/img/nature/turbo-gallery-3.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/turbo-gallery-3.jpg"
                                                                   data-lightbox="example-set"
                                                                   data-title="Click the right half of the image to move forward.">
                                                                    <i class="nc-icon-outline arrows-1_window-zoom-in"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <figcaption>

                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>


                                            <div class="item branding design">
                                                <div class="item-wrapper">
                                                    <figure class="he-2 caption-visible caption-center red darken-3">
                                                        <img src="fronted/img/nature/turbo-gallery-4.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/gallery-4.jpg"
                                                                   data-lightbox="example-set"
                                                                   data-title="Click the right half of the image to move forward.">
                                                                    <i class="nc-icon-outline arrows-1_window-zoom-in"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <figcaption>

                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>


                                            <div class="item branding">
                                                <div class="item-wrapper">
                                                    <figure class="he-2 caption-visible caption-center cyan darken-3">
                                                        <img src="fronted/img/nature/turbo-gallery-5.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/turbo-gallery-5.jpg"
                                                                   data-lightbox="example-set"
                                                                   data-title="Click the right half of the image to move forward.">
                                                                    <i class="nc-icon-outline arrows-1_window-zoom-in"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <figcaption>

                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>


                                            <div class="item design branding">
                                                <div class="item-wrapper">
                                                    <figure class="he-2 caption-visible caption-center deep-purple darken-3">
                                                        <img src="fronted/img/nature/turbo-gallery-6.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/turbo-gallery-6.jpg"
                                                                   data-lightbox="example-set"
                                                                   data-title="Click the right half of the image to move forward.">
                                                                    <i class="nc-icon-outline arrows-1_window-zoom-in"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <figcaption>

                                                        </figcaption>
                                                    </figure>
                                                </div>


                                            </div>


                                        </div>


                                    </div>
				 
                    </div>


                </section>
         

                <span id="location_map"><br></span>
                <section id="" class="contact_map">
                    <div class="title title-center section_title" style="margin-top:0;">
                        <h2>Location & Advantage </h2>
                    </div>
                    <div class="location" id="location">
                        <div class="container">
                            <div class="left">
                                <img src="fronted/img/nature/turbo-map.jpg" alt="map">
                                    <a href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7023.289014781065!2d77.52923!3d28.339358!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2a089dc055bd489!2sJaypee%20Greens%20Sports%20City!5e0!3m2!1sen!2sin!4v1605779322089!5m2!1sen!2sin"
                                   class="explore-google-map-btn" data-event-category="Section"
                                   data-event-action="Click" data-event-name="Explore Google Maps">Explore
                                    Google Maps</a>
                            </div>


                            <div class="right">
                                <div class="close_point">
                                    <h3>A PRIVILEGED AND PRIME LOCATION</h3>
                                    <ul>
                                        <li>• Pari Chowk - 10 min</li>
                                        <li>• Jewar Airport - 10 min</li>
                                        <li>• Patanjali food park - 5 min</li>
                                        <li>• Noida Sec 18 - 30 min</li>
										
										<li>• Surajpur Bird Sanctuary - 15 min</li>
                                        <li>• World Class Medical Centres and Hospitals. </li>
                                        <li>• CNG Filling Station, Petrol Pump.</li>
                                        <li>• World Trade Center.</li>
										
										
										<li>• Kanshiram Multi Specialty Hospital. </li>
                                        <li>• Iconic Film City  </li>
                                        <li>• Hotels Convention & Exhibition Centers, Restaurants, Retail and Commercial Spaces.</li>
                                        <li>• Approved Metro Connectivity</li>
										
										
										<li>• Educational Hub In Vicinity</li>
                                        <li>• 765 KV Power Station  </li>
                                        <li>• Freight Corridor by Indian Railway</li>
                                        <li>• Buddh International Circuit</li>
										
										
										<li>• Tech Zone</li>
                                        <li>• ISBT  </li>
                                        <li>• Mono Rail</li>
                                        <li>• Delhi - Mumbai Indutrial Corridor (DMIC)</li>
										
										
										
                                    </ul>
                                </div>
                              
                            
                            </div>
                            <div class="clear"></div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

        <!-- BEGIN FOOTER -->
    @include('frontend.axisbluesfooter')
    <!-- END FOOTER -->

    </div>


    <!-- BEGIN BUILDER -->

    <!-- END BUILDER -->

    <a href="#" class="scrollup">
        <i class="nc-icon-outline arrows-1_minimal-up"></i>
    </a>


    <!-----Hidden Content for specification Start------>
    <div id="main_div" style="display: none;">
        <div id="living_din_content">
            <p class="sample-head">
                <img src="fronted/img/dining-room.png">Living /Dining Room
            </p>
            <p>
                1. Flooring - Glazed Vitrified Tiles
            </p>

            <p>
                2. Wall Finish - Internal walls with POP punning with plastic emulsion paint or texture finish.
            </p>
            <p>
                3. Equipment - LED Smart TV 42" , set top box and remote , intercom
            </p>
            <p>
                4. Furniture - 2 +3 Seater Sofa , center table, Dining Table with 4 chairs, pedestal lamp
            </p>
        </div>


        <div id="kitchen_content">
            <p class="sample-head">
                <img src="fronted/img/kitchen-icon.png">Kitchen
            </p>
            <p>
                1. Equipment - Min Refrigerator, Microwave, Electric / Induction Cook-top, Electric Kettle & RO.
            </p>

            <p>
                2. Fittings - Modular Kitchen Storage, With Mini BAR, SS Sink with Drain Board, Garbage bins.
            </p>
        </div>

        <div id="bedroom_content">
            <p class="sample-head">
                <img src="fronted/img/bedroom.png">Bedroom
            </p>
            <p>
                1. Flooring - Laminated Wooden Flooring
            </p>

            <p>
                2. Wall Finish - Internal walls with POP punning with plastic emulsion paint or texture finish
            </p>

            <p>
                3. Cupboard - Modular Wooden Cupboard , safe locker
            </p>

            <p>
                4. Furniture - Bed with Mattress, Side Tables , intercom
            </p>
        </div>


        <div id="lift_content">
            <p class="sample-head">
                <img src="fronted/img/lift-lobby.png">Lift Lobby
            </p>
            <p>
                1. Flooring - Granite / Glazed Vetrified Tiles
            </p>

            <p>
                2. Wall Finish- Plastic Emulsion Paint along with Stone / Tiles
            </p>
        </div>


        <div id="smart_living_content">
            <p class="sample-head">
                <img src="fronted/img/smartliving-icon.png">Smart Living
            </p>
            <p>
                App enable control of lights, TV, AC, Fans, Geysers, Curtain mortars, Panic alert with hooter and child
                tracking system. Hi speed internet, Wi-Fi, DTH
            </p>
        </div>


        <div id="door_content">
            <p class="sample-head">
                <img src="fronted/img/door-icon.png">Door
            </p>
            <p>
                1. Main Entry Door- Designer 40mm thick, Moulded skin doors with Masonite skin both side or eq.
                ,architrave and hardware
            </p>

            <p>
                2. Internal Door- Designer 40mm thick, Moulded skin doors with Masonite skin out side and laminate
                finish in side or eq. , architrave and hardware
            </p>

            <p>
                3. Toilet Door- Designer 40mm thick, Moulded skin doors with Masonite skin out side and laminate finish
                in side or eq. , architrave and hardware
            </p>
        </div>


        <div id="ac_content">
            <p class="sample-head">
                <img src="fronted/img/ac-icon.png">AC
            </p>
            <p>
                2.5 ton Air Conditionner (Sharing based VRV unit
            </p>
        </div>

        <div id="electrical_content">
            <p class="sample-head">
                <img src="fronted/img/electrical-icon.png">Electrical
            </p>
            <p>
                All electrical wiring concealed conduits, provision for adequate light and power points, telephone, TV
                in living room, Modular switches & MCB, intercom facility with instrument, FAN, chandelier, LED lights
                curtain motor.
            </p>
        </div>

    </div>
    <!-----Hidden Content for specification End ------>


    <script src="fronted/js/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js" defer></script>
    <script src="fronted/js/libs/isotope/dist/isotope.pkgd.min.js" defer></script>


    <!-- <script src="fronted/js/navigation.js" defer></script> -->
    <script src="fronted/js/navigation.min.js" defer></script>

    <!-- <script src="fronted/js/masonry.js" defer></script> -->
    <script src="fronted/js/masonry.min.js" defer></script>

    <script src="fronted/js/jquery.themepunch.tools.min.js" type="text/javascript" defer></script>
    <script src="fronted/js/jquery.themepunch.revolution.min.js" type="text/javascript" defer></script>
    <script src="fronted/js/lightbox-plus-jquery.min.js" defer></script>
    <script type="text/javascript" src="fronted/js/owl.js" defer></script>
    <script type="text/javascript" src="fronted/js/custom.js" defer></script>


    <!-- <script src="fronted/js/jquery.beefup.min.js" defer></script> -->
    <script type="text/javascript" src="/fronted/js/yogvillas_new/jquery.bxslider.min.js" defer></script>

    <script src="/fronted/js/jquery.plainmodal.min.js" defer></script>
    <script type="text/javascript" src="/fronted/js/yogvillas_new/jquery.colorbox-min.js"></script>


    <script type="text/javascript" src="/fronted/js/yogvillas_new/jquery.colorbox-min.js" defer></script>
    <script type="text/javascript" defer>

        $(".slider_next swiper-button-next").click(function (e) {
            e.preventDefault();

            var position = $($(this).attr("href")).offset().top;

            $("body, html").animate({
                scrollTop: position
            } /* speed */);
        });
        /* $(".menu_test").find("a").click(function(e){
         setTimeout(function(){ $(window).scrollTop($(window).scrollTop()-120); }, 500);
         }); */

        $(function () {
            /*var overview  = $('#overview').offset().top;
             alert(overview);
             var amenities  = $('#amenities').offset().top;
             alert(amenities);*/
            winHt = $(window).height();
            winWd = $(window).width();

            $('.menu_test ul li a').on('click', function () {

                $('.menu_test ul li a.active').removeClass('active');
                $(this).addClass('active');
            });


            $('.explore-google-map-btn').colorbox({
                fixed: true,
                iframe: true,
                width: (winWd < 768) ? '90%' : '75%',
                height: (winWd < 768) ? '75%' : '75%'
            });

            $('.map-btn').colorbox({
                inline: true, width: (winWd < 768) ? '90%' : '45%', height: (winWd < 768) ? '90%' : '45%',
                onComplete: function () {
                    var rel = $(this).attr("data-image");
                    $("#" + rel).smoothZoom({
                        width: '100%',
                        height: '100%',
                        pan_BUTTONS_SHOW: "YES",
                        pan_LIMIT_BOUNDARY: "YES",
                        button_SIZE: 15,
                        button_ALIGN: "top right",
                        zoom_MAX: 150,
                        border_TRANSPARENCY: 0
                    });
                    $.colorbox.resize();
                }
            });
        });
    </script>


    <script type="text/javascript">

        jQuery.noConflict();
        jQuery(document).ready(function ($) {
            $('.tp-banner').show().revolution(
                {
                    dottedOverlay: "none",
                    delay: 9000,
                    startwidth: 1160,
                    startheight: 600,
                    hideThumbs: 200,

                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 3,

                    navigationType: "none",
                    navigationArrows: "solo",
                    navigationStyle: "round",

                    touchenabled: "on",
                    onHoverStop: "off",

                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,


                    keyboardNavigation: "off",

                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 20,

                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,

                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,

                    shadow: 0,
                    fullWidth: "off",
                    fullScreen: "on",

                    spinner: "spinner0",

                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,

                    shuffle: "off",


                    forceFullWidth: "off",
                    fullScreenAlignForce: "off",
                    minFullScreenHeight: "",
                    hideTimerBar: "on",
                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResolution: 0,

                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0
                });


            winHt = $(window).height();
            winWd = $(window).width();

            $('.menu_test ul li a').on('click', function () {

                $('.menu_test ul li a.active').removeClass('active');
                $(this).addClass('active');
            });


            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        }); //ready

        function getSpecificationContent(div_id) {
            var content = $('#' + div_id).html();
            $('#modal_content').html(content);
            $('#demo').plainModal('open');
        }


        function planCick(id) {
            if (id == 'c_plan') {
                $("#" + id).addClass('active');
                $("#p_plan").removeClass('active');
                $("#price_list").removeClass('active');
            }
            else if (id == 'p_plan') {
                $("#" + id).addClass('active');
                $("#c_plan").removeClass('active');
                $("#price_list").removeClass('active');
            } else if (id == 'price_list') {
                $("#" + id).addClass('active');
                $("#c_plan").removeClass('active');
                $("#p_plan").removeClass('active');
            } else if (id == 'galleryList') {
                $("#" + id).addClass('active');
                $("#galleryview").show();
                $("#c_update").removeClass('active');
            } else if (id == 'c_update') {
                $("#" + id).addClass('active');
                $("#galleryList").removeClass('active');
            } else if (id == 'rera1') {
                $("#" + id).addClass('active');
                $("#rera2").removeClass('active');
                $("#rera3").removeClass('active');
            } else if (id == 'rera2') {
                $("#" + id).addClass('active');
                $("#rera1").removeClass('active');
                $("#rera3").removeClass('active');
            } else if (id == 'rera3') {
                $("#" + id).addClass('active');
                $("#rera1").removeClass('active');
                $("#rera2").removeClass('active');
            }
        }
    </script>


    </body>
@stop
