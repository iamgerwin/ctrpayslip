<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation" id="mainNav">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">CTRPHILS</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="{{URL::to('dashboard')}}">Dashboard</a>
						</li>
<!-- For All -->
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">myProfile<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::to('myProfile/payslip')}}">Payslip</a>
								</li>
								<li>
									<a href="{{URL::to('myProfile/incentive')}}">Incentive</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
							</ul>
						</li>
<!-- For HR --> 
					@if( (Session::get('usertypeid') == 2) || (Session::get('usertypeid') == 1 ))
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">myUsers<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::to('myUsers/manageusers')}}">manageUsers</a>
								</li>
								<li>
									<a href="{{URL::to('myUsers/manageclients')}}">manageClients</a>
								</li>
							</ul>
						</li>
					@endif
<!-- For Accounting -->
					@if( (Session::get('usertypeid') == 3) || (Session::get('usertypeid') == 1) )
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">myAccounting<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::to('myAccounting/managepayslip')}}">managePayslip</a>
								</li>
								<li>
									<a href="#">manageIncentives</a>
								</li>
								<li>
									<a href="#">listUpload</a>
								</li>
							</ul>
						</li>
					@endif
<!-- For All-->
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">myAnnounce<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">allAnnoucements</a>
								</li>
								<!-- For NOT WEB USER -->
								
								<li>
									<a href="#">manageAnnouncement</a>
								</li>
								
							</ul>
						</li>

					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">{{Session::get('username')}}</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Do<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::to('/myProfile/config')}}">myConfig</a>
								</li>
								<li>
									<a href="http://lms.ctrphils.com">LMS</a>
								</li>
								<li>
									<a href="http://ctrphils.com">mainCTR</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="{{URL::to('logout')}}">logOut</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
</div>