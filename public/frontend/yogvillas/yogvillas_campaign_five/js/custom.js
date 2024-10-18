$(document).ready(function(){
	$(".Click-here").on('click', function() {
	   $(".custom-model-main").addClass('model-open');
	}); 
	$(".close-btn, .bg-overlay").click(function(){
	   $(".custom-model-main").removeClass('model-open');
	});	

    // jQuery 
	$("#telephone2").intlTelInput({
	  initialCountry:"in",
	  preferredCountries: ["in" ],
	  autoHideDialCode:false,
	  nationalMode:false
	});

	//For Contact form

	$('.contact_form').submit(function(e){
	  e.preventDefault();
	  $('.submit_contact').text('Sending...');
	  $.ajax({
	      // headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
	      url: '/contactus',
	      type: 'post',
	      data: $(this).serialize(),
	      success: function (response) {
	        //console.log(response);
	        if(response.status == 1)
	        {
	          // alert(response.msg+': '+response.email);
	          $('input[name="txtName"]').val('');
	          $("input[name='txtEmail']").val('');
	          $("input[name='txtPhone']").val('');
	          $("#textmsg").val('');
	          $('#yogvilla_landing_modal').modal('hide');
	          //$('#verification_modal').modal({backdrop: 'static', keyboard: false});
	          // $('#verification_modal').modal('show');
	          //$('#sender_email').val(response.email);
              alert('Thank you for your interest! Our Sales Team will connect with you shortly.');
              setTimeout(function(){
               window.location.href = "https://axisecorp.com/";
              }, 2000);
	        }else if(response.status == 'error')
	        {
	          alert(response.message.txtPhone);
	        }else{
	          alert(response.msg);
	          //window.location.reload();
	        }
	        
	         $('.submit_contact').text('SEND');
	         // $('.col-message, .success-message').show();
	      },
	      error: function () {
	         $('.col-message, .error-message').show();
	      }
	   });
	}); 

	//verification form script

	// $('#verification_form').submit(function(event){
	//    event.preventDefault();
	//    $('#submit3').hide();
	//    $('#loader_gif3').show();
	//    var code  = $('input[name="verification_code"]').val();
	//    var email = $('#sender_email').val();
	//    var srd_id = $('#srd_id').val();
	//    $.ajax({
	//        type: 'post',
	//        url: '/verifyOtp',
	//        data: {
	//            code : code,
	//            email: email,
	//            "_token": $('#_token').val(),
	//            srd_id: srd_id,
	//        },
	//        success: function (response) {
	//        	console.log(response);
	//           if(response.status == 1)
	//           {
	//               $('#submit3').show();
	//               $('#verification_modal').modal('hide');
	//               alert('Thank you! for showing your interest.');
	//               setTimeout(function(){
	//                window.location.reload();
	//               }, 2000);
	              
	//           } else
	//           {
	//               alert(response.msg);
	//               $('#submit3').show();
	//               $('#loader_gif3').hide();
	//               return false;
	//           }
	          
	//        },
	//        error:function(response)
	//        {
	//           //console.log(response);
	//        }
	//    });
	// });

	//for fb and google srd get from url
	var srd_id = location.search.replace('?','').split('&')[0].replace('srd=','');
	$('#srd_id').val(srd_id);
});

