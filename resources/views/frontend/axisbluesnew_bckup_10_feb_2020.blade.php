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



    <style type="text/css">
        .cplan {
            border-bottom: 2px solid #d8b462 !important;
        }
        .photography{
            height:auto!important;
        }
        .branding{
            height:auto!important;
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
                        <a href="#" data-logo-light="fronted/img/nature/logo.png"
                           data-logo-dark="fronted/img/logo/logo.png">
                            <img width="170" height="166" src="fronted/img/nature/logo.png" alt="logo">
                        </a>
                    </div>
                    <nav class="menu_test" id="main-aside-menu">
                        <ul>
                            <li><a href="#overview">Overview</a></li>
                            <li><a href="#amenities">Amenities</a></li>
                            <li><a href="#specifications">Specifications</a></li>
                            <li><a href="#unitplan"> Unit Details </a></li>
                            <li><a href="#plan">Plans & Price</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#location_map">Location Map</a></li>
                            <li><a target="_blank" href="/outer-user-payment">PAYMENT ONLINE</a></li>
                        </ul>

                    </nav>
                    <footer>
                        <a href="https://www.facebook.com/AxisECorp/" target="_blank" class="facebook">
                            <span><i class="fa fa-facebook"></i></span>
                        </a>
                        <a href="https://www.instagram.com/axisecorp/" target="_blank" class="instagram">
                            <span><i class="fa fa-instagram"></i></span>
                        </a>
                        <a href="https://twitter.com/AxisEcorp" target="_blank" class="twitter">
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
        <div id="main-content">


            <!--top-content starts-->
            <div class="top-content" id="home">
                <!-- **Slider Section** -->
                <div class="tp-banner-container">
                    <div class="tp-banner">
                        <ul>    <!-- SLIDE  -->
                            <li data-transition="random" data-slotamount="7" data-masterspeed="300"
                                data-saveperformance="off">
                                <!-- MAIN IMAGE -->
                                <img src="fronted/img/nature/banner1.jpg" alt="banner4" data-bgposition="center top"
                                     data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone"
                                     data-bgfit="100" data-bgfitend="110" data-bgpositionend="center center">
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption white_big_border tp-fade tp-resizeme"
                                     data-x="100"
                                     data-y="312"
                                     data-speed="300"
                                     data-start="1500"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-endspeed="300"
                                     style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">ENDLESS
                                    HAPPY MOMENTS
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption white_small_shadow tp-fade tp-resizeme"
                                     data-x="350"
                                     data-y="476"
                                     data-speed="300"
                                     data-start="3000"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-endspeed="300"
                                     style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">
                                    ENTERTAINMENT NON – STOP
                                </div>
                            </li>


                            <!-- SLIDE  -->
                            <li data-transition="random" data-slotamount="7" data-masterspeed="300"
                                data-saveperformance="off">
                                <!-- MAIN IMAGE -->
                                <img src="fronted/img/nature/banner3.jpg" alt="banner2" data-bgposition="center top"
                                     data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone"
                                     data-bgfit="100" data-bgfitend="100" data-bgpositionend="center center">
                                <!-- LAYERS -->


                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption white_big_border tp-fade tp-resizeme"
                                     data-x="100"
                                     data-y="312"
                                     data-speed="300"
                                     data-start="1500"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-endspeed="300"
                                     style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">WELCOME
                                    TO SMART LIVING
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption white_small_shadow tp-fade tp-resizeme"
                                     data-x="350"
                                     data-y="476"
                                     data-speed="300"
                                     data-start="3000"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-endspeed="300"
                                     style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">AMIDST
                                    NATURE'S PARADISE
                                </div>

                            </li>


                            <!-- SLIDE  -->
                            <li data-transition="random" data-slotamount="7" data-masterspeed="300"
                                data-saveperformance="off">
                                <!-- MAIN IMAGE -->
                                <img src="fronted/img/nature/banner3.jpg" alt="banner2" data-bgposition="center top"
                                     data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone"
                                     data-bgfit="100" data-bgfitend="100" data-bgpositionend="center center">
                                <!-- LAYERS -->


                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption white_big_border tp-fade tp-resizeme"
                                     data-x="100"
                                     data-y="312"
                                     data-speed="300"
                                     data-start="1500"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-endspeed="300"
                                     style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">THE
                                    FUTURE DESTINATION
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption white_small_shadow tp-fade tp-resizeme"
                                     data-x="350"
                                     data-y="476"
                                     data-speed="300"
                                     data-start="3000"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-endspeed="300"
                                     style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">PERFECT
                                    CORPORATE GETAWAY
                                </div>

                            </li>


                        </ul>
                    </div>
                </div><!-- **Slider Section - Ends** -->

            </div>
            <!--top-content ends-->
            
            <div class="scroll_section">
                <span id="overview"><br><br><br><br></span>
                <section >
                    <div class="title title-center section_title">
                        <h2>Overview </h2>
                    </div>
                    <div class="masonry grid grid-4">
                        <div class="item">
                            <div class="item-wrapper grey darken-4 text-light">
                                <div class="creative-element">
                                    <div class="creative-element-wrapper">
                                        <div style="padding-bottom:10px;">
                                            <h3>About Axis BLUES</h3>
                                        </div>
                                        <p>Axis Blues is planned for prime hospitality & rainforest resort destination,
                                            its aim is to Eco-Luxury who preserves the excitement of nature living with
                                            modern comfort.</p>


                                        <p>Project is overlooking 6 Acre Lake, where you can enjoy your life with your
                                            family & guest, located in the heart of valley, only 35KM away as
                                            neighborhood of Punji, the ultimate prestigious area for the resort
                                            destination, and features unique physical characteristics that make it truly
                                            remarkable.</p>


                                        <p>The experience is made flawless by an innovative service concept, informal
                                            yet impeccable. The recreational area and restaurant, accompanied by
                                            exclusive function spaces, wants to become the most coveted destination
                                            point for nature lovers.</p>


                                        <p>Laze around on dew-laced nature & lush green views that melt your hart; fresh
                                            air wake up along with birds and bees, the scenic backdrop mountain, the
                                            quaint nature & it’s simple smiling inhabitants welcomes you to revel in a
                                            vibrant & harmonious ecosystem with class and high standard service and
                                            comfort with contemporary modern comfort, enriched by
                                            designer
                                            furniture & materials. </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item-wrapper">
                                <figure class="he-center-2 grey darken-4">
                                    <img src="fronted/img/nature/square-4.jpg" alt="nature">
                                    <figcaption>
                                        <h4 class="title"><span>About Axis BLUES</span></h4>
                                        <p class="tags">
                                            <!-- <span>About Axis BLUES</span>-->

                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END WORKS -->
                <span id="amenities"><br><br><br><br></span>
                <section >
                    <div class="title title-center section_title">
                        <h2>Amenities </h2>
                    </div>
                    <div class="section" style="height:580px;">
                        <div class="container">
                            <div class="clients clients-boxed">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-1.png">
                                        <p>RESTAURANTS</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-2.png">
                                        <p>GOLF LEARNING</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-3.png">
                                        <p>SQUASH</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-4.png">
                                        <p>CLUB THEATER</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-5.png">
                                        <p>PARTY ZONES</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-6.png">
                                        <p>KIDS CRECHE</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-7.png">
                                        <p>KIDS PLAY ZONE</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-8.png">
                                        <p>BADMINTON COURTS</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-9.png">
                                        <p>LIBRARY</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-10.png">
                                        <p>BASKETBALL COURT</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-11.png">
                                        <p>SKATING RINK</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-12.png">
                                        <p>LIFE SIZE CHESS</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-13.png">
                                        <p>SWIMMING POOL</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-14.png">
                                        <p>GYMNASIUM</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-15.png">
                                        <p>JOGGING TRACKS</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-16.png">
                                        <p>CRICKET PRACTICE</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-17.png">
                                        <p>YOGA</p>
                                    </div>


                                    <div class="col-sm-2">
                                        <img src="fronted/img/nature/amenities-18.png">
                                        <p>AMPHITHEATER</p>
                                    </div>


                                </div>

                            </div>


                        </div>
                    </div>
                </section>

                <span id="specifications"><br><br><br><br></span>
                <section  style="background:#f5f5f5 ;">
                    <div class="title title-center section_title">
                        <h2>Specifications </h2>
                    </div>


                    <div class="container">
                        <div class="row">


                            <!--Specification modal start-->
                            <div id="demo">
                                <div class="plainmodal-close"></div>
                                <div id="modal_content">

                                </div>

                            </div>
                            <!--Specification modal end-->


                            <div class="col-lg-6">
                                <div class="feature-box feature-full feature-icon-right  animated fadeIn visible"
                                     data-animation="fadeIn" data-animation-delay="200">
                                    <div class="feature-content">
                                        <h3 class="feature-title">Living /Dining Room</h3>
                                        <p>Flooring - Glazed Vitrified Tiles, Wall Finish - Internal walls with POP
                                            punning with emulsion
                                            <span id="toggle-button"><a
                                                        onclick="getSpecificationContent('living_din_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>

                                    </div>
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/dining-room.png">
                                    </div>
                                </div>
                                <div class="feature-box feature-full feature-icon-right animated fadeIn visible"
                                     data-animation="fadeIn" data-animation-delay="200">
                                    <div class="feature-content">
                                        <h3 class="feature-title">Bedroom</h3>
                                        <p>Flooring - Laminated Wooden Flooring, Wall Finish - Internal walls with POP
                                            punning with emulsion
                                            <span id="toggle-button"><a
                                                        onclick="getSpecificationContent('bedroom_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>
                                    </div>
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/bedroom.png">
                                    </div>
                                </div>
                                <div class="feature-box feature-full feature-icon-right animated fadeIn visible"
                                     data-animation="fadeIn" data-animation-delay="200">
                                    <div class="feature-content">
                                        <h3 class="feature-title">Lift Lobby</h3>
                                        <p>Flooring - Granite / Glazed Vetrified Tiles, Wall Finish- Plastic Emulsion
                                            Paint along with Stone / Tiles
                                            <span id="toggle-button"><a
                                                        onclick="getSpecificationContent('lift_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>
                                    </div>
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/lift-lobby.png">
                                    </div>
                                </div>
                                <div class="feature-box feature-full feature-icon-right animated fadeIn visible"
                                     data-animation="fadeIn" data-animation-delay="200">
                                    <div class="feature-content">
                                        <h3 class="feature-title">Smart Living</h3>
                                        <p>App enable control of lights, TV, AC, Geysers, Curtain mortars, Panic alert
                                            with hooter and child tracking system.
                                            <span id="toggle-button"><a
                                                        onclick="getSpecificationContent('smart_living_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>
                                    </div>
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/smartliving-icon.png">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="feature-box animated fadeIn visible" data-animation="fadeIn"
                                     data-animation-delay="200">
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/kitchen-icon.png">
                                    </div>
                                    <div class="feature-content">
                                        <h3 class="feature-title">kitchen</h3>
                                        <p>Equipment - Min Refrigerator, Microwave, Electric / Induction Cook-top,
                                            Electric Kettle & RO.
                                            <span id="toggle-button"><a
                                                        onclick="getSpecificationContent('kitchen_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="feature-box animated fadeIn visible" data-animation="fadeIn"
                                     data-animation-delay="200">
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/door-icon.png">
                                    </div>
                                    <div class="feature-content">
                                        <h3 class="feature-title">Door</h3>
                                        <p>Main Entry Door- Designer 40mm thick, Moulded skin doors with Masonite skin
                                            both side or eq. ,architrave and hardware
                                            <span id="toggle-button"><a
                                                        onclick="getSpecificationContent('door_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="feature-box animated fadeIn visible" data-animation="fadeIn"
                                     data-animation-delay="200">
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/electrical-icon.png">
                                    </div>
                                    <div class="feature-content">
                                        <h3 class="feature-title">Electrical</h3>
                                        <p>All electrical wiring concealed conduits, provision for adequate light and
                                            power points, telephone, TV in living room etc.
                                            <span id="toggle-button"><a
                                                        onclick="getSpecificationContent('electrical_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="feature-box animated fadeIn visible" data-animation="fadeIn"
                                     data-animation-delay="200">
                                    <div class="icon icon-gray">
                                        <img src="fronted/img/ac-icon.png">
                                    </div>
                                    <div class="feature-content">
                                        <h3 class="feature-title">AC</h3>
                                        <p>2.5 ton Air Conditionner (Sharing based VRV unit)
                                            <span id="toggle-button"><a onclick="getSpecificationContent('ac_content')"><i
                                                            class="fa fa-plus" aria-hidden="true"
                                                            style="cursor: pointer;"></i></a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <span id="unitplan"><br><br><br><br></span>
                <section id="" class="unit_plan"
                         style="background:url(fronted/img/nature/bg.jpg) repeat; background-attachment:fixed; background-size:cover;">

                    <div class="title title-center section_title">
                        <h2> Unit Details</h2>
                    </div>

                    <div class="container">

<!--
                        <div class="left2">
                            <div class="text-element">
                                <div class="text-element-wrapper p-r-0" style="min-height: 630px;">
                                    <div class="text-element-inner">
                                        <h5>Inclusions</h5>
                                        <p>1 Bedroom</p>
                                        <p>1 Living room</p>
                                        <p>1 Toilet</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="text-element-inner">
                                        <h5>Unit Area Details</h5>
                                        <p>Usable Area : 58.9 Sq.mt. (635 Sq.ft.)</p>
                                        <p>RERA Carpet : 32 Sq.mt. (348 Sq.ft.)</p>
                                        <p>Appurtenant Area : 26.9 Sq.mt. (287 Sq.ft.)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
-->




<div class="unit1">



<div class="masonry grid grid-3 with-caption">
<div class="item branding photography">
<div class="item-wrapper">
<figure class="he-2 caption-visible caption-center indigo darken-3">
<img src="fronted/img/nature/unit-1.png" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/unit-1.png"
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
<img src="fronted/img/nature/unit-2.png" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/unit-2.png"
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
<img src="fronted/img/nature/unit-3.png" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/unit-3.png"
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



                  <!--      <div class="right2">
                            <div class=" skrollable skrollable-between" data-bottom="right:0;"
                                 data-bottom-top="right:-150px;" style="right: -39.2308px;">

                                <a class="example-image-link" href="fronted/img/nature/Unit_plan_popup.png"
                                   data-lightbox="example-1">
                                    <img class="example-image" src="fronted/img/nature/Unit_plan.png"
                                         alt="image-1"/></a>

                            </div>
                        </div>-->

                    </div>

                </section>

  <span id="plan"><br><br><br><br></span>
                <section id="">
                    <div class="title title-center section_title">
                        <h2>Plans </h2>
                    </div>
                    <div class="container">
                        <div class="tab-line-bottom">
                            <ul class="nav nav-tabs" role="tablist" id="planId">
                                <li class="nav-item" role="presentation">
                                    <a href="#features-4" id="c_plan" class="active" onclick="planCick('c_plan')"
                                       class="active" aria-controls="features-4" role="tab" data-toggle="tab">
                                        CLUSTER PLAN
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#text-4" id="p_plan" onclick="planCick('p_plan')" aria-controls="text-4"
                                       role="tab" data-toggle="tab">
                                        PROJECT PLAN
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#price-list" id="price_list" onclick="planCick('price_list')"
                                       aria-controls="text-4" role="tab" data-toggle="tab">
                                        PRICE LIST
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="features-4">
                                    <div class="row">

                                        <a class="example-image-link"
                                           href="{{asset('fronted/img/nature/floor-plan.jpg')}}"
                                           data-lightbox="example-1">
                                            <img class="example-image"
                                                 src="{{asset('fronted/img/nature/floor-plan.jpg')}}"
                                                 alt="image-1"/></a>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="text-4">
                                    <div class="row">


                                        <a class="example-image-link"
                                           href="{{asset('fronted/img/nature/site-plan-map1.jpg')}}"
                                           data-lightbox="example-1">
                                            <img class="example-image"
                                                 src="{{asset('fronted/img/nature/site-plan-map1.jpg')}}"
                                                 alt="image-1"/></a>


                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="price-list">
                                    <div class="row">


                                        <a class="example-image-link"
                                           href="{{asset('fronted/img/nature/Axis-blue-brouchure-price-list3.jpg')}}"
                                           data-lightbox="example-1">
                                            <img class="example-image"
                                                 src="{{asset('fronted/img/nature/Axis-blue-brouchure-price-list3.jpg')}}"
                                                 alt="image-1"/></a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

<span id="gallery"><br><br><br><br></span>
                <section id="">
                    <div class="title title-center section_title">
                        <h2>Gallery</h2>
                    </div>
                    
                    
              
<div class="container">
<div class="tab-line-bottom">
<ul class="nav nav-tabs" role="tablist" id="planId">
<li class="nav-item" role="presentation">
<a href="#features-5" id="c_update" class="active" onclick="planCick('c_update')"
aria-controls="features-5" role="tab" data-toggle="tab">

Construction Updates
</a>
</li>
<!--    <li class="nav-item" role="presentation">
<a href="#text-5" id="p_gallery" onclick="planCick('p_gallery')" aria-controls="text-5"
role="tab" data-toggle="tab">
Gallery
</a>
</li>-->


<li class="nav-item" role="presentation">
<a href="#galleryview" id="galleryList" onclick="planCick('galleryList')"
aria-controls="text-5" role="tab" data-toggle="tab">
Gallery
</a>
</li>




</ul>
<div class="clear"></div>
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="features-5">




<div class="row">








<div class="video_outer">
<video width="100%" controls>
<source src="{{asset('fronted/img/nature/Construction-video1.mp4')}}">
<!--<source src="Construction-video1.mp4" type="video/mp4">-->
<source src="mov_bbb.ogg" type="video/ogg">
Your browser does not support HTML5 video.
</video>
<h3>January 2020</h3>
</div>



<div class="video_outer">
<video width="100%" height="300px" controls>
<source src="{{asset('fronted/img/nature/Construction-video2.mp4')}}">
<!--<source src="Construction-video1.mp4" type="video/mp4">-->
<source src="mov_bbb.ogg" type="video/ogg">
Your browser does not support HTML5 video.
</video>
<h3>December 2019 </h3>
</div>

<div class="clear"></div>



</div>

</div>




<div role="tabpanel" class="tab-pane fade in" id="galleryview" >

<div class="row">

<div class="masonry grid grid-3 with-caption">
<div class="item branding photography">
<div class="item-wrapper">
<figure class="he-2 caption-visible caption-center indigo darken-3">
<img src="fronted/img/nature/gallery-1.jpg" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/gallery-1.jpg"
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
<img src="fronted/img/nature/gallery-2.jpg" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/gallery-2.jpg"
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
<img src="fronted/img/nature/gallery-3.jpg" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/gallery-3.jpg"
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
<img src="fronted/img/nature/gallery-4.jpg" alt="creative">
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
<img src="fronted/img/nature/gallery-5.jpg" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/gallery-5.jpg"
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
<img src="fronted/img/nature/gallery-6.jpg" alt="creative">
<div class="hover-icons">
<div class="hover-icons-wrapper">
<a class="example-image-link"
href="fronted/img/nature/gallery-6.jpg"
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






</div>
</div>
</div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!--<div class="container">


                       

                        <div class="container-fluid">

                            <div class="masonry grid grid-3 with-caption">
                                <div class="item branding photography">
                                    <div class="item-wrapper">
                                        <figure class="he-2 caption-visible caption-center indigo darken-3">
                                            <img src="fronted/img/nature/gallery-1.jpg" alt="creative">
                                            <div class="hover-icons">
                                                <div class="hover-icons-wrapper">
                                                    <a class="example-image-link"
                                                       href="fronted/img/nature/gallery-1.jpg"
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
                                            <img src="fronted/img/nature/gallery-2.jpg" alt="creative">
                                            <div class="hover-icons">
                                                <div class="hover-icons-wrapper">
                                                    <a class="example-image-link"
                                                       href="fronted/img/nature/gallery-2.jpg"
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
                                            <img src="fronted/img/nature/gallery-3.jpg" alt="creative">
                                            <div class="hover-icons">
                                                <div class="hover-icons-wrapper">
                                                    <a class="example-image-link"
                                                       href="fronted/img/nature/gallery-3.jpg"
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
                                            <img src="fronted/img/nature/gallery-4.jpg" alt="creative">
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
                                            <img src="fronted/img/nature/gallery-5.jpg" alt="creative">
                                            <div class="hover-icons">
                                                <div class="hover-icons-wrapper">
                                                    <a class="example-image-link"
                                                       href="fronted/img/nature/gallery-5.jpg"
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
                                            <img src="fronted/img/nature/gallery-6.jpg" alt="creative">
                                            <div class="hover-icons">
                                                <div class="hover-icons-wrapper">
                                                    <a class="example-image-link"
                                                       href="fronted/img/nature/gallery-6.jpg"
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

                        

                    </div>-->
                </section>

<span id="location_map"><br><br><br><br></span>
                <section id="" class="contact_map">
                    <div class="title title-center section_title" style="margin-top:0;">
                        <h2>Location Map </h2>
                    </div>
                    <div class="location" id="location">
                        <div class="container">
                            <div class="left">
                                <img src="fronted/img/nature/axisblues-map.png" alt="map">
                                <a href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7681.723157246499!2d73.95784075818182!3d15.705496380897662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis+Blues!5e0!3m2!1sen!2sin!4v1563515704419!5m2!1sen!2sin"
                                   class="explore-google-map-btn" data-event-category="Section"
                                   data-event-action="Click" data-event-name="Explore Google Maps">Explore
                                    Google Maps</a>
                            </div>


                            <div class="right">
                                <div class="close_point">
                                    <h3>Airport</h3>
                                    <ul>
                                        <li>Mopa Airport - 18 Km [Operational by 2022*]</li>
                                        <li>Chipi-Parule Airport - 75 Km</li>
                                        <li>Dabolim Airport - 70 Km</li>
                                        <li>Belgaum Airport - 80 Km</li>
                                    </ul>
                                </div>
                                <div class="close_point">
                                    <h3>Sea &amp; Beaches</h3>
                                    <ul>
                                        <li>Mandrem Beach - 36 Km</li>
                                        <li>Vagator Beach - 31 Km</li>
                                        <li>Calangute Beach - 35 Km</li>
                                        <li>Colva Beach - 70 Km</li>
                                    </ul>
                                </div>
                                <div class="close_point">
                                    <h3>Railway Station</h3>
                                    <ul>
                                        <li>Thivim - 15 Km</li>
                                        <li>Madgaon - 69 Km</li>
                                        <li>Kudal - 50 Km</li>
                                        <li>Pernem - 25 Km</li>
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
            }else if (id == 'c_update') {
                $("#" + id).addClass('active');
                $("#galleryList").removeClass('active');
            }
        }
    </script>


    </body>
@stop
