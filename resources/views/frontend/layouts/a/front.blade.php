<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
	<meta name="google-site-verification" content="Ij9ooIjLm1U9dCp-Zp_WfBn5hpPcyKtqiCDOO-MQZNU" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="/fronted/img/favicon.png" type="image/x-icon">
    
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    @if(Request::segment(1)=='aboutus')

        <title>About | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp is diversifies into real estate & hospitality venture after successful execution in education and technology."/>
        <link rel="canonical" href="https://axisecorp.com/aboutus">
    @elseif(Request::segment(2)=='videodetail')
        @yield('meta')
    @elseif(Request::segment(1)=='vision')

        <title>Vision | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp's vision is creating landmarks, setting benchmarks, building trust, meeting the expectations of our consumers to build long-lasting relationships."/>
        <link rel="canonical" href="https://axisecorp.com/vision">

    @elseif(Request::segment(1)=='industries')

        <title>Industries | Axis ecorp</title>
        <meta name="keywords" content="real estate industry residential project commercial project"/>
        <meta name="description" content="Axis ecorp is successful service provider in education & technology industries. Now we are focusing on real estate industries like smart hotel suites, residential & commercial projects."/>
        <link rel="canonical" href="https://axisecorp.com/industries">

    @elseif(Request::segment(1)=='about')
        <title>About Us | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp is Goa’s real estate and corporate services providing company. check here about our world class educational campus and excellent corporate services."/>
        <link rel="canonical" href=" https://axisecorp.com/about ">

    @elseif(Request::segment(1)=='terms-and-condition')

        <title>Terms and Condition | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp's terms & conditions for property sales of villas & bunglows in Goa."/>
        <link rel="canonical" href=" https://axisecorp.com/terms_and_condition">

    @elseif(Request::segment(1)=='corporate')

        <title>Devloped to Deliver Incomparable Corporate Services | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp is the commercial developers who understand our corporate responsibility with governance & ethics, customer relation, CSR and social responsibility, marketplace."/>
        <link rel="canonical" href="https://axisecorp.com/corporate">
        
    @elseif(Request::segment(1)=='axisblues')
        <title>Axis Blues | Smart Suites and Luxury Villas in Goa</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis Blues provides luxury villas and smart suites in Goa with neo-modern architecture that will bring the world class facilities under a single roof."/>
        <link rel="canonical" href=" https://axisecorp.com/axisblues">

    @elseif(Request::segment(1)=='yogvillas')
        <title>Yog Villas - Vacation Homes | Luxury villas in North Goa</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Looking For Resort in North goa? Explore Luxury Yog Villas accentuated by nature and replete with all modern comforts & conveniences."/>
        <link rel="canonical" href="https://axisecorp.com/yogvillas">

    @elseif(Request::segment(1)=='service')

        <title>Real Estate Services | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp provides you the variety of best services in Real estate. We offer you the perfect mixture of Eco-luxury natural living and modern comfort."/>
        <link rel="canonical" href="https://axisecorp.com/service">

    @elseif(Request::segment(1)=='contact')

        <title>Contact Us | Axis Ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Click here and Connect with us to know more about Axis ecorp - one of the leading Real Estate Builder and Developer in Goa."/>
        <link rel="canonical" href="https://axisecorp.com/contact">

    @elseif(Request::segment(1)=='team')

        <title>Professional Team | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Our team's professional and efficient approach helps you to find the solution of each query you face. We bring your Dream Home to Reality."/>
        <link rel="canonical" href="https://axisecorp.com/team">

    @elseif(Request::segment(1)=='privacy-policy')

        <title>Privacy Policy | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Your privacy is our priority. Click here to know how the Privacy Policy governs the manner in which Axis ecorp collects and uses your information."/>
        <link rel="canonical" href="https://axisecorp.com/privacy_policy">

    @elseif(Request::segment(1)=='sitemap')

        <title>Sitemap | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Axis ecorp sitemap navigates us through corporate website. Offering residential projects like luxury villas and bungalows in Goa for sale."/>
        <link rel="canonical" href="https://axisecorp.com/sitemap">

    @elseif(Request::segment(1)=='news')

   {{-- <title>In the News | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Explore whats trending in the real estate market."/>
        <link rel="canonical" href="http://axisecorp.com/news"> --}}
        @yield('meta')
    @elseif(Request::segment(1)=='faq')

        <title>FAQ's | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="Click here and check out the FAQs before purchasing property in Goa."/>
        <link rel="canonical" href="https://axisecorp.com/faq">

    @elseif(Request::segment(1)=='blogs')
      @yield('meta')
    @elseif(Request::segment(1)=='outer-user-payment')

		  <title>User Payment | Axis E-Corp</title>
		  <meta name="keywords" content=""/>
      <meta name="description" content="Fill up the contact details and check out Payment information"/>
      
    @else
        <title>Axis ecorp | Real Estate Developers in Goa</title>
        <meta name="keywords" content="luxury villas in goa bungalows in goa Smart suites in goa"/>
        <meta name="description" content="Axis ecorp is the best real estate developers in Goa. We build luxury villas, bungalows and smart suites with world class ameneties and harmonios ecosystem."/>
        <link rel="canonical" href="https://axisecorp.com/">
    @endif

    <meta name="author" content="https://axisecorp.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">

    <!-- Blog lightbox Style -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/lightbox.min.css') }}">
    
    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/colors/color1.css') }}" id="colors">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/select3.css') }}" id="colors">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/fronted/img/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/icon/apple-touch-icon-158-precomposed.png">

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->


    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158339719-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158339719-1');
</script>
    
    
    
    <script type="application/ld+json" defer>
      {
        "@context": "http://schema.org",
        "@type": "HomeAndConstructionBusiness",
        "additionalType":"Real Estate Developer",
       "name": "Axis Blues",
       "url": "http://axisecorp.com/", 
       "email": "info@eejak.com",
        "image": "/fronted/img/slider5.jpg",
        "logo": "/fronted/img/logo1.png",
       "description": "Axis Blues is the perfect combination of nature with neo-modern architecture that will bring the world class amenities under a single roof. We aim to build luxury villas and bungalows with modern comfort and also provide best eco-luxury properties in Goa.",
        "openingHours": "Monday to Saturday - 09:00AM to 06:00PM",
        "priceRange": "N/A",
        
      "address":
      [
       {
          "@type": "PostalAddress",
          "addressLocality": "maner dodamarg",
          "addressRegion": "Maharashtra",
          "postalCode": "416512",
          "streetAddress": "Yog Resort, Yog City, maner dodamarg",
          "addressCountry": "India",
          "telephone": "08178585634"   
        },
        {
          "@type": "PostalAddress",
          "addressLocality": "Patto Plaza",
          "addressRegion": "Panjim",
          "streetAddress": "305, Gera Imperium Grand, Patto Plaza",
          "addressCountry": "India",
          "telephone": "09044334334"  
        }
      ],
         "geo": 
      [   {
          "@type": "GeoCoordinates",
          "latitude": "15.713967",
          "longitude": "73.980942"
        },
       {
          "@type": "GeoCoordinates",
          "latitude": "15.495602",
          "longitude": "73.833639"
        }
        ]
      }
    </script>

    @yield('extra_css')

</head>

<body class="@yield('body_class')">

  <div  class="animsition">
    <div id="page" class="clearfix">
      @include('frontend.layouts.header')
      @yield('content')
      @include('frontend.layouts.footer')
    </div><!-- /#page -->
  </div><!-- /#wrapper -->

  <a id="scroll-top"></a>

  <!-- Javascript -->
  {{--<script src="{{ URL::asset('assets/js/jquery-simple-lightbox.js') }}"></script>
  <script type="javascript">
      $('#basic').simpleLightbox();
  </script>--}}
  <script src="{{ URL::asset('assets/js/lightbox-plus-jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/plugins.js') }}"></script>
  <script src="{{ URL::asset('assets/js/tether.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/animsition.js') }}"></script>
  <script src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/countto.js') }}"></script>
  <script src="{{ URL::asset('assets/js/equalize.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.isotope.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/owl.carousel2.thumbs.js') }}"></script>

  <script src="{{ URL::asset('assets/js/jquery.cookie.js') }}"></script>
  <script src="{{ URL::asset('assets/js/gmap3.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script>
  <script src="{{ URL::asset('assets/js/shortcodes.js') }}"></script>
  @yield('extra_jquery_validate')
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

  <!-- Revolution Slider -->
  <script src="{{ URL::asset('rev-slider/js/jquery.themepunch.tools.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/rev-slider.js') }}"></script>
  <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->  
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
  <script src="{{ URL::asset('rev-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/select2/select2.full.js') }}"></script>

  <!--// Alertify -->

  <link href="/alertify/css/alertify.css" rel="stylesheet" type="text/css"/>
  <script src="/alertify/alertify.min.js" type="text/javascript"></script>
  <script>alertify.set('notifier','position', 'top-right');</script>

  <!-- Script for instagram post in footer -->
    <!-- <script type="text/javascript">
      $(document).ready(function(){       
            var username = "axisecorp";
            var max_num_items = 6;

            var jqxhr = $.ajax( "https://www.instagram.com/"+username+"/?__a=1" ).done(function() {
                //alert( "success" );
            }).fail(function() {
                //alert( "error" );
            }).always(function(data) {
                //alert( "complete" )
                items = data.graphql.user.edge_owner_to_timeline_media.edges;
                $.each(items, function(n, item) {
                    if( (n+1) <= max_num_items )
                    {
                        var data_li = "<div class='instagram_badge_image has-effect-icon'>"+
                            "<a target='_blank' class='data-effect-item' href='https://www.instagram.com/p/"+item.node.shortcode+"'>"+
                            "<span class='item'>"+
                                "<img src='" + item.node.thumbnail_src + "' alt='Image'>"+
                            "</span>"+
                            "<div class='overlay-effect bg-color-2'></div>"+
                            "<div class='elm-link'>"+
                                "<span class='icon-3'></span>"+
                            "</div>"+
                            "</a></div>";    
                        $("#instagram_post").append(data_li);
                    }
                });
            });
        });
    </script> -->
  <!-- Script for instagram post in footer -->

  @yield('extra_js')
  
  <!-- START PAGE JS SCRIPT -->
  @yield('page-script')
  <!-- END PAGE JS SCRIPT -->
</body>
</html>
