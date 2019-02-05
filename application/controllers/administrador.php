	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>
	<div class="container-fluid">
		<div class="col-md-8">
			<h2>Ver todos los libros</h2>
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-md-12" style="padding: 0">
			<?php
                $agregado = $this->session->flashdata('agregado');
                $editado = $this->session->flashdata('editado');
                $eliminado = $this->session->flashdata('eliminado');
                if ($editado) {
                    ?>
                    <li id="productoAgregado"><?= $editado ?></li>
                    <?php
                }elseif($agregado)
                {
                    ?>
                    <li id="productoAgregado"><?= $agregado ?></li>
                    <?php
                }elseif($eliminado)
                {
                    ?>
                    <li id="productoAgregado"><?= $eliminado ?></li>
			<?php
                }
                ?>

			<table class="table table-striped table-bordered">
				<thead style="color:#fff">
					<tr>
						<th>Código</th>
						<th>Título</th>
						<th>Autor</th>
						<th>Editorial</th>
						<th>Ciudad</th>
						<th>Año</th>
						<th>Tema</th>
						<th>Pag.</th>
						<th>Caracteristicas</th>
						<th>Estado</th>
						<th>Curso</th>
						<th>Obs</th>
						<th>Acciones</th>
					</tr>	
				</thead>
				<tbody>
				<?php

					if ($libros != FALSE){
						foreach ($libros as $row){
							echo "<tr>";
								echo "<td class='text-center'>".$row->cod_libro."</td>";
								echo "<td>".$row->titulo."</td>";
								echo "<td>".$row->autor."</td>";
								echo "<td>".$row->editorial."</td>";
								echo "<td class='text-center'>".$row->ciudad."</td>";
								echo "<td>".$row->anio."</td>";
								echo "<td>".$row->tema."</td>";
								echo "<td>".$row->paginas."&nbsp;p.</td>";
								echo "<td>".$row->caracteristica."</td>";
								echo "<td>".$row->estado."</td>";
								echo "<td>".$row->nombre_curso."</td>";
								echo "<td>".$row->obs."</td>";
								echo "<td>";
									echo "<a href='".base_url()."index.php/home/editarLibroAdmin/".$row->cod_libro."' class='label label-success'><span class='glyphicon glyphicon-pencil'></a></span>";
									echo "&nbsp;&nbsp;";
									echo "<a data-confirm='¿Esta seguro que desea eliminar el libro?'' href='".base_url()."index.php/home/eliminarLibroAdmin/".$row->cod_libro."' class='label label-danger'>";
										echo "<span class='fa fa-times'></a></span>";
								echo "</tr>";
						}	
					}				
				?>
				</tbody>
			</table>
		</div>
	</div>	
<script type="text/javascript">
	$(document).ready(function() {
	$('a[data-confirm]').click(function(ev) {
		var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog">	<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">Confirmar</h4></div><div class="modal-body"><p>¿Esta seguro que desea eliminar el libro?</p></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button><a class="btn btn-primary" id="dataConfirmOK">Eliminar</a></div></div></div></div>');
		} 
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		return false;
	});
});
</script>
