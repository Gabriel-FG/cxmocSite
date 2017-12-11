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

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/lib/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/lib/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/lib/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/lightcase/css/lightcase.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/lib/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/lightcase/css/lightcase-no-breakpoint.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<title>CXMOC</title>
</head>
<body id="page-top" data-spy="scroll">

<div class="preloader">
<div class="loading-wrap">
<div class="p-loading" data-loading="CXMOC">CXMOC...</div>
</div>
</div>


<div id="page-wrap">

<header id="header" class="header header-sticky">
<div class="container">

<div class="logo">
<a href="<?php echo base_url() ?>">	<img src="<?php echo base_url() ?>/assets/images/imgs_xadrez/cxmoc_logo.png" alt="imagem" style = "height: 62px; max-height: 62px"; >
</a>
</div>

<div class="open-menu">
<span class="item-1"></span>
<span class="item-2"></span>
<span class="item-3"></span>
</div>

<nav class="on-navigation text-right" data-menu-type="1200">

<ul class="nav text-uppercase">
<li class="menu-item"><a href="<?php echo base_url() ?>">Home</a></li>
</li>
<?php if(!$this->uri->segment(1)){ ?>
<li class="menu-item"><a href="#sobre">Sobre Nós</a></li>
<?php } ?>
<?php if(!$this->uri->segment(1)){  ?><li class="menu-item"><a href="#Galeria">Galeria de fotos</a></li>
<?php } ?>
<?php if(!$this->uri->segment(1)){  ?><li class="menu-item"><a href="#Noticias">Notícias</a></li>
<?php } ?>
<?php if(!$this->uri->segment(1)){ ?>
<li class="menu-item"><a href="#onde_jogamos">Onde Jogamos</a></li>
<?php } ?>
<?php if(!$this->uri->segment(1)){ ?>
<li class="menu-item"><a href="#nos_contate">Nos Contate</a></li>
<?php } ?>
</ul>




</nav>

</div>
</header>