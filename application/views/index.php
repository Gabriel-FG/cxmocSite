

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/lightcase/js/lightcase.js"></script>
<section id="hero" class="hero">
<div class="slider-wrapper">
<div class="hero-slider" data-background="bg-static">
<div class="item-slider">
<img src="<?php base_url() ?>assets/images/imgs_xadrez/clube.jpg" alt="Image">
</div>
<div class="item-slider">
<img src="<?php base_url() ?>assets/images/imgs_xadrez/1.jpg" alt="Image">
</div>
<div class="item-slider">
<img src="<?php base_url() ?>assets/images/imgs_xadrez/3.png" alt="Image">
</div>
</div>
</div>
<div class="hero-content text-center">
<h2 class="h1 text-uppercase" style="color:white; border: solid #613D00; text-shadow: 2px 2px black;">Clube de Xadrez 
	<p><span style="color:white" border color:"black" border width:"medium">Montes Claros</span></h2></p>
<h5 class="text-uppercase"></h5>

<div class="head-social">
<a href="https://www.facebook.com/XadrezMoc/" target="blank">Facebook</a>
</div>

</div>
<div class="scroll-to">
<div class="icon"></div>
</div>
</section>


<section id="sobre" class="about">
<div class="container">

<div class="section-head text-center">
<h1 class="h4 text-uppercase" style="font-size: 15">Sobre Nós</h1>
<h3><p class="sub-title">Nós somos um clube que têm por objetivo divulgar e difundir o xadrez em Montes Claros,<br>
	com eventos, torneios e xadrez para todos os participantes !</p></h3>
</div>

<section id="Galeria" class="team">
<div class="container-fluid">

<div class="section-head text-center">
<h2 class="h4 text-uppercase">Galeria de fotos</h2>
</div>
<div class="row">
<div class="team-slider">
<?php foreach ($fotos as $foto): ?>
<div class="team-item">
<div class="image-thumb">

<a href="<?php echo base_url()?>/assets/images/cxmoc_imgs/<?php echo $foto->imagem ?>" id="example" class="galeria-fotos" data-rel="lightcase:myCollection:slideshow" title="">

		<img style= "object-fit: cover !important; height: 250px; object-position: 50% 50% !important;" src="<?php base_url() ?>assets/images/cxmoc_imgs/<?php echo $foto->imagem ?>" alt="Image">

	</a>
<div class="icon-hover icon-hover-1"></div>
<div class="icon-hover icon-hover-2"></div>
</div>
<!-- <div class="item-body text-left">
</div> -->
</div>
<?php endforeach ?>
</div>

</div>
</div>
</section>


<section id="Noticias" class="latest-post">
<div class="container">

<div class="section-head text-center">
<h2 class="h4 text-uppercase">Notícias</h2>
<p class="sub-title text-uppercase">Cheque as nossas últimas notícias enxadrísticas</p>
</div>

<div class="row">
<div class="latest-slider">
<?php foreach ($noticias as $key => $noticia): ?>
<div class="post">
<div class="post-meta">
<ul>
</ul>
</div>
<div class="image-thumb">
<img src="<?php echo base_url() ?>assets/images/imgs_xadrez/<?php echo $noticia->imagem ?>" alt="Image">
</div>
<div class="post-inner">
<div class="post-title">
<h4 class="h5 text-uppercase">
<a href="<?php echo base_url('noticia-detalhes') ?>?id=<?php echo $noticia->id ?>"><?php echo $noticia->titulo ?></a>
</h4>
<?php echo date("d/m/Y", $noticia->data);?>
</div>
<div class="post-body">
<p><?php echo $noticia->descricao ?></p>
</div>
<div class="post-footer">
 <a href="<?php echo base_url('noticia-detalhes') ?>?id=<?php echo $noticia->id ?>" class="on-btn btn-arrow">Veja Mais <i class="icon arrow_right"></i></a>
</div>
</div>
</div>
<?php endforeach ?>

</div>
</div>
<div class="view-more-post text-center">
<a href="<?php echo base_url('mais-noticias') ?>" class="on-btn btn-style-2 text-uppercase">Ver mais notícias</a>
</div>
</div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.galeria-fotos').lightcase({

	useKeys: true,
	useCategories: true,
	navigateEndless: true

});
	});
</script>

<section id="onde_jogamos" class="onde_jogamos">
<div class="container">

<div class="section-head text-left">
<h2 class="h4 text-uppercase">Onde Jogamos</h2>
<p class="sub-title text-uppercase">Costumamos jogar no Ferroviário Esporte Clube aos Domingos, a partir das 8:00</p>
</div>


</div>


<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.9271492452235!2d-43.86198708504387!3d-16.730486388475434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xab54af9b9e69d5%3A0x730221ca27aef6e!2sFerrovi%C3%A1rio+Esporte+Clube!5e0!3m2!1spt-BR!2sbr!4v1512394685363" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</section>


<section id="nos_contate" class="contact">
<div class="container">

<div class="section-head text-left">
<h2 class="h4 text-uppercase">Nos contate</h2>
<p class="sub-title text-uppercase">Mande-nos uma mensagem caso queira fazer parte do nosso clube ou tenha qualquer dúvida.</p>
</div>

<div class="row">
<div class="col-md-6">
<form id="formulario" class="contact-form">
<div class="form-item fl">
<input id= 'nome' name="nome" type="text" placeholder="Nome">
</div>
<div class="form-item fr">
<input id='email' name="email" type="text" placeholder="Email">
</div>
<div class="form-textarea-wrapper">
<textarea id='mensagem' name="mensagem" placeholder="Mensagem"></textarea>
</div>
<div class="form-submit">
<p><input type="button" id="enviar_email" value="Enviar" class="on-btn btn-style-2 text-uppercase"></p>
		<p style='display: none;' id='alertamensagem'>Mensagem enviada com Sucesso!</p>
</div>
</form>
</div>
<div class="col-md-5 col-md-offset-1">
<div class="address-info">
<div class="address">
<i class="fa fa-map-marker"></i>
<span>Ferroviário Esporte Clube -- Praça Duque de Caxias, Santa Rita I, Montes Claros - MG</span>
</div>
<div class="email">
<i class="fa fa-envelope"></i>
<a href="#"><span style = "margin-left: 4px" class="__cf_email__" data-cfemail="fab58893949d9394ba93949c95d4999597">clubedexadrezmoc@gmail.com</span></a>
</div>
</div>
</div>
</div>
</div>
</section>