$(document).ready(function(){
	
	
	
		$('.banner_sec .owl-carousel').owlCarousel({
		loop:true,
		margin:15,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav:true,
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
	
	
	
	
	$('.banner .owl-carousel').owlCarousel({
		loop:true,
		margin:15,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav:true,
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
	
	
	
	
	
	

	
	
		$('.gallery .owl-carousel').owlCarousel({
		loop:true,
		margin:15,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav:true,
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
	
	
	
			$('.testimonials_sec .owl-carousel').owlCarousel({
		loop:true,
		margin:15,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav:true,
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
	
	
	
        $(document).ready(function() {

            $(".first_tab").champ();

            $(".accordion_example").champ({
                plugin_type: "accordion",
                side: "left",
                active_tab: "3",
                controllers: "true"
            });

            $(".second_tab").champ({
                plugin_type: "tab",
                side: "right",
                active_tab: "1",
                controllers: "false"
            });

            $(".third_tab").champ({
                plugin_type: "tab",
                side: "",
                active_tab: "4",
                controllers: "true",
                ajax: "true",
                show_ajax_content_in_tab: "4",
                content_path: "html.txt"
            });
            $(".multipleTab").champ({
                //plugin_type :  "accordion",
                multiple_tabs: "true"
            });

        });
		
		
		
		
		
		
var  mn = $(".page-head");
mns = "page-head-scrolled";
hdr = $('.page-head').height();

$(window).scroll(function() {
if( $(this).scrollTop() > hdr ) {
mn.addClass(mns);
} else {
mn.removeClass(mns);
}
});

		
    
	
	
	
	

$(document).ready(function(){
  $(".menu-opener").click(function(){
    $(".overview-nav").slideToggle();
  });
});







	
});





	
