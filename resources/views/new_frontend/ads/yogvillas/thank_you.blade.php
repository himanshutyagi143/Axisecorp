<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>WELCOME TO THE GOAN RESORT LIVING</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
      <link href="{{ URL::asset('frontend/yogvillas/wcp/css/owl.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="{{ URL::asset('frontend/css/intlTelInput.min.css') }}" rel="stylesheet" media="screen">
      <link href="{{ URL::asset('frontend/yogvillas/wcp/css/custom.css') }}" rel="stylesheet">
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
      <noscript><img height="1" width="1" style="display:none"
                     src="https://www.facebook.com/tr?id=294495282277899&ev=PageView&noscript=1"
         /></noscript>
      <!-- End Facebook Pixel Code -->
   </head>
   <body>
   <script>
       fbq('track', 'Lead');
   </script>
      <!-- Google Tag Manager (noscript) -->
   <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6S3PFC"
                     height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   <!-- End Google Tag Manager (noscript) -->
      <div class="container-wcp">
         {{--
         <div class="heding2">
            <h1>WELCOME TO THE GOAN RESORT LIVING</h1>
            <p>ESSENCE OF THE NATURE & PREMIUM SMART VILLAS</p>
         </div>
         --}}
         <div class="banner_section">
            <div class="thankyou_main">
               <div class="item">
                  <img src="{{ URL::asset('frontend/yogvillas/wcp/images/banner-1.jpg') }}" alt="">
                  <div class="container-wcp">
                     <div class="thankyou">
                        <img src="{{ URL::asset('frontend/yogvillas/wcp/images/right.jpg') }}" alt="YOGVILLAS">
                        <h2>Thank You!</h2>
                        <p>Our team will contact you shortly.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="logo_outer">
               <div class="logo"><img src="{{ URL::asset('frontend/yogvillas/wcp/images/logo.png') }}" alt="YOGVILLAS"></div>
               <div class="rotate"><img src="{{ URL::asset('frontend/yogvillas/wcp/images/rotate.png') }}" id="round"></div>
               <!--<div class="price"><img src="frontend/yogvillas/wcp/images/price.png"></div>-->
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      <script src="{{ URL::asset('frontend/yogvillas/wcp/js/owl.js') }}"></script>
      <script src="{{ URL::asset('frontend/yogvillas/wcp/js/custom.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/interface.min.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/lightbox/lity.min.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/intlTelInput.min.js') }}"></script>
      <script src="{{ URL::asset('frontend/js/intlTelInput-jquery.min.js') }}"></script>
      <script type="text/javascript">
         $(document).ready(function(){
            setTimeout(function(){ 
                  window.location.replace('/yogvillas'); 
               }, 5000);
         });
      </script>
   </body>
</html>