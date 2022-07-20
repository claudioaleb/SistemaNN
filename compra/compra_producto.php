<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
</HEAD>
<BODY>
<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "north_nutrition";

$connect = new mysqli($localhost, $username, $password, $dbname);

if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {

}

if($_POST) {		

	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['nombre_producto']); $x++) {			
		$updateProductQuantitySql = "SELECT productos.cantidad FROM productos WHERE productos.id_producto = ".$_POST['nombre_producto'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		
		while($updateProductQuantityResult=$updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x]=$updateProductQuantityResult[0] + $_POST['cantidad'][$x];							
				$updateProductTable="UPDATE productos SET cantidad='".$updateQuantity[$x]."' WHERE id_producto=".$_POST['nombre_producto'][$x]."";
				$connect->query($updateProductTable);	

				$orderItemSql="INSERT INTO stock(id_compra, rela_producto, precio_unitario, cantidad, total, precio_venta, rela_proveedor, fecha_alta_producto) 
				VALUES ('".$_POST['id_compra']."',
						'".$_POST['nombre_producto'][$x]."',
						'".$_POST['precio_unitario'][$x]."',
						'".$_POST['cantidad'][$x]."',
						'".$_POST['total'][$x]."',
						'".$_POST['precio_venta'][$x]."',
						'".$_POST['rela_proveedor'][$x]."',
						'".date('d-m-Y')."')";

				$connect->query($orderItemSql);


				if($x == count($_POST['nombre_producto'])) {
					$orderItemStatus=true;
				}		
		}
	}
echo "Registro correcto";

$connect->close();

}

?>
<div>
<button type="submit" name="insertar" class="btn btn-success  btn-sm"><a href="impresion_factura/pdf/factura-venta-producto.php?id_venta=<?php echo $_REQUEST['id_stock']; ?>" class="btn btn-md btn-default" target="_blank">IMPRIMIR FACTURA</a>
</button>
</div>
</BODY>
</HTML>