@extends('frontend.master')

@section('extra_js')

    <script src="/assets_frontend/js/jquery.magnify.js"></script>

    <script>
        $(document).ready(function() {
            $('.clicked_here').click(function(){
                console.log($(this));
                var img = $(this).attr('src');
                $('#show_here').attr('src',img);
                $('#show_here').attr('data-magnify-src',img);
                $('#show_here').magnify();
            });
            $('#show_here').magnify();
        });
    </script>

    @stop

@section('extra_css')

    <link rel="stylesheet" href="/assets_frontend/css/magnify.css">

@stop

@section('content')

    <section>
        <div class="container">
            <div class="row">
                @include('frontend.sidebar')


                <div class="col-sm-9 padding-right">
                    @foreach ($products as $product)

                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">

                            <div class="view-product">

                                <img id="show_here" src="{{$product->images[0]->image}}" data-magnify-src="{{$product->images[0]->image}}" />

                            </div>

                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        @foreach($product->images as $product->image)
                                        <img class="clicked_here" style="width: 60px"src="{{$product->image->image}}" alt="">
                                      @endforeach
                                    </div>


                                </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>

                        <div class="col-sm-7">
                            @if(Session::has('success-msg'))
                                <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                            @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <div class="product-information"><!--/product-information-->
                                <h2>{{$product->name}}</h2>
								<span>

  <span style='text-decoration: line-through;'>${{$product->price}}</span>


									<span>${{$product->offer_price}}</span>

                                    <form action="/product_details/{{$product->id}}" method="POST" >
                                        <div class="col-lg-12" style="margin-bottom: 10px">
                                            <label>Quantity:</label>
                                            <input type="number" name="quantity" value="1"/>
                                        </div><br>


                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
									<button  type="submit"  class="btn btn-default cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                    </form>
								</span>

                                <div class="social-icons ">
                                    <ul class="nav navbar-nav">
                                        <li><a href="http://www.facebook.com/share.php?u={{Request::url()}}&title={{$product->name}}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="http://twitter.com/intent/tweet?status={{$product->name}}+{{Request::url()}}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="http://pinterest.com/pin/create/bookmarklet/?&url={{Request::url()}}&is_video=false&description={{$product->name}}"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>



                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
@endforeach
                        <div class="category-tab shop-details-tab"><!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>

                                    <li ><a href="#reviews" data-toggle="tab">Reviews</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="details" >

<p>{{$product->description}}</p>
                                </div>



                                <div class="tab-pane " id="reviews" >
                                    <div class="col-sm-12">
                                        <p><b>Reviews</b></p>
                                        @foreach($reviews as $review)
                                        <div class="list-group">
                                            <a class="list-group-item ">
                                                <h4 class="list-group-item-heading">{{$review->name}}</h4>
                                                <p class="list-group-item-text">{{$review->review}}</p>
                                            </a>
                                        </div>
                                        @endforeach
                                        <p><b>Write Your Review</b></p>
                                        @if(Session::has('success-msg-review'))
                                            <p class="alert alert-success">{{ Session::get('success-msg-review') }}</p>
                                        @endif

                                        <form action="/review/{{$product->id}}" method="post">
										<span>
											<input type="text" name="name" placeholder="Your Name"/>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="email" name="email" placeholder="Email Address"/>
										</span>
                                            <textarea name="review" ></textarea>
                                            <button type="submit" class="btn btn-default pull-right">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div><!--/category-tab-->


                </div>

            </div>
        </div>
    </section>

@stop
