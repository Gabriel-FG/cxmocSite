
<footer id="footer" class="footer">
<div class="container">
<div class="copyright text-uppercase">
Copyrights © 2017 Todos os direitos reservados ao Clube de Xadrez Montes Claros
</div>
<div style="margin-right:90px" class="foot-social">
<a href="https://www.facebook.com/XadrezMoc/" target="blank"><i class="fa fa-facebook"></i></a>
</div>
</div>
</footer>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript"> 


$(document).ready(function(){
    $('#enviar_email').click(function(){
      $.ajax({
                url: '<?php echo base_url("enviar-mensagem") ?>',
                type: 'POST',
                data: {
                    nome:$('#nome').val(),
                    email:$('#email').val(),
                    mensagem:$('#mensagem').val()
                  
                    },
                beforeSend: function(){
                    $('#loading').removeClass('loading-off');
                },
                success: function(result) {
                  if (result) {
                  	$('#alertamensagem').css('display', 'block');
                  }
                },
                complete: function(){
                    $('#loading').addClass('loading-off');
                }
            });



  });
});

	

        </script>

<script src="/cdn-cgi/scripts/0e574bed/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/jquery.owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/polaroids-gallery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/retina.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/scripts.js"></script>

</body>
</html>