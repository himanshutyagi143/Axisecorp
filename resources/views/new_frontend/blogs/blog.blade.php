@extends('new_frontend.layouts.app')
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
@endsection
@section('content')
@include('new_frontend.includes.header')
<div class="layout">
@include('new_frontend.includes.sidebar')
<div class="content">
<section class="blog-list section">
   <div class="container">
      <div id="blog_wrapper" class="col-md-8">
          @include('new_frontend.blogs.blog_data')   
      </div>
      <div class="col-secondary col-md-4 mr">
         <div class="blog_search">
            <h3 class="widget-title">Search</h3>
            <div class="form-group">
               <input type="text" class="form-control"  id="user_search" name="user_search" placeholder="Search here...">
            </div>
         </div>
         <div class="resent_post">
            <h3 class="widget-title">Archive</h3>
            <ul id="archive_list">
            </ul>
         </div>
         <div class="widget widget_recent_post">
            <h3 class="widget-title">Recent Post</h3>
            @if(isset($recent) && count($recent) > 0)
              @foreach($recent as $recentpost)
            <article class="recent-post">
               <div class="recent-post-thumbnail">
                  <a href="/blogs/{{$recentpost->slug}}"><img alt="{{$recentpost->image_name}}" src="{{$recentpost->image}}" class="wp-post-image"></a>
               </div>
               <div class="recent-post-body">
                  <h4 class="recent-post-title">
                      <a href="/blogs/{{$recentpost->slug}}">{{$recentpost->title}}</a>
                  </h4>
                  <div class="recent-post-time">{{date('M, d',strtotime($recentpost->blog_date))}}</div>
               </div>
            </article>
            @endforeach 
          @endif
         </div>
         <div class="widget">
            <div class="blog-tags">
               <h3 class="widget-title">Tags</h3>
               @if(isset($tags) && count($tags) > 0)
                @foreach($tags as $tag)
			
                <a href="/blogs/tag/{{$tag->tag_id}}">{{$tag->tagName}}</a>
                @endforeach
              @endif  
              
            </div>
         </div>
      </div>
   </div>
</section>
@include('new_frontend.includes.footer')
<script type="text/javascript">
   $(document).ready(function(){
        localStorage.setItem("month", '');
        localStorage.setItem("year", '');
        localStorage.setItem("is_archive", '0');
        getArchives();
       $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
       });
       
       $("#user_search").keyup(function(){
          fetch_data();
      });
      $(document).on('click', '.archivedata', function(event){
      if (typeof(Storage) !== "undefined") {
        localStorage.setItem("month", $(this).attr('data-month'));
        localStorage.setItem("year", $(this).attr('data-year'));
        localStorage.setItem("is_archive", '1');
      }
      fetch_data();
        
       });

      function getArchives()
       {  str = '';
          $.ajax({
              url:"/getarchives",
              method:"get",
              data:{media_type:1},
              success:function(response)
              {
                $.each(response, function( index, value ) {
                    var datas = [value.month, value.year];
                    str = str + '<li data-month="'+value.month+'" data-year="'+value.year+'"class="archivedata cursor-pointer">'+value.new_date+'<span class="number">('+value.counts+')</span></li>';
                });
                 $('#archive_list').html(str);
              }
          });
       }
       function fetch_data(page='1')
       {
        var search = $("#user_search").val();
        var blogmonth = localStorage.getItem("month");
        var blogyear = localStorage.getItem("year");
        var is_archive = localStorage.getItem("is_archive");

         var pathArray = window.location.pathname.split('/');
          if(pathArray[2] == "tag")
          {
            if(is_archive == 1)
            {
              datas = {type:"tags",tag:pathArray[3],search:search,month:blogmonth,year:blogyear};
            }else{
              datas = {type:"tags",tag:pathArray[3],search:search};
            }
          }else{
            if(is_archive == 1)
            {
              datas = {type:"blogs",search:search,month:blogmonth,year:blogyear};
            }else{
              datas = {type:"blogs",search:search};
            }
          }
           $.ajax({
            url:"/pagination/fetch_data?page="+page,                     
            data: datas,
            success:function(data)
            {
               $('#blog_wrapper').html(data);
               window.scrollTo({ top: 400, behavior: 'smooth' });
            }
           });
       }
       
   });
</script>
@endsection