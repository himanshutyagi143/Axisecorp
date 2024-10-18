<section class="contacts section notonchannel">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">Get <span class="text-primary">in touch</span></h2>
            <strong class="fade-title-right">contact</strong>
        </header>
        <div class="section-content">
            <div class="row-base row">
                <div class="col-address col-base col-md-4">
                    <p class="footer-p"><img src="{{ URL::asset('frontend/img/others/logo-blue.png')}}"
                                             alt="logo-blue.png"></p>
                    <p>At Axis Ecorp, we firmly believe that there is no shortcut to success. The Group’s endeavours
                        reflect the value we place in building long-term relationships, offering personalised and
                        transparent services, and staying ahead of the competition. </p>
					 <span><i class="fas fa-map-marker-alt"></i></span> 305, Gera Imperium Grand, Patto Plaza, Panaji,
                    Goa 403001 (INDIA)<br>
                    <span><i class="fas fa-phone"></i></span> +91 807-000-4400<br>
                    <span><i class="far fa-envelope"></i></span> info@axisecorp.com<br>
                    <span><i class="far fa-clock"></i></span> Mon-Sat: 7:00am - 7:00pm<br>

                    <ul class="social-list">
                        <li><a href="https://www.instagram.com/axisecorp/" class="fa fa2 fa-instagram insta"
                               target="_blank"></a></li>
                        <li><a href="https://twitter.com/AxisEcorp" class="fa fa5 fa-twitter" target="_blank"></a></li>
                        <li><a href="https://www.linkedin.com/company/axis-ecorp/" class="fa fa3 fa-linkedin"
                               target="_blank"></a></li>
                        <li><a href="https://www.facebook.com/AxisECorp/" class="fa fa4 fa-facebook"
                               target="_blank"></a></li>
                    </ul>

                </div>
                <div class="col-base  col-md-4">
                    <form class="js-ajax-form contact_form">
                        <div class="row-field row">
                            <div class="col-field col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="txtName" required
                                           placeholder="Name *">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="txtEmail" required
                                           placeholder="Email *">
                                </div>
                            </div>
                            <div class="col-field col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="telephone" name="txtPhone"
                                           placeholder="e.g. +1 702 123 4567" required>
                                    <span class="text-danger" id="contact_error"></span>
                                    <input type="hidden" name="page_reference" value="contact">
                                </div>
                            </div>
                            <div class="col-field col-sm-12 col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="txtMsg" id="textmsg"
                                              placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-message col-field col-sm-12">
                                <div class="form-group">
                                    <div class="success-message"><i class="fa fa-check text-primary"></i> Thank you!.
                                        Your message is sent successfully.
                                    </div>
                                    <div class="error-message">We're sorry, but something went wrong.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-submit text-right">
                            <button type="submit" class="btn btn-shadow-2 wow swing submit_contact">Send <i
                                        class="icon-next"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-base col-md-4">
                    <div class="fb-page" data-href="https://www.facebook.com/AxisECorp/" data-tabs="timeline"
                         data-width="" data-height="400" data-small-header="false" data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/AxisECorp/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/AxisECorp/">Axis ECorp</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer" class="footer">
    <div class="container">
        <div class="row-base row">
            <div class="col-base text-left-md col-md-3">
                <a href="/" class="brand">
                    <img src="{{ URL::asset('frontend/img/others/logo.png') }}" alt="Axis ecorp">
                </a>
            </div>
            <div class="text-center-md col-base col-md-6">
                <a href="/career" class="author-link">
                    Career
                </a>
                <a href="/disclaimer" class="author-link">
                    Disclaimer
                </a>
                <a href="/privacy-policy" class="author-link">
                    Privacy Policy
                </a>
                <a href="/terms-and-condition" class="author-link">
                    Terms & Conditions
                </a>
                <a href="/channel-partner-register" class="author-link">
                    Become A Channel Partner
                </a>
            </div>
            <div class="text-right-md col-base col-md-3">
                © 2021 Axis Ecorp | All Rights Reserved.
            </div>
        </div>
    </div>

</footer>


<div class="footer_project">
    <div class="container">

        <ul>
            <li><strong>Our Projects:</strong></li>
            <li><a href="/axisblues">Axis Blues </a></li>
            <li><a href="/yogvillas">Axis Yog Villas</a></li>
            <li><a href="/lakecity">Axis Lake City</a></li>
            <li><a href="/kncj">Axis KNCZ</a></li>
            <li><a href="/lakecityplaza">Axis Lake City Plaza</a></li>
        </ul>
    </div>
</div>


<div class="page-lines">
    <div class="container">
        <div class="col-line col-xs-4">
            <div class="line"></div>
        </div>
        <div class="col-line col-xs-4">
            <div class="line"></div>
        </div>
        <div class="col-line col-xs-4">
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
</div>
<div class="modal fade in" id="myModal2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body inq-form">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div>

                    <h3 class="text-center"><i class="fa fa-envelope"></i> GET IN TOUCH WITH US</h3>
                    <form class="js-ajax-form contact_form">
                        <div class="row-field row">
                            <div class="col-field col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="txtName" required
                                           placeholder="Name *">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="txtEmail" required
                                           placeholder="Email *">
                                </div>
                            </div>
                            <div class="col-field col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="telephone2" name="txtPhone" required
                                           placeholder="e.g. +1 702 123 4567">
                                    <input type="hidden" name="page_reference" value="enquiry">
                                </div>
                            </div>
                            <div class="col-field col-sm-12 col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="txtMsg" id="textmsg"
                                              placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-message col-field col-sm-12">
                                <div class="form-group">
                                    <div class="success-message"><i class="fa fa-check text-primary"></i> Thank you!.
                                        Your message is sent successfully.
                                    </div>
                                    <div class="error-message">We're sorry, but something went wrong.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-submit text-right">
                            <button type="submit" class="btn btn-shadow-2 wow swing submit_contact">Send <i
                                        class="icon-next"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- customer care thanks message form start --}}
<div class="modal fade in" id="thanks_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body inq-form">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div>
                    <h3 class="text-center">Our representative will contact you within 24 hours!!</h3>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- Customer Care thanks message modal form end --}}
<div class="mobile-section">
    <a href="" class="mobilebtn" title="Enquire Now" data-toggle="modal" data-target="#myModal2"> Enquire Now</a>
    <a href="tel:+91 807-000-4400" class="mobilebtn"> Tap To Call</a>
</div>
<!--======== Verification otp modal ======== -->

<div class="modal fade in" id="verification_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body inq-form">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div>

                    <h3 class="text-center">Verify Your Email Otp</h3>
                    <form id="verification_form" class="text-center">
                        <div class="form-group">
                            <input type="text" class="form-control" name="verification_code" required=""
                                   placeholder="Enter OTP">
                            <input type="hidden" value="" id="sender_email">
                        </div>
                        <div class="field">
                            <input type="submit" value="VERIFY" class="btn Click-here2" id="submit3">
                            <button class="btn verfication-hide" id="loader_gif3">
                                <image src="https://gifimage.net/wp-content/uploads/2017/08/loading-gif-transparent-25.gif"
                                       class="verification-loader"></image>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="footer_whatsup"><a href="https://api.whatsapp.com/message/ZBAXWGD2CUY7C1" target="blank"><img src="{{ URL::asset('frontend/img/others/wtsup-icon.png')}}" alt="whats up"></a></div>



<!-- Facebook Timeline Pages Script -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0&appId=2377100562398605&autoLogAppEvents=1"
        nonce="sbOIjwK8"></script>

<script src="{{ URL::asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/smoothscroll.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.actions.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.migration.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/rev-slider/revolution.extension.video.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/interface.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/lightbox/lity.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/intlTelInput.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/intlTelInput-jquery.min.js') }}"></script>
<script src="{{ URL::asset('frontend/js/slick.js') }}"></script>


<!--Start of Tawk.to Script-->
{{--<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
 var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
 s1.async=true;
 s1.src='https://embed.tawk.to/5fd84541a8a254155ab36c3b/1epict2up';
 s1.charset='UTF-8';
 s1.setAttribute('crossorigin','*');
 s0.parentNode.insertBefore(s1,s0);
})();
</script>--}}
<!--End of Tawk.to Script-->
<!-- Whatsapp widget for staging server -->
{{--<script async data-id="82284" src="https://cdn.widgetwhats.com/script.min.js"></script>--}}
<!-- Widget End-->
<!-- Whatsapp widget for live server -->
<script async data-id="82391" src="https://cdn.widgetwhats.com/script.min.js"></script>
<!-- Widget End-->
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(window).width() < 768 && $(this).scrollTop() > 300) {
                $(".mobile-section").show();
            } else {
                $(".mobile-section").hide();
            }
        });
    })
</script>
<script>
    $(function () {
        $('.tabs-nav a').click(function () {

            // Check for active
            $('.tabs-nav li').removeClass('active');
            $(this).parent().addClass('active');

            // Display active tab
            let currentTab = $(this).attr('href');
            $('.tabs-content div').hide();
            $(currentTab).show();

            return false;
        });
    });

    $(document).ready(function () {
        $(".menu_mobile").click(function () {
            $(".project_menu").slideToggle("slow");
        });
    });

    var x = window.matchMedia("(max-width: 700px)");
    if (x.matches) { // If media query matches
        $(".project_menu li a").click(function () {
            $(".project_menu").slideToggle("slow");
        });
    }

    //For Contact form
    $(document).ready(function () {
        $('.contact_form').submit(function (e) {
            e.preventDefault();
            $('.submit_contact').text('Sending...');
            $.ajax({
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                url: '/contactus',
                type: 'post',
                data: $(this).serialize(),
                success: function (response) {
                    //console.log(response);
                    if (response.status == 1) {
                        alert(response.msg + ': ' + response.email);
                        $('input[name="txtName"]').val('');
                        $("input[name='txtEmail']").val('');
                        $("input[name='txtPhone']").val('');
                        $("#textmsg").val('');
                        $('#myModal2,#axisbluesdownload,#kncjdownload,#lakecitydownload,#yogvillasdownload,#lakecityplazadownload,#application_form_download,#payment_plan_download').modal('hide');
                        $('#verification_modal').modal('show');
                        $('#sender_email').val(response.email);
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


    //verification form script

    $('#verification_form').submit(function (event) {
        event.preventDefault();
        $('#submit3').hide();
        $('#loader_gif3').show();
        var code = $('input[name="verification_code"]').val();
        var email = $('#sender_email').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            type: 'post',
            url: '/verifyOtp',
            data: {
                code: code,
                email: email
            },
            success: function (response) {
                if (response.status == 1) {
                    $('#submit3').show();
                    $('#loader_gif3').hide();
                    $('#verification_modal').modal('hide');
                    //$('verification_modal').hide();
                    alert(response.msg);
                    if (response.download_page == 'axisblues') {
                        /*let a = document.createElement('a');
                        a.href = "{{ URL::asset('frontend/brochures/AXIS-THE-BLUES.pdf')}}";
                        a.download = "AXIS-THE-BLUES.pdf";
                        a.click();*/
                        $('#thanks_form').show();
                        //window.location.replace("https://online.fliphtml5.com/mqomo/gpax/#p=1");
                        window.open('https://online.fliphtml5.com/mqomo/gpax/#p=1', '_blank');
                    } else if (response.download_page == 'yogvillas') {
                        /*let a=document.createElement('a');
                         a.href="{{ URL::asset('frontend/brochures/AXIS-THE-YOGVILLA.pdf')}}";
                         a.download = "AXIS-THE-YOGVILLA.pdf";
                         a.click();*/
                        $('#thanks_form').show();
                        //window.location.replace("https://online.fliphtml5.com/mqomo/sail/#p=1");
                        window.open('https://online.fliphtml5.com/mqomo/sail/#p=1', '_blank');
                    }
                    else if (response.download_page == 'lakecity') {
                        /*let a = document.createElement('a');
                        a.href = "{{ URL::asset('frontend/brochures/AXIS-THE-LAKECITY.pdf')}}";
                        a.download = "AXIS-THE-LAKECITY.pdf";
                        a.click();*/
                        $('#thanks_form').show();
                        //window.location.replace("https://online.fliphtml5.com/pjhya/wots/#p=1");
                        window.open('https://online.fliphtml5.com/pjhya/wots/#p=1', '_blank');
                    }
                    else if (response.download_page == 'kncj') {
                        /*let a=document.createElement('a');
                         a.href="{{ URL::asset('frontend/brochures/AXIS-THE-KNCJ.pdf')}}";
                         a.download = "AXIS-THE-KNCZ.pdf";
                         a.click();*/
                        $('#thanks_form').show();
                    }
                    else if (response.download_page == 'lakecityplaza') {
                        /*let a=document.createElement('a');
                         a.href="{{ URL::asset('frontend/brochures/AXIS-THE-LAKECITY-PLAZA.pdf')}}";
                         a.download = "AXIS-THE-LAKECITY-PLAZA.pdf";
                         a.click();*/
                        $('#thanks_form').show();
                        //window.location.replace("https://online.fliphtml5.com/mqomo/kxnd/#p=1");
                        window.open('https://online.fliphtml5.com/mqomo/kxnd/#p=1', '_blank');
                    }
                    else if (response.download_page == 'yogvillas_application_form') {
                        /*let a = document.createElement('a');
                        a.href = "{{ URL::asset('frontend/application_forms/Axis-Yog-Villas-Application-Form.pdf')}}";
                        a.download = "Axis-Yog-Villas-Application-Form.pdf";
                        a.click();*/
                        $('#thanks_form').show();
                    } else if (response.download_page == 'axisblues_application_form') {
                        /*let a=document.createElement('a');
                         a.href="{{ URL::asset('frontend/application_forms/Axis-Blues-Application-Form.pdf')}}";
                         a.download = "Axis-Blues-Application-Form.pdf";
                         a.click();*/
                        $('#thanks_form').show();
                    } else if (response.download_page == 'lakecity_application_form') {
                        /*let a = document.createElement('a');
                        a.href = "{{ URL::asset('frontend/application_forms/Axis-Lake-City-Application-Form.pdf')}}";
                        a.download = "Axis-Lake-City-Application-Form.pdf";
                        a.click();*/
                        $('#thanks_form').show();
                    } else if (response.download_page == 'lakecityplaza_application_form') {
                        /*let a = document.createElement('a');
                        a.href = "{{ URL::asset('frontend/application_forms/Axis-Lake-City-Plaza-Application-Form.pdf')}}";
                        a.download = "Axis-Lake-City-Plaza-Application-Form.pdf";
                        a.click();*/
                        $('#thanks_form').show();
                    } else if (response.download_page == 'lakecity_payment_plan') {
                        /*let a = document.createElement('a');
                        a.href = "{{ URL::asset('frontend/payment_plan/Axis-Lake-City-Payment-Plan.pdf')}}";
                        a.download = "Axis-Lake-City-Payment-Plan.pdf";
                        a.click();*/
                        $('#thanks_form').show();
                    } else if (response.download_page == 'lakecity_plaza_payment_plan') {
                        /*let a = document.createElement('a');
                        a.href = "{{ URL::asset('frontend/payment_plan/Axis-Lake-City-Plaza-Payment-Plaza.pdf')}}";
                        a.download = "Axis-Lake-City-Plaza-Payment-Plaza.pdf";
                        a.click();*/
                        $('#thanks_form').show();
                    }

                    setTimeout(function () {
                        window.location.reload();
                    }, 5000);

                } else {
                    alert(response.msg);
                    $('#submit3').show();
                    $('#loader_gif3').hide();
                    return false;
                }

            },
            error: function (response) {
                // console.log(response);
            }
        });
    });


    $('.js-scroll').click(function () {
        var headerHeight = 80;
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - headerHeight
        }, 500);
        return false;
    });


    // jQuery
    $("#telephone,#telephone2,#aixsbluesphone,#yogvillasphone,#lakecityphone,#kncjphone,#lakecityplazaphone").intlTelInput({
        initialCountry: "in",
        preferredCountries: ["in"],
        autoHideDialCode: false,
        nationalMode: false
    });

</script>



