$(document).ready(function () {
	//modal msg
	$('.success-message,.error-message').hide();

	$('.banner_section .owl-carousel').owlCarousel({
		loop: true,
		margin: 15,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav: true,
		autoplay: true,
		autoplayTimeout: 5000,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			768: {
				items: 1
			},

			1025: {
				items: 1
			}
		}
	});



	$('.specification_sec ul.tabs li').click(function () {
		var tab_id = $(this).attr('data-tab');
		$('.specification_sec ul.tabs li').removeClass('current');
		$('.specification_sec .tab-content').removeClass('current');
		$(this).addClass('current');
		$("#" + tab_id).addClass('current');
	})


	$('.unit_plan ul.tabs li').click(function () {
		var tab_id = $(this).attr('data-tab');
		$('.unit_plan ul.tabs li').removeClass('current');
		$('.unit_plan .tab-content').removeClass('current');
		$(this).addClass('current');
		$("#" + tab_id).addClass('current');
	})


	$('.layout_plan ul.tabs li').click(function () {
		var tab_id = $(this).attr('data-tab');
		$('.layout_plan ul.tabs li').removeClass('current');
		$('.layout_plan .tab-content').removeClass('current');
		$(this).addClass('current');
		$("#" + tab_id).addClass('current');
	})


	
	$(".toogle_menu").click(function(){
		$(".menu ul").slideToggle();
	});



	//new added contact form
	
  	$(window).scroll(function() {
      if ($(window).width() < 768) {
          $(".mobile-section").show();
      } else {
          $(".mobile-section").hide();
      }
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
	          alert(response.msg+': '+response.email);
	          $('input[name="txtName"]').val('');
	          $("input[name='txtEmail']").val('');
	          $("input[name='txtPhone']").val('');
	          $("#textmsg").val('');
	          $('#yogvilla_landing_modal').modal('hide');
	          $('#verification_modal').modal({backdrop: 'static', keyboard: false});
	          // $('#verification_modal').modal('show');
	          $('#sender_email').val(response.email);
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

$('#verification_form').submit(function(event){
   event.preventDefault();
   $('#submit3').hide();
   $('#loader_gif3').show();
   var code  = $('input[name="verification_code"]').val();
   var email = $('#sender_email').val();
   var srd_id = $('#srd_id').val();
   $.ajax({
       type: 'post',
       url: '/verifyOtp',
       data: {
           code : code,
           email: email,
           "_token": $('#_token').val(),
           srd_id: srd_id,
       },
       success: function (response) {
       	console.log(response);
          if(response.status == 1)
          {
              $('#submit3').show();
              $('#verification_modal').modal('hide');
              
              setTimeout(function(){
                window.location.replace('/thank-you'); 
              }, 1000);
              
          } else
          {
              alert(response.msg);
              $('#submit3').show();
              $('#loader_gif3').hide();
              return false;
          }
          
       },
       error:function(response)
       {
          //console.log(response);
       }
   });
});

});