@extends('frontend.master')

@section('content')

<div class="main" id="innerpage">
    <!-- banner -->
    <div class="banner">
        <!--Slider-->
         <header id="header">
  <div class="col-md-3 Mainlogo">
  <a href="/"><img src="http://bellatoral.com/wp-content/themes/newbellator/images/website-logo.png" style="border:0px;"></a></div>
	<a href="/login"><div class="sign_button">sign in</div></a>
  <div class="button_container" id="toggle">
                    <div class="arrow-down"></div>
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
  
    <div class="overlay" id="overlay">
                    <nav class="overlay-menu">
                        <ul>
                            <li ><a href="/">Home</a></li>
                            <li><a href="/aboutus">About Us</a></li>
                            <li><a href="/axisblues">Axis Blues</a></li>
							<li><a href="/caseorchid">Casa Orchid</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/login">Sign Up</a></li>
                        </ul>
                    </nav>
                </div>
				
				</header>




        <div id="demo-2" data-zs-src='["/fronted/images/2.jpg"]' data-zs-overlay="dots">
            <div class="demo-inner-content">
                <div class="baner-info">
                    <h3>Registration</h3>
                </div>	
            </div>
        </div>
        <!--//Slider-->

    </div>
    <!-- //banner -->
</div>

<!-- about -->
<div class="contact" id="contact">
    <div class="container">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success-msg'))
        <p class="alert alert-danger">{{ Session::get('success-msg') }}</p>
        @endif
        @if(Session::has('success-msg-registered'))
        <p class="alert alert-success">{{ Session::get('success-msg-registered') }}</p>
        @endif


        <div class="col-sm-6  col-sm-offset-3">
            <div class="agileits_w3layouts_contact">
                <div class="modal__dialog">
                    <div class="modal__content">
                        <div class="panel panel-default loginPanel">
                            <div class="customer_btn">
                                <a href="/user_register" id="show" >Customer</a>
                                <a href="/vendor_register"class="active" id="hide">Channel Partner</a>
                            </div>
                            <div class="panel-body">
                                <form action="/vendorregister" method="post" id="loginForm"  class="loginForm"  enctype="multipart/form-data">

                                    <div class="form-row">
                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                   Company Name
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" name="company_name" placeholder="Company Name" value="{{old('company_name')}}" id="form1Url" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                   Company Name
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input  class="form-control" type="file" placeholder="Company Name" name="image" required>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-row">
                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    First Name
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" name="name" placeholder="First Name" value="{{old('name')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Last Name
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="{{old('lname')}}" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Email ID
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Password
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" name="password" placeholder="password" value="{{old('password')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Contact Number
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" placeholder="Contact" name="phone" value="{{old('phone')}}" required>
                                            </div>
                                        </div>
										<div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Pincode
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" placeholder="Pincode" name="zip" id="pincode" value="{{old('zip')}}" required>
                                            </div>
											<p style="display:none;" id="invailid_code"><i><i class="fa fa-warning"></i>Invailid Pincode</i></p>
                                        </div>
										

                                    </div>

                                    <div class="form-row">
									
										
                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Address
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address')}}" required>
                                            </div>
                                        </div>

                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Country
                                                                                                </label>-->
                                            <div class="form-holder" id="cityDiv">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" placeholder="City" name="city" value="{{old('city')}}"  required>
                                            </div>
                                        </div>
                                        
                                    </div>
									
									<div class="form-row">

                                        <div class="form-col">
                                            <!--                                                    <label for="">
                                                                                                    Country
                                                                                                </label>-->
                                            <div class="form-holder">
                                                <i class="zmdi zmdi-account-o"></i>
                                                <input type="text" class="form-control" id="state" placeholder="State" name="state" value="{{old('state')}}" required >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-col refer">
                                        <!--                                                    <label for="">
                                                                                                Reference
                                                                                            </label>-->
                                        <div class="form-holder">
                                            <i class="zmdi zmdi-account-o"></i>
                                            <input name="reference" type="text" placeholder="Reference" class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="unit_book" id="unit_book" value="0"/>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">	

                                    <div class="form-row">
                                        <div class="form-col">

                                            <button  type="submit" class="pull-left waves-effect waves-light reg_btn">Submit</button>
											

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div> 


<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <p class="text-warning text-center"><small>Do you want to book a unit?</small></p>
            </div>
            <div class="modal-footer">
                <button onclick="submitform(0)" type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                <button onclick="submitform(1)" type="button" class="btn btn-default    ">No</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitform(a)
    {
        if (a)
        {
            $('#loginForm').submit();
        }
        else
        {
            $('#unit_book').val("1");
            $('#loginForm').submit();
        }
    }
	
	
	
	//For getting Pincode Details...
	$('#pincode').on('change', function(){
		var pincode = $('#pincode').val();
		var _token = "{{csrf_token()}}";
		//return false;
		
		$.ajax({
			url: "/getpincodedetails",
			type: 'GET',
			data: { "_token": _token, "pincode": pincode },
			success: function (data) { 
				
				if(data.message=='success')
				{
					var pincodeData = data.pincodeData;
					var count = pincodeData.length;
					
					if(count > 0){
							
							if(count > 1){
								var statename = pincodeData[0].statename;
								var districtList = "";
								districtList = districtList + '<select class="form-control select" name="city" id="" required>';
								districtList = districtList +  '<option value="">Please Select</option>'
								for(i = 0; i<count; i++){
									var districtname = pincodeData[i].districtname;
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
	});
</script>


@stop


