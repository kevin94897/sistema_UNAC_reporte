<!DOCTYPE html>
  <html>
  <meta charset="UTF-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title>Sistema Intranet Bibliotecario | CCIESAM</title>
  <link href="fonts.css" rel="stylesheet">
  <link href="<?= base_url('recursos/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('recursos/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('recursos/css/estilos.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('recursos/css/main.css') ?>" />

  <script type="text/javascript" src="<?= base_url('recursos/js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('recursos/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('recursos/js/socialShare.min.js') ?>"></script>
</head>
<body class="is-loading">

    <!-- Wrapper -->
      <div class="col-md-12" id="wrapper">

        <!-- Main -->
          <div class="col-md-4 col-md-offset-2" id="main" style="margin-right: 10px">
            <header>
              <span class="avatar"><img src="<?= base_url() ?>recursos/img/base.png" alt="" /></span>
              <h1>Base de Datos de la Biblioteca | CCIESAM</h1>
            </header>
            <footer>
              <ul class="icons">
                <li><a href="<?php echo base_url();?>index.php/home/verLibroAdmin">Modificar Registros</a></li>
              </ul>
            </footer>
          </div>

          <div class="col-md-4" id="main">
            <header>
              <span class="avatar"><img src="<?= base_url() ?>recursos/img/biblioteca.jpg" alt="" /></span>
              <h1>Sistema Intranet Bibliotecario | CCIESAM</h1>
            </header>
            <footer>
              <ul class="icons">
                <li><a href="<?=base_url()?>index.php/home/index">Ingresar a Biblioteca</a></li>
              </ul>
            </footer>
          </div>

      </div>

    <!-- Scripts -->
      <!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
      <script>
        if ('addEventListener' in window) {
          window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
          document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
        }
      </script>

  </body>