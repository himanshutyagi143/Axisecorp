<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Axis Blues Avenue</title>
<link href="{{ URL::asset('frontend/axisbluesavenue/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid top_banner">
		<div class="container" style="padding: 80px 0;">
			
			<div class="container cont_box">
			<div class="row" style="text-align: center">
				<img src="{{ URL::asset('frontend/axisbluesavenue/images/logo.png') }}" width="180" alt="">
			</div>
				
				
				
			<div class="row form_title">
			<div class="title_one">
				<p><span class="title_onetext">LIMITED INVENTORY AVAILABLE</span></p>
			</div>
			<div class="title_two">
				<p><span class="title_twotext">SHOW YOUR INTERESTED</span></p>
			</div>
		</div>
			
			
					
		<div class="row" >
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
  			<form class="form-horizontal" method="post"   action="{{url('avenuecontactus')}}"   >
			 <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    			<div class="form-group">
      				<div class="col-sm-12">
        				<input type="text" class="form-control" id="name" placeholder="Enter Name*" name="name" required>
      				</div>
    			</div>
    			<div class="form-group">
      				<div class="col-sm-12">          
        				<input type="tel" class="form-control" id="phone" placeholder="Enter Phone*" name="tel" required>
     				</div>
    			</div>
    			<div class="form-group">        
      				<div class="col-sm-12">          
        				<input type="email" class="form-control" id="email" placeholder="Enter Email*" name="email" required>
     				</div>
    			</div>
				<div class="form-group">        
      				<div class="col-sm-12">          
 						 <select class="form-control" id="sel1" name="size" required>
							<option disabled selected >Select plot size</option>
    						<option value="Plot size between 150-180 Sq. Mtr.  @ ₹ 35 Lakhs">Plot size between 150-180 Sq. Mtr.  @ ₹ 35 Lakhs</option>
   							 <option value="Plot size between 180-220 Sq. Mtr @ ₹ 40 Lakhs">Plot size between 180-220 Sq. Mtr @ ₹ 40 Lakhs</option>
    
  							</select>
     				</div>
    			</div>
    			<div class="form-group">        
     				<div class="col-sm-offset-5 col-sm-12">
        				<button type="submit" name="submit" class="btn btn-default bt" style="background-color: #1f2f62; color:#fff;">I am Interested</button>
      				</div>
    			</div>
  			</form>
			</div>
			<div class="col-sm-2"></div>
		</div>
			
			
			<div class="row" style="text-align: center">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="or" style="color: #1f2f62;">OR</div>
					<div class="numb" style="color: #1f2f62;" >Call <a href="tel:8070004400" style="color: #1f2f62;">+91 807 000 4400</a> </div>
				</div>
				<div class="col-sm-2"></div>
			</div>
			
			
		</div>
	</div>


</body>
</html>

