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
                             <h3>Book <span> Units</span></h3>
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
                                    <div class="filter-left clearfix">
                                    </div>
                                    <div class="filter-right">
                                        <span class="style1">Customer Name :</span> <span class="style1">
                                            <span id="ctl00_ContentPlaceHolder1_LblRegid" style="font-weight:bold;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span></span>
                                    </div>
                                </div> 
																
                                <div class="page-content-style">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


@stop
