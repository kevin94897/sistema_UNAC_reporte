<!DOCTYPE html>
  <html>
  <meta charset="UTF-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistema Intranet Bibliotecario | CCIESAM</title>
	<link href="fonts.css" rel="stylesheet">
	<link href="<?= base_url('recursos/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('recursos/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('recursos/css/estilos.css') ?>" rel="stylesheet">


	<script type="text/javascript" src="<?= base_url('recursos/js/jquery.min.js') ?>"></script>
  	<script type="text/javascript" src="<?= base_url('recursos/js/bootstrap.min.js') ?>"></script>
  	<script type="text/javascript" src="<?= base_url('recursos/js/socialShare.min.js') ?>"></script>

  	<link href="<?= base_url('recursos/css/jquery.dataTables.css') ?>" rel="stylesheet" type="text/css">
  	<script type="text/javascript" src="<?= base_url('recursos/js/jquery.dataTables.js') ?>"></script>

	<script type="text/javascript">
		$(document).ready( function () {
		    $('#tabla').DataTable({

			    "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
			    
		    });
		} );
	</script>

  	<style type="text/css">
  		body{
  			font-size: 12px;
  		}
  	</style>
	<nav id="mainNav" class="navbar navbar-default navbar-custom">
        <div class="container-fluid">
         	<ul class="nav navbar-nav">
                <li class="hidden"><a href="#page-top"></a></li>
                <li><a href="#"><span class="fa fa-user"></span>&nbsp;<?php echo ucfirst($usuario); ?></a></li>
                <li><a href="<?php echo base_url();?>index.php/home/logout"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Salir</a></li>
            </ul>

            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url();?>index.php/home/principal"><img src="<?= base_url() ?>recursos/img/logo-page.png" width="450px" class="imagen1">
                	<img src="<?= base_url() ?>recursos/img/logo.png" width="100px" class="imagen2"></a>
            </div>
            
	        <div class="top-bar">

				<div id="navbar" class="collapse navbar-collapse">
				    <?php $activa = $this->uri->segment(2); ?>
				      <ul class="nav navbar-nav" style="margin-right: 20px;">        
				        <li <?php if ($activa == ''){ echo "class='active'"; } ?>>
				        	<a href="<?=base_url()?>index.php/home/opcionesAdmin">
				        		<span class="glyphicon glyphicon-home"></span>&nbsp;
				        		Inicio
				        	</a>
				        </li>
				        <li <?php if ($activa == 'agregar'){ echo "class='active'"; } ?>>
				        	<a href="<?=base_url()?>index.php/home/agregarLibroAdmin">
				        		<span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar
				        	</a>
				        </li>          
								<li <?php if ($activa == 'ver'){ echo "class='active'"; } ?>>
									<a href="<?=base_url()?>index.php/home/verLibroAdmin">
										<span class="glyphicon glyphicon-th-large"></span>&nbsp;
										Ver todo
									</a>
								</li>
								<li <?php if ($activa == 'buscar'){ echo "class='active'"; } ?>>
									<a href="<?=base_url()?>index.php/home/buscarLibroAdmin">
										<span class="fa fa-search"></span>&nbsp;
										Buscar
									</a>
								</li>
				      </ul>
				</div>


			</div>
       	</div>
    </nav>