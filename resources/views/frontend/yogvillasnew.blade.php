@extends('frontend.master')

@section('project-current-menu', 'current-menu-item')
@section('home-current-menu','')

@section('content')

    <link rel="stylesheet" href="fronted/yogvillasnew/js/vendor/hotspot/css/style.min.css" type="text/css" media="all">
    <!-- <link rel="stylesheet" href="fronted/yogvillasnew/js/vendor/hotspot/css/tooltipster.css" type="text/css" media="all" > -->
    <link rel="stylesheet" href="fronted/yogvillasnew/js/vendor/hotspot/css/tooltipster.min.css" type="text/css" media="all">
    <!-- <link rel="stylesheet" href="fronted/yogvillasnew/js/vendor/mediaelement/css/mediaelementplayer.css" type="text/css" media="all" > -->
    <link rel="stylesheet" href="fronted/yogvillasnew/js/vendor/mediaelement/css/mediaelementplayer.min.css" type="text/css" media="all">
    <!-- <link rel="stylesheet" href="fronted/yogvillasnew/js/vendor/revslider/public/assets/css/settings.css" type="text/css" media="all" > -->
    <link rel="stylesheet" href="fronted/yogvillasnew/js/vendor/revslider/public/assets/css/settings.min.css" type="text/css" media="all">
    <style id="rs-plugin-settings-inline-css" type="text/css"></style>
    <link rel='stylesheet' href='fronted/yogvillasnew/js/vendor/swiper/swiper.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='fronted/yogvillasnew/js/vendor/magnific/magnific-popup.min.css' type='text/css' media='all'/>
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/font-face/css/fonts_pack.css' type='text/css' media='all' /> -->
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/fontello/css/fontello-embedded.css' type='text/css' media='all'/> -->
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/animation.css' type='text/css' media='all'/> -->
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/shortcodes.css' type='text/css' media='all' /> -->
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/yogvillasmain.css' type='text/css' media='all'/> -->
    <link rel='stylesheet' href='fronted/yogvillasnew/css/font-face/css/fonts_pack.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='fronted/yogvillasnew/css/fontello/css/fontello-embedded.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='fronted/yogvillasnew/css/animation.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='fronted/yogvillasnew/css/shortcodes.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='fronted/yogvillasnew/css/yogvillasmain.min.css' type='text/css' media='all'/>
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/template-color.css' type='text/css' media='all'/> -->
    <link rel='stylesheet' href='fronted/yogvillasnew/css/template-color.min.css' type='text/css' media='all'/>
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/responsive.css' type='text/css' media='all' /> -->
    <link rel='stylesheet' href='fronted/yogvillasnew/css/responsive.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' href='fronted/yogvillasnew/css/nav.min.css' type='text/css' media='all'/>
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/nav.css' type='text/css' media='all' /> -->
    <!-- <link rel='stylesheet' href='fronted/yogvillasnew/css/nucleo.css' type='text/css' media='all' /> -->
    <link rel='stylesheet' href='fronted/yogvillasnew/css/nucleo.min.css' type='text/css' media='all'/>
    <link rel="stylesheet" href="fronted/yogvillasnew/css/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="fronted/css/colorbox.min.css">
    <!-- <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">-->
    <link href='https://fonts.googleapis.com/css?family=Satisfy%7CMontserrat:400,700%7COpen+Sans:300,400,700,800%7CSumana' rel='stylesheet'/>

    <!--**Google Fonts**-->
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,800,700,100,500,500italic,300,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="fronted/yogvillasnew/css/lightbox.min.css">
	
	
	
	 <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
	
	

    <body class="left-nav header-dark  home page preloader blog_style_excerpt sidebar_hide expand_content remove_margins header_style_header-1 header_title_off menu_style_left menu_style_side anchor_slide" data-demo="true">

    @include('frontend.profile.upper_link')
    <div class="body_wrap">
        <div class="page_wrap">
            <header class="top_panel top_panel_style_1 without_bg_image scheme_side">
                <div class="header_widgets_wrap widget_area header_fullwidth">
                    <div class="header_widgets_wrap_inner widget_area_inner">
                        <aside id="trx_addons_widget_slider-3" class="widget widget_slider">
                            <div class="slider_wrap slider_engine_revo slider_alias_homeslider-1">
                                <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container">
                                    <div id="rev_slider_1_1" class="rev_slider fullscreenbanner" data-version="5.2.6">
                                        <ul>
                                            <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Linear.easeNone" data-easeout="Linear.easeNone" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                                                data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description=""><img src="fronted/yogvillasnew/images/bg_header.jpg" alt="" title="bg_header" width="1920" height="914" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                <div class="tp-caption slide_bg tp-resizeme" id="slide-1-layer-6" data-x="center" data-hoffset="" data-y="center" data-voffset="" data-width="['590']" data-height="['630']" data-transform_idle="o:1;" data-transform_in="y:bottom;s:800;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="1500" data-splitin="none" data-splitout="none"
                                                     data-responsive_offset="on"></div>
                                                {{--<div class="tp-caption   tp-resizeme  slide_subtitle" id="slide-1-layer-5" data-x="center" data-hoffset="" data-y="center" data-voffset="-110" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="2100" data-splitin="none"
                                                     data-splitout="none" data-responsive_offset="on">Find the Best
                                                </div>--}}
                                                <h1 class="tp-caption   tp-resizeme  slide_title" id="slide-1-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="-20" data-width="['1024']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="2400" data-splitin="none"
                                                    data-splitout="none" data-responsive_offset="on">MODERN VILLA IN<br>
                                                    THE HEART OF NATURE </h1>

                                                <div class="tp-caption   tp-resizeme  slide_scroll" id="slide-1-layer-3" data-x="center" data-hoffset="" data-y="bottom" data-voffset="40" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="opacity:0;s:500;e:Power2.easeOut;" data-transform_out="opacity:0;s:300;" data-start="3000" data-splitin="none"
                                                     data-splitout="none" data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]' data-responsive_offset="on">
                                                    <div class="theme_scroll_down">Explore</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="tp-bannertimer tp-bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </header>

            <!-- BEGIN LATERAL NAVIGATION -->
            <aside id="aside-nav" class="img-cover" data-bg-img="fronted/img/nature/tall-3.jpg">
                <div id="main-aside-navigation">
                    <div class="main-nav-wrapper">
                        <div id="aside-logo">
                            <a href="#" data-logo-light="fronted/yogvillasnew/images/logo-yogvillas.png" data-logo-dark="assets/img/logo/logo.png">
                                <img width="151" height="126" src="fronted/yogvillasnew/images/logo-yogvillas.png" alt="logo">
                            </a>
                        </div>
                        <div>
                        <nav class="menu_test" id="main-aside-menu">
                            <ul>
                                <li><a href="#overview">Overview</a></li>
                                <li><a href="#amenities">Amenities</a></li>
                                <li><a href="#specifications">Specifications</a></li>

                                <li><a href="#plan">Plans</a></li>
                                <li><a href="#price">Price</a></li>
                                <li><a href="#gallery">Gallery</a></li>
                                <li><a href="#location">Location Map</a></li>
                                <li><a target="_blank" href="/yogvilla-payment">PAYMENT ONLINE</a></li>
                            </ul>

                        </nav>
                        </div>
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


            <div class="page_content_wrap scheme_default">
                <div class="content">
                    <article class="post_item_single page">
                        <div class="post_content entry-content">
                            <section class="full-height-section no-col-padding columns-stretch content-middle" id="overview">
                                <div class="container">
                                    <div class="row"><a id="sc_anchor_new_complex" class="sc_anchor sc_anchor_default" title="New Complex" data-icon="icon-note-2" data-url=""></a>
                                        <div class="columns_wrap">
                                            <div class="column_container column-1_1">
                                                <div class="column-inner">
                                                    <div class="height_large"></div>
                                                    <div class="sc_promo sc_promo_modern sc_promo_size_large sc_promo_no_paddings sc_promo_image_position_right sc_promo_image_width_50p">
                                                        <div class="sc_promo_image_wrap">
                                                            <div class="sc_promo_image bg_image_1"></div>
                                                            <a class="sc_promo_link2" href="#gallery"> <span>More</span> <span>PHOTO</span> </a></div>
                                                        <div class="sc_promo_text">
                                                            <div class="sc_promo_text_inner">
                                                                <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default">Overview</h6>
                                                                <h2 class="sc_item_title sc_promo_title sc_align_default sc_item_title_style_default">The Goan Resort Life
                                                                    is Calling</h2>
                                                                <div class="sc_item_descr sc_promo_descr sc_align_default">Right from the magical beaches to the warm people, Goa invites you to a lifestyle where the party never ends. Taking inspiration from this amazing culture, we have created a resort-like paradise in one of Goa’s pristine locations. Inspired by European clustered-town designs,
                                                                    Axis Yog Villas offers smart vacation villas accentuated by nature and replete with all modern comforts & conveniences.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="height_large"></div>
                                                    <div class="row">
                                                        <div class="columns_wrap">
                                                            <div class="column_container column-1_1 scheme_dark">
                                                                <div class="column-inner pn">
                                                                    <div id="sc_skills_1" class="sc_skills sc_skills_counter" data-type="counter">
                                                                        <div class="sc_skills_columns sc_item_columns trx_addons_columns_wrap columns_padding_bottom">

                                                                            <div class="sc_skills_column trx_addons_column-1_5">
                                                                                <div class="sc_skills_item_wrap"><img src="fronted/yogvillasnew/images/Smart-Living.png">
                                                                                    <div class="sc_skills_item_title">Smart Living</div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="sc_skills_column trx_addons_column-1_5">
                                                                                <div class="sc_skills_item_wrap"><img src="fronted/yogvillasnew/images/Vastu-Compliance.png">
                                                                                    <div class="sc_skills_item_title">Vastu Compliance</div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="sc_skills_column trx_addons_column-1_5">
                                                                                <div class="sc_skills_item_wrap"><img src="fronted/yogvillasnew/images/Private-Pool-Villa.png">

                                                                                    <div class="sc_skills_item_title">Private Pool Villa</div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="sc_skills_column trx_addons_column-1_5">
                                                                                <div class="sc_skills_item_wrap"><img src="fronted/yogvillasnew/images/Sports-n-Healthcare-Club.png">

                                                                                    <div class="sc_skills_item_title">Sport & Healthcare Club</div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="sc_skills_column trx_addons_column-1_5">
                                                                                <div class="sc_skills_item_wrap"><img src="fronted/yogvillasnew/images/Security-and-Transport.png">

                                                                                    <div class="sc_skills_item_title">Security & Transport</div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="height_large"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            {{--<section class="full-height-section no-col-padding columns-stretch content-middle bg_image_3" id="amenities">
                                <div class="container">
                                    <div class="row"><a id="sc_anchor_amenities" class="sc_anchor sc_anchor_default" title="Amenities" data-icon="icon-clipboard" data-url=""></a>
                                        <div class="columns_wrap">
                                            <div class="column_container column-2_3">
                                                <div class="column-inner">
                                                    <div class="height_large"></div>
                                                    <div class=" sc_content sc_content_default">
                                                        --}}{{--<h6 class="sc_item_subtitle sc_content_subtitle sc_align_default sc_item_title_style_default" style="color:#000;">RESORT LIVING--}}{{--
                                                            --}}{{--AMENITIES</h6>--}}{{--
                                                        <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default">Resort Living Amenities</h6>
                                                        <h2 class="sc_item_title sc_content_title sc_align_default sc_item_title_style_default" style="color:#000;font-size: 2.6667rem;">Our lavish amenities are central to the Yog Villas promise of an enjoyable lifestyle to its residents.</h2>
                                                    </div>
                                                    <div class="height_small"></div>
                                                    <div class="row">
                                                        <div class="columns_wrap">
                                                            <div class="column_container column-5_6">
                                                                <div class="column-inner phn">
                                                                    <div class="sc_services sc_services_iconed" data-slides-per-view="3" data-slides-min-width="250">
                                                                        <div class="sc_services_columns sc_item_columns trx_addons_columns_wrap columns_padding_bottom">


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-modem" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/spa.png">
                                                                                            --}}{{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
<path stroke-width="25" stroke-miterlimit="10" d="M346.536,119.412
c-53.23-53.23-139.843-53.23-193.073,0"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M391.801,74.148
C353.98,36.329,303.621,15.5,250,15.5c-53.622,0-103.981,20.829-141.8,58.648"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M301.273,164.674
c-13.679-13.679-31.887-21.211-51.273-21.211c-19.386,0-37.595,7.532-51.273,21.211"/>
                                                                                                <polygon stroke-width="25" stroke-miterlimit="10" points="258.682,274.249 258.682,215.335
241.318,215.335 241.318,274.249 15.695,274.249 15.695,485.937 484.305,485.937 484.305,274.249 "/>
</svg>--}}{{--
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Health Club & Spa</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a  title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Interior">Interior</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-laundry" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/floor-mop.png">
                                                                                            --}}{{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
<path stroke-width="25" stroke-miterlimit="10" d="M250,207.238
c-58.966,0-106.938,47.972-106.938,106.938S191.034,421.114,250,421.114c58.966,0,106.938-47.973,106.938-106.938
S308.966,207.238,250,207.238z"/>
                                                                                                <rect x="38.5" y="19.489" stroke-width="25" stroke-miterlimit="10" width="423" height="461.021"/>
                                                                                                <line stroke-width="25" stroke-miterlimit="10" x1="25.5" y1="143.5" x2="473.5" y2="143.5"/>
</svg>--}}{{--
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a>24/7 Housekeeping</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Interior">Interior</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-cart" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/table-tennis.png">
                                                                                            --}}{{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
<path stroke-width="25" stroke-miterlimit="10" d="M105.769,392.673
c-25.811,0-46.809,20.997-46.809,46.81c0,25.81,20.998,46.809,46.809,46.809s46.81-20.999,46.81-46.809
C152.579,413.67,131.58,392.673,105.769,392.673z"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M418.342,392.673
c-25.812,0-46.809,20.997-46.809,46.81c0,25.81,20.997,46.809,46.809,46.809s46.811-20.999,46.811-46.809
C465.152,413.67,444.153,392.673,418.342,392.673z"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M484.44,138.396H376.209
c-6.541-51.901-52.786-93.147-104.687-99.686V13.709h-18.934V38.71c-51.9,6.541-98.147,47.786-104.686,99.686H40.605V90.884H15.56
v8.934h24.111v192.197H58.96v72.688h406.192v-72.688h19.288V138.396z"/>
</svg>--}}{{--
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Sports and Clubbing</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a  title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Process">Process</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a id="sc_services_1559316197_icon-parking" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/sunset.png">
                                                                                            --}}{{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
<path stroke-width="25" stroke-miterlimit="10" d="M205.346,275.382h58.393
c34.282,0,62.173-27.891,62.173-62.173c0-34.282-27.891-62.173-62.173-62.173h-58.65V355.84h0.257V275.382z"/>
                                                                                                <rect x="14.5" y="14.5" stroke-width="25" stroke-miterlimit="10" width="473" height="473"/>
                                                                                                <rect x="82.768" y="82.768" stroke-width="25" stroke-miterlimit="10" width="336.463" height="336.463"/>
</svg>--}}{{--
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Landscape</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Interior">Interior</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-swimming-pool" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/swim.png">
                                                                                            --}}{{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
<path stroke-width="25" stroke-miterlimit="10" d="M499.999,428.258
c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.709,7.887-22.611,7.887c-10.903,0-15.563-3.139-22.612-7.888
c-8.708-5.865-19.544-13.165-39.892-13.165c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.707,7.888-22.61,7.888
c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.865-19.543-13.165-39.89-13.165c-20.348,0-31.183,7.3-39.889,13.166
c-7.049,4.749-11.706,7.888-22.608,7.888c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.866-19.542-13.166-39.89-13.166
c-20.348,0-31.183,7.3-39.89,13.165c-7.05,4.749-11.707,7.888-22.609,7.888c-10.901,0-15.559-3.139-22.608-7.888
c-8.705-5.865-19.54-13.165-39.888-13.165"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M499.999,358.258
c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.709,7.887-22.611,7.887c-10.903,0-15.563-3.139-22.612-7.888
c-8.708-5.865-19.544-13.165-39.892-13.165c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.707,7.888-22.61,7.888
c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.865-19.543-13.165-39.89-13.165c-20.348,0-31.183,7.3-39.889,13.166
c-7.049,4.749-11.706,7.888-22.608,7.888c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.866-19.542-13.166-39.89-13.166
c-20.348,0-31.183,7.3-39.89,13.165c-7.05,4.749-11.707,7.888-22.609,7.888c-10.901,0-15.559-3.139-22.608-7.888
c-8.705-5.865-19.54-13.165-39.888-13.165"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M315.91,72.944
c-16.174-16.94-38.823-26.925-62.743-26.925c-47.777,0-86.646,38.869-86.646,86.646v234.649"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M304.166,367.514V113.489
c0-34.627,28.171-62.799,62.798-62.799c34.628,0,62.799,28.171,62.799,62.799v92.783"/>
                                                                                                <g>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M171.081,172.129c1.745,0,125.582,0,125.582,0"/>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M171.081,272.129c10.151,0,1.341,0,125.582,0"/>
                                                                                                </g>
</svg>--}}{{--
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Private Pool</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Process">Process</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a id="sc_services_1559316197_icon-ironing" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/burguer.png">
                                                                                            --}}{{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
<g>
    <path stroke-width="25" stroke-miterlimit="10" d="M354.364,135.536H205.64l0.014-24.626
l-17.063,0.014v25.515c-51.848,6.521-98.637,47.726-105.158,99.573h-5.704c-33.56,0-60.863,27.303-60.863,60.863
c0,18.596,8.383,35.271,21.567,46.443c-13.184,11.173-21.567,27.848-21.567,46.443c0,33.56,27.303,60.863,60.864,60.863h344.541
c33.561,0,60.864-27.304,60.864-60.863c0-18.596-8.383-35.271-21.567-46.443c13.185-11.174,21.567-27.848,21.567-46.443
c0-33.56-27.304-60.863-60.864-60.863h-18L366.243,49.375H168.906l0,0"/>
</g>
                                                                                                <g>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M79.98,235.556c1.645,0,333.882,0,333.882,0"/>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M37.357,341.64c2.077,0,421.496,0,421.496,0"/>
                                                                                                </g>
</svg>--}}{{--
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a>Food Drinks & More</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a  title="View all posts in Interior">Interior</a>, <a  title="View all posts in Process">Process</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="height_large"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>--}}
                            <section class=" no-col-padding columns-stretch content-middle bg_image_3" id="amenities">
                                <div class="container">
                                    <div class="row"><a id="sc_anchor_amenities" class="sc_anchor sc_anchor_default" title="Amenities" data-icon="icon-clipboard" data-url=""></a>
                                        <div class="columns_wrap">
                                            <div class="column_container">
                                                <div class="column-inner">
                                                    <div class="height_large"></div>
                                                    <div class=" sc_content sc_content_default">
                                                        {{--<h6 class="sc_item_subtitle sc_content_subtitle sc_align_default sc_item_title_style_default" style="color:#000;">RESORT LIVING--}}
                                                        {{--AMENITIES</h6>--}}
                                                        <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default" style="text-align: center;">Resort Living Amenities</h6>
                                                        <h2 class="sc_item_title sc_content_title sc_align_default sc_item_title_style_default" style="color:#000;font-size: 2.6667rem; text-align: center;">Our lavish amenities are central to the Yog Villas promise of an enjoyable lifestyle to its residents.</h2>
                                                    </div>
                                                    <div class="height_small"></div>
                                                    <div class="row">
                                                        <div class="columns_wrap">
                                                            <div class="column_container ">
                                                                <div class="column-inner phn">
                                                                    <div class="sc_services sc_services_iconed" data-slides-per-view="3" data-slides-min-width="250">
                                                                        <div class="sc_services_columns sc_item_columns trx_addons_columns_wrap columns_padding_bottom">


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-modem" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/spa.png">
                                                                                            {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M346.536,119.412
                                                                                    c-53.23-53.23-139.843-53.23-193.073,0"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M391.801,74.148
                                                                                    C353.98,36.329,303.621,15.5,250,15.5c-53.622,0-103.981,20.829-141.8,58.648"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M301.273,164.674
                                                                                    c-13.679-13.679-31.887-21.211-51.273-21.211c-19.386,0-37.595,7.532-51.273,21.211"/>
                                                                                                <polygon stroke-width="25" stroke-miterlimit="10" points="258.682,274.249 258.682,215.335
                                                                                    241.318,215.335 241.318,274.249 15.695,274.249 15.695,485.937 484.305,485.937 484.305,274.249 "/>
                                                                                    </svg>--}}
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Health Club & Spa</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a  title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Interior">Interior</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-laundry" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/floor-mop.png">
                                                                                            {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M250,207.238
                                                                                    c-58.966,0-106.938,47.972-106.938,106.938S191.034,421.114,250,421.114c58.966,0,106.938-47.973,106.938-106.938
                                                                                    S308.966,207.238,250,207.238z"/>
                                                                                                <rect x="38.5" y="19.489" stroke-width="25" stroke-miterlimit="10" width="423" height="461.021"/>
                                                                                                <line stroke-width="25" stroke-miterlimit="10" x1="25.5" y1="143.5" x2="473.5" y2="143.5"/>
                                                                                    </svg>--}}
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a>24/7 Housekeeping</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Interior">Interior</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-cart" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/table-tennis.png">
                                                                                            {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M105.769,392.673
                                                                                    c-25.811,0-46.809,20.997-46.809,46.81c0,25.81,20.998,46.809,46.809,46.809s46.81-20.999,46.81-46.809
                                                                                    C152.579,413.67,131.58,392.673,105.769,392.673z"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M418.342,392.673
                                                                                    c-25.812,0-46.809,20.997-46.809,46.81c0,25.81,20.997,46.809,46.809,46.809s46.811-20.999,46.811-46.809
                                                                                    C465.152,413.67,444.153,392.673,418.342,392.673z"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M484.44,138.396H376.209
                                                                                    c-6.541-51.901-52.786-93.147-104.687-99.686V13.709h-18.934V38.71c-51.9,6.541-98.147,47.786-104.686,99.686H40.605V90.884H15.56
                                                                                    v8.934h24.111v192.197H58.96v72.688h406.192v-72.688h19.288V138.396z"/>
                                                                                    </svg>--}}
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Sports and Clubbing</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a  title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Process">Process</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a id="sc_services_1559316197_icon-parking" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/sunset.png">
                                                                                            {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M205.346,275.382h58.393
                                                                                    c34.282,0,62.173-27.891,62.173-62.173c0-34.282-27.891-62.173-62.173-62.173h-58.65V355.84h0.257V275.382z"/>
                                                                                                <rect x="14.5" y="14.5" stroke-width="25" stroke-miterlimit="10" width="473" height="473"/>
                                                                                                <rect x="82.768" y="82.768" stroke-width="25" stroke-miterlimit="10" width="336.463" height="336.463"/>
                                                                                    </svg>--}}
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Landscape</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Interior">Interior</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a  id="sc_services_1559316197_icon-swimming-pool" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/swim.png">
                                                                                            {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M499.999,428.258
                                                                                    c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.709,7.887-22.611,7.887c-10.903,0-15.563-3.139-22.612-7.888
                                                                                    c-8.708-5.865-19.544-13.165-39.892-13.165c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.707,7.888-22.61,7.888
                                                                                    c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.865-19.543-13.165-39.89-13.165c-20.348,0-31.183,7.3-39.889,13.166
                                                                                    c-7.049,4.749-11.706,7.888-22.608,7.888c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.866-19.542-13.166-39.89-13.166
                                                                                    c-20.348,0-31.183,7.3-39.89,13.165c-7.05,4.749-11.707,7.888-22.609,7.888c-10.901,0-15.559-3.139-22.608-7.888
                                                                                    c-8.705-5.865-19.54-13.165-39.888-13.165"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M499.999,358.258
                                                                                    c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.709,7.887-22.611,7.887c-10.903,0-15.563-3.139-22.612-7.888
                                                                                    c-8.708-5.865-19.544-13.165-39.892-13.165c-20.349,0-31.185,7.3-39.892,13.165c-7.05,4.749-11.707,7.888-22.61,7.888
                                                                                    c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.865-19.543-13.165-39.89-13.165c-20.348,0-31.183,7.3-39.889,13.166
                                                                                    c-7.049,4.749-11.706,7.888-22.608,7.888c-10.902,0-15.559-3.139-22.609-7.888c-8.707-5.866-19.542-13.166-39.89-13.166
                                                                                    c-20.348,0-31.183,7.3-39.89,13.165c-7.05,4.749-11.707,7.888-22.609,7.888c-10.901,0-15.559-3.139-22.608-7.888
                                                                                    c-8.705-5.865-19.54-13.165-39.888-13.165"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M315.91,72.944
                                                                                    c-16.174-16.94-38.823-26.925-62.743-26.925c-47.777,0-86.646,38.869-86.646,86.646v234.649"/>
                                                                                                <path stroke-width="25" stroke-miterlimit="10" d="M304.166,367.514V113.489
                                                                                    c0-34.627,28.171-62.799,62.798-62.799c34.628,0,62.799,28.171,62.799,62.799v92.783"/>
                                                                                                <g>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M171.081,172.129c1.745,0,125.582,0,125.582,0"/>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M171.081,272.129c10.151,0,1.341,0,125.582,0"/>
                                                                                                </g>
                                                                                    </svg>--}}
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a >Private Pool</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a title="View all posts in Apartments">Apartments</a>, <a  title="View all posts in Process">Process</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="trx_addons_column-1_3 ">
                                                                                <div class="sc_services_item without_content with_icon sc_services_item_featured_top">
                                                                                    <div class="sc_services_item_header"><a id="sc_services_1559316197_icon-ironing" class="sc_services_item_icon sc_icon_type_svg">
                                                                                            <img src="/fronted/yogvillasimg/amenities/burguer.png">
                                                                                            {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                                                                                    <g>
                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M354.364,135.536H205.64l0.014-24.626
                                                                                    l-17.063,0.014v25.515c-51.848,6.521-98.637,47.726-105.158,99.573h-5.704c-33.56,0-60.863,27.303-60.863,60.863
                                                                                    c0,18.596,8.383,35.271,21.567,46.443c-13.184,11.173-21.567,27.848-21.567,46.443c0,33.56,27.303,60.863,60.864,60.863h344.541
                                                                                    c33.561,0,60.864-27.304,60.864-60.863c0-18.596-8.383-35.271-21.567-46.443c13.185-11.174,21.567-27.848,21.567-46.443
                                                                                    c0-33.56-27.304-60.863-60.864-60.863h-18L366.243,49.375H168.906l0,0"/>
                                                                                    </g>
                                                                                                <g>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M79.98,235.556c1.645,0,333.882,0,333.882,0"/>
                                                                                                    <path stroke-width="25" stroke-miterlimit="10" d="M37.357,341.64c2.077,0,421.496,0,421.496,0"/>
                                                                                                </g>
                                                                                    </svg>--}}
                                                                                        </a>
                                                                                        <h6 class="sc_services_item_title"><a>Food Drinks & More</a></h6>
                                                                                        <div class="sc_services_item_subtitle"><a  title="View all posts in Interior">Interior</a>, <a  title="View all posts in Process">Process</a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="height_large"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="no-col-padding columns-stretch content-middle" id="specifications">
                                <div class="container">
                                    <div class="row"><a id="sc_anchor_plans" class="sc_anchor sc_anchor_default" title="Apartments Plans" data-icon="icon-floor" data-url=""></a>
                                        <div class="columns_wrap">
                                            <div class="column_container column-1_1">
                                                <div class="column-inner">
                                                    <div class="height_large"></div>
                                                    <div class="sc_content sc_content_default">
                                                        {{--<h6 class="sc_item_subtitle sc_content_subtitle sc_align_center sc_item_title_style_shadow">03</h6>--}}
                                                        <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default">Specifications</h6>
                                                        {{--<h2 class="sc_item_title sc_content_title sc_align_center sc_item_title_style_shadow">Specifications</h2>--}}
                                                    </div>
                                                    <div class="height_tiny"></div>
                                                    <div id="slider_plans" class="widget_area sc_widget_slider">
                                                        <aside id="slider_plans_widget" class="widget widget_slider">
                                                            <div class="slider_wrap slider_engine_swiper">
                                                                <div id="slider_plans_outer" class="slider_swiper_outer slider_style_default slider_outer_nocontrols slider_outer_nopagination slider_outer_notitles slider_outer_one">
                                                                    <div id="slider_plans_swiper" class="slider_swiper swiper-slider-container slider_height_auto slider_nocontrols slider_nopagination slider_notitles slider_one slider_noresize" data-ratio="370:208" data-interval="10000" data-effect="fade" data-pagination="bullets" data-slides-per-view="1" data-slides-space="0">
                                                                        <div class="swiper-wrapper">
                                                                            <div class="swiper-slide" data-title="Bedrooms">
                                                                                <div class="slide_content">
                                                                                    <div class="row">
                                                                                        <div class="columns_wrap">
                                                                                            <div class="column_container column-1_3">
                                                                                                <div class="column-inner">
                                                                                                    <h4><span class="trx_addons_accent">Bedrooms</span></h4>
                                                                                                    <ul class="trx_addons_list trx_addons_list_parameters">
                                                                                                        <li> Laminated Wooden Flooring</li>
                                                                                                        <li>Plastic Emulsion Paint for Walls</li>
                                                                                                        <li>Bed with Mattress</li>
                                                                                                        <li>Side Tables</li>
                                                                                                        <li>Carpet</li>
                                                                                                        <li>Lamppost as Furniture</li>
                                                                                                        <li>40inch LED TV with Setup Box (in Master Bedroom)</li>
                                                                                                        <li>1.5 Ton Split AC on each bed room</li>
                                                                                                    </ul>
                                                                                                    <div class="height_small"></div>
                                                                                                </div>
                                                                                            </div>


                                                                                            <div class="column_container column-2_4">
                                                                                                <div class="column-inner">
                                                                                                    <figure>
                                                                                                        <div><img style="height:500px;" src="fronted/yogvillasnew/images/specs_img-1.jpg"></div>
                                                                                                    </figure>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="swiper-slide" data-title="Sea Living">
                                                                                <div class="slide_content">
                                                                                    <div class="row">
                                                                                        <div class="columns_wrap">
                                                                                            <div class="column_container column-1_3">
                                                                                                <div class="column-inner">
                                                                                                    <h4><span class="trx_addons_accent">Living</span></h4>
                                                                                                    <ul class="trx_addons_list trx_addons_list_parameters">
                                                                                                        <li>Glassed Vitrified tiles for flooring</li>
                                                                                                        <li>Plastic Emulsion Paint on walls</li>
                                                                                                        <li>40inch LED TV with Setup Box (in Master Bedroom)</li>
                                                                                                        <li>5 Seater Sofa with Side Lamp</li>
                                                                                                        <li>1.5 Ton Split AC</li>
                                                                                                    </ul>
                                                                                                    <div class="height_small"></div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="column_container column-2_4">
                                                                                                <div class="column-inner">
                                                                                                    <figure>
                                                                                                        <div><img style="height:500px;" src="fronted/yogvillasnew/images/specs_img-2.jpg" alt="02"/></div>
                                                                                                    </figure>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="swiper-slide" data-title="Kitchen & Dining">
                                                                                <div class="slide_content">
                                                                                    <div class="row">
                                                                                        <div class="columns_wrap">
                                                                                            <div class="column_container column-1_3">
                                                                                                <div class="column-inner">
                                                                                                    <h4><span class="trx_addons_accent">Kitchen & Dining</span></h4>
                                                                                                    <ul class="trx_addons_list trx_addons_list_parameters">

                                                                                                        <li>Ceramic Tiles till 600mm</li>
                                                                                                        <li>Above the counter slab</li>
                                                                                                        <li>Rest painted with Plastic Emulsion Paint</li>
                                                                                                        <li>Modular Kitchen Storage</li>
                                                                                                        <li>With BAR counter</li>
                                                                                                        <li>SS Sink with Drain Board</li>
                                                                                                        <li>Garbage bins</li>
                                                                                                        <li>180ltr Refrigerator</li>
                                                                                                        <li>Microwave</li>
                                                                                                        <li>Chimney & Hub</li>
                                                                                                        <li>Electric Kettle & RO</li>
                                                                                                        <li>Dining Table with 4 chair</li>

                                                                                                    </ul>
                                                                                                    <div class="height_small"></div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="column_container column-2_4">
                                                                                                <div class="column-inner">
                                                                                                    <figure>
                                                                                                        <div><img style="height:500px;" src="fronted/yogvillasnew/images/specs_img-3.jpg" alt="02"/></div>
                                                                                                    </figure>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="swiper-slide" data-title="Toilet & Dresser">
                                                                                <div class="slide_content">
                                                                                    <div class="row">
                                                                                        <div class="columns_wrap">
                                                                                            <div class="column_container column-1_3">
                                                                                                <div class="column-inner">
                                                                                                    <h4><span class="trx_addons_accent">Toilet & Dresser</span></h4>
                                                                                                    <ul class="trx_addons_list trx_addons_list_parameters">


                                                                                                        <li>Geyser</li>
                                                                                                        <li>Exhaust Fan</li>
                                                                                                        <li>Toilet Mirror & Vanity & Hair dryer</li>
                                                                                                        <li>Matching washbasin with WC</li>
                                                                                                        <li>Branded CP Fittings with rain shower</li>
                                                                                                        <li>Anti-skid Ceramic Tiles</li>
                                                                                                        <li>Modular Wooden Cupboard for Dresser with Mirror</li>


                                                                                                    </ul>
                                                                                                    <div class="height_small"></div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="column_container column-2_4">
                                                                                                <div class="column-inner">
                                                                                                    <figure>
                                                                                                        <div><img style="height:500px;" src="fronted/yogvillasnew/images/specs_img-4.jpg" alt="02"/></div>
                                                                                                    </figure>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </aside>
                                                    </div>
                                                    <div class="height_large hide_on_mobile"></div>
                                                    <div class="height_tiny"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <section class="no-col-padding no-row-margin">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="columns_wrap">
                                            <div class="column_container column-1_1">
                                                <div class="column-inner phn">
                                                    <div id="slider_controller_1311150448" class="sc_slider_controller sc_slider_controller_titles" data-slider-id="slider_plans" data-style="titles" data-controls="1" data-interval="0" data-effect="slide" data-slides-per-view="5" data-slides-space="0" data-height="123px"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <div class="clearfix"></div>

                            <section class="no-col-padding columns-stretch content-middle" id="plan">
                                <div class="plan_pt">
                                    <div class="container">
                                        <div class="row">
                                            <a class="sc_anchor sc_anchor_default" title="Apartments Plans" data-icon="icon-floor" data-url=""></a>
                                            <div class="sc_content sc_content_default">
                                                {{--<h6 class="sc_item_subtitle sc_content_subtitle sc_align_center sc_item_title_style_shadow">04</h6>
                                                <h2 class="sc_item_title sc_content_title sc_align_center sc_item_title_style_shadow">Our Plan</h2>--}}
                                                <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default">Our Plan</h6>
                                            </div>


                                            <div class="column_container column-1_2">
                                                <div class="img_holder">
                                                    <a class="example-image-link" href="{{asset('fronted/yogvillasnew/images/GROUND_FLOOR.png')}}">
                                                        <img class="example-image" src="{{asset('fronted/yogvillasnew/images/GROUND_FLOOR.png')}}" alt="GROUND FLOOR">
                                                    </a>
                                                </div>
                                                <h3>GROUND FLOOR</h3>
                                                <p></p>
                                            </div>

                                            <div class="column_container column-1_2">
                                                <div class="img_holder">
                                                    <a class="example-image-link" href="{{asset('fronted/yogvillasnew/images/FIRST_FLOOR.png')}}">
                                                        <img class="example-image" src="{{asset('fronted/yogvillasnew/images/FIRST_FLOOR.png')}}" alt="FIRST FLOOR">
                                                    </a>
                                                </div>
                                                <h3>FIRST FLOOR</h3>
                                                <p></p>
                                            </div>

                                            <div class="clearfix"></div>


                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <div class="clearfix"></div>

                            <section class="no-col-padding columns-stretch content-middle" id="price">
                                <div class="plan_pt">
                                    <div class="container">
                                        <div class="row">
                                            <a class="sc_anchor sc_anchor_default" title="" data-icon="icon-floor" data-url=""></a>
                                            <div class="sc_content sc_content_default">
                                                {{--<h6 class="sc_item_subtitle sc_content_subtitle sc_align_center sc_item_title_style_shadow">05</h6>
                                                <h2 class="sc_item_title sc_content_title sc_align_center sc_item_title_style_shadow">Our Price</h2>--}}
                                                <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default">Our Price</h6>
                                            </div>

                                            <div class="column_container">
                                                <div class="img_holder">
                                                    <a class="example-image-link" href="{{asset('fronted/yogvillasnew/images/yogvilla-price-list.png')}}">
                                                        <img class="example-image" src="{{asset('fronted/yogvillasnew/images/yogvilla-price-list.png')}}" alt="PRICE LIST">
                                                    </a>
                                                </div>
                                                {{--<h3>PRICE LIST</h3>--}}
                                                <p></p>
                                            </div>

                                            <div class="clearfix"></div>


                                        </div>
                                    </div>
                                </div>
                            </section>


                            <section class="no-col-padding columns-stretch content-middle" id="gallery">
                                <div class="container">
                                    <div class="row"><a id="sc_anchor_film" class="sc_anchor sc_anchor_default" title="Lifestyle films" data-icon="icon-video-2" data-url=""></a>
                                        <div class="columns_wrap">
                                            <div class="column_container column-1_1">
                                                <div class="column-inner">
                                                    <div class="height_medium"></div>
                                                    <div class="sc_content sc_content_default">
                                                        <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default">Our Gallery</h6>
                                                    </div>
                                                    <div class="height_tiny"></div>
                                                    <div id="slider_video" class="widget_area sc_widget_slider">
                                                        <aside id="slider_video_widget" class="widget widget_slider">
                                                            <div class="slider_wrap slider_engine_swiper">
                                                                <div id="slider_video_outer" class="slider_swiper_outer slider_style_modern slider_outer_controls slider_outer_controls_side slider_outer_nopagination slider_outer_titles_outside slider_outer_one">
                                                                    <div id="slider_video_swiper" class="slider_swiper swiper-slider-container slider_height_auto slider_controls slider_controls_side slider_nopagination slider_titles_outside slider_one mh430" data-ratio="1170:658" data-interval="10000" data-effect="slide" data-pagination="fraction" data-slides-per-view="1" data-slides-space="0">
                                                                        <div class="swiper-wrapper">
                                                                            <div class="swiper-slide slider_image_1" data-image="fronted/img/yog-galley1.jpg" data-cats="Interior" data-title="Apartments presentation">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot;  frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_2" data-image="fronted/img/yog-galley2.jpg" data-cats="Life style" data-title="Visualizing Complex">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot;  frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_3" data-image="fronted/img/yog-galley3.jpg" data-cats="Environment" data-title="Building progress">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;560&quot; height=&quot;315&quot;  frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_4" data-image="fronted/img/yog-galley4.jpg" data-cats="Progress" data-title="Interior views">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot; frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_5" data-image="fronted/img/yog-galley5.jpg" data-cats="Progress" data-title="Interior views">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot; frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_6" data-image="fronted/img/yog-galley6.jpg" data-cats="Interior" data-title="Apartments presentation">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot;  frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_7" data-image="fronted/img/yog-galley7.jpg" data-cats="Life style" data-title="Visualizing Complex">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot;  frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_8" data-image="fronted/img/yog-galley8.jpg" data-cats="Environment" data-title="Building progress">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;560&quot; height=&quot;315&quot;  frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_9" data-image="fronted/img/yog-galley9.jpg" data-cats="Progress" data-title="Interior views">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot; frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-slide slider_image_10" data-image="fronted/img/yog-galley10.jpg" data-cats="Progress" data-title="Interior views">
                                                                                <div class="trx_addons_video_player with_cover hover_play">
                                                                                    <div class="video_mask"></div>
                                                                                    {{--<div class="video_hover" data-video="&lt;iframe width=&quot;1170&quot; height=&quot;658&quot; frameborder=&quot;0&quot; allowfullscreen&gt;"></div>--}}
                                                                                    <div class="video_embed video_frame"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--<div class="slider_titles_outside_wrap">
                                                                        <div class="slide_info slide_info_small">
                                                                            <h3 class="slide_title">Apartments presentation</h3>
                                                                            <div class="slide_cats">Interior</div>
                                                                        </div>
                                                                        <div class="slide_info slide_info_small">
                                                                            <h3 class="slide_title"><a href="#">Visualizing Complex</a></h3>
                                                                            <div class="slide_cats">Life style</div>
                                                                        </div>
                                                                        <div class="slide_info slide_info_small">
                                                                            <h3 class="slide_title">Building progress</h3>
                                                                            <div class="slide_cats">Environment</div>
                                                                        </div>
                                                                        <div class="slide_info slide_info_small">
                                                                            <h3 class="slide_title">Interior views</h3>
                                                                            <div class="slide_cats">Progress</div>
                                                                        </div>
                                                                    </div>--}}
                                                                    <div class="slider_controls_wrap"><a class="slider_prev swiper-button-prev" href="#"> <span class="slider_controls_label"> <span>Prev</span>  </span> </a> <a class="slider_next swiper-button-next" href="#"> <span class="slider_controls_label"> <span>Next</span>  </span> </a></div>
                                                                </div>
                                                            </div>
                                                        </aside>
                                                    </div>
                                                    <div class="height_medium"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{--<section class="no-col-padding no-row-margin scheme_dark" style="background:#f2f3f7;">
                                <div class="container">
                                    <div class="row">
                                        <div class="columns_wrap">
                                            <div class="column_container column-1_1">
                                                <div class="column-inner ph10p">
                                                    <div class="height_small"></div>
                                                    <div id="slider_controller_2070836693" class="sc_slider_controller sc_slider_controller_thumbs" data-slider-id="slider_video" data-style="thumbs" data-controls="0" data-interval="0" data-effect="slide" data-slides-per-view="4" data-slides-space="20" data-height="100px"></div>
                                                    <div class="height_small"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>--}}


                            <section class="full-height-section no-col-padding columns-stretch content-middle bg_image_4 scheme_dark" id="location">
                                <div class="container">

                                    <br>
                                    <br>

                                    <div class="sc_content sc_content_default">
                                        <h6 class="sc_item_subtitle sc_promo_subtitle sc_align_default sc_item_title_style_default">Location Map</h6>
                                        {{--<h2 class="sc_item_title sc_content_title sc_align_center sc_item_title_style_shadow">Location Map </h2>--}}
                                    </div>


                                    <div class="location">
                                        <div class="container">
                                            <div class="left">
                                                <img src="fronted/yogvillasnew/images/yogvills-map.jpg" alt="map">
                                                <a href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7681.723157246499!2d73.95784075818182!3d15.705496380897662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd46454c000a383ca!2sAxis+Blues!5e0!3m2!1sen!2sin!4v1563515704419!5m2!1sen!2sin" class="explore-google-map-btn cboxElement" data-event-category="Section" data-event-action="Click"
                                                   data-event-name="Explore Google Maps">Explore Google Maps</a>
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
                                </div>
                            </section>


                        </div>
                    </article>
                </div>
            </div>


        </div>
        <!-- BEGIN FOOTER -->
    @include('frontend.axisbluesfooter')
    <!-- END FOOTER -->
    </div>
    <div id="page_preloader">
        <div class="preloader_wrap preloader_square">
            <div class="preloader_square1"></div>
            <div class="preloader_square2"></div>
        </div>
    </div>

    <a href="#" class="trx_addons_scroll_to_top trx_addons_icon-up" title="Scroll to top"></a>


    <!-- <script type='text/javascript' src='fronted/yogvillasnew/js/vendor/jquery-2.2.4.min.js'></script>  -->
    <script type='text/javascript' src='fronted/yogvillasnew/js/vendor/jquery-migrate.min.js' defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/revslider/public/assets/js/jquery.themepunch.tools.min.js" defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/revslider/public/assets/js/jquery.themepunch.revolution.min.js" defer></script>
    <!--<script src="js/custom/lightbox-plus-jquery.min.js"></script>-->
	
    <!-- <script type='text/javascript' src='fronted/yogvillasnew/js/vendor/_packed.js' defer></script>  -->
    <script type='text/javascript' src='fronted/yogvillasnew/js/vendor/_packed.min.js' defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/hotspot/js/jquery.tooltipster.min.js" defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/hotspot/js/script.min.js" defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/mediaelement/mediaelement-and-player.min.js" defer></script>
	
	
    <!-- <script type="text/javascript" src="fronted/yogvillasnew/js/custom/_utils.js" defer></script> -->
    <script type="text/javascript" src="fronted/yogvillasnew/js/custom/_utils.min.js" defer></script>
    <!-- <script type="text/javascript" src="fronted/yogvillasnew/js/custom/_main.js" defer></script>  -->
    <script type="text/javascript" src="fronted/yogvillasnew/js/custom/_main.min.js" defer></script>
    <!-- <script type="text/javascript" src="fronted/yogvillasnew/js/custom/shortcodes.js" defer></script> -->
    <script type="text/javascript" src="fronted/yogvillasnew/js/custom/shortcodes.min.js" defer></script>
    <!-- <script type="text/javascript" src="fronted/yogvillasnew/js/custom/_init.js" defer></script>  -->
    <script type="text/javascript" src="fronted/yogvillasnew/js/custom/_init.min.js" defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js" defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/revslider/public/assets/js/extensions/revolution.extension.actions.min.js" defer></script>
    <script type="text/javascript" src="fronted/yogvillasnew/js/vendor/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js" defer></script>
    <!-- <script src="fronted/yogvillasnew/js/vendor/navigation.js" defer></script> -->
    <script src="fronted/yogvillasnew/js/vendor/navigation.min.js" defer></script>
    <script type="text/javascript" src="/fronted/js/yogvillas_new/jquery.bxslider.min.js" defer></script>
    <script type="text/javascript" src="/fronted/js/yogvillas_new/jquery.colorbox-min.js" defer></script>
	
    <script type="text/javascript" defer>
        $(".slider_next swiper-button-next").click(function (e) {
            e.preventDefault();

            var position = $($(this).attr("href")).offset().top;

            $("body, html").animate({
                scrollTop: position
            } /* speed */);
        });


        $(function () {
            winHt = $(window).height();
            winWd = $(window).width();

            $('.menu_test ul li a').on('click', function () {

                $('.menu_test ul li a.active').removeClass('active');
                $(this).addClass('active');
            });


            $('.explore-google-map-btn').colorbox({fixed: true, iframe: true, width: (winWd < 768) ? '90%' : '75%', height: (winWd < 768) ? '75%' : '75%'});

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
    </body>
@stop