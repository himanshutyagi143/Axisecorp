<div class="header">
   <div class="container">
      <div class="row">
         <div class="col-lg-2 col-sm-2 col-xs-2">
            <div class="header_btn">
               @if($_SERVER['REQUEST_URI']=='/caseorchid')
               <div class="logo"><img src="https://casaweb.org/wp-content/uploads/2015/12/logo@2x.png" style="width:127px;"  /></div>
               @else
               <div class="logo"><a href="http://www.axisecorp.com"><img src="/fronted/img/logo-white.png" alt="Axis e-Corp Logo"/></a></div>
               @endif
            </div>
         </div>
         <div class="col-lg-10 col-sm-10 col-xs-10 nav_panel">
            <nav class="overlay-menu ">
               
               <ul>
               @if(Request::segment(1) != "veryifyotp_for_booking" && Request::segment(1) != "veryifyUnit_for_booking")
                  <li @if(Request::segment(1)=='') class="active" @endif><a href="/">Home</a></li>
                  <li @if(Request::segment(1)=='aboutus') class="active" @endif><a href="/aboutus">About </a></li>
                  <li @if(Request::segment(1)=='axisblues') class="active" @endif><a href="/axisblues">Smart Suites </a></li>
                  <!--li @if(Request::segment(1)=='caseorchid') class="active" @endif><a href="/caseorchid">Villas </a></li-->
                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Corporate<span class="fa fa-angle-down arrow-down"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/corporate" >Corporate philosophy</a></li>
                        <li><a href="/vision" >Vision / Mission</a></li>
                        <li><a href="/team">Our team</a></li>
                     </ul>
                  </li>
                  <li @if(Request::segment(1)=='contact') class="active" @endif ><a  href="/contact">Contact</a></li>  
				  <li><a  href="/outer_user_payment">Pay Now</a></li>
                  <!-- <li data-toggle="modal" data-target="#myModal"><a >Sign In</a></li> -->
                  @endif
               </ul>

            </nav>
            <div class="button_container" id="toggle" style="z-index:1111; display:none;" >
               <img src="/fronted/img/menu.png" alt="Menu Button">
            </div>
         </div>
      </div>
   </div>
   @if($_SERVER['REQUEST_URI']=='/caseorchid' || $_SERVER['REQUEST_URI']=='/axisblues')
   <div class="w3l-grids-about">
      <div class="w3_navigation">
         <div class="container">
            <nav class="navbar navbar-default">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                  <nav class="cl-effect-1" id="cl-effect-1">
                     <ul class="nav navbar-nav">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        <li><a data-toggle="tab" href="#location" class="scroll hvr-bounce-to-bottom">Location</a></li>
                        <li><a data-toggle="tab" href="#specifications" class="scroll hvr-bounce-to-bottom">Specifications</a></li>
                        <li><a data-toggle="tab" href="#amenities" class="scroll hvr-bounce-to-bottom">Amenities</a></li>
                        <li><a data-toggle="tab" href="#floorplans" class="scroll hvr-bounce-to-bottom">Floor Plans</a></li>
                        <li><a data-toggle="tab" href="#layout" class="scroll hvr-bounce-to-bottom">Layout</a></li>
                        <li><a data-toggle="tab" href="#pricelist" class="scroll hvr-bounce-to-bottom">Price List</a></li>
                     </ul>
                  </nav>
               </div>
               <!-- /.navbar-collapse -->
            </nav>
         </div>
      </div>
   </div>
   @endif
   
   <div class="clearfix"></div>
</div>
