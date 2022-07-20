	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'historial_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

$('#dataVista').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id_producto = button.data('id_producto') // Extraer la información de atributos de datos
		  var fecha_caducidad_producto = button.data('fecha_caducidad_producto')
		  var fecha_alta_producto = button.data('fecha_alta_producto')
		  var descripcion_producto = button.data('descripcion_producto')
		  var observaciones = button.data('observaciones')
		  var rela_categoria = button.data('rela_categoria')
		  var cantidad_ingreso = button.data('cantidad_ingreso')
		  var costo_unitario = button.data('costo_unitario')
		  var costo_total = button.data('costo_total')
		  var precio_venta = button.data('precio_venta')
		  var estado_producto = button.data('estado_producto')
		  
		  var modal = $(this)
		  modal.find('.modal-body #fecha_caducidad_producto').val(fecha_caducidad_producto)
		  modal.find('.modal-body #fecha_alta_producto').val(fecha_alta_producto)
		  modal.find('.modal-body #descripcion_producto').val(descripcion_producto)
		  modal.find('.modal-body #observaciones').val(observaciones)
		  modal.find('.modal-body #rela_categoria').val(rela_categoria)
		  modal.find('.modal-body #cantidad_ingreso').val(cantidad_ingreso)
		  modal.find('.modal-body #costo_unitario').val(costo_unitario)
		  modal.find('.modal-body #costo_total').val(costo_total)
		  modal.find('.modal-body #precio_venta').val(precio_venta)
		  modal.find('.modal-body #estado_producto').val(estado_producto)
		  modal.find('.modal-body #id_producto').val(id_producto)
		  $('.alert').hide();
		})