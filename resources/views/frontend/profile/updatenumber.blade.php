@extends('frontend.master')

@section('extra_js')

@stop

@section('extra_css')
   
@stop

@section('content')

 <div class="main" id="innerpage">
            <!-- banner -->
            <div class="banner">
                <!--Slider-->
               

               @include('frontend.profile.upper_link')


                
                <div id="demo-2" data-zs-src='["/fronted/images/2.jpg"]' data-zs-overlay="dots">
                    <div class="demo-inner-content">
                        <div class="baner-info">
                              <h3>Update Email/ <span> Mobile No.</span></h3>
                        </div>	
                    </div>
                </div>
                <!--//Slider-->

            </div>
            <!-- //banner -->
        </div>

        <!-- about -->
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <!-- ASIDE BEGIN -->
                     @include('frontend.profile.profile_left')

                   <div class="col-lg-9 col-md-8 col-12 content-wrapper">
                        <div id="content">

                            <script type="text/javascript" language="javascript">
                                function ValidateEmail(email) {
                                    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                                    return expr.test(email);
                                };
                                function Submit() {
                                    var email = $("#ctl00_ContentPlaceHolder1_txtEmailId").val();

                                    if (email == '') {
                                        if ($("#hfRDB").val() == "E") {
                                            alert('Enter Email Id.');
                                            $("#txtEmailId").focus();
                                            return false;
                                        }
                                        else if ($("#hfRDB").val() == "M") {
                                            alert('Enter Mobile No.');
                                            $("#txtEmailId").focus();
                                            return false;
                                        }
                                    }

                                    if ($("#hfRDB").val() == "E") {

                                        if (!ValidateEmail(email)) {
                                            alert("Invalid email address.");
                                            $("#txtEmailId").focus();
                                            return false;
                                        }
                                    }
                                    if ($("#hfRDB").val() == "M") {

                                        if (!ValidateMobile(email)) {
                                            alert("Invalid Mobile No.");
                                            $("#txtEmailId").focus();
                                            return false;
                                        }
                                    }

                                    var ddlPrj = document.getElementById('ctl00_ContentPlaceHolder1_ddlProperty');
                                    var RegID = ddlPrj.value;
                                    var CCode = document.getElementById('ctl00_ContentPlaceHolder1_LblRegid').innerHTML;
                                    var Email = email;
                                    var Mode = $("#hfRDB").val();
                                    var OldValue = "";
                                    if (Mode == "E") {
                                        OldValue = $("#ctl00_ContentPlaceHolder1_hfEmailId").val();
                                    }
                                    else if (Mode == "M") {
                                        OldValue = $("#ctl00_ContentPlaceHolder1_hfMobileNo").val();
                                    }

                                    if (OldValue == Email) {
                                        return false;
                                    }

                                    $.ajax({
                                        type: "POST",
                                        url: "UpdateEmail.aspx/SubmitEmail",
                                        data: '{NewValue: "' + Email + '", CCode: "' + CCode + '",RegId: "' + RegID + '",OldValue: "' + OldValue + '",Mode: "' + Mode + '"}',
                                        contentType: "application/json; charset=utf-8",
                                        dataType: 'json',
                                        success: function (response) {
                                            alert(response);
                                            if ($("#hfRDB").val() == "M") {
                                                $("#ctl00_ContentPlaceHolder1_hfMobileNo").val(Email);
                                            }
                                            else if ($("#hfRDB").val() == "E") {
                                                $("#ctl00_ContentPlaceHolder1_hfEmailId").val(Email);
                                            }
                                            window.location.reload();
                                        },
                                        failure: function (response) {
                                            alert(response.d);
                                        }
                                    });
                                    return false;
                                }

                                function ValidateMobile(number) {
                                    var val = number;
                                    if (/^\d{10}$/.test(val)) {
                                        return true;
                                    } else {
                                        return false
                                    }
                                }

                                function customBtnRadio() {
                                    $('.radioCustomBtn li input:disabled').parent().parent().addClass("disabled");
                                    $('.radioCustomBtn li input:checked').parent().parent().addClass("active");
                                    $('.radioCustomBtn input ').on('click', function () {
                                        if (this.checked) {
                                            $('.radioCustomBtn input:not(:checked)').parent().parent().removeClass("active");
                                            $(this).parent().parent().addClass("active");
                                        }
                                    });
                                }
                                $(document).ready(function () {
                                    customBtnRadio();

                                    if ($("#hfRDB").val() == "M") {
                                        $("#ctl00_ContentPlaceHolder1_txtEmailId").val($("#ctl00_ContentPlaceHolder1_hfMobileNo").val());
                                    }
                                    else if ($("#hfRDB").val() == "E") {
                                        $("#ctl00_ContentPlaceHolder1_txtEmailId").val($("#ctl00_ContentPlaceHolder1_hfEmailId").val());
                                    }
                                });

                                function RadioButtonClick() {
									
								
									
                                    $("#hfRDB").val($('input[name=radio]:checked').val());

                                    if ($("#hfRDB").val() == "M") {																				
										   $('#menu li.active').removeClass('active');
                                             $('#mo').addClass('active');
										   // alert('mobile');
                                        $("#lblName").text('Mobile No.');
										//$("#typevalue").value('phone');
										$("input:hidden#typevalue").val("0");
										$("#emailselect").hide();
										$("#mobileselect").show();										
                                       l
                                    }
                                    else if ($("#hfRDB").val() == "E") {
										  $('#menu li.active').removeClass('active');
                                             $('#em').addClass('active');
										  // alert('email');
										  
                                        $("#lblName").text('Email ID');
										//$("#typevalue").value('email');
										$("input:hidden#typevalue").val("1");
										$("#mobileselect").hide();
										$("#emailselect").show();										
										 $('input[name="firstname"]').val($(this).val());
                                        $("#ctl00_ContentPlaceHolder1_txtEmailId").val($("#ctl00_ContentPlaceHolder1_hfEmailId").val());
                                    }
                                }
                                 
								 	$('li radio').click(function(){
										$('li radio').removeClass("active");
										$(this).addClass("active");
									});

                            </script>
							   
							
                            <style>
                                .radioCustomBtn {
                                    margin: 0px;
                                    padding: 0px;
                                    list-style-type: none;
                                    border: solid 1px #b70403;
                                    display: inline-block;
                                    /*margin-left: 10px;*/
                                    border-radius: 3px;
                                }

                                .radioCustomBtn:after {
                                    content: "";
                                    display: block;
                                    clear: both;
                                }

                                .radioCustomBtn li {
                                    display: inline-block;
                                    float: left;
                                }

                                .radioCustomBtn li label {
                                    margin: 0px;
                                    padding: 4px 10px;
                                    border-left: solid 1px #b70403;
                                    font-size: 13px;
                                    cursor: pointer;
                                    color: #b70403;
                                    font-weight: normal;
                                }

                                .radioCustomBtn li:first-child label {
                                    border-left: none;
                                }

                                .radioCustomBtn li input[type="radio"] {
                                    display: none;
                                }

                                .radioCustomBtn li.disabled label,
                                .radioCustomBtn li span.disabled label {
                                    /* background: #dedede; */
                                    /*pointer-events: none;*/
                                    /* color: #5a5a5a; */
                                    cursor: not-allowed;
                                    opacity: 0.5;
                                }

                                .radioCustomBtn li.active label,
                                .radioCustomBtn li span.active label {
                                    background:#b70403;
                                    color: #fff;
                                }

                                .LabelName {
                                    width:80px;
                                }
                                .colon {
                                    width:20px;
                                }
                                .control {
                                    width:240px;
                                }
								
                            </style>
                            <div class="page-content">
							 <div class="filter-fourqt clearfix">
                                    <div class="filter-left clearfix">
                                        <div class="filter-tilte">

                                            <label> <span class="style1">Select Property</span></label>
                                        </div>
                                        <div class="filter-input">
                                          <select id="propertyid">
										    @foreach($property_detail_unit as $property)
                                             <option selected="selected" value="{{$property->unit_id}}">{{$property->unit_name}}</option>
                                            @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="filter-right">
                                        <span class="style1">Customer Name :</span> <span class="style1">
                                            <span id="ctl00_ContentPlaceHolder1_LblRegid" style="font-weight:bold;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span></span>
                                    </div>
                                </div> 
                                <div class="page-content-style">
								      <div id="successMessage">
									    @if(Session::has('success-msg-registered'))
                                          <p  class="alert alert-success">{{ Session::get('success-msg-registered') }}</p>
                                        @endif
									   </div>
								
                                    <div class="upEmail">
                                        <div class="alertError">
                                            <input name="ctl00$ContentPlaceHolder1$hidRegId" type="hidden" id="ctl00_ContentPlaceHolder1_hidRegId" value="qMOiH9CzlGE=">
                                            <span id="ctl00_ContentPlaceHolder1_lblError"></span>
                                        </div>
										
										 @if (count($errors) > 0)
										   <div class="alert alert-danger">
											 <ul>						   
											  @foreach ($errors->all() as $error)
												 {{ $error }}
											  @endforeach 
											</ul>
										   </div>
									   @endif
                                        <div class="formwrapbox">
										   
                                            <div class="formonline">
                                                <div class="online-row clearfix">                            
                                                    <div class="oninput" style="text-align:center;width:100%">
                                                        <input type="hidden" id="hfRDB" value="E">
                                                        <input type="hidden" name="ctl00$ContentPlaceHolder1$hfEmailId" id="ctl00_ContentPlaceHolder1_hfEmailId">
                                                        <input type="hidden" name="ctl00$ContentPlaceHolder1$hfMobileNo" id="ctl00_ContentPlaceHolder1_hfMobileNo">
                                                        <ul id="menu" class="radioCustomBtn">
                                                            <li id="em" class="active">
                                                                <label>
                                                                    <input type="radio" value="E" name="radio" onclick="RadioButtonClick()" selected>
                                                                    <span >Email Id</span>
																	 
                                                                </label>
                                                            </li>
                                                            <li id="mo">
                                                                <label>
                                                                    <input type="radio" name="radio" value="M" onclick="RadioButtonClick()">
                                                                    <span>Mobile No.</span>
																        
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>												
									<form method="post"  id="mainform" action="/user/updatecontactemail" enctype="multipart/form-data">
                                                  {{ csrf_field() }} 
												  
												<div style="display:block" id="updatefill">  
                                                <div class="online-row clearfix">
                                                    <div class="ontitle">
                                                        <span style="color: #7ac143">*</span><label id="lblName">Email ID</label>
                                                    </div>
                                                    <div class="oninput" style="display:block" id="emailselect">
                                                        <input name="email" type="email" id="emailmobile" class="InputBox">
                                                    </div>
													<div class="oninput" style="display:none" id="mobileselect">
                                                        <input name="mobile" type="number" id="mobile" class="InputBox">
                                                    </div>
                                                </div>
												
                                             <input type="hidden" name="userid_user" value="{{Auth::user()->id}}" id="userid">
												   <input type="hidden" name="typevalue" id="typevalue" value="1">
                                                <div class="online-row clearfix">
                                                    <div class="ontitle">
                                                        <label>&nbsp;</label>
                                                    </div>
                                                    {{--<div class="oninput">
                                                         <button type="submit" class="tn btn-default btn-fourqt">Submit</button>
                                                    </div>--}}
													<div class="oninput" id="buttonloader3">
                                                         <button type="button" onclick="sendotp();" class="tn btn-default btn-fourqt">Update</button>
                                                    </div>
													<div class="oninput" id="showloader3" style="display:none;">
                                                         <button type="button" onclick="sendotp();" class="tn btn-default btn-fourqt"><i class="fa fa-spinner fa-spin"></i>Update</button>
                                                    </div>
                                                </div>
											  </div>
									 </form>
											  			  
											  
									<div style="display:none" id="verifycode">	  
										 <form id="form1" method="post" action="/user/updatecontactemail" enctype="multipart/form-data">
                                                  {{ csrf_field() }}												  
                                                <div class="online-row clearfix">
                                                    <div class="ontitle">
                                                      <span style="color: #7ac143">*</span><label>OTP Code</label>
                                                    </div>
													<div class="oninput" id="otp_select">
                                                        <input name="otp_code" type="text" id="otp_code" class="InputBox">
                                                    </div>
                                                </div>
												
                                                   <input type="hidden" name="userid_user" value="{{Auth::user()->id}}" id="userid">											  
												   <input type="hidden" name="typevalue" id="typevalue_user" value="1">
												   <input type="hidden" name="send_otp" id="send_otp" value="">
												    <input type="hidden" name="email" id="send_email" value="">
                                                 <div class="online-row clearfix">
                                                    <div class="ontitle">
                                                        <label>&nbsp;</label>
                                                    </div>
                                                    <button type="button" onclick="checkotp();" class="tn btn-default btn-fourqt">VerifyOTP</button>
                                                 </div>												
										  </form>
									  </div>   							  
                                     </div>
                                    </div>
                                        <div class="table-content table-content-top" style="padding-top:20px">
                                            <div class="fourqt-tbtreponsive">
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
<script>   
 function sendotp() {
    var userid= $("#userid").val();
	var type= $("#typevalue").val();	
  if(type==1)
    {
	 var email= $("#emailmobile").val();
     var _token = "{{csrf_token()}}";	 
	  var atpos = email.indexOf("@");
		  var dotpos = email.lastIndexOf(".");
		  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
			alert("Not a valid e-mail address");
			return false;
		  }	 	 
	  $.ajax({
			url: "/user/emailverification",
			type: 'POST',
			data: { "_token": _token, "email": email, "userid":userid, "type":type},
			beforeSend: function(){
				 $("#buttonloader3").hide();
				 $("#showloader3").show();				
			   },
			   complete: function(){
				 $("#showloader3").hide();
				 $("#buttonloader3").show();
			   },
			success: function (data) {	
			    $('#updatefill').hide();
				$('#verifycode').show();
				$('#send_otp').val(data.code);
				$('#send_email').val(data.email);		
			  },
			errors: function (data) {
			   alert('Please Enter Valid Email');
			   console.log(data);
			}				
	  });
	 }else{
		$('#mainform').submit(); 
	 }
	} 
</script>

<script>   
 function checkotp() {
    var email_otp= $("#send_otp").val();
	var client_otp= $("#otp_code").val();
	 if(email_otp == client_otp)
	    {
			$('#form1').submit();			
		}
     else{alert('OTP Not Matched')}
	} 
</script>
<script>
setTimeout(function() {
     $('#successMessage').fadeOut('fast');
   }, 3000);
</script>
@stop
