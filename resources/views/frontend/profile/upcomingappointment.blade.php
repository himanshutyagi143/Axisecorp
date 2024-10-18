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
                             <h3>Upcoming<span> Appointment</span></h3>
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


                            <script type="text/javascript">
                                function OpenPDF(Rid, Iid) {
                                    window.open('DocumentDetail_Print.aspx?RID=' + Rid + '&IID=' + Iid, 'DemandLetter', 'width=800,height=500,scrollbars=1,resizable=yes,menubar=no,left=100,top=100');
                                }

                            </script>
                            <div class="page-content">
							 <div class="filter-fourqt clearfix">
                                    <div class="filter-left clearfix">
                                        <div class="filter-tilte">

                                            <label> <span class="style1">Select Property</span></label>
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
                                        <span id="ctl00_ContentPlaceHolder1_lblError" style="color:Red;"></span>
                                    </div>

                                    <div class="table-content">
                                        <div class="schedule_heading_wrap clearfix">
                                            <div class="align-center schedule_heading">
                                                <span id="ctl00_ContentPlaceHolder1_Label1">Appointment Details</span>
                                            </div>
                                        </div>
                                        <div class="fourqt-tbtreponsive">

                                        </div>
                                        <div class="alertError">
                                            <span id="ctl00_ContentPlaceHolder1_lblNorecordFound" style="color:#7ac143;">You don't have appointment.</span>
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
