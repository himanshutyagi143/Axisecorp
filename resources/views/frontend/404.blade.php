@section('body_class', 'header-fixed sidebar-right header-style-2 topbar-style-1 menu-has-search')
@extends('frontend.layouts.front')
@section('content')




<section class="mainwrapper">
  <div class="col-12 lines-section">
    <div class="container-fluid relative h-100">
      <div class="col-12 h-100">
        <span class="first-line common-line"></span>
        <span class="second-line common-line"></span>
        <span class="third-line common-line"></span>
        <span class="fourh-line common-line"></span>
        <span class="fifth-line common-line"></span>
      </div>
    </div>
  </div>
  <style type="text/css">
    .not-found-cont,
    .foun-cont {
      z-index: 2;
      padding: 70px 0px;
      text-align: center;
    }

    .not-found-cont h1 {
      color: #62c1c5;
      font-size: 144px;
      margin: 0px;
      font-weight: 600;
      line-height: 164px;
    }

    .not-found-cont h2 {
      color: #62c1c5;
      font-size: 22px;
      margin: 0px;
      font-weight: 500;
      line-height: 32px;
    }

    .not-found-cont h3 {
      color: #62c1c5;
      font-size: 32px;
      margin: 10px 0px 0px 0px;
      font-weight: 500;
    }

    .not-found-cont span {
      clear: both;
      display: block;
      color: #787878;
      font-size: 16px;
      font-weight: 500;
      margin: 30px 0px 20px 0px;
    }

    .not-found-cont a {
      display: inline-block;
      width: 240px;
      height: 55px;
      border: 1px solid #676767;
      text-align: center;
      text-transform: uppercase;
      color: #676767;
      font-size: 16px;
      font-weight: 600;
      line-height: 55px;
      margin: 0px 15px;
    }

    .foun-cont {
      background: #e5fafb;
      padding: 80px 0px;
    }

    .found-container {
      position: relative;
    }

    .foun-cont img {
      position: absolute;
      bottom: 19px;
      left: 0;
    }

    @media all and (max-width: 700px) {
      .not-found-cont a {
        margin: 8px 15px;
      }
    }
  </style>
  <section class="not-found-cont relative">
    <div class="container-fluid">
      <div class="col-12">
        <h1>404</h1>
        <h2>Oh no! The contents of this page got lost!</h2>
        <h3>Don't panic, we're on the mission!</h3>
        <span>In the meantime</span>
        <a href="/" data-event-category="Section" data-event-action="Click" data-event-name="Return to home">Return to home</a>
        <a href="/contact" data-event-category="Section" data-event-action="Click" data-event-name="Speak to us">Speak to us</a>
      </div>
    </div>
  </section>


  @stop