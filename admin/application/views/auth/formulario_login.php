<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin CXMOC</title>

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logo.ico">

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/meio.mask.js"></script>

    <script>
        $(function(){
            $('input[type="text"]').setMask();
        })
    </script>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img src="<?php echo base_url() ?>/assets/imagem/imgs_xadrez/cxmoc_logo.jpg">
            </div>
            <h3>Bem-vindo</h3>
            <p>Informe seus dados para obter acesso ao sistema.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <?php if (isset($error) && $error): ?>
                <p class="text-danger">Dados inválidos</p>
            <?php endif ?>
            <form class="m-t" role="form" action="<?php echo base_url(array('validar-login')) ?>" method="post">
                <div class="form-group">
                    <!-- <input type="email" name="email" class="form-control" placeholder="E-mail" required=""> -->
                    <input type="text" name="cpf" class="form-control" placeholder="CPF" alt="cpf" required>
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required="">
                </div>
                <button type="submit" class="btn btn-warning block full-width m-b">Login</button>

                <a href="#"><small>Esqueceu a senha?</small></a>
                <!-- <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            </form>
            <p class="m-t"> <small>Tectotum Tecnologia &copy; <?php echo date('Y') ?></small> </p>
        </div>
    </div>

</body>

</html>
