{{-- body class --}}
@section('meta')
@if($is_slug == 1)
	<title> {{$posts[0]->meta_title}}</title>
	<meta name="keywords" content="{{$posts[0]->meta_keyword}}"/>
	<meta name="description" content="{{$posts[0]->meta_description}}"/>
	<meta property="og:title" content="{{$posts[0]->meta_title}}" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="{{$posts[0]->meta_description}}" />
	<meta property="og:image" content="{{$posts[0]->image}}" />
	<meta property="og:url" content="{{url('/blog/'.$posts[0]->slug)}}" /> 

@else
	<title>Blog | Real Estate Insights | Axis ecorp</title>
	<meta name="keywords" content=""/>
	<meta name="description" content="Our blogs keeps you update with our projects of Axis ecorp and latest information about Real Estate industry trend."/>
	<link rel="canonical" href="http://axisecorp.com/blogs">
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
</style>
<!-- Featured Title -->
<div id="featured-title" class="featured-title clearfix">
	<div id="featured-title-inner" class="container clearfix">
		<div class="featured-title-inner-wrap">
			<div id="breadcrumbs">
				<div class="breadcrumbs-inner">
					<div class="breadcrumb-trail">
						<a href="/" class="trail-begin">Home</a>
						@if($headerTitle === 0)
						<span class="sep">|</span>
						<span class="trail-end">Blog</span>
						@else
						<span class="sep">|</span>
						<span class="trail-end"><a href="/blogs">Blog</a></span>
						<span class="sep">|</span>
						<span class="trail-end">{{$headerTitle}}</span>
						@endif
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
		<div id="site-content" class="site-content clearfix">
			<div id="inner-content" class="inner-content-wrap">
				<article class="hentry data-effect">

					@if(isset($posts) && count($posts) > 0 )
					@foreach($posts as $post)
					<div class="post-media data-effect-item has-effect-icon offset-v-25 offset-h-24 clerafix">
						<!--a href="page-blog-single.html"><img src="assets/img/news/post-1-840x385.jpg" alt="Image"></a-->
						@if($is_slug==1) <img src="{{$post->image}}" alt="" class="img-responsive center-block"> @else <a href="/blogs/{{$post->slug}}"><img src="{{$post->image}}" alt="" class="img-responsive center-block"></a> @endif
						<div class="post-calendar">
							<span class="inner">
								<span class="entry-calendar">
									<span class="day">{{date('d',strtotime($post->blog_date))}}</span>
									<span class="month">{{date('M',strtotime($post->blog_date))}}</span>
								</span>
							</span>
						</div>
						<div class="overlay-effect bg-color-1"></div>
						<div class="elm-link">
							<a href="/blogs/{{$post->slug}}" class="icon-1"></a>
						</div>
					</div>

					<div class="post-content-wrap clearfix">
						<h2 class="post-title">
							<span class="post-title-inner">
								@if($is_slug==1) <h2>{{$post->title}}</h2> @else <a href="/blogs/{{$post->slug}}">
									<h2>{{$post->title}}</h2>
								</a>@endif
							</span>
						</h2>
						<div class="post-meta">
							<div class="post-meta-content">
								<div class="post-meta-content-inner">
									<span class="post-date item"><span class="inner"><span class="entry-date">
                  @if($post->blog_date)
                  {{date('M d, Y',strtotime($post->blog_date))}}
                  @endif
                  </span></span></span>
									@if($post->author)<span class="post-by-author item"><span class="inner"><a href="#">By: {{$post->author}}</a></span></span>@endif
									<!-- <span class="comment item"><span class="inner"><a href="#">3 Comments</a></span></span> -->
								</div>
							</div>
						</div>
						<div class="post-content post-excerpt margin-bottom-43">
							@if($is_slug!=1) <p class="line-height-27 letter-spacing-005">{{str_limit(strip_tags($post->content),400,'...')}}</p>@endif
							@if($is_slug==1) <div class="long_text">{!!$post->content!!}</div>@endif
						</div>
						<div class="post-tags-socials clearfix" style="margin-bottom:20px !important;">
							<div class="post-tags ">
								@if(count($post->tags()->get()) > 0)
								<span>Tags :</span>
								@foreach($post->tags()->get() as $tag)
								<a href="/blogs/tag/{{$tag->tagName}}">{{$tag->tagName}}</a>
								@endforeach
								@endif
							</div>
							<div class="post-socials ">
								<a href="https://api.whatsapp.com/send?text={{urlencode(url('/blogs/'.$post->slug.'/'))}}" data-action="share/whatsapp/share"><img src="/fronted/img/nature/whatsapp.png"></a>
								<div class="" data-href="{{url('/blogs/'.$post->slug)}}"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url('/blogs/'.$post->slug.'/'))}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><span class="fa fa-facebook-square"></span></a></div>
								<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{urlencode(url('/blogs/'.$post->slug.'/'))}}" class="twitter" target="_blank"><span class="fa fa-twitter"></span></a>
								<a href="https://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url={{urlencode(url('/blogs/'.$post->slug.'/'))}}" class="linkedin" target="_blank"><span class="fa fa-linkedin-square"></span></a>
								<a href="https://api.addthis.com/oexchange/0.8/forward/pinterest/offer?url={{urlencode(url('/blogs/'.$post->slug.'/'))}}" class="pinterest" target="_blank"><span class="fa fa-pinterest-p"></span></a>
							</div>
						</div>

					</div>
					@endforeach
					@else
					<div class="post-media data-effect-item has-effect-icon offset-v-25 offset-h-24 clerafix">
						<h4 style="text-align:center;padding-top:15px;">No Posts Available</h4>
					</div>
					@endif

					@if($is_slug == 2)
					<div class="row">
						<div class="col-md-12" style="text-align:center;">
							{{ $posts->links() }}
						</div>
					</div>
					@endif
					
				</article><!-- /.hentry -->

				<!--div class="themesflat-pagination clearfix no-border padding-top-17">
                            <ul class="page-prev-next">
                                <li>
                                    <a href="#" class="prev">
                                        Previous Article
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="next">                         
                                        Next Article
                                    </a>
                                </li>
                            </ul>
                        </div-->
				<!-- /.themesflat-pagination -->

				<div id="comments" class="comments-area">
					<!--h2 class="comments-title">3 COMMENTS</h2>
                            <ol class="comment-list">
                                <li class="comment">
                                    <article class="comment-wrap clearfix">
                                        <div class="gravatar"><img alt="image" src="assets/img/testimonials/avatar-1-80x80.jpg" /></div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h6 class="comment-author">NicheTheme</h6>
                                                <span class="comment-time">May 11, 2018 - at 11:00 am</span>
                                                <span class="comment-reply"><a class="comment-reply-link" href="#">REPLY</a></span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat id. Vivamus interdum urna at sapien varius elementum. </p>
                                            </div>
                                        </div>
                                    </article>
                                    <ul class="children">
                                        <li class="comment">
                                            <article class="comment-wrap clearfix">
                                                <div class="gravatar"><img alt="image" src="assets/img/testimonials/avatar-2-80x80.jpg" /></div>
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <h6 class="comment-author">themesflat</h6>
                                                        <span class="comment-time"> May 11, 2018 - at 11:00 am</span>
                                                        <span class="comment-reply"><a class="comment-reply-link" href="#">REPLY</a></span>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat id.</p>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>
                                    </ul>
                                </li>
                            
                                <li class="comment">
                                    <article class="comment-wrap  clearfix">
                                        <div class="gravatar"><img alt="image" src="assets/img/testimonials/avatar-1-80x80.jpg" /></div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h6 class="comment-author">NicheTheme</h6>
                                                <span class="comment-time">May 11, 2018 - at 11:00 am</span>
                                                <span class="comment-reply"><a class="comment-reply-link" href="#">REPLY</a></span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat id. Vivamus interdum urna at sapien varius elementum. </p>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            </ol>
                            -->
					<!--div id="respond" class="comment-respond">
                                <h3 id="reply-title" class="comment-reply-title margin-bottom-31">Leave a Comment</h3>
                                <form action="#" method="post" id="commentform" class="comment-form">
                                    <div class="text-wrap clearfix">
                                        <fieldset class="name-wrap">
                                            <input type="text" id="author" class="tb-my-input" name="author" tabindex="1" placeholder="Name*" value="" size="32" aria-required="true">
                                        </fieldset>
                                        <fieldset class="email-wrap">
                                            <input type="email" id="email" class="tb-my-input" name="email" tabindex="2" placeholder="Email*" value="" size="32" aria-required="true">
                                        </fieldset>
                                    </div>                                  
                                    <fieldset class="message-wrap">
                                        <textarea id="comment-message" name="comment" rows="8" tabindex="4" placeholder="Message*" aria-required="true"></textarea>
                                    </fieldset>
                                    <p class="form-submit">
                                        <input name="submit" type="submit" id="comment-reply" class="submit" value="SEND US">
                                        <input type="hidden" name="comment_post_ID" value="100" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    </p>
                                </form>
                            </div-->
					<!-- #respond -->
				</div>
				<!--/#comments -->
			</div><!-- /#inner-content -->
		</div><!-- /#site-content -->
		<div id="sidebar">
			<div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
			<div id="inner-sidebar" class="inner-content-wrap">
				<div class="widget widget_search">
					<form action="/blogs/search" method="post" class="search-form style-1">
						{{csrf_field()}}
						<input type="search" class="search-field" placeholder="Search..." name="search" title="Search for">
						<button class="search-submit" type="submit" title="Search">Search</button>
					</form>
				</div><!-- /.widget_search -->

				{{--<div class="widget widget_follow">
					<h2 class="widget-title"><span>FOLLOW US</span></h2>
					<div class="follow-wrap clearfix col3 g8">
						<div class="follow-item facebook">
							<div class="inner">
								<span class="socials">
									<a href="https://www.facebook.com/Axisecorp-100437524760521/" target="_blank"><i class="fa fa-facebook"></i></a>
									<span class="text">{{$facebookLikes}} <br> likes</span>
								</span>
							</div>
						</div>
						
						<div class="follow-item twitter">
							<div class="inner">
								<span class="socials">
									<a href="https://twitter.com/TestAcc56666121" target="_blank"><i class="fa fa-twitter"></i></a>
									<span class="text">{{$twitterFollowerCount}} <br>followers</span>
								</span>
							</div>
						</div>
						<!-- <div class="follow-item google">
							<div class="inner" style="background:#0690c9;">
								<span class="socials">
									<a href="#"><i class="fa fa-linkedin"></i></a>
									<span class="text">432 <br> Contacts</span>
								</span>
							</div>
						</div> -->
					</div>
				</div><!-- /.widget_follow -->--}}

				<div class="widget widget_lastest">
					<h2 class="widget-title"><span>RECENT POST</span></h2>
					<ul class="lastest-posts data-effect clearfix">
						@foreach($recent as $recentPost)
						<li class="clearfix">
							<div class="thumb data-effect-item has-effect-icon">
								<img src="{{$recentPost->image}}" alt="Image">
								<div class="overlay-effect bg-color-2"></div>
								<div class="elm-link">
									<a href="/blogs/{{$recentPost->slug}}" class="icon-2"></a>
								</div>
							</div>
							<div class="text">
								<h3><a href="/blogs/{{$recentPost->slug}}">{{$recentPost->title}}</a></h3>
								<span class="post-date"><span class="entry-date">
                @if($recentPost->blog_date)
                {{date('d M Y',strtotime($recentPost->blog_date))}}
                @endif
                </span></span>
							</div>
						</li>
						@endforeach
						<!-- <li class="clearfix">
							<div class="thumb data-effect-item has-effect-icon">
								<img src="assets/img/news/post-2-65x65.jpg" alt="Image">
								<div class="overlay-effect bg-color-2"></div>
								<div class="elm-link">
									<a href="page-blog-single.html" class="icon-2"></a>
								</div>
							</div>
							<div class="text">
								<h3><a href="page-blog-single.html">HI-TECH WOODEN HOUSE BUILT WITHOUT GLUE</a></h3>
								<span class="post-date"><span class="entry-date">31 June 2018</span></span>
							</div>
						</li>
						<li class="clearfix">
							<div class="thumb data-effect-item has-effect-icon">
								<img src="assets/img/news/post-3-65x65.jpg" alt="Image">
								<div class="overlay-effect bg-color-2"></div>
								<div class="elm-link">
									<a href="page-blog-single.html" class="icon-2"></a>
								</div>
							</div>
							<div class="text">
								<h3><a href="page-blog-single.html">HI-TECH WOODEN HOUSE BUILT WITHOUT GLUE</a></h3>
								<span class="post-date"><span class="entry-date">31 June 2018</span></span>
							</div>
						</li> -->
					</ul>
				</div><!-- /.widget_lastest -->

				<div class="widget widget_tags margin-top-55">
					<h2 class="widget-title"><span>Categories</span></h2>
					<div class="tags-list">
						@foreach($categories as $category)
						<a href="/blogs/category/{{$category->categorySlug}}">{{$category->categoryName}}</a>
						@endforeach
					</div>
				</div>
				<p style="clear:both"></p>
				<div class="widget widget_tags margin-top-55">
					<h2 class="widget-title"><span>TAGS</span></h2>
					<div class="tags-list">
						@foreach($tags as $tag)
						<a href="/blogs/tag/{{$tag->tagName}}">{{$tag->tagName}}</a>
						@endforeach
					</div>
				</div>
				
			</div>
		</div><!-- /#sidebar -->
	</div><!-- /#content-wrap -->
</div><!-- /#main-content -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
$(function(){
	// var message = '@if(isset($message)) {{$message}} @else 0 @endif';
	// if(message != 0){
	// 	alertify.success('dsdssd');
	// }

});
</script>
@stop