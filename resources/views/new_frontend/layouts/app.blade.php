<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="https://axisecorp.com">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="-1"/>
    <meta name="google-site-verification" content="Ij9ooIjLm1U9dCp-Zp_WfBn5hpPcyKtqiCDOO-MQZNU"/>
    <meta name="facebook-domain-verification" content="2w7hkf1fw93d5gfve67n7ilaq8zvzy" />
    <meta name="csrf-token" content="fFgsqGeieEPSAktbHt420KhYXL1nmc3q32c567kA"/>
    <link rel="shortcut icon" href="{{ URL::asset('frontend/img/others/favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="{{ URL::asset('frontend/css/flashy.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/lightbox/lity.min.css') }}" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="{{ URL::asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">      
    <link href="{{ URL::asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/animate.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/hover.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/magnific-popup.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/owl.transitions.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/settings.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/layers.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/navigation.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/style.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('frontend/css/intlTelInput.min.css') }}" rel="stylesheet" media="screen">
	
	
	
	
	
	<link href="{{ URL::asset('frontend/css/slick-theme.css') }}" rel="stylesheet" media="screen">
	<link href="{{ URL::asset('frontend/css/slick.css') }}" rel="stylesheet" media="screen">
    <script src="{{ URL::asset('frontend/js/slick.js') }}" type="text/javascript" charset="utf-8"></script>
	
	

    @if(Request::segment(1)=='our-vision')

        <title>Our Vision | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Axis ecorp's vision is creating landmarks, setting benchmarks, building trust, meeting the expectations of our consumers to build long-lasting relationships."/>
        <link rel="canonical" href="https://axisecorp.com/our-vision">
    @elseif(Request::segment(1)=='about-us')
        <title>About Us | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Axis ecorp is Goa’s real estate and corporate services providing company. check here about our world class educational campus and excellent corporate services."/>
        <link rel="canonical" href=" https://axisecorp.com/about-us ">
    @elseif(Request::segment(1)=='terms-and-condition')

        <title>Terms and Condition | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Axis ecorp's terms & conditions for property sales of villas & bunglows in Goa."/>
        <link rel="canonical" href=" https://axisecorp.com/terms_and_condition">
    @elseif(Request::segment(1)=='corporate-philosophy')

        <title>Developed to Deliver Incomparable Corporate Services | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Axis ecorp is the commercial developers who understand our corporate responsibility with governance & ethics, customer relation, CSR and social responsibility, marketplace."/>
        <link rel="canonical" href="https://axisecorp.com/corporate-philosophy">

    @elseif(Request::segment(1)=='axisblues')
        <title>Top Holiday Homes | luxury Resorts in Goa & Apartment for Sale</title>
        <meta name="keywords"
              content="Luxury resorts in goa, Apartment for sale in goa, Holiday homes in goa, Property for sale in north goa, Luxury serviced apartments in goa, Luxury flats for sale in north goa, Resort destination in goa, Luxury resorts for sale in goa, Multiple outdoor activities in goa"/>
        <meta name="description"
              content="Axis Blues offer Holiday homes in Goa. We provide Smart Suites, Second home, luxury resorts destination, Luxury flats, Luxury serviced apartments, Multiple outdoor activities, and Property for sale in north Goa with Neo-modern Architecture Properties that will Bring World-class Facilities under a Single Roof."/>
        <link rel="canonical" href=" https://axisecorp.com/axisblues">

    @elseif(Request::segment(1)=='villas-in-goa')
        <title>Villa in Goa for Sale – Luxury Villas in north Goa with Private Pool</title>
        <meta name="keywords"
              content="Villas in Goa, Villa in Goa, Luxury villas in Goa, Villa in Goa for sale, Luxury villas in north Goa, Buy villa in Goa, Villa for sale in north Goa, villas in north goa with private pool, Vacation homes in Goa, Best luxury villas in north Goa, Luxury vacation homes, 2 bhk villa for sale in goa, Holiday homes in north Goa, fully serviced villa in goa"/>
        <meta name="description"
              content="Axis Yog Villas Offer fully serviced 2 bhk luxury villa for sale in north Goa. We provide Top Holiday homes and Luxury vacation homes in Goa. This Villas Project is perfect fit for you checkout our discounted best deal for your holiday in Goa and Book Now today!"/>
        <link rel="canonical" href="https://axisecorp.com/villas-in-goa">

    @elseif(Request::segment(1)=='lakecity')
        <title>Independent House Property for Sale in Goa | Buy Plots & Land</title>
        <meta name="keywords"
              content="Property for sale in goa, House for sale in goa, Independent house for sale in Goa, Goa holiday homes, Land for sale in Goa, Plots for sale in north Goa, property investment in goa, Commercial plots in Goa, Investment above 50 lakh in Goa, Buying a holiday homes"/>
        <meta name="description"
              content="When it comes to property investment in Goa. Axis Lake City Offer Top residential and commercial Properties. Plots or Lands are available for sale in North Goa starting from INR 25 lakhs to 10 crores. A golden opportunity to build your dream home the way you like it."/>
        <link rel="canonical" href="https://axisecorp.com/lakecity">
    @elseif(Request::segment(1)=='lakecityplaza')
        <title>Invest in Commercial Real Estate | Commercial Properties for Sale in Goa</title>
        <meta name="keywords"
              content="Invest in commercial real estate, Commercial property buyers, Shop for sale near me, Commercial shops in Goa, Commercial properties for sale in Goa, Retail shops in Goa, Commercial shop in Goa, Shops for rent in north Goa, Food court space in Goa, Commercial shop Dodamarg, Commercial shop Sindhudurg, Commercial space in Goa, Rental Investment in shops"/>
        <meta name="description"
              content="Axis Lake City Plaza offer you Commercial space in Goa for Rental Investment in shops. Commercial property buyers and those taking it on lease will get good visibility and footfalls. The complex also offers all the amenities that the business requires. Space available for Retail shops, Food court space in Goa."/>
        <link rel="canonical" href="https://axisecorp.com/lakecityplaza">

    @elseif(Request::segment(1)=='kncz')
        <title>Holiday Homes in Darjeeling | Best Sun View Indoor Pool | Party Zone</title>
        <meta name="keywords"
              content="Top Holiday homes, Holiday homes in Darjeeling, Party zone in Darjeeling, Best sun view indoor pool, Multiple outdoor activities in Darjeeling"/>
        <meta name="description"
              content="Axis the KNCZ offering the best holiday homes. We provide you party zone in Darjeeling and best sun view indoor pool. Axis KNCZ allows users to enjoy the best premium resort living experience and multiple outdoor activities in Darjeeling in West Bengal with international designs."/>
        <link rel="canonical" href="https://axisecorp.com/kncz">

    @elseif(Request::segment(1)=='contact')

        <title>Contact Us | Axis Ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Click here and Connect with us to know more about Axis ecorp - one of the leading Real Estate Builder and Developer in Goa."/>
        <link rel="canonical" href="https://axisecorp.com/contact">

    @elseif(Request::segment(1)=='our-team')

        <title>Our Team | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Our team's professional and efficient approach helps you to find the solution of each query you face. We bring your Dream Home to Reality."/>
        <link rel="canonical" href="https://axisecorp.com/our-team">

    @elseif(Request::segment(1)=='privacy-policy')

        <title>Privacy Policy | Axis ecorp</title>
        <meta name="keywords" content="axisecorp privacy, axisecorp policy"/>
        <meta name="description"
              content="Your privacy is our priority. Click here to know how the Privacy Policy governs the manner in which Axis ecorp collects and uses your information."/>
        <link rel="canonical" href="https://axisecorp.com/privacy_policy">

    @elseif(Request::segment(1)=='sitemap')

        <title>Sitemap | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Axis ecorp sitemap navigates us through corporate website. Offering residential projects like luxury villas and bungalows in Goa for sale."/>
        <link rel="canonical" href="https://axisecorp.com/sitemap">

    @elseif(Request::segment(1)=='blogs' || Request::segment(1)=='news' )
        @yield('meta')
    @else
        <title>Reputed Builder & Real Estate Developers in Goa | Axis Ecorp</title>
        <meta name="keywords" content="Real Estate Developers in Goa, Property Developers in Goa, Real Estate Promoters in Goa, Reputed Builders in Goa, Reputed developers of Goa, Top Real Estate Developers in Goa"/>
        <meta name="description"
              content="Axis ecorp is the top real estate developers in Goa. We are the best or trusted Real-Estate Property Promoter of Goa. Axis group builds luxury villas, bungalows, and smart suites with world-class amenities and harmonious ecosystem."/>
        <link rel="canonical" href="https://axisecorp.com/">
    @endif
<!-- Global site tag (gtag.js) - Google Analytics -->
    {{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139163292-2" defer></script>
    <script type="text/javascript" defer>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-139163292-2');
    </script>--}}
    {{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158339719-1"></script>
    <script type="text/javascript" defer>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-158339719-1');
    </script>--}}
	
	

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W6S3PFC');</script>
    <!-- End Google Tag Manager -->

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '294495282277899');
        fbq('track', 'PageView');
    </script>
	
     <script>
        window.oncontextmenu = function () {
            console.log("Right Click Disabled");
            return false;
        }
    </script>
	
	
	
	
	
	
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=294495282277899&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->



    <meta name="google-site-verification" content="iPG2usz9lO-1_0nYQibYM2tG2tykII9Lpfpm31VEBVg"/>
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
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6S3PFC"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@yield('content')
</body>
</html>