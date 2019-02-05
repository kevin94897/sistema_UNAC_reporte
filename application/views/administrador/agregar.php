<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">    
	    	<h3>Agregar Libro</h3>

			<form class="form-horizontal" role="form" id="form" name="form" action="<?=base_url()?>index.php/home/guardarLibroAdmin" method="POST">
				<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Código:</label>
					<div class="col-sm-10">
				      <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingresa código del libro">
				    </div>
			  	</div>
				<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Titulo:</label>
					<div class="col-sm-10">
				      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresa un título">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Autor:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="autor" name="autor" placeholder="Ingresa un autor">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Editorial:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="editorial" name="editorial" placeholder="Ingresa una editorial">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Ciudad:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa una ciudad">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Año:</label>
				    <div class="col-sm-10">
				      <input type="number" class="form-control" pattern= "[0-9]" id="anio" name="anio" placeholder="Ingresa un año">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Tema:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="tema" name="tema" placeholder="Ingresa un tema">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Páginas:</label>
				    <div class="col-sm-10">
				      <input type="number" class="form-control" pattern= "[0-9]" id="paginas" name="paginas" placeholder="Ingresa nro. de páginas">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Característica:</label>
				    <div class="col-sm-10">
				    	<select id="caracteristica" name="caracteristica" class="form-control">
							<option value="0">--Seleccione una caracteristica--</option>
						<?php
					        foreach ($caract as $row) {
					        echo '<option value="'.$row->cod_caract.'">'
					        .$row->caracteristica.'</option>';
					    }
					    ?>
					    </select>
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Estado:</label>
				    <div class="col-sm-10">
				    	<select id="estado" name="estado" class="form-control">
						<option value="0">--Seleccione un estado--</option>
						<?php
					        foreach ($estados as $row) {
					        echo '<option value="'.$row->cod_estado.'">'
					        .$row->estado.'</option>';
					    }
					    ?>
					    </select>
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Curso:</label>
				    <div class="col-sm-10">
				    	<select id="curso" name="curso" class="form-control">
						<option value="0">--Seleccione un curso--</option>
						<?php
					        foreach ($curso as $row) {
					        echo '<option value="'.$row->cod_curso.'">'
					        .$row->nombre_curso.'</option>';
					    }
					    ?>
					    </select>
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Observación:</label>
				    <div class="col-sm-10">
				    	<textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
				    </div>
			  	</div>
			  	<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
      				<button type="submit" class="btn btn-primary" id="guardar" name="guardar">Guardar</button>      				
    				</div>
  				</div>
				</form>
			</div>
    </div>
  </div>
<script type="text/javascript" src="<?= base_url('recursos/js/jquery.validate.js') ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
	jQuery.extend(jQuery.validator.messages, {
	  required: "Este campo es obligatorio.",
	  remote: "Por favor, rellena este campo.",
	  email: "Por favor, escribe una dirección de correo válida",
	  url: "Por favor, escribe una URL válida.",
	  date: "Por favor, escribe una fecha válida.",
	  dateISO: "Por favor, escribe una fecha (ISO) válida.",
	  number: "Por favor, escribe un número entero válido.",
	  digits: "Por favor, escribe sólo dígitos.",
	  creditcard: "Por favor, escribe un número de tarjeta válido.",
	  equalTo: "Por favor, escribe el mismo valor de nuevo.",
	  accept: "Por favor, escribe un valor con una extensión aceptada.",
	  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
	  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
	  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
	  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
	  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
	  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
	});
	});
</script>

<script type="text/javascript">

$(document).ready(function() {
    $("#form").validate({
        rules: {
        	codigo: { maxlength: 10},
            titulo: { maxlength: 150},
            autor: { maxlength: 100},
            anio: { maxlength: 4},
            ciudad: { maxlength: 20},
            editorial: { maxlength: 50},
            paginas: { maxlength: 5},
            consulta: { maxlength: 50}
        },

    	});

	});

</script>
