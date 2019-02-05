<div class="col-sm-9">

            	<div class="borde text-left">
					<span class="titulo">BÚSQUEDA CON FILTRO</span>
				</div>
			<div class="filtros">
				<div class="row">
				  <div class="col-lg-6">
				  <form id="buscar" method="GET" action="<?= base_url() ?>index.php/home/porTitulo">
				    <div class="input-group">
				      <input id="query" name="query" type="text" class="form-control" placeholder="Ingresar búsqueda ...">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit">Buscar</button>
				      </span>
				    </div><!-- /input-group -->
				    <?php echo form_close(); ?>
				  </div><!-- /.col-lg-6 -->

				</div><!-- /.row -->


				
				<div class="row">
					<div class="col-md-4">
						<select class="form-control" name="select" id="select">
						  <option id="catalogo" value="porTitulo" selected="selected">Titulo</option>
						  <option id="autor" value="porAutor">Autor</option>
						  <option id="editorial" value="porEditorial">Editorial</option>
						</select>
					</div>
					<!--<div class="col-md-4">
						<select class="form-control" id="selectbiblio">
						 <option value="" selected="selected">Biblioteca</option>
						 <option value="1">Biblioteca CCIESAM</option>
						 <option value="2">Biblioteca Central</option>
						</select>
					</div>-->
					<div class="col-md-4 btn-group text-center">
						<button onclick="location.href = '<?php echo base_url();?>index.php/home/index';" type="button" class="btn btn-default">VOLVER A CONTENIDO</button>
					</div>
				</div>
				<nav class="navbar navbar-inverse">
					<div class="container-fluid" style="padding: 0"> 
						<div class="navbar-header"> 
							<button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> 
								<span class="sr-only">Toggle navigation</span> 
								<span class="icon-bar"></span> 
								<span class="icon-bar"></span> 
								<span class="icon-bar"></span> 
							</button> 		
						</div> 
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> 
							<ul class="nav navbar-nav cursos" style="float: left !important"> 
							<?php
							foreach($cursos as $curso){ ?>
								<li id="<?=$curso->cod_curso; ?>"><a href="<?php echo base_url();?>index.php/home/buscarporCurso/<?=$curso->cod_curso;?>"><?=ucfirst(mb_strtolower($curso->nombre_curso))?></a></li> 
							<?php
							} ?>
							</ul> 
						</div> 
						
					</div>
				</nav>	
			</div>

            	<div class="borde text-left">
					<span class="titulo">CATÁLOGO</span>
				</div>
				<div class="catalogo">
					<div class="row">


		            	<div class="col-md-12">
		            	<?php
							foreach($results as $blibro){ ?>
									<div class="col-md-4">
										<div class="item_catalog">
											<a href="<?php echo base_url();?>index.php/home/detallecatalogo/<?php echo $blibro->cod_libro; ?>"><img src="<?= base_url() ?>recursos/img/libro1.jpg" width="200px"></a>
											<button type="button" class="btn-catalogo"><a href="<?php echo base_url();?>index.php/home/detallecatalogo/<?php echo $blibro->cod_libro; ?>">VER LIBRO</a></button>
											<p><span><?= ucfirst($blibro->titulo) ?></span><br><span><?= ucfirst($blibro->autor) ?></span><br><span>Editorial <?= ucfirst($blibro->editorial) ?></span></p>
										</div>
									</div>
							<?php	
						}
							?>
									
		            	</div>
	            	</div>	

				</div>
	            
	            <nav aria-label="...">
					  <ul class="pagination">
					    <?php echo $links; ?>
					  </ul>
					</nav>

			</div>
		</div>
	</div>

		

        </div>
    </section>

<div class="fff"></div>
 
<script>
$( "select" )
  .change(function () {
    var str = "";
    var num = "";

    $( "#select option:selected" ).each(function() {
      str += $( this ).val();
    });
    $( "#selectbiblio option:selected" ).each(function() {
      num += $( this ).val() + " ";
    });
     $("form").attr("action", "<?= base_url() ?>index.php/home/" + str + num);
  })
  .change();
</script>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.cursos li').click(function() {
	        $(this).siblings('li').removeClass('active');
	        $(this).addClass('active');
	    });
	});
</script>