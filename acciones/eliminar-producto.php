<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../estilos/jquery/jquery.min.js"></script>
<script src="../estilos/sweetalert2/sweetalert2.js"></script>

</head>
<body>
</body>
</html>
<?php
$conexion = new mysqli("localhost","root","","north_nutrition");
mysqli_query ($conexion,"delete from productos where id_producto = $_REQUEST[id_producto];");
mysqli_close ($conexion);
echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Eliminacion Correcta',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = '../productos/mantenimiento-productos.php';
                        })
                  });
              </script>";
              
?>