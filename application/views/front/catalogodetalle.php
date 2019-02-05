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
						    </div>
						    <?php echo form_close(); ?>
						  </div>

						</div>

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
							<div class="col-md-4 btn-group">
								<button onclick="location.href = '<?php echo base_url();?>index.php/home/catalogo';" type="button" class="btn btn-default">VOLVER A CATÁLOGO</button>
							</div>
						</div>
							
					</div>

					<div class="borde text-left">
						<span class="titulo">DETALLE DEL TEXTO</span>
					</div>
					
					<div class="catalogo">
						<div class="row">
						<?php
				            $agregado = $this->session->flashdata('agregado');
				            $destruido = $this->session->flashdata('destruido');
				            $productoEliminado = $this->session->flashdata('productoEliminado');
				            if ($agregado) {
				        ?>
				            <li class="grid_6" id="productoAgregado"><?= $agregado ?></li>
				        <?php }elseif($destruido){ ?>
				            <li class="grid_6" id="productoAgregado"><?= $destruido ?></li>
				        <?php }elseif($productoEliminado){ ?>
				            <li class="grid_6" id="productoAgregado"><?= $productoEliminado ?></li>
				        <?php } ?>


					    	<div class="col-md-12">
							<?php foreach($libros as $libro) { ?>
					    		<?= form_open(base_url() . 'index.php/home/agregarLibro') ?>

					        		<div class="col-md-5">
										<div class="imgdetalle">
											<img src="<?= base_url() ?>recursos/img/libro1.jpg" width="200px">
										</div>
										<button onclick="location.href='<?php echo base_url();?>index.php/home/catalogo'" onclick="history.go(-1);" type="button" id="volver" data-loading-text="Loading..." class="btn btn-primary btn-lg"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Volver</button>
									</div>

									<div class="col-md-7">
										<div class="titulolibro">
											<h3 id="titulo"><?= ucfirst($libro->titulo) ?></h3>
										</div>
										
										<div class="datos">
											<strong>Autor:</strong>
											<?= ucfirst($libro->autor) ?><br>
											<strong> Tema específico:</strong>
											<?= ucfirst($libro->tema) ?><br>
											<strong>Editorial:</strong>
											<?= ucfirst($libro->editorial) ?><br>
											<strong>Páginas:</strong>
											<?= $libro->paginas ?>&nbsp;pág.<br>
											<strong>Año:</strong>
											<?= $libro->anio ?><br>
											<strong>Ejemplares:</strong>
											<?= ucfirst($libro->cantidad) ?><br>
											<strong>Curso:</strong>
											<?= ucfirst(mb_strtolower($libro->nombre_curso)) ?><br>
											<?php 
											$obs = $libro->obs;
											if($obs){
												echo "<strong>Observación:</strong>";
												echo $libro->obs."<br>";
											}
											?>
										</div>

										<div class="form-group">
										  <button type="button" class="favorito btn btn-default" title=""><i class="fa fa-star"></i></button>
							              <button type="button" class="compartir btn btn-default" title=""><i class="fa fa-share-alt"></i></button>
							                <button id="link" type="button" class=" descarga btn btn-default" title="" onclick="location.href = '<?= base_url() ?>recursos/files/pdf1.pdf';"><i class="fa fa-download"></i></button><br>
							              <button type="submit" id="reservar" data-loading-text="Cargando..." name="action" class="btn btn-primary btn-lg">Reservar</button>
							              <button type="button" id="lista" data-loading-text="Cargando..." onclick="location.href = '<?= base_url() ?>index.php/home/reservados';" class="btn btn-primary btn-lg">Ir a Lista de Reservados</button>
							            </div>
									</div>

									<?= form_hidden('uri', $this->uri->segment(3)) ?>
					                <?= form_hidden('cod_libro', $libro->cod_libro) ?>
					            <?= form_close() ?>
					        <?php } ?>
					        <!-- si el carrito contiene productos los mostramos -->
							
					        </div>
						</div>	
					</div>
				</div>
			</div>
		</div>
    </div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	});
	$(document).ready(function(){
	    $('.compartir').tooltip({title: "Compartir", trigger: "hover"});
	    $('.favorito').tooltip({title: "Agregar a tus favoritos", trigger: "hover"});
	    $('.descarga').tooltip({title: "Descargar versión digital", trigger: "hover"});
	});
</script>
<script type="text/javascript">
	$(function(){
		$('#link').click(function(e){
			$('#link').attr({
				target: '_blank'
			});
		})
	});	
</script>

<script>
	$(document).ready(function () {

		$('.compartir').socialShare({
			social: 'blogger,facebook,google,linkedin,tumblr,twitter',
			whenSelect: true,
			selectContainer: '.compartir'
		});

	});
</script>
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
     $("#buscar").attr("action", "<?= base_url() ?>index.php/home/" + str + num);
  })
  .change();
</script>
