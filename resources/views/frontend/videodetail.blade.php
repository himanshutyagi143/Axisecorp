{{-- body class --}}
@section('meta')
	<title>Video | Real Estate Insights | Axis ecorp</title>
	@if($video=="construction_dec20")
		<meta name="keywords" content="Construction, Updates, Dec 2020"/>
		<meta name="description" content="Construction Updates Dec 2020"/>
		<meta property="og:title" content="Construction Updates Dec 2020" />
		<meta property="og:type" content="article" />
		<meta property="og:description" content="Construction Updates December 2020" />
		<meta property="og:image" content="{{asset('fronted/img/nature/jan_vol_1.jpg')}}" />
		<meta property="og:url" content="{{url('/axisblues/videodetail/construction_dec20')}}" />
		<meta property="og:video" content="{{asset('fronted/img/nature/Construction_Book_Dec20.mp4')}}" />
		<link rel="canonical" href="{{url('/axisblues/videodetail/construction_dec20')}}">
	@elseif($video=="construction_oct20")
		<meta name="keywords" content="Construction, Updates, Oct 2020"/>
		<meta name="description" content="Construction Updates Oct 2020"/>
		<meta property="og:title" content="Construction Updates Oct 2020" />
		<meta property="og:type" content="article" />
		<meta property="og:description" content="Construction Updates October 2020" />
		<meta property="og:image" content="{{asset('fronted/img/nature/jan_vol_1.jpg')}}" />
		<meta property="og:url" content="{{url('/axisblues/videodetail/construction_oct20')}}" />
		<meta property="og:video" content="{{asset('fronted/img/nature/Construction_Book_Oct20.mp4')}}" />
		<link rel="canonical" href="{{url('/axisblues/videodetail/construction_oct20')}}">
	@elseif($video=="construction_july20")
		<meta name="keywords" content="Construction, Updates, July 2020"/>
		<meta name="description" content="Construction Updates July 2020"/>
		<meta property="og:title" content="Construction Updates July 2020" />
		<meta property="og:type" content="article" />
		<meta property="og:description" content="Construction Updates July 2020" />
		<meta property="og:image" content="{{asset('fronted/img/nature/jan_vol_1.jpg')}}" />
		<meta property="og:url" content="{{url('/axisblues/videodetail/construction_july20')}}" />
		<meta property="og:video" content="{{asset('fronted/img/nature/Construction_Book_July20.mp4')}}" />
		<link rel="canonical" href="{{url('/axisblues/videodetail/construction_july20')}}">
	@elseif($video=="construction_feb20")
		<meta name="keywords" content="Construction, Updates, January 2020"/>
		<meta name="description" content="Construction Updates February 2020"/>
		<meta property="og:title" content="Construction Updates February 2020" />
		<meta property="og:type" content="article" />
		<meta property="og:description" content="Construction Updates February 2020" />
		<meta property="og:image" content="{{asset('fronted/img/nature/feb_vol_1.jpg')}}" />
		<meta property="og:url" content="{{url('/axisblues/videodetail/construction_feb20')}}" />
		<meta property="og:video" content="{{asset('fronted/img/nature/Construction_Book_Feb20.mp4')}}" />
		<link rel="canonical" href="{{url('/axisblues/videodetail/construction_feb20')}}">
	@elseif($video=="construction_jan20")
		<meta name="keywords" content="Construction, Updates, January 2020"/>
		<meta name="description" content="Construction Updates January 2020"/>
		<meta property="og:title" content="Construction Updates January 2020" />
		<meta property="og:type" content="article" />
		<meta property="og:description" content="Construction Updates January 2020" />
		<meta property="og:image" content="{{asset('fronted/img/nature/jan_vol_1.jpg')}}" />
		<meta property="og:url" content="{{url('/axisblues/videodetail/construction_jan20')}}" />
		<meta property="og:video" content="{{asset('fronted/img/nature/Construction_Book_Jan19.mp4')}}" />
		<link rel="canonical" href="{{url('/axisblues/videodetail/construction_jan20')}}">
	@elseif($video=="construction_dec19")
		<meta name="keywords" content="Construction, Updates, December 2019"/>
		<meta name="description" content="Construction Updates December 2019"/>
		<meta property="og:title" content="Construction Updates December 2019" />
		<meta property="og:type" content="article" />
		<meta property="og:description" content="Construction Updates December 2019" />
		<meta property="og:image" content="{{asset('fronted/img/nature/dec_vol_1.jpg')}}" />
		<meta property="og:url" content="{{url('/axisblues/videodetail/construction_dec19')}}" />
		<meta property="og:video" content="{{asset('fronted/img/nature/Construction_Book_Dec19.mp4')}}" />
		<link rel="canonical" href="{{url('/axisblues/videodetail/construction_dec19')}}">
	@else
	@endif

@stop

@section('body_class', 'header-fixed sidebar-right header-style-2 topbar-style-1 menu-has-search')

@section('blog-current-menu', 'current-menu-item')

@extends('frontend.layouts.front')
@section('content')
<style>
.pagination{
	margin: 30px auto;
	display: inline-flex;
	border: 1px solid #ccc;
}
.pagination li{
	border:1px solid #dfdfdf;
	padding: 2px 12px;
}

/* .pagination li a{ display:block;} */
.pagination li:hover{
	background: #0690c9;
	color: #fff;
}
.pagination li:hover a{ color: #fff;background: #0690c9;}
.pagination .active:hover a{background: #0690c9;color: #fff;}
.pagination .disabled:hover a{background: #dfdfdf;color: #000;}
.pagination .active:hover{background: #0690c9;color: #fff;}
.pagination .disabled:hover{background: #dfdfdf;color: #000;}

.pagination .active{
	background: #0690c9;
	color: #fff;
}
.pagination .disabled{
	background: #dfdfdf;
	color: #000;
}
.widget.widget_lastest .thumb{ height: auto;}
.post-socials div{
	display: inline-block;
	background: #014c8c !important;
}
.post-socials div a{
	display:inline-block;
	color: #fff !important;
}

.video_deatil_main{ width: 600px; margin: 0 auto; text-align: center;}


@media (max-width: 767px) {
	.video_deatil_main{ width: 100%;}
}

</style>
<!-- Featured Title -->
<div id="featured-title" class="featured-title clearfix">
	<div id="featured-title-inner" class="container clearfix">
		<div class="featured-title-inner-wrap">
			<div id="breadcrumbs">
				<div class="breadcrumbs-inner">
					<div class="breadcrumb-trail">
						<a href="/" class="trail-begin">Home</a>
						<span class="sep">|</span>
						<span class="trail-end">Video</span>
					</div>
				</div>
			</div>

		</div><!-- /.featured-title-inner-wrap -->
	</div><!-- /#featured-title-inner -->
</div>
<!-- End Featured Title -->

<!-- Main Content -->
<div id="main-content" class="site-main clearfix">
	<div id="content-wrap" class="container">
		<div id="" class="clearfix" style="width:100%">
			<div id="inner-content" class="inner-content-wrap">
				<article class="hentry data-effect">
					<div class="video_sec">
						@if($video=="construction_dec20")
							<div class="video_deatil_main">
								<h3>December 2020</h3>
								<video width="100%" controls>
									<source src="{{asset('fronted/img/nature/Construction_Book_Dec20.mp4')}}">
									<!--<source src="Construction-video1.mp4" type="video/mp4">-->
									<source src="mov_bbb.ogg" type="video/ogg">
									Your browser does not support HTML5 video.
								</video>
							</div>
						@elseif($video=="construction_oct20")
							<div class="video_deatil_main">
								<h3>October 2020</h3>
								<video width="100%" controls>
									<source src="{{asset('fronted/img/nature/Construction_Book_Oct20.mp4')}}">
									<!--<source src="Construction-video1.mp4" type="video/mp4">-->
									<source src="mov_bbb.ogg" type="video/ogg">
									Your browser does not support HTML5 video.
								</video>
							</div>
						@elseif($video=="construction_july20")
							<div class="video_deatil_main">
								<h3>July 2020</h3>
								<video width="100%" controls>
									<source src="{{asset('fronted/img/nature/Construction_Book_July20.mp4')}}">
									<!--<source src="Construction-video1.mp4" type="video/mp4">-->
									<source src="mov_bbb.ogg" type="video/ogg">
									Your browser does not support HTML5 video.
								</video>
							</div>
						@elseif($video=="construction_feb20")
							<div class="video_deatil_main">
								<h3>February 2020</h3>
								<video width="100%" controls>
									<source src="{{asset('fronted/img/nature/Construction_Book_Feb20.mp4')}}">
									<!--<source src="Construction-video1.mp4" type="video/mp4">-->
									<source src="mov_bbb.ogg" type="video/ogg">
									Your browser does not support HTML5 video.
								</video>
							</div>
						@elseif($video=="construction_jan20")
							<div class="video_deatil_main">
								<h3>January 2020</h3>
								<video width="100%" controls>
									<source src="{{asset('fronted/img/nature/Construction_Book_Jan19.mp4')}}">
									<!--<source src="Construction-video1.mp4" type="video/mp4">-->
									<source src="mov_bbb.ogg" type="video/ogg">
									Your browser does not support HTML5 video.
								</video>
							</div>
						@elseif($video=="construction_dec19")
							<div class="video_deatil_main">
								<h3>December 2019</h3>
								<video width="100%" controls>
									<source src="{{asset('fronted/img/nature/Construction_Book_Dec19.mp4')}}">
									<!--<source src="Construction-video1.mp4" type="video/mp4">-->
									<source src="mov_bbb.ogg" type="video/ogg">
									Your browser does not support HTML5 video.
								</video>
							</div>
						@else
							<div class="video_deatil_main">
								<p>No Video Found.</p>
							</div>
						@endif
					</div>
					<div class="clear"></div>
				</article>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
@stop