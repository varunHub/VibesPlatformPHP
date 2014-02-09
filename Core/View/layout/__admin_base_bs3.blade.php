@if (!isset($no_layout))    
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" ng-app>
  <head>
    <meta charset="utf-8">
    <title>{{$app_title_admin}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="revisit-after" content="2 days" />
    <meta name="googlebot" content="index, follow" />
    <meta name="robots" content="index, follow" />

    <link href="{{ $app_url_cdn; }}/css/custom.css" rel="stylesheet">
    <!--[if IE 7]><link href="{{ $app_url_cdn; }}/css/custom-ie7.css" rel="stylesheet"><![endif]-->

    <script src="{{ $app_url_cdn; }}/js/jquery.min.js"></script>
    <script src="{{ $app_url_cdn; }}/js/external.min.js"></script>
    <script src="{{ $app_url_cdn; }}/js/custom.min.js"></script>
    <script src="{{ $app_url_cdn; }}/js/admin.min.js"></script>    

    <style>
    body {
    min-height: 2000px;
    padding-top: 70px;
    }
      .ra {
        text-align: right;
      }
    </style>

    <!-- Fav and touch icons -->

@endif

@yield('script')
 
@if (!isset($no_layout))    
  </head>

  <body>

<!-- Fixed navbar -->
    <div class="navbar navbar-fixed-top navbar-inverse">
       <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">{{$app_title_admin}}</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">{{$app_title_admin}}</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Admin</a></li>
      <li><a href="#">Dashboard</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> System <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>{{ HTML::link('user/business','Business') }}</li>          
          <li>{{ HTML::link('user/category','Categories') }}</li>
          <li>{{ HTML::link('user/transport_method','Transport Method') }}</li>
          <li>{{ HTML::link('user/transport_station','Transport Station') }}</li>
          <li>{{ HTML::link('user/transport_method_station','Transport Method Station') }}</li>
          <li>{{ HTML::link('user/item','Item') }}</li>
          <li>{{ HTML::link('user/city','Cities') }}</li>
          <li>{{ HTML::link('user/parking','Parkings') }}</li>
          <li>{{ HTML::link('user/paymode','Payment Modes') }}</li>
          <li>{{ HTML::link('user/recognition','Recognitions') }}</li>
          <li>{{ HTML::link('user/worktime','Work Times') }}</li>
        </ul>
      </li>
    </ul>
  @yield('nav_bar')
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">FAQ</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
        <ul class="dropdown-menu">
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
      </div>


    <div class="container">
      

      <div class="row">
    @endif
      @yield('content')
    @if (!isset($no_layout))
      </div>
      <!-- /container -->
    </div>


   
  </body>
</html>
@endif