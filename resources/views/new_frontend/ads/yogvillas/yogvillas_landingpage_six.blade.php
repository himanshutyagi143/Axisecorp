<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Axis YOG VILLAS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/solido.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/isotope.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/vegas/jquery.vegas.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/superslides-0.6.2/dist/stylesheets/superslides.css') }}">

    <!-- Colors Style -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/css/color/green.css') }}">

    <script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/vendor/modernizr-2.6.2.min.js') }}"></script>
    <!--<script src="http://fast.fonts.net/jsapi/3dca1e78-579f-4502-8da9-3eb91453e0dc.js"></script>-->

    <script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/webshim/1.14.5/polyfiller.js') }}"></script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W6S3PFC');</script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6S3PFC" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="mask">
    <div class="loader">
        <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/loader.gif') }}" alt='loading'>
    </div>
</div>
<div class="fixed-logo" id="logo"><a href="#" title="Writer's Village"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/logo.png') }}" class="wv-logo"></a>
</div>
<div class="color-picker" style="display:none;">
    <div class="picker-btn"></div>
    <div class="pickerTitle">Style Switcher</div>
    <div class="pwrapper">
        <div class="pickersubTitle">Layout Selector</div>
        <div class="light-version"><img title="" alt='img' src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/light.jpg') }}"></div>
        <div class="dark-version"><img title="" alt='img' src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/dark.jpg') }}"></div>
        <div class="pickersubTitle"> Color scheme</div>
        <div class="picker-blue"></div>
        <div class="picker-black"></div>
        <div class="picker-green"></div>
        <div class="picker-yellow"></div>
        <div class="picker-red"></div>
        <div class="picker-purple"></div>
        <div class="picker-turquoise"></div>
        <div class="picker-orange"></div>
        <div class="clear nopick"></div>
    </div>
</div>


<div id="home1"></div>


{{--<div id="slides-1">--}}
<div>
    <div class="overlay"></div>
    <div class="slides-container">
        <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/slider/slider05.jpg') }}" alt="Writer's Village">
       
       
    </div>
</div>

<div class="main-title" id="">
    <div class="title-container">
        <div class="welcome">Welcome to</div>
        <div>
            <ul>
                <li style="line-height: 0.7em; margin-top:20px;" class="t-current">Axis Yog Villas</li>

            </ul>
        </div>
        <div class="clear"></div>
        <div class="second-title" style="font-style: italic;">Modern Villa In The Heart Of Nature</div>

        <div class="spacer"></div>

        <div class="second-title">The Best Luxury Villas in North of Goa</div>
        <a href="#concept">
            <div class="buy-logo">Explore<span></span></div>
        </a>
    </div>
</div>



<div class="top-form" id="top-form-link">
<div id="contact_form">
    <div class="title one no-top">Expression of Interest</div>
    <div style="font-size: 14px;color: #404141;text-transform: uppercase;text-align: center;width: 100%; font-weight: 600;margin-top: -10px">
        Please enter your details below.<br><br></div>
    <div class="spacer"></div>
    <br>
    <form method="post" id="contact-popup" class="peThemeContactForm js-ajax-form contact_form">
        <input type="hidden" name="srd_id" id="srd_id" value="60fa639ec82561094f07deba">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div id="personal" class="bay form-horizontal">
            <div class="control-group"><!--name field-->
                <div class="controls">
                    <input class="span9" required="" type="text" name="txtName" placeholder="Name *" data-fieldid="0" title="Name" onclick="if(this.value=='Your Name') this.value=''" onblur="if(this.value=='') this.value='Your Name'">
                </div>
            </div>
            <div class="control-group"><!--email field-->
                <div class="controls">
                    <input class="span9" name="txtEmail" required="" placeholder="Email *" data-fieldid="1" title="Your Email" onclick="if(this.value=='Your Email') this.value=''" onblur="if(this.value=='') this.value='Email'">
                </div>
            </div>
            <div class="control-group"><!--phone field-->
                <div class="controls">
                    <input class="span9" id="telephone2" name="txtPhone" required="" placeholder="phone *" data-fieldid="2" title="Phone Number" onclick="if(this.value=='Your Phone Number') this.value=''" onblur="if(this.value=='') this.value='Your Phone Number'">
                    <input type="hidden" name="page_reference" value="yogvillas_landingpage_six">
                </div>
            </div>
                        <div class="control-group"><!--message field-->
                <div class="controls">
                    <textarea name="txtMsg" id="textmsg" placeholder="Message" rows="12" class="span9" data-fieldid="6" style="height:50px;" onclick="if(this.value=='Message') this.value=''">Message</textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls send-btn">
                    <button type="submit" class="contour-btn red submit_contact">Send Message</button>
                </div>
            </div>
        </div>
        <div class="notifications">
            <div id="contactFormSent" class="formSent-popup alert alert-success" style="display: none;">
                <strong>Your Message Has Been Sent!</strong> Thank you for contacting us.
            </div>
                    </div>
    </form>
</div>
</div>


<div class="fixedContainer" ><a href="#top-form-link" class="scrollup" title="Register Your Expression of Interest here"><img
src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/eoi-icon-02.png') }}" class="register"></a></div>


<div id="logx"></div>
<header class="header">
    <div class="logo" style="padding-top:5px;display:none;"><a href="#home1"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/logo.png') }}"
                                                                                  class="wv-logo"></a></div>
    <nav id="nav2" role="navigation">
        <a class="jump-menu" title="Show navigation">Show navigation</a>
        <ul>
            <li class="current"><a href="#home1">home</a></li>
            <li><a href="#concept">The Concept</a></li>
            <li><a href="#key_elements">Key Elements</a></li>
            <li><a href="#company">About us</a>
            <li><a href="#maps">Location</a></li>
            <li><a href="#contact">Contact us</a></li>

            </li>
        </ul>
    </nav>
    <nav class="menu">
        <ul id="nav">
            <li class="current"><a href="#home1">home</a></li>
            <li><a href="#concept">The Concept</a></li>
            <li><a href="#key_elements">Key Elements</a></li>
            <li><a href="#company">About us</a>
            <li><a href="#maps">Location</a></li>
            <li><a href="#contact">Contact us</a></li>
        </ul>
    </nav>
</header>
<article id="concept" class="content light menu-top">
    <header class="title one">The Concept</header>
    <div class="spacer"></div>
    <div class="title two">
        <p><i><b>There’s a whole world out there, right outside your window. You’d be a fool to miss it. —Charlotte
                    Eriksson</b></i></p>
        <p style="text-align:justify;">In our fast paced life, it is easy to lose track of the time, to forget the
            things that matter and be absorbed in what is in front of us. However, thispandemic has made everyone to
            pause and rethink of the priorities in their life. Is this the life that we want? Are we really happy with
            the house that we have built for ourselves? Do we enjoying being in the city where we are unable to get any
            fresh air?</p>
        <p style="text-align:justify;">Most people have realised during this time that it is not about staying in a
            stunning house that has plush interiors adequate anymore. It is equally important to be around the nature.
            People miss waking up to fresh air and sight of greenery all around.It is about time of make your dreams
            come true. </p>

        <p style="text-align:justify;">With Axis Yog Villas you get this and more. You can enjoy the best of Goan resort
            living in a house that is straight out of your dreams. It is a second home that is premium, smart,
            comfortable and luxuriant. Our aim is simple: we want your every holiday to be incomparable and
            unforgettable.
        </p>


        <p style="text-align:justify;">From the magnificent ambience to the surrounding beauty of the Konkan belt with
            its forts and natural history, Axis Yog Villas is designed for those who want a taste of royalty. Using a
            design language inherited from European clustered town configurations, the villas are crafted to offer
            clutter-free clean living with expansive spaces and a contemporary feel.
        </p>

        <p style="text-align:justify;">We want you to enjoy the open design of the seamless windows that bring the
            outdoors as close as possible to you, while the elevation ensures that the hustle and bustle of the streets
            are nothing more than twinkling lights for you to watch at night.
        </p>


        <p style="text-align:justify;"><strong>Key features of Axis Yog Villas</strong>
        <ul style="text-align:left;">
            <li>Own your dream home in the lap of the nature</li>
            <li>Experience a healthy lifestyle and community living</li>
            <li>State of the art health club, a full-service gym, luxury spa and yoga centre</li>
            <li>Enjoy all the modern day amenities that have become an integral part of our life</li>
            <li>Fully serviced apartments</li>
            <li>Option to earn rental income</li>
        </ul>

    </div>
</article>


<div class="clear"></div>

<article id="cottage" class="content dark menu-top">
    <div class="full">
        <header class="title one">Welcoming The Privileged</header>
        <div class="spacer"></div>
        <br> <br>
        <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/cottage.jpg') }}" alt="small house" style="width:100%;height:auto;">
        <div class="title two nathure" style="text-align:justify;">
            <p>Our endeavour behind venturing into Axis Yog Villas was simple. We wanted you to enjoy the best of both
                worlds. Most people look forward to spending time in the nature. They want to live by the sea or wake up
                to see the mighty mountains. However, this meant giving up on the luxuries of life and being away from
                the civilization. </p>
            <p>With Axis Yog Villas you can best of both the worlds. You can wake up to crisp clean air and enjoy all
                the comforts that the technology has to offer. The idea is to make you live your dream life without any
                compromise. In fact, we want to take away all your hassles so you can enjoy every moment doing what you
                enjoy. Our world-class housekeeping makes sure that you spend not a single minute of your time in
                maintaining this picturesque property. </p>
        </div>

    </div>
</article>

<article id="key_elements" class="content menu-top light" style="padding-top: 20px;">
    <section class="featured-slider">
        <div id="ca-container" class="ca-container">

            <div class="full">
                <header class="title one">Key Elements</header>
                <div class="spacer"></div>

            </div>

            <div class="title two">


                <div class="key_elements">
                    <div class="left">
                        <div class="image_holder">
                            <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/lifestyle/thumb/micro-farm.jpg') }}" alt="#">
                        </div>
                    </div>
                    <div class="right">

                        <div class="cont">
                            <h3>Live by the nature</h3>
                            <p>Nestled in the lap of nature, Axis Yog Villas is a perfect home away from home. People
                                have realised how important it is to be surrounded by nature. Better job opportunities,
                                more places to go for a party, a better standard of living, being well connected with
                                the peer circle and an exhilarating life pace are some of the advantages that the city
                                life offer. However, people have realised that while these are important but they are
                                not enough. </p>

                            <div id="flip">Read More +</div>
                            <div class="panel">
                                <p>People have started missing simple pleasures like walking in the garden. They have
                                    realised the importance of being close to nature. This has led to a distinct uptick
                                    in the demand for luxury second homes and villas with a private pool and garden area
                                    so you can enjoy your favourite activities in a safe and smart way. Axis Yog Villas
                                    is a project that is made keeping all this in mind.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="key_elements">
                    <div class="left">
                        <div class="cont">
                            <h3>Live your dream</h3>
                            <p>With Axis Yog Villas you not only get a sprawling villas surrounded by lush greenery but
                                also offers top-notch amenities like private pools and gardens, 24/7 housekeeping
                                services, and a concierge desk to take care of every need a homeowner could ever
                                have. </p>

                            <div id="flip2">Read More +</div>
                            <div class="panel2">
                                <p> In our fast pace life and patience levels are usually running low. Moreover, when on
                                    a holiday, people want to spend their time to relaxing, enjoying and rejuvenating.
                                    It is with this exact that thought that Axis Yog Villas was conceived. You will not
                                    be required to spend even a minute of your time or your energy in maintain this
                                    home. As a matter of fact, from the moment you land at this place, you can just get
                                    into the holiday zone as it will be completely ready and well stocked to make you
                                    feel completely at ease.
                                </p>
                                <p>It is second home on which you can count on to offer you complete privacy, safety,
                                    and luxury </p>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="image_holder">
                            <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/lifestyle/thumb/bonfire.jpg') }}" alt="#">
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="key_elements">
                    <div class="left">
                        <div class="image_holder">
                            <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/lifestyle/thumb/yoga.jpg') }}" alt="#">
                        </div>
                    </div>
                    <div class="right">
                        <div class="cont">
                            <h3>Rental income</h3>
                            <p>Not only you get to enjoy the best that the life has to offer with Axis Yog Villas but it
                                can also earn for you. Since this property is built on a commercially approved land in
                                the tourism capital of the country, you can easily rent it out to fellow travellers when
                                not in personal use. </p>


                            <div id="flip3">Read More +</div>
                            <div class="panel3">
                                <p>It is this feature of this property that makes it a real asset. Most people in India,
                                    still invest in real estate as they feel that it is a great asset and will give good
                                    appreciation over a period of time. With Axis Yog Villas, one does not have to wait
                                    for a time frame for this property to give returns as you can start earning rental
                                    income right from the time you buy it. Not just this, the project is strategically
                                    located and offers great appreciation value in the months and years to come.
                                </p>
                            </div>


                        </div>
                    </div>
                    <div class="clear"></div>
                </div>


            </div>


        </div>
    </section>
</article>

<div class="clear"></div>


<article id="permaculture" class="content dark">
    <div class="full">
        <header class="title one">Not just a second home</header>
        <div class="spacer"></div>
        <!--                 <div class="title two">
                            <h3>Simple Living</h3>
                            <p><i><b>"The greatest fine art of the future will be the making of a comfortable living from a small piece of land." ~ Abraham Lincoln</b></i></p>
                        </div> -->
        <div class="title two" style="text-align:justify;">

            <p>Gone are the days when owning a second home or a holiday home was only for the affluent class.It has now
                become more of an aspiration. After slogging it out in a corporate job, people look forward to a break.
                They want to have getaway to place that is a home away from a home. </p>
            <p>It is not just a retreat where one can go to rejuvenate but also a investment in your future. In
                addition, with a property like Axis Yog Villas one does not have to spend time and energy in maintaining
                it. It is all taken care at a nominal cost so that the patrons can enjoy the best that the life has to
                offer. </p>
            <p>Additionally, it is one asset that will pay off for itself over the years as you have the flexibility to
                rent it out at your convenience when it is not in use. </p>


            <p>Here are some of the reasons why one should invest in Axis Yog Villas:</p>

            <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/permaculture.png') }}" alt="Permaculture"
                 style="float: right; margin-left: 10px;max-width:400px;width:100%;height:auto;">

            <ul style="text-align:left;">
                <li>Freehold property</li>
                <li>Low cost of acquisition</li>
                <li>Generate Rental Income via Airbnb.com, Booking.com, Homeaway.com etc.</li>
                <li>Low cost of maintenance</li>
                <li>Secured</li>
                <li>Property Management</li>
                <li>Rent Management</li>
                <li>Concierge</li>
                <li>Housekeeping</li>
                <li>Yoga Centre</li>
                <li>Health care</li>
                <li>Go Carting</li>
                <li>Helipad</li>
                <li>Badminton, Tennis and Basketball court</li>
                <li>Private Cinebox</li>
            </ul>


        </div>
        <div id="ca-container" class="ca-container">

        </div>
    </div>
</article>

<div class="clear"></div>


<article id="company" class="content light">
    <div class="full" style="padding-top:50px;">

        <section>

            <div class="title one no-top">Axis Yog Villas</div>
            <div class="spacer"></div>
            <div class="title two" style="text-align:justify;">

                Inspired by European clustered-town designs, Axis Yog Villas offers smart vacation villas in Goa
                accentuated by nature and replete with all modern comforts and convenience. Every home at Axis Yog
                Villas presents a distinct flavour from contemporary chic to effervescent glamour — take your pick of
                the best luxury serviced apartments in Goa.

                <p>Axis Yog Villas are designed with your convenience in mind — from every service offered within these
                    luxury villas in Goa to the project’s close proximity to the new MOPA airport. By owning Axis Yog
                    Villas, luxury villas in Goa, you have the best of all worlds.
                </p>

                <p>Axis Yog Villas is a RERA certified project designed with the best-in-class standards of premium
                    smart services with centralised concierge desks, intuitive 24/7 housekeeping, and end-to-end
                    property management for your convenience.
                </p>

                <p>Stay in the lap of luxury and elegance in these luxury serviced apartments in Goa. These
                    fully-serviced villas are the epitome of sophistication and luxury — the perfect investment to meet
                    your needs when you’re here and when you rent out to travellers.
                </p>


            </div>
        </section>
    </div>
    <div class="clear"></div>
</article>
<div class="clear"></div>


<a href="#" class="scrollup">^</a>
<div id="maps">
    <div class="title two f-bottom">
        <br>
        <div class="title one no-top">Our Location</div>
        <div class="spacer"></div>


        <div class="map_one"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/yogvills-map.jpg') }}"></div>
        <div class="map_two">
            <h2>Connectivity</h2>
            <p></p>

            <div class="detail">
                <h4>Airport</h4>
                <ul>
                    <li>Mopa Airport - 18 Km *</li>
                    <li>Chipi-Parule Airport - 75 Km</li>
                    <li>Dabolim Airport - 70 Km</li>
                    <li>Belgaum Airport - 80 Km</li>
                </ul>
            </div>


            <div class="detail">
                <h4>Sea & Beaches</h4>
                <ul>
                    <li>Mandrem Beach - 36 Km</li>
                    <li>Vagator Beach - 31 Km</li>
                    <li>Calangute Beach - 35 Km</li>
                    <li>Colva Beach - 70 Km</li>
                </ul>
            </div>


            <div class="detail">
                <h4>Railway Station</h4>
                <ul>
                    <li>Thivim - 15 Km</li>
                    <li>Madgaon - 69 Km</li>
                    <li>Kudal - 50 Km</li>
                    <li>Pernem - 25 Km</li>
                </ul>
            </div>


        </div>

        <div class="clear"></div>


        <div class="location_advatage">
            <h3>Location advantage/other Connectivity</h3>

            <p>Apart from the private transport, there are 4 airport within 80KM radius which shall witness for
                your welcome to reach the destination. The Location is also idealy connected via Rail Lines, Road
                Network & Cruise Line also. All these connevtivity will help to grow your investment.
            </p>

            <div class="detail">
                <h4>Road</h4>
                <ul>
                    <li>Well Connected via NH 17</li>
                </ul>
                <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/road.jpg') }}">
            </div>

            <div class="detail">
                <h4>Rail</h4>
                <ul>
                    <li>Thivim 21 Kms</li>
                    <li>Madagaon 69 Kms</li>
                    <li>Kudal 32 Kms</li>
                    <li>Perem 25 Kms</li>
                </ul>
                <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/rail.jpg') }}">
            </div>

            <div class="detail">
                <h4>Sea</h4>
                <ul>
                    <li>Cruise line also started from Mumbai to Goa</li>
                    <li>Sea Part only 40 Kms away from site</li>
                </ul>
                <img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/sea.jpg') }}">
            </div>

            <div class="clear"></div>

        </div>


    </div>
</div>


<footer id="contact" class="footer light">
    <div class="footer-container">
        <div class="title one no-top">Contact</div>
        <div class="spacer"></div>
        <div class="title two f-bottom">We like to create things with fun, like-minded people.<br> Feel free to say
            hello!
        </div>
        <div class="foot-third hideme dontHide">

            <div class="f-title-two">Visit Our Office</div>
            <div class="f-data adress"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/adress-ico.png') }}" alt='img'> Adress:
                <aside style="margin-left:93px;margin-top:-30px;"><span>305, Gera Imperium Grand, <br><span>Patto Plaza, Panaji,</span><br> <span>Goa 403001 (INDIA) </span></span>
                </aside>
            </div>
            <div class="f-data phone"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/phone-ico.png') }}" alt='img'> Phone:
                <aside style="margin-left:87px;margin-top:-30px;"><span>+91 807-000-4400</span></aside>
            </div>
            <div class="f-data e-mail"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/mail-ico.png') }}" alt='img'> Email: <span><a
                            href="mailto:info@axisecorp.com"
                            style="text-decoration: none; color: #a8a8a8;">info@axisecorp.com</a></span></div>
        </div>
        <div class="foot-third hideme dontHide">

            <div class="f-title-two">Business Hours</div>
            <div class="f-data hour-1"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/hours-ico.png') }}" alt='img'> Mon. - Sat. <span>10 am to 6 pm</span>
            </div>
            <!-- <div class="f-data hour-2"><img src="img/hours-ico.png" alt='img'> Sat. <span>8am to 11am</span></div> -->
            <div class="f-data hour-3"><img src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/img/hours-ico.png') }}" alt='img'> Sun. <span>Closed</span></div>
        </div>
        <div class="foot-third hideme dontHide">

            <div class="f-title-two">Please Leave Your Details</div>

            <form method="post" id="contact-form" class="peThemeContactForm js-ajax-form contact_form">
                <input type="hidden" name="srd_id" id="srd_id" value="60fa639ec82561094f07deba">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div id="personal" class="bay form-horizontal">
                    <div class="control-group"><!--name field-->
                        <div class="controls">
                            <input class="span9" required type="text" name="txtName" placeholder="Name *" data-fieldid="0"
                                   title="Your Name"
                                   onclick="if(this.value=='Your Name') this.value=''"
                                   onblur="if(this.value=='') this.value='Your Name'">
                        </div>
                    </div>
                    <div class="control-group"><!--email field-->
                        <div class="controls">
                            <input class="span9" name="txtEmail" required placeholder="Email *" data-fieldid="1"
                                  onclick="if(this.value=='Email') this.value=''"
                                   onblur="if(this.value=='') this.value='Your Email'">
                        </div>
                    </div>
                    <div class="control-group"><!--phone field-->
                        <div class="controls">
                            <input class="span9" id="telephone2" name="txtPhone" required placeholder="phone *" data-fieldid="2"
                                  onclick="if(this.value=='Phone Number') this.value=''"
                                   onblur="if(this.value=='') this.value='Your Phone Number'">
                            <input type="hidden" name="page_reference" value="yogvillas_landingpage_six">
                        </div>
                    </div>
                    {{--<div class="control-group"><!--occupation field-->
                        <div class="controls">
                            <input class="span9" required="true" type="text" name="occupation" data="occupation"
                                   data-fieldid="3" value="Your Occupation / line of work"
                                   onclick="if(this.value=='Your Occupation / line of work') this.value=''"
                                   onblur="if(this.value=='') this.value='Your Occupation / line of work'">
                        </div>
                    </div>--}}

                    <div class="control-group"><!--message field-->
                        <div class="controls">
                            <textarea name="txtMsg" id="textmsg" placeholder="Message" rows="12" class="span9"></textarea>
                        </div>
                    </div>
                    {{--<div class="control-group"><!--reCaptcha field-->
                        <div class="controls">
                            <div class="g-recaptcha" id="captcha-footer" style="margin:0px auto;width:300px;"></div>
                        </div>
                    </div>--}}
                    <div class="control-group">
                        <div class="controls send-btn">
                            <button type="submit" class="contour-btn red submit_contact">Send Message</button>
                        </div>
                    </div>
                </div>
                <div class="notifications">
                    <div id="contactFormSent" class="formSent alert alert-success">
                        <strong>Your Message Has Been Sent!</strong> Thank you for contacting us.
                    </div>
                    {{--<div id="contactFormError" class="formError alert alert-error">
                        <strong>Oops, An error has ocurred!</strong> See the marked fields above to fix the errors.
                    </div>--}}
                </div>
            </form>
        </div>
    </div>
</footer>


<div class="socialFooter">
    <div class="social-icons">
        <div class="social">
            <ul class="social-list">
                <li><a href="https://www.instagram.com/axisecorp/" class="fa fa2 fa-instagram insta"
                       target="_blank"></a></li>
                <li><a href="https://twitter.com/AxisEcorp" class="fa fa5 fa-twitter" target="_blank"></a></li>
                <li><a href="https://www.linkedin.com/company/axis-ecorp/" class="fa fa3 fa-linkedin"
                       target="_blank"></a></li>
                <li><a href="https://www.facebook.com/AxisECorp/" class="fa fa4 fa-facebook" target="_blank"></a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="title two" style="text-align:left;font-size:0.8em;">
        <p>Disclaimer -</p>
        <ul style="padding-left:0px;">
            <li>The sole purpose of this website is to provide information regarding the projects of the company. All
                the information shared on this website which pertains to projects, brochures and marketing collaterals
                is solely for information purposes only. The visitors are advised not to rely purely on the information
                for showing their interest.
            </li>

        </ul>
    </div>
    <div class="copy"> © 2021 Axis Ecorp | All Rights Reserved.</div>
    <br>
</div>

<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/ajax/libs/jquery/1.9.1/jquery.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.smoothwheel.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/main.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.inview.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.sticky.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/caroussel/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/portfolio.js') }}"></script>
<!--<script type="text/javascript" src="js/vegas/jquery.vegas.js"></script>-->
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/superslides-0.6.2/dist/jquery.superslides.js') }}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.hoverdir.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.nav.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/popup/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/caroussel/jquery.contentcarousel.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.isotope.min.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/plugins.js') }}"></script>
<!--<script type="text/javascript" src="js/vegas/vegas_slider.js"></script>-->
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.validate.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/jquery.form.js') }}"></script>
<script src="{{ URL::asset('frontend/yogvillas/yogvillas_landingpage_six/js/test.js') }}"></script>

<!--  // Google reCAPTCHA widget. -->
{{--<script src='recaptcha/api.js?onload=onloadCallback&render=explicit' async="" defer=""></script>
<script type="text/javascript">
    var onloadCallback = function () {
        captcha1 = grecaptcha.render('captcha-footer', {
            'sitekey': '6LcyCCMTAAAAADgb3s67Avw1bd2OQ7Slea5yJIPv'
        });
        captcha2 = grecaptcha.render('captcha-pop-up', {
            'sitekey': '6LcyCCMTAAAAADgb3s67Avw1bd2OQ7Slea5yJIPv'
        });
    };
</script>--}}




<script>
    $(document).ready(function () {
        /*var srd_id = location.search.replace('?','').split('&')[0].replace('srd=','');
        $('#srd_id').val(srd_id);*/
        $("#flip").click(function () {
            $(".panel").slideToggle("slow");
        });
    });


    $(document).ready(function () {
        $("#flip2").click(function () {
            $(".panel2").slideToggle("slow");
        });
    });


    $(document).ready(function () {
        $("#flip3").click(function () {
            $(".panel3").slideToggle("slow");
        });

        $('.contact_form').submit(function(e){
            e.preventDefault();
            $('.submit_contact').text('Sending...');
            $.ajax({
                // headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                url: '/contactus',
                type: 'post',
                data: $(this).serialize(),
                success: function (response) {
                    //console.log(response);
                    if(response.status == 1)
                    {
                        alert(response.msg);
                        $('input[name="txtName"]').val('');
                        $("input[name='txtEmail']").val('');
                        $("input[name='txtPhone']").val('');
                        //$("#textmsg").val('');
                        //$('#yogvilla_landing_modal').modal('hide');
                        //$('#verification_modal').modal({backdrop: 'static', keyboard: false});
                        // $('#verification_modal').modal('show');
                        //$('#sender_email').val(response.email);
                    }else if(response.status == 'error')
                    {
                        alert(response.message.txtPhone);
                    }else{
                        alert(response.msg);
                        //window.location.reload();
                    }

                    $('.submit_contact').text('SEND');
                    // $('.col-message, .success-message').show();
                },
                error: function () {
                    $('.col-message, .error-message').show();
                }
            });
        });
    });


</script>


<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=473582739504511&ev=PageView&noscript=1"></noscript>
</body>
</html>
<script>
    //mixpanel.track("Video play");
</script>
