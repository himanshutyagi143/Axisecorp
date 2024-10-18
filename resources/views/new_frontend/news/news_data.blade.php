@if(isset($posts) && count($posts) > 0)

@foreach($posts as $blog)
<article class="blog">
   <div class="row">
      <div class="col-md-6 blog_img">
         <a href="/news/{{$blog->slug}}">
            <div class="blog-thumbnail">
               <img src="{{$blog->image}}" alt="{{$blog->image_name}}">

			      @if($blog->news_city != null) <span>{{$blog->news_city}}</span> @endif
            </div>
         </a>
      </div>
      <div class="blog-info col-md-6">
         <h3 class="blog-title">
            <a href="/news/{{$blog->slug}}">{{$blog->title}}</a>
         </h3>
         <p>{{str_limit(strip_tags($blog->content),130,'...')}} </p>
         <div class="blog-meta">
            <div class="author">
               <a href="https://api.whatsapp.com/send?text=https://axisecorp.com/news/{{$blog->slug}}" data-action="share/whatsapp/share" target="_blank"><span class="fa fa-whatsapp"></span></a>
               <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://axisecorp.com/news/{{$blog->slug}}"><span class="fa fa-facebook-square"></span></a>
               <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?text={{$blog->title}}&url=https://axisecorp.com/news/{{$blog->slug}}" target="_blank"><span class="fa fa-twitter"></span></a>
               <a href="https://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url=https://axisecorp.com/news/{{$blog->slug}}" target="_blank"><span class="fa fa-linkedin-square"></span></a>
            </div>
            <div class="time">{{date('M d, Y',strtotime($blog->blog_date))}}</div>
         </div>
         <div class="text-right"><a href="/news/{{$blog->slug}}" class="read-more">Read more</a></div>
      </div>
      <div class="clear"></div>
      <div class="blog-info col-md-12">
         <div class="blog-tags">
            @if($blog->tags)
            @foreach($blog->tags as $tag)
            <a href="/news/tag/{{$tag->tag_id}}">{{$tag->tagName}}</a>
            @endforeach
            @endif 
         </div>
      </div>
   </div>
</article>
@endforeach
@else
<div class="alert alert-danger">
   <h4 class="blognotavail">No News Available</h4>
</div>
@endif 
<div class=" text-center">
   {!! $posts->links() !!}
   <!-- <a href="#" class="btn btn-gray">Read more</a> -->
</div>