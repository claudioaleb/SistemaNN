<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
<script src="../estilos/jquery/jquery.min.js"></script>
<link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">
<script src="../estilos/sweetalert2/sweetalert2.js"></script>
</HEAD>
<BODY>
<?php
$conexion = new mysqli("localhost","root","",'north_nutrition');
if (isset($_POST["registrar"])){
mysqli_query($conexion,"insert into empleados (id_empleado, estado_empleado, fecha_alta_empleado, cargo_empleado, rela_persona)
values('$_REQUEST[id_empleado]','$_REQUEST[estado_empleado]','$_REQUEST[fecha_alta_empleado]','$_REQUEST[cargo_empleado]','$_REQUEST[rela_persona]');");
mysqli_close($conexion);
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