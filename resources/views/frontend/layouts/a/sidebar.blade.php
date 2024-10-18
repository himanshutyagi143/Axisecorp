<!-- BEGIN SIDEBAR -->
<div class="page-sidebar " id="main-menu">
	<!-- BEGIN MINI-PROFILE -->
	<div class="page-sidebar-wrapper" id="main-menu-wrapper">
		<!-- BEGIN SIDEBAR MENU -->
		<ul>
			<li @if(Request::segment(2)=='') class="active" @endif  >
				<a href="/{{$administrator}}">
					<i class="fa fa-tachometer"></i>
					<span class="title"> Dashboard</span>
				</a>
			</li>
			<li @if(Request::segment(2)=='calendar') class="active" @endif  >
				<a href="/{{$administrator}}/calendar">
					<i class="fa fa-calendar"></i>
					<span class="title"> Calendar</span>
				</a>
			</li>
			@if(Auth::user()->role=='1' || (Auth::user()->role==2  && Auth::user()->company_type_id == 1))
				<li class="start  @if(Request::segment(2)=='crm') open active @endif " > <a href=""><i class="fa fa-bars"></i><span class="title">CRM</span></a>
					<ul class="sub-menu">
						<li class="start  @if(Request::segment(3)=='searchcustomer') open active @endif "  ><a href="/{{$administrator}}/crm/searchcustomer"><i class="fa fa-search"></i>  Customer Search</a> </li>
						<li class="start  @if(Request::segment(3)=='customers') open active @endif "  ><a href="/{{$administrator}}/crm/customers"><i class="fa fa-group"></i>  Manage Customers</a> </li>
						@if((Auth::user()->role=='1' ||Auth::user()->role==2) &&(Auth::user()->company_type_id<=3))
							<li class="start  @if(Request::segment(3)=='leads') open active @endif "> <a href="/{{$administrator}}/crm/leads"> <i class="fa fa-building-o"></i>Leads</a> </li>
						@endif
						<li @if(Request::segment(3)=='tickets') class="active" @endif> <a href=" {{ route($administrator.'.'.'crm.tickets.index') }}"> <i class="fa fa-ticket" aria-hidden="true"></i>  <span class="title"> Ticket Management</span></a></li>
					</ul>
				</li>
			@endif
			@if(Auth::user()->role=='1' || (Auth::user()->role==2  && Auth::user()->company_type_id == 1))
				<li @if(Request::segment(2)=='users') class="active" @endif>
					<a href="/{{$administrator}}/users"> <i class="fa fa-id-card" aria-hidden="true"></i>
						<span class="title">Users</span>
					</a>
				</li>
			@elseif(Auth::user()->role==2 && Auth::user()->company_type_id != 1)
				<li @if(Request::segment(2)=='users') class="active" @endif>
					<a href="/{{$administrator}}/users"> <i class="fa fa-id-card" aria-hidden="true"></i>
						<span class="title">My Team</span>
					</a>
				</li>
			@endif

			<!-- Start by Abhishek -->
			<li @if(Request::segment(2)=='activities') class="active" @endif  ><a href="/{{$administrator}}/activities"><i class="fa fa-book" aria-hidden="true"></i>  <span class="title">Activities</span></a></li>
			<!-- End by Abhishek -->
			@if((Auth::user()->role=='1' || Auth::user()->role=='2' || Auth::user()->role=='3'|| Auth::user()->role=='4') && (Auth::user()->company_type_id==1))
				<li @if(Request::segment(2)=='company') class="active" @endif  ><a href="/{{$administrator}}/company/admin"><i class="fa fa-address-book" aria-hidden="true"></i>  <span class="title">Channel Partner</span></a></li>
			@endif

			@if(Auth::user()->role=='1' || (Auth::user()->role==2  && Auth::user()->company_type_id == 1))
				<li  class="start  @if(Request::segment(2)=='orders'|| Request::segment(2)=='payment_gateway') open active @endif "  >
					<a href="#"> <i class="fa fa-gear"></i> <span class="title">Payment Management</span> <span class="manage"></span> </span> </a>
					<ul class="sub-menu">
						<li class=""> <a href="/{{$administrator}}/orders"><i class="fa fa-suitcase"></i><span class="title">Payments</span></a></li>
						@if(Request::segment(1)=='administrator' && (Auth::user()->role == 1 || Auth::user()->role == 2))
							<li @if(Request::segment(2)=='payment_gateway') class="active" @endif> <a href="/{{$administrator}}/payment_gateway"> <i class="fa fa-rocket"></i>
									<span class="title">Payments Gateway</span> <span class="selected"></span> </span> </a>
							</li>
						@endif
					</ul>
				</li>
			@endif
			@if(Auth::user()->role=='1' || (Auth::user()->role==2  && Auth::user()->company_type_id == 1))
				{{--<li @if(Request::segment(2)=='leave_management') class="active" @endif> <a href="/{{$administrator}}/leave_management"> <i class="fa fa-plane" aria-hidden="true"></i>  <span class="title"> Leave Management</span></a></li>--}}
			@endif
			@if(Auth::user()->role=='1' || (Auth::user()->role==2  && Auth::user()->company_type_id == 1))
				<li class="start  @if(Request::segment(2)=='project'||Request::segment(2)=='payment_plans'||Request::segment(2)=='othercharges') open active @endif" > <a href="#"> <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="title">Projects</span> <span class="manage"></span> </span> </a>
					<ul class="sub-menu">
						<li @if(Request::segment(2)=='project') class="active" @endif > <a href="/{{$administrator}}/project"> Project List </a> </li>
						@if(Request::segment(1)=="administrator" && (Auth::user()->role == 1 || Auth::user()->role == 2))
							<li  @if(Request::segment(2)=='payment_plans') class="active" @endif > <a href="/{{$administrator}}/payment_plans"> Payment Plans </a> </li>
							<li @if(Request::segment(2)=='othercharges') class="active" @endif > <a href="/{{$administrator}}/othercharges"> Other Charges </a> </li>
						@endif
					</ul>
				</li>
			@endif
			@if(Auth::user()->role=='1' || (Auth::user()->role==2  && Auth::user()->company_type_id == 1))
				{{--<li> <a href="/{{$administrator}}/reports"> <i class="fa fa-calendar"></i>  <span class="title">Reports</span></a></li>
				<li  class="start  @if(Request::segment(2)=='system'||Request::segment(2)=='manageblock'||Request::segment(2)=='manageprojecttype'|| Request::segment(2)=='managedocumentetype'||Request::segment(2)=='Statustype'||Request::segment(2)=='unitdetailstype'|| Request::segment(2)=='media_library' || Request::segment(2)=='seo') open active @endif "  >
					<a href="#"> <i class="fa fa-gear"></i> <span class="title">System</span> <span class="manage"></span> </span> </a>
					<ul class="sub-menu">
						<li @if(Request::segment(2)=='system') class="active" @endif > <a href="/{{$administrator}}/system"> <i class="fa fa-cogs" aria-hidden="true"></i> <span class="title">System Setting</span>   </a> </li>
						<li class="start @if(Request::segment(2)=='manageblock'||Request::segment(2)=='manageprojecttype'||Request::segment(2)=='managedocumentetype'||Request::segment(2)=='Statustype'||Request::segment(2)=='unitdetailstype') open active @endif "  > <a href="#"> <i class="fa fa-database" aria-hidden="true"></i> <span class="title">Metadata</span> <span class="manage"></span> </span> </a>
							<ul class="sub-menu">
								<li @if(Request::segment(2)=='manageblock') class="active" @endif > <a href="/{{$administrator}}/manageblock"> Manage Block Type </a> </li>
								<li @if(Request::segment(2)=='manageprojecttype') class="active" @endif > <a href="/{{$administrator}}/manageprojecttype"> Manage Project Type </a> </li>
								<li @if(Request::segment(2)=='managedocumentetype') class="active" @endif > <a href="/{{$administrator}}/managedocumentetype"> Manage Document Type </a> </li>
								<li @if(Request::segment(2)=='Statustype') class="active" @endif > <a href="/{{$administrator}}/Statustype"> Manage Status Type </a> </li>
								<li @if(Request::segment(2)=='unitdetailstype') class="active" @endif > <a href="/{{$administrator}}/unitdetailstype"> Manage Unit Details Type </a> </li>
							</ul>
						</li>
						<li @if(Request::segment(2)=='media_library') class="active" @endif> <a href="/{{$administrator}}/media_library"> <i class="fa fa-play"></i> <span class="title">Media Library</span>   </a> </li>
						<li @if(Request::segment(2)=='seo') class="active" @endif> <a href="/{{$administrator}}/seo"> <i class="fa fa-globe"></i>  <span class="title">Seo</span></a></li>
					</ul>
				</li>--}}

			@endif

			@if(Auth::user()->role=='1' || (Auth::user()->role==2  && Auth::user()->company_type_id == 1))
				<li  class="start  @if(Request::segment(2)=='others'|| Request::segment(2)=='templets'|| Request::segment(2)=='vendor_invite') open active @endif "  >
					<a href="#"> <i class="fa fa-gear"></i> <span class="title">Others</span> <span class="manage"></span> </span> </a>
					<ul class="sub-menu">
						<li  @if(Request::segment(2)=='templets') class="active" @endif> <a href="/{{$administrator}}/templets"> <i class="fa fa-wpforms" aria-hidden="true"></i>
								<span class="title">Templates</span></a>
						</li>
						<li @if(Request::segment(2)=='vendor_invite') class="active" @endif> <a href="/{{$administrator}}/vendor_invite"> <i class="fa fa-link" aria-hidden="true"></i>
								<span class="title"> Invited Links</span></a>
						</li>
					</ul>
				</li>
			@endif

			<li @if(Request::segment(2)=='logout') class="active" @endif> <a href="/{{$administrator}}/auth/logout"> <i class="fa fa-power-off"></i>  <span class="title">Logout</span></a></li>
		</ul>
		<div class="clearfix"></div>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<div class="footer-widget">
	{{--<div class="progress transparent progress-small no-radius no-margin">
        <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>
    </div>--}}
	<div class="pull-right">
		{{--<div class="details-status"> <span data-animation-duration="560" data-value="86" class="animate-number"></span>% </div>--}}
		<a href="/{{$administrator}}/auth/logout"><i class="fa fa-power-off"></i></a>
	</div>
</div>
<!-- END SIDEBAR --> 