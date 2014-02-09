<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" ng-app>
	<head>
		<meta charset="utf-8">
		<title>{{$app_title}}</title>
		<meta name="description" content="">
		<meta name="keywords" content="" />
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="revisit-after" content="2 days" />
		<meta name="googlebot" content="index, follow" />
		<meta name="robots" content="index, follow" />

		<link href="{{ $app_url_cdn; }}/css/custom.css" rel="stylesheet">
		<!--[if IE 7]><link href="{{ $app_url_cdn; }}/css/custom-ie7.css" rel="stylesheet"><![endif]-->

		<style>
			body {
				padding-top: 70px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
			.ra {
				text-align: right;
			}

			.container {
				max-width: 950px;
			}
		</style>
		<!-- Fav and touch icons -->
	</head>

	<body>


	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">{{$app_title}}</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div><!-- /.nav-collapse -->		
		</div>
	</div>

		
		<div class="container">
			@yield('content')
		</div>

		<script src="{{ $app_url_cdn; }}/js/jquery.min.js"></script>
		<script src="{{ $app_url_cdn; }}/js/external.min.js"></script>
		<script src="{{ $app_url_cdn; }}/js/custom.min.js"></script>

 	</body>
</html>