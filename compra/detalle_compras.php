<?php require_once 'menu/encabezado.php'; ?>


<?php
 
  $mysqli = new mysqli('localhost', 'root', '', 'north_nutrition');

?>


<?php
$conexion= mysql_connect ("localhost", "root", "") or
die ("Sin Conexion");
mysql_select_db ("north_nutrition", $conexion) or
die("Sin Base de Datos");

$id_venta = $_GET["id_stock"];

$registros = mysql_query ("SELECT id_stock.stock, venta_producto.fecha_venta, venta_producto.rela_cliente,venta_producto.monto_total, venta_producto.sub_total, venta_producto.iva, venta_producto.sub_total, venta_producto.descuento, venta_producto.monto_pagado, venta_producto.total_neto, venta_producto.metodo_pago, venta_producto.saldo, detalle_ventas.cantidad, detalle_ventas.total, clientes.apellido_cliente, clientes.nombre_cliente, clientes.dni_cliente, productos.nombre_producto, productos.precio_venta FROM detalle_ventas
	JOIN productos on detalle_ventas.id_producto = productos.id_producto
	JOIN venta_producto ON detalle_ventas.id_venta=venta_producto.id_venta
    JOIN clientes ON venta_producto.rela_cliente=clientes.id_cliente
    WHERE venta_producto.id_venta = $id_stock") or 
die ("Error de SQL");
if ($reg = mysql_fetch_array($registros))
{
 ?>




<div class="row"> <!-- Fila -->

	<div class="col-md-12"> <!-- Tamaño de la columna -->

		<div class="panel panel-default" align="center"> <!-- Encabezado con Titulo del panel -->
			<div class="panel-heading">
				<div class="page-heading"><i class="icon-pencil"></i> DETALLE DE VENTA</div>
			</div>

			<div class="panel-body"> <!-- Contenido del panel -->

				<!-- Formulario-->
			
				<!-- Cuerpo de Formulario -->               
                <div class="form-body">

					
					<div class="row">
						<div class="form-group">
			        	<label class="col-sm-2 control-label">Nº Factura:</label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo $reg['id_venta']; ?>" disabled>
						    </div>

						<label class="col-sm-2 control-label">Nombre Producto:</label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo $reg['nombre_producto']; ?>" disabled>
						    </div>
	        		</div>
	        		</div><br>

	        		<div class="row">
	        		    <div class="form-group">
	        		    <label class="col-sm-2 control-label">Cantidad:</label>
						    <div class="col-sm-3">
						      <input type="number" class="form-control" value="<?php echo $reg['cantidad']; ?>" disabled>
						    </div>

			        	<label class="col-sm-2 control-label">Precio </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo '$'.$reg['precio_venta']; ?>" disabled>
						    </div>
				    </div>
				    </div><br>

	        		<div class="row">
	        			<div class="form-group">
			        	<label class="col-sm-2 control-label">Sub Total </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo '$'.$reg['sub_total']; ?>" disabled>
						    </div>

			        	<label class="col-sm-2 control-label">IVA </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo '$'.$reg['iva']; ?>" disabled>
						    </div>
				    </div>
				    </div><br>

					<div class="row">
						<div class="form-group">
			        	<label class="col-sm-2 control-label">Total Neto </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo '$'.$reg['total_neto']; ?>" disabled>
						    </div>

			        	<label class="col-sm-2 control-label">Descuento </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo '$'.$reg['descuento']; ?>" disabled>
						    </div>
					</div>
					</div><br>

					<div class="row">
						<div class="form-group">
			        	<label class="col-sm-2 control-label">Monto Pagado </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo '$'.$reg['monto_pagado']; ?>" disabled>
						    </div>

			        	<label class="col-sm-2 control-label">Metodo de Pago </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo $reg['metodo_pago']; ?>" disabled>
						    </div>
					</div>
					</div><br>

					<div class="row">
						<div class="form-group">
			        	<label class="col-sm-2 control-label">Saldo </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo '$'.$reg['saldo']; ?>" disabled>
						    </div>

			        	<label class="col-sm-2 control-label">Fecha de Venta </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo $reg['fecha_venta']; ?>" disabled>
						    </div>
					</div>
					</div><br>

					<div class="row">
						<div class="form-group">
			        	<label class="col-sm-2 control-label">Cliente </label>
						    <div class="col-sm-3">
						      <input type="text" class="form-control" value="<?php echo $reg['nombre_cliente']; ?> <?php echo $reg['apellido_cliente']; ?>" disabled>
						    </div>
					</div>
					</div>
					
					</div>

				</div> <!-- Fin Cuerpo del Formulario--> 

			</form> <!-- Fin Formulario -->


			<?php
                 }
                  else
            ?>


			</div> <!-- Fin Contenido del panel -->

		</div> <!-- Fin Encabezado con Titulo del panel -->

	</div> <!-- Fin de columna -->
   <script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</div> <!--Fin de la fila -->