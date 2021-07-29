<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>@yield('title')</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />

		@yield('css')

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">


		<!-- Head Libs -->
		<script src="/assets/vendor/modernizr/modernizr.js"></script>
		<script src="/assets/vendor/jquery/jquery.js"></script>
		
		@yield('customCSS')
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="/assets/images/logo.png" height="35" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="/assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">{{Session::get('name')}}</span>
								<span class="role">{{Session::get('role') == 1 ? "Administrator" : "Staff"}}</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title" style="color:white">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li {!! Request::segment(1) == "" ?  "class='nav-active'" : "" !!}>
										<a href="/">
                                            <i class="fa fa-table" aria-hidden="true"></i>
											<span>Schedules</span>
										</a>
									</li>
									<li {!! Request::segment(1) == "slots" || Request::segment(1) == "new-slot" || Request::segment(1) == "edit-slot"?  "class='nav-active'" : "" !!}>
										<a href="/slots">
                                            <i class="fa fa-table" aria-hidden="true"></i>
											<span>Time Slot</span>
										</a>
									</li>
									<li {!! Request::segment(1) == "candidates" || Request::segment(1) == "new-candidate" || Request::segment(1) == "edit-candidate"?  "class='nav-active'" : "" !!}>
										<a href="/candidates">
                                            <i class="fa fa-table" aria-hidden="true"></i>
											<span>Candidates</span>
										</a>
									</li>
									@if(Session::get('role') == 1)
									<li {!! Request::segment(1) == "users" || Request::segment(1) == "new-user" || Request::segment(1) == "edit-user" ?  "class='nav-active'" : "" !!}>
										<a href="/users">
                                            <i class="fa fa-table" aria-hidden="true"></i>
											<span>Users</span>
										</a>
									</li>
									@endif
								</ul>
							</nav>
				
							<hr class="separator" />
				
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>@yield('title_section')</h2>
					</header>

					<!-- start: page -->
						@yield('content')
					<!-- end: page -->
				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/assets/javascripts/theme.init.js"></script>

		@yield('js')
		@yield('customJS')
	</body>
</html>