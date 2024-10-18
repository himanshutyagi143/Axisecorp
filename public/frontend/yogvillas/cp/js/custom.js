$(document).ready(function () {


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


	$(document).ready(function () {
		$(".toogle_menu").click(function(){
			$(".menu ul").slideToggle();
		});
	});


	//new added contact form
	$(document).ready(function() {
      $(window).scroll(function() {
          if ($(window).width() < 768) {
              $(".mobile-section").show();
          } else {
              $(".mobile-section").hide();
          }
      });
  	});

});