<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
</HEAD>
<BODY>
<?php
$conexion = new mysqli('localhost', 'root', '','north_nutrition');

mysqli_query($conexion,"insert into stock(fecha_alta_producto,id_compra, precio_unitario, total, cantidad_ingreso, precio_venta, rela_producto, rela_proveedor)
values(curdate(),'$_REQUEST[precio_unitario]','$_REQUEST[id_compra]','$_REQUEST[total]','$_REQUEST[cantidad_ingreso]','$_REQUEST[precio_venta]','$_REQUEST[rela_producto]','$_REQUEST[rela_proveedor]');") or die("problemas en el select".mysqli_error());

echo "<i class='icon-check-square' style='color: green'></i>";
mysqli_close($conexion);

?>
</BODY>
</HTML>