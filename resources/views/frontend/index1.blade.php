@extends('frontend.master')
@extends('frontend.master')

@section('content')
<style>
#fp-nav{
display:none;}
.fp-viewing-0{
height:100vh !Important;}

.desclamer{    position: fixed;
    bottom: 0px;

}
.header_img{
margin-top: 10px;
}
.banner-box img{
width:50%;}
</style>
 <link href="/fronted/css/jquery.fullPage.css " rel="stylesheet" type="text/css" media="all" />

    <div id="fullpage">
        <div class="section" id="section0">
		
            <div class="homescreen">
                <div class="container">
                    <div class="row">
                        <div class="header_img">
                            <div class="container">
                                <div class="box-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="banner-box">
											<img style="display: block;  margin-left: auto;  margin-right: auto;" src="/fronted/img/popup_img1.jpg">

                                                <div class="banner-text text-center ">
														<span> Live Lake Live </span>
                                                    <h3 style="">Invest in Luxury.</h3>
                                                    <h3 style="">Live in Nature.</h3>
                                                    <button type="button" id="popupvideo"  data-toggle="modal" data-target="#myModal5" class="video_action">Explore  More</button>
														
                                                </div>
												<img class="scrolldown" src="/fronted/img/scrolldown.gif">
                                            </div>
                                        </div>
                                      
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				  <div class="desclamer" >
        					<div class="min-fotter ">
					<div class="col-md-12 ">
					    <p><span> ©</span> 2019 Eejak Holdings | All Rights Reserved. </p>
					
					</div>
					</div>
                </div> 
        </div>
   
 
	
	


        
    
        
   
						  

   <div id="myModal5" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg"> 
    
   <!-- Modal content--> 
     <div class="modal-content" > 
      
         <div class="modal-body welcome_popup1"> 
		 <button type="button" class="close" data-dismiss="modal">&times;</button>
		
           <div class="page-content"> 
		  <video class="video-fluid z-depth-1" autoplay loop controls muted>
  <source src="https://mdbootstrap.com/img/video/Sail-Away.mp4" type="video/mp4" />
</video>
 </div>
  </div> 
        
    </div> 
      
    </div> 
   </div> 

   
<div class="fixed_cookes" >
<span>This website  uses cookies to ensure you get the best experience on our website</span>
<button class="c_btn">Got It!</button>
</div>
<button type="button" id="welcome_popup" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4" style="display:none">Open Modal</button>
 
<!-- <div id="myModal4" class="modal fade" role="dialog"> -->
   <!-- <div class="modal-dialog ">  -->
    
   <!-- <!-- Modal content-->  -->
     <!-- <div class="modal-content" >  -->
      
         <!-- <div class="modal-body welcome_popup1">  -->
		 <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
		
           <!-- <div class="page-content">  -->
		  <!-- <img src="/fronted/img/popup_img1.jpg"/ style="width:100%;">  -->
 <!-- </div> -->
  <!-- </div>  -->
        
    <!-- </div>  -->
      
    <!-- </div>  -->
   <!-- </div>  -->
<script>
$(window).load(function(){
$('#welcome_popup').trigger('click');

});


</script>
@stop
