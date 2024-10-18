@extends('frontend.master')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="quantity">Update</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('paid-msg'))
                        <p class="alert alert-success">{{ Session::get('paid-msg') }}</p>
                    @endif
                    @if(Session::has('success-msg'))
                        <p class="alert alert-info">{{ Session::get('success-msg') }}</p>
                    @endif
                    @foreach($cart as $row)
                    <tr>

                        <td  class="cart_description">
                            <h4 style="margin-top: -5px;"><a href="">{{$row->name}}</a></h4>

                        </td>
                        <td class="cart_price">
                            <p>${{$row->price}}</p>
                        </td>
                        <form action="/cart_update/{{$row->rowid}}" method="post">
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input style="width:60px;" class="cart_quantity_input" type="number" name="quantity" value="{{$row->qty}}" autocomplete="off" size="3">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>

                        </td>
                            <td>
                                <button style="margin-top: -5px;"  type="submit" class="btn btn-primary">Update</button>
                            </td>
                        </form>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$row->price*$row->qty}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="/cart_delete/{{$row->rowid}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
@endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
  
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Please verify the amount and quantity</h3>
                <p>Choose checkout if you want to continue</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>${{($cart_total)-(Session::get('coupon_value'))}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            @if(Session::has('coupon_value')*100)
                            <li>Discount <span>${{Session::get('coupon_value')}}</span></li>
                            @endif
                            <li>Total <span>${{($cart_total)-(Session::get('coupon_value'))}}</span></li>
                        </ul>
                        @if(Auth::check())
                        <a class="btn btn-default check_out" href="/payment">Pay with Paypal</a>
                        <a class="btn btn-default check_out" href="/cod">Cash on delivery</a>
                        <form action="/stripe" method="POST" style="float: left;display: inline;margin-top: 18px;margin-left: 40px">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_FE92z9o3yzB4gQbS6agPBlfW"
                                    data-amount="{{$cart_total*100-(Session::get('coupon_value')*100)}}"
                                    data-name="Eshop"
                                    data-description="You will be charged ${{$cart_total-(Session::get('coupon_value'))}}"
                                    >
                            </script>

                        </form>

                        @endif

                        @if(!Auth::check())

                        <a class="btn btn-default check_out" style="float: right;margin-top: 30px" href="/login">Checkout</a>

                            @endif


                    </div>

                </div>
                @if(Auth::check())
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Do you have a coupon?</li>

                        </ul>

                            <form action="/coupons" method="post">
                                <div class="input-group col-md-12">
                                    <input style="width: 487px" type="text" name="code" class="form-control pull-right " placeholder="Coupon Code" >
                                    <button style="margin-top: 10px;" class="btn btn-primary pull-right" type="submit">Apply</button>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
      <span class="input-group-btn">
      </span>
                                </div><!-- /input-group -->
                            </form>

                    </div>

                </div>
@endif
            </div>
        </div>
    </section><!--/#do_action-->
    



@stop
