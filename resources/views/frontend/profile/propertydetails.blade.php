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
                              <h3>Property<span> Details</span></h3>
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
                        <div class="page-content">
						  <div class="filter-fourqt clearfix">
                                <div class="filter-left clearfix">
                                    <div class="filter-tilte">
                                        <label><span class="style1">Select Property</span></label>
                                    </div>
                                     <div class="filter-input">
                                          <select id="propertyid">
										    @foreach($property_detail_unit as $property)
                                         <option selected="selected" 
										 onchange="GetSelectedunit($property->unit_id)" value="{{$property->unit_id}}">{{$property->unit_name}}</option>
                                            @endforeach
                                           </select>
                                      </div>
                                </div>
                              <div class="filter-right">
                                        <span class="style1">Customer Name :</span> <span class="style1">
                                            <span id="ctl00_ContentPlaceHolder1_LblRegid" style="font-weight:bold;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span></span>
                                    </div>
                            </div> 
                            <div class="alertError">
                                <input name="ctl00$ContentPlaceHolder1$hidRegId" type="hidden" id="ctl00_ContentPlaceHolder1_hidRegId" value="qMOiH9CzlGE=">
                                <span id="ctl00_ContentPlaceHolder1_lblError"></span>
                            </div>
                            <div class="page-content-style">

                                <div class="table-content">
                                    <div class="schedule_heading_wrap clearfix">
                                        <div class="pull-left schedule_heading">
                                            <span id="ctl00_ContentPlaceHolder1_lblinstallmentsinformation">Property Details</span>
											
                                        </div>
                                        <div class="pull-right">
                                            <a href="javascript:void(0)" title="Print" onclick="OpenPop();" class="print-btn"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
								@if($property_detail)
						<div id="unitdetail_proprty">
																										
                                    <div class="fourqt-tbtreponsive">
                                        <table cellpadding="0" cellspacing="0" width="90%" border="1" class="table table-bordered table-fourqt">

                                            <tbody>
											<tr>
                                                    <td class="LightTextRight">
                                                        Tower
                                                    </td>
                                                    <td class="LightTextLeft">
                                                        <span id="ctl00_ContentPlaceHolder1_lblTower">
														{{$property_detail->block_name}}</span>
                                                    </td>
                                                    <td class="LightTextRight">
                                                        Floor
                                                    </td>
                                                    <td class="LightTextLeft">
													  @if($property_detail->floor_id =='0')  
                                                        <span id="ctl00_ContentPlaceHolder1_lblFloor">Ground</span>
                                                      @else
														<span id="ctl00_ContentPlaceHolder1_lblFloor">   {{$property_detail->floor_id}}</span>
													  @endif
													</td>
                                                </tr>
                                                <tr class="box_dark">
                                                    <td class="LightTextRight">
                                                        Unit Address
                                                    </td>
                                                    <td class="LightTextLeft">
                                                        <span id="ctl00_ContentPlaceHolder1_lblUnitAddress">
														{{$property_detail->unit_name}}</span>
                                                    </td>
                                                    <td class="LightTextRight">
                                                        Unit Type
                                                    </td>
                                                    <td class="LightTextLeft">
                                                        <span id="ctl00_ContentPlaceHolder1_lblUnitType">{{$property_detail->type}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="LightTextRight">
                                                        Area
                                                    </td>
                                                    <td class="LightTextLeft">
                                                     <span id="ctl00_ContentPlaceHolder1_lblArea">
													 
													 </span>
                                                    </td>
                                                    <td class="LightTextRight">
                                                        Payment Plan
                                                    </td>
                                                    <td class="LightTextLeft">
                                                        
													  <span>{{isset($userplan_detail->plan_name) ? $userplan_detail->plan_name : ''}}</span>
                                                        
                                                    </td>
                                                </tr>
                                                <tr class="box_dark">
                                                    <td class="LightTextRight">
                                                        Loan Information
                                                    </td>
                                                    <td class="LightTextLeft">
                                                        <span id="ctl00_ContentPlaceHolder1_lblLoanInformation">Self</span>
                                                    </td>
                                                    <td class="LightTextRight">
                                                        Bank Details
                                                    </td>
                                                    <td class="LightTextLeft">
                                                        <span id="ctl00_ContentPlaceHolder1_lblBank">N/A</span>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </div>									
									</div>
									 @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
 $('#propertyid').on('change', function() {
   var unit_id=$(this).find(":selected").val();
   var _token = "{{csrf_token()}}";
	  $.ajax({
			url: "/property/details/{unit_id}",
			type: 'POST',
			data: { "_token": _token, "unit_id": unit_id },
			success: function (data) {
				$('#unitdetail_proprty').html('');	
				if(data.property_detail.floor_id ==0){var condition="<span id='ctl00_ContentPlaceHolder1_lblFloor'>Ground</span>";}
				else{
					var condition="<span id='ctl00_ContentPlaceHolder1_lblFloor'> "+data.property_detail.floor_id+"</span>";};
var html_proprty='<div class="fourqt-tbtreponsive"><table cellpadding="0" cellspacing="0" width="90%" border="1" class="table table-bordered table-fourqt"><tbody><tr><td class="LightTextRight">Tower</td><td class="LightTextLeft"><span id="ctl00_ContentPlaceHolder1_lblTower">'+data.property_detail.block_name+'</span></td><td class="LightTextRight">Floor</td><td class="LightTextLeft">'+condition+'</td> </tr><tr class="box_dark"><td class="LightTextRight">Unit Address</td><td class="LightTextLeft"><span id="ctl00_ContentPlaceHolder1_lblUnitAddress">'+data.property_detail.unit_name+'</span></td><td class="LightTextRight">Unit Type</td><td class="LightTextLeft"> <span id="ctl00_ContentPlaceHolder1_lblUnitType">'+data.property_detail.type+'</span>  </td> </tr> <tr><td class="LightTextRight"> Area </td><td class="LightTextLeft"><span id="ctl00_ContentPlaceHolder1_lblArea"></span></td><td class="LightTextRight">  Payment Plan </td><td class="LightTextLeft"> <span>'+data.userplan_detail.plan_name+'</span></td></tr>  <tr class="box_dark"> <td class="LightTextRight">Loan Information</td><td class="LightTextLeft">  <span id="ctl00_ContentPlaceHolder1_lblLoanInformation">Self</span> </td>  <td class="LightTextRight">Bank Details </td> <td class="LightTextLeft"> <span id="ctl00_ContentPlaceHolder1_lblBank">N/A</span></td></tr></tbody></table></div>';	
$('#unitdetail_proprty').html(html_proprty);				
			     
				 console.log(data.property_detail.block_name);
			  },
			errors: function (data) {
				console.log(data);
			}				
	  }); 
}); 
  
</script>





@stop
