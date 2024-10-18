<?php
//echo "<pre>"; print_r($userData); die;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>forms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="colorlib.com">

        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="/assets/payform/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
        <link rel="stylesheet" href="/assets/payform/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		
		<!-- Added -->
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Added -->
        
		
		<!-- STYLE CSS -->
        <link href="/assets/payform/css/payform.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/payform/css/slick.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/payform/css/slick-theme.css" rel="stylesheet" type="text/css"/>
		<!--<script src="/assets/payform/js/jquery-3.3.1.min.js"></script>-->
  
        <script src="/assets/payform/js/slick.js"></script>
		<style>
			.pointer {cursor: pointer;}
		</style>
    </head>
    <body>
        <div class="wrapper">
            @include('layouts.errors-and-messages')
            <form action="/unitBookSubmit" id="wizard" class="wizard" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <!-- SECTION 1 -->
                <h4></h4>
                <section id="sectionone" style="display:block;">
                    <h3>User profile</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                First Name
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account"></i>
                                <input type="text" name="first_name" class="form-control" value="@if(isset($userData)){{$userData->first_name}}@endif" required >
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Last Name
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account"></i>
                                <input type="text" name="last_name" class="form-control" value="@if(isset($userData)){{$userData->last_name}}@endif" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Email ID
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-email"></i>
                                <input type="email"  class="form-control" value="@if(isset($userData)){{$userData->email}}@endif" disabled >
                                <input type="hidden" name="email" class="form-control" value="@if(isset($userData)){{$userData->email}}@endif"  required>
                            </div>
                        </div>
						<div class="form-col">
                            <label for="">
                                Password
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-lock"></i>
                                <input type="text" name="password" class="form-control" value=""  required>
                            </div>
                        </div>
                        

                    </div>
                    <div class="form-row">
					
						<div class="form-col">
                            <label for="">
                                Contact Number
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-phone"></i>
                                <input type="text" name="phone" class="form-control" value="@if(isset($userData)){{$userData->phone}}@endif" required>
							</div>
                        </div>
						<div class="form-col">
                            <label for="">
                                Pincode
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin"></i>
                                <input type="text" name="zip" class="form-control" id="pincode" onchange="getPinCodeData(this.value)" value="@if(isset($userData)){{$userData->zip}}@endif" required>
                            </div>
							<p style="display:none;" id="invailid_code"><i><i class="fa fa-warning"></i>Invailid Pincode</i></p>
                        </div>
						
                        
                        
                    </div>
                    <div class="form-row">
					
					<div class="form-col">
						<label for="">
							Address
						</label>
						<div class="form-holder">
							<i class="zmdi zmdi-home"></i>
							<input type="text" name="address" class="form-control" value="@if(isset($userData)){{$userData->address}}@endif" required>
						</div>
					</div>
						
					<div class="form-col">
						<label for="">
							City
						</label>
						<div class="form-holder" id="cityDiv">
							<i class="zmdi zmdi-globe"></i>
							<input type="text" name="city" id="city" class="form-control" value="@if(isset($userData)){{$userData->city}}@endif" required>
							
						</div>
					</div>
						
                        
                        
                    </div>
					<div class="form-row">
						<div class="form-col">
							<label for="">
								State
							</label>
							<div class="form-holder">
								<i class="zmdi zmdi-globe"></i>
								<input type="text" name="state" id="state" class="form-control" value="@if(isset($userData)){{$userData->state}}@endif" required>
							</div>
						</div>
					
						<div class="form-col">
							<label for="">
								Photo Upload
							</label>
							<div class="form-holder form-controls">
								<!--                                <i class="zmdi zmdi-calendar"></i>-->
								<input type="file" name="image" required>
							</div>
						</div>
                        
                    </div>
			<input type="hidden" name="confirmation_code" value="@if(isset($userData)){{$userData->confirmation_code}}@endif">

                    <a href="javascript:void(0)" type="button" id="btn1" class="btns">Next</a>


                </section>


                <!-- SECTION 2 -->
                <h4></h4>
                <section id="sectiontwo" style="display:none;">

                    <div class=" col-sm-9 slick">
                        @if(isset($getBlockData))
                        @foreach($getBlockData as  $BlockData)

                        
                        <div id="wb_122" class="wingBox">
                            <!-- Units Start Here -->
                            <div class="slide">
                                <h3>{{$BlockData->blockName}}</h3>
                                @if(isset($BlockData->BlockFloors))
                                @foreach($BlockData->BlockFloors as $floorData)
                                <ul>
                                    <li class="florNo tooltipBottom">
                                        @if($floorData->floor_id == 0) Ground Floor @else Floor No- {{$floorData->floor_id}} @endif
                                    </li>
                                    @if(isset($floorData->unit))
                                    @foreach($floorData->unit as $floorunit)
                                    <li  class="@if($floorunit->booking_status == 1) available @elseif($floorunit->booking_status == 2) sold @else notAvailable @endif  tooltipBottom selectunit" id="unit_id_{{$floorunit->id}}" @if($floorunit->booking_status == 1) onclick= "selectUnit({{$floorunit->id}}, {{$floorunit->block_id}}, {{$floorunit['unit_details']->total_unit_cost}})" @endif>											


                                         <div class="tooltipBox" @if($floorunit->booking_status != 1) style='display:none;' @endif>
                                         <div class="floorType">
                                                <p>Unit No.<br>
                                                    Unit- @if(isset($floorunit['unit_details']->unit_name)){{$floorunit['unit_details']->unit_name}} @else {{$floorunit->unit}} @endif
                                                </p>

                                            </div>
                                        </div> 
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                                @endforeach
                                @endif
                            </div>
                        </div>


                        @endforeach
                        @endif
                    </div>


                    <input type="hidden" name="unit_id" id="select_unit" value=""/>	
                    <input type="hidden" name="block_id" id="block_id" value=""/>
                    <input type="hidden" name="total_unit_cost" id="total_unit_cost" value=""/>	
                    <!--<input type="hidden" name="calculated_value" id="calculated_value" value=""/>-->	





                    <div id="hdnbanner" class="col-sm-3 hidden-md hidden-sm hidden-xs">
                        <div class="NewBoxSection">
                            <div class="addBannerBox active">
                                <div class="exclusiveLogo">
                                    <figure><img src="/assets/block_inventory/images/exclusiveLogo.png" alt="exclusive logo"></figure>
                                </div>
                                <ul>
                                    <li><i class="fa fa-money" style="font-size:24px"></i><p>Lowest Price Guarantee from Developer*</p></li>
                                    <li><i class="fa fa-building-o" style="font-size:24px"></i><p>Preferential Inventory Allotment </p></li>
                                    <li><i class="fa fa-file" style="font-size:24px"></i><p>Fully Assisted Transaction &amp; Mortgage Support</p></li>
                                </ul>
                                <div class="termsText">* Terms &amp; Conditions apply</div>
                            </div>
                            <div class="unitDataBox animated zoomOut ">
                                <div id="rightBoxPriceDetails" class="priceBreakupp">

                                </div>
                            </div>
                        </div>
                    </div>






                    <!-- Payment Plans Dropdown start here...-->
                    <div class="form-group payment_plan_div" id="payment_plan_div" style="display:none;">
                        

                       
						 <input type="hidden"  class="form-control payment_plan_dropdown" name="payment_plan_id" id="payment_plan_id"  >
						
                    </div>
                    <!-- Payment Plans Dropdown end here...-->


                    <!-- Payment Plan Calculations start here...-->
                    <div class="table-content" id="payment_schedule_list" style="display:none;">
                        <div class="all-fig mb10">
                            <b><i>*All figures in INR</i></b>
                        </div>
                        <div class="fourqt-tbtreponsive mb10" id="payment_plan_details" style="display:none;">

                        </div>
                    </div>			
                    <!-- Payment Plan Calculations end here...-->
                    <a href="javascript:void(0)" type="button" id="btnpre1" class="btnspre">PREVIOUS</a>
                    <a href="javascript:void(0)" type="button" id="btnnxt1" class="btns">NEXT</a>

					
					
					<!--Image View Modal Start Here-->
					<div class="modal fade img_close" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">         
								<div class="modal-body">  
									<span aria-hidden="true" data-dismiss="modal" aria-label="Close" aria-label="Close">x</span>
									<img id="image_view" src="/assets/img/whiteimage.jpg" class="img-responsive">
								</div>
							</div>
						</div>
					</div>
					<!--Image View Modal End Here-->
					
					
					
                </section>

                <!-- TEMPLATE SECTION START HERE-->

                @if(isset($assign_templet))
                @foreach($assign_templet as $key => $templet)
                <h4></h4>
                <section id="section{{$key}}" class="section{{$key}}" style="display:none;">

                    <div class="template_div" id="{{$templet->templet_id}}">
                        <h3 style="margin-bottom: 37px;">{{$templet->templet_name}}</h3>
                        <?php echo $templet->description; ?> 
                    </div>
                    <input type="hidden" name="templet_id[]" id="templet_id" value="{{$templet->templet_id}}" />
                    <input type="hidden" name="templet_html[]" id="templet_html_{{$templet->templet_id}}" value="" />
					
					
					@if($key == 0)
						<a  type="button" id="btnpre2" class="btnspre">PREVIOUS</a>
						<a  type="button" id="btnnxt1" onclick="nextSection({{$key}})" class="btns">NEXT</a>
                    @elseif($key == $key_value)
						<a  type="button" onclick="previousSection({{$key}})" class="btnspre">PREVIOUS</a>
						<a  id="proceed_btn" class="btns" onclick="proceedToPay()">Submit</a>
					@else
						<a  type="button"  onclick="previousSection({{$key}})" class="btnspre">PREVIOUS</a>
						<a  type="button"  onclick="nextSection({{$key}})" class="btns">NEXT</a>
					@endif
                </section>
                @endforeach
                @endif	

				

                <!--TEMPLATE SECTION END HERE -->

            </form>

        </div>

		
<script>
		
	//For getting Pincode Details...
	function getPinCodeData(pincode){
		
		var _token = "{{csrf_token()}}";
		$.ajax({
			url: "/getpincodedetails",
			type: 'GET',
			data: { "_token": _token, "pincode": pincode },
			success: function (data) { 
				
				if(data.message=='success')
				{
					var pincodeData = data.pincodeData;
					var count = pincodeData.length;
					
					console.log(count);
					
					if(count > 0){
						
						if(count > 1){
							var statename = pincodeData[0].statename;
							var districtList = "";
							districtList = districtList + '<select class="form-control select" name="city" id="" required>';
							districtList = districtList +  '<option value="">Please Select</option>'
							for(i = 0; i<count; i++){
								var districtname = pincodeData[i].districtname;
								console.log(districtname);
								//return false;
								var statename = pincodeData[i].statename;
								
								districtList = districtList +  '<option value="'+districtname+'">'+districtname+'</option>'  
						
							}
							districtList = districtList + '</select>';
							$('#cityDiv').html(districtList);
							$('#state').val(statename);
							$('#invailid_code').hide();
						}
						else{
							var statename = pincodeData[0].statename;
							var districtname = pincodeData[0].districtname;
							
							console.log(districtname);
							console.log(pincodeData.length);
							var districtList = "";
							districtList = districtList + '<i class="zmdi zmdi-globe"></i>';
							districtList = districtList + '<input type="text" name="city" id="city" class="form-control" value="'+districtname+'" required>';
							$('#cityDiv').html(districtList);
							$('#state').val(statename);
							$('#invailid_code').hide();
						}
						
						
					}
					else{
						$('#invailid_code').css({'color': 'red', 'font-size' :' 12px'}).show();
						$('#city').val("");
						$('#state').val("");
					}
					
				}
				else 
				{
					console.log(data);
				}
			},
			errors: function (data) {
				console.log(data);
			}
		});
	};
		
		
	// For changing next section...
	$(document).ready(function () {
		
		$('#btn1').click(function () {
			$('#sectionone').hide();
			$('#sectiontwo').show();
			$('.slick').slick({
			dots: false,
			arrows: true,
			autoplay: false,
			autoplaySpeed: 1000,
			infinite: true,
			speed: 1000,
			slidesToScroll: 1,
			slidesToShow: 1,
			adaptiveHeight: true,
			responsive: [
				{
					breakpoint: 767,
					settings: {
					slidesToShow: 1,
				}
			}]
		});
		});
		

		$('#btnpre1').click(function () {
			$('#sectionone').show();
			$('#sectiontwo').hide();

		});

		$('#btnnxt1').click(function () {
			$('#sectiontwo').hide();
			$('#section0').show();

		});
		$('#btnpre2').click(function () {
			$('#sectiontwo').show();
			$('#section0').hide();

		});

	});
		
		
	//For changing dynamic sections...
	function nextSection(sectionId){
		var currentSection = sectionId
		var nextSection = sectionId + 1;
		$('#section'+sectionId).hide();
		$('#section'+nextSection).show();
		
	}
	
	function previousSection(sectionId){
		var currentSection = sectionId;
		var prevSection = sectionId - 1;
		$('#section'+sectionId).hide();
		$('#section'+prevSection).show();
	}
						
						
						
						
	//For Select Units...
	function selectUnit(unit_id, block_id, total_unit_cost) {
		$('#payment_plan_id').prop('selectedIndex', 0);    //To reset Payment Plan Dropdown...
		$('#payment_plan_details').hide();
		$('#payment_schedule_list').hide();
		$('.selectunit').css("background-color", "");
		$('#select_unit').val(unit_id);
		$('#block_id').val(block_id);
		$('#total_unit_cost').val(total_unit_cost);
		$('#unit_id_' + unit_id).css("background-color", "Green");
		$('#payment_plan_div').show();


		var _token = "{{csrf_token()}}";
		$.ajax({
			url: '/getInventoryData',
			type: 'get',
			data: {"_token": _token, "unit_id": unit_id},
			success: function (data) {

				if (data.message == 'success')
				{

					var unitDetails = data.unitDetailsType;
					var pricedata = data.pricedata;
					
					if(pricedata.basic_sale_price){
						if(pricedata.basic_sale_price.value == null){
							pricedata.basic_sale_price.value = 0;
						}
					}
					if(pricedata.total_unit_cost){
						if(pricedata.total_unit_cost.value == null){
							pricedata.total_unit_cost.value = 0;
						}
					}
					
					
					var totalChargeComponent = data.chargeComponent;
					var total_unit_cost = data.total_unit_cost;
					if(total_unit_cost == null){
						total_unit_cost = '';
					}
					var basic_sale_price = data.basic_sale_price;
					if(basic_sale_price == null){
						basic_sale_price = '';
					}
					var unit_name = data.unit_name;
					if(unit_name != null){
						var unitnamearray = unit_name.split("");
						var count = unitnamearray.length;
						if(data.block_type_id != 1){
							if(count > 5){
								var tower = unitnamearray[1]+unitnamearray[2];
								var floor = unitnamearray[3];
								var unit_no = unitnamearray[4]+unitnamearray[5];
								
								var end = ['th','st','nd','rd','th','th','th','th','th','th'];
								if ((floor %100) >= 11 && (floor%100) <= 13){
								   floor = floor+ 'th';
								}
								else{
								   floor = floor+ end[floor % 10];
								}
								
								if(floor == "0th"){
									
									floor = "Ground";
								}
								
							}
							else{
								tower = "";
								floor = "Ground";
								unit_no = unit_name;
							}
							var blockName = "Tower";
							var blockValue = tower;
							
						}
						else{
							if(count > 5){
								var plot = unitnamearray[1]+unitnamearray[2]+unitnamearray[3];
								var floor = 0;
								var unit_no = unitnamearray[4]+unitnamearray[5];
								
								var end = ['th','st','nd','rd','th','th','th','th','th','th'];
								if ((floor %100) >= 11 && (floor%100) <= 13){
								   floor = floor+ 'th';
								}
								else{
								   floor = floor+ end[floor % 10];
								}
								
								if(floor == "0th"){
									floor = "Ground";
								}
							}
							else{
								plot = "";
								floor = "";
								unit_no = unit_name;
							}
							var blockName = "Plot";
							var blockValue = plot;
						}
						
					}
					
					var unit_no = unit_no;
					if(unit_no == null){
						unit_no = '';
					}
					var project = data.project;
					var unitData = "";
					unitData = unitData + '<div class="table-responsive"><table class="table table-bordered">';
					unitData = unitData + '<thead><tr><th colspan="2">Unit Details</th></tr></thead>';
					unitData = unitData + '<tbody>';
					unitData = unitData + '<tr><td> Unit No. </td><td><span>' + unit_no + '</span> </td></tr>';
					//unitData = unitData + '<tr><td> Project </td><td><span>' + project + '</span> </td></tr>';
					if(data.block_type_id !=1){
						unitData = unitData + '<tr><td>Floor</td><td><span>' + floor + '</span> </td></tr>';
					}
					unitData = unitData + '<tr><td>'+blockName+'</td><td><span>' +blockValue+ '</span> </td></tr>';
					for (i = 0; i < unitDetails.length; i++) {
						if (unitDetails[i].value != null) {
						
							if (unitDetails[i].input_type != "file") {
								
								if(unitDetails[i].name != "unit_name" && unitDetails[i].name != "total_unit_cost" && unitDetails[i].name != "basic_sale_price"){
								unitData = unitData + '<tr><td>' + unitDetails[i].label + '</td><td><span>' + unitDetails[i].value + '</span> </td></tr>';
								}
								
								
							}
							else {
								var image_type = unitDetails[i].name;
								unitData = unitData + '<tr><td>' + unitDetails[i].label + '</td><td><span class="pointer" onclick="getUnitImage('+unit_id+','+"'"+unitDetails[i].name+"'"+')"><img src="' + unitDetails[i].value + '" style="width: 55px; height: 37px; margin: 0 auto; background-size: cover;" /></span> </td></tr>';
							}
						
					
						}
						else {
					
							unitData = unitData + '<tr><td>' + unitDetails[i].label + '</td><td><span> </span> </td></tr>';
						
						}
					 
					}
					if(pricedata.basic_sale_price){
						unitData = unitData + '<tr><td>'+pricedata.basic_sale_price.label+'</td><td><span>' + pricedata.basic_sale_price.value + ' /- </span> </td></tr>';
					}
					if(pricedata.other_charges){
						unitData = unitData + '<tr><td> '+pricedata.other_charges.label+' </td><td><span>' + pricedata.other_charges.value + ' /- </span> </td></tr>';
					}
					if(pricedata.total_unit_cost){
						unitData = unitData + '<tr><td><b>'+pricedata.total_unit_cost.label+'</b></td><td><span>' + pricedata.total_unit_cost.value + ' /- </span> </td></tr>';
					}
					unitData = unitData + '</tbody></table>';
					unitData = unitData + '</div>';

					$("#rightBoxPriceDetails").html(unitData);
					$(".NewBoxSection .addBannerBox").removeClass("active");
					$(".NewBoxSection .unitDataBox").addClass("active");

				}
				else
				{
					console.log("Data not found.");
				}
			},
			errors: function (data) {
				console.log(data);
			}
		});
		getfrontendPaymentPlan(unit_id);
	};

	
	//For getting Template Details and Submit form...
	function proceedToPay() {
		$('.template_div').each(function () {
			var id = this.id;

			$('#' + id + ' input').each(function () {
				$(this).attr("value", $(this).val());
			});

			var templethtml = $('#' + id).html();
			$('#templet_html_' + id).val(templethtml);
		});

		$('#wizard').submit();
	};


	//For getting payment plan calculations...	
	
	
	
	
	function getfrontendPaymentPlan(id)
						{
								$.ajax({
										url: "/getfrontendPaymentPlan/0/"+id,
										type: 'GET',
										//data: {"_token": _token},
										success: function (data) {
										 getPaymentPlanComponent(data);
									}
								});
							
						}
													
						
	
	function getPaymentPlanComponent(id) {

		 var payment_plan_id = id;
		$('#payment_plan_id').val(id);
		$('#payment_plan_details').empty();
		var total_unit_cost = $('#total_unit_cost').val();

		var url = "/getPaymentPlanComponent/" + payment_plan_id;
		var _token = "{{csrf_token()}}";

		$.ajax({
			url: url,
			type: 'GET',
			data: {"_token": _token},
			success: function (data) {
				console.log(data.message);

				if (data.message == 'success')
				{
					var planComponentDetails = data.getPlanComponentData;
					var count = planComponentDetails.length
					var amount = [];
					var grand_total = 0;

					var planDetails = "";
					planDetails = planDetails + '<table class="table table-bordered table-fourqt" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_Dginstallmentinformation" style="width:100%;border-collapse:collapse;">';
					planDetails = planDetails + '<tbody><tr class="HeaderCenter">';
					planDetails = planDetails + '<td style="color:#333;">Sr.No.</td><td style="color:#333;">Installment Name</td><td style="color:#333;">Period</td><td style="color:#333;">Installment Amount</td>';
					planDetails = planDetails + '</tr>';

					for (i = 0; i < count; i++) {
						var sr_no = i + 1;

						//To get amount...
						var component_type = planComponentDetails[i].component_type;
						if (component_type == 1) {
							var percentage = planComponentDetails[i].component_value
							amount = (total_unit_cost * percentage) / 100;
						}
						else {
							var amount = planComponentDetails[i].component_value;
						}



						// To get due date...
						var period_type = planComponentDetails[i].period_type;
						if (period_type == 0) {
							var due_date = planComponentDetails[i].period_value + ' months from booking date';
						}
						else if (period_type == 1) {
							var due_date = planComponentDetails[i].period_value + ' months from last installment';
						}
						else if (period_type == 2) {
							var date = planComponentDetails[i].period_value;
							var newData = date.split('-');
							var due_date = newData[2] + '-' + newData[1] + '-' + newData[0];
						}
						else if(period_type == null){
							var due_date = '';
						}


						// To get Total Amount...
						grand_total = grand_total + amount;

						planDetails = planDetails + '<tr><td class="StringCenter">' + sr_no + '</td><td class="StringLeft">' + planComponentDetails[i].component_name + '</td>';
						planDetails = planDetails + '<td class="StringCenter">' + due_date + '</td>';
						planDetails = planDetails + '<td class="DigitRight">' + amount + '</td></tr>';
					}


					planDetails = planDetails + '<tr><td class="StringCenter"></td><td class="StringLeft"></td>';
					planDetails = planDetails + '<td class="StringCenter" style="color:#333333;">Total Amount</td>';
					planDetails = planDetails + '<td class="DigitRight">' + grand_total + '</td></tr>';
					planDetails = planDetails + '</tbody></table>';

					$('#payment_plan_details').html(planDetails);
					$('#payment_plan_details').show();
					$('#payment_schedule_list').show();

				}
				else if (data.message == 'failure')
				{
					alert("data not found");
				}
				else
				{
					console.log(data.message);
				}
			},
			errors: function (data) {
				console.log(data);
			}
		});
	};



</script>

<script type="text/javascript">
	function getUnitImage(unit_id, image_type){
		$.ajax({
			url: "/getunitimages",
			type: 'get',
			data: { "_token": "{{ csrf_token() }}", "unit_id": unit_id, "image_type": image_type },
			success: function (data) { 
					
				if(data.message=='success')
				{
					$("#myModal").modal("show");
					$("#image_view").attr("src", data.image_path);

				}
				else 
				{
					//location.reload();
				}
			},
			errors: function (data) {
				console.log(data);
			}
		});
		
	};
	
	

</script>
        
</body>
</html>