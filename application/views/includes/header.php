	<nav class="navbar navbar-default navbar-custom">
        <div>
         	<ul class="nav navbar-nav barra">
                <li class="hidden"><a href="#page-top"></a></li>
                <li><a href="#"><span class="fa fa-user"></span>&nbsp;<?php echo ucfirst($usuario); ?></a></li>
                <li><a href="<?php echo base_url();?>index.php/home/logout"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Cerrar Sesión</a></li>
            </ul>
			<ul class="social-share responsivo1" style="padding: 13px;">
				<li><a href="https://www.facebook.com/cciesam.uni.fiee/"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/cciesam" style="color:#931980"><i class="fa fa-twitter"></i></a></li>
				<li><a href="http://cciesam-uni.blogspot.pe/"><i class="fa fa-rss-square"></i></a></li>
			</ul>	

               
           	<div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url();?>index.php/home/principal"><img src="<?= base_url() ?>recursos/img/logo-page.png" width="450px" class="imagen1">
                	<img src="<?= base_url() ?>recursos/img/logo.png" width="100px" class="imagen2"></a>
            </div>

	        <div class="top-bar">
				<div class="row" style="margin: 0">
					<div class="col-sm-12 col-xs-12">
						<div class="social">
							<ul class="social-share responsivo2" style="display: none;">
								<li><a href="https://www.facebook.com/cciesam.uni.fiee/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/cciesam" style="color:#931980"><i class="fa fa-twitter"></i></a></li>
								<li><a href="http://cciesam-uni.blogspot.pe/"><i class="fa fa-rss-square"></i></a></li>
							</ul>	
						</div>
					</div>
				</div>

				<div class="search">
					<div class="row">
						<div class="col-md-6 col-md-offset-6 col-xs-12 col-sm-offset-6 col-sm-6">

							<form id="buscar" method="GET" action="<?= base_url() ?>index.php/home/porTitulo">
								<div class="input-group">
									<input type="text" id="query" name="query" class="form-control" placeholder="Ingrese título">
									<span class="input-group-btn">
									<button class="btn textoresponsivo btn-default" type="submit"><span>Buscar Texto&nbsp;&nbsp;</span><i class="fa fa-search" aria-hidden="true"></i></button>
									</span>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
       	</div>
    </nav>