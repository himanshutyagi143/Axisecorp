<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AXIS LAKE CITY</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,500;1,600;1,700;1,800&display=swap"
          rel="stylesheet">
    <link href="{{ URL::asset('frontend/lakecity/lakecity_one/css/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('frontend/lakecity/lakecity_one/css/owl.css') }}" rel="stylesheet">


</head>

<body>


<div class="main_container">
    <div class="header">
        <div class="banner_section">
            <div class="logo"><img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/logo.png') }}"
                                   alt="Axis Lake city "></div>
            <div class="owl-carousel">

                <div class="item">
                    <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/main_banner.jpg') }}" alt="">
                    <div class="content">
                        <h1><i>Live by the Lake</i></h1>
                    </div>
                </div>


                <div class="item">
                    <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/main_banner2.jpg') }}" alt="">
                    <div class="content">
                        <h1><i>Once in a Lifetime<br> Opportunity</i></h1>
                    </div>
                </div>


                <div class="item">
                    <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/main_banner3.jpg') }}" alt="">
                    <div class="content">
                        <h1><i>Listen to Your Heart</i></h1>
                    </div>
                </div>


                <div class="item">
                    <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/main_banner4.jpg') }}" alt="">
                    <div class="content">
                        <h1><i>Green & eco-friendly <br>Community Living</i></h1>
                    </div>
                </div>


            </div>


            <div class="new-form" id="top-form">
                <div class="main_enq">
                    <h3>Show Your Interest</h3>
                    <div class="pd">
                        <form method="post" class="contact_form">
                            <input type="hidden" name="srd_id" id="srd_id" value="60fa655ea6bbc91c174e3651">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="page_reference" value="lakecity_landingpage_one">
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
    </div>

    <div class="inq_sec">
        <div class="container">
            <div class="left">
                <h2>
                    State-of-the art<br>
                    clubhouse and community area</span>
                </h2>

                <p>Axis Lake City features a state-of-the-art clubhouse
                    with indulgent features, top-of-the-line amenities, and undeniable convenience.<br>
                    The well-appointed community area makes your home feel like a luxury hotel.
                <p>

            </div>
            <div class="right" id="show_your_interest">
                <a href="#top-form" class="scrollTo"><img
                            src="{{ URL::asset('frontend/lakecity/lakecity_one/images/button.jpg') }}"></a>


            </div>
        </div>
    </div>


    <div class="perfect_section">
        <div class="container">


            <h2 class="heading">Features</h2>


            <div class="carousel-wrap">
                <div class="owl-carousel">
                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-1.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>LUXURY SPA</h3>
                        </div>
                    </div>

                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-2.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>MEDITATION CENTRE</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-3.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>FITNESS CENTRE AND GYM</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-4.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>SWIMMING POOL</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-5.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>COMMUNITY THEATRE</h3>
                        </div>
                    </div>

                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-6.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>DINING OPTION</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-7.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>CHESS ROOM</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-8.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>POOL & SNOOKER HALLS</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-9.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>LIBRARY & BOOK CAFE</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-10.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>CONVENIENCE OUTLET</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-11.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>ON-CALL MEDICAL SERVICE <br>& PALLIATIVE CARE</h3>
                        </div>
                    </div>


                    <div class="item">
                        <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/perfect-12.jpg') }}" alt="">
                        <div class="cnt">
                            <h3>SECURITY AND CCTV SETUP</h3>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <div class="feth_sec">
        <div class="container">
            <h2 class="heading">Your imagination Your Canvas</h2>
            <p>Axis Lake City offers the best in flexibility and personalization.</p>
            <ul>
                <li>
                    <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/icon-1.png') }}">
                    <p>FLEXIBILITY IN<br>
                        INVESTMENT
                    </p>
                </li>

                <li>
                    <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/icon-2.png') }}">
                    <p>FLEXIBILITY IN<br>
                        DESIGN
                    </p>
                </li>


                <li>
                    <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/icon-3.png') }}">
                    <p>FLEXIBILITY IN<br>
                        DEVELOPMENT
                    </p>
                </li>

            </ul>
        </div>
    </div>


    <div class="location_sec">
        <div class="container">

            <div class="left">
                <h2 class="heading">Impressive Air Connectivity</h2>
                <p>In close proximity to the MOPA Airport which is under development,
                    the project features impressive connectivity and great tourism potential.
                    Your property investment here is destined to see a handsome appreciation in value.
                </p>

                <p style="color:#f3402c;"><strong>Personalized In­house Helipad facility, you can reach your dream
                        location in just 1hr from
                        Mumbai & ……</strong></p>

                <p><strong>MOPA-GOA INTERNATIONAL ,</strong> already under early stage of construction & will be
                    operational
                    soon, 18KM away from Site.
                </p>

                <p><strong>Dabolim Airport</strong> operates as a civil enclave in a military airbase. In fiscal year
                    2017–18, the airport
                    handled over 7.6 million passengers.
                </p>

                <p><strong>Sambra Airport.</strong> The new terminal building was inaugurated by Civil aviation minister
                    on 14
                    September 2017, 78KM away from Site.
                </p>

                <p><strong>Sindhudurg Airport</strong> at Chipi-Parule Close to the seashore. A familiarization flight
                    landed on 12
                    September 2018. Commercial flights are expected before Aug 2020, 80KM away from Site.
                </p>
            </div>

            <div class="right">
                <img src="{{ URL::asset('frontend/lakecity/lakecity_one/images/airport.jpg') }}" alt="">
            </div>
        </div>
    </div>


    <div class="broker_sec">
        <div class="left"><a href="#top-form" class="scrollTo">Enquire Now</a>
        </div>


    </div>

    <div class="footer_sec">
        <div class="container">
            <div class="left">
                <a href="https://axisecorp.com/disclaimer" target="blank">Disclaimer</a>
                <a href="https://axisecorp.com/privacy-policy" target="blank">Privacy Policy</a>
                <a href="https://axisecorp.com/terms-and-condition" target="blank">Terms & Conditions </a>
            </div>

            <div class="right">
                <p> © 2021 Axis Ecorp | All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ URL::asset('frontend/lakecity/lakecity_one/js/owl.js') }}"></script>
<script src="{{ URL::asset('frontend/lakecity/lakecity_one/js/custom.js') }}"></script>
<script>
    $(".Click-here").on('click', function () {
        $(".custom-model-main").addClass('model-open');
    });
    $(".close-btn, .bg-overlay").click(function () {
        $(".custom-model-main").removeClass('model-open');
    });

</script>

<script>
    $('.perfect_section .owl-carousel').owlCarousel({
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
    });

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
                            window.location.replace('/lakecity');
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
</body>
</html>
