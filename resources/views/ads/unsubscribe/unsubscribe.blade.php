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
      
      
   </head>
   <body>
  
      
      <div class="container-wcp">
         <div class="banner_section">
            <div class="thankyou_main">
               <div class="item">
                  <img src="https://realestatesandbox.s3.ap-south-1.amazonaws.com/frontend/axisecorp_images/home/slide1.jpg" alt="">
                  <div class="container-wcp">
                     <div class="thankyou">
                        @if($status == 1)
                        <img src="{{ URL::asset('frontend/yogvillas/wcp/images/right.jpg') }}" alt="YOGVILLAS">
                        @endif
                        <h3 class="@if($status == 0) alert alert-danger @endif">{{ $message }}</h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="logo_outer" style="left: 3%;top: 27px; position: absolute;">
              <img src="https://axisecorp.com/frontend/img/others/logo.png" alt="">
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
      
   </body>
</html>