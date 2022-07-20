<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
<script src="../estilos/jquery/jquery.min.js"></script>
<link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">
<script src="../estilos/sweetalert2/sweetalert2.js"></script>
</HEAD>
<BODY>
<?php
$localhost="localhost";
$username="root";
$password="";
$dbname="north_nutrition";

$conexion = new mysqli($localhost, $username, $password, $dbname);

if($conexion->connect_error) {
  die("Connection Failed : " . $conexion->connect_error);
} else {

}

if (isset($_POST["registrar"])){

      mysqli_query ($conexion,"INSERT INTO productos(
                         id_producto,
                         rela_categoria,
                         descripcion_producto,
                         nombre_producto,
                         estado_producto,
                         cantidad,
                         cost_unitario,
                         total,
                         precio_venta,
                         fecha_alta_producto
                         )
              VALUES(
                     '".$_POST["id_producto"]."',
                     '".$_POST["rela_categoria"]."',
                     '".$_POST["descripcion_producto"]."',
                     '".$_POST["nombre_producto"]."',
                     '".$_POST["estado_producto"]."',
                     '".$_POST["cantidad"]."',
                     '".$_POST["precio_unitario"]."',
                     '".$_POST["total"]."',
                     '".$_POST["precio_venta"]."',
                     curdate())") or die ("Problemas en el SQL1.");

      $sql="select max(id) as ultimo_id from productos";
      $resultado = mysqli_query($conexion, $sql) or die ("problemas en el sql2");
      while ($ultimo_id = mysqli_fetch_array($resultado))   
      $rela_producto=$ultimo_id['ultimo_id'];

      mysqli_query ($conexion,"INSERT INTO stock(
                        rela_producto,
                        id_producto,
                        rela_proveedor,
                        cantidad_ingreso,
                        precio_unitario,
                        total,
                        precio_venta,
                        fecha_alta_producto)
              VALUES(
                     '$rela_producto',
                     '".$_POST["id_producto"]."',
                     '".$_POST['rela_proveedor']."',
                     '".$_POST['cantidad']."',
                     '".$_POST['precio_unitario']."',
                     '".$_POST['total']."',
                     '".$_POST['precio_venta']."',
                     curdate())") or die ("Problemas en el SQL3.");

          mysqli_close ($conexion);

          echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Registro Correcto',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = '';
                        })
                  });
              </script>";
    }

?>

</BODY>
</HTML>