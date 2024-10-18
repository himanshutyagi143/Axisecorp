 <div class="col-lg-3 col-md-4 col-12">
                        <ul class="aside-wrapper">
						   @if(Request::segment(1)=='profile')
                            <li class="active"><a href="/profile">Applicant Details</a></li>
							@else
							 <li><a href="/profile">Applicant Details</a></li>
						   @endif
							 @if(Request::segment(1)=='property')
                            <li class="active"><a href="/property/details">Property Details</a></li>
							@else
							 <li><a href="/property/details">Property Details</a></li>
							@endif
							 @if(Request::segment(1)=='account')
							<li class="active"><a href="/account/details">Account Details</a></li>                            
							@else
							<li><a href="/account/details">Account Details</a></li>	 
							@endif
							@if(Request::segment(2)=='statement')
							 <li class="active"><a href="/user/statement">Statement Of Accounts</a></li>                           
							@else
							 <li><a href="/user/statement">Statement Of Accounts</a></li>
							@endif
							@if(Request::segment(2)=='paymentschedule')
							<li class="active"><a href="/user/paymentschedule">Payment Schedule</a></li>                            
							@else
							<li><a href="/user/paymentschedule">Payment Schedule</a></li> 
							@endif
							@if(Request::segment(2)=='demandletters')
							 <li class="active"><a href="/user/demandletters">Demand Letters</a></li>                          
							@else
							<li><a href="/user/demandletters">Demand Letters</a></li>
							@endif
							@if(Request::segment(2)=='onlinepayment')
							<li class="active" ><a href="/user/onlinepayment">Online Payment</a></li>                       
							@else
							<li><a href="/user/onlinepayment">Online Payment</a></li>
							@endif
							@if(Request::segment(2)=='registry')
							 <li class="active"><a href="/user/registry">Registry Process</a></li>                    
							@else
							<li><a href="/user/registry">Registry Process</a></li>
							@endif	
							@if(Request::segment(2)=='appointment')
							  <li class="active"><a href="/user/appointment">Upcoming Appointment</a></li>                 
							@else
							 <li><a href="/user/appointment">Upcoming Appointment</a></li>
							@endif	
							@if(Request::segment(2)=='construction')  
							 <li class="active"><a href="/user/construction">Construction Updates</a></li>		
							@else
							 <li><a href="/user/construction">Construction Updates</a></li>	
							@endif
							@if(Request::segment(2)=='updatecontact')  
							 <li class="active"><a href="/user/updatecontact">Update Email/ Mobile No.</a></li>	
							@else
							 <li><a href="/user/updatecontact">Update Email/ Mobile No.</a></li>	
							@endif
							@if(Request::segment(2)=='query')  
							  <li class="active"><a href="/user/query">Raise a Query</a></li>
							@else
							 <li><a href="/user/query">Raise a Query</a></li>	
							@endif
							@if(Request::segment(2)=='documantation')  
							  <li class="active"><a href="/user/documantation">Documantation</a></li>
							@else
							 <li><a href="/user/documantation">Documantation</a></li>	
							@endif
							@if(Request::segment(2)=='bookunits')  
							  <li class="active"><a href="/user/bookunits">Book Units</a></li>
							@else
							 <li><a href="/user/bookunits">Book Units</a></li>	
							@endif
							 <li><a href="/logout">Logout</a></li>
							
                        </ul>       
                    </div>
					
					
		 
		