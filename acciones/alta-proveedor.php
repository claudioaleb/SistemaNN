<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
<script src="../estilos/jquery/jquery.min.js"></script>
<link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">
<script src="../estilos/sweetalert2/sweetalert2.js"></script>
</HEAD>
<BODY>
<?php
$conexion = new mysqli("localhost","root","","north_nutrition");
if (isset($_POST["registrar"])){
mysqli_query($conexion,"insert into proveedores (id_proveedor, nombre_proveedor, razon_social, direccion_proveedor, barrio_proveedor, provincia_proveedor, localidad_proveedor, email_proveedor, email_particular, telefono_celular_proveedor, telefono_fijo_proveedor, estado_proveedor, fecha_alta_proveedor)
values('$_REQUEST[id_proveedor]','$_REQUEST[nombre_proveedor]','$_REQUEST[razon_social]','$_REQUEST[direccion_proveedor]','$_REQUEST[barrio_proveedor]','$_REQUEST[provincia_proveedor]','$_REQUEST[localidad_proveedor]','$_REQUEST[email_proveedor]','$_REQUEST[email_particular]','$_REQUEST[telefono_celular_proveedor]','$_REQUEST[telefono_fijo_proveedor]','$_REQUEST[estado_proveedor]','$_REQUEST[fecha_alta_proveedor]');");
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