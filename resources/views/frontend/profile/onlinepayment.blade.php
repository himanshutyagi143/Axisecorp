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
                              <h3>Online<span> Payment</span></h3>
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
                        <div id="contents">
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
                                        <input name="hidRegId" type="hidden" id="hidRegId" value="qMOiH9CzlGE=">
                                        <span id="lblError"></span>
                                    </div>

                                    <div class="formwrapbox">
                                        <div class="formonline">
                                            <div class="online-row clearfix">
                                                <div class="ontitle">
                                                    <span style="color: #7ac143;">*</span><label>Amount&nbsp;:&nbsp;</label>
                                                </div>
                                                <div class="oninput">
                                                    <input name="amount" type="text" id="amount" class="InputBox" style="text-align: right">
                                                </div>
                                            </div>
                                            <div class="online-row clearfix">
                                                <div class="ontitle">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="oninput">

                                                    <a onclick=" return Submit();" id="btnSubmit" class=" btn btn-default btn-fourqt" href="javascript:__doPostBack('btnSubmit','')">
                                                        Submit <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-2">
                                            <div style="display: none;">
                                                <select name="channel">
                                                    <option value="10">Standard</option>
                                                </select>
                                                <input name="account_id" type="text" id="account_id" value="26506">
                                                <input name="secretkey" type="text" id="secretkey" size="35" value="6020c730c45e183e6e5362ae4848200a">
                                                <input name="reference_no" type="text" value="1542739924">
                                                <select name="currency">
                                                    <option value="INR">INR</option>
                                                </select>
                                                <input name="description" type="text" id="description" value="1023737">
                                                <input name="return_url" type="text" id="return_url" size="60" value="http://erealty.supertechlimited.com/Customer/response.aspx">
                                                <select name="mode">
                                                    <option value="LIVE" selected="selected">LIVE</option>
                                                </select>
                                                <input name="name" type="text" id="name" value="Mr. Ankur gupta  ">
                                                <textarea name="address" id="address">529-C REGENT SHIPRA SUN CITY INDIRAPURAM</textarea>
                                                <input name="state" type="text" id="state" value="UP">
                                                <input name="city" type="text" id="city" value="Noida">
                                                <input name="postal_code" type="text" value="201301">
                                                <input name="country" type="text" id="country" value="IND">
                                                <input name="email" type="text" id="email" value="ankur24aug@gmail.com">
                                                <input name="phone" type="text" id="phone" value="9717991968">
                                                <input name="page_id" type="text" id="page_id" value="1023737">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="filter-fourqt clearfix">
                                        <div class="filter-left clearfix">
                                            <div class="filter-tilte">
                                                <label>Payment History&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="filter-right divtable clearfix">
                                            <div class="cell">
                                                <span style="color: #7ac143;">*</span><label>Period</label>
                                            </div>
                                            <div class="cell">
                                                <input name="txtFromDate" type="text" id="txtFromDate" class="InputBox" style="width:80px;">
                                            </div>
                                            <div class="cell">
                                                <label>To</label>
                                            </div>
                                            <div class="cell">
                                                <input name="txtToDate" type="text" id="txtToDate" class="InputBox" style="width:80px;">
                                            </div>
                                            <div class="cell">
                                                <a href="#" onclick="FetchData('show');" class="btn btn-default btn-fourqt">Go <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fourqt-tbtreponsive fourqt-tbtreponsive22">
                                        <table id="tblDetails" width="100%" border="1" style="border-collapse: collapse;" class="table table-bordered table-fourqt">
                                            <thead style="background-color: #C7C7C7">
                                                <tr>
                                                    <th style="width: 4%">S.No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Payment Date</th>
                                                    <th>Amount</th>
                                                    <th class="noExl" style="width: 10%; text-align: center">Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







      


@stop
