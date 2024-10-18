@extends('new_frontend.layouts.app')

@section('meta')
@if(isset($is_slug) && $is_slug == 1)
<title>{{$news[0]->meta_title}}</title>
<meta name="keywords" content="{{$news[0]->meta_keyword}}"/>
<meta name="description" content="{{$news[0]->meta_description}}"/>
<meta property="og:title" content="{{$news[0]->meta_title}}" />
<meta property="og:type" content="article" />
<meta property="og:description" content="{{$news[0]->meta_description}}" />
<meta property="og:image" content="{{$news[0]->image}}" />
<meta property="og:url" content="{{url('/news/'.$news[0]->slug)}}" />
@else
<title>News | Latest Updates | Axis ecorp</title>
<meta name="keywords" content=""/>
<meta name="description" content="Stay updated with the latest news and updates about Axis ecorp and the real estate industry."/>
<link rel="canonical" href="http://axisecorp.com/news">
<style>
  td {
     padding: 10px;
  }
  button{
    border: none;
    cursor: pointer;
    color: white;
    background: none;
    transition: all .3s ease-in-out;
}

.containerrr {
  width: 100%;
  padding-bottom: 50px;
  /* display: flex;
  justify-content: center;
  align-items: center; */
  background-color: white;
}

.carousel-view {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  transition: all 0.25s ease-in;
}

.carousel-view .item-list {
  /* max-width: 950px; */
  width: 80vw;
  display: flex;
  gap: 8px;
  scroll-behavior: smooth;
  transition: all 0.25s ease-in;
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
  overflow: auto;
  scroll-snap-type: x mandatory;
}


/* Hide scrollbar for Chrome, Safari and Opera */
.item-list::-webkit-scrollbar {
  display: none;
}
.carousel-view img#item {
    border: 1px solid #cccccc;
    padding: 10px;
    min-height: 90px;
}

.prev-btn {
  background: none;
  cursor: pointer;
}

.next-btn {
  cursor: pointer;
}

.item {
  scroll-snap-align: center;
  min-width: 19.35%;
}
</style>
@endif
@endsection

@section('content')
@include('includes.header')
<div class="layout">
@include('includes.sidebar')
<div class="content">
<section class="news-list section">
   <div class="container">


   <div class="containerrr">
        <div class="carousel-view">
          <button id="prev-btn" class="prev-btn">
           <svg viewBox="0 0 512 512" width="20" title="chevron-circle-left">
        <path d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z" />
      </svg>
          </button>
          <div id="item-list" class="item-list">
               <a href="#"><img id="item" class="item" src="/uploads/images/business standards.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/constro.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/dqwdd.png"></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/econohhg.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/effefefd.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/financial.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/mavssss.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/flipit.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/plunge.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/propdfsef.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/propertyhome.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/realiuty.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/realty.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/realtyinfdvg.png"/></a>
                <a href="#"><img id="item" class="item" src="/uploads/images/Untitled-1.png"/></a>
              </div>
          <button id="next-btn" class="next-btn">
                <svg viewBox="0 0 512 512" width="20" title="chevron-circle-right">
        <path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z" />
      </svg>
              </button>
          </div>
      </div>



      <div id="news_wrapper" class="col-md-8">
      <article class="blog-post">
         @foreach($news as $news)
         <table>
          <tr>
            <td><img src="/uploads/{{$news->image}}" width="200" /></td>
            <td><?php   $slug = Str::slug($news->title); ?>
                  <h3 class="blog-title"><a href="{{ route('news.show', $slug) }}" class="post-meta">{{$news->title}}</a></h3>
                  {{$limit=Str::limit($news->description, 100);}}
                  <h6 style=" font-size: 14px; color: #ccc; ">{{$news->Date}}</h6>
                  <div class="text-left"><a href="{{ route('news.show', $slug) }}" class="read-more">Read more</a></div>
            </td>
          </tr>
         </table>
            
         @endforeach

          </article>


       
      </div>
      <div class="col-secondary col-md-4 mr">
         <div class="news_search">
            <h3 class="widget-title">Recent News</h3>
            <div class="form-group">
           
              <table>
               <tr>
                 <td><img src="/uploads/{{$news->image}}" width="150" /></td>
                 <td><?php   $slug = Str::slug($news->title); ?>
                       <h3 class="blog-title"><a href="{{ route('news.show', $slug) }}" class="post-meta">{{$news->title}}</a></h3>
                      
                 </td>
               </tr>
              </table>
             
              
            </div>
         </div>
         <!-- Rest of the sidebar content -->
      </div>
   </div>
</section>
</div>
@include('new_frontend.includes.footer')
<script type="text/javascript">
   // ... your existing JavaScript
   const prev = document.getElementById('prev-btn')
const next = document.getElementById('next-btn')
const list = document.getElementById('item-list')

const itemWidth = 150
const padding = 10

prev.addEventListener('click',()=>{
  list.scrollLeft -= itemWidth + padding
})

next.addEventListener('click',()=>{
  list.scrollLeft += itemWidth + padding
})

</script>
@endsection
