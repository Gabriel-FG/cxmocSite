<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/lib/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/lib/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="css/lib/animate.css">

<link rel="stylesheet" type="text/css" href="css/style.css">
<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<title>Oringin</title>
</head>
<body id="page-top" data-spy="scroll">

<div class="preloader">
<div class="loading-wrap">
<div class="p-loading" data-loading="Loading">Loading</div>
</div>
</div>


<div id="page-wrap">

<header id="header" class="header header-1">
<div class="container">

<div class="logo">
<a href="index.html">
<img src="images/logo.png" alt="">
</a>
</div>

<div class="on-social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-dribbble"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
</div>
</div>
</header>

<section class="page-comingsoon">
<div class="bg-pattern pattern-1"></div>
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
<div class="page-content text-center">
<div class="tb">
<div class="tb-cell">
<h4 class="text-uppercase">OUR WEBSITE IS COMING SOON</h4>
<div id="countdown"></div>
<div class="subscribe">
<form>
<div class="form-item">
<input type="text" placeholder="Email..." class="text-center">
</div>
<div class="form-submit">
<input type="submit" value="Subscribe" class="on-btn btn-style-2 text-uppercase">
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>


<script type="text/javascript" src="js/lib/jquery-1.11.2.min.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.owl.carousel.min.js"></script>
<script type="text/javascript" src="js/lib/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="js/lib/polaroids-gallery.js"></script>
<script type="text/javascript" src="js/lib/retina.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="js/lib/jquery.countdown.min.js"></script>
<script type="text/javascript">
    
  var nextYear = new Date(new Date().getFullYear() + 2, 0, 0, 0, 0, 0, 0);
  $('#countdown').countdown(nextYear, function(event) {
    var $this = $(this).html(event.strftime(''
      + '<div class="item"><span class="count">%d</span><span>days</span></div>'
      + '<div class="item"><span class="count">%H</span><span>hours</span></div>'
      + '<div class="item"><span class="count">%M</span><span>minutes</span></div>'
      + '<div class="item"><span class="count">%S</span><span>seconds</span></div>'));
  });
</script>
</body>
</html>