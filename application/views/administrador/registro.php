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

      <?php echo form_open('envio_email/nuevo_usuario'); ?>
      <div class="row">
        
        <div class="col-md-12">
          <legend class="col-sm-offset-2 user">REGISTRO</legend>
          <div class="col-sm-4 col-sm-offset-2">
            <input type="text" class="form-input form-control" name="nom" placeholder="Nombre" value="<?php echo set_value('nom') ?>">
            <input type="hidden" name="grabar" value="si" />
          </div>
          <div class="col-sm-4">   
            <input type="text" class="form-input form-control" name="correo" placeholder="E-mail" value="<?php echo set_value('correo') ?>">     
          </div>
        </div>

        
        <div class="col-md-12">
          <div class="col-sm-4 col-sm-offset-2">        
            <input type="text" class="form-input form-control" name="nick" placeholder="Usuario" value="<?php echo set_value('nick') ?>">
          </div>
          <div class="col-sm-4">        
            <input type="password" class="form-input form-control" name="pass" placeholder="Contraseña">
          </div>
        </div>

        <div class="col-sm-4 col-sm-offset-2 error"><?php echo validation_errors(); ?></div>

        <div class="col-md-12">
          <div class="col-sm-4 col-sm-offset-2 text-center"> 
            <input class="form-btn" type="submit" value="REGISTRARME" title="Registrarme" style="background-color:rgba(0,0,0,0.5);width:150px;padding:5px;color:#fff"/>
          </div>
          <div class="col-sm-4 text-center"> 
            <input class="form-btn" type="button" onclick="location.href='<?php echo base_url();?>';" value="CANCELAR" style="background-color:rgba(0,0,0,0.5);width:150px;padding:5px;color:#fff"/>
          </div>
        </div>
      </div>
      <?php echo form_close() ?>
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
