var path = 'http://jjce.com.pe/';
$(function(){
	var limpiar = $('.limpiar');
	var proyecto = $('input[name=proyecto]');
	var nombre = $('input[name=nombre]');
	var coordenadas = $('input[name=coordenadas]');

	$('#formEdificio').validate({
		rules: {
			nombre   :{required:true},
			coordenadas   :{required:true},
		},
		messages:{
			nombre:{required:'El nombre es requerido'},
			coordenadas:{required:'El nombre es requerido'}
		}
		,highlight: function(element) {
					$(element).addClass('error');
		},
		unhighlight: function(element) {
				$(element).removeClass('error');
		},
		submitHandler:function() {
			agregar();
			console.log('HOLAA');
		}
	});


	$('.reg-edificios').on('click','.eliminar',function(){
			var id = $(this).attr('data-id');
			$.confirm({
					confirmButton: 'Eliminar',
    			cancelButton: 'Cancelar',
					title: 'Confirmar!',
					content: '¿Esta seguro de eliminar?',
					confirm: function(){
						$.ajax({
							url: path+"administrador/delEdificio",
							method:'post',
							data:{'id':id},
							dataType:'html'
						}).done(function(data) {
							$('#fil-'+data).remove();
						});
					}
			});
	});

function agregar(){
			$.ajax({
				url: path+"administrador/addEdificio",
				method:'post',
				data:{'proyecto':proyecto.val(),'nombre':nombre.val(),'coordenadas':coordenadas.val()},
				dataType:'json'
			}).done(function(data) {
				var fila = '';
				fila += '<tr id="fil-'+data.edificio+'">';
				fila +=  	'<td>'+data.nombre+'</td>';
				fila +=  	'<td>'+data.coordenadas+'</td>';
				fila += 	'<td><button class="Canvas-boton dibujar" data-coordenadas="'+data.coordenadas+'"><i class="icon-dibujar"></i> Dibujar</button></td>';
				fila +=  	'<td><button class="Canvas-boton eliminar" data-id="'+data.edificio+'"><i class="icon-delete"></i> Eliminar</button></td>';
				fila +=  	'<td><a class="Canvas-boton dpto"><i class="icon-dpto"></i> Dptos</a></td>';
				fila += '</tr>';
				$('.reg-edificios').append(fila);
				nombre.val('')
				coordenadas.val('');
				limpiar.trigger('click');
			});
	}

});
