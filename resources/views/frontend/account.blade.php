@extends('frontend.master')

@section('extra_js')
    <script>
    (function(){
    'use strict';
    var $ = jQuery;
    $.fn.extend({
    filterTable: function(){
    return this.each(function(){
    $(this).on('keyup', function(e){
    $('.filterTable_no_results').remove();
    var $this = $(this),
    search = $this.val().toLowerCase(),
    target = $this.attr('data-filters'),
    $target = $(target),
    $rows = $target.find('tbody tr');

    if(search == '') {
    $rows.show();
    } else {
    $rows.each(function(){
    var $this = $(this);
    $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
    })
    if($target.find('tbody tr:visible').size() === 0) {
    var col_count = $target.find('tr').first().find('td').size();
    var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
    $target.find('tbody').append(no_results);
    }
    }
    });
    });
    }
    });
    $('[data-action="filter"]').filterTable();
    })(jQuery);

    $(function(){
    // attach table filter plugin to inputs
    $('[data-action="filter"]').filterTable();

    $('.container').on('click', '.panel-heading span.filter', function(e){
    var $this = $(this),
    $panel = $this.parents('.panel');

    $panel.find('.panel-body').slideToggle();
    if($this.css('display') != 'none') {
    $panel.find('.panel-body input').focus();
    }
    });
    $('[data-toggle="tooltip"]').tooltip();
    })
    </script>

    @stop

@section('extra_css')
    <style>

    .clickable{
    cursor: pointer;
    }

    .panel-heading div {
    margin-top: -18px;
    font-size: 15px;
    }
    .panel-heading div span{
    margin-left:5px;
    }
    .panel-body{
    display: none;
    }
    </style>
    @stop

@section('content')

<div class="main" id="innerpage">
            <!-- banner -->
            <div class="banner">
                <!--Slider-->
                <div class="button_container" id="toggle">
                    <div class="arrow-down"></div>
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>

                <div class="overlay" id="overlay">
                    <nav class="overlay-menu">
                        <ul>
                            <li ><a href="/">Home</a></li>
                            <li><a href="/aboutus">About Us</a></li>
                            <li><a href="/axisblues">Axis Blues</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/login">SignIn/ Sign Up</a></li>
                        </ul>
                    </nav>
                </div>
				

                <div id="demo-2" data-zs-src='["/fronted/images/2.jpg"]' data-zs-overlay="dots">
                    <div class="demo-inner-content">
                        <div class="baner-info">
                            <h3>Account DETAILS</h3>
                        </div>	
                    </div>
                </div>
                <!--//Slider-->

            </div>
            <!-- //banner -->
        </div>
       

    <div class="container" >

        @if(Session::has('paid-msg'))
            <p class="alert alert-success">{{ Session::get('paid-msg') }}</p>
        @endif
        <h2 class="title text-center">Order Details</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tasks</h3>
                        <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <input type="text" class="form-control" id="task-table-filter" data-action="filter" data-filters="#task-table" placeholder="Filter Tasks" />
                    </div>
                    <table class="table table-hover" id="task-table">
                        <thead>
                        <tr>
                            <th>Product id</th>
                            <th>Product Name</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->product}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
