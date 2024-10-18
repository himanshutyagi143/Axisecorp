 <script src="/fronted/js/jquery-2.2.3.min.js"></script> 
		
		
		
<link rel="stylesheet" type="text/css" href="/script/flip/css/flipbook.style.css">
<link rel="stylesheet" type="text/css" href="/script/flip/css/font-awesome.css">
<script src="/script/flip/js/flipbook.min.js"></script>
{{--
<div class="main" id="innerpage">
<!-- banner -->
	<div class="banner">
			<!--Slider-->
			@include('frontend.profile.upper_link')
				
				
				
				<div id="demo-2" data-zs-src='["/fronted/images/2.jpg"]' data-zs-overlay="dots">
		<div class="demo-inner-content">
			   <div class="baner-info">
			   @if(isset($data))
				  <h3>{{$data->templet_name}}</h3>
			  @else
          <h3> No Record found</h3>
			  @endif
			   </div>	
		</div>
    </div>
		<!--//Slider-->
					
	</div>
<!-- //banner -->
	</div>
	
	 @if(isset($data))
	<div class="contact" id="contact">
		<div class="container">
		
		
         <div class="agileits_w3layouts_contact">
		  @if(Session::has('success-msg'))
                            <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                        @endif
				
				
				{!!$data->description!!}
				
			</div>

		</div>
	</div>
			


@endif--}}	




	<div class="contact" id="contact">
		<div class="container">
		
         <div class="agileits_w3layouts_contact" height="1000px">
		  

<script type="text/javascript">

    $(document).ready(function () {
        $("#gfdg").flipBook({
           pdfUrl:"/{{$file_name}}.pdf",
         // pageWidth: "1800px",
        });

    })
</script>


<div class="contact" id="contact">
		
<div id="gfdg" >
   
</div>

</div>
</div>

		</div>
	</div>

