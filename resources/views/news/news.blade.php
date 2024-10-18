@extends('layouts.app')
@section('meta')
@if(isset($is_slug) && $is_slug == 1)
        <title> {{$posts[0]->meta_title}}</title>
        <meta name="keywords" content="{{$posts[0]->meta_keyword}}"/>
        <meta name="description" content="{{$posts[0]->meta_description}}"/>
        <meta property="og:title" content="{{$posts[0]->meta_title}}"/>
        <meta property="og:type" content="article"/>
        <meta property="og:description" content="{{$posts[0]->meta_description}}"/>
        <meta property="og:image" content="{{$posts[0]->image}}"/>
        <meta property="og:url" content="{{url('/news/'.$posts[0]->slug)}}"/>
    @else
        <title>News | Real Estate Insights | Axis ecorp</title>
        <meta name="keywords" content=""/>
        <meta name="description"
              content="Our News keeps you update with our projects of Axis ecorp and latest information about Real Estate industry trend."/>
        <link rel="canonical" href="http://axisecorp.com/news">
    @endif
@endsection
@section('content')
    @include('includes.header')
    <div class="layout">
        @include('includes.sidebar')
        <div class="content">

            @if(isset($categories) && count($categories) > 0)
                <div class="newschanels">
                    <section class="responsive slider">
                        @foreach($categories as $category)
                            <div class="item" data-category="{{$category->id}}"><a href="#">
                                    <img src="{{$category->logo}}"></a>
                            </div>
                        @endforeach
                    </section>
                </div>
            @endif
            <section class="blog-list section">
                <div class="container">
                    <div id="blog_wrapper" class="col-md-8">
                        @include('news.news_data')
                    </div>
                    <div class="col-secondary col-md-4 mr">
                        <div class="blog_search">
                            <h3 class="widget-title">Search</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_search" name="user_search"
                                       placeholder="Search here...">
                            </div>
                        </div>
                        <div class="resent_post">
                            <h3 class="widget-title">Archive</h3>
                            <ul id="archive_list">
                            </ul>
                        </div>
                        <div class="widget widget_recent_post">
                            <h3 class="widget-title">Recent News</h3>
                            @if(isset($recent) && count($recent) > 0)
                                @foreach($recent as $recentpost)
                                    <article class="recent-post">
                                        <div class="recent-post-thumbnail">
                                            <a href="/news/{{$recentpost->slug}}"><img alt="{{$recentpost->image_name}}"
                                                                                       src="{{$recentpost->image}}"
                                                                                       class="wp-post-image"></a>
                                            @if($recentpost->city != null) <span>{{$recentpost->city}}</span> @endif
                                        </div>
                                        <div class="recent-post-body">
                                            <h4 class="recent-post-title">
                                                <a href="/news/{{$recentpost->slug}}">{{$recentpost->title}}</a>
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
                                        <a href="/news/tag/{{$tag->id}}">{{$tag->tagName}}</a>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @include('includes.footer')
            <script type="text/javascript">
                $(document).ready(function () {
                    localStorage.setItem("month", '');
                    localStorage.setItem("year", '');
                    localStorage.setItem("is_archive", '0');
                    localStorage.setItem("category", '');
                    getArchives();
                    $(document).on('click', '.pagination a', function (event) {
                        event.preventDefault();

                        var page = $(this).attr('href').split('page=')[1];
                        fetch_data(page);
                    });

                    $("#user_search").keyup(function () {
                        fetch_data();
                    });
                    $(document).on('click', '.archivedata', function (event) {
                        if (typeof(Storage) !== "undefined") {
                            localStorage.setItem("month", $(this).attr('data-month'));
                            localStorage.setItem("year", $(this).attr('data-year'));
                            localStorage.setItem("is_archive", '1');
                        }
                        fetch_data();

                    });

                    $(document).on('click', '.item', function (event) {
                        if (typeof(Storage) !== "undefined") {
                            localStorage.setItem("category", $(this).attr('data-category'));
                        }
                        fetch_data();

                    });


                    function getArchives() {
                        str = '';
                        $.ajax({
                            url: "/getarchives",
                            method: "get",
                            data: {media_type: 2},
                            success: function (response) {
                                $.each(response, function (index, value) {
                                    var datas = [value.month, value.year];
                                    str = str + '<li data-month="' + value.month + '" data-year="' + value.year + '"class="archivedata cursor-pointer">' + value.new_date + '<span class="number">(' + value.counts + ')</span></li>';
                                });
                                $('#archive_list').html(str);
                            }
                        });
                    }

                    function fetch_data(page='1') {
                        var search = $("#user_search").val();
                        var blogmonth = localStorage.getItem("month");
                        var blogyear = localStorage.getItem("year");
                        var is_archive = localStorage.getItem("is_archive");
                        var category = localStorage.getItem("category");
                        //alert(category);

                        var pathArray = window.location.pathname.split('/');
                        if (pathArray[2] == "tag") {
                            if (is_archive == 1) {
                                datas = {
                                    type: "tags",
                                    tag: pathArray[3],
                                    search: search,
                                    month: blogmonth,
                                    year: blogyear,
                                    category: category
                                };
                            } else {
                                datas = {type: "tags", tag: pathArray[3], search: search, category: category};
                            }
                        } else {
                            if (is_archive == 1) {
                                datas = {
                                    type: "news",
                                    search: search,
                                    month: blogmonth,
                                    year: blogyear,
                                    category: category
                                };
                            } else {
                                datas = {type: "news", search: search, category: category};
                            }
                        }
                        $.ajax({
                            url: "/pagination/fetch_data_news?page=" + page,
                            data: datas,
                            success: function (data) {
                                $('#blog_wrapper').html(data);
                                window.scrollTo({top: 400, behavior: 'smooth'});
                            }
                        });
                    }

                });
            </script>


            <script type="text/javascript">
                $('.responsive').slick({
                    dots: true,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 6,
                                slidesToScroll: 6,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });
            </script>



@endsection



