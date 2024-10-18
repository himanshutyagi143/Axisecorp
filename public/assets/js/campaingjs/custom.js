$(document).ready(function(){
	
	
	$('.testimonials_sec .owl-carousel').owlCarousel({
		loop:true,
		margin:15,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav:false,
		autoplay:true,
		autoplayTimeout:5000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			768:{
				items:1
			},
			
			1025:{
				items:1
			}
		}
	});
	
	
	$('.latest_blog .owl-carousel').owlCarousel({
		loop:true,
		margin:40,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav:false,
		autoplay:true,
		autoplayTimeout:5000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			768:{
				items:3
			},
			
			1025:{
				items:3
			}
		}
	});


	
	$('.gototop').click(function(){
		 $("html, body").animate({ scrollTop: 0 }, 1500);
	});
	
	
	$(window).scroll(function(){
		var winscroll = $(window).scrollTop();
		if(winscroll >= 300){
			$('.navigation').addClass('fix');
			$('.gototop').fadeIn();
		}
		else
		{
			$('.gototop').fadeOut();
			$('.navigation').removeClass('fix');
		}
	});	

	
	
	
	

	
});

