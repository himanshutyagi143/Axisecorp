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
                              <h3>Account<span> Details</span></h3>
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
                                    var Id = document.getElementById('ctl00_ContentPlaceHolder1_hidRegId').value
                                    window.open('../Customer/AccountStatement.aspx?Id=' + Id, 'AccountStatement', 'width=800,height=500,left=100,top=100,resizable=1,scrollbars=yes');
                                }

                                function OpenPop() {
                                    var Id = document.getElementById('ctl00_ContentPlaceHolder1_hidRegId').value;
                                    window.open('AccountDetail_Print.aspx?id=' + Id, 'AccountDetail_Print', 'height=600,width=800,top=100,left=100,ScreenX=100,ScreenY=100,resizable=yes,scrollbars=yes');
                                }
                            </script>
                            <div class="page-content">
						      <div class="filter-fourqt clearfix">
                                    <div class="filter-left clearfix">
                                        <div class="filter-tilte">
                                            <label><span class="style1">Select Property</span></label>
                                        </div>
                                        <div class="filter-input">
                                          <select id="propertyid">
										    @foreach($property_unit as $property)
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
 							  
								<div id="unitdetail_proprty">                                   								
                                </div>
								

                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
 $(document).ready(function() {
   var unit_id=$(this).find(":selected").val();
    getid(unit_id);
  });
  
  $('#propertyid').on('change', function() {
   var unit_id=$(this).find(":selected").val();
    getid(unit_id);
  });   
  
 function getid(unit_id) {
	var unit_id=unit_id;
   var _token = "{{csrf_token()}}";
	  $.ajax({
			url: "/account/details/{unit_id}",
			type: 'POST',
			data: { "_token": _token, "unit_id": unit_id },
			success: function (data) {	
					if(data.charges =='')
					  {

						var condition="";}
					else{
						var countcharge= data.countcharge;
						 //var condition = [];
						 var condition = "";
					
						 for(var i = 0; i < countcharge; i++)
						    {
                               var condition1='<tr><td class="LightTextRight">'+data.charges[i].charge_component_name+'</td><td class="LightTextRight"><span id="ctl00_ContentPlaceHolder1_LblPlc">'+data.charges[i].charge_component_price+'</span></td></tr>'; 
                               condition+=condition1;						   
						     } 							 	
					   }
					 if(data.due_payment==null)
					  {
						  var dueamount=0;
					  }else{
						  var dueamount=data.due_payment;
					  }			   
                 $('#unitdetail_proprty').html('');	
                    var html_proprty1='<div class="table-content"><div class="short-box-table"><div class="fourqt-tbtreponsive"><table border="1" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse" class="table table-bordered table-fourqt"><tbody><tr><td colspan="2" align="right"><b><i>*All figures in INR&nbsp; </i></b>&nbsp;</td></tr> <tr><td class="LightTextRight">Total Base Price </td><td class="LightTextRight"><span id="ctl00_ContentPlaceHolder1_lblBasicPrice">'+data.property_detail_unit.basic_sale_price+'</span></td></tr> '+condition+'    <tr><td class="LightTextRight">Total Unit Price</td><td class="LightTextRight"><span id="ctl00_ContentPlaceHolder1_lblTotalUnitCost">'+data.property_detail_unit.total_unit_cost+'</span></td></tr><tr><td colspan="2" class="LightTextRight"></td></tr><tr style="font-weight: bold"><td class="LightTextRight">Total Due</td><td class="LightTextRight"><span id="ctl00_ContentPlaceHolder1_lblTotalReceivable">'+dueamount+'</span></td></tr><tr style="font-weight: bold"><td class="LightTextRight">Total Paid</td> <td class="LightTextRight"><span id="ctl00_ContentPlaceHolder1_lblTotalPaid">'+data.paid_payment+'</span></td></tr></tbody></table></div></div><div style="height: 20px; padding-top: 10px; visibility: hidden;" align="center"><br> <br> <img onclick="return openPop();" title="Statement Of Account" style="cursor: hand" src="../Image/CLICKHERE.jpg" alt="Statement"></div></div>';
					
					 $('#unitdetail_proprty').html(html_proprty1);					    
			  },
			errors: function (data) {
				console.log(data);
			}				
	  }); 
	} 
</script>
@stop
