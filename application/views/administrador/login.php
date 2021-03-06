<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="es"> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" lang="es"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Sistema Intranet Bibliotecario |Centro Cultural Santiago Antunez de Mayolo</title>
  <link href="<?= base_url('recursos/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('recursos/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('recursos/css/estilos.css') ?>" rel="stylesheet">
  <style type="text/css">
  @font-face {
  font-family: 'Conv_Foco';
  src: url('<?= base_url('recursos/fonts/Foco.eot') ?>');
  src: local('☺'), url('<?= base_url('recursos/fonts/Foco.woff') ?>') format('woff'), url('<?= base_url('recursos/fonts/Foco.ttf') ?>') format('truetype'), url('<?= base_url('recursos/fonts/Foco.svg') ?>') format('svg');
  font-weight: normal;
  font-style: normal;
  }

  @font-face {
  font-family: 'Conv_Foco-Bold';
  src: url('<?= base_url('recursos/fonts/Foco-Bold.eot') ?>');
  src: local('☺'), url('<?= base_url('recursos/fonts/Foco-Bold.woff') ?>') format('woff'), url('<?= base_url('recursos/fonts/Foco-Bold.ttf') ?>') format('truetype'), url('<?= base_url('recursos/fonts/Foco-Bold.svg') ?>') format('svg');
  font-weight: normal;
  font-style: normal;
  }

  @font-face {
  font-family: 'Conv_Lato-Medium';
  src: url('fonts/Lato-Medium.eot');
  src: local('☺'), url('<?= base_url('recursos/fonts/Lato-Medium.woff') ?>') format('woff'), url('<?= base_url('recursos/fonts/Lato-Medium.ttf') ?>') format('truetype'), url('<?= base_url('recursos/fonts/Lato-Medium.svg') ?>') format('svg');
  font-weight: normal;
  font-style: normal;
  }

  </style>
</head>

<body class="fondo-home">

  <div class="container">

    <div id="form" class="main-container box effect7">

      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-9 text-center">
            <br><h1 class="boldg">Sistema Intranet Bibliotecario CCIESAM</h1><br>
            <h3 class="boldm">Centro Cultural Santiago Antunez de Mayolo</h3>
          </div>
          <div class="col-sm-3">
            <img src="<?= base_url() ?>recursos/img/logo.png" align="center" width="50%" style="display: block;margin-left: auto;margin-right: auto;">
          </div>
        </div>
      </div>
      <?php echo form_open('verifylogin'); ?>
      <div class="row">
        <div class="col-md-12">
            <legend class="user">USUARIO</legend>
            <div class="col-sm-5">
              <input type="text" class="form-input form-control" name="usuario" placeholder="Usuario">
            </div>
            <div class="col-sm-4">        
              <input type="password" class="form-input form-control" name="password" placeholder="Contraseña">
            </div>
            <div class="col-sm-3"> 
              <input class="form-btn" type="submit" value="INGRESA" style="background-color:rgba(0,0,0,0.5);width:100%;padding:5px;color:#fff"/>
            </div>
        </div>
          <div class="col-md-12 error"><?php echo validation_errors(); ?></div>
          <div class="col-md-12 opcion">
            <div class="col-md-3"><a href="<?php echo base_url();?>index.php/envio_email">Registrarse como usuario</a></div>
            <div class="col-md-3"><a href="<?php echo base_url();?>index.php/home/admin">Ingresar como administrador</a></div>
          </div>
      </div>
      <?php echo form_close(); ?>
    
    </div>
  </div>


    <footer class="footer">
                <div class="col-md-9 col-md-offset-1" >
          <h6 class="text-center foot" style="margin:0">CCIESAM (Centro Cultural Santiago Antunez de Mayolo)<br> Av. Tupac Amaru Nº 210 - PAB.Q1 3er Piso Of. 306, Lima <br>
          cciesam.uni@gmail.com</h6>
        </div>
        
    </footer>

</body>
</html>