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

<style>
@import url('https://fonts.googleapis.com/css2?family=Squada+One&display=swap');
</style> 

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



    <body data-demo="true" class="left-nav header-dark creative-masonry lakecity_body">


    @include('frontend.profile.upper_link')


    <div id="wrapper">

        <!-- BEGIN LATERAL NAVIGATION -->
        <aside id="aside-nav" class="img-cover" data-bg-img="nature/tall-3.jpg">
            <div id="main-aside-navigation">
                <div class="main-nav-wrapper">
                    <div id="aside-logo">
                        <a href="#" data-logo-light="fronted/img/nature/lake-city-logo.jpg"
                           data-logo-dark="fronted/img/nature/lake-city-logo.jpg">
                            <img width="151" height="126" src="fronted/img/nature/lake-city-logo.jpg" alt="logo">
                        </a>
                    </div>
                    <nav class="menu_test" id="main-aside-menu">
                        <ul>
                            <li><a href="#overview">Overview</a></li>
                            <li><a href="#amenities">Amenities</a></li>
                            <li><a href="#specifications">Plans</a></li>
							 <li><a href="#compliance">Price</a></li>
							
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
<div class="tp-banner-container">
<div class="tp-banner">
<ul>    <!-- SLIDE  -->
<li data-transition="random" data-slotamount="7" data-masterspeed="300"
data-saveperformance="off">
<!-- MAIN IMAGE -->
<img src="fronted/img/nature/lakecity-banner.jpg" alt="banner4" data-bgposition="center top"
data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone"
data-bgfit="100" data-bgfitend="110" data-bgpositionend="center center">
<!-- LAYERS -->

</li>

</ul>
</div>
</div><!-- **Slider Section - Ends** -->

</div>
<!--top-content ends-->


<div class="scroll_section">
<span id="overview"></span>
<section>
<div class="title title-center section_title">
<h2 class="lakecity_font">Overview </h2>
<br><br>
<h3>Let Us Build A World Class Project Together</h3>
</div>




<div class="lakecity_overview">
<div class="left">
<div class="icon"><img src="fronted/img/nature/lakecity-overview-icon1.png" alt="#"></div>
<h2>Usage-Commercial/Mixed Land <br>Use Plots</h2>
</div>

<div class="right">
<div class="icon"><img src="fronted/img/nature/lakecity-overview-icon2.png" alt="#"></div>
<h2>Tourism</h2>
</div>


<div class="right">
<div class="icon"><img src="fronted/img/nature/lakecity-overview-icon3.png" alt="#"></div>
<h2>Health Seekers</h2>
</div>

<div class="left">
<div class="icon"><img src="fronted/img/nature/lakecity-overview-icon4.png" alt="#"></div>
<h2>Nature Lovers</h2>
</div>



<div class="left">
<div class="icon"><img src="fronted/img/nature/lakecity-overview-icon5.png" alt="#"></div>
<h2>Corporates</h2>
</div>

<div class="right">
<div class="icon"><img src="fronted/img/nature/lakecity-overview-icon6.png" alt="#"></div>
<h2>Destination Wedding</h2>
</div>

</div>

</section>
<!-- END WORKS -->
	
			
				
<span id="amenities"></span>
<section class="synopsis lakecity_amenities">
<div class="title title-center section_title">
<h2 style="color:#fff; border-color:#fff;" class="lakecity_font">Amenities </h2>
</div>
<div class="container">
<div class="row">

<ul>


<li>
<img src="fronted/img/nature/lakecity-amenities1.jpg">
<p>Swimming Pool</p>
</li>
<li>
<img src="fronted/img/nature/lakecity-amenities2.jpg">
<p>Spa</p>
</li>
<li>
<img src="fronted/img/nature/lakecity-amenities3.jpg">
<p>Community Play</p>
</li>


<li>
<img src="fronted/img/nature/lakecity-amenities4.jpg">
<p>Chess Room</p>
</li>

<li>
<img src="fronted/img/nature/lakecity-amenities5.jpg">
<p>Gym</p>
</li>

<li>
<img src="fronted/img/nature/lakecity-amenities6.jpg">
<p>Pool & Snooker</p>
</li>





<li>
<img src="fronted/img/nature/lakecity-amenities7.jpg">
<p>Convenience Outlet</p>
</li>

<li>
<img src="fronted/img/nature/lakecity-amenities8.jpg">
<p>CCTV</p>
</li>


<li>
<img src="fronted/img/nature/lakecity-amenities9.jpg">
<p>Library</p>
</li>


<li>
<img src="fronted/img/nature/lakecity-amenities10.jpg">
<p>Dining</p>
</li>

<li>
<img src="fronted/img/nature/lakecity-amenities11.jpg">
<p>On Call Medical</p>
</li>


<li>
<img src="fronted/img/nature/lakecity-amenities12.jpg">
<p>Meditation Center</p>
</li>


</ul>

</div></div>
</section>






<span id="specifications"><br></span>
<section>
<div class="title title-center section_title">
<h2 class="lakecity_font">Plans </h2>
</div>


<div class="container kncj_unitplan">
<div class="row">






<div class="container">
                        <div class="tab-line-bottom">
                            <ul class="nav nav-tabs" role="tablist" id="planId">
                                <li class="nav-item active" role="presentation">
                                    <a href="#features-4" id="c_plan" class="active" onclick="planCick('c_plan')" aria-controls="features-4" role="tab" data-toggle="tab" aria-expanded="true">
                                        SITE PLAN
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#text-4" id="p_plan" onclick="planCick('p_plan')" aria-controls="text-4" role="tab" data-toggle="tab" class="" aria-expanded="false">
                                        PROJECT PLAN
                                    </a>
                                </li>
                              
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="features-4">
                                    <div class="row">
									
									
<div class="siteplan_map">
                                        <a class="example-image-link" href="fronted/img/nature/lakecity-siteplan.jpg" data-lightbox="example-1">
                                        <img class="example-image" src="fronted/img/nature/lakecity-siteplan.jpg" alt="image-1"></a> 

</div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="text-4">
                                    <div class="row">


                                      <div class="left">

<a class="example-image-link" href="fronted/img/nature/lakecity-plan-gf-villa.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/lakecity-plan-gf-villa.jpg" alt="image-1"></a>
</div>

<div class="right">
<a class="example-image-link" href="fronted/img/nature/lakecity-plan-ff-villa.jpg" data-lightbox="example-1">
<img class="example-image" src="fronted/img/nature/lakecity-plan-ff-villa.jpg" alt="image-1"></a>
</div>


                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>

















</div>
</div>
</section>
				
				
				
			
				
				

<span id="compliance"><br></span>
<section id="" class="unit_plan unitdetail_sec"
style="background:url(fronted/img/nature/bg.jpg) repeat; background-attachment:fixed; background-size:cover;">

<div class="title title-center section_title">
<h2 class="lakecity_font">Price</h2>
</div>

<div class="container lakecity_price">
<div class="row">		

<img src="fronted/img/nature/lakecity-price.jpg">			
	
<div class="clear"></div>					
			
</div>
</div>
</section>

     

                <span id="gallery"><br></span>
                <section id="">
                    <div class="title title-center section_title">
                        <h2 class="lakecity_font">Gallery</h2>
                    </div>


                    <div class="container">
                 
				 
				        <div class="row">

                                        <div class="masonry grid grid-3 with-caption">
                                            <div class="item branding photography">
                                                <div class="item-wrapper">
                                                    <figure class="he-2 caption-visible caption-center indigo darken-3">
                                                        <img src="fronted/img/nature/lakecity-gallery1.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/lakecity-gallery1.jpg"
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
                                                        <img src="fronted/img/nature/lakecity-gallery2.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/lakecity-gallery2.jpg"
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
                                                        <img src="fronted/img/nature/lakecity-gallery3.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/lakecity-gallery3.jpg"
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
                                                        <img src="fronted/img/nature/lakecity-gallery4.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/lakecity-gallery4.jpg"
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
                                                        <img src="fronted/img/nature/lakecity-gallery5.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/lakecity-gallery5.jpg"
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
                                                        <img src="fronted/img/nature/lakecity-gallery6.jpg" alt="creative">
                                                        <div class="hover-icons">
                                                            <div class="hover-icons-wrapper">
                                                                <a class="example-image-link"
                                                                   href="fronted/img/nature/lakecity-gallery6.jpg"
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
                        <h2 class="lakecity_font">Location & Advantage </h2>
                    </div>
                    <div class="location" id="location">
                        <div class="container">
                            <div class="left">
                                <img src="fronted/img/nature/lakecity-map.jpg" alt="map">
                               <a href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7681.723157246499!2d73.95784075818182!3d15.705496380897662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis+Blues!5e0!3m2!1sen!2sin!4v1563515704419!5m2!1sen!2sin" class="explore-google-map-btn cboxElement" data-event-category="Section" data-event-action="Click" data-event-name="Explore Google Maps">Explore
                                    Google Maps</a>
                            </div>


                            <div class="right">
                                <div class="close_point lakecity_connectivity">
                                    <h3>Connectivity</h3>
                           <p>Centrally connected to 4 Major Airport. 18KM away from MOPA Goa International Airport. operational by 2022. On 
Site Private Helipad facility, you can reach your dream location in just 1hr from Mumbai.
</p>

<p>
The Location is ideally connected via rail lines and National Highways. You can enjoy Cruise line from Mumbai to GOA as seaport
is hardly 40KM away from the Site 
</p>

<ul>
<p><strong>Airport </strong>
<li>• Mopa Airport - 18 Km [Operational by 2022*] </li>
<li>• Chipi-Parule Airport - 75 Km</li>
<li>• Dabolim Airport - 70 Km </li>
<li>• Belgaum Airport - 80 Km </li>
</ul>


<ul>
<p><strong>Sea and Beaches </strong>
<li>• Mandrem Beach - 36 Km </li>
<li>• Vagator Beach - 31 Km </li>
<li>• Calangute Beach - 35 Km </li>
<li>• Colva Beach - 70 Km</li>
</ul>


<ul>
<p><strong>Railway </strong>
<li>• Thivim - 15 Km </li>
<li>• Madgaon - 69 Km </li>
<li>• Kudal - 50 Km </li>
<li>• Pernem - 25 Km </li>
</ul>

<div class="clear"></div>


                                </div>
                              
                            
                            </div>
                            <div class="clear"></div>
							
					
							

                        </div>
						
		
<div class="lakecity_morecontact">
<ul>
<li>
<img src="fronted/img/nature/lakecity-connect1.jpg" alt="map">
<p class="title"><strong>Road</strong></p>
<p>Well Connected via NH 17</p>
</li>


<li>
<img src="fronted/img/nature/lakecity-connect2.jpg" alt="map">
<p  class="title"><strong>RAIL</strong></p>
<p>Thivim 21 Kms</p>
<p>Madagaon 69 Kms</p>
<p>Kudal 32 Kms</p>
<p>Perem 25 Kms</p>

</li>


<li>
<img src="fronted/img/nature/lakecity-connect3.jpg" alt="map">
<p  class="title"><strong>SEA</strong></p>

<p>Cruise line also started from Mumbai to Goa</p>
<p>Sea Port only 40 Kms away from site</p>
</li>


</ul>
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
