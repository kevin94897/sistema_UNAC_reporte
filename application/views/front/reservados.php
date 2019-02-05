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
					<div class="col-md-4">
						<select class="form-control" id="selectbiblio">
						 <option value="" selected="selected">Biblioteca</option>
						 <option value="1">Biblioteca CCIESAM</option>
						 <option value="2">Biblioteca Central</option>
						</select>
					</div>
					<div class="col-md-4 btn-group">
						<button onclick="location.href = '<?php echo base_url();?>index.php/home/catalogo';" type="button" class="btn btn-default">VOLVER A CATÁLOGO</button>
					</div>
				</div>
					
			</div>

            <div class="borde text-left">
				<span class="titulo">LISTA DE RESERVADOS</span>
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
			            	
			           	<?php if ($carrito = $this->cart->contents()) { ?>

					        	<div class="col-md-12" id="contenidoCarrito">
					                <table class="table">
						                    <thead class="thead-inverse">
							                    <tr>
							                        <th>Titulo</th>
							                        <th>Cantidad</th>
							                        <th>Eliminar</th>
							                    </tr>
							                </thead>
							                <tbody>
						            		<?php foreach ($carrito as $reservado) { ?>
						                        <tr>
						                            <td><?= ucfirst($reservado['titulo']) ?></td>
						                            <td><?= $reservado['qty'] ?></td>
						                            <td id="eliminar">
						                            <a href="<?php echo base_url();?>index.php/home/eliminarLibro/<?= $reservado['rowid'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
						                            </td>
						                        </tr>
						                    <?php } ?>
						                    	<tr id="total">
						                        	<td><strong>Total:</strong></td>
						                        	<td colspan="1"><?= $this->cart->total() ?> libros</td>
						                        	<td colspan="4" id="eliminarCarrito"><?= anchor('home/eliminarReservas', 'Vaciar lista')?></td>
						                    	</tr>
					                    	</tbody>
					        		</table>
					        	</div>

							<?php }else{ ?>

								<div class="col-md-12 text-center">
									<p>USTED AÚN NO HA RESERVADO LIBROS.</p>
									<a href="<?php echo base_url();?>index.php/home/catalogo"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;VOLVER AL CATÁLOGO.</h4></a>
								</div>

							<?php }?>
			
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
	     $("form").attr("action", "<?= base_url() ?>index.php/home/" + str + num);
	  })
	  .change();
	</script>