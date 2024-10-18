jQuery.noConflict();
jQuery(document).ready(function($){
	
		"use strict";

		function mycarousel_initCallback(carousel) {
			
			var $ul = $("#mycarousel ul:first ");
			var $li = $("#mycarousel ul:first li");

			
			$('.jcarousel-control a:first').addClass("active");
			$($ul).find("li:first").addClass("active");
			$("a#mycarousel-prev").addClass("disabled");
			
			$('.jcarousel-control a').bind('click', function(){
				//To add & remove active class to ELEMENTS
				$($li).removeClass("active");
				$($li).eq($(this).index()).addClass("active");
				
				//TO add & remove active class to current page element
				$(".jcarousel-control a").removeClass("active");
				$(this).addClass("active");
				
				//To add & remove disabled class to PREV PAGINTION
				if( $(this).index() == 0){
					$("a#mycarousel-prev").addClass("disabled");
				}else{
					$("a#mycarousel-prev").removeClass("disabled");
				}
				
				//To add & remove disabled class to NEXT PAGINTION
				if($(this).next("a").length==0){
					$("a#mycarousel-next").addClass("disabled");
				}else{
					$("a#mycarousel-next").removeClass("disabled");
				}
				
				carousel.scroll($.jcarousel.intval($(this).text()));
				return false;
			});
			
			$('.jcarousel-scroll select').bind('change', function() {
				carousel.options.scroll = $.jcarousel.intval(this.options[this.selectedIndex].value);
				return false;
			});
			
			$('#mycarousel-next').bind('click', function(){
				$current = $('.jcarousel-control a.active');
				$($current).removeClass("active");
				
				if($($current).next("a").length){
					$($current).next("a").addClass("active");
				}else{
					$('.jcarousel-control a:last').addClass("active");
				}
				
				//To add & remove active class to ELEMENTS
				$($li).removeClass("active");
				$($li).eq($('.jcarousel-control a.active').index()).addClass("active");
				//END
				
				if($('.jcarousel-control a.active').next("a").length == 0){
					$(this).addClass("disabled");
				}
				
				$("a#mycarousel-prev").removeClass("disabled");

				if(!$(this).hasClass("disabled")){
					carousel.next();
				}
				
				return false;
			});
			
			$('#mycarousel-prev').bind('click', function() {
				
				$current =  $('.jcarousel-control a.active');
				
				if($($current).index() != 0) {
					$($current).removeClass("active");
					$($current).prev("a").addClass("active");
				}
				
				//To add & remove active class to ELEMENTS
				$($li).removeClass("active");
				$($li).eq($('.jcarousel-control a.active').index()).addClass("active");
				//END
				
				if($('.jcarousel-control a.active').prev("a").length == 0){
					$(this).addClass("disabled");
				}
				
				$("a#mycarousel-next").removeClass("disabled");
				
				if(!$(this).hasClass("disabled")){
					carousel.prev();
				}
				return false;
			});
		} //mycarousel_initCallback()
	
	/* Nice Scroll */
	var isMacLike = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i)?true:false;
	if( !isMacLike ) {
		$("html").niceScroll({zindex:99999,cursorborder:"1px solid #323232"});
	}

	/* Sticky Header */
	$("#header").sticky({ topSpacing: 0 });
	$('.more').css({"cursor":"pointer"});
	$('.blogmore').css({"cursor":"pointer"});
	/* One page navigation */
	$('#main-menu').onePageNav({
		currentClass : 'current_page_item',
		filter		 : ':not(.external)',
		scrollSpeed  : 750,
		scrollOffset : 85
	});
	
	/* Mean Menu for Mobile */
	$('nav#main-menu').meanmenu({
		meanMenuContainer :  $('header #menu-container'),
		meanRevealPosition:  'right',
		meanScreenWidth   :  767
	});
	
	
	$('#home .scroll-down a').click(function(){
		$.scrollTo('#about', 1400, { offset: { top: -85 }});
	});
	
	
	/* Goto Top */
	$().UItoTop({ easingType: 'easeOutQuart' });
	
	/* bxSlider */
	if( $('.slider').length ) {
		$('.slider').bxSlider({
			mode: 'fade',
			auto: true,
			infiniteLoop: true,
  			hideControlOnEnd: true,
			pause: 3000
		});
	}
	
	//Portfolio Single page Slider
	if( ($(".portfolio-slider").length) && ($(".portfolio-slider li").length > 1) ) {
		$('.portfolio-slider').bxSlider({ 
		auto:false, useCSS:false, autoHover:true, adaptiveHeight:true });
	}//Portfolio Single page Slider
	
	
	/* Parallax Section */
	$('.parallax').each(function(){
		$(this).bind('inview', function (event, visible) {
			if(visible == true) {
				$(this).parallax("50%", 0.3);
			} else {
				$(this).css('background-position','');
			}
		});
	});
	
	/* PrettyPhoto For Portfolio */
	if($(".gallery").length) {
		$(".gallery a[data-gal^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false,social_tools: false,deeplinking:false});		
	}
	
	/* Donut Chart */
	$('.dt-sc-donutchart1').one('inview', function (event, visible){
		if (visible == true) {
			$(".dt-sc-donutchart1").donutchart({'size': 200, 'donutwidth': 2, 'fgColor': '#fe6b35', 'bgColor': '#f5f5f5', 'textsize': 30 });
			$(".dt-sc-donutchart1").donutchart("animate");
			
			$(".dt-sc-donutchart2").donutchart({'size': 200, 'donutwidth': 2, 'fgColor': '#665de5', 'bgColor': '#f5f5f5', 'textsize': 30 });
			$(".dt-sc-donutchart2").donutchart("animate");
			
			$(".dt-sc-donutchart3").donutchart({'size': 200, 'donutwidth': 2, 'fgColor': '#36a6a0', 'bgColor': '#f5f5f5', 'textsize': 30 });
			$(".dt-sc-donutchart3").donutchart("animate");
			
			$(".dt-sc-donutchart4").donutchart({'size': 200, 'donutwidth': 2, 'fgColor': '#f4d30f', 'bgColor': '#f5f5f5', 'textsize': 30 });
			$(".dt-sc-donutchart4").donutchart("animate");
		}
	});
	
	/*Testimonial  Carousel*/
	if($(".dt-sc-testimonial-carousel").length) {
		$('.dt-sc-testimonial-carousel').carouFredSel({
			responsive: true,
			auto: false,
			width: '100%',
			height: 'variable',
			prev: '.testimonial-prev',
			next: '.testimonial-next',
			scroll: 1,
			items: { height: 'variable', visible: { min: 1,max: 2} }
		});
	}
	
	//Smart Resize Start
	$(window).smartresize(function(){
		/* Blog Template Isotope */
		if( $(".apply-isotope").length ){
			$(".apply-isotope").each(function(){
				$(this).isotope({itemSelector : '.column',transformsEnabled:false,masonry: { gutterWidth: 25} });
			});
		}
		
		if( $('.portfolio-container').length ){
			var $width = $('.portfolio-container').hasClass("no-space") ? 0 : 0;
			$('.portfolio-container').css({overflow:'hidden'}).isotope({itemSelector : '.column', masonry: { gutterWidth: $width } });
		}
	});//Smart Resize End
	
	//Window Load Start
	$(window).load(function(){
		/* Blog Template Isotope */
		if( $(".apply-isotope").length ){
			$(".apply-isotope").each(function(){
				$(this).isotope({itemSelector : '.column',transformsEnabled:false,masonry: { gutterWidth: 25} });
			});
		}
		
		if( $('.portfolio-container').length ){
			var $width = $('.portfolio-container').hasClass("no-space") ? 0 : 0;
			$('.portfolio-container').isotope({
				filter: '*',
				masonry: { gutterWidth: $width },
				animationOptions: { duration: 750, easing: 'linear', queue: false  }
			});
		}
		
		if($("div.sorting-container").length){
			$("div.sorting-container a").click(function(){
				$("div.sorting-container a").removeClass("active-all");
				var $width = $('.portfolio-container').hasClass("no-space") ? 0 : 0;
				var selector = $(this).attr('data-filter');
				$(this).addClass("active-all");
				
				$('.portfolio-container').isotope({
					filter: selector,
					masonry: { gutterWidth: $width },
					animationOptions: { duration: 750, easing: 'linear', queue: false  }
				});
				return false;
			});
		}

		/* Tweets */
		if( $('.tweets').length ){

			$(".tweets").tweet({
				modpath: 'js/twitter/',
				username: "envato",
				count: 3,
				loading_text: "loading tweets...",
				template: "{text} {time}"
			});

			$('.tweet_list').carouFredSel({
				width: 'auto',
				height: 'auto',
				scroll: 1,
				direction: 'up',
				prev: '.carousel-arrows .prev-arrow',
				next: '.carousel-arrows .next-arrow',
				items: {
					height: 'auto',
					visible: { min: 1, max: 1}
				}
			});
		}
	});//Window Load End
	
	//Google Map
	if( $('#map').length ) {
		$('#map').gMap({
			address: 'No: 58 A, East Madison St, Baltimore, MD, USA',
			zoom: 16,
			markers: [ { 'address' : 'No: 58 A, East Madison St, Baltimore, MD, USA' } ],
			scrollwheel: false
		});
	}
	
	//Animation
	$(".animate").each(function(){
		$(this).bind('inview', function (event, visible) {
			var $this = $(this),
			$animation = ( $this.data("animation") !== undefined ) ? $this.data("animation") : "slideUp";
			$delay = ( $this.data("delay") !== undefined ) ? $this.data("delay") : 300;
			
			if (visible == true) {
				setTimeout(function() { $this.addClass($animation);	},$delay);
			}else{
				setTimeout(function() { $this.removeClass($animation); },$delay);
			}
		});
	});
	
	//Related Post Carousel
	if( $("#mycarousel").length ){
		
		
		
		//Related Post
		$("#mycarousel").jcarousel({
			scroll: 1,
			initCallback: mycarousel_initCallback,
			buttonNextHTML: null,
			buttonPrevHTML: null
		});
	}//Related Post Carousel
	
	$('form[name="contact-form"]').submit(function(){
		var $form = $(this),
			$msg = $(this).prev('div.message'),
			$action = $form.attr('action');
			
			$.post($action,$form.serialize(),function(data){
				$form.fadeOut("fast", function(){ $msg.hide().html(data).show('fast'); });
			});
		return false;
	});
	
	//Animate Number...
	$('.dt-sc-num-count').each(function(){
	  $(this).one('inview', function (event, visible) {
		  if(visible === true) {
			  var val = $(this).attr('data-value');
			  $(this).animateNumber({ number: val	}, 2000);
		  }
	  });
	});
	
	
	// Portfolio load more
	var portfolio_track_click = 0;
	$('.more').click(function(){
		if(portfolio_track_click == 0) 
		{
			$('.more').html('Loading...');
			$.ajax({
				type: "POST",
				url: "portfolio_load_more.html",
				dataType: "html",
				cache: false,
				msg : '',
				success: function(msg){
					$('.portfolio-container').append(msg);
					$(window).trigger( 'resize' );
					$('.portfolio-container').isotope( 'reloadItems' ).isotope();
					$("a[data-gal^='prettyPhoto[gallery]']").prettyPhoto({
					show_title: false,
					social_tools: false,
					deeplinking: false
					});
					$('.more').text('Load More');
					portfolio_track_click++;
				}
			});
		}
		if(portfolio_track_click > 0){
			$('.more').text('No more Posts to show').css({"cursor":"default"});
		}
	});
		
	// Blog load more
	var blog_track_click = 0;	
	$('.blogmore').click(function(){
		if(blog_track_click == 0) 
		{
			$('.blogmore').html('Loading...');
				$.ajax({
					type: "POST",
					url: "blog_load_more.html",
					dataType: "html",
					cache: false,
					success: function(msg){
						$('.blog-items').append(msg);
						$('.blog-items').isotope( 'reloadItems' ).isotope();
						$('.blogmore').text('Load More');
						blog_track_click++;
					}
				});
		}
		if(blog_track_click > 0){
			$('.blogmore').text('No more Posts to show').css({"cursor":"default"});
		}
	});
	
});
//MeanMenu Custom Scroll...
function funtoScroll(x, e) {
	"use strict";
	var str = new String(e.target);
	var pos = str.indexOf('#');
	var t = str.substr(pos);
	
	var eleclass = jQuery(e.target).prop("class");
	
	if(eleclass == "external") {
		window.location.href = e.target;	
	} else {
		jQuery.scrollTo(t, 750, { offset: { top: -53 }});
	}
	
	jQuery(x).parent('.mean-bar').next('.mean-push').remove();		
	jQuery(x).parent('.mean-bar').remove();

	jQuery('nav#main-menu').meanmenu({
		meanMenuContainer :  jQuery('header #menu-container'),
		meanRevealPosition:  'right',
		meanScreenWidth   :  767	
	});
	
	e.preventDefault();
}(jQuery);