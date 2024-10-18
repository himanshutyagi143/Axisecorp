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
                            <h3>Raise a<span> Query</span></h3>
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
						
						<form method="post" action="/user/querymail" enctype="multipart/form-data">
                             {{ csrf_field() }}
                            <div class="raiseWrap">
                                <div>
                                    <span id="ctl00_ContentPlaceHolder1_lblerror"></span>
                                </div>
                                <div class="formwrapbox">
                                    <div class="formonline">
									  <div id="successMessage">
									   @if(Session::has('success-msg-registered'))
                                          <p  class="alert alert-success">{{ Session::get('success-msg-registered') }}</p>
                                       @endif
									   </div>
                                        <div class="online-row clearfix">
                                            <div class="ontitle">
                                                <span style="color: red">*</span><label> Type of Query</label>
                                            </div>
                                            <div class="oninput">
                                                <select name="querytype" id="querytype" style="width:100%;" Required>
                                                    <option value="<--Select-->">&lt;--Select--&gt;</option>
                                                    <option value="Allotment Letter">Allotment Letter</option>
                                                    <option value="Booking Confirmation">Booking Confirmation</option>
                                                    <option value="Demand related">Demand related</option>
                                                    <option value="General Enquiry.">General Enquiry.</option>
                                                    <option value="Receipt">Receipt</option>

                                                </select>
                                            </div>
                                        </div>

										{{-- <div class="online-row clearfix">
                                            <div class="ontitle">
                                                <span style="color: red">*</span><label>  Property/Unit</label>
                                            </div>
                                            <div class="oninput">

                                                <select name="propertyunit" id="propertyunit" style="width:100%;" Required>
                                                    <option value="Eco Village-2-805">Eco Village-2-805</option>

                                                </select>
                                            </div>
                                        </div> --}}

                                        <div class="online-row clearfix">
                                            <div class="ontitle">
                                                <span style="color: red">*</span><label> Message</label>
                                            </div>
                                            <div class="oninput">
                                                <textarea name="message" rows="2" cols="20" id="message" Required onblur="return chkLength(this.id, 1000);" style="height:130px;width:100%;"></textarea>
                                                <br>
                                                <b>(Max length 1000 Char)</b>
                                            </div>
                                        </div>
										<input type="hidden" name="useremail" value="{{Auth::user()->email}}">



                                        <div class="online-row clearfix">
                                            <div class="ontitle">
                                                <label>&nbsp;</label>
                                            </div>
                                            <div class="oninput">
                                                  <button type="submit" class="btn btn-primary">Post</button>
												  {{-- <a id="ctl00_ContentPlaceHolder1_btnpost" class=" btn btn-default btn-fourqt" href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$btnpost','')">
                                                    Post <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
	$("document").ready(function(){
    setTimeout(function(){
        $('#successMessage').remove();
    }, 2000 ); 
});
</script>

@stop
