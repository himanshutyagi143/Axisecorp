@extends('layouts.app')
@section('content')
    @include('includes.header')
    <div class="layout">
        @include('includes.sidebar')
        <div class="content">
            <section id="about" class="about section">
                <div class="container">
                    <header class="section-header">
                        <h1 class="section-title" style="font-size: 2.1875em;letter-spacing:0;font-weight: 400; text-transform: none;"><span class="text-primary" style="text-transform: uppercase; letter-spacing: .2em; font-weight: 400;">Axis ecorp </span><br> <span style="line-height: 0.9;">Real Estate Developers in Goa</span></h1>
                    </header>
                    <div class="section-content">
                        <div class="row-base row">
                           <div class="col-base col-sm-12 col-md-8">
                                <h2 class="col-about-title abt_title">As a trusted real estate developer and Reputed Builders in Goa Offering Smart Alternatives to Second Home Ownership your dream projects.</h2>
                                <div class="col-about-info">
                                    <p>We believe in raising the bar and setting new benchmarks. Our landmark projects are envisioned and executed by individuals who believe in the values of excellence and innovation. Inspired teams naturally provide excellent and dedicated client service. Therefore, we have created a workplace where opinions are respected, where everyone is invited to contribute to the success of our business, and where excellence is expected and rewarded. </p>
									<p>Our business is built on strong foundations of trust and mutual respect. Through our dedicated efforts, we have earned a name for ourselves as the reputed property developers of Goa. </p>
								</div>

                            </div>
                            <div class="clearfix visible-sm"></div>
                            <div class="col-base col-about-img col-sm-12 col-md-4">
                                <a href="https://www.youtube.com/watch?v=GInpS8NCzoU" data-lity>
                                    <img alt="380x370.jpg" class="img-responsive"
                                         src="/frontend/img/home/380x370.jpg" >
                                </a>
                            </div>


                            <div class=" col-sm-12 col-md-12">
                                <div class="col-base col-about-spec ">
                                    <h3 class="col-about-title">Our Legacy</h3>

                                    <div class="service-item col-sm-3 col-md-2">
                                        <img alt="education-icon.png" width="52"
                                             src="/frontend/img/home/education-icon.png">
                                        <h4>Education</h4>
                                    </div>
                                    <div class="service-item col-sm-3 col-md-2 home-ml-zero">
                                        <img alt="tech-icon.png" width="52"
                                             src="/frontend/img/home/tech-icon.png" >
                                        <h4>TECHNOLOGY</h4>
                                    </div>

                                    <div class="service-item col-sm-3 col-md-2">
                                        <img alt="realestate-icon.png" width="52"
                                             src="/frontend/img/home/realestate-icon.png">
                                        <h4>REAL ESTATE </h4>
                                    </div>


                                    <div class="service-item col-sm-3 col-md-2">
                                        <img alt="hospitality-icon.png" width="52"
                                             src="/frontend/img/home/hospitality-icon.png">
                                        <h4>HOSPITALIty</h4>
                                    </div>


                                    <div class="service-item col-sm-3 col-md-2">
                                        <img alt="healthcare-icon.png" width="52"
                                             src="/frontend/img/home/healthcare-icon.png">
                                        <h4>HEALTHCARE</h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <section class="projects section">
                <div class="container">
                    <h2 class="section-title">Our <span class="text-primary">projects</span></h2>
                </div>
                <div class="section-content">
                    <div class="projects-carousel js-projects-carousel ">
                        <div class="project">
                            <a href="/axisblues">
                                <figure>
                                    <img alt="1-480x880.jpg" src="/frontend/img/home/1-480x880.jpg">
                                    <figcaption>
                                        <h3 class="project-title">
                                            AXIS BLUES
                                        </h3>
                                        <h4 class="project-category">
                                            Nature Living
                                        </h4>
                                        <div class="project-zoom"></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="project project-light">
                            <a href="/villas-in-goa" title="">
                                <figure>
                                    <img alt="2-480x880.jpg" src="/frontend/img/home/2-480x880.jpg">
                                    <figcaption>
                                        <h3 class="project-title">
                                            AXIS YOG VILLAS
                                        </h3>
                                        <h4 class="project-category">
                                            A Vacationer's Paradise
                                        </h4>
                                        <div class="project-zoom"></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="project">
                            <a href="/lakecity" >
                                <figure>
                                    <img alt="3-480x880.jpg" src="/frontend/img/home/3-480x880.jpg">
                                    <figcaption>
                                        <h3 class="project-title">
                                            AXIS LAKE CITY
                                        </h3>
                                        <h4 class="project-category">
                                            There's so much to live
                                        </h4>
                                        <div class="project-zoom"></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="project">
                            <a href="/kncz" >
                                <figure>
                                    <img alt="4-480x880.jpg" src="/frontend/img/home/4-480x880.jpg">
                                    <figcaption>
                                        <h3 class="project-title">
                                            AXIS KNCZ
                                        </h3>
                                        <h4 class="project-category">
                                            Kncz Valley
                                        </h4>
                                        <div class="project-zoom"></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>


                        <div class="project">
                            <a href="/lakecityplaza">
                                <figure>
                                    <img alt="5-480x880.jpg" src="/frontend/img/home/5-480x880.jpg">
                                    <figcaption>
                                        <h3 class="project-title">
                                            AXIS LAKE CITY PLAZA
                                        </h3>
                                        <h4 class="project-category">
                                            LAKE CITY PLAZA
                                        </h4>
                                        <div class="project-zoom"></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="services" class="services section">
                <div class="container">
                    <header class="section-header">
                        <h2 class="section-title"><span class="text-primary">COMMITTED TO </span> EXCELLENCE</h2>
                    </header>
                    <div class="section-content">
                        <div class="row-base row">
                            <div class="col-base col-service col-sm-6 col-md-3 wow fadeInUp axisfadeup">
                                <div class="service-item">
                                    <img alt="icon-architecture.png" src="/frontend/img/home/icon-architecture.png">
                                    <h4>OUR BELIEF</h4>
                                    <p>We implement the highest quality standards in every project. There are no shortcuts to success and brilliance. </p>
                                </div>
                            </div>
                            <div class="col-base col-service col-sm-6 col-md-3 wow fadeInUp axis-delay-fadeup" data-wow-delay="0.3s">
                                <div class="service-item">
                                    <img alt="icon-interiors.png" src="/frontend/img/home/icon-interiors.png">
                                    <h4>BEST QUALITY</h4>
                                    <p>We are committed to providing our clients top-notch quality standards, dedicated project management, and intuitive client servicing.  </p>
                                </div>
                            </div>
                            <div class="clearfix visible-sm"></div>
                            <div class="col-base col-service col-sm-6 col-md-3 wow fadeInUp axis-delay-fadeup" data-wow-delay="0.6s">
                                <div class="service-item">
                                    <img alt="icon-planing.png" src="/frontend/img/home/icon-planing.png">
                                    <h4>ON TIME</h4>
                                    <p>We value our time, and so, we wouldn’t think of wasting yours—our clients can bank on timely delivery without quality compromises. </p>
                                </div>
                            </div>

                            <div class="col-base col-service col-sm-6 col-md-3 wow fadeInUp axis-delay-fadeup" data-wow-delay="0.6s">
                                <div class="service-item">
                                    <img alt="icon-exp.png" src="/frontend/img/home/icon-exp.png">
                                    <h4>EXPERIENCED</h4>
                                    <p>With years of cumulative experience, we know how to get the job right the very first time. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="clients section">
                <div class="container">
                    <header class="section-header">
                        <h2 class="section-title">News & <span class="text-primary">Updates</span></h2>
                        <strong class="fade-title-left">News</strong>
                    </header>
                    <div class="section-content">
                        <ul class="news-list" id="homepagenews">
                            <!-- Home page new comes here -->
                        </ul>
                    </div>
                    <div class="section-content">
                        <a href="/" class="btn btn-shadow-2">View All <i class="icon-next"></i></a>
                    </div>
                </div>
            </section>

            <div class="modal fade blognotavail" id="promoModal" role="dialog">
                    <img class="img-thumbnail"  data-dismiss="modal" src="{{asset('images\promo.png')}}">
            </div>
            @include('includes.footer')

            <script type="text/javascript">
                $(document).ready(function () {
                    var str = '';
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                        type: 'post',
                        url: '/homePageLatestNews',
                        success: function (response) {
                            var data = response.data;
                            // console.log(response);
                            if (response.status == "Success") {
                                $.each(data, function (index, value) {
                                    str = str + '<li>';
                                    str = str + '' +
                                        '<div class="col-sm-6 col-md-4 wow fadeInUp">' +
                                        '<div class="service-item">' +
                                        '<div class="image_holder">' +
										'<a href="/news/' + value.slug + '">';
                                    if(value.city != null){
                                     str = str + '<span>'+value.city+'</span>';   
                                    }
                                    str = str  + '<img alt="'+value.image_name+'" src="' + value.image + '">' +
                                        '</a></div>' +
                                        '<div class="recent-post-time">' + value.blog_date + '</div>' +
                                        '<h4><a href="/news/' + value.slug + '">' + value.title + '</a></h4>' +
                                        '<p>' + value.content + '</p>' +
                                        '<a href="/news/' + value.slug + '">Read More</a>' +
                                        '</div> </div> </li>';
                                });

                                str = str + '<div class="clearfix visible-sm"></div>';
                            }
                            //console.log(str);
                            $('#homepagenews').html(str);
                        }
                    });

                    @if (date('Y-m-d') <= env('PROMO_DATE', ''))
                        setTimeout(function () {
                            $('#promoModal').modal('show');
                        }, 1000);
                    @endif
                });
            </script>
@endsection

