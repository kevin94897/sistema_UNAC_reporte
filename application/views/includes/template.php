<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="es"> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" lang="es"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
  <?php $this->load->view('includes/head') ?>
</head>

<body id="page-top">
    <?php $this->load->view('includes/header') ?> 
    <?php $this->load->view('includes/section') ?> 
    <?php $this->load->view($contenido) ?>
    <?php $this->load->view('includes/footer') ?>
</body>
</html>