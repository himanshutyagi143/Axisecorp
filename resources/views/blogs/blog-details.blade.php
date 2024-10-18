@extends('new_frontend.layouts.app')
@section('meta')
  @if(isset($post_exits) && $post_exits != 0)
  <title> {{$posts->title}}</title>
  <meta name="keywords" content="{{empty($posts->meta_keyword) ? 'Axis Ecorp Blogs' : $posts->meta_keyword}}"/>
  <meta name="description" content="{{empty($posts->meta_description) ? 'Explore whats trending in the real estate market.' : $posts->meta_description}}"/>
  <meta property="og:title" content="{{empty($posts->meta_title) ? $posts->title : $posts->meta_title}}" />
  <meta property="og:type" content="article" />
  <meta property="og:description" content="{{empty($posts->meta_description) ? 'Explore whats trending in the real estate market' : $posts->meta_description}}" />
  <meta property="og:image:secure_url" content="{{$posts->image}}" />
  <meta property="og:image" content="{{$posts->image}}" />
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="300" />
  <meta property="og:url" content="{{url('/blogs/'.$posts->slug)}}" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:creator" content="@axisercop" />
  <meta name="twitter:title" content="{{empty($posts->meta_title) ? $posts->title : $posts->meta_title}}" />
  <meta name="twitter:description" content="{{empty($posts->meta_description) ? 'Explore whats trending in the real estate market' : $posts->meta_description}}" />
  <meta name="twitter:image" content="{{$posts->image}}" />
  <meta name="twitter:player" content="" />
  @endif
@stop
@section('content')
   @include('new_frontend.includes.header')
      <div class="layout">
      	@include('new_frontend.includes.sidebar')
      	<section class="blog-details">
           <div class="container">
              <div class="row">
                @if(isset($post_exits) && $post_exits != 0)
                 <div class="col-primary col-md-8">
                    <article class="post">
                       <div class="post-thumbnail">
                          <img alt="{{$posts->image_name}}" class="img-responsive" src="{{$posts->image}}">
                       </div>
                       <header class="post-header">
                          <h1>{{$posts->title}}</h1>
                          <div class="blog-meta">
                             <div class="time">{{date('M d, Y',strtotime($posts->blog_date))}}</div>
                              @if($posts->author != null)
                               <div class="time">
                                  | By:  {{$posts->author}}   
                               </div>
                              @endif
                              @if($posts->source_link != null)
                               <div class="time">
                                  | Source Link:  <a href="{{$posts->source_link}}" target="_blank">Click Here </a>
                               </div>
                              @endif
                          </div>
                       </header>
                       <div class="blog-content">
                         {!!$posts->content!!}
                       </div>
                       <ul class="social-list">
                          <li><a href="https://api.whatsapp.com/send?text={{urlencode(url('/blogs/'.$posts->slug.'/'))}}"  data-action="share/whatsapp/share" class="fa fa-whatsapp whatsapp" target="_blank"></a></li>
                          <li><a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{urlencode(url('/blogs/'.$posts->slug.'/'))}}" class="fa fa-twitter twitter" target="_blank"></a></li>
                          <li><a href="https://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url={{urlencode(url('/blogs/'.$posts->slug.'/'))}}" class="fa fa-linkedin linkdin" target="_blank"></a></li>
                          <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url('/blogs/'.$posts->slug.'/'))}}&amp;src=sdkpreparse" class="fa fa-facebook facebook" target="_blank"></a></li>
                       </ul>
                       <div class="blog-tags">
                        @if($posts->tags)
                           @foreach($posts->tags as $tag)
                           <a href="/blogs/tag/{{$tag->tag_id}}">{{$tag->tagName}}</a>
                           @endforeach
                         @endif 
                       </div>
                       <div class="subscribe-form">
                        <br>  
                        
                        <div class="alert alert-success alert-block text-center show_msg_block" style="display: none;">
                          <strong>
                            <span class="show_msg"></span>
                          </strong>
                        </div>
                        
						  
						           <div class="blog_detail_form">
                          <h4>Please fill form to subscribe blogs!</h4>
                         <form method="POST"  id="subscribe-form">
                              <div class="row">
                                  <div class="col-md-3">
                                      <input type="text" class="form-control" name="name" placeholder="Enter Name" required id="name" />
                                      <input type="hidden" name="page_reference" value="news-blogs" id="page_reference" />
                                  </div>
                                  <div class="col-md-3">
                                      <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email" required />
                                  </div>
                                  <div class="col-md-3">
                                      <input type="text" name="phone" class="form-control" placeholder="Enter Phone" id="phone" />
                                  </div>
                                  <div class="col-md-3" >
                                      <input type="submit" name="submit-subscribe" class="btn btn-lg btn-success submit-subscriber" value="Subscribe" />
                                  </div>
                              </div>
                          </form>
						              </div>
                       </div>
                    </article>
                 </div>
                 <div class="col-secondary col-md-4">
                   <!-- <div class="resent_post" style="margin-top: 0px !important">
                      <h3 class="widget-title">Archive</h3>
                      <ul id="archive_list">
                      </ul>
                   </div> -->
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
                        @if(isset($tags) && count($tags) > 0)
                          @foreach($tags as $tag)
                          <a href="/blogs/tag/{{$tag->id}}">{{$tag->tagName}}</a>
                          @endforeach
                        @endif  
                       </div>
                    </div>
                 </div>
                  @else
                  <div class="alert alert-danger">
                     <h4 class="blognotavail">Blog Not Available</h4>
                  </div>
                  @endif  
              </div>
           </div>
        </section>
      	@include('new_frontend.includes.footer')
        <script type="text/javascript">
          $(document).ready(function(){
            $('#subscribe-form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                    url:"/add-subscriber",
                    method:"post",
                    data:{name:$('#name').val(),email:$('#email').val(),phone:$('#phone').val(),page_reference:$('#page_reference').val()},
                    success:function(response)
                    {
                      if(response.status == 1){
                        $('.show_msg_block').show();
                        $('.show_msg').text(response.msg);
                        $('#name').val('');
                        $('#email').val('');
                        $('#phone').val('');
                        setTimeout(function(){ $('.show_msg_block').hide(); }, 3000);
                      }
                    }
                });
            });
          });
        </script>
@endsection