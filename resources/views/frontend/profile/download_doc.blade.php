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
                            <h3>Your<span> Documents</span></h3>
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
						
							     <div id="ctl00_ContentPlaceHolder1_tblSecApplicant" class="fourqt-applicant-second" style="width: 100%;margin-top: 10px;padding-left: 0px;">
							 	 @if(Session::has('success'))
                        		<p class="alert alert-danger">{{ Session::get('success') }}</p>
                      			@endif    	
                                            <h5 class="main_heading">Your Document
                                            </h5>
                                            <div class="fild_set">
											 
								  	@foreach($data as $document)
																  
									@if(isset($document->templet_name))
										@if($document->templet_name)										
								  <div  class="form-group  col-sm-6" id="url{{$document->id}}">
                                     <div class="tab-content tab-content-news">
                                        <div class="user-block">
                                            <span class="username usr_bottom">
                                           <div class="row">
                                            <div class="col-sm-8" style="height: 26px;overflow: auto;">
                                                <a target="_blank" href="/templets/details/{{$document->id}}" target="_blank" style="word-wrap: break-word;" class="profile-username">{{$document->templet_name}}</a>
                                              </div>
                                               
                                           
											 {{--
											   <div class="col-sm-1" >
											   <a title="View" target="_blank" href="/templets/details/{{$document->id}}" class="  "><i class="fa fa-book" aria-hidden="true"></i></a>
											   </div>
                                               --}}
                                              <div class="col-sm-1">

											  {{--
											 
                                                <a title="Download" id="download" href="/templets/download/{{$document->id}}" class="  " data-placement="top" data-original-title="Download" style="display:none;"><i class="fa fa-download" aria-hidden="true" style="width: 25px; height: 22px;margin-left: 3px;"></i> </a>
											
											
											   
											   
												<a id="generate"  class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show">Generate </a><i class="fa fa-spinner fa-spin" id="spinner" style="display:none;"></i>
												
												
											 
												<a title="Form Fill" target="_blank" href="/templets/generate/{{$document->id}}" class="  "><i class="fa fa-eye" data-original-title="Download" aria-hidden="true"></i></a>
										
											  --}}
											  <button id="generate_{{$document->id}}" class="btn btn-primary btn-sm" onclick="generate(this.id,{{$document->user_id}})">Generate </button><i class="fa fa-spinner fa-spin" id="spinner_{{$document->id}}" style="display:none;"></i>
											   {{--
											   @elseif($document->count>1)
											   <a title="Download" id="download" href="/templets/download/{{$document->id}}" class="  " data-placement="top" data-original-title="Download" ><i class="fa fa-download" aria-hidden="true" style="width: 25px; height: 22px;margin-left: 3px;display:none;"></i> </a>
											   --}}											   
											   <a style="display: none;" title="Download" id="download_{{$document->id}}" href="/templets/download/{{$document->id}}" onclick="downloadPdf(this.id)" class="  " data-placement="top" data-original-title="Download" ><i class="fa fa-download" aria-hidden="true" style="width: 25px; height: 22px;margin-left: 3px;"></i> </a>
											   <i class="fa fa-spinner fa-spin" id="downloadspinner_{{$document->id}}" style="display:none;"></i>
                                              </div> 
											   
											   
											</div>
                                            </span>
                                          
												
												<div  class="pro_dis">
												<p>{{$document->templet_name}}</p>
												</div>
												
												<div style="overflow-y:auto;height: 50px;">
												<span  style="float: right;"><i class="fa fa-calendar margin-r-5" style="color: #16aad8;"></i>{{$document->created_at}}</span>
												</div>
												
													
													 
											
                                         </div>                                      
                                     </div>                                      
                                  </div>
							    @endif
							   @endif
						    @endforeach 		
                           </div>
                         </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


<script>
	function generate(id,user_id)
	{
	  var myId=id.split("_");
       mynewId=myId[1];
		var token ='{{csrf_token()}}';
		$.ajax({
			type:"post",
			url:"/generate-pdf-link",
			data:{id:user_id,_token:token},
			success:function(resp)
			{		
					$('#generate_'+mynewId).hide();				
					$('#spinner_'+mynewId).show();	
					setTimeout(function(){ 
					$('#spinner_'+mynewId).hide();	
					$('#download_'+mynewId).show();
					 }, 3000);
					
					
							
				
			}
		});


	}
	function downloadPdf(id)
	{
	   var myId=id.split("_");
       mynewId=myId[1];
					$('#download_'+mynewId).hide();				
					$('#downloadspinner_'+mynewId).show();	
					setTimeout(function(){ 
					$('#downloadspinner_'+mynewId).hide();	
					$('#generate_'+mynewId).show();
					 }, 3000);												

	}

</script>




      


@stop
