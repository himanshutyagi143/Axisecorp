<html >
   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
     
	   
	  <style>
       
			
			body{font-size:14px;}
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
			
			  input {
			//border:dotted;
			min-width: 80px;
			width: 100px;
			display: inline-block;
			}
			
			
		/*watermark*/
#watermark {


  position: fixed;
  width: 100%;
  height: 100%;
  margin-top: 30%;
  z-index: 100;
  opacity: 0.5;
}
#bg-text
{
    color:lightgrey;
    font-size:90pt;
    transform:rotate(300deg);
    -webkit-transform:rotate(300deg);
}
			
        </style>
 <style>
    
   
    header { position: fixed;  left: 0px; right: 0px;  height: 50px; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px;  height: 50px; }
   
  </style>
</head>

 
 <footer><!-- Allotee(s) ________________ Co-Allotee(s) ________________, if Any     Promoter______________ --></footer>
 {{--<header>Application No:  {{$application_no??'.....'}}  </header>--}}
  
	   
   </head>
   @if(!empty($duplicate))
<div id="watermark">
<p id="bg-text">Duplicate</p>
</div>
  @endif

   {!! $data !!}

					
</html>	









  
  




