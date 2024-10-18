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
                             <h3>Applicant<span> Details</span></h3>
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
                                function openPop() {
                                    var regno = document.getElementById('ctl00_ContentPlaceHolder1_ddlProperty').value;
                                    window.location.href = "EditProfile.aspx?Type=F&id=" + regno;
                                }
                            </script>
                            <div class="page-content">
                               {{-- <div class="filter-fourqt clearfix">
								 <div class="filter-left clearfix">
                                        <div class="filter-tilte">
                                            <label><span class="style1">Select Property</span></label>
                                        </div>
                                        <div class="filter-input">
                                            <select name="ctl00$ContentPlaceHolder1$ddlProperty" onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ddlProperty\',\'\')', 0)" id="ctl00_ContentPlaceHolder1_ddlProperty" class="DropDown">
                                                <option selected="selected" value="1023737">Eco Village-2-805</option>

                                            </select>
                                        </div>
                                        <div class="filter-btn">

                                        </div>
                                    </div> 
                                    <div class="filter-right">
                                        <span class="style1">Customer ID :</span> <span class="style1">
                                            <span id="ctl00_ContentPlaceHolder1_LblRegid" style="font-weight:bold;">ST117084</span></span>

                                    </div>
                                </div> --}}
								
                                <div class="page-content-style">
                                    <div class="fourqt-applicant clearfix">

                                        <div class="fourqt-applicant-first">
                                            @foreach($users_details as $details)

                                            
                                            @if($details->applicant_type==1)
                                            <h5 class="main_heading">First Applicant
                                            </h5>
                                            <div class="fild_set">
                                                <ul>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <div class="sub_name">
														   
                                                            <span id="ctl00_ContentPlaceHolder1_LblName">
															{{$details->first_name}} {{$details->last_name}} </span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Address
                                                        </div>
                                                        <div class="sub_nameAddress" style="height: auto;">
                                                            <span id="ctl00_ContentPlaceHolder1_lblmaddress">{{$users_add_details->address_line}}</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Contact No.
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblFLandline">
															   {{$details->landline_number}}
															</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Mobile No.
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblconNo">
															  {{$details->phone}}
															</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            E-mail ID
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblFEmailId">{{$details->users_email}}</span>
                                                        </div>
                                                    </li>
                                                    {{--<li class="clearfix">
                                                        <div class="name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblPan1">PAN No.</span>
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblpannos">
                                                                {{$details->pancard_number}} 
															 </span>
                                                        </div>
                                                    </li> --}}
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Date of Birth
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblFDob">
															 {{$details->dob}}
															</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                           
                                            @endif
                                           
                                            @endforeach
                                        </div>     
                                        <div id="ctl00_ContentPlaceHolder1_tblSecApplicant" class="fourqt-applicant-second">
                                            @foreach($users_details as $details)
                                           
                                            @if($details->applicant_type==2)
                                            <h5 class="main_heading">Second Applicant
                                            </h5>
                                            <div class="fild_set">
                                                <ul>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblsname">{{$details->first_name}} {{$details->last_name}}</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Address
                                                        </div>
                                                        <div class="sub_nameAddress">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSecAddress">{{$users_add_details1->address_line}}</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Contact No.
                                                        </div>
                                                        <div class="sub_name">
                                                          <span id="ctl00_ContentPlaceHolder1_lblSLandline"> {{$details->landline_number}}</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Mobile No.
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSecContactNo"> {{$details->phone}}</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            EMail ID
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSecEmailId">{{$details->users_email}}</span>
                                                        </div>
                                                    </li>

													{{-- <li class="clearfix">
                                                        <div class="name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblPan2">PAN No.</span>
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSPanNo"> {{$details->pancard_number}} </span>
                                                        </div>

                                                    </li> --}}
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Date of Birth
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSDob">{{$details->dob}}</span>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>     
                                            @endif   
                                            @endforeach
                                        </div>
                                    </div>
                    <div class="row">
                         <div class="col-md-6">
                        @foreach($users_details as $u_det_img)
                        @if($u_det_img->applicant_type==1)
                        @if($u_det_img->user_image)

                        <div class="pro_img">
                            <img src="{{ asset($u_det_img->user_image) }}" width="200" height="250"  style="padding: 0px;">
                            {{--
                            <form method="post" action="/{{$administrator}}/imageupdate" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$user_id}}">
                                <input type="hidden" name="applicant_type" value="{{$u_det_img->applicant_type}}">
                                <input type="file" name="imgupdate">
                                <button class="btn btn-primary">Update Image</button>
                            </form>
                            --}}
                        </div>
                        @else
                        <div class="pro_img">
                            <img src="/assets/img/defaultuser.jpg" width="200" height="250"  style="padding: 0px;">
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        @foreach($users_details as $u_det_img)
                        @if($u_det_img->applicant_type==2)
                        @if($u_det_img->user_image)

                        <div class="pro_img" class="pull-right">
                            <img src="{{ asset($u_det_img->user_image) }}"  width="200" height="250" style="padding: 0px;">
                            {{--
                            <form method="post" action="/{{$administrator}}/imageupdate" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$user_id}}">
                                <input type="hidden" name="applicant_type" value="{{$u_det_img->applicant_type}}">
                                <input type="file" name="imgupdate">
                                <button class="btn btn-primary">Update Image</button>
                            </form> 
                           --}}                            
                        </div>
                        @else
                        <div class="pro_img">
                            <img src="/assets/img/defaultuser.jpg" width="200" height="250"  style="padding: 0px;">
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>                    
                </div> 	
                                    <div class="fourqt-applicant clearfix">

                                        <div class="fourqt-applicant-first">
                                            <h5 class="main_heading">First Applicant Document
                                            </h5>
                                            <div class="fild_set">
                                        @foreach($document_type as $document)                    
                                        @if($document->applicant_type==1) 
                                <div  class="form-group  col-sm-6" id="url{{$document->media_id}}">
                                     <div class="tab-content tab-content-news">
                                        <div class="user-block">
                                            <span class="username usr_bottom">
                                           <div class="row">
                                            <div class="col-sm-9">
                                                
                                                <a href="{{$document->media_name}}" target="_blank"  class="profile-username">{{$document->kyc_type_name}}</a>
                                              </div>
                                               
                                               {{-- 
                                               <div class="col-sm-1">
                                               <a on-click="deleteelement({{$document->media_id}})" class="pull-right  btn-bricky new_btn" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> </div> --}}
                                               {{--
                                               <button class="pull-right btn-bricky new_btn delete-url" value="{{$document->media_id}}"><i class="fa fa-trash-o"></i></button>
                                                --}}
                                              <div class="col-sm-1">
                                                <a href="/download/{{$document->media_id}}" class="tooltips pull-right  btn-bricky new_btn" data-placement="top" data-original-title="Download" download="" data-toggle="tooltip" title=""><i class="fa fa-download" aria-hidden="true"></i></a>
                                              </div> 
                                              
                                              
                                            
                                            </div>
                                            </span>
                                          
                                                
                                                <div  class="pro_dis">
                                                <p>{{$document->description}}</p>
                                                </div>
                                                
                                                {{--
                                                
                                                <div style="overflow-y:auto;height: 50px;">
                                                <span  style="float: right;"><i class="fa fa-calendar margin-r-5" style="color: #16aad8;"></i>{{$document->created_date}}</span>
                                                </div>
                                                
                                                    
                                                     --}}
                                            
                                         </div>                                      
                                     </div>                                      
                                  </div>                                        

                                        @endif
                                        @endforeach
                                            </div>
                                        </div>																			
							@if(!empty($document_type[1]))
                               <div id="ctl00_ContentPlaceHolder1_tblSecApplicant" class="fourqt-applicant-second">
                                            <h5 class="main_heading">Second Applicant Document
                                            </h5>
                                            <div class="fild_set">
                                        @foreach($document_type as $document)                    
                                        @if($document->applicant_type==2)   
                                <div  class="form-group  col-sm-6" id="url{{$document->media_id}}">
                                     <div class="tab-content tab-content-news">
                                        <div class="user-block">
                                            <span class="username usr_bottom">
                                           <div class="row">
                                            <div class="col-sm-9">
                                                
                                                <a href="{{$document->media_name}}" target="_blank"  class="profile-username">{{$document->kyc_type_name}}</a>
                                              </div>
                                               
                                               {{-- 
                                               <div class="col-sm-1">
                                               <a on-click="deleteelement({{$document->media_id}})" class="pull-right  btn-bricky new_btn" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> </div> --}}
                                               {{--
                                               <button class="pull-right btn-bricky new_btn delete-url" value="{{$document->media_id}}"><i class="fa fa-trash-o"></i></button>
                                                --}}
                                              <div class="col-sm-1">
                                                <a href="/download/{{$document->media_id}}" class="tooltips pull-right  btn-bricky new_btn" data-placement="top" data-original-title="Download" download="" data-toggle="tooltip" title=""><i class="fa fa-download" aria-hidden="true"></i></a>
                                              </div> 
                                              
                                              
                                            
                                            </div>
                                            </span>
                                          
                                                
                                                <div  class="pro_dis">
                                                <p>{{$document->description}}</p>
                                                </div>
                                                
                                                {{--
                                                
                                                <div style="overflow-y:auto;height: 50px;">
                                                <span  style="float: right;"><i class="fa fa-calendar margin-r-5" style="color: #16aad8;"></i>{{$document->created_date}}</span>
                                                </div>
                                                
                                                    
                                                     --}}
                                            
                                         </div>                                      
                                     </div>                                      
                                  </div>    
                                        @endif
                                        @endforeach
                                        </div>
                                    </div> 
                                    @else

                                   @endif									
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
   $(document).ready(function() {   
	   
    $('.delete-url').click(function () {     
		   if (confirm("Are you sure want to delete?")) {
                var url_id = $(this).val();
                  $.ajax({
                    type: "DELETE",
                    url: '/user/' + url_id,
                    data: {_method: 'delete', "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        $("#url" + url_id).remove();
                     
                    },
                    error: function (data) {
						 $("#url" + url_id).remove();
                    }
                });  
		       }
			    return false;
			  });
	          
			});
</script>  
		

		
		
		

@stop
