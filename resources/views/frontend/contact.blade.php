{{-- body class --}}
@section('body_class', 'header-fixed page no-sidebar header-style-2 topbar-style-1 menu-has-search')

@section('contact-current-menu', 'current-menu-item')


{{-- jquery validate --}}
@section('extra_jquery_validate')
    <script src="assets/js/jquery-validate.js"></script>
    <script src='//trkr.scdn1.secure.raxcdn.com/t/5f6b61747c0dac565f8686b3.js'></script>
@stop

@extends('frontend.layouts.front')
@section('content')
    <!-- Featured Title -->
    <div id="featured-title" class="featured-title clearfix">
        <div id="featured-title-inner" class="container clearfix">
            <div class="featured-title-inner-wrap">
                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail">
                            <a href="index.html" class="trail-begin">Home</a>
                            <span class="sep">|</span>
                            <span class="trail-end">Contact</span>
                        </div>
                    </div>
                </div>

            </div><!-- /.featured-title-inner-wrap -->
        </div><!-- /#featured-title-inner -->
    </div>
    <!-- End Featured Title -->

    <!-- Main Content -->
    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">
                        <!-- CONTACT -->
                        <div class="row-contact">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="20"
                                             data-smobile="20"></div>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="themesflat-headings style-2 clearfix">
                                            <h2 class="heading">CONTACT US</h2>
                                            <div class="sep has-width w80 accent-bg clearfix"></div>

                                            @if(Session::has('success-msg'))
                                                <div class="themesflat-spacer clearfix" data-desktop="36" data-mobile="35"
                                                     data-smobile="35">
                                                </div>
                                                <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                                            @endif
                                        </div>
                                        <div class="themesflat-spacer clearfix" data-desktop="36" data-mobile="35"
                                             data-smobile="35">
                                        </div>
                                        @if(!Session::has('success-msg'))
                                            <div class="themesflat-contact-form style-2 clearfix">
                                            <script src='//trkr.scdn1.secure.raxcdn.com/t/forms/5f6b61747c0dac565f8686b3/5f6b62a17c0dac565586db45.js' data-form-id='5f6b62a17c0dac565586db45'></script>
                                            {{--<p class="sub-heading">For more information on our services please contact
                                                    us.</p>
                                                <form action="contact" method="post" accept-charset="utf-8"
                                                      class="form-submit contact-form wpcf7-form">
                                                    {{ csrf_field() }}
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                            <input type="text" tabindex="1" id="name" name="txtName"
                                                                   value="" class="wpcf7-form-control" placeholder="Name*"
                                                                   required>
                                                        </span>
                                                    <span class="wpcf7-form-control-wrap your-phone">
                                                            <input type="text" tabindex="2" id="phone" name="txtPhone"
                                                                   value="" class="wpcf7-form-control" placeholder="Phone">
                                                        </span>
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                            <input type="email" tabindex="3" id="email" name="txtEmail"
                                                                   value="" class="wpcf7-form-control"
                                                                   placeholder="Your Email*" required>
                                                        </span>
                                                    <span class="wpcf7-form-control-wrap your-subject">
                                                            <input type="text" tabindex="4" id="subject" name="txtSubject"
                                                                   value="" class="wpcf7-form-control"
                                                                   placeholder="Subject">
                                                        </span>
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                           <textarea name="txtMsg" tabindex="5" cols="40" rows="10"
                                                                     class="wpcf7-form-control wpcf7-textarea"
                                                                     placeholder="Message*" required></textarea>
                                                        </span>
                                                    <span class="wrap-submit">
                                                            <input type="submit" value="SEND US"
                                                                   class="submit wpcf7-form-control wpcf7-submit"
                                                                   id="submit" name="btnSubmit">
                                                        </span>
                                                </form>--}}
                                            </div><!-- /.themesflat-contact-form -->
                                        @endif
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0"
                                             data-smobile="35"></div>
                                        <div class="themesflat-headings style-2 clearfix">
                                            <h2 class="heading">INFORMATION</h2>
                                            <div class="sep has-width w80 accent-bg clearfix"></div>
                                        </div>
                                        <div class="themesflat-spacer clearfix" data-desktop="36" data-mobile="35"
                                             data-smobile="35"></div>
                                        <div class="themesflat-tabs style-1 w168 clearfix">
                                            <ul class="tab-title clearfix">

                                                <li class="item-title active">
                                                    <span class="inner">Goa Office </span>
                                                </li>
                                                <li class="item-title">
                                                    <span class="inner">NCR Office </span>
                                                </li>
                                                <li class="item-title">
                                                    <span class="inner">Corporate Office </span>
                                                </li>
                                            </ul>

                                            <div class="tab-content-wrap clearfix">
                                                <div class="tab-content">
                                                    <div class="item-content">
                                                        <ul>
                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-map-marker"></span>
                                                                    <span class="text">305, Gera Imperium Grand, Patto Area, Panaji, Goa 403001 (INDIA)</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-phone"></span>
                                                                    <span class="text">CALL US : <a
                                                                                href="tel:+91 8070004400">+91 807-000-4400</a></span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-envelope"></span>
                                                                    <span class="text">EMAIL : <a
                                                                                href="mailto:info@axisecorp.com">info@axisecorp.com</a></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- /.tab-content -->
                                                <div class="tab-content">
                                                    <div class="item-content">
                                                        <ul>
                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-map-marker"></span>
                                                                    <span class="text">H/134, Sector 63, Noida - 201301 (INDIA) </span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-phone"></span>
                                                                    <span class="text">CALL US : <a
                                                                                href="tel:+91 8070004400">+91 807-000-4400</a></span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-envelope"></span>
                                                                    <span class="text">EMAIL : <a
                                                                                href="mailto:info@axisecorp.com">info@axisecorp.com</a></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div><!-- /.tab-content -->
                                                <div class="tab-content">
                                                    <div class="item-content">
                                                        <ul>
                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-map-marker"></span>
                                                                    <span class="text">117/N/88, Kakadeo Kanpur - 208025 (INDIA)</span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-phone"></span>
                                                                    <span class="text">CALL US : <a
                                                                                href="tel:+91 8070004400">+91 807-000-4400</a></span>
                                                                </div>
                                                            </li>

                                                            <li class="clearfix">
                                                                <div class="inner">
                                                                    <span class="fa fa-envelope"></span>
                                                                    <span class="text">EMAIL : <a
                                                                                href="mailto:info@axisecorp.com">info@axisecorp.com</a></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- /.tab-content -->
                                            </div>
                                        </div><!-- /.themesflat-tabs -->
                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobile="35"
                                             data-smobile="35"></div>
                                        <!-- <div class="themesflat-map"></div>-->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="themesflat-spacer clearfix" data-desktop="78" data-mobile="60"
                                             data-smobile="60"></div>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </div>
                        <!-- END CONTACT -->
                    </div><!-- /.page-content -->
                </div><!-- /#inner-content -->
            </div><!-- /#site-content -->
        </div><!-- /#content-wrap -->
    </div><!-- /#main-content -->
@stop