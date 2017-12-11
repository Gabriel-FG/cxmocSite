

<section class="blog-list">
<div class="container">

<div class="section-head text-center">
<h2 class="h4 text-uppercase">Mais Notícias</h2>
<p class="sub-title text-uppercase"></p>
</div>

<div class="row">

<div class="col-md-8">
<div class="blog-content">

<?php foreach ($noticias as $key => $noticia): ?>
<div class="post-inner">
<div class="post-format">
<div class="image-thumb">
<img src="<?php echo base_url() ?>assets/images/imgs_xadrez/<?php echo $noticia->imagem ?>" alt="Image">
</div>
<div class="post-title">
<h3 class="h5 text-uppercase">
<a href="<?php echo base_url('noticia-detalhes') ?>?id=<?php echo $noticia->id ?>"><?php echo $noticia->titulo ?></a>
</h3>
</div>
<div class="post-meta">
<ul>
<li>
<i class="fa fa-calendar"></i>
 <span><?php echo date("d/m/Y", $noticia->data);?></span>
</li>
<li>
<i class="fa fa-tags"></i>
</li>
</ul>
</div>
<div class="post-body">
<p><?php echo $noticia->descricao ?></p>
</div>
<div class="post-footer">
<a href="<?php echo base_url('noticia-detalhes') ?>?id=<?php echo $noticia->id ?>" class="on-btn btn-arrow">Veja Mais<i class="icon arrow_right"></i></a>
</div>
</div>
</div>
<?php endforeach ?>



</div><!-- 
<div class="pagination">
<span class="pagination-prev"><i class="fa fa-angle-left"></i></span>
<span class="current">1</span>
<a href="#">2</a>
<a href="#">3</a>
<a href="#" class="pagination-next"><i class="fa fa-angle-right"></i></a>
</div>
</div>
 -->



</div>
</div>
</section>

