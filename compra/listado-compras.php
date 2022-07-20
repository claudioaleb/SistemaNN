<?php require_once 'menu/encabezado.php'; ?>

<?php

	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'north_nutrition');

    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

		include 'pagination.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM detalle_ventas");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'listado-ventas.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT detalle_ventas.id_venta, venta_producto.fecha_venta, venta_producto.rela_cliente,venta_producto.monto_total, detalle_ventas.cantidad, detalle_ventas.total, clientes.apellido_cliente, clientes.nombre_cliente, clientes.dni_cliente, productos.nombre_producto FROM detalle_ventas
	JOIN productos on detalle_ventas.id_producto = productos.id_producto
	JOIN venta_producto ON detalle_ventas.id_venta=venta_producto.id_venta
    JOIN clientes ON venta_producto.rela_cliente=clientes.id_cliente");
		
		if ($numrows>0){
			?>
        
    <div class="panel panel-default" align="center">
    	<div class="panel-heading">
    		<div class="page-heading"><i class="icon-clipboard1"></i> HISTORIAL DE VENTAS</div>
    	</div>
    </div>
                     

    <div class="table-responsive-sm">
		<table class="table table-sm table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>Nº FACTURA</th>
              <th>NOMBRE APELLIDO Y DNI DEL CLIENTE</th>
              <th>PRODUCTO</th>
              <th>FECHA DE VENTA</th>
              <th>CANTIDAD</th>
              <th>TOTAL</th>
              <th>Detalle</th>
            </tr>
          </thead>
          <tbody>
			<?php

			$conexion = mysql_connect('localhost', 'root', '');
            mysql_select_db('north_nutrition', $conexion);

	        $sql = mysql_query("SELECT detalle_ventas.id_venta, venta_producto.fecha_venta, venta_producto.rela_cliente,venta_producto.monto_total, detalle_ventas.cantidad, detalle_ventas.total, clientes.apellido_cliente, clientes.nombre_cliente, clientes.dni_cliente, productos.nombre_producto FROM detalle_ventas
	JOIN productos on detalle_ventas.id_producto = productos.id_producto
	JOIN venta_producto ON detalle_ventas.id_venta=venta_producto.id_venta
    JOIN clientes ON venta_producto.rela_cliente=clientes.id_cliente");

				if(mysql_num_rows($sql) > 0){

					while($row = mysql_fetch_array($sql)){
			?>
				<tr>
					<td><?php echo $row['id_venta'];?></td>
					<td><?php echo $row['apellido_cliente'].', '.$row['nombre_cliente'].' - '.$row['dni_cliente'];?></td>
					<td><?php echo $row['nombre_producto'];?></td>
					<td><?php echo $row['fecha_venta'];?></td>
					<td><?php echo $row['cantidad'];?></td>
					<td><?php echo '$'.$row['monto_total'];?></td>
					

					<td align="center">
						<a href="detalle_ventas.php?id_venta=<?php echo $row['id_venta'];?>" type="button" class="btn btn-warning btn-sm" aria-hidden="true"><i class='icon-eye'></i></a>
					</td>
				</tr>
			<?php
			}
}else{
			echo '<tr><td colspan="11" align="center">No hay datos.</td></tr>';

			}
			
			?>
		  </tbody>
		</table>
	</div>

	
	<div class="table-pagination pull-right">

			<?php echo paginate($reload, $page, $total_pages, $adjacents);?>

	</div>
		
			
			<?php
			
		    } else {

			?>


	<div class="alert alert-warning alert-dismissable">
              
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              
              <h4>No hay datos!</h4>
    

    </div>
			

			<?php
		    }
?>


<!-- jQuery -->
   <script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>