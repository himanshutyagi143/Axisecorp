@extends('layouts.app')
@section('content')
   @include('includes.header')
      <div class="layout">
      	@include('includes.sidebar')
      	<div class="content">
            <div class="container">
               <div class="row career_sec">
                  <h3>Start Your Career With <span class="text-primary">Axis Ecorp</span></h3>
                  <h2>Browse Current Vacancies</h2>
                  <div class="job_container">
                  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					 @if(isset($jobs))
					   @foreach($jobs as $job) 
						  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading{{$job->id}}">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$job->id}}" aria-expanded="true" aria-controls="collapse{{$job->id}}">
							         {{$job->title}} <i class="accordion_icon fa fa-plus"></i>
							        </a>
							      </h4>
							    </div>
							    <div id="collapse{{$job->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$job->id}}">
							      <div class="panel-body">
							      	{!! $job->description !!}
									  <div class="apply_now_career"><a href="" class="btn btn-shadow-2 wow swing upload_btn_resume" data-jobid="{{$job->id}}" title="Enquire Now" data-toggle="modal" data-target="#myModal3"> Apply Now <span class="icon-next"></span></a></div>
							      </div>
							    </div>
						  </div>
					   @endforeach
					 @endif 
					</div>
                  </div>
                  <!-- Apply Modal For Jobs -->
					<div class="modal fade in" id="myModal3" role="dialog" >
					  <div class="modal-dialog">
					      <div class="modal-content">
					          <div class="modal-body inq-form">
					              <button type="button" class="close" data-dismiss="modal">×</button>
					              <div>
					               <h3 class="text-center">APPLY HERE</h3>
					               <form class="js-ajax-form job_form" enctype="multipart/form-data">
					               	<input type="hidden" name="job_id" id="job_id" value="">
					                  <div class="row-field row">
					                     <div class="col-field col-sm-12 col-md-12">
					                        <div class="form-group">
					                           <input type="text" class="form-control" name="txtName" placeholder="Your Name *" required>
					                        </div>
					                        <div class="form-group">
					                           <input type="email" class="form-control" name="txtEmail" required placeholder="Email *">
					                        </div>
					                     </div>
					                     <div class="col-field col-sm-12 col-md-12">
					                        <div class="form-group">
					                           <input type="tel" class="form-control" name="txtPhone" placeholder="Phone *" required>
					                        </div>
					                     </div>
					                     <div class="col-field col-sm-12 col-md-12">
					                        <div class="form-group">
					                          <label for="resume" class="upload_resume"><i class="fa fa-upload" aria-hidden="true"></i> Upload Resume</label>
					                          <span id="resume_name"></span>
					                          <div id="error_resume" class="text-danger"></div>
					                          <input type="file" name="resume" id="resume" class="hide" data-multiple-caption="{count} files selected"  />
					                        </div>
					                     </div>
					                     <div class="col-field col-sm-12 col-md-12">
					                        <div class="form-group">
					                           <textarea name="message" cols="5" rows="5" class="form-control" placeholder="Message or write about yourself" id="job_message"></textarea>
					                        </div>
					                     </div>
					                     <div class="col-field col-sm-12">
					                        <div class="form-group">
					                           <div class="success-messages hide" id="success-messages"><i class="fa fa-check text-primary"></i>Thank You!,You Applied Successfully.</div>
					                           <div class="error-messages hide" id="error-messages">We're sorry, but something went wrong.</div>
					                        </div>
					                     </div>
					                  </div>
					                  <div class="form-submit text-right"><button type="submit" class="btn btn-shadow-2 submit_job">Apply <i class="icon-next"></i></button></div>
					               </form>   
					              </div>
					          </div>
					      </div>
					  </div>
					</div>
               </div>
            </div>
         @include('includes.footer')
         <script type="text/javascript">
         	$(document).ready(function(){
         		$('.fa').css({"float":"right","padding":"5px"});
         		$('.panel-title > a').click(function() {  
				    $(this).find('i').toggleClass('fa-plus fa-minus');
				    $(this).parent().parent().parent().siblings().find('i').removeClass('fa-minus').addClass('fa-plus');
				});

				//job apply form script
				$('.job_form').submit(function(e){
				  e.preventDefault();
				  if($("input[name='resume']").val() == ''){
						$('#error_resume').html('Please select your resume.');
						return false;				  	
				  }
				  $('.submit_job').text('applying...');
				  var formData = new FormData(this);
				  // $(this).serialize()
				  $.ajax({
				      headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
				      url: '/jobaplly',
				      type: 'post',
				      data: formData,
				      processData: false,
					  contentType: false,
				      success: function () {
				         $('input[name="txtName"]').val('');
				         $("input[name='txtEmail']").val('');
				         $("input[name='txtPhone']").val('');
				         $("input[name='resume']").val('');
				         $("#job_message").val('');
				         $('.submit_job').text('apply');
				         $('#resume_name').text('');
				         $('#success-messages').show();
				      },
				      error: function () {
				         $('#error-messages').show();
				      }
				   });
				});

				$('.upload_btn_resume').click(function(){
					var jobid = $(this).attr('data-jobid');
					$('#job_id').val(jobid);
				});

				$('#resume').change(function() {
				  var i = $(this).prev('label').clone();
				  var file = $('#resume')[0].files[0].name;
				  $('#resume_name').text(file);
				  $('#error_resume').text('');
				});
         	});
         </script>
@endsection