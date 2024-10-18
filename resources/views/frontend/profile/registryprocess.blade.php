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
                           <h3>Registry<span> Process</span></h3>
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
                                function ShowDocuments() {
                                    var Id = document.getElementById('ctl00_ContentPlaceHolder1_hidRegId').value;
                                    window.open('Customer_Registry_Process_Document.aspx?id=' + Id, 'Customer_Registry_Process_Document', 'height=600,width=700,top=100,left=100,ScreenX=100,ScreenY=100,resizable=yes');
                                    return false;
                                }

                                function ShowPaymentPopup() {
                                    var Id = document.getElementById('ctl00_ContentPlaceHolder1_hidRegId').value;
                                    var amount = document.getElementById('ctl00_ContentPlaceHolder1_HFAmount').value;
                                    var amt = amount;
                                    window.open('Customer_Stamp_Duty_Payment.aspx?id=' + Id + "&amt=" + amt, 'Customer_Stamp_Duty_Payment.aspx', 'height=500,width=700,top=100,left=100,ScreenX=100,ScreenY=100,resizable=yes');
                                    return false;
                                }

                                function DownloadFile() {
                                    alert('hello');
                                    window.location.reload();
                                    return true;
                                }

                                function OpenFileDialog() {
                                    $("#FUForm").click();
                                }

                                function MyFunction(FilePath) {
                                    window.open('RegistryFormPopup.aspx?File=' + FilePath + '', 'RegistryFormPopup', 'height=400,width=600,top=100,left=100,ScreenX=100,ScreenY=100,resizable=yes');
                                }

                            </script>
                            <style>
                                .LabelName {
                                    width: 180px;
                                }

                                .colon {
                                    width: 20px;
                                }
                            </style>
                            <div class="page-content cust-pages">
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

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>






      


@stop
