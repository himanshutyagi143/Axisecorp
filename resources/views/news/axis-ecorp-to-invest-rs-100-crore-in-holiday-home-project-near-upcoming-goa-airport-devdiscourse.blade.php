@extends('new_frontend.layouts.app')
<?php
use Illuminate\Support\Str;
?>
@section('meta')
@if(isset($is_slug) && $is_slug == 1)
<title> {{$posts[0]->meta_title}}</title>
<meta name="keywords" content="{{$posts[0]->meta_keyword}}"/>
<meta name="description" content="{{$posts[0]->meta_description}}"/>
<meta property="og:title" content="{{$posts[0]->meta_title}}" />
<meta property="og:type" content="article" />
<meta property="og:description" content="{{$posts[0]->meta_description}}" />
<meta property="og:image" content="{{$posts[0]->image}}" />
<meta property="og:url" content="{{url('/blog/'.$posts[0]->slug)}}" />
@else
<title>News | Real Estate Insights | Axis ecorp</title>
<meta name="keywords" content=""/>
<meta name="description" content="Our blogs keep you updated with our projects at Axis ecorp and the latest information about the Real Estate industry trends."/>
<link rel="canonical" href="http://axisecorp.com/news">
<style>
   td {
      padding: 10px;
   }
</style>
@endif
@endsection

@section('content')
@include('includes.header')
<div class="layout">
@include('includes.sidebar')
<div class="content">
<section class="blog-list section">
   <div class="container">
      <div id="blog_wrapper" class="col-md-8">
          <!-- Sample Blog Post -->
		      <div id="page1" class="blog-page" >
                

		<article class="blog-post">
        

                  <h3>Axis Ecorp to invest Rs 100 crore in holiday home project near upcoming Goa airport – Devdiscourse</h3>
        <img src="/uploads/images/news.png" style="width: 100%;" />
        <p style="margin-top: 20px;">Axis Ecorp, a real estate firm focused on premium developments in holiday homes and secondary housing segment, on Saturday announced that it will invest Rs 100 crore in the development of hotel apartments and luxury serviced villas near the upcoming Goa airport. The project will be developed on a 25-acres of land located at Shindhudurg, Goa-Maharashtra border. It is merely 13 kms away from the upcoming MOPA International Airport in Goa.</p>  
          </article>
		  

		  </div>
		      
          <!-- Existing Blog Data -->
       
	             <!-- pagination -->
      </div>
      <div class="col-secondary col-md-4 mr">
         <div class="blog_search">
         <h3 class="widget-title">Recent News</h3>
            <div class="form-group">
            @foreach($news as $news)
              <table>
               <tr>
                 <td><img src="/uploads/{{$news->image}}" width="150" /></td>
                 <td><?php   $slug = Str::slug($news->title); ?>
                       <h3 class="blog-title"><a href="{{ route('news.show', $slug) }}" class="post-meta">{{$news->title}}</a></h3>
                      
                 </td>
               </tr>
              </table>
              @endforeach
         </div>
         <!-- Rest of the sidebar content -->
      </div>
   </div>
</section>
</div>
@include('new_frontend.includes.footer')

@endsection

