<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Axis Dapoli</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

<link href="{{ URL::asset('frontend/landingpage/dapoli/css/custom.css') }}" rel="stylesheet">
<link href="{{ URL::asset('frontend/landingpage/dapoli/css/font-awesome.css') }}" rel="stylesheet">

</head>

<body>
<div class="container">
<div class="top_section mobile_top">
<div class="bg-video-wrap">
<video src="{{ URL::asset('frontend/landingpage/dapoli/images/home-video.mp4') }}" loop muted autoplay>
</video>
<div class="overlay">
</div>
</div>


<div class="logo"><a href="#"><img src="{{URL::asset('frontend/landingpage/dapoli/images/logo.png') }}"></a></div>
<div class="call_top"><a href="tel:+91 22 3500-5653">Call us at: <strong>+91 22 3500-5653</strong></a></div>
<div class="heading_top"><img src="{{ URL::asset('frontend/landingpage/dapoli/images/landing-top.png') }}"></div>
<div class="logo2"><img src="{{ URL::asset('frontend/landingpage/dapoli/images/logo-main.png') }}"></div>


<div class="new-form mobile-none">
<div class="main_enq">
<h3>Show Your Interest</h3>
<div class="pd">
<form method="post" class="contact_form">
<input type="hidden" name="srd_id" id="srd_id" value="615eda85a6bbc922a3526e01">
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
<input type="hidden" name="page_reference" value="dapoli_landingpage_one">
<p><input class="inp" required type="text" name="txtName" placeholder="Name *"></p>
<p><input class="inp" name="txtPhone" required placeholder="phone *"></p>
<p><input class="inp" name="txtEmail" required placeholder="Email *"></p>
<p style="text-align:center;">
<button type="submit" class="submit_btn submit_contact">Submit</button>
</p>
</form>
</div>
</div>
</div>

</div>


<div class="new-form desktop-none">
<div class="main_enq">
<h3 id="flip">Show Your Interest <i class="fa fa-chevron-down" aria-hidden="true"></i>
</h3>
<div class="pd" id="panel">
<form method="post" class="contact_form">
<input type="hidden" name="srd_id" id="srd_id" value="615eda85a6bbc922a3526e01">
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
<input type="hidden" name="page_reference" value="dapoli_landingpage_one">
<p><input class="inp" required type="text" name="txtName" placeholder="Name *"></p>
<p><input class="inp" name="txtPhone" required placeholder="phone *"></p>
<p><input class="inp" name="txtEmail" required placeholder="Email *"></p>
<p style="text-align:center;">
<button type="submit" class="submit_btn submit_contact">Submit</button>
</p>
</form>
</div>
</div>
</div>


<div class="plot_sec">
<div class="heading"><img src="{{ URL::asset('frontend/landingpage/dapoli/images/comeing-soon.png') }}"></div>
</div>


<div class="call_us">
<div class="hading">Call us to know more</div>
<a href="tel:+91 22 3500-5653">CONTACT</a>
</div>
</div>

<div class="footer_sec">
<div class="container">
<div class="left">
<a href="https://axisecorp.com/disclaimer" target="blank">Disclaimer</a>
<a href="https://axisecorp.com/privacy-policy" target="blank">Privacy Policy</a>
<a href="https://axisecorp.com/terms-and-condition" target="blank">Terms &amp; Conditions </a>
</div>

<div class="right">
<p> © 2021 Axis Ecorp | All Rights Reserved.</p>
</div>
</div>
</div>





<script src="js/lightbox-plus-jquery.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script> 



<script>
    $(".Click-here").on('click', function () {
        $(".custom-model-main").addClass('model-open');
    });
    $(".close-btn, .bg-overlay").click(function () {
        $(".custom-model-main").removeClass('model-open');
    });

</script>


<script>
    /* $('.perfect_section .owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    }); */

    $(document).ready(function () {
        $('.contact_form').submit(function (e) {
            e.preventDefault();
            $('.submit_contact').text('Sending...');
            $.ajax({
                // headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                url: '/contactus',
                type: 'post',
                data: $(this).serialize(),
                success: function (response) {
                    //console.log(response);
                    if (response.status == 1) {
                        alert(response.msg);
                        $('input[name="txtName"]').val('');
                        $("input[name='txtEmail']").val('');
                        $("input[name='txtPhone']").val('');
                        //$("#textmsg").val('');
                        //$('#yogvilla_landing_modal').modal('hide');
                        //$('#verification_modal').modal({backdrop: 'static', keyboard: false});
                        // $('#verification_modal').modal('show');
                        //$('#sender_email').val(response.email);
                        $('#show_your_interest').hide();
                        setTimeout(function () {
                            window.location.replace('/');
                        }, 2000);
                    } else if (response.status == 'error') {
                        alert(response.message.txtPhone);
                    } else {
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
    });
</script>


<script>
    $('.scrollTo').click(function () {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500);
        return false;
    });

</script>





<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>









</body>
</html>
