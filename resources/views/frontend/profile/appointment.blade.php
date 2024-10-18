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
                                <div class="filter-fourqt clearfix">
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
                                </div>

                                <div class="page-content-style">
                                    <div class="fourqt-applicant clearfix">

                                        <div class="fourqt-applicant-first">
                                            <h5 class="main_heading">First Applicant
                                            </h5>
                                            <div class="fild_set">
                                                <ul>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_LblName">Mr. Ankur gupta  </span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Address
                                                        </div>
                                                        <div class="sub_nameAddress" style="height: auto;">
                                                            <span id="ctl00_ContentPlaceHolder1_lblmaddress">529-C REGENT SHIPRA SUN CITY INDIRAPURAM <br>Ghaziabad, Uttar Pradesh- 201010</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Contact No.
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblFLandline">-01204102935</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Mobile No.
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblconNo">9717991968</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            E-mail ID
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblFEmailId">ankur24aug@gmail.com</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblPan1">PAN No.</span>
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblpannos">APFPG1171E</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Date of Birth
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblFDob">-</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="ctl00_ContentPlaceHolder1_tblSecApplicant" class="fourqt-applicant-second">
                                            <h5 class="main_heading">Second Applicant
                                            </h5>
                                            <div class="fild_set">
                                                <ul>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblsname">-</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Address
                                                        </div>
                                                        <div class="sub_nameAddress">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSecAddress">-</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Contact No.
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSLandline">-01204102935</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="name">
                                                            Mobile No.
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSecContactNo">-</span>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            EMail ID
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSecEmailId">-</span>
                                                        </div>
                                                    </li>

                                                    <li class="clearfix">
                                                        <div class="name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblPan2">Passport No.</span>
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSPanNo"></span>
                                                        </div>

                                                    </li>
                                                    <li class="clearfix">

                                                        <div class="name">
                                                            Date of Birth
                                                        </div>
                                                        <div class="sub_name">
                                                            <span id="ctl00_ContentPlaceHolder1_lblSDob">-</span>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fourqt-applicant clearfix">



                                    </div>

                                    <div class="fourqt-applicant clearfix">



                                    </div>

                                    <div class="fourqt-applicant clearfix">


                                        <div class="fourqt-applicant-second">
                                        </div>
                                    </div>
                                </div>
                                <div class="alertError">
                                    <span id="ctl00_ContentPlaceHolder1_lblError"></span>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>








      


@stop
