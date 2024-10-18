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
      <div id="blog_wrapper" class="col-md-8">
          <!-- Sample Blog Post -->
		      <div id="page1" class="blog-page" >
                

		<article class="blog-post">
        

                  <h3>Amazing Facts That You Probably Didn’t Know About Sindhudurg</h3>
        <img src="/uploads/images/1-1.jpg" style="width: 100%;" />
        <p>#Fact 1: The district of Sindhudurg was established in 1981. This was done after taking out six Talukas from the original District, Ratnagiri. These Talukas were Kudal, Vengurla, Sawantwadi, Malvan, Kankavli and Devgad.</p>

<p>#Fact 2: It was only later that Vaibhavwadi and Dodamarg came to be attached to District Sindhudurg. At present, there are eight Talukas in Sindhudurg District.</p>

<p>#Fact 3: From the time of the great Chhatrapati Shivaji Maharaj, this place has a big historical significance.</p>

<p>#Fact 4: It is a place that is known for its great forts, pristine beaches and places of spiritual and religious interests.</p>

<p>#Fact 5: While the beaches take up most of the attention at Sindhudurg, there are some majestic waterfalls too in the area. Amboli waterfall is the most notable one and attracts plenty of tourists.</p>

<p>#Fact 6: There are also a couple of scenic waterfalls in Dodamarg as well. Mangeli, Savdav and Napne are some of the prominent ones that are an absolute must-visit during the monsoon months.</p>

<p>Fact #7: It is amongst one of the cleanest districts in India.</p>

<p>#Fact 8: Want to go Scuba diving in India? Well, Sindhudurg is the place to be!</p>

<p>#Fact 9: The district will soon have an airport of its own. Construction of the runway is going on in full swing and the Chipi airport is expected to be reopen soon. The airport will give a fillip to tourism in the coastal district of Sindhudurg, which Maharashtra wants to develop as an alternative destination to Goa. At present, most tourists travel to Sindhudurg and nearby places by road or through Konkan Railway.</p>

<p>#Fact 10: The language that is most commonly spoken in Sindhudurg Konkani. There is a distinct dialect of Konkani &ndash; Malvani that you can hear the locals communicate in. In addition, most people in the area are fluent in Marathi. Hindi &amp; English is also widely understood in this part of the country.</p>

<p>#Fact 11: Tropical fruits such as Alphonso mangoes, Cashews, Jamuns, Pineapples etc. are grown in this district.</p>

<p>#Fact 12: Sindhudurg Fort is one of the major attractions of this district. It was built by Chhatrapati Shivaji Maharaj. It is an architectural marvel and its main entrance is built in a way that no one can pinpoint the entrance from outside.</p>

<p>#Fact 13: The prestigious Taj Hotels of India have been allocated 54 hectares in Sindhudurg to set up a tourism centre.</p>

<p>#Fact 14: Given the potential of the place, Axis Ecorp is also in the process of setting holiday homes that will help boost the tourism of the sector. Having land bank of 100 Acre the upcoming projects of the company include Axis Blues, Axis Yog Villas, Axis Lake City and Axis Lake City Plaza.</p>

<p>#Fact 15: Malvani cuisine is the standard cuisine you will find in this place. Sindhudurg is a paradise for seafood lovers. If you are looking for some lip-smacking crabs, prawns and Pomfret, then Sindhudurg is the place to be. However, if you are a vegetarian, then you should not lose heart as you can get a lot of fresh locally sourced vegetables cooked in Malvani style.</p>  
                  
    
   
            
         

          </article>
		  

		  </div>
		      
          <!-- Existing Blog Data -->
       
	             <!-- pagination -->
      </div>
      <div class="col-secondary col-md-4 mr">
         <div class="blog_search">
         <h3 class="widget-title">Recent News</h3>
            <div class="form-group">
            @foreach($blogs as $blogs)
              <table>
               <tr>
                 <td><img src="/uploads/{{$blogs->image}}" width="150" /></td>
                 <td><?php   $slug = Str::slug($blogs->title); ?>
                       <h3 class="blog-title"><a href="{{ route('blogs.show', $slug) }}" class="post-meta">{{$blogs->title}}</a></h3>
                      
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

