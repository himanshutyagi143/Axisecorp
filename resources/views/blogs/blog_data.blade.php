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
<title>Blog | Real Estate Insights | Axis ecorp</title>
<meta name="keywords" content=""/>
<meta name="description" content="Our blogs keep you updated with our projects at Axis ecorp and the latest information about the Real Estate industry trends."/>
<link rel="canonical" href="http://axisecorp.com/blogs">
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
      <div id="blog_wrapper" class="col-md-12">
          <!-- Sample Blog Post -->
		      <div id="page1" class="blog-page" >

		<article class="blog-post">
         @foreach($blogs as $blogs)
         <div class="col-md-4">
                  <img src="/uploads/{{$blogs->image}}" width="90%" />
                  <?php   $slug = Str::slug($blogs->title); ?>
                  <h3 class="blog-title"><a href="{{ route('blogs.show', $slug) }}" class="post-meta">{{$blogs->title}}</a></h3>
                  {{$limit=Str::limit($blogs->description, 100);}}
                  <div class="text-left"><a href="/blogs?id={{$blogs->id}}" class="read-more">Read more</a></div>
         </div>
            
         @endforeach

          </article>
		  

		  </div>
		      <div id="page2" class="blog-page" style="display: none;">
               
             

			
		  </div>
          <!-- Existing Blog Data -->
       <!-- <div id="pagination-container" class="pagination"></div> -->
	             <!-- pagination -->
      </div>
   </div>
</section>
</div>
@include('new_frontend.includes.footer')
    <script>
        function generatePagination(totalPages) {
            const paginationContainer = document.getElementById('pagination-container');
            paginationContainer.innerHTML = '<ul>';
            for (let i = 1; i <= totalPages; i++) {
                paginationContainer.innerHTML += `<li><a href="#page${i}">${i}</a></li>`;
            }
            paginationContainer.innerHTML += '</ul>';
        }

        // Set the total number of pages
        const totalPages = 5;

        // Generate pagination links
        generatePagination(totalPages);

        // JavaScript to show/hide blog pages based on the selected page link
        document.querySelectorAll('.pagination a').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const targetPage = this.getAttribute('href').substring(1);
                document.querySelectorAll('.blog-page').forEach(page => {
                    page.style.display = page.id === targetPage ? 'block' : 'none';
                });
            });
        });
    </script>
@endsection
