<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Shop Fashion ST</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description')">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100" >
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
{{--<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>--}}
{{--<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&display=swap&subset=latin-ext" rel="stylesheet">
<link href="{!! url('public/user/css/bootstrap.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/bootstrap-responsive.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/style.css?v=1.00') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/flexslider.css') !!}" type="text/css" media="screen" rel="stylesheet">
<link href="{!! url('public/user/css/jquery.fancybox.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/cloud-zoom.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/portfolio.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="{!! url('public/user/css/font-awesome.min.css') !!}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.ico">
    <style>
        ul.bestseller li {
            height: 120px;
            padding: 10px 8px 10px 8px;
        }
        ul.bestseller li img {
            height: 100%;
            width: auto;
        }
        ul.bestseller li a.productname {
            font-weight: 700;
        }
        #categorymenu {
            margin: 20px 0 20px 0;
        }
        ul.categorymenu>li>a {
            font-weight: 700;
        }

        .fs-main {
            padding: 100px 0 15px 0;
            background: #f3f3f3;
        }
        .f-wrap {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }
        .fs-ctelist {
            /*padding: 25px 0 30px;*/
            background: #fff;
        }
        .fs-ctetit {
            text-align: center;
            font-size: 16px;
            color: #4a4a4a;
            text-transform: uppercase;
            margin-bottom: 25px;
        }
        .fs-cteul {
            display: table;
            width: 100%;
        }
        ul {
            list-style: none;
        }
        .fs-cteul li {
            display: table-cell;
            text-align: center;
            width: 13.66%;
        }
        .fs-cteul li a {
            display: inline-block;
        }
        .fs-cteul li a span {
            display: inline-block;
            text-align: center;
            overflow: hidden;
            margin-bottom: 15px;
            padding: 10px;
            width: 77px;
            height: 77px;
            background: #fff;
            border: solid 1px #dcdcdc;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
        }
        .fs-cteul li a p {
            font-size: 14px;
            text-align: center;
            color: #4a4a4a;
        }
    </style>
</head>
<body>
<!-- Header Start -->
<header>
  @include('user.blocks.header')
    <div class="container">
      @include('user.blocks.nav')
      @include('sweet::alert')
    </div>
</header>
<!-- Header End -->

<div id="maincontainer">

  
  @yield('content')
  

</div>
<!-- /maincontainer -->

<!-- Footer -->
@include('user.blocks.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script defer src="{!! url('public/user/js/custom.js') !!}"></script>
<script src="{!! url('public/user/js/jquery.js') !!}"></script> 
<script src="{!! url('public/user/js/bootstrap.js') !!}"></script> 
<script src="{!! url('public/user/js/respond.min.js') !!}"></script> 
<script src="{!! url('public/user/js/application.js') !!}"></script> 
<script src="{!! url('public/user/js/bootstrap-tooltip.js') !!}"></script> 
<script defer src="{!! url('public/user/js/jquery.fancybox.js') !!}"></script> 
<script defer src="{!! url('public/user/js/jquery.flexslider.js') !!}"></script> 
<script type="text/javascript" src="{!! url('public/user/js/jquery.tweet.js') !!}"></script> 
<script  src="{!! url('public/user/js/cloud-zoom.1.0.2.js') !!}"></script> 
<script  type="text/javascript" src="{!! url('public/user/js/jquery.validate.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('public/user/js/jquery.carouFredSel-6.1.0-packed.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('public/user/js/jquery.mousewheel.min.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('public/user/js/jquery.touchSwipe.min.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('public/user/js/jquery.ba-throttle-debounce.min.js') !!}"></script> 
<script src="{!! url('public/user/js/jquery.isotope.min.js') !!}"></script> 
<script src="{!! url('public/user/js/myscript.js') !!}"></script> 


</body>
</html>