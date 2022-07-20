<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
</HEAD>
<BODY>
<?php
$conexion = mysqli_connect("localhost","root","")
or die("Problemas en la conexion");
mysqli_select_db($conexion,"north_nutrition")or
die("Problemas en la seleccion de la base de datos");
mysqli_query($conexion,"insert into stock (id_stock, fecha_alta_producto, cost_unitario, total, cantidad_ingreso, numero_comprobante, rela_producto)
values('$_REQUEST[id_stock]',curdate(),'$_REQUEST[cost_unitario]','$_REQUEST[total]','$_REQUEST[cantidad_ingreso]','$_REQUEST[numero_comprobante]','$_REQUEST[rela_producto]');")
or die("problemas en el select".mysqli_error());
echo "Registro Correcto";
mysqli_close($conexion);

print "<meta http-equiv=Refresh content=\"1 ; url=abastecimiento_stock.php\">";
?>
</BODY>
</HTML>