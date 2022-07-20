<?php
$conexion = new mysqli('localhost', 'root', '','north_nutrition');
mysqli_query($conexion, "update productos set
nombre_producto='$_POST[nombre_producto]',
descripcion_producto='$_POST[descripcion_producto]',
estado_producto='$_POST[estado_producto]'
where id_producto = $_POST[id_producto];",) or die ("Problemas en el sql.");
mysqli_close($conexion);
echo "Modificacion correcta";

print "<meta http-equiv=Refresh content=\"1 ; url=../productos/mantenimiento-productos.php\">";
?>