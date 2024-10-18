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
                             <h3>Statement Of<span> Accounts</span></h3>
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
                                    window.open('StatementOfAccounts_Print.aspx?id=' + Id, 'StatementOfAccounts_Print', 'height=600,width=800,top=100,left=100,ScreenX=100,ScreenY=100,resizable=yes,scrollbars=yes');
                                }

                                function Dowload() {
                                    document.getElementById('ctl00_ContentPlaceHolder1_hfDownloadContent').value = parent.document.getElementById("ctl00_ContentPlaceHolder1_pnlDetails").innerHTML;
                                }

                            </script>
                            <div class="page-content">
							  <div class="filter-fourqt clearfix">
                                    <div class="filter-left clearfix">
                                        <div class="filter-tilte">

                                            <label><span class="style1">Select Property</span></label>
                                        </div>
                                        <div class="filter-input">
                                          <select id="propertyid" onchange="GetSelectedTextValue(this)">
										    @foreach($property_detail_unit as $property)
                                              <option selected="selected" value="{{$property->id}}">{{$property->unit_name}}</option>
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
                                    <div class="alertError">
                                        <input name="ctl00$ContentPlaceHolder1$hidRegId" type="hidden" id="ctl00_ContentPlaceHolder1_hidRegId" value="qMOiH9CzlGE=">
                                        <span id="ctl00_ContentPlaceHolder1_lblError"></span>
                                    </div>
                                    <div class="border-parent">
                                        <div class="table-content">
                                            <div class="all-fig mb10">
                                                <b><i>*All figures in INR</i></b>
                                            </div>
                                            <div class="schedule_heading_wrap clearfix">
                                                <div class="pull-left schedule_heading">
                                                    <span id="ctl00_ContentPlaceHolder1_Label4">STATEMENT OF PAYMENT RECEIVED</span>
                                                </div>
                                                <!--div class="pull-right pos-relative">
                                                    <div class="fourqIconBtnSec">
                                                        <ul class="clearfix">
                                                            <li>
                                                                <a class="toolTipCust printBtn" onclick="OpenPop();" href="javascript:void(0)" title="Print">
                                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <input type="image" name="ctl00$ContentPlaceHolder1$imgDownloadPDF" id="ctl00_ContentPlaceHolder1_imgDownloadPDF" title="Download PDF" class="imgdwnbtn" src="../images/download-pdf.png" onclick="return Dowload();" style="height:16px;width:16px;border-width:0px;">

                                                                <input type="hidden" name="ctl00$ContentPlaceHolder1$hfDownloadContent" id="ctl00_ContentPlaceHolder1_hfDownloadContent">

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div-->
                                            </div>
                                            <div class="border-box">
                                                <div id="ctl00_ContentPlaceHolder1_pnlDetails">

                                                    <div class="list-grid-fourqt" id="tblPaymentDetails">
                                                        <div class="datInfo">
                                                            <span id="ctl00_ContentPlaceHolder1_LblDate" style="font-weight:normal;">20 Nov 2018</span>
                                                        </div>
                                                        <ul class="clearfix">
                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    CRN:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_LblRegid">1023737</span>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Registration Date: 
                                                                </div>
                                                                <div class="pull-info pull-left">
                                                                    <span id="ctl00_ContentPlaceHolder1_LblRegdate">04/05/2010</span>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    First Applicant:
                                                                </div>
                                                                <div class="pull-info pull-left">
                                                                    <span id="ctl00_ContentPlaceHolder1_LblName">Mr. ANKUR GUPTA   </span><strong></strong>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Second Applicant:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_lblsname">N/A</span>

                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Address: 
                                                                </div>
                                                                <div class="pull-info pull-left">
                                                                    <span id="ctl00_ContentPlaceHolder1_lblmaddress">529-C REGENT SHIPRA SUN CITY INDIRAPURAM <br>Ghaziabad, Uttar Pradesh- 201010</span>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Unit Type:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_LblUnitType" style="position: static">2BHK(795 Sq.Ft.)</span>

                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    <span id="ctl00_ContentPlaceHolder1_Label3" style="position: static">Contact No.</span>
                                                                </div>
                                                                <div class="pull-info pull-left">
                                                                    <span id="ctl00_ContentPlaceHolder1_lblcontNo" style="position: static">9717991968</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Payment Plan:

                                                                </div>
                                                                <div class="pull-info pull-left">
                                                                    <span id="ctl00_ContentPlaceHolder1_lblpaymentplan">Y004-STD</span>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Project:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_lblprojname" style="position: static">Eco Village-2</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Area:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_lblarea" style="position: static">795.00</span>
                                                                    <span id="ctl00_ContentPlaceHolder1_lblareameasurment" style="position: static">Sq.Ft.</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Tower:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_LblTowername" style="position: static">B6</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Floor:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_LblFloorName" style="position: static">8th</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Unit Address:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_lbladdress" style="position: static">805</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                    Location:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_lbllocation" style="position: static">N/A</span>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix" style="display: none">
                                                                <div class="pull-title pull-left">
                                                                    Broker Name:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_LblBrokerCompanyName">ADN CONSULTANCY  PVT. LTD.</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix" style="display: none">
                                                                <div class="pull-title pull-left">
                                                                    Loan Information:
                                                                </div>
                                                                <div class="pull-info pull-left">

                                                                    <span id="ctl00_ContentPlaceHolder1_lblyesno" style="position: static">Self</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix" style="display: none">
                                                                <div class="pull-title pull-left">


                                                                </div>
                                                                <div class="pull-info pull-left">


                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                </div>
                                                                <div class="pull-info pull-left">
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="pull-title pull-left">
                                                                </div>
                                                                <div class="pull-info pull-left">
                                                                </div>
                                                            </li>



                                                        </ul>
                                                    </div>
                                                    <div class="schedule_heading_wrap clearfix lblpaymentinformation">
                                                        <div class="schedule_heading">
                                                            <span id="ctl00_ContentPlaceHolder1_lblpaymentinformation">PAYMENT INFORMATION</span>
                                                        </div>

                                                    </div>
                                                    <div valign="top" align="center" colspan="4" class="fourqt-tbtreponsive">
                                                        <table class="table table-bordered table-fourqt" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_dgpayplandetail" style="border-color:Black;width:100%;border-collapse:collapse;">
                                                            <tbody><tr class="HeaderCenter">
                                                                    <td class="SmallHeader">Sl.No.</td><td class="SmallHeader">Receipt No. </td><td class="SmallHeader">Receipt Date</td><td class="SmallHeader">Mode of Payment</td><td class="SmallHeader">Cheque/ Draft/ Ref. No.</td><td class="SmallHeader">Cheque/ Draft/ Ref. Date</td><td class="SmallHeader">Drawn On</td><td class="SmallHeader">Received Amount(Rs.)</td><td class="SmallHeader">Payment Status</td><td class="SmallHeader">Payment Received against</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        1
                                                                    </td><td class="StringLeft">2010/4019351</td><td class="StringCenter">05/05/2010</td><td class="StringLeft">Cheque</td><td class="DigitRight">315973</td><td class="StringCenter">05/05/2010</td><td class="StringLeft">SBI BANK</td><td class="DigitRight">-70,000.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        2
                                                                    </td><td class="StringLeft">2010/5008028</td><td class="StringCenter">05/05/2010</td><td class="StringLeft">Cheque</td><td class="DigitRight">315973</td><td class="StringCenter">05/05/2010</td><td class="StringLeft">SBI BANK</td><td class="DigitRight">70,000.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        3
                                                                    </td><td class="StringLeft">2010/5052870</td><td class="StringCenter">05/05/2010</td><td class="StringLeft">Cheque</td><td class="DigitRight">315973</td><td class="StringCenter">05/05/2010</td><td class="StringLeft">SBI BANK (Air Conditioner Issued)</td><td class="DigitRight">70,000.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        4
                                                                    </td><td class="StringLeft">2010/5008030</td><td class="StringCenter">18/05/2010</td><td class="StringLeft">Cheque</td><td class="DigitRight">315974</td><td class="StringCenter">18/05/2010</td><td class="StringLeft">SBI BANK</td><td class="DigitRight">70,000.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        5
                                                                    </td><td class="StringLeft">2010/11001559</td><td class="StringCenter">01/07/2010</td><td class="StringLeft">Online</td><td class="DigitRight">STDT300610</td><td class="StringCenter">01/07/2010</td><td class="StringLeft">X PAYABLE ON 30JUN2010 OU</td><td class="DigitRight">-27,007.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        6
                                                                    </td><td class="StringLeft">2010/11008234</td><td class="StringCenter">01/07/2010</td><td class="StringLeft">Online</td><td class="DigitRight">STDT300610</td><td class="StringCenter">01/07/2010</td><td class="StringLeft">X PAYABLE ON 30JUN2010 OU</td><td class="DigitRight">27,007.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        7
                                                                    </td><td class="StringLeft">2010/5062980</td><td class="StringCenter">23/03/2011</td><td class="StringLeft">Cheque</td><td class="DigitRight">3589</td><td class="StringCenter">23/03/2011</td><td class="StringLeft">IDBI BANK (LOAN)</td><td class="DigitRight">6,52,314.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        8
                                                                    </td><td class="StringLeft">2011/5009436</td><td class="StringCenter">19/05/2011</td><td class="StringLeft">Cheque</td><td class="DigitRight">4125</td><td class="StringCenter">19/05/2011</td><td class="StringLeft">IDBI BANK(LOAN)</td><td class="DigitRight">1,43,356.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        9
                                                                    </td><td class="StringLeft">2012/4026114</td><td class="StringCenter">28/01/2013</td><td class="StringLeft">Cheque</td><td class="DigitRight">1435</td><td class="StringCenter">28/01/2013</td><td class="StringLeft">3  IDBI BANK</td><td class="DigitRight">-1,43,574.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        10
                                                                    </td><td class="StringLeft">2012/5061042</td><td class="StringCenter">28/01/2013</td><td class="StringLeft">Cheque</td><td class="DigitRight">1435</td><td class="StringCenter">28/01/2013</td><td class="StringLeft">3  IDBI BANK</td><td class="DigitRight">1,43,574.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        11
                                                                    </td><td class="StringLeft">2012/5061055</td><td class="StringCenter">28/01/2013</td><td class="StringLeft">Cheque</td><td class="DigitRight">1435</td><td class="StringCenter">28/01/2013</td><td class="StringLeft">IDBI BANK</td><td class="DigitRight">1,43,574.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        12
                                                                    </td><td class="StringLeft">2013/5000533</td><td class="StringCenter">02/04/2013</td><td class="StringLeft">Online</td><td class="DigitRight">423213919</td><td class="StringCenter">02/04/2013</td><td class="StringLeft">NEFT</td><td class="DigitRight">2,500.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        13
                                                                    </td><td class="StringLeft">2013/5012382</td><td class="StringCenter">11/05/2013</td><td class="StringLeft">Cheque</td><td class="DigitRight">2077</td><td class="StringCenter">11/05/2013</td><td class="StringLeft">IDBI BANK ( LOAN )</td><td class="DigitRight">1,41,076.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        14
                                                                    </td><td class="StringLeft">2013/5016805</td><td class="StringCenter">24/05/2013</td><td class="StringLeft">Online</td><td class="DigitRight">442691144</td><td class="StringCenter">24/05/2013</td><td class="StringLeft">NEFT</td><td class="DigitRight">25,000.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        15
                                                                    </td><td class="StringLeft">2013/5018762</td><td class="StringCenter">01/06/2013</td><td class="StringLeft">Cheque</td><td class="DigitRight">2252</td><td class="StringCenter">01/06/2013</td><td class="StringLeft">IDBI BANK ( LOAN )</td><td class="DigitRight">1,18,575.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="AlternateRow" style="background-color:#E0E0E0;">
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        16
                                                                    </td><td class="StringLeft">2013/5042340</td><td class="StringCenter">10/09/2013</td><td class="StringLeft">Online</td><td class="DigitRight">Ref:485363</td><td class="StringCenter">10/09/2013</td><td class="StringLeft">NEFT</td><td class="DigitRight">20,000.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr>
                                                                    <td class="StringCenter" style="width:30px;">
                                                                        17
                                                                    </td><td class="StringLeft">2013/5045319</td><td class="StringCenter">19/09/2013</td><td class="StringLeft">Cheque</td><td class="DigitRight">2792</td><td class="StringCenter">19/09/2013</td><td class="StringLeft">IDBI BANK ( LOAN )</td><td class="DigitRight">1,23,575.00</td><td class="StringLeft">Cleared</td><td class="StringLeft">&nbsp;</td>
                                                                </tr><tr class="gridFooter">
                                                                    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="gridFooter" colspan="2">Net Amount Received: </td><td class="gridFooter">15,09,970.00</td><td>&nbsp;</td><td>&nbsp;</td>
                                                                </tr>
                                                            </tbody></table>
                                                    </div>
                                                    <div class="total-amount">
                                                        <span id="ctl00_ContentPlaceHolder1_lblAmountinwords">Amount in words: Rupees Fifteen Lakh  Nine Thousands Nine Hundred  Seventy  Only</span>
                                                    </div>
                                                    <div class="notebook-list">
                                                        <label>Note:</label>
                                                        <ul style="margin-top: 0em; list-style-type: square">
                                                            <li>The above payment received against the aforesaid unit is subject to realization of cheque/demand drafts.</li>
                                                            <li>If any Cheque/Demand Draft dishonour charges as applicable.</li>
                                                            <li>Service tax/VAT to be levied as applicable.(Service Tax No:
                                                                <span id="ctl00_ContentPlaceHolder1_lblCompSTaxNo"></span>).</li>
                                                            <li>Any delay payments attract interest @24%p.a. (as applicable) as per terms and condition of the allotment letter. However if the allotee(s) fails to pay interest on delayed payments the same shall be charged at the time of delivery of possession or at the time of transfer of the aforesaid flat/shop whichever is earlier.</li>
                                                            <li>For any clarification or update regarding change of your address, telephone no’s, email ID please visit our corporate office or address to "Supertech House, B 28-29, sector - 58, Noida (U.P.) 201307" or mail us at crm@supertechlimited.com</li>
                                                            <li>Since this is a computer generated document signature is not required.</li>
                                                        </ul>
                                                    </div>
                                                    <input name="ctl00$ContentPlaceHolder1$hidreg" type="hidden" id="ctl00_ContentPlaceHolder1_hidreg">

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





      


@stop
