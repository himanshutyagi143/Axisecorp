@extends('frontend.master')

<div style="    background: url(/fronted/img/axis-pattern.png);
    background-repeat: repeat-x;
    background-size: contain;
    background-attachment: fixed;">

<style>

.glyphicon-chevron-left:before {
     content: "" !important;
    display: inline-block;
    background: url(http://www-scf.usc.edu/~mdemirji/acad275/images/arrow.png) no-repeat center center;
    width: 43px;
    height: 38px;
    /* position: absolute; */
    background-size: 100%;
    transform: rotate(-180deg);
}
.glyphicon-chevron-right:before{
    content: "" !important;
    display: inline-block;
    background: url(http://www-scf.usc.edu/~mdemirji/acad275/images/arrow.png) no-repeat center center;
    width: 43px;
    height: 38px;
    /* position: absolute; */
    background-size: 100%;
}
</style>
@section('content')
    <link rel="stylesheet" type="text/css" href="fronted/css/style2.css">
   @include('frontend.profile.upper_link')
<!-- header -->

<!-- //header -->
<!-- about -->
    <div class="w3ls-ab-right text-center " style="padding-top:96px;">
                        
                    </div>
					          
    

   
<div class="tab-content slider-axis" >
    <div id="home" class="tab-pane fade in active">
        <div class="about" id="about">
            <div class="container">
			<div class="row">
			<div class="col-md-12 ">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"  style=" ">
                                    <!-- Indicators -->
                                     <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox" style="
    margin-top: 0px;
">
                                        <div class="item active">
                                            
                                            <img class="d-banner" src="/fronted/images/bottom.png" alt="Panchsheel Pratishtha Sector 75 Noida" style="width: 100%">
											
											
                                        </div>
										
										<div class="item">
                                            
                                            <img class="d-banner" src="/fronted/images/bottom.png" alt="Panchsheel Pratishtha Sector 75 Noida" style="width: 100%">
											
											
                                        </div>
										
										<div class="item">
                                            
                                            <img class="d-banner" src="/fronted/images/bottom.png" alt="Panchsheel Pratishtha Sector 75 Noida" style="width: 100%">
											
											
                                        </div>
										

                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>	
				  </div>	
				  <div class="col-md-12 ">
                <div class="w3l-grids-about p-20">
                
					
				
                    <div class="w3ls-agile-left">
                        <h2>About Casa </h2>
                        <p>Axis Blues is planned for prime hospitality &amp; rainforest resort destination, its aim is to Eco-Luxury who preserves the excitement of nature living with modern comfort.</p>

                        <p>Project is overlooking 6 Acre Lake, where you can enjoy your life with your family &amp; guest, located in the heart of valley, only 35KM away as neighborhood of Punji, the ultimate prestigious area for the resort destination, and features unique physical characteristics that make it truly remarkable.</p>

                        <p>The experience is made flawless by an innovative service concept, informal yet impeccable. The recreational area and restaurant, accompanied by exclusive function spaces, wants to become the most coveted destination point for nature lovers.</p>

                        <p>Laze around on dew-laced nature &amp; lush green views that melt your hart; fresh air wake up along with birds and bees, the scenic backdrop mountain, the quaint nature &amp; it’s simple smiling inhabitants welcomes you to revel in a vibrant &amp; harmonious ecosystem with class and high standard service and comfort with contemporary modern comfort, enriched by designer furniture &amp; materials. </p>

                    </div>
                    <div class="clearfix"> </div>
                </div>	
				  </div>
            </div>
		</div>	
        </div>
        <div class="services" id="services">
            <div class="container">
                <!---728x90--->
		<div class="row">
		<div class="col-md-12">
		<div class="Highlights_section p-20">
		             <h3> Highlights</h3>
		<div class="row">
		<div class="col-md-3 ">
			<div class="Highlight">
		<img class="font-icons" src="fronted/img/presentation.png">
			SBI Approved Project
			</div>
		</div>
		
		<div class="col-md-3">
					<div class="Highlight">
		<img class="font-icons" src="fronted/img/planning.png">
			5% subvention plan
		</div>
		</div>
		
		<div class="col-md-3">
					<div class="Highlight">
	<img class="font-icons" src="fronted/img/tax.png">
			0% GST
		</div>
		</div>
		
		<div class="col-md-3">
					<div class="Highlight">
		<img class="font-icons" src="fronted/img/map.png">
			Excellent Location
		</div>
		</div>
		
		<div class="col-md-3">
					<div class="Highlight">
	<img class="font-icons" src="fronted/img/building.png">
			11 Feet Floor to Floor Height
		</div>
		</div>
		<div class="col-md-3">
					<div class="Highlight">
			<img class="font-icons" src="fronted/img/award.png">
			Top Quality Jaguar Fittings
		</div>
		</div>
		
		<div class="col-md-3">
					<div class="Highlight">
		<img class="font-icons" src="fronted/img/apartment.png">
			3 Side Corner Apartment
		</div>
		</div>
		
		<div class="col-md-3">
					<div class="Highlight">
				<img class="font-icons" src="fronted/img/kitchen.png">
			Semi Modular Kitchen
		</div>
		</div>
		</div>
		</div>
		</div>
            </div>
        </div>
    </div>
</div>

    <div id="location" class="tab-pane fade">
        <div class="about" id="about">
            <div class="container">
			<div class="row">
		
			<div class="col-md-6">
                
                <div class="w3ls-ab-right text-center lightbox-gallery">
                    <img src="/fronted/images/location-map.jpg" alt="" data-image-hd="/fronted/images/location-map.jpg" style="    width: 100%;">
		
                </div>

                <div class="clearfix"> </div>
            </div>
			
			<div class="col-md-6">
               
                <div class="w3ls-ab-right text-center lightbox-gallery">
					
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14008.352273298313!2d77.3791713!3d28.6271225!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5d1bca20d0fb49a0!2sInnverse+Technologies+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1552037683652"  width="535" height="392" frameborder="0"  style="border:0" allowfullscreen></iframe>
                </div>

                <div class="clearfix"> </div>
            </div>
			
			</div>
			  </div>
        </div>
    </div>

    <div id="specifications" class="tab-pane fade">
        <div class="about" id="about">
            <div class="container">
             
                <div class="w3ls-ab-right text-left serve-agile-wthree-text">
                    <h4 class="mb00">Flooring</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> High Glass Quality Vitrified (600x600) in Drawing, Dining , Kitch, and Bedrooms.</li>
                        <li><i class="fa fa-angle-double-right"></i> Anti skid Ceramic tiles in Toilets.</li>
                    </ul>

                    <h4 class="mb00">Kitchen</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> Granite working top with double bowl Stainless Stell sink.</li>
                        <li><i class="fa fa-angle-double-right"></i> 2 feet dado above working top and 4 feet 6 inches from the floor level on Copper wiring.</li>
                        <li><i class="fa fa-angle-double-right"></i> remaining wall with ceramic tiles.</li>
                        <li><i class="fa fa-angle-double-right"></i> Individual RO unit for drinking water.</li>
                    </ul>


                    <h4 class="mb00">DOORS AND WINDOWS</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> Outdoor window of UPVC or equivalent quality.</li>
                        <li><i class="fa fa-angle-double-right"></i> Internal wooden door frames made of Maranti or equivalent wood.</li>
                        <li><i class="fa fa-angle-double-right"></i> Good quality hardware fittings.</li>
                        <li><i class="fa fa-angle-double-right"></i> Main entrance door finish with laminate / veneer.</li>
                    </ul>


                    <h4 class="mb00">EXCLUSIVES AT LA SOLARA</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> Landscape designed by TAIB Singapore.</li>
                        <li><i class="fa fa-angle-double-right"></i> Glass raillings with stainless steel fittings.</li>
                        <li><i class="fa fa-angle-double-right"></i> Grand luxurious Entrance Lobby in each block.</li>
                        <li><i class="fa fa-angle-double-right"></i> Serence Garden for Senior Citizens.</li>
                        <li><i class="fa fa-angle-double-right"></i> Feature Waterfall. *Club with covered Party Lawn.</li>
                    </ul>

                    <h4 class="mb00">WALL & CEILING FINISH</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> POP finished walls & ceiling with OBD.</li>
                    </ul>


                    <h4 class="mb00">ELECTRICAL</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> Branded Modular Range Switches, Sockets & MCBs.</li>
                        <li><i class="fa fa-angle-double-right"></i> Conduit for DTH connection without wire.</li>
                    </ul>

                    <h4 class="mb00">TOILET</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> Ceremic tiles on walls up to door level in wet area and on remaining wall</li>
                        <li><i class="fa fa-angle-double-right"></i> up to 4 feet height.</li>
                        <li><i class="fa fa-angle-double-right"></i> Paint up to ceiling.</li>
                        <li><i class="fa fa-angle-double-right"></i> Provision for geyser in each toilet.</li>
                        <li><i class="fa fa-angle-double-right"></i> Infinity Swimming pool with Kids pool.</li>
                        <li><i class="fa fa-angle-double-right"></i> Lush green environs.</li>
                        <li><i class="fa fa-angle-double-right"></i> Wi-Fi Enabled.</li>
                        <li><i class="fa fa-angle-double-right"></i> Doctor on call facility.</li>
                        <li><i class="fa fa-angle-double-right"></i> Provision for Minimart.</li>
                        <li><i class="fa fa-angle-double-right"></i> Badminton Court / Mini Basketball Court / CricketPitch.</li>
                    </ul>

                    <h4 class="mb00">Note:</h4>
                    <ul class="listing_wrapper">
                        <li><i class="fa fa-angle-double-right"></i> Variation in the color and size of vitrified tiles/granite may occur.</li>
                        <li><i class="fa fa-angle-double-right"></i> The color and design of the tiles can be changed without any prior notice.</li>
                        <li><i class="fa fa-angle-double-right"></i> Variation in color in mica may occur.</li>
                        <li><i class="fa fa-angle-double-right"></i> Area in all categories of apartments may vary up to +_3% without any change in cost. However, in case the variation is beyond +_3% changes are applicable.</li> 
                    </ul>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>


    <div id="amenities" class="tab-pane fade">
        <div class="about" id="about">
            <div class="container">
             
                <div class="w3ls-ab-right text-left serve-agile-wthree-text">
                    <div class="amenities-wrapper">
<!--                        <div class="amenities-btn">
                            <a href="javascript:void(0)">MULTICUISINE 
                                <br/>
                                RESTAURANTS</a>
                            <a href="javascript:void(0)">PARTY 
                                <br/>
                                ZONES</a>
                        </div>-->
                        <div class="amenities-details">
                            
                            <div class="head_blue">
                                <ul>
                                <li class="left-align">
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/cooker.png" class="center-block"/>
                                        MULTICUISINE RESTAURANTS
                                    </a>
                                </li>
                                <li class="right-align">
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/golf-player.png" class="center-block">
                                        PARTY ZONES
                                    </a>
                                </li>
                                </ul>
						

                            </div>
                            
                            <ul class="dark_red">
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/cooker.png" class="center-block"/>
                                        BANQUETING
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/golf-player.png" class="center-block">
                                        GOLF LEARNING
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/squash.png" class="center-block">
                                        SQUASH
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/party-dj.png" class="center-block">
                                        CLUB THEATER
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/man-in-a-party-dancing-with-people.png" class="center-block">
                                        PARTY ZONES
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/family-of-three.png" class="center-block">
                                        KIDS CRECHE
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/childs-playing-in-playgrpound.png" class="center-block">
                                        KIDS PLAY ZONE
                                    </a>
                                </li>
                            </ul>
                            <ul class="dark_blue">
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/man-playing-badminton.png" class="center-block">
                                        BADMINTON COURTS
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/tennis-court.png" class="center-block">
                                        TENNIS COURT
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/basketball-court.png" class="center-block">
                                        BASKETBALL COURT
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/snakes-and-ladders.png" class="center-block">
                                        SNAKES AND LADDERS
                                    </a></li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/king-chess-piece-shape.png" class="center-block">
                                        LIFE SIZE CHESS
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/swimming-pool.png" class="center-block">
                                        SWIMMING POOL
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/gazebo.png" class="center-block">
                                        GAZEBOS IN PARK
                                    </a>
                                </li>
                            </ul>
                            <ul class="dark_red">
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/roller-skate.png" class="center-block">
                                        SKATING RINK
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/cards.png" class="center-block">
                                        INDOOR PLAY AREA
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/icon.png" class="center-block">
                                        JOGGING TRACKS</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/croquet.png" class="center-block">
                                        CROQUET
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/cinema.png" class="center-block">
                                        AMPHITHEATER
                                    </a>
                                </li>
                                <li><a href="javascript:void(0)">
                                        <img src="/fronted/images/person-playing-billiard.png" class="center-block">
                                        BILLIARDS CLUB HOUSE
                                    </a>
                                </li>
                                <li><a href="javascript:void(0)">
                                        <img src="/fronted/images/cricket.png" class="center-block">
                                        CRICKET PRACTICE
                                    </a>
                                </li>
                            </ul>
                            <ul class="dark_blue">

                                <li><a href="javascript:void(0)">
                                        <img src="/fronted/images/icon.png" class="center-block">
                                        OUT DOOR ADVENTURE
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/weightlifting.png" class="center-block">
                                        GYM
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/medicine-capsule.png" class="center-block">
                                        HEALING CENTER
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/sauna.png" class="center-block">
                                        SPA
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/mortar.png" class="center-block">
                                        NATUROPATHY
                                    </a>
                                </li>
                                <li><a href="javascript:void(0)">
                                        <img src="/fronted/images/buddhist-yoga-pose.png" class="center-block">
                                        YOGA AREA
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/meditation.png" class="center-block">
                                        MEDITATION AREA
                                    </a>
                                </li>
                            </ul>
                            <ul class="dark_red">
                                <li><a href="javascript:void(0)">
                                        <img src="/fronted/images/golf-cart.png" class="center-block">
                                        GOLF CART ASSITANCE
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/travel.png" class="center-block">
                                        SHUTTLE SERVICE
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/waste.png" class="center-block">
                                        PROPER WASTE
                                    </a>
                                </li>
                                <li><a href="javascript:void(0)">
                                        <img src="/fronted/images/fountain.png" class="center-block">
                                        DANCING FOUNTAIN
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/plant.png" class="center-block">
                                        FLOATING GARDEN
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/waiting-area.png" class="center-block">
                                        SITTING AREA
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/disability.png" class="center-block">
                                        INCLUSIVE DESIGN
                                    </a>
                                </li>
                            </ul>
                            
                            <ul class="dark_blue">
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/no-parking-sign.png" class="center-block">
                                        NO VEHICULAR MOVEMENT
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/books.png" class="center-block">
                                        LIBRARY
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/hanging-pot.png" class="center-block">
                                        HANGING GARDEN
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/organic.png" class="center-block">
                                        GREEN & ECO
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/doors.png" class="center-block">
                                        ENTRANCE LOBBY
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/elevator.png" class="center-block">
                                        LIFTS PER TOWER
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/man-cycling.png" class="center-block">
                                        OUT DOOR CYCLING
                                    </a>
                                </li>
                            </ul>
                            <ul class="dark_red">
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/cctv.png" class="center-block">
                                        CCTV CAMPUS
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/wifi-signal-tower.png" class="center-block">
                                        WIFI CAMPUS
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/concierge.png" class="center-block">
                                        CONCIERGE SERVICE
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/shovel.png" class="center-block">
                                        QUALITY CONSTRUCTION
                                    </a>
                                </li>
                                <li><a href="javascript:void(0)">
                                        <img src="/fronted/images/store.png" class="center-block">
                                        IN HOUSE COMMERCIAL
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/conference-hall.png" class="center-block">
                                        CONFERENCE HALL
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="/fronted/images/shield.png" class="center-block">
                                        SECURITY SYSTEM
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>










    <div id="floorplans" class="tab-pane fade">
        <div class="about" id="about">
            <div class="container">
             
                <div class="row lightbox-gallery">
                  		<section>
  <div class="container gal-container">
    <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
      <div class="box">
        <a href="#" data-toggle="modal" data-target="#1">
          <img src="/fronted/images/floor1.jpg">
        </a>
        <div class="modal fade" id="1" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <div class="modal-body">
                <img src="/fronted/images/floor1.jpg">
              </div>
                <div class="col-md-12 description">
                  <h4>This is the first one on my Gallery</h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
      <div class="box">
        <a href="#" data-toggle="modal" data-target="#2">
          <img src="/fronted/images/floor2.jpg">
        </a>
        <div class="modal fade" id="2" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <div class="modal-body">
                <img src="/fronted/images/floor2.jpg">
              </div>
                <div class="col-md-12 description">
                  <h4>This is the second one on my Gallery</h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>


   

  </div>
</section>

                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <div id="layout" class="tab-pane fade">
        <div class="about" id="about">
            <div class="container marginspacing">
              
				
                
				 <div class="row lightbox-gallery">
                  		<section>
  <div class="container gal-container">
  <div class="col-md-2 col-sm-6 co-xs-12 gal-item">
  </div>
    <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
      <div class="box">
        <a href="#" data-toggle="modal" data-target="#3">
          <img src="/fronted/images/casa1.jpg">
        </a>
        <div class="modal fade" id="3" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <div class="modal-body">
                <img src="/fronted/images/casa1.jpg">
              </div>
                <div class="col-md-12 description">
                  <h4>This is the first one on my Gallery</h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
      <div class="box">
        <a href="#" data-toggle="modal" data-target="#4">
          <img src="/fronted/images/casa2.jpg">
        </a>
        <div class="modal fade" id="4" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <div class="modal-body">
                <img src="/fronted/images/casa2.jpg">
              </div>
                <div class="col-md-12 description">
                  <h4>This is the second one on my Gallery</h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>


   

  </div>
</section>

                </div>
    </div>

                <div class="clearfix"> </div>
            </div>
        </div>


    <div id="pricelist" class="tab-pane fade">
        <div class="about" id="about">
            <div class="container">
               
             <div class=" contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="fronted/js/jqzoom.js"></script>
<script type="text/javascript">
$("#bzoom").zoom({
	zoom_area_width: 600,
    autoplay_interval :3000,
    small_thumbs : 4,
    autoplay : false
});
</script>
@stop