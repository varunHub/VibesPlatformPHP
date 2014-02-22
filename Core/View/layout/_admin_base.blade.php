@if (!isset($no_layout))
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" ng-app>
	<head>
		<meta charset="utf-8">
		<title>boost.com</title>
		<meta name="description" content="">
		<meta name="keywords" content="" />
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="revisit-after" content="2 days" />
		<meta name="googlebot" content="index, follow" />
		<meta name="robots" content="index, follow" />

		<!-- Le styles -->
		<link href="{{$app_url_cdn}}/css/bootstrap.2.3.2.css" rel="stylesheet">
		<link href="{{$app_url_cdn}}/css/vux-base.css" rel="stylesheet">

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{$app_url_cdn}}/js/jquery-2.0.3.min.js"></script>
		
		
		<script src="{{$app_url_cdn}}/js/bootstrap.2.3.2.min.js"></script>
		<script src="{{$app_url_cdn}}/js/angular.min.js"></script>
		<script src="{{$app_url_cdn}}/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="{{$app_url_cdn}}/js/app.js" type="text/javascript"></script>



		<link href="{{$app_url_cdn}}/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]><link href="{{$app_url_cdn}}/css/font-awesome-ie7.css" rel="stylesheet"><![endif]-->

		<style>
			body {
				padding-top: 10px; /* 60px to make the container go all the way to the bottom of the topbar */
			}

			.ra {
				text-align: right;
			}
		</style>
		<!-- Fav and touch icons -->
@endif

@if (!isset($no_layout))
	</head>

	<body>
		<div class="container">
			<div class="navbar navbar-inverse" >
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
						<a class="brand" href="#">i Directory</a>
						<div class="nav-collapse collapse navbar-inverse-collapse">
							<ul class="nav">
								<li class="active">
									<a href="#">Home</a>
								</li>
								<!--
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">Action</a>
										</li>
										<li>
											<a href="#">Another action</a>
										</li>
										<li>
											<a href="#">Something else here</a>
										</li>
										<li class="divider"></li>
										<li class="nav-header">
											Nav header
										</li>
										<li>
											<a href="#">Separated link</a>
										</li>
										<li>
											<a href="#">One more separated link</a>
										</li>
									</ul>
								</li>
							-->
							</ul>
							<ul class="nav pull-right">
								<li>
									<a href="#">FAQ</a>
								</li>
								<li class="divider-vertical"></li>
								<!--
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">Action</a>
										</li>
										<li>
											<a href="#">Another action</a>
										</li>
										<li>
											<a href="#">Something else here</a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="#">Separated link</a>
										</li>
									</ul>
								</li>
								-->
							</ul>
						</div><!-- /.nav-collapse -->
					</div>
				</div><!-- /navbar-inner -->
			</div>

			<div class="row">
				<div class="span3">
				<ul class="nav nav-list">
  <li class="nav-header">User Setting</li>
  <li>{{ HTML::link('user/business','Business') }}</li>
  <li class="nav-header">Admin Setting</li>
  <li>{{ HTML::link('user/category','Categories') }}</li>
  <li>{{ HTML::link('user/transport','Transports') }}</li>
  <li>{{ HTML::link('user/item','Item') }}</li>
  <li>{{ HTML::link('user/city','Cities') }}</li>
  <li>{{ HTML::link('user/parking','Parkings') }}</li>
  <li>{{ HTML::link('user/paymode','Payment Modes') }}</li>
  <li>{{ HTML::link('user/recognition','Recognitions') }}</li>
  <li>{{ HTML::link('user/worktime','Work Times') }}</li>
</ul>
</div>
@endif
					@yield('content')
@if (!isset($no_layout))		
			</div>
			<!-- /container -->
		</div>
	</body>
</html>
@endif