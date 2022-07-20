<?php

	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'north_nutrition');
    $con->set_charset('utf8');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'pagination2.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 6; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM productos ") or die ("error de sql:".mysqli_error($con));
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'abastecimiento_stock.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT * FROM categorias 
JOIN productos ON productos.rela_categoria = id_categoria 
JOIN stock ON stock.rela_producto = productos.id ORDER BY nombre_producto ASC LIMIT $offset,$per_page");
		
		if ($numrows>0){
			?>
        

        <div class="table-responsive-sm">
		<table class="table table-sm table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>Nº COMPROBANTE</th>
              <th>FECHA</th>
              <th>CATEGORÍA</th>
              <th>PRODUCTO</th>
              <th>STOCK INGRESO</th>
              <th>COSTO UNITARIO</th>
              <th>TOTAL</th>
              <th>Detalle</th>
              <th>Añadir</th>
            </tr>
          </thead>
          <tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $row['numero_comprobante'];?></td>
					<td><?php echo $row['fecha_alta_producto'];?></td>
					<td><?php echo $row['nombre_categoria'];?></td>
					<td><?php echo $row['descripcion_producto'];?></td>
					<td><?php echo $row['cantidad_ingreso'];?></td>
					<td><?php echo $row['cost_unitario'];?></td>
					<td><?php echo $row['total'];?></td>
					<td align="center">
						<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#dataVista" data-id_producto="<?php echo $row['id_stock']?>" data-fecha_alta_producto="<?php echo $row['fecha_alta_producto']?>" data-descripcion_producto="<?php echo $row['descripcion_producto']?>" data-rela_categoria="<?php echo $row['nombre_categoria']?>" data-cantidad_ingreso="<?php echo $row['cantidad_ingreso']?>" data-costo_unitario="<?php echo $row['cost_unitario']?>" data-costo_total="<?php echo $row['total']?>" data-precio_venta="<?php echo $row['precio_venta']?>" data-estado_producto="<?php echo $row['estado_producto']?>"><i class='icon-eye'></i></button>
					</td>
					<td align="center">
						<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#dataUpdate" data-id_producto="<?php echo $row['rela_producto']?>" data-descripcion_producto="<?php echo $row['descripcion_producto']?>" data-rela_categoria="<?php echo $row['rela_categoria']?>" data-cantidad-ingreso="<?php echo $row['cantidad_ingreso']?>" data-costo_unitario="<?php echo $row['cost_unitario']?>" data-costo_total="<?php echo $row['total']?>" data-precio_venta="<?php echo $row['precio_venta']?>"><i class='icon-plus' style='color: blue'></i></button>
					</td>
				</tr>
				<?php
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
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>
