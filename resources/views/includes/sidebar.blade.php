<?php
$routesegment = \Request::segment(1)??"";
if($routesegment == 'kncz'){
    $routesegment = 'kncj';
}
$sidebartxt = [
    "about-us" => "About Us",
    "our-team" => "Our TEAM",
    "our-vision" => "Our Vision / Mission",
    "corporate-philosophy" => "Corporate Philosophy",
    "blogdetails" => "Blog Details",
    "blogs" => "BLOG",
    "news" => "NEWS",
    "career" => "career",
    "newsdetails" => "News Details",
    "contact" => "CONTACT",
    "disclaimer" => "DISCLAIMER",
    "privacy-policy" => "PRIVACY POLICY",
    "termandcondition" => "TERMS AND CONDITION",
    "subscribe-website" => "Subscribe NOW",
    "channel-partner-register" => "Become a Channel Partner",
    "axisblues" => [["VIBRANT AND COMFORTING HOMES ", "ENTERTAINMENT NON – STOP"], ["WELCOME TO SMART LIVING", "AMIDST NATURE'S PARADISE"], ["THE FUTURE DESTINATION", "PERFECT CORPORATE GETAWAY"]],
    "villas-in-goa" => [["MODERN VILLA IN THE HEART OF NATURE", ""],
        ["Nature Living Live Your Life, A Quality Life", ""],
        ["MODERN VILLA IN THE HEART OF NATURE", ""]],
    "lakecity" => [["WELCOME TO LAKE CITY", ""],
        ["A Himalayan Gateway Holiday Resorts", ""],
        ["WELCOME TO LAKE CITY", ""]],
    "kncj" => [["KAN CHEN JUNGA", "AN AXIS ECORP UPCOMING PROJECT"], ["KAN CHEN JUNGA ", "AMIDST NATURE'S PARADISE"], ["KAN CHEN JUNGA", "AN AXIS ECORP UPCOMING PROJECT"]],
    "lakecityplaza" => [["AXIS lake city plaza", ""], ["AXIS lake city plaza ", ""], ["AXIS lake city plaza", ""]],
];

$projectimages = [
    "axisblues" => ["axis-blues-banner1.jpg", "axis-blues-banner2.jpg", "axis-blues-banner3.jpg"],
    "villas-in-goa" => ["yogvillas-banner1.jpg", "yogvillas-banner2.jpg", "yogvillas-banner3.jpg"],
    "kncj" => ["kncj-banner3.jpg", "kncj-banner1.jpg", "kncj-banner2.jpg"],
    "lakecity" => ["lakecity-banner.jpg", "lakecity-banner2.jpg", "lakecity-banner3.jpg"],
    "lakecityplaza" => ["lakecityplaza-bannr.jpg", "lakecityplaza-bannr2.jpg", "lakecityplaza-bannr3.jpg"],

];
if ($routesegment == 'blogdetails' || $routesegment == 'blogs') {
    $mainclass = 'main-blog bg-blog';
} elseif ($routesegment == 'news' || $routesegment == 'newsdetails') {
    $mainclass = 'main-blog bg-news';
} elseif ($routesegment == 'contact') {
    $mainclass = 'main-contacts bg-contacts';
} elseif ($routesegment == 'disclaimer' || $routesegment == 'privacy-policy' || $routesegment == 'termandcondition') {
    $mainclass = 'main-projects bg-projects';
}elseif ($routesegment == 'yogvilla-payment') {
    $mainclass = 'bg-yogvilla-payment';
}elseif($routesegment == 'career'){
    $mainclass = 'bg-career';
}elseif($routesegment == 'channel-partner-register'){
    $mainclass = 'bg-channel-partner';
}else{
    $mainclass = 'bg-about';
}
?>
@if(empty($routesegment))
    {{-- *********** HOME PAGE SIDEBAR ************* --}}
    <main class="main">
        <div class="arrow-left"></div>
        <div class="arrow-right"></div>
        <div class="rev_slider_wrapper">
            <div id="rev_slider" class="rev_slider fullscreenbanner">
                <ul>
                    <li data-transition="slotzoom-horizontal" data-slotamount="7" data-masterspeed="1000"
                        data-fsmasterspeed="1000">
                        <img src="/frontend/img/home/slide1.jpg" alt="slide1.jpg"
                             data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                             class="rev-slidebg">
                        <div class="slide-title tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['-18','0','-18','-18']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['-35','-35', '-25']" data-fontsize="['50','45', '35']"
                             data-lineheight="['80','75', '65']" data-width="['1100','700','1000']" data-height="none"
                             data-whitespace="normal" data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500"
                             data-splitin="chars" data-splitout="none" data-responsive_offset="on"
                             data-elementdelay="0.05">
                            EXPERIENCE GOAN <br>RESORT LIVING
                        </div>
                        <div class="slide-subtitle tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['75','150']" data-fontsize="['18']" data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none">Revel in Goa's serene vibe-enjoy the peaceful coastal climate,<br>
                            unique food, and local delights from your holiday home.
                        </div>
                        <div class="tp-caption caption_ipad" data-x="['right','right','right','right']"
                             data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['195','250','340','250']" data-width="none" data-height="none"
                             data-whitespace="nowrap" data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                             data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);"
                             data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;"
                             data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_out="x:inherit;y:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none" data-responsive_offset="on"><a href="/villas-in-goa"
                                                                                 class="btn js-target-scroll">Look more
                                <i class="icon-next"></i></a></div>
                    </li>
                    <li data-transition="slotzoom-horizontal" data-slotamount="7" data-masterspeed="1000"
                        data-fsmasterspeed="1000">
                        <img src="/frontend/img/home/slide2.jpg" alt="slide2.jpg"
                             data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                             class="rev-slidebg">
                        <div class="slide-title tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['-18','0','-18','-18']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['-35','-35', '-25']" data-fontsize="['50','45', '35']"
                             data-lineheight="['80','75', '65']" data-width="['1100','700','1000']" data-height="none"
                             data-whitespace="normal" data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500"
                             data-splitin="chars" data-splitout="none" data-responsive_offset="on"
                             data-elementdelay="0.05">
                            CREATIVE FUTURE <br>READY HOMES
                        </div>
                        <div class="slide-subtitle tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['75','150']" data-fontsize="['18']" data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none">From the highest standards of sustainable living to <br>
                            smart homes that operate at the click of a button,<br>
                            Axis Ecorp projects are built to house the future of India.
                        </div>
                        <div class="tp-caption caption_ipad" data-x="['right','right','right','right']"
                             data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['195','250','340','250']" data-width="none" data-height="none"
                             data-whitespace="nowrap" data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                             data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);"
                             data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;"
                             data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_out="x:inherit;y:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none" data-responsive_offset="on"><a href="/villas-in-goa"
                                                                                 class="btn js-target-scroll">Look more
                                <i class="icon-next"></i></a></div>
                    </li>
                    <li data-transition="slotzoom-horizontal" data-slotamount="7" data-easein="Power3.easeInOut"
                        data-easeout="Power3.easeInOut" data-masterspeed="1000">
                        <img src="/frontend/img/home/slide3.jpg" alt="slide3.jpg"
                             data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                             class="rev-slidebg">
                        <div class="slide-title tp-caption tp-resizeme" data-x="['right','right','left','left']"
                             data-hoffset="['-18','0','-18','-18']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['-35','-35', '-25']" data-fontsize="['50','45', '35']"
                             data-lineheight="['80','75', '65']" data-width="['1000','700','1000']" data-height="none"
                             data-whitespace="normal" data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500"
                             data-splitin="chars" data-splitout="none" data-responsive_offset="on"
                             data-elementdelay="0.05"> GOLF, GO-KART, <br> GO-GOA!
                        </div>
                        <div class="slide-subtitle tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['75','150']" data-fontsize="['18']" data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none">Cinebox, concert hall, helipad, health club, luxury spa,landscaped<br> lawns – 
                            welcome to the architecture of the new generation.
                        </div>
                        <div class="tp-caption caption_ipad" data-x="['right','right','right','right']"
                             data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['195','250','340','250']" data-width="none" data-height="none"
                             data-whitespace="nowrap" data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                             data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);"
                             data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;"
                             data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_out="x:inherit;y:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none" data-responsive_offset="on" style="z-index: 8;"><a href="/villas-in-goa"
                                                                                                     class="btn js-target-scroll">Look
                                more <i class="icon-next"></i></a></div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@elseif($routesegment == 'axisblues' || $routesegment == 'villas-in-goa' || $routesegment == 'kncj' || $routesegment == 'lakecity' || $routesegment == 'lakecityplaza')
    {{-- *********** PROJECT PAGE SIDEBAR ************* --}}
    <main class="main" id="home">
        <div class="arrow-left"></div>
        <div class="arrow-right"></div>
        <div class="rev_slider_wrapper">
            <div id="rev_slider" class="rev_slider fullscreenbanner">
                <ul>
                    <li data-transition="slotzoom-horizontal" data-slotamount="7" data-masterspeed="1000"
                        data-fsmasterspeed="1000">
                        @if(array_key_exists($routesegment, $projectimages)) 
                            <img src="{{ URL::asset('frontend/img/projects/'.$routesegment.'/banner/'.$projectimages[$routesegment][0]) }}"
                                 alt="axisecorp porjects" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                 class="rev-slidebg">
                        @endif
                        <div class="slide-title tp-caption tp-resizeme" data-x="['right','right','left','left']"
                             data-hoffset="['-18','-5','-18','-18']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['-35','-35', '-25']" data-fontsize="['50','45', '35']"
                             data-lineheight="['80','75', '65']" data-width="['1100','700','1000']" data-height="none"
                             data-whitespace="normal" data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500"
                             data-splitin="chars" data-splitout="none" data-responsive_offset="on"
                             data-elementdelay="0.05">
                            @if(array_key_exists($routesegment, $sidebartxt))
                                {{ $sidebartxt[$routesegment][0][0] }}
                            @endif
                        </div>
                        <div class="slide-subtitle tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['75','105']" data-fontsize="['18']" data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none">
                            @if(array_key_exists($routesegment, $sidebartxt))
                                {{ $sidebartxt[$routesegment][0][1] }}
                            @endif </div>
                    </li>
                    <li data-transition="slotzoom-horizontal" data-slotamount="7" data-masterspeed="1000"
                        data-fsmasterspeed="1000">
                        @if(array_key_exists($routesegment, $projectimages))
                            <img src="{{ URL::asset('frontend/img/projects/'.$routesegment.'/banner/'.$projectimages[$routesegment][1]) }}"
                                 alt="axisecorp porjects" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                 class="rev-slidebg">
                        @endif
                        <div class="slide-title tp-caption tp-resizeme" data-x="['right','right','left','left']"
                             data-hoffset="['-18','-5','-18','-18']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['-35','-35', '-25']" data-fontsize="['50','45', '35']"
                             data-lineheight="['80','75', '65']" data-width="['1100','700','1000']" data-height="none"
                             data-whitespace="normal" data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500"
                             data-splitin="chars" data-splitout="none" data-responsive_offset="on"
                             data-elementdelay="0.05">
                            @if(array_key_exists($routesegment, $sidebartxt))
                                {{ $sidebartxt[$routesegment][1][0] }}
                            @endif
                        </div>
                        <div class="slide-subtitle tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['75','105']" data-fontsize="['18']" data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none">
                            @if(array_key_exists($routesegment, $sidebartxt))
                                {{ $sidebartxt[$routesegment][1][1] }}
                            @endif
                        </div>
                    </li>
                    <li data-transition="slotzoom-horizontal" data-slotamount="7" data-easein="Power3.easeInOut"
                        data-easeout="Power3.easeInOut" data-masterspeed="1000">
                        @if(array_key_exists($routesegment, $projectimages))
                            <img src="{{ URL::asset('frontend/img/projects/'.$routesegment.'/banner/'.$projectimages[$routesegment][2]) }}"
                                 alt="axisecorp porjects" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                 class="rev-slidebg">
                        @endif
                        <div class="slide-title tp-caption tp-resizeme" data-x="['right','right','left','left']"
                             data-hoffset="['-18','-5','-18','-18']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['-35','-35', '-25']" data-fontsize="['50','45', '35']"
                             data-lineheight="['80','75', '65']" data-width="['1100','700','1000']" data-height="none"
                             data-whitespace="normal" data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500"
                             data-splitin="chars" data-splitout="none" data-responsive_offset="on"
                             data-elementdelay="0.05">
                            @if(array_key_exists($routesegment, $sidebartxt))
                                {{ $sidebartxt[$routesegment][2][0] }}
                            @endif
                        </div>
                        <div class="slide-subtitle tp-caption tp-resizeme" data-x="['right','right','right','right']"
                             data-hoffset="['0']" data-y="['middle','middle','middle','middle']"
                             data-voffset="['75','105']" data-fontsize="['18']" data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-splitin="none"
                             data-splitout="none">
                            @if(array_key_exists($routesegment, $sidebartxt))
                                {{ $sidebartxt[$routesegment][2][1] }}
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@else
    {{-- *********** ABOUTUS PAGES SIDEBAR ************* --}}
    <main class="main main-inner {{ $mainclass }}" data-stellar-background-ratio="0.6">
        <div class="container">
            <header class="main-header">
                @if(array_key_exists($routesegment, $sidebartxt))
                    <h1>{{ $sidebartxt[$routesegment] }}</h1>
                @endif
            </header>
        </div>
        <div class="page-lines">
            <div class="container">
                <div class="col-line col-xs-4">
                    <div class="line"></div>
                </div>
                <div class="col-line col-xs-4">
                    <div class="line"></div>
                </div>
                <div class="col-line col-xs-4">
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </main>
@endif