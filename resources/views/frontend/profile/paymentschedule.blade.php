@extends('frontend.master')

@section('extra_js')

@stop

@section('extra_css')
  
@stop

@section('content')
 <style>
.loader {
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid blue;
  border-right: 4px solid green;
  border-bottom: 4px solid red;
  border-left: 4px solid pink;
  width: 14px;
  height: 14px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
 <div class="main" id="innerpage">
            <!-- banner -->
            <div class="banner">
                <!--Slider-->
               

               @include('frontend.profile.upper_link')


                
                <div id="demo-2" data-zs-src='["/fronted/images/2.jpg"]' data-zs-overlay="dots">
                    <div class="demo-inner-content">
                        <div class="baner-info">
                             <h3>Payment <span> Schedule</span></h3>
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
                                function OpenPop() {
                                    var Id = document.getElementById('ctl00_ContentPlaceHolder1_hidRegId').value;
                                    window.open('PaymentSchedule_Print.aspx?id=' + Id, 'PaymentSchedule_Print', 'height=600,width=800,top=100,left=100,ScreenX=100,ScreenY=100,resizable=yes,scrollbars=yes');
                                }
                            </script>
                            <div class="page-content">
							 <div class="filter-fourqt clearfix">
							   @if(Session::has('success'))
                        <p class="alert alert-danger">{{ Session::get('success') }}</p>
                      @endif

							 
							 
                                    <div class="filter-left clearfix">
                                        <div class="filter-tilte">

                                            <label><span class="style1">Select Property</span></label>
                                        </div>
                                       <div class="filter-input">
                                          <select id="propertyid">
										    @foreach($property_detail as $property)
                                              <option selected="selected" value="{{$property->unit_id}}">{{$property->unit_name}}</option>
                                            @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="filter-right">
                                        <span class="style1">Customer Name :</span> <span class="style1">
                                            <span id="ctl00_ContentPlaceHolder1_LblRegid" style="font-weight:bold;">@if(isset($user_details)){{$user_details->first_name}} {{$user_details->last_name}} @endif</span></span>
                                    </div>
                                </div> 
																
                                <div class="page-content-style">
                                    <div class="alertError">
                                        <input name="ctl00$ContentPlaceHolder1$hidRegId" type="hidden" id="ctl00_ContentPlaceHolder1_hidRegId" value="qMOiH9CzlGE=">
                                        <span id="ctl00_ContentPlaceHolder1_lblError"></span>
                                    </div>
                                    <div class="table-content">
                                        <div class="all-fig mb10">
                                            <b><i>*All figures in INR</i></b>
                                        </div>
                                        <section class="content-section">
                                            <div class="schedule_heading_wrap clearfix">
                                                <div class="pull-left schedule_heading">
                                                    <span id="ctl00_ContentPlaceHolder1_lblinstallmentsinformation">Payment Schedule</span>
                                                </div>
                                                <div class="pull-right pos-relative">
                                                    <div class="fourqIconBtnSec">
                                                        <ul class="clearfix">
                                                            <li>
                                                                <a class="toolTipCust printBtn" onclick="OpenPop();" href="javascript:void(0)" title="Print">
                                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a id="ctl00_ContentPlaceHolder1_imgDownloadPayment" class="toolTipCust downloadBtn" title="Download" href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$imgDownloadPayment','')">
                                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fourqt-tbtreponsive mb10">
                                                <table id="tbl1" class="table table-bordered table-fourqt" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_Dginstallmentinformation" style="width:100%;border-collapse:collapse;">
                                                    <thead><tr class="HeaderCenter">
                                                            <th>Sr.No.</th><th>Installment Name</th><th>Due Date<br>(DD/MM/YYYY)</th><th>Installment Amount</th>
                                                        </tr>
                                                     </thead>
                                                     <tbody>
                                                       
                                                      
														
													
                                                    </tbody></table>
                                            </div>
                                            <div class="someInfo">
                                                *<b><i>Taxes will be extra as applicable.</i></b>
                                            </div>

                                        </section>
                                        <section class="content-section">
                                            <div id="ctl00_ContentPlaceHolder1_tblcolor" class="clearfix clv">
                                                <div class="actColorTheme pull-right">
                                                    <ul class="clearfix">
                                                        <li>
                                                            <div class="actCol actBox Bouncecheque"></div>
                                                            <div class="actCol">
                                                                <label>Bounce cheque</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="actCol actBox Pendingcheque"></div>
                                                            <div class="actCol">
                                                                <label>Pending cheque</label>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="schedule_heading_wrap clearfix">
                                                <div class="pull-left schedule_heading">
                                                    <span id="ctl00_ContentPlaceHolder1_lblReceiptDetail">Receipts</span>
                                                </div>
                                                <div class="pull-right pos-relative">
                                                    <div class="fourqIconBtnSec">
                                                        <ul class="clearfix">
                                                            <li>
                                                                <a class="toolTipCust printBtn" onclick="OpenPop();" href="javascript:void(0)" title="Print">
                                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a id="ctl00_ContentPlaceHolder1_imgDownloadReceipt" class="toolTipCust downloadBtn" title="Download" href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$imgDownloadReceipt','')">
                                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fourqt-tbtreponsive">
                                                <table id="tbl2" class="table table-bordered table-fourqt-last" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_dgpayplandetail" style="width:100%;border-collapse:collapse;">
                                                    <thead>
													<tr class="HeaderCenter">
                                                            <th>Sr.No.</th>
															<th>Receipt Date<br>(DD/MM/YYYY)</th>
													       <th>Mode of Payment</th>
													       <th>Cheque/ Draft/ txn. No.</th>
														   <th>Cheque/ Draft/ Ref. Date<br>(DD/MM/YYYY)</th>
														   <th>Receipt Amount</th>
														   <th>Payment Status</th>
														   <th>Receipt</th>
                                                        </tr>
                                                     </thead>  
                                                     <tbody> 
                                                     
                                                    </tbody>
													
													</table>
                                            </div>


                                        </section>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
var unit_id = $('#propertyid').val();
GetSelectedTextValue(unit_id);
 }); 
   $('#propertyid').on('change', function() {
   var unit_id=$(this).val();
    GetSelectedTextValue(unit_id);
  }); 
     function GetSelectedTextValue(unit_id) {
        $.ajax({
            type:"get",
            url:"/payment/currentinstallment/"+unit_id,
            success:function(resp){
               console.log(resp.getpaymentschedule);

               var length=resp.getpaymentschedule.length;
                var j=1;
                if(length)
                {
                $("#tbl1 tbody tr").remove();
				for(var i=0; i<length; i++){
					if(resp.getpaymentschedule[i].status=='1'){
					   var paid='<td class="DigitRight">'+resp.getpaymentschedule[i].calulated_value+' /- <span  class="text-success "> Paid Amount</span></td>'; 
					}
					else if(resp.getpaymentschedule[i].status=='0'){
					 var paid='<td class="DigitRight">'+resp.getpaymentschedule[i].calulated_value+' /- <span  class="text-primary "> Due Amount</span></td>';   
					}
					else if(resp.getpaymentschedule[i].status=='2')
					{
					 var paid='<td class="DigitRight">'+resp.getpaymentschedule[i].calulated_value+' /- <span  class="text-danger "> Transation Failed</span></td>';  
					}
					else
					{
				   var paid='<td class="DigitRight">'+resp.getpaymentschedule[i].calulated_value+' /- <span  class="text-danger "> Transation Cancel</span></td>'; 
					}
					
					
					var paymentsechdule = "";
					 
					paymentsechdule = paymentsechdule + '<tr>';
					paymentsechdule = paymentsechdule + '<td class="StringCenter">'+j+'</td>';
					paymentsechdule = paymentsechdule + '<td class="StringLeft">'+resp.getpaymentschedule[i].component_name+'</td>';
					if(resp.getpaymentschedule[i].status=='1'){
						paymentsechdule = paymentsechdule + '<td class="StringCenter">Paid</td>';
					}
					else if(resp.getpaymentschedule[i].due_date == null && resp.getpaymentschedule[i].status !='1'){
						paymentsechdule = paymentsechdule + '<td class="StringCenter"> </td>';
					}
					else{
						paymentsechdule = paymentsechdule + '<td class="StringCenter">'+resp.getpaymentschedule[i].due_date+'</td>';
					}
						
					paymentsechdule = paymentsechdule + ''+paid+'';
					paymentsechdule = paymentsechdule + '</tr>';
					
					$('#tbl1 tbody').append(paymentsechdule);

					j++;
				}
                }
                else
                {
                    $("#tbl1 tbody tr").remove();
                    $('#tbl1 tbody').append('<tr><td colspan="4" class="text-dark text-center"><b>No recod found.</b></td></tr>');

                }


				//For Payment Details Table...
				if(resp.getpaymentdetails){
					$("#tbl2 tbody tr").remove();
					var payment_details = resp.getpaymentdetails;
					var count = payment_details.length;
					var paymentdetails = "";
					for(i = 0; i<count; i++){
						
						paymentdetails = paymentdetails+'<tr>';
						paymentdetails = paymentdetails+'<td>'+(i+1)+'</td>';
						paymentdetails = paymentdetails+'<td>'+payment_details[i].created_at+'</td>';
						paymentdetails = paymentdetails+'<td>Cheque</td>';
						paymentdetails = paymentdetails+'<td>'+payment_details[i].txnid+'</td>';
						paymentdetails = paymentdetails+'<td>'+payment_details[i].created_at+'</td>';
						paymentdetails = paymentdetails+'<td>'+payment_details[i].net_amount+' /-</td>';
						
						if(payment_details[i].payment_status == 0){
							paymentdetails = paymentdetails+'<td><button type="button" class="btn btn-warning btn-xs">Due</button></td>';
						}
						else if(payment_details[i].payment_status == 1){
							paymentdetails = paymentdetails+'<td><button type="button" class="btn btn-success btn-xs">Success</button></td>';
						}
						else if(payment_details[i].payment_status == 2){
							paymentdetails = paymentdetails+'<td><button type="button" class="btn btn-danger btn-xs">Failed</button></td>';
						}
						else {
							paymentdetails = paymentdetails+'<td><button type="button" class="btn btn-success btn-xs">Not Found</button></td>';
						}
						
						paymentdetails = paymentdetails+'<td><button id="g'+payment_details[i].txnid+'" onclick="changevalue(this.value)" value="'+payment_details[i].txnid+'"  class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"> Generate</button><p  style="display:none"  class="loader" id="gg'+payment_details[i].txnid+'"></p><a  onclick="downloadpaymentreceipt('+"'"+payment_details[i].txnid+"'"+')" value="'+payment_details[i].txnid+'"  id="d'+payment_details[i].txnid+'" style="display:none" href="/user/generateInvoice/'+payment_details[i].txnid+'" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="fa fa-download" aria-hidden="true"></i></a></td>';
						paymentdetails = paymentdetails+'</tr>';
					}
					
					$('#tbl2 tbody').append(paymentdetails);
				}
				else
                {
                    $("#tbl2 tbody tr").remove();
                    $('#tbl2 tbody').append('<tr><td colspan="8" class="text-dark text-center"><b>No recod found.</b></td></tr>');                    
                }
				

            }
        });
    } 
	

function changevalue(selectedValue){
    //console.log(selectedValue);
	jQuery('#g'+selectedValue).hide();
	jQuery('#gg'+selectedValue).show();
	setTimeout(function(){ 
	jQuery('#g'+selectedValue).hide();
	jQuery('#gg'+selectedValue).hide();
	jQuery('#d'+selectedValue).show();
	}, 2000);
}

function downloadpaymentreceipt(selectedValue){

	$("#d"+selectedValue).hide();
	$("#gg"+selectedValue).show();
	
	setTimeout(function(){
		$("#gg"+selectedValue).hide();
		$("#g"+selectedValue).show();
	}, 2000);
}



                

</script>




      


@stop
