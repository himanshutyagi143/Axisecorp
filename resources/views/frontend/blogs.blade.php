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

   #lightbox .lb-nav a.lb-prev {
      display: none!important;
   }
   #lightbox .lb-nav a.lb-next {
      display: none!important;
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
      </div>
      <!-- /.featured-title-inner-wrap -->
   </div>
   <!-- /#featured-title-inner -->
</div>
<!-- End Featured Title -->
<!-- Main Content -->
<div id="main-content" class="site-main clearfix">
   <div class="container">
      <div class="newblog_section">
         <ul>
            @if(isset($posts) && count($posts) > 0 )
               @foreach($posts as $blog)
                  @if($is_slug == 2)
                     <li>
                        <div class="image_holder">
                          {{-- <a href="/blogs/{{$blog->slug}}">
                           <img src="{{$blog->image}}" alt="" class="img-responsive center-block">
                           </a>--}}
                           <a class="example-image-link" href="{{$blog->image}}" data-lightbox="example-1">
                              <img class="example-image img-responsive" src="{{$blog->image}}" alt="image-1" /></a>
                           </a>
                        </div>
                        <div class="discription">
                           <h3 class="title"><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h3>
                           <div class="date">{{date('M d, Y',strtotime($blog->blog_date))}} </div>
                           <p> {{str_limit(strip_tags($blog->content),100,'...')}}
                              <a href="/blogs/{{$blog->slug}}">Read More</a>
                           </p>
                        </div>
                        <div class="hentry">
                           <div class="post-tags "></div>
                           <div class="post-socials ">
                              <a style="background:#25D366" href="https://api.whatsapp.com/send?text=https://axisecorp.com/blogs/{{$blog->slug}}" data-action="share/whatsapp/share" target="_blank">
                              <span class="fa fa-whatsapp"></span>
                              </a>
                              <div class="" data-href="https://axisecorp.com/blogs/{{$blog->slug}}"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://axisecorp.com/blogs/{{$blog->slug}}" class="fb-xfbml-parse-ignore"><span class="fa fa-facebook-square"></span></a></div>
                              <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=https://axisecorp.com/blogs/{{$blog->slug}}" class="twitter" target="_blank"><span class="fa fa-twitter"></span></a>
                              <a href="https://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url=https://axisecorp.com/blogs/{{$blog->slug}}" class="linkedin" target="_blank"><span class="fa fa-linkedin-square"></span></a>
                           {{--<a href="https://api.addthis.com/oexchange/0.8/forward/instagram/offer?url=https://axisecorp.com/blogs/{{$blog->slug}}" class="pinterest" target="_blank"><span class="fa fa-instagram"></span></a> --}}
                           </div>
                        </div>
                     </li>
                  @endif
               @endforeach
            @else
               <div class="post-media data-effect-item has-effect-icon offset-v-25 offset-h-24 clerafix">
                  <h4 style="text-align:center;padding-top:15px;">No Blogs Available</h4>
               </div>
            @endif      
         </ul>

      </div>
      <div class="col-md-12" style="text-align:center;">
         @if($is_slug == 2)
            {{ $posts->links() }}
         @endif   
      </div>
   </div>
</div>
<!-- /#main-content -->
<script
   src="https://code.jquery.com/jquery-3.4.1.min.js"
   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
   crossorigin="anonymous"></script>
<script>
   $(function(){
      // var message = '@if(isset($message)) {{$message}} @else 0 @endif';
      // if(message != 0){
      //    alertify.success('dsdssd');
      // }
   
   });
</script>
@stop