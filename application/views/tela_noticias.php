



<section class="blog-list">
<div class="container">

<div class="section-head text-center">
<h2 class="h4 text-uppercase">Notícias</h2>
<p class="sub-title text-uppercase"></p>
</div>

<div class="row">

<div class="col-md-8">
<div class="blog-content">

<div class="post">
<div class="post-media">
<div class="image-thumb">
<img src="<?php echo base_url() ?>/assets/images/imgs_xadrez/<?php echo $noticias->imagem; ?>" style=>
</div>
</div>
<div class="post-inner">
<div class="post-format">

</div>
<div class="post-title">
<h1 class="h4 text-uppercase">
<p><?php echo $noticias->titulo; ?></p>
</h1>
</div>

<div class="post-body">
<h5><p><?php echo $noticias->conteudo; ?></p></h5>
</div>
</div>


<div class="fb-comments" data-href="<?php echo base_url('noticia-detalhes') ?>?id=<?php echo $noticias->id ?>" data-numposts="5"></div>

<div id="fb-root"></div>


<!-- <div id="comments">
<div class="comments-inner-wrap">
 <h3 id="comments-title" class="h5 text-uppercase">Comentários</h3>
<ul class="commentlist">
</ul>
</div>
</div>


<div id="respond">
<div class="reply-title">
<h3 class="h5 text-uppercase">Deixe seu comentário</h3>
</div>

<form>
<div class="row">
<div class="col-md-6">
<div class="form-item form-name">
<input type="text" placeholder="Nome">
</div>
</div>
<div class="col-md-6">
<div class="form-item form-email">
<input type="text" placeholder="Email">
</div>
</div>
<div class="col-md-12">
<div class="form-item form-textarea-wrapper">
<textarea placeholder="Mensagem"></textarea>
</div>
</div>
<div class="col-md-4">
<div class="form-actions">
<input type="submit" value="Comment" class="on-btn btn-style-2 text-uppercase">
</div>
</div>
</div>
</form>
 -->
</div>

</div>

</div>
</div>


<div class="col-md-4">
<aside class="blog-sidebar">

</aside>
</div>

</div>
</div>
</section>

