<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>forms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="colorlib.com">

        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="/assets/payform/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
        <link rel="stylesheet" href="/assets/payform/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- STYLE CSS -->
        <link href="/assets/payform/css/payform.css" rel="stylesheet" type="text/css"/>
	  <style>
	  body{font-size:15px;}
   ul{padding-left:15px; list-style-type: decimal;}
   ul li{padding:10px 0px 10px 0px; text-align:justify; font-size:15px; color:black;    line-height: 30px;}
    ul ul{    list-style-type: upper-alpha; 
	}
	ul ul li{padding-bottom:15px;}
	.title{padding:2em 0px}
	
	.bn_form{ border: 1px solid black !important;
    max-width: 180px;
    display: inline-block;
    border-top: 0px !important;
    border-left: 0px !important;
    border-radius: 0px !important;
    border-right: 0px !important;
    height: 20px;
    outline: none !important;
    box-shadow: none !important;
    margin-left: 5px;
    line-height: normal;
    padding-left: 0px;
	    position: relative;
    top: -2px;
   
	}
	
	p {
    margin-top: 0;
    margin-bottom: 1rem;
    line-height: 30px;
}

.date_input{
width: 100%;
    text-align: right;
}
.logo{width:100%;float:left;}
.logo img{width: 141px;
    margin: 2em 0px 0px 0px;
}

.bottom-text{float:left;}
</style>
   </head>
    <body>
        <div class="wrapper">
		@include('layouts.errors-and-messages')
		@if(isset($assign_template))
            <form action="/templates/generatesubmit/{{$assign_template->id}}" id="template_form" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <!-- SECTION 1 -->
                <h4></h4>
                <section>
				
					<div class="template_div" id="template_div">
						{!! $assign_template->templet_html !!}
					</div>
					<div><b>@if($assign_template->count > 1)Duplicate Copy @endif</b></div>
					<input type="hidden" name="templet_html" id="templet_html" value="">
					<a id="proceed_btn" class="proceed">Submit</a>
					
                </section>


				
            </form>
			@endif
        </div>

        <script src="/assets/payform/js/jquery-3.3.1.min.js"></script>

        <!-- JQUERY STEP -->
        <!--<script src="/assets/payform/js/jquery.steps.js"></script>-->

       

        <!--<script src="/assets/payform/js/payform.js"></script>-->

        <!-- Template created and distributed by Colorlib -->
		
		<script>
			$('#proceed_btn').click(function(){
				
				$('#template_div input').each(function() {
					$(this).attr("value", $(this).val()); 
				});
				var template_html = $('#template_div').html();
				$('#templet_html').val(template_html);
				console.log(template_html);
				
				$('#template_form').submit();
				
			});
		</script>
    </body>
</html>